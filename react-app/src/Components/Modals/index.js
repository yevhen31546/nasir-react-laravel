import React, { Fragment } from "react";
import PropTypes from "prop-types";
import Modal from "react-bootstrap4-modal";

const WrapModal = ({ title, open, children, setOpen, size, isBookModal, handleBookingRequest, isCheckoutModal, handlePayment }) => {
  console.log("open", open);

  return (
    <Modal  visible={open} onClickBackdrop={() => 
    {}} wrapperProps={{ size: "lg" }}

      dialogClassName={size ? `modal-${size}` : ""}
      
      >
      <div className="modal-content lg">
        <div className="modal-header">
          <h4 className="modal-title" id="myModalLabel">
            {title}
          </h4>
          <button
            type="button"
            className="close"
            data-dismiss="modal"
            aria-hidden="true"
            onClick={() => setOpen(false)}
          >
            ×
          </button>
        </div>
        <div className="modal-body">{open && children}</div>

        {!isCheckoutModal &&
          <div className="modal-footer">
            <button
              type="button"
              className="btn btn-secondary"
              onClick={() => setOpen(false)}
            >
              Close
          </button>
            {isBookModal &&
              <button
                type="button"
                className=" button"
                onClick={() => handleBookingRequest()}
              >
                Book
          </button>}
          </div>
        }
      </div>

    </Modal>
  );
};

WrapModal.propTypes = {
  title: PropTypes.string,
  size: PropTypes.string,
  open: PropTypes.bool,
  children: PropTypes.node,
  setOpen: PropTypes.func.isRequired,
  handleBookingRequest: PropTypes.func
};

export default WrapModal;
