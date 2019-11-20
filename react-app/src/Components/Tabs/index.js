import React from "react";
import { Tabs, Tab } from "react-bootstrap-tabs";

// Tabls
import InfoTab from "./InfoTab";
import ManageAddressTab from "./ManageAddressTab";

const TabsWrapper = () => (
  <div className="manage-tabs" style={{ background: "#fafafa" }}>
    <section className="container py-4">
      <Tabs onSelect={(index, label) => console.log(label + " selected")}>
        <Tab label="MY TRIPS">
          <InfoTab type="invoice"/>
        </Tab>
        <Tab label="MY BOOKINGS">
          <InfoTab />
        </Tab>
        <Tab label="MANAGE ADDRESS">
          <ManageAddressTab />
        </Tab>
      </Tabs>
    </section>
  </div>
);
export default TabsWrapper;
//   <div className="manage-tabs" style={{ background: "#fafafa" }}>
//     <section className="container py-4">
//       <div className="row">
//         <div className="col-md-12">
//           <ul id="tabsJustified" className="nav nav-tabs">
//             <li className="nav-item">
//               <a
//                 href=""
//                 data-target="#home1"
//                 data-toggle="tab"
//                 className="nav-link small text-uppercase home-nav"
//               >
//                 My Trips
//               </a>
//             </li>
//             <li className="nav-item">
//               <a
//                 href=""
//                 data-target="#profile1"
//                 data-toggle="tab"
//                 className="nav-link small text-uppercase home-nav"
//               >
//                 My Bookings
//               </a>
//             </li>
//             <li className="nav-item">
//               <a
//                 href=""
//                 data-target="#messages1"
//                 data-toggle="tab"
//                 className="nav-link small text-uppercase home-nav active"
//               >
//                 Manage Address
//               </a>
//             </li>
//           </ul>
//           <br />
//           <div id="tabsJustifiedContent" className="tab-content"></div>
//           <div id="home1" className="tab-pane fade">
//             <div className="container">
//               <table className="table">
//                 <thead>
//                   <tr>
//                     <th scope="col">#</th>
//                     <th scope="col">Name</th>
//                     <th scope="col">Cost</th>
//                     <th scope="col">Booking Date</th>
//                     <th scope="col"></th>
//                   </tr>
//                 </thead>
//                 <tbody>
//                   <tr>
//                     <th scope="row">1</th>
//                     <td>Mark</td>
//                     <td>15</td>
//                     <td>2019-08-11 15:12</td>
//                     <td>
//                       <button
//                         data-toggle="modal"
//                         data-target="#detailsModal"
//                         type="submit"
//                         className="btn btn-primary btn-sm submitButton"
//                         style={{
//                           "marginLeft": "16px",
//                           "marginRight": "10px"
//                         }}
//                       >
//                         Details
//                       </button>
//                     </td>
//                   </tr>
//                   <tr>
//                     <th scope="row">2</th>
//                     <td>Tob</td>
//                     <td>15</td>
//                     <td>2019-08-11 15:12</td>
//                     <td>
//                       <button
//                         type="submit"
//                         data-toggle="modal"
//                         data-target="#detailsModal"
//                         className="btn btn-primary btn-sm submitButton"
//                         style={{ "margin-lef": "16px", "marginRight": "10px" }}
//                       >
//                         Details
//                       </button>
//                     </td>
//                   </tr>
//                   <tr>
//                     <th scope="row">3</th>
//                     <td>Larry</td>
//                     <td>15</td>
//                     <td>2019-08-11 15:12</td>
//                     <td>
//                       <button
//                         type="submit"
//                         data-toggle="modal"
//                         data-target="#detailsModal"
//                         className="btn btn-primary btn-sm submitButton"
//                         style={{ "margin-lef": "16px", "marginRight": "10px" }}
//                       >
//                         Details
//                       </button>
//                     </td>
//                   </tr>
//                 </tbody>
//               </table>
//             </div>
//           </div>
//           <div id="profile1" className="tab-pane fade">
//             <table className="table">
//               <thead>
//                 <tr>
//                   <th scope="col">#</th>
//                   <th scope="col">Name</th>
//                   <th scope="col">Cost</th>
//                   <th scope="col">Booking Date</th>
//                   <th scope="col"></th>
//                 </tr>
//               </thead>
//               <tbody>
//                 <tr>
//                   <th scope="row">1</th>
//                   <td>Mark</td>
//                   <td>15</td>
//                   <td>2019-08-11 15:12</td>
//                   <td>
//                     <button
//                       type="submit"
//                       data-toggle="modal"
//                       data-target="#detailsModal"
//                       className="btn btn-primary btn-sm submitButton"
//                       style={{ "margin-lef": "16px", "marginRight": "10px" }}
//                     >
//                       Details
//                     </button>
//                   </td>
//                 </tr>
//                 <tr>
//                   <th scope="row">2</th>
//                   <td>Tob</td>
//                   <td>15</td>
//                   <td>2019-08-11 15:12</td>
//                   <td>
//                     <button
//                       type="submit"
//                       data-toggle="modal"
//                       data-target="#detailsModal"
//                       className="btn btn-primary btn-sm submitButton"
//                       style={{ "margin-lef": "16px", "marginRight": "10px" }}
//                     >
//                       Details
//                     </button>
//                   </td>
//                 </tr>
//                 <tr>
//                   <th scope="row">3</th>
//                   <td>Larry</td>
//                   <td>15</td>
//                   <td>2019-08-11 15:12</td>
//                   <td>
//                     <button
//                       type="submit"
//                       data-toggle="modal"
//                       data-target="#detailsModal"
//                       className="btn btn-primary btn-sm submitButton"
//                       style={{ "margin-lef": "16px", "marginRight": "10px" }}
//                     >
//                       Details
//                     </button>
//                   </td>
//                 </tr>
//               </tbody>
//             </table>
//           </div>
//           <div id="messages1" className="tab-pane fade active show">
//             <div className="col-md-8 col-12 bottommargin-sm">
//               <label for="">ADDRESS</label>
//               <div className="input-group">
//                 <input
//                   style={{ border: "1px solid #ced4da !important" }}
//                   id="lieu_address"
//                   type="text"
//                   name="lieu_address"
//                   className="form-control required"
//                   placeholder="Enter an address or a place"
//                 />
//                 <input
//                   id="lieu_address_lat"
//                   name="lieu_address_lat"
//                   type="hidden"
//                   className="form-control required"
//                 />
//                 <input
//                   id="lieu_address_let"
//                   name="lieu_address_let"
//                   type="hidden"
//                   className="form-control required"
//                 />
//                 <div className="input-group-append">
//                   <span className="input-group-text">
//                     <i className="fas fa-crosshairs"></i>
//                   </span>
//                 </div>
//               </div>
//               <div
//                 className="col-md-12 col-12 bottommargin-sm"
//                 style={{
//                   "paddingLeft": "0px",
//                   "paddingRight": "0px",
//                   "margin-top": "30px"
//                 }}
//               >
//                 <label for="">Type</label>

//                 <div
//                   className="btn-group btn-group-toggle d-flex"
//                   data-toggle="buttons"
//                 >
//                   <label
//                     id="avance_radio_0"
//                     for="template-contactform-platform-mobile"
//                     className="btn btn-outline-secondary flex-fill t600 ls0 nott active"
//                   >
//                     <input
//                       type="radio"
//                       name="reservation"
//                       checked=""
//                       value="0"
//                     />{" "}
//                     Home
//                   </label>
//                   <label
//                     id="avance_radio_1"
//                     for="template-contactform-platform-web"
//                     className="btn btn-outline-secondary flex-fill t600 ls0 nott"
//                   >
//                     <input type="radio" name="reservation" value="1" /> Work
//                   </label>
//                   <label
//                     id="avance_radio_2"
//                     for="template-contactform-platform-web"
//                     className="btn btn-outline-secondary flex-fill t600 ls0 nott"
//                   >
//                     <input type="radio" name="reservation" value="1" />{" "}
//                     Favourite
//                   </label>
//                 </div>
//               </div>
//               <div
//                 className="clearfix"
//                 style={{ "marginRight": "4px", "marginLeft": "-4px" }}
//               >
//                 <a
//                   data-toggle="modal"
//                   data-target="#viewPriceModal"
//                   className="button button-3d button-rounded btn-block nomargin view-price"
//                 >
//                   Add Address
//                 </a>
//               </div>
//             </div>
//           </div>
//         </div>
//       </div>
//     </section>
//   </div>
// );
