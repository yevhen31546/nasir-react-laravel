import React, { Fragment, useState, useEffect } from "react";
import PropTypes from "prop-types";
import moment from "moment";

import { Elements, StripeProvider } from 'react-stripe-elements';


// Modals
import Modal from "../../Components/Modals";
import ModalBookingDetails from "../../Components/Modals/ModalBookingDetails";
import ModalDepartureTrain from "../../Components/Modals/ModalDepartureTrain";
import ModalDepartureAirport from "../../Components/Modals/ModalDepartureAirport";
import ModalDepartureAddress from "../../Components/Modals/ModalDepartureAddress";
import ModalArrivalAirport from "../../Components/Modals/ModalArrivalAirport";
import ModalArrivalTrain from "../../Components/Modals/ModalArrivalTrain";
import ModalArrivalAddress from "../../Components/Modals/ModalArrivalAddress";
import CheckoutForm from "../../Components/Modals/ModalPayment";

// Components
import MapForm from "../../Components/Forms/MapForm";
import SimpleMap from "./Map";

const MapWrapper = ({ isDetailsPage }) => {
  // Autocomplete inputs
  const defaultValue = { value: "" };
  const [departureQuery, setDepartureQuery] = useState(defaultValue);
  const [arrivalQuery, setArrivalQuery] = useState(defaultValue);
  const [myPosition, setMyPosition] = useState({
    lat: 48.864716,
    lng: 2.349014
  });
  const [googleMapsObj, setgoogleMapsObj] = useState(0);

  // Date input
  const [date, setDate] = useState(moment().format("YYYY/MM/DD HH:m"));

  // Type
  const [type, setType] = useState(false);

  // Booking details madal
  const [showModalBookingDetails, setModalBookingDetails] = useState(false);
  const [showModalPayment, setModalPayment] = useState(false)

  const [bookResult, setBookResult] = useState(0);
  const [bookingError, setBookingError] = useState(false);

  // Modals
  // Departure
  const [showModalDepartureTrain, setModalDepartureTrain] = useState(false);
  const [showModalDepartureAirport, setModalDepartureAirport] = useState(false);
  const [showModalDepartureAddress, setModalDepartureAddress] = useState(false);

  // Departure
  const [showModalArrivalTrain, setModalArrivalTrain] = useState(false);
  const [showModalArrivalAirport, setModalArrivalAirport] = useState(false);
  const [showModalArrivalAddress, setModalArrivalAddress] = useState(false);


  // Trips being processed
  var currentTrip = {};
  
  const fetchPrice = async () => {
    const url = "http://api-dev.eaproc.com/customer/trip/booking/calculate";
    const nowDate = moment().format("YYYY-MM-DD HH:mm");
    const formData = new FormData();

    // Body
    formData.append("latitude_depart", departureQuery.lat);
    formData.append("longitude_depart", departureQuery.lng);
    formData.append("latitude_arrive", arrivalQuery.lat);
    formData.append("longitude_arrive", arrivalQuery.lng);
    if (type) {
      formData.append("date_debut", date.replace(/\//g, "-"));
    } else {
      formData.append("date_debut", nowDate);
    }
    formData.append("type", !type ? 1 : 2);

    try {
      const response = await fetch(url, {
        method: "POST",
        body: formData
      });
      const result = await response.json();
      if (result && result.prix_ttc) {
        setBookResult({
          ...result,
          departureQuery: departureQuery.value,
          arrivalQuery: arrivalQuery.value,
          date: type ? date : nowDate
        });
        setModalBookingDetails(true);
        setBookingError(false);
      } else {
        setBookingError("Booking not available");
      }
    } catch (error) {
      setBookingError("Booking not available");
    }
  };

  const bookTrip = async () => {
    const url = "https://api-dev.weekab.com/customer/trip/booking/book";
    const nowDate = moment().format("YYYY-MM-DD HH:mm");
    const formData = new FormData();

    // Body
    formData.append("lieu_depart", departureQuery.value);
    formData.append("lieu_arrive", arrivalQuery.value);

    formData.append("latitude_depart", departureQuery.lat);
    formData.append("longitude_depart", departureQuery.lng);
    formData.append("latitude_arrive", arrivalQuery.lat);
    formData.append("longitude_arrive", arrivalQuery.lng);

    let date_debut = type ? date.replace(/\//g, "-") : nowDate

    const bearerToken = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwczpcL1wvYXBpLWRldi53ZWVrYWIuY29tXC9jdXN0b21lclwvYXV0aFwvbG9naW4iLCJpYXQiOjE1NzUxOTIzMTQsImV4cCI6MTU3NTIyODMxNCwibmJmIjoxNTc1MTkyMzE0LCJqdGkiOiJYNGR2cmhFaFgwRHhHSGdyIiwic3ViIjoxODIsInBydiI6Ijg3ZTBhZjFlZjlmZDE1ODEyZmRlYzk3MTUzYTE0ZTBiMDQ3NTQ2YWEifQ.DmliVyLiTGtt4VVEKM4LnBbaRu5LtmSmGKU40vwOOVs';

    try {
      const response = await fetch(url, {
        method: "POST",
        headers: {
          'Accept': 'application/json',
          'Accept-Language': 'en',
          'Content-Type': 'application/json',
          'Authorization': 'Bearer ' + bearerToken,
        },
        body: JSON.stringify({
          "lieu_depart": departureQuery.value,
          "lieu_arrive": arrivalQuery.value,
          "latitude_depart": departureQuery.lat,
          "longitude_depart": departureQuery.lng,
          "latitude_arrive": arrivalQuery.lat,
          "longitude_arrive": arrivalQuery.lng,
          "date_debut": date_debut
        }),
      });
      const result = await response.json();
      if (result) {

        currentTrip = result[result.length - 1];

        localStorage.setItem('prix_ttc',currentTrip.prix_ttc);
        localStorage.setItem('id_ride',currentTrip.id_ride);

        setModalBookingDetails(false);
        setModalPayment(true);


        // console.log(currentTrip)
      } else {
        setBookingError("Booking not available");
        setModalBookingDetails(false);
      }
    } catch (error) {
      setBookingError("Booking not available");
      setModalBookingDetails(false);
    }
  };



  const getPosition = () => {
    navigator.geolocation.getCurrentPosition(function (position) {
      var pos = {
        lat: position.coords.latitude,
        lng: position.coords.longitude
      };
      setDepartureQuery({
        ...pos,
        value: "My position"
      });
      setMyPosition(pos);
    });
  };

  useEffect(() => {
    bookingError && setBookingError(false);
  }, [departureQuery, arrivalQuery]);

  return (
    <Fragment>
      <div className="ride-container" id="ride-container">
        <section
          className="slider-element full-screen clearfix"
          data-height-md="500"
        >
          <div className="form-widget">
            <div className="form-result"></div>
            <div className="full-screen">
              <div className="real-estate-tabs-slider">
                <div className="row clearfix">
                  {/* Components: Map form */}
                  {googleMapsObj && (
                    <MapForm
                      googleMapsObj={googleMapsObj.maps}
                      isDetailsPage={isDetailsPage}
                      setDepartureQuery={query => {
                        setDepartureQuery(query);
                      }}
                      setArrivalQuery={query => {
                        setArrivalQuery(query);
                      }}
                      setMyPosition={getPosition}
                      departureQuery={departureQuery}
                      arrivalQuery={arrivalQuery}
                      fetchPrice={fetchPrice}
                      setDate={setDate}
                      type={type}
                      setType={setType}
                      date={date}
                      setModalDepartureTrain={setModalDepartureTrain}
                      setModalDepartureAirport={setModalDepartureAirport}
                      setModalDepartureAddress={setModalDepartureAddress}
                      setModalArrivalTrain={setModalArrivalTrain}
                      setModalArrivalAirport={setModalArrivalAirport}
                      setModalArrivalAddress={setModalArrivalAddress}
                      bookingError={bookingError}
                    />
                  )}
                  {/* End components: Map form */}
                  <div
                    id="map"
                    className="col-md-8"
                    style={{ position: "relative", overflow: "hidden;" }}
                  >
                    {/* Google map */}
                    <SimpleMap
                      onGoogleApiLoaded={obj => setgoogleMapsObj(obj)}
                      departureQuery={departureQuery}
                      arrivalQuery={arrivalQuery}
                      myPosition={myPosition}
                    />
                    {/* End google map */}
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
      {/* Booking details */}
      <Modal
        title=""
        open={showModalBookingDetails}
        setOpen={show => setModalBookingDetails(show)}
        size="lg"
        isBookModal={true}
        backdrop="static"
        handleBookingRequest={() => { bookTrip(); }}
      >
        <ModalBookingDetails bookResult={bookResult} type={type} />
      </Modal>

      <Modal
        title="Check Out Form"
        open={showModalPayment}
        isCheckoutModal={true}
        backdrop="static"
        setOpen={show => setModalPayment(show)}
      >
        <Elements>
          {showModalPayment && <CheckoutForm 
          currentTrip = {currentTrip} 
          setQuery = {query => {setBookingError(query); setModalPayment(false)}}
          setOpen={show => setModalPayment(show)}
          
          />}
        </Elements>
      </Modal>


      {/* Booking details */}
      <Modal
        title="Select your train station"
        open={showModalDepartureTrain}
        backdrop="static"
        setOpen={show => setModalDepartureTrain(show)}
      >
        <ModalDepartureTrain
          setQuery={query => {
            setDepartureQuery(query);
            setModalDepartureTrain(false);
          }}
        />
      </Modal>
      <Modal
        title="Select your airport"
        open={showModalDepartureAirport}
        backdrop="static"
        setOpen={show => setModalDepartureAirport(show)}
      >
        <ModalDepartureAirport
          setQuery={query => {
            setDepartureQuery(query);
            setModalDepartureAirport(false);
          }}
        />
      </Modal>
      <Modal
        title="Select my addresses"
        backdrop="static"
        open={showModalDepartureAddress}
        setOpen={show => setModalDepartureAddress(show)}
      >
        <ModalDepartureAddress
          id={"autocompleteArrival"}
          setQuery={query => {
            setDepartureQuery(query);
            setModalDepartureAddress(false);
          }}
        />
      </Modal>
      {/* End departure */}

      {/* Arrival */}
      <Modal
        title="Select your airport"
        open={showModalArrivalTrain}
        backdrop="static"
        setOpen={show => setModalArrivalTrain(show)}
      >
        <ModalArrivalTrain
          setQuery={query => {
            setArrivalQuery(query);
            setModalArrivalTrain(false);
          }}
        />
      </Modal>
      <Modal
        title="Select your train station"
        open={showModalArrivalAirport}
        backdrop="static"
        setOpen={show => setModalArrivalAirport(show)}
      >
        <ModalArrivalAirport
          setQuery={query => {
            setArrivalQuery(query);
            setModalArrivalAirport(false);
          }}
        />
      </Modal>
      <Modal
        title="Select your train station"
        open={showModalArrivalAddress}
        backdrop="static"
        setOpen={show => setModalArrivalAddress(show)}
      >
        <ModalArrivalAddress
          setQuery={query => {
            setArrivalQuery(query);
            setModalArrivalAddress(false);
          }}
        />
      </Modal>
      {/* Arrival */}
    </Fragment>
  );
};

export default MapWrapper;
