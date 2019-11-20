import React, { Fragment } from "react";
import Script from "react-load-script";
var dateNow = new Date();

const Datetimepicker = ({setDate, date}) => {
  const handleScriptLoad = () => {
    window.$("#depart_date").datetimepicker({

      minDate: dateNow
    }).change(function(e){
      setDate(e.target.value)
 })
}


  return (
    <Fragment>
      <Script
        url="/assets/js/jquery.datetimepicker.js"
        onLoad={handleScriptLoad}
      />
      <input
        type="text"
        class="form-control"
        id="depart_date"
        name="depart_date"
        placeholder="MM/DD/YYYY 00:00 AM/PM"
        onChange={e =>console.log('e', e.target.value)}
        autocomplete="off" 
        value={date}
      />

   
    </Fragment>
  );
};

export default Datetimepicker;
