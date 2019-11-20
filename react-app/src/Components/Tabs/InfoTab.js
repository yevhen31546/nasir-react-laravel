import React, { Fragment, useState } from "react";

// Modals
import Modal from "../Modals";
import ModalBookingDetails from "../Modals/ModalBookingDetails";
import ModalInvoice from "../Modals/ModalInvoice";

const InfoTab = ({type="details"}) => {
  const [showModalBookingDetails, setModalBookingDetails] = useState(false);
  return (
    <Fragment>
      <table className="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Cost</th>
            <th scope="col">Booking Date</th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row">1</th>
            <td>Mark</td>
            <td>15</td>
            <td>2019-08-11 15:12</td>
            <td>
              <button
                className="btn btn-primary btn-sm submitButton"
                style={{ "margin-lef": "16px", "marginRight": "10px" }}
                onClick={() => setModalBookingDetails(true)}
              >
                Details
              </button>
            </td>
          </tr>
          <tr>
            <th scope="row">2</th>
            <td>Tob</td>
            <td>15</td>
            <td>2019-08-11 15:12</td>
            <td>
              <button
                className="btn btn-primary btn-sm submitButton"
                style={{ "margin-lef": "16px", "marginRight": "10px" }}
                onClick={() => setModalBookingDetails(true)}
              >
                Details
              </button>
            </td>
          </tr>
          <tr>
            <th scope="row">3</th>
            <td>Larry</td>
            <td>15</td>
            <td>2019-08-11 15:12</td>
            <td>
              <button
                className="btn btn-primary btn-sm submitButton"
                style={{ "margin-lef": "16px", "marginRight": "10px" }}
                onClick={() => setModalBookingDetails(true)}
              >
                Details
              </button>
            </td>
          </tr>
        </tbody>
      </table>

      {/* Booking details */}
      <Modal
        title=""
        open={showModalBookingDetails}
        setOpen={show => setModalBookingDetails(show)}
        size="lg"
      >
      {
        type === "details" ? <ModalBookingDetails /> :<ModalInvoice />
      }
      </Modal>

      {/* Booking details */}
    </Fragment>
  );
};

export default InfoTab;
