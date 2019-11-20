import React, { Fragment } from "react";

// Containers
import Map from "../Containers/Map";


const Home = () => (
  <Fragment>
    {/* Section: Slider */}
    <div id="myslider" className="carousel slide" data-ride="carousel">
      <div className="carousel-inner bike-carousel-div">
        <div className="item bg bg1 active bike-carousel">
          <div>
            <div className="carousel-caption book-now-div cursor-pointer">
              <a
                id="book-now-1"
                className="wheel-cheader-but"
                target="_blank"
                style={{
                  float: "none",
                  padding: "10px 100px",
                  top: "10px"
                }}
              >
                Book Now
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
    {/* End section: Slider */}

    {/* Section: Transport service */}
    <div className="wheel-bg2">
      <div className="container">
        <div className="row" style={{ "justify-content": "center" }}>
          <div className="col-xs-12">
            <div className="wheel-header text-center pad-lg-t50">
              <h5>the Biggest Online </h5>
              <h3>
                <span>Transport</span> Service
              </h3>
            </div>
          </div>
          <div className="row marg-sm-t70">
            <div className="col-lg-6 col-md-6 col-xs-12 bike-image-div">
              <img
                className="bike-image"
                src="images/bottom-trust.jpg"
                alt="Bottom Trust"
              />
            </div>
            <div className="col-lg-6 col-md-6 col-xs-12 topmargin-sm text-header">
              <div className="heading-block nobottomborder pad-lg-t50-2 text-header-div">
                <h2 className="bike-text">DÉPLACEZ-VOUS AUTREMENT !</h2>
              </div>

              <ul className="iconlist iconlist-large iconlist-color">
                <li>
                  <i className="fa1 fa fa-check"></i> Disponible 24h/24 et 7j/7 sur
                  réservation
                </li>
                <li>
                  <i className="fa1 fa fa-check"></i> 20 Kg max de bagagerie (ex. 1
                  trolley + 1 portable + 1 petit sac)
                </li>
                <li>
                  <i className="fa1 fa fa-check"></i> Casque intégral avec système
                  de communication
                </li>
                <li>
                  <i className="fa1 fa fa-check"></i> Equipements fournis : veste,
                  gants, casque
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    {/* End section: Transport service */}

    {/* Container: Map */}
    <Map/>
    {/* End container: Map */}

  </Fragment>
);

export default Home;
