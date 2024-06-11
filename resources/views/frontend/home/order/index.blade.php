@extends('frontend.home.master')
@php
    use Illuminate\Support\Facades\Auth;
@endphp
<style>
    .quantity-options {
        display: flex;
        flex-wrap: nowrap;
        /* Ensures elements don't wrap to the next line */
    }

    .quantity-option {
        margin-right: 10px;
        /* Add spacing between elements */
    }

    .next::after {
        content: "";
        white-space: nowrap;
        /* Try removing temporarily for testing */
    }

    @media (max-width: 768px) {
        .bd {
            margin-bottom: 5px;
        }

        @media (max-width: 768px) {
            .next::after {
                display: block;
                /* Alternative approach */
            }
        }
    }
</style>

@section('content')
    <div class="card">
        <form class="user-form" action="{{ route('weborder.store') }}" id="registration-form" method="POST">
            @csrf
            <!-- Modal -->


            @if (!Auth::check())
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Login</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <p style="color:red;" id="errorMessage" class=""></p>

                            <div class="registration-info">
                                <div class="modal-body">
                                    <input type="number" class="form-control phone-number phone-input" name="phone"
                                        id="phone" placeholder="Enter your mobile number" required>
                                    <p style="color:red;" id="phoneError" style="display: none"></p>
                                </div>
                                <div class="modal-footer">
                                    <div class="form-button">
                                        <button class="btn btn-primary" type="button" onclick="sendMyOtp()">Send
                                            OTP</button>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" class="form-control" id="otpCodeInputField"
                                placeholder="Enter repeat password">

                            <div style="text-align: center; display: none; margin-top: 6px !important;"
                                class="verification_code">
                                <p class="mb-2">We've sent a 4-digit PIN in your phone
                                    <b>+88<span id="otpSentNumber"></span></b>
                                </p>
                                <div class="modal-body" class="form-group parent-otp"
                                    style="margin-bottom: 15px !important;">
                                    <input type="number" class="form-control phone-number" onkeyup="verifyOtp(this)"
                                        id="verification_code_input" value="{{ old('verification_code') }}"
                                        autocomplete="off" placeholder="Enter Otp Code" required>
                                    <div class="otp-button">
                                        <a href="javascript:void(0)" class="otp-send-button send-otp" id="send-btn"
                                            onclick="sendMyOtp()">
                                            RESEND OTP
                                        </a>
                                    </div>
                                </div>
                                <span id="otp_error" style="font-size: 12px; color: red"></span>

                                <button type="button" disabled class="btn" id="verifyButton"
                                    style="border: 0px; width: 100%; padding: 10px 0; background-color: #088178; color: white;"
                                    readonly>
                                    <span class="verify-loader" style="display: none">
                                        <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
                                    </span>
                                    VERIFY
                                    <span class="verify-loader" style="display: none">
                                        ...
                                    </span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            @endif


            {{-- <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Login</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>


                        <p style="color:red;" id="errorMessage" class=""></p>

                        <div class="registration-info">

                            <div class="modal-body">
                                <input type="number" class="form-control phone-number phone-input" name="phone"
                                    id="phone" placeholder="Enter your mobile number" required>
                                <p style="color:red;" id="phoneError" style="display: none"></p>
                            </div>
                            <div class="modal-footer">
                                <div class="form-button">
                                    <button class="btn btn-primary" type="button" onclick="sendMyOtp()">Send OTP</button>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" class="form-control" id="otpCodeInputField"
                            placeholder="Enter repeat password">

                        <div style="text-align: center; display: none; margin-top: 6px !important;"
                            class="verification_code">
                            <p class="mb-2">We've sent a 4-digit PIN in your phone
                                <b>+88<span id="otpSentNumber"></span></b>
                            </p>
                            <div class="modal-body" class="form-group parent-otp" style="margin-bottom: 15px !important;">
                                <input type="number" class="form-control phone-number" onkeyup="verifyOtp(this)"
                                    id="verification_code_input" value="{{ old('verification_code') }}" autocomplete="off"
                                    placeholder="Enter Otp Code" required>
                                <div class="otp-button">
                                    <a href="javascrip:void(0)" class="otp-send-button send-otp" id="send-btn"
                                        onclick="sendMyOtp()">
                                        RESEND OTP
                                    </a>
                                </div>
                            </div>
                            <span id="otp_error" style="font-size: 12px; color: red"></span>

                            <button type="button" disabled class="btn" id="verifyButton"
                                style="border: 0px; width: 100%; padding: 10px 0; background-color: #088178; color: white; "
                                readonly>
                                <span class="verify-loader" style="display: none">
                                    <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
                                </span>
                                VERIFY
                                <span class="verify-loader" style="display: none">
                                    ...
                                </span>
                            </button>
                        </div>

                    </div>
                </div>
            </div> --}}

            {{-- Modal end --}}
            <script>
                function sendMyOtp() {
                    // Disable the send button to prevent multiple clicks
                    $('#send-btn').prop('disabled', true);

                    let phone = $('#phone').val();

                    registrationValidation(phone);

                    const route = `{{ route('send-otp-to-phone') }}`;
                    axios.post(route, {
                            phone: phone
                        })
                        .then(function(response) {
                            console.log(response);

                            if (response.data.status == 0) {
                                $('#errorMessage').hide();
                                $('.registration-info').hide();
                                $('.verification_code').show();
                                $('#otpSentNumber').text(phone);
                                $('#otpCodeInputField').val(response.data.smsOTP);
                            } else {
                                $('#errorMessage').addClass('auth-error-sms');
                                $('#errorMessage').text(response.data.message);
                            }

                        })
                        .catch(function(error) {

                            if (error.response.data.errors.phone) {
                                $('#phone_error').text(error.response.data.errors.phone[0]);
                            } else {
                                $('#phone_error').text('');
                            }
                        });
                }


                function phoneValidation(phone) {
                    if (phone == '') {
                        $('#phoneError').html('Phone is required');
                        $('#phoneError').show();
                        return false;
                    } else if (phone.length > 11 || phone.length < 11) {
                        $('#phoneError').html('Phone must be 11 digits');
                        $('#phoneError').show();
                        return false;
                    } else {
                        $('#phoneError').hide();
                    }
                }


                function registrationValidation(phone) {
                    phoneValidation(phone)
                }

                function verifyOtp(obj) {
                    let otp = $(obj).val();
                    let smsOTP = $('#otpCodeInputField').val();

                    if (otp.length === 4 && otp !== smsOTP) {
                        $('#otp_error').text('OTP does not match');
                        return;
                    }

                    if (otp.length === 4) {
                        $('#otp_error').text('');
                        $('.verify-loader').show();

                        let isGoogleAndFacebookPixel = `{{ env('GOOGLE_AND_FACEBOOK_PIXEL') }}`;

                        if (isGoogleAndFacebookPixel === 1) {
                            fbq('track', 'Login');
                        }

                        // Disable the verify button to prevent multiple submissions
                        $('#verifyButton').prop('disabled', true);

                        // Submit the form
                        $('#registration-form').submit();
                    }
                }
            </script>
            {{-- modal end --}}


            <div class="row mx-5 my-5">
                <div class="col-md-8 bd">
                    <div class="card" style="    border-color: #009C82;">
                        <header class="card-header">
                            <h4 class="card-title mt-2">{{ __('language.o_details') }}</h4>
                        </header>
                        <article class="card-body ">
                            <div class="form-row">
                                <div class="col form-group">
                                    <h6 class="card-title">{{ __('language.p_name') }}: {{ $name }}</h6>
                                    <input type="hidden" name="productName" value="{{ $name }}">
                                    <input type="hidden" name="product_id" value="{{ $product_id }}">
                                </div>
                                <div class="col form-group">
                                    <h6 class="card-title" id="price">{{ __('language.price') }}: {{ $price }}
                                    </h6>
                                </div>
                            </div>
                            <div class="form-group">
                                <h6>{{ __('language.quantity') }}:</h6>
                                @foreach ($selects as $select)
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="vehicle" id="car"
                                            value="{{ $select->category_en }}">
                                        <label class="form-check-label" for="car">{{ $select->category_en }}</label>
                                    </div>
                                @endforeach
                                {{-- {!! __('language.selects') !!} --}}
                                {{-- <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="vehicle" id="motorcycle"
                                        value="motorcycle">
                                    <label class="form-check-label" for="motorcycle">Motorcycle</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="vehicle" id="generator"
                                        value="generator">
                                    <label class="form-check-label" for="generator">Generator</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="vehicle"
                                        id="masinary_equipment" value="masinary_equipment">
                                    <label class="form-check-label" for="masinary_equipment">Masinary/Equipment</label>
                                </div> --}}
                            </div>
                            <div class="form-group">
                                <h6 for="exampleFormControlSelect1">{{ __('language.s_quantity') }}: <span
                                        id="errorMessage" class="error-message" style="color: red"> </span></h6>

                                <div class="form-group row">
                                    <div class="col-sm-12 mt-2">
                                        <div class="quantity-options">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input quantity-option" type="radio"
                                                    name="quantity" id="inlineRadio1" value="15">
                                                <label class="form-check-label"
                                                    for="inlineRadio1">{{ __('language.15') }}</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input quantity-option" type="radio"
                                                    name="quantity" id="inlineRadio2" value="20">
                                                <label class="form-check-label"
                                                    for="inlineRadio2">{{ __('language.20') }}</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input quantity-option" type="radio"
                                                    name="quantity" id="inlineRadio3" value="25">
                                                <label class="form-check-label"
                                                    for="inlineRadio3">{{ __('language.25') }}</label>
                                            </div>
                                            <div class="form-check form-check-inline next">
                                                <input id="userInput" type="number" class="form-control"
                                                    name="inputQuantity" placeholder="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <h6>{{ __('language.address') }}:</h6>
                                <input id="userInput" name="address" type="text" class="form-control"
                                    placeholder="">
                            </div>

                            <div class="form-row">
                                <p>{{ __('language.by') }}</p>
                            </div>

                        </article>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card" style="    border-color: #009C82;">
                                <header class="card-header">
                                    <h4 class="card-title mt-2">{{ __('language.your_order') }}</h4>
                                </header>
                                <article class="card-body">
                                    <dl class="dlist-align">
                                        <div style="color: ">
                                            {{ __('language.t_price') }} = <span style="color: green" id="totalPrice">0
                                            </span>
                                            <input type="hidden" value="{{ $totalAmount }}" name="totalAmount"
                                                id="totalPriceInput">
                                        </div>
                                    </dl>

                                    <script>
                                        document.addEventListener("DOMContentLoaded", function() {
                                            const quantityOptions = document.querySelectorAll('.quantity-option');
                                            const userInput = document.getElementById('userInput');
                                            const errorMessage = document.getElementById('errorMessage');
                                            const price = document.getElementById('price');
                                            const totalPrice = document.getElementById('totalPrice');
                                            const totalPriceInput = document.getElementById('totalPriceInput');

                                            quantityOptions.forEach(function(option) {
                                                option.addEventListener('change', function() {
                                                    userInput.value = '';
                                                    errorMessage.innerText = '';
                                                    calculateTotal();
                                                });
                                            });

                                            userInput.addEventListener('input', function() {
                                                quantityOptions.forEach(function(option) {
                                                    option.checked = false;
                                                });
                                                calculateTotal();
                                            });

                                            function calculateTotal() {
                                                const selectedQuantity = document.querySelector('input[name="quantity"]:checked');
                                                const quantity = selectedQuantity ? parseInt(selectedQuantity.value) : parseInt(userInput.value);
                                                const priceValue = parseInt(price.innerText.split(": ")[1]);
                                                const total = quantity * priceValue;
                                                totalPriceInput.value = total;
                                                totalPrice.innerText = total;
                                            }
                                        });
                                    </script>
                                </article>
                            </div>
                        </div>
                        <div class="col-md-12 mt-2">
                            <div class="card" style="    border-color: #009C82;">
                                <header class="card-header">
                                    <h4 class="card-title mt-2">{{ __('language.p_type') }}</h4>
                                </header>
                                <article class="card-body">
                                    <dl class="dlist-align">
                                        <div class="col-sm-8">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="paymentMethod"
                                                    id="inlineRadio4" value="online">
                                                <label class="form-check-label"
                                                    for="inlineRadio4">{{ __('language.online') }}</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="paymentMethod"
                                                    id="inlineRadio5" value="cash_on_delivery">
                                                <label class="form-check-label"
                                                    for="inlineRadio5">{{ __('language.cash') }}</label>
                                            </div>
                                        </div>
                                    </dl>
                                </article>
                            </div>
                        </div>
                        <div class="col-md-12 mt-4">
                            <button type="submit" data-toggle="modal"data-target="#exampleModal"
                                class="subscribe btn btn-success btn-lg btn-block">{{ __('language.order_place') }}</button>
                        </div>
                    </div>
                </div>
            </div>



            {{--  --}}


        </form>

    </div>
@endsection

<script></script>




















{{--

<div class="row no-gutters mt-5">
                <div class="col-md-2"></div>
                <div class="col-md-4 mr-5 mt-5">
                    <img style="height: 350px" src="{{ asset('images/' . $image) }}" class="card-img" alt="...">
                </div>
                <div class="col-md-4">
                    <div class="card-body card" style="    border-color: #009C82;">

                        <div class="row">
                            <div class="col-md-12">
                                <h5 class="card-title">Product Name: {{ $name }}</h5>
                                <input type="hidden" name="productName" value="{{ $name }}">
                            </div>
                            <div class="col-md-12">
                                <h5 class="card-title" id="price">Price: {{ $price }}</h5>

                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <h6>Select:</h6>

                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="vehicle" id="car"
                                            value="car">
                                        <label class="form-check-label" for="car">Car</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="vehicle" id="motorcycle"
                                            value="motorcycle">
                                        <label class="form-check-label" for="motorcycle">Motorcycle</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="vehicle" id="generator"
                                            value="generator">
                                        <label class="form-check-label" for="generator">Generator</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="vehicle"
                                            id="masinary_equipment" value="masinary_equipment">
                                        <label class="form-check-label"
                                            for="masinary_equipment">Masinary/Equipment</label>
                                    </div>
                                </div>

                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <h6 for="exampleFormControlSelect1">Select Quantity: <span id="errorMessage"
                                            class="error-message" style="color: red"> </span></h6>

                                    <div class="form-group row">
                                        <div class="col-sm-6 mt-2">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input quantity-option" type="radio"
                                                    name="quantity" id="inlineRadio1" value="15">
                                                <label class="form-check-label" for="inlineRadio1">15</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input quantity-option" type="radio"
                                                    name="quantity" id="inlineRadio2" value="20">
                                                <label class="form-check-label" for="inlineRadio2">20</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input quantity-option" type="radio"
                                                    name="quantity" id="inlineRadio3" value="25">
                                                <label class="form-check-label" for="inlineRadio3">25</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-check form-check-inline">
                                                <input id="userInput" type="number" class="form-control"
                                                    name="inputQuantity" placeholder="Enter value">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <script>
                                    document.addEventListener("DOMContentLoaded", function() {
                                        const quantityOptions = document.querySelectorAll('.quantity-option');
                                        const userInput = document.getElementById('userInput');
                                        const errorMessage = document.getElementById('errorMessage');
                                        const price = document.getElementById('price');
                                        const totalPrice = document.getElementById('totalPrice');
                                        const totalPriceInput = document.getElementById('totalPriceInput');

                                        quantityOptions.forEach(function(option) {
                                            option.addEventListener('change', function() {
                                                userInput.value = '';
                                                errorMessage.innerText = '';
                                                calculateTotal();
                                            });
                                        });

                                        userInput.addEventListener('input', function() {
                                            quantityOptions.forEach(function(option) {
                                                option.checked = false;
                                            });
                                            calculateTotal();
                                        });

                                        function calculateTotal() {
                                            const selectedQuantity = document.querySelector('input[name="quantity"]:checked');
                                            const quantity = selectedQuantity ? parseInt(selectedQuantity.value) : parseInt(userInput.value);
                                            const priceValue = parseInt(price.innerText.split(": ")[1]);
                                            const total = quantity * priceValue;
                                            totalPriceInput.value = total;
                                            totalPrice.innerText = total;
                                        }
                                    });
                                </script>

                            </div>

                            <div class="col-md-12">
                                <div style="color: red">
                                    Total Price = <span style="color: green" id="totalPrice">0 </span>
                                    <input type="hidden" value="{{ $totalAmount }}" name="totalAmount"
                                        id="totalPriceInput">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group row">
                                <h6 for="" class="col-sm-4 col-form-label">Payment Type:</h6>
                                <div class="col-sm-8 mt-2">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="paymentMethod"
                                            id="inlineRadio4" value="online">
                                        <label class="form-check-label" for="inlineRadio4">Online</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="paymentMethod"
                                            id="inlineRadio5" value="cash_on_delivery">
                                        <label class="form-check-label" for="inlineRadio5">Cash on Delivery</label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row ">
                                <h6 for="" class="col-sm-3 col-form-label">Address:</h6>
                                <div class="col-sm-9">
                                    <input id="userInput" name="address" type="text" class="form-control"
                                        placeholder="Enter Address">
                                </div>
                            </div>

                        </div>

                        <div class="my-2">
                            <label class="form-check-label" for="flexCheckDefault">
                                By purchasing products/services from Marga Net App. I fully agree and accept all the terms
                                and condition of Marga Net one LTD.
                            </label>
                        </div>
                        <button type="button" class="btn btn-success" data-toggle="modal"
                            data-target="#exampleModal">Place order</button>


                        <script>
                            function toggleOrderButton() {
                                var checkbox = document.getElementById("flexCheckDefault");
                                var orderButton = document.getElementById("orderButton");

                                if (checkbox.checked) {
                                    orderButton.disabled = false;
                                } else {
                                    orderButton.disabled = true;
                                }
                            }
                        </script>
                    </div>

                </div>
                <div class="col-md-2"></div>
            </div>




    --}}
