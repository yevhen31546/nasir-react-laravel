import React from 'react';
import './App.css';
import { Router, Route, Switch } from 'react-router-dom';
import { createBrowserHistory } from 'history';

import { Elements, StripeProvider } from 'react-stripe-elements';


// Layout
import Layout from './Layout';

// Pages
import Home from "./Pages/Home";
import Details from "./Pages/Details";
import NoMatchPage from "./Pages/NoMatchPage";

import CheckoutForm from './Components/Modals/ModalPayment'

// History
export const history = createBrowserHistory();

const ss = <Elements>
  <CheckoutForm />
</Elements>

function App() {
  return (
    <StripeProvider apiKey="pk_test_NjdYAgEk0SCMATLVfzfyjgoZ00GzZsbGm5">
      <Router history={history}>
        <Layout>
          <Switch>
            <Route exact path="/" component={Home} />
            <Route exact path="/details" component={Details} />
            <Route component={NoMatchPage} />
          </Switch>
        </Layout>
      </Router>

    </StripeProvider>
  );
}

export default App;
