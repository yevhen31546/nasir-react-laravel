import React, { useState } from 'react';
import { CardElement, injectStripe } from 'react-stripe-elements';
import { Elements, StripeProvider } from 'react-stripe-elements';



const CheckoutForm = ({ setOpen, currentTrip, setQuery, stripe }) => {
    const [resultReceived, setResultReceived] = useState(false);
    const [resultMessage, setResultMessage] = useState(false);
    const [resultSuccess, setResultSuccess] = useState(false);

    const [pending, setPending] = useState(false)

    const submit = async (ev) => {
        console.log("_________________________________")
        console.log(stripe)
        console.log("_________________________________")

        let { token } = await stripe.createToken({ name: "Name" });

        if (!token) {
            setResultMessage('Invalid Card Information')
            setResultSuccess(false)
            setResultReceived(true)
            return;
        }

        setPending(true)

        const bearerToken = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwczpcL1wvYXBpLWRldi53ZWVrYWIuY29tXC9jdXN0b21lclwvYXV0aFwvbG9naW4iLCJpYXQiOjE1NzUxOTIzMTQsImV4cCI6MTU3NTIyODMxNCwibmJmIjoxNTc1MTkyMzE0LCJqdGkiOiJYNGR2cmhFaFgwRHhHSGdyIiwic3ViIjoxODIsInBydiI6Ijg3ZTBhZjFlZjlmZDE1ODEyZmRlYzk3MTUzYTE0ZTBiMDQ3NTQ2YWEifQ.DmliVyLiTGtt4VVEKM4LnBbaRu5LtmSmGKU40vwOOVs';

        console.log(currentTrip, token.id)
        let response = await fetch("https://api-dev.weekab.com/customer/trip/payments/pay-trip", {
            method: 'POST',
            headers: {
                'Accept': 'application/json',
                'Accept-Language': 'en',
                'Content-Type': 'application/json',
                'Authorization': 'Bearer ' + bearerToken,
            },
            body: JSON.stringify({
                'token': token.id,
                'id_ride': localStorage.getItem("id_ride")
            })
        });

        console.log(response)

        if (response.ok) {
            console.log("purchase compelted!")
            setResultReceived(true);
            setResultSuccess(true)
            setResultMessage("Booking Completed")
        }
        else {
            console.log("Invalid information")
            setResultReceived(true);
            setResultSuccess(false)
            setResultMessage("sorry we could not charge your card")
        }

        setPending(false)

    }

    return (

        <div className="checkout">
            <h1>€{localStorage.getItem("prix_ttc")}</h1>
            <p>Please fill your card information to process your booking</p>
            <div className="payment-card-wrapper">
                <CardElement />

            </div>
            {
                    resultReceived && 
                    <div className = {resultSuccess ? "payment-success" : "payment-failed"}>
                        {resultMessage}
                    </div>
                }

            <div className="modal-footer">
                <button
                    type="button"
                    className="btn btn-secondary"
                    onClick={() => setOpen(false)}>
                    Close
                    </button>

                {!resultSuccess && <button
                    type="button"
                    className=" button"
                    disabled = {pending}
                    onClick={() => submit()}>
                    PAY
                    </button>
                }
            </div>
        </div>
    );
}


export default injectStripe(CheckoutForm);