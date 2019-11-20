import React from "react";
import { Link } from "react-router-dom";

const HeaderPage = () => (
  <div className="wheel-menu-wrap active-scroll">
    <div className="container-fluid wheel-bg1">
      <div className="row">
        <div className="col-sm-3">
          <div className="wheel-logo">
            <Link to="/">
              <img src="/images/image_2019_11_06T21_25_55_012Z.png" alt="" />
            </Link>
          </div>
        </div>
        <div className="col-sm-9 " style={{ "paddingRight": "0px" }}>
          <div className="col-sm-12 col-xs-12 padd-lr0">
            <div className="wheel-top-menu clearfix">
              <div className="wheel-top-menu-info">
                <div className="top-menu-item">
                  <a href="tel:+91 22 55412474">
                    <i className="fa fa-phone"></i>
                    <span>(91) 22 55412474</span>
                  </a>
                </div>
                <div className="top-menu-item">
                  <a href="mailto:info@canvas.com">
                    <i className="fa fa-envelope"></i>
                    <span>info@canvas.com</span>
                  </a>
                </div>
              </div>
              <div className="wheel-top-menu-log">
                <div className="top-menu-item">
                  <div className="dropdown wheel-lang-ico">
                    <button
                      className="btn btn-default dropdown-toggle"
                      type="button"
                      data-toggle="dropdown"
                      aria-haspopup="true"
                      aria-expanded="true"
                    >
                      Fr
                      <span className="caret"></span>
                    </button>
                    <ul className="dropdown-menu">
                      <li>
                        <a href="#">English</a>
                      </li>
                      <li>
                        <a href="#">France</a>
                      </li>
                    </ul>
                  </div>
                </div>
                <div className="top-menu-item"></div>
              </div>
            </div>
          </div>
          <div className="col-sm-12">
            <div className="wheel-navigation">
              <nav id="dl-menu">
                <ul className="main-menu dl-menu">
                  <li className="menu-item current-menu-parent menu-item-has-children active-color">
                    <a href="index.html">
                      Home<span className="fa fa-angle-right "></span>
                    </a>
                  </li>
                  <li className="menu-item menu-item-has-children">
                    <a id="book-now">
                      Book Now<span className="fa fa-angle-right "></span>
                    </a>
                  </li>
                </ul>
                <div className="nav-menu-icon">
                  <i></i>
                </div>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
);
export default HeaderPage;
