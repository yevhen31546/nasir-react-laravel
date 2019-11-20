import React, { useState } from "react";
import ReactDOM from "react-dom";
import { compose, withProps } from "recompose";
import {
  withScriptjs,
  withGoogleMap,
  GoogleMap,
  Marker,
  DirectionsRenderer
} from "react-google-maps";

const googleMapsApiKey = "AIzaSyBSLYqbiXK4uHXS-mdR3VBftDL9V9IS4Xs";

export const SimpleMap = compose(
  withProps({
    googleMapURL: `https://maps.googleapis.com/maps/api/js?key=${googleMapsApiKey}&v=3.exp&libraries=geometry,drawing,places`,
    loadingElement: <div style={{ height: `100%` }} />,
    containerElement: <div style={{ height: `100%`, minHeight: `400px` }} />,
    mapElement: <div style={{ height: `100%` }} />
  }),
  withScriptjs,
  withGoogleMap
)(({ departureQuery, arrivalQuery, onGoogleApiLoaded,myPosition }) => {
  onGoogleApiLoaded(window.google);
  return (
    <GoogleMap
      defaultZoom={8}
      defaultCenter={myPosition}
    >
      {departureQuery.lat && !arrivalQuery.lat && (
        <Marker
          position={{ lat: departureQuery.lat, lng: departureQuery.lng }}
        />
      )}

      {arrivalQuery.lat && !departureQuery.lat &&(
        <Marker position={{ lat: arrivalQuery.lat, lng: arrivalQuery.lng }} />
      )}

      {arrivalQuery.lat && arrivalQuery.lat && (
        <RenderMapDirectionsRenderer
          departureQuery={departureQuery}
          arrivalQuery={arrivalQuery}
        />
      )}
    </GoogleMap>
  );
});

export const RenderMapDirectionsRenderer = ({
  departureQuery,
  arrivalQuery
}) => {
  const [directions, setDirections] = useState(0);
  const directionsService = new window.google.maps.DirectionsService();

  const origin = { lat: departureQuery.lat, lng: departureQuery.lng };
  const destination = { lat: arrivalQuery.lat, lng: arrivalQuery.lng };

  directionsService.route(
    {
      origin: origin,
      destination: destination,
      travelMode: window.google.maps.TravelMode.DRIVING
    },
    (result, status) => {
      if (status === window.google.maps.DirectionsStatus.OK) {
        setDirections(result);
      } else {
        console.error(`error fetching directions ${result}`);
      }
    }
  );
  return directions ? <DirectionsRenderer directions={directions} /> : <div />;
};

export default SimpleMap;
