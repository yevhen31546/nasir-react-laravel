import React, { Fragment, useEffect, useState } from "react";
import $ from "jquery";

// Modals
import Modal from "../Components/Modals";
import ModalLogin from "../Components/Modals/ModalLogin";
import ModalForgotPssword from "../Components/Modals/ModalForgotPssword";

const Header = () => {
  const [showModalLogin, setModalLogin] = useState(true);
  const [showModalRegistration, setModalRegistration] = useState(false);
  const [showModalForgotPssword, setModalForgotPssword] = useState(false);

  useEffect(() => {
    // Scroll menu
    function undateMenu() {
      var scrollTop = window.pageYOffset;
      var menu = $(".wheel-menu-wrap ");

      if (scrollTop > 5 || $(window).width() < 993) {
        if (scrollTop > 5) {
          menu.addClass("active-scroll");
        } else {
          menu.removeClass("active-scroll");
        }
      } else if (scrollTop < 5 || $(window).width() > 993) {
        menu.removeClass("active-scroll");
      }
    }

    $(window).on("scroll", function() {
      undateMenu();
    });

    $(window).on("load resize", function() {
      undateMenu();
    });
  });

  return (
    <Fragment>
      <div className="wheel-menu-wrap">
        <div className="container-fluid wheel-bg1">
          <div className="row">
            <div className="col-sm-3">
              <div className="wheel-logo">
                <a href="index.html">
                  <img src="images/image_2019_11_06T21_25_55_012Z.png" alt="" />
                </a>
              </div>
            </div>
            <div className="col-sm-9 ">
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
                      <ul className="main-menu dl-menu">
                        <li>
                          <a
                            href="#"
                            data-toggle="modal"
                            data-target="#myModal"
                            onClick={() => setModalLogin(true)}
                          >
                            Login
                          </a>
                        </li>
                        <li>
                          <a
                            href="#"
                            data-toggle="modal"
                            data-target="#myModal"
                            onClick={() => {
                              setModalRegistration(true);
                              setModalLogin(true);
                            }}
                          >
                            Signup
                          </a>
                        </li>
                      </ul>
                    </div>
                    <div className="top-menu-item">
                      <div className="dropdown wheel-lang-ico">
                        <button
                          className="btn btn-default dropdown-toggle"
                          type="button"
                          data-toggle="dropdown"
                          aria-haspopup="true"
                          aria-expanded="true"
                        >
                          FR
                          <span className="caret"></span>
                        </button>
                        <ul className="dropdown-menu">
                          <li className="lang-dropdown">
                            <a href="#">ENGLISH</a>
                          </li>
                          <li className="lang-dropdown">
                            <a href="#">FRANCE</a>
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
                      <li className="menu-item current-menu-parent menu-item-has-children">
                        <a href="#">
                          Driver<span className="fa fa-angle-right "></span>
                        </a>
                      </li>
                      <li className="menu-item menu-item-has-children cursor-pointer">
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
      {/* Modal login */}
      <Modal
        title=""
        open={showModalLogin}
        setOpen={show => {
          setModalLogin(show);
          !show && setModalRegistration(false);
        }}
        size="lg"
      >
        <ModalLogin
          showModalRegistration={showModalRegistration}
          setModalForgotPssword={() => {
            setModalLogin(false);
            setModalForgotPssword(true);
          }}
        />
      </Modal>

      {/* End Modal login */}

      {/* Modal forgot password */}
      <Modal
        title=""
        open={showModalForgotPssword}
        setOpen={show => {
          setModalForgotPssword(show);
          !show && setModalForgotPssword(false);
        }}
        size="lg"
      >
        <ModalForgotPssword />
      </Modal>

      {/* End Modal forgot password */}
    </Fragment>
  );
};

export default Header;
