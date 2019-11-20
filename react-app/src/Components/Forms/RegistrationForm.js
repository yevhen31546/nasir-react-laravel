import React from "react";

const RegistrationForm = () => {
    return (
        <form role="form" className="form-horizontal">
        <div className="form-group">
        <label for="email" className="col-sm-2 control-label">
        Name
        </label>
        <div className="col-sm-10">
        <input type="text" className="form-control" placeholder="Name" />
        </div>
        </div>
        <div className="form-group">
        <label for="email" className="col-sm-2 control-label">
        Email
        </label>
        <div className="col-sm-10">
        <input
    type="email"
    className="form-control"
    id="email"
    placeholder="Email"
        />
        </div>
        </div>
        <div className="form-group">
        <label for="mobile" className="col-sm-2 control-label">
        Mobile
        </label>
        <div className="col-sm-10">
        <input
    type="email"
    className="form-control"
    id="mobile"
    placeholder="Mobile"
        />
        </div>
        </div>
        <div className="form-group">
        <label for="password" className="col-sm-2 control-label">
        Password
        </label>
        <div className="col-sm-10">
        <input
    type="password"
    className="form-control"
    id="password"
    placeholder="Password"
        />
        </div>
        </div>
        <div className="row">
        <div className="col-sm-10">
        <button
    type="button"
    className="btn btn-primary btn-sm submitButton cursor-pointer  submit-button-div registraion-mobile"
    style={{
        "marginLeft": "16px",
            "marginRight": "10px",
            width: "150px"
    }}
>
    Save &amp; Continue
    </button>
    <button
    type="button"
    className="btn btn-default btn-sm cursor-pointer"
    style={{ color: "#0062cc" }}
>
    Cancel
    </button>
    </div>
    </div>
    </form>
);
};

export default RegistrationForm;
