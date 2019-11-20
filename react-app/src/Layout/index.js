import React, { PureComponent, Fragment } from "react";
import { withRouter } from "react-router-dom";

// Layout components
import Header from "./Header";
// Hader for all page without Home page
import HeaderPage from "./HeaderPage";
import Footer from "./Footer";
import Animation from "./Animation";

export class Layout extends PureComponent {
  render() {
    return (
      <Fragment>
        {this.props.location.pathname === "/" ?<Header /> : <HeaderPage /> }
        <Fragment>{this.props.children}</Fragment>
        <Footer />
        <Animation />
      </Fragment>
    );
  }
}

export default withRouter(Layout);
