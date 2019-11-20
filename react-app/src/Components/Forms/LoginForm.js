import React from "react";
import PropTypes from "prop-types";

const LoginForm = ({ setModalForgotPssword }) => {
  return (
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
      <div className="form-group">
        <label for="exampleInputPassword1" className="col-sm-2 control-label">
          Password
        </label>
        <div className="col-sm-10">
          <input
            type="email"
            className="form-control"
            id="exampleInputPassword1"
            placeholder="Email"
          />
        </div>
      </div>
      <div className="row">
        <div className="col-sm-10 submit-button-div">
          <button
            type="submit"
            className="btn btn-primary btn-sm submitButton cursor-pointer submit-mobile"
            style={{ "marginLeft": "16px", "marginRight": "10px" }}
          >
            Submit
          </button>
          <a
            id="forgotPassword"
            className="forgot-password cursor-pointer"
            style={{ color: "#0062cc" }}
            data-toggle="modal"
            data-target="#forgotModal"
            onClick={() => setModalForgotPssword(true)}
          >
            Forgot your password?
          </a>
        </div>
      </div>
    </form>
  );
};

LoginForm.propTypes = {
  setModalForgotPssword: PropTypes.func
};

export default LoginForm;
