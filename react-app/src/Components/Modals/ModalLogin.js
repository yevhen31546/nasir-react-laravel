import React, { useState } from "react";
import PropTypes from "prop-types";

// Forms
import LoginForm from "../Forms/LoginForm";
import RegistrationForm from "../Forms/RegistrationForm";

const ModalLogin = ({ showModalRegistration, setModalForgotPssword }) => {
  const [showRegistration, setRegistration] = useState(showModalRegistration);
  return (
    <div className="row">
      <div
        className="col-md-8"
        style={{
          "borderRight": "1px dotted #C2C2C2",
          "paddingRight": "30px"
        }}
      >
        <ul className="nav nav-tabs">
          <li
            className="active"
            style={{
              "paddingRight": "10px",
              "borderRight": "1px dotted #C2C2C2",
              "marginBottom": "12px"
            }}
          >
            <a
              style={{ color: "black" }}
              onClick={() => setRegistration(false)}
            >
              Login
            </a>
          </li>
          <li style={{ "paddingLeft": "10px" }}>
            <a style={{ color: "black" }} onClick={() => setRegistration(true)}>
              Registration
            </a>
          </li>
        </ul>
        <div className="tab-content">
          <div className="tab-pane" id="Login"></div>
          {/* Toggle modals */}
          {showRegistration ? (
            <RegistrationForm />
          ) : (
            <LoginForm setModalForgotPssword={setModalForgotPssword} />
          )}
          {/* Toggle modals */}
          <div className="tab-pane active" id="Registration"></div>
        </div>
        <div id="OR" className="hidden-xs or">
          OR
        </div>
      </div>
      <div className="col-md-4">
        <div className="row text-center sign-with">
          <div className="col-md-12 login-text">
            <h7>Login with social media</h7>
          </div>
          <div className="col-md-12">
            <div className="btn-group btn-group-justified social-btn-div">
              <a
                href="#"
                className="btn btn-primary social-btn facebook cursor-pointer"
              >
                <i className="fa fa-facebook">&nbsp; Facebook</i>
              </a>

              <a
                href="#"
                className="btn btn-danger social-btn google cursor-pointer "
              >
                <i className="fa fa-google"></i>&nbsp; Google
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  );
};

ModalLogin.propTypes = {
  showModalRegistration: PropTypes.bool,
  setModalForgotPssword: PropTypes.func
};

export default ModalLogin;
