import React, { Fragment, PureComponent } from "react";

class GoogleAutocomplete extends PureComponent {

  componentDidMount()  {
    const options = {
     componentRestrictions:{ country: [ 'fr']},
    }; 
    
    this.autocomplete = new this.props.googleMapsObj.places.Autocomplete(
      document.getElementById(this.props.id),
      options
    );

    // Avoid paying for data that you don't need by restricting the set of
    // place fields that are returned to just the address components and formatted
    // address.
    this.autocomplete.setFields(["address_components", "formatted_address", "geometry"]);

    // Fire Event when a suggested name is selected
    this.autocomplete.addListener("place_changed", this.handlePlaceSelect);
  };

  handlePlaceSelect = () => {
    // Extract City From Address Object
    const addressObject = this.autocomplete.getPlace();
    const address = addressObject.address_components;

    // Check if address is valid
    if (address) {
   
      this.props.setQuery({
        value: addressObject.formatted_address,
        lat: addressObject.geometry.location.lat(),
        lng: addressObject.geometry.location.lng()
      }
      )
    }
  };

  render() {
    const { placeholder, id, setQuery, query} = this.props;
    // const { query } = this.state;

    return (
      <Fragment>
       
        <input
          placeholder={placeholder}
          className="form-control"
          id={id}
          hintText="Search City"
          onChange={e => setQuery({value: e.target.value} )}
          value={query.value}
        />
      </Fragment>
    );
  }
}

export default GoogleAutocomplete;
