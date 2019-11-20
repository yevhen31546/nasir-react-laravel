import React from "react";

const ModalInvoice = () => (
  <div className="row">
    <div className="col-md-12">
      {/* <!-- Nav tabs --> */}
      <ul className="nav nav-tabs" style={{ "justify-content": "center" }}>
        <li className="active" style={{ "marginBottom": "16px" }}>
          <a
            className="booking-details-header active"
            style={{ color: "black" }}
            href="#Login"
            data-toggle="tab"
          >
            Invoice
          </a>
        </li>
      </ul>
      {/* <!-- Tab panes --> */}
      <div className="tab-content">
        <div className="tab-pane active" id="Login">
          <form role="form" className="form-horizontal">
            <div className="form-group border-bottom-form">
              <label for="email" className="col-sm-4 control-label ">
                Starting Point:
              </label>
              <p className="inline-block">Sydney</p>
            </div>
            <div className="form-group border-bottom-form">
              <label for="email" className="col-sm-4 control-label">
                Destination:
              </label>
              <p className="inline-block">Melbourne</p>
            </div>
            <div className="form-group border-bottom-form">
              <label for="email" className="col-sm-4 control-label">
                Trip Completion:
              </label>
              <p className="inline-block">24 Sep 2018 15:44</p>
            </div>
            <div className="form-group border-bottom-form">
              <label for="email" className="col-sm-4 control-label">
                Time
              </label>
              <p className="inline-block">40 minutes</p>
            </div>
            <div className="form-group border-bottom-form">
              <label for="email" className="col-sm-4 control-label">
                Total Amount
              </label>
              <p className="inline-block">2.40</p>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
);

export default ModalInvoice;
