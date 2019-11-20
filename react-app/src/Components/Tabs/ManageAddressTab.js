import React, { useState } from "react";
import GoogleAutocomplete from "../GoogleAutocomplete";

const ManageAddressTab = () => {
  const [AddressOrPlaceQuery, setAddressOrPlaceQuery] = useState();
  const [type, setType] = useState("home");
  return (
    <div className="col-md-8 col-12 bottommargin-sm">
      <label for="">ADDRESS</label>
      <div className="input-group">
        <GoogleAutocomplete
          id={"autocompleteAddressOrPlace"}
          placeholder="Enter an address or a place"
          query={AddressOrPlaceQuery}
          setQuery={query => setAddressOrPlaceQuery(query)}
        />

        <input
          id="lieu_address_lat"
          name="lieu_address_lat"
          type="hidden"
          className="form-control required"
        />
        <input
          id="lieu_address_let"
          name="lieu_address_let"
          type="hidden"
          className="form-control required"
        />
        <div className="input-group-append">
          <span className="input-group-text">
            <i className="fas fa-crosshairs"></i>
          </span>
        </div>
      </div>
      <div
        className="col-md-12 col-12 bottommargin-sm"
        style={{
          paddingLeft: "0px",
          paddingRight: "0px",
          "margin-top": "30px"
        }}
      >
        <label for="">Type</label>

        <div
          className="btn-group btn-group-toggle d-flex"
          data-toggle="buttons"
        >
          <label
            id="avance_radio_0"
            for="template-contactform-platform-mobile"
            className={`btn btn-outline-secondary flex-fill t600 ls0 nott ${type ===
              "home" && "active"}`}
            onClick={() => setType("home")}
          >
            <input type="radio" name="reservation" checked="" value="0" /> Home
          </label>
          <label
            id="avance_radio_1"
            for="template-contactform-platform-web"
            className={`btn btn-outline-secondary flex-fill t600 ls0 nott ${type ===
              "work" && "active"}`}
            onClick={() => setType("work")}
          >
            <input type="radio" name="reservation" value="1" /> Work
          </label>
          <label
            id="avance_radio_2"
            for="template-contactform-platform-web"
            className={`btn btn-outline-secondary flex-fill t600 ls0 nott ${type ===
              "favourite" && "active"}`}
            onClick={() => setType("favourite")}
          >
            <input type="radio" name="reservation" value="1" /> Favourite
          </label>
        </div>
      </div>
      <div
        className="clearfix"
        style={{ marginRight: "4px", marginLeft: "-4px" }}
      >
        <a className="button button-3d button-rounded btn-block nomargin view-price">
          Add Address
        </a>
      </div>
    </div>
  );
};

export default ManageAddressTab;
