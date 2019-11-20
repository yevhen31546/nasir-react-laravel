import React, { Fragment } from "react";

const Footer = () => (
  <Fragment>
    <footer
      className="wheel-footer"
      style={{
        backgroundImage: "url(/images/footerBg.jpg)"
      }}
    >
      <div className="container">
        <div className="row">
          <div className="col-md-3 col-sm-6 padd-lr0">
            <div className="wheel-address">
              <div className="wheel-footer-logo">
                <a href="#">
                  <img
                    src="images/white_log.png"
                    style={{ width: "120px" }}
                    alt=""
                  />
                </a>
              </div>
              <ul>
                <li>
                  <span>
                    <i className="fa fa-map-marker"></i>121 King Street, Melbourne{" "}
                    <br />
                    VIC 3000, Australia{" "}
                  </span>
                </li>
                <li>
                  <a href="#">
                    <span>
                      <i className="fa fa-phone"></i> +61 3 8376 6284
                    </span>
                  </a>
                </li>
                <li>
                  <a href="#">
                    <span>
                      <i className="fa fa-envelope"></i>contact@wheel-rental.com
                    </span>
                  </a>
                </li>
              </ul>
              <div className="wheel-soc">
                <a href="#" className="fa fa-twitter"></a>
                <a href="#" className="fa fa-facebook"></a>
                <a href="#" className="fa fa-linkedin"></a>
                <a href="#" className="fa fa-instagram"></a>
                <a href="#" className="fa fa-share-alt"></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </footer>
    <div className="wheel-footer-info wheel-bg6">
      <div className="container">
        <div className="row">
          <div className="col-lg-8 col-sm-6 padd-lr0">
            <span>
              © WHEEL 2019 | Designed with Love &amp; Developed By{" "}
              <a href="http://thinktiveconsultancy.com/">Thinktive</a>
            </span>
          </div>
          <div className="col-lg-4 col-sm-6 padd-lr0"></div>
        </div>
      </div>
    </div>
  </Fragment>
);

export default Footer;
