import React, { Fragment } from "react";

const ModalBookingDetails = ({ bookResult, bookingError, type }) => (
  <div className="row">
    <div className="col-md-12">
      {/* <!-- Nav tabs --> */}
      <ul className="nav nav-tabs" style={{ "justify-content": "center" }}>
        <li className="active" style={{ marginBottom: "16px" }}>
          <a
            className="booking-details-header active"
            style={{ color: "black" }}
            href="#Login"
            data-toggle="tab"
          >
            Booking Details
          </a>
        </li>
      </ul>
      {/* <!-- Tab panes --> */}
      <div className="tab-content">
        <div className="tab-pane active" id="Login">
          <form role="form" className="form-horizontal bookInfoTable">
            <div className="form-group border-bottom-form">
              <label for="email" className="col-sm-2 control-label ">
                Departure:
              </label>
              <p className="inline-block">{bookResult.departureQuery}</p>
            </div>
            <div className="form-group border-bottom-form">
              <label for="email" className="col-sm-2 control-label">
                Arrival:
              </label>
              <p className="inline-block">{bookResult.arrivalQuery}</p>
            </div>
            <div className="form-group border-bottom-form">
              <label for="email" className="col-sm-2 control-label">
                BookingType:
              </label>
              <p className="inline-block">{!type ? "Now" : "In advance"}</p>
            </div>
            <div className="form-group border-bottom-form">
              <label for="email" className="col-sm-2 control-label">
                Date:
              </label>
              <p className="inline-block">{bookResult.date}</p>
            </div>
            <div className="form-group border-bottom-form">
              <label for="email" className="col-sm-2 control-label">
                Distance
              </label>
              <p className="inline-block">
                {bookResult.meters > 1000
                  ? `${Math.round(bookResult.meters / 1000)} / km`
                  : `${bookResult.meters} / m`}
              </p>
            </div>
            {/* <div className="form-group border-bottom-form">
                  <label for="email" className="col-sm-2 control-label">
                    Price
                  </label> */}
            {/* <p className="inline-block"><b>{bookResult.prix_ttc.toFixed(2)}</b> euros (with vat)</p>
                <p className="inline-block">{bookResult.prix_ht.toFixed(2)} euros (without vat)</p>
                <p className="inline-block">{bookResult.price.toFixed(2)} euros (vat amount)</p> */}
            {/* </div> */}
          </form>
        </div>
      </div>
    </div>
    <div className="col-md-6 offset-md-6">
      <table class="table table-bordered mt-4">
        <tbody>
          <tr>
            <td className="tablTitle">HT PRICE</td>
            <td>{bookResult.prix_ht.toFixed(2)} €</td>
          </tr>
          <tr>
            <td className="tablTitle">VAT(10%)</td>
            <td>{bookResult.vat_amount.toFixed(2)} €</td>
          </tr>
          <tr>
            <td className="tablTitle">TOTAL PRICE</td>
            <td>{bookResult.prix_ttc.toFixed(2)} €</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
);

export default ModalBookingDetails;
