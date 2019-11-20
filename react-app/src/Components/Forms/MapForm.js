import React, { Fragment, useState, useEffect } from "react";
import PropTypes from "prop-types";

// Components
import Input from "../Forms/Input";
import GoogleAutocomplete from "../GoogleAutocomplete";
import DatePicker from "../DatePicker";

const MapForm = ({
  isDetailsPage,
  setArrivalQuery,
  setDepartureQuery,
  departureQuery,
  arrivalQuery,
  googleMapsObj,
  fetchPrice,
  setDate,
  setType,
  type,
  date,
  setModalDepartureTrain,
  setModalDepartureAirport,
  setModalDepartureAddress,
  setModalArrivalTrain,
  setModalArrivalAirport,
  setModalArrivalAddress,
  setMyPosition,
  bookingError
}) => {
  return (
    <Fragment>
      <div
        className="col-md-4  tabs advanced-real-estate-tabs nomargin clearfix"
        style={{ maxWidth: "500px", top: "20px" }}
      >
        <div className="tab-container">
          <div className="tab-content clearfix" id="tab-buy">
            <div id="error_div" className="style-msg errormsg hidden">
              <div id="error_msg" className="sb-msg">
                <i className="icon-remove"></i>Merci de remplir les champs
                obligatoires
              </div>
            </div>
            <div
              className="row"
              id="course_forme"
              action="#"
              method="post"
              enctype="multipart/form-data"
            >
              <div className="row">
                <div className="col-md-12 col-12 bottommargin-sm">
                  <label for="">DEPARTURE POINT*</label>
                  <div className="input-group">
                    <div className="input-group-prepend">
                      <span
                        data-toggle="modal"
                        data-target="#ModalTrainDepart"
                        className="input-group-text"
                        onClick={() => setModalDepartureTrain(true)}
                      >
                        <i className="fas fa-train"></i>
                      </span>
                      <span
                        data-toggle="modal"
                        data-target="#ModalPlaneDepart"
                        className="input-group-text"
                        onClick={() => setModalDepartureAirport(true)}
                      >
                        <i className="fas fa-plane-departure"></i>
                      </span>
                      {isDetailsPage && (
                        <span
                          data-toggle="modal"
                          data-target="#ModalSavedAddressDepart"
                          class="input-group-text"
                          onClick={() => setModalDepartureAddress(true)}
                        >
                          <i class="fas fa-address-book"></i>
                        </span>
                      )}
                    </div>

                    <GoogleAutocomplete
                      id={"autocompleteDeparture"}
                      placeholder="Enter an address or a place of departure"
                      query={departureQuery}
                      setQuery={query => setDepartureQuery(query)}
                      googleMapsObj={googleMapsObj}
                    />

                    <input
                      id="lieu_depart_lat"
                      name="lieu_depart_lat"
                      type="hidden"
                      className="form-control required"
                      value=""
                    />
                    <input
                      id="lieu_depart_let"
                      name="lieu_depart_let"
                      type="hidden"
                      className="form-control required"
                      value=""
                    />
                    <div
                      className="input-group-append"
                      onClick={() => setMyPosition()}
                    >
                      <span className="input-group-text">
                        <i className="fas fa-crosshairs"></i>
                      </span>
                    </div>
                  </div>
                </div>

                <div className="col-md-12 col-12 bottommargin-sm">
                  <label for="">ARRIVAL POINT*</label>
                  <div className="input-group">
                    <div className="input-group-prepend">
                      <span
                        data-toggle="modal"
                        data-target="#ModalTrainArrive"
                        className="input-group-text"
                        onClick={() => setModalArrivalTrain(true)}
                      >
                        <i className="fas fa-train"></i>
                      </span>
                      <span
                        data-toggle="modal"
                        data-target="#ModalPlaneArrive"
                        className="input-group-text"
                        onClick={() => setModalArrivalAirport(true)}
                      >
                        <i className="fas fa-plane-arrival"></i>
                      </span>
                      {isDetailsPage && (
                        <span
                          data-toggle="modal"
                          data-target="#ModalSavedAddressDepart"
                          class="input-group-text"
                          onClick={() => setModalArrivalAddress(true)}
                        >
                          <i class="fas fa-address-book"></i>
                        </span>
                      )}
                    </div>
                    <GoogleAutocomplete
                      id={"autocompleteArrival"}
                      placeholder="Enter an address or a place of arrival"
                      query={arrivalQuery}
                      setQuery={query => setArrivalQuery(query)}
                      googleMapsObj={googleMapsObj}
                    />

                    <input
                      id="lieu_arrive_lat"
                      name="lieu_arrive_lat"
                      type="hidden"
                      className="form-control required"
                      value=""
                    />
                    <input
                      id="lieu_arrive_let"
                      name="lieu_arrive_let"
                      type="hidden"
                      className="form-control required"
                      value=""
                    />
                    <input
                      id="distance"
                      name="distance"
                      type="hidden"
                      className="form-control required"
                      value=""
                    />
                    <input
                      id="time"
                      name="time"
                      type="hidden"
                      className="form-control required"
                      value=""
                    />
                  </div>
                </div>
                <div className="w-100"></div>
                <div className="col-md-12 col-12 bottommargin-sm">
                  <label for="">BOOK</label>

                  <div
                    className="btn-group btn-group-toggle d-flex"
                    data-toggle="buttons"
                  >
                    <label
                      id="avance_radio"
                      for="template-contactform-platform-mobile"
                      className={`btn btn-outline-secondary flex-fill t600 ls0 nott ${!type &&
                        "active"}`}
                      onClick={() => setType(false)}
                    >
                      <input
                        type="radio"
                        name="reservation"
                        checked=""
                        value="0"
                      ></input>
                      Now
                    </label>
                    <label
                      id="avance_radio_"
                      for="template-contactform-platform-web"
                      className={`btn btn-outline-secondary flex-fill t600 ls0 nott ${type &&
                        "active"}`}
                      onClick={() => setType(true)}
                    >
                      <input type="radio" name="reservation" value="1"></input>
                      In advance
                    </label>
                  </div>
                </div>

                {type && (
                  <div className="col-md-12 col-12 bottommargin-sm ">
                    <label for="">DATE DEPARTURE</label>
                    <div className="input-group">
                      <div className="input-group-prepend">
                        <div className="input-group-text">
                          <i className="fas fa-calendar"></i>
                        </div>
                      </div>
                      <div className="form-control datePicker">
                        <DatePicker setDate={setDate} date={date} />
                        {/* <DatePicker
                          selected={date}
                          onChange={setDate}
                          className=""
                          showTimeSelect
                          placeholderText="MM/DD/YYYY 00:00 AM/PM"
                          dateFormat="Pp"
                        /> */}
                      </div>
                    </div>
                  </div>
                )}
                <div className="col-md-12 clearfix">
                  <button
                    className="button button-3d button-rounded btn-block nomargin view-price"
                    onClick={() => fetchPrice()}
                    // setModalBookingDetails(true)}
                    disabled={
                      !arrivalQuery.lat || !departureQuery.lat ? true : false
                    }
                  >
                    VIEW PRICE
                  </button>
                  {bookingError && (
                    <div class="alert alert-danger" role="alert">
                      {bookingError}
                    </div>
                  )}
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </Fragment>
  );
};

MapForm.propTypes = {
  isDetailsPage: PropTypes.bool,
  fetchPrice: PropTypes.func
};

export default MapForm;
