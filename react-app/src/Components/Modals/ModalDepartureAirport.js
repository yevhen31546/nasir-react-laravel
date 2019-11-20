import React, { Fragment } from "react";
import {
  _departureAirportData1,
  _departureAirportData2,
  _departureAirportData3
} from "../../Constants";

const ModalDepartureAirport = ({ setQuery }) => (
  <Fragment>
    <select className="form-control" size="17">
      <optgroup label="Airport Roissy Charles de Gaules"></optgroup>
      {_departureAirportData1.map(elem => (
        <option value={elem.value} onClick={() => setQuery(elem)}>
          {elem.value}
        </option>
      ))}
      <optgroup label="Airport Orly"></optgroup>
      {_departureAirportData2.map(elem => (
        <option value={elem.value} onClick={() => setQuery(elem)}>
          {elem.value}
        </option>
      ))}
      <optgroup label="Airport Le Bourget"></optgroup>
      {_departureAirportData3.map(elem => (
        <option value={elem.value} onClick={() => setQuery(elem)}>
          {elem.value}
        </option>
      ))}
    </select>
  </Fragment>
);

export default ModalDepartureAirport;
