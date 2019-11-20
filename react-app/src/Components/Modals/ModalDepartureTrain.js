import React from "react";
import { _departureTrainData } from "../../Constants";

const ModalDepartureTrain = ({ setQuery }) => (
  <select className="form-control" size="7">
    {_departureTrainData.map(elem => (
      <option value={elem.value} onClick={() => setQuery(elem)}>
        {elem.value}
      </option>
    ))}
  </select>
);

export default ModalDepartureTrain;
