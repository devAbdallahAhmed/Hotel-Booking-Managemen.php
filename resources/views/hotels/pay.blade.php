@extends('layouts.app')

@section('content')
    <div class="hero-wrap js-fullheight" style="background-image: url('{{asset('assets/images/room-1.jpg')}}')" >
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-start" data-scrollax-parent="true">
                <div class="col-md-7 ftco-animate"><h2 class="subheading">Pay With PayPal</h2>
                    <h1 class="mb-4"></h1>
                </div>
            </div>
        </div>
    </div>
    </div>
    <body>
    <div class="container">
        <!-- Replace "test" with your own sandbox Business account app client ID -->
        <script src="https://www.paypal.com/sdk/js?client-id=AR6ZVuiTEOdCase2N6y3LyPIUGAIABAZYnN-jD67Xyw6UpaOZV5w2pLn2OHQ1xzB-pNxTNOflyY6Ayh0&currency=USD"></script>
        <!-- Set up a container element for the button -->
        <div id="paypal-button-container"></div>
        <script>
            paypal.Buttons({
                // Sets up the transaction when a payment button is clicked
                createOrder: (data, actions) => {
                    return actions.order.create({
                        purchase_units: [{
                            amount: {
                                value: '{{\Illuminate\Support\Facades\Session::get('price')}}' // Can also reference a variable or function
                            }
                        }]
                    });
                },
                // Finalize the transaction after payer approval
                onApprove: (data, actions) => {
                    return actions.order.capture().then(function(orderData) {

                        window.location.href='{{route('hotel.success')}}';
                    });
                }
            }).render('#paypal-button-container');
        </script>

    </div>
    </div>
    </div>


    <body>
@endsection
