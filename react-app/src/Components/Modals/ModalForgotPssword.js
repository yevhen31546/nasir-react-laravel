import React from "react";

const ModalForgotPssword = () => (
  <form role="form" className="form-horizontal">
    <div className="form-group">
      <label for="email" className="col-sm-2 control-label">
        Email
      </label>
      <div className="col-sm-10">
        <input
          type="email"
          className="form-control"
          id="email1"
          placeholder="Email"
        />
      </div>
    </div>
    <div className="row">
      <div className="col-sm-10">
        <button
          type="submit"
          className="btn btn-primary btn-sm submitButton"
          style={{
            "marginLeft": "16px",
            "marginRight": "10px",
            width: "160px"
          }}
        >
          SEND AN EMAIL
        </button>
      </div>
    </div>
  </form>
);

export default ModalForgotPssword;
