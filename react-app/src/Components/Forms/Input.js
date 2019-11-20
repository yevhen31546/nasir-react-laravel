import React from "react";
import PropTypes from "prop-types";

const Input = ({ className, value, placeholder, style, name, onChange }) => (
  <input
    style={style}
    className={className}
    value={value}
    name={name}
    placeholder={placeholder}
    onChange={onChange}
  />
);

Input.defaultProps = {
  className: "form-control"
};

Input.propTypes = {
  value: PropTypes.string.isRequired,
  name: PropTypes.string,
  placeholder: PropTypes.string,
  style: PropTypes.object,
  onChange: PropTypes.func
};

export default Input;
