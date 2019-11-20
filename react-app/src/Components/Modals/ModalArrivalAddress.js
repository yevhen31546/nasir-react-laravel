import React, { Fragment } from "react";
import {
  _departureAddressData1,
  _departureAddressData2,
  _departureAddressData3
} from "../../Constants";

const ModalArrivalAddress = ({ setQuery }) => (
  <Fragment>
    <select className="form-control" size="17">
      <optgroup label="My Home"></optgroup>
      {_departureAddressData1.map(elem => (
        <option value={elem.value} onClick={() => setQuery(elem)}>
          {elem.value}
        </option>
      ))}
      <optgroup label="Work"></optgroup>
      {_departureAddressData2.map(elem => (
        <option value={elem.value} onClick={() => setQuery(elem)}>
          {elem.value}
        </option>
      ))}
      <optgroup label="Favourite"></optgroup>
      {_departureAddressData3.map(elem => (
        <option value={elem.value} onClick={() => setQuery(elem)}>
          {elem.value}
        </option>
      ))}
    </select>
  </Fragment>
);

export default ModalArrivalAddress;
