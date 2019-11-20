import React, { Fragment } from "react";
import { Tab } from "react-bootstrap-tabs";

// Components
import TabsWrapper from "../Components/Tabs";

// Containers
import Map from "../Containers/Map";

const Details = () => (
  <Fragment>
    {/* Container: Tabs */}
    <TabsWrapper />
    {/* End container: Tabs */}

    {/* Container: Map */}
    <Map isDetailsPage={true} />
    {/* End container: Map */}
  </Fragment>
);

export default Details;
