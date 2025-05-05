<!DOCTYPE html>

<html lang="en" class="light-style layout-navbar-fixed layout-menu-fixed layout-compact " dir="ltr"
    data-theme="theme-default" data-assets-path="assets/" data-template="vertical-menu-template">

<head>
    <meta charset="utf-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Dashboard - Analytics | Vuexy - Bootstrap Admin Template</title>


    <meta name="description" content="Start your development with a Dashboard for Bootstrap 5" />
    <meta name="keywords" content="dashboard, bootstrap 5 dashboard, bootstrap 5 design, bootstrap 5">


    @include('layouts.links')

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css"
        integrity="sha512-6S2HWzVFxruDlZxI3sXOZZ4/eJ8AcxkQH1+JjSe/ONCEqR9L4Ysq5JdT5ipqtzU7WHalNwzwBv+iE51gNHJNqQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<style>
    .custom-option-icon .custom-option-content {
        text-align: center;
        padding: 6px;
    }

    h1 {
        text-align: center;
    }

    h2 {
        margin: 0;
    }

    #multi-step-form-container {
        margin-top: 5rem;
    }

    .text-center {
        text-align: center;
    }

    .mx-auto {
        margin-left: auto;
        margin-right: auto;
    }

    .pl-0 {
        padding-left: 0;
    }

    .button {
        padding: 0.7rem 1.5rem;
        border: 1px solid #4361ee;
        background-color: #4361ee;
        color: #fff;
        border-radius: 5px;
        cursor: pointer;
    }

    .submit-btn {
        border: 1px solid #0e9594;
        background-color: #0e9594;
    }

    .mt-3 {
        margin-top: 2rem;
    }

    .d-none {
        display: none;
    }

    .form-step {
        border: 1px solid rgba(0, 0, 0, 0.1);
        border-radius: 20px;
        padding: 3rem;
    }

    .font-normal {
        font-weight: normal;
    }

    ul.form-stepper {
        counter-reset: section;
        margin-bottom: 3rem;
    }

    ul.form-stepper .form-stepper-circle {
        position: relative;
    }

    ul.form-stepper .form-stepper-circle span {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translateY(-50%) translateX(-50%);
    }

    .form-stepper-horizontal {
        position: relative;
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-pack: justify;
        -ms-flex-pack: justify;
        justify-content: space-between;
    }

    ul.form-stepper>li:not(:last-of-type) {
        margin-bottom: 0.625rem;
        -webkit-transition: margin-bottom 0.4s;
        -o-transition: margin-bottom 0.4s;
        transition: margin-bottom 0.4s;
    }

    .form-stepper-horizontal>li:not(:last-of-type) {
        margin-bottom: 0 !important;
    }

    .form-stepper-horizontal li {
        position: relative;
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-flex: 1;
        -ms-flex: 1;
        flex: 1;
        -webkit-box-align: start;
        -ms-flex-align: start;
        align-items: start;
        -webkit-transition: 0.5s;
        transition: 0.5s;
    }

    .form-stepper-horizontal li:not(:last-child):after {
        position: relative;
        -webkit-box-flex: 1;
        -ms-flex: 1;
        flex: 1;
        height: 1px;
        content: "";
        top: 32%;
    }

    .form-stepper-horizontal li:after {
        background-color: #dee2e6;
    }

    .form-stepper-horizontal li.form-stepper-completed:after {
        background-color: #4da3ff;
    }

    .form-stepper-horizontal li:last-child {
        flex: unset;
    }

    ul.form-stepper li a .form-stepper-circle {
        display: inline-block;
        width: 40px;
        height: 40px;
        margin-right: 0;
        line-height: 1.7rem;
        text-align: center;
        background: rgba(0, 0, 0, 0.38);
        border-radius: 50%;
    }

    .form-stepper .form-stepper-active .form-stepper-circle {
        background-color: #4361ee !important;
        color: #fff;
    }

    .form-stepper .form-stepper-active .label {
        color: #4361ee !important;
    }

    .form-stepper .form-stepper-active .form-stepper-circle:hover {
        background-color: #4361ee !important;
        color: #fff !important;
    }

    .form-stepper .form-stepper-unfinished .form-stepper-circle {
        background-color: #f8f7ff;
    }

    .form-stepper .form-stepper-completed .form-stepper-circle {
        background-color: #0e9594 !important;
        color: #fff;
    }

    .form-stepper .form-stepper-completed .label {
        color: #0e9594 !important;
    }

    .form-stepper .form-stepper-completed .form-stepper-circle:hover {
        background-color: #0e9594 !important;
        color: #fff !important;
    }

    .form-stepper .form-stepper-active span.text-muted {
        color: #fff !important;
    }

    .form-stepper .form-stepper-completed span.text-muted {
        color: #fff !important;
    }

    .form-stepper .label {
        font-size: 1rem;
        margin-top: 0.5rem;
    }

    .form-stepper a {
        cursor: default;
    }

    .hidden {
        display: none;
    }
</style>

<body>

    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar  ">
        <div class="layout-container">

            <!-- Menu -->
            @include('layouts.sidebar')
            <!-- / Menu -->

            <!-- Layout container -->
            <div class="layout-page">
                <!-- Navbar -->
                @include('layouts.header')
                <!-- / Navbar -->
                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <div class="container-xxl flex-grow-1 container-p-y">
                        <div>
                            <h1>Create Client</h1>
                            <div id="multi-step-form-container">
                                <!-- Form Steps / Progress Bar -->
                                <ul class="form-stepper form-stepper-horizontal text-center mx-auto pl-0">
                                    <!-- Step 1 -->
                                    <li class="form-stepper-active text-center form-stepper-list" step="1">
                                        <a class="mx-2">
                                            <span class="form-stepper-circle">
                                                <span>1</span>
                                            </span>
                                            <div class="label">Personal Info</div>
                                        </a>
                                    </li>
                                    <!-- Step 2 -->
                                    <li class="form-stepper-unfinished text-center form-stepper-list" step="2">
                                        <a class="mx-2">
                                            <span class="form-stepper-circle text-muted">
                                                <span>2</span>
                                            </span>
                                            <div class="label text-muted">KYC doc & Privacy Policy</div>
                                        </a>
                                    </li>
                                    <!-- Step 3 -->
                                    <li class="form-stepper-unfinished text-center form-stepper-list" step="3">
                                        <a class="mx-2">
                                            <span class="form-stepper-circle text-muted">
                                                <span>3</span>
                                            </span>
                                            <div class="label text-muted">Orders Sales & Cycle</div>
                                        </a>
                                    </li>
                                    <!-- Step 4 -->
                                    <li class="form-stepper-unfinished text-center form-stepper-list" step="4">
                                        <a class="mx-2">
                                            <span class="form-stepper-circle text-muted">
                                                <span>4</span>
                                            </span>
                                            <div class="label text-muted">Client Info & Address</div>
                                        </a>
                                    </li>
                                    <!-- Step 5 -->
                                    <li class="form-stepper-unfinished text-center form-stepper-list" step="5">
                                        <a class="mx-2">
                                            <span class="form-stepper-circle text-muted">
                                                <span>5</span>
                                            </span>
                                            <div class="label text-muted">Account Info</div>
                                        </a>
                                    </li>
                                </ul>
                                <!-- Step Wise Form Content -->
                                <form id="userAccountSetupForm" name="userAccountSetupForm"
                                    enctype="multipart/form-data" method="POST">

                                    <!-- Step 1 Content -->
                                    <section id="step-1" class="form-step bg-white">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <label for="">First Name</label>
                                                    <input type="text" name="first_name" class="form-control"
                                                        placeholder="First Name" required>

                                                </div>
                                                <div class="col-md-3">
                                                    <label for="">Last Name</label>
                                                    <input type="text" name="last_name" class="form-control"
                                                        placeholder="Last Name">
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="">Company Name</label>
                                                    <input type="text" name="company_name" class="form-control"
                                                        placeholder="Company Name">
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="">Email ID</label>
                                                    <input type="text" name="email" class="form-control"
                                                        placeholder="Email ID">
                                                </div>
                                            </div>
                                            <div class="row pt-2">
                                                <div class="col-md-3">
                                                    <label for="">Password</label>
                                                    <input type="text" name="password" class="form-control"
                                                        placeholder="Password">
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="">Confirm Password</label>
                                                    <input type="text" name="confirm_password"
                                                        class="form-control" placeholder="Confirm Password">
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="">Contact Number</label>
                                                    <input type="text" name="phone" class="form-control"
                                                        placeholder="Contact Number">
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="">OTP Confirmation ( Optional )</label>
                                                    <input type="text" name="otp" class="form-control"
                                                        placeholder="OTP Confirmation">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mt-3">
                                            <button class="button btn-navigate-form-step" type="button"
                                                step_number="2">Next</button>
                                        </div>
                                    </section>
                                    <!-- Step 2 Content, default hidden on page load. -->
                                    <section id="step-2" class="form-step d-none bg-white ">
                                        <div class="container ">
                                            <div class="row gy-3">
                                                <h5>Business Type </h5>
                                                <div class="col-md">
                                                    <div class="form-check custom-option custom-option-icon checked">
                                                        <label class="form-check-label custom-option-content"
                                                            for="customRadioIcon1">
                                                            <span class="custom-option-body">
                                                                <span class="custom-option-title">
                                                                    <h4 class="t-3">For Personal </h4></span>
                                                                <small> Delivery in 3-5 days. </small>
                                                            </span>
                                                            <input name="customDeliveryRadioIcon"
                                                                class="form-check-input" type="radio"
                                                                value="Personal" id="customRadioIcon1">
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-md">
                                                    <div class="form-check custom-option custom-option-icon">
                                                        <label class="form-check-label custom-option-content"
                                                            for="customRadioIcon12">
                                                            <span class="custom-option-body">
                                                                <span class="custom-option-title">
                                                                    <h4>For Company</h4></span>
                                                                <small>Delivery within 2 days.</small>
                                                            </span>
                                                            <input name="customDeliveryRadioIcon"
                                                                class="form-check-input" type="radio"
                                                                value="Company" id="customRadioIcon12">
                                                        </label>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="row pt-2">
                                                <div id="div1" class="hidden">
                                                    <div class="row">

                                                        <div class="col-md-3">
                                                            <label for="">Pan Card</label>
                                                            <input type="file" name="personal_pan_card"
                                                                class="form-control">
                                                        </div>
                                                        <div class="col-md-3">
                                                            <label for="">Aadhar Card</label>
                                                            <input type="file" name="personal_aadhar_card"
                                                                class="form-control">
                                                        </div>
                                                        <div class="col-md-3">
                                                            <label for="">Addess Proof</label>
                                                            <input type="file" name="personal_address_proof"
                                                                class="form-control">
                                                        </div>
                                                        <div class="col-md-3">
                                                            <label for="">Cancel Cheque</label>
                                                            <input type="file" name="personal_cancel_chaque"
                                                                class="form-control">
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <label for="">Bank Name</label>
                                                            <input type="text" name="personal_bank_name"
                                                                class="form-control">
                                                        </div>
                                                        <div class="col-md-3">
                                                            <label for="">IFSC Code</label>
                                                            <input type="text" name="personal_ifsc_code"
                                                                class="form-control">
                                                        </div>
                                                        <div class="col-md-3">
                                                            <label for="">Account Number</label>
                                                            <input type="text" name="personal_account_number"
                                                                class="form-control">
                                                        </div>
                                                        <div class="col-md-3">
                                                            <label for="">Mobile No.(As per Bank)</label>
                                                            <input type="number" name="personal_mobile_as_bank"
                                                                class="form-control">
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <label for="">Billing Address</label>
                                                            <textarea type="text" name="person_billing_address"
                                                                class="form-control">
                                                                </textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            <br>
                                                <div id="div2" class="hidden">
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <label for="">Company GST</label>
                                                            <input type="file" name="company_gst"
                                                                class="form-control">
                                                        </div>
                                                        <div class="col-md-3">
                                                            <label for="">Company Pan</label>
                                                            <input type="file" name="pan_card"
                                                                class="form-control">
                                                        </div>
                                                        <div class="col-md-3">
                                                            <label for="">Addess Proof</label>
                                                            <input type="file" name="address_proof"
                                                                class="form-control">
                                                        </div>
                                                        <div class="col-md-3">
                                                            <label for="">Company Cancel Cheque</label>
                                                            <input type="file" name="cancel_chaque"
                                                                class="form-control">
                                                        </div>

                                                    </div>
                                                    <br>
                                                    <div class="row  pt-2">
                                                        <div class="col-md-3">
                                                            <label for="">Bank Name</label>
                                                            <input type="text" name="bank_name"
                                                                class="form-control">
                                                        </div>
                                                        <div class="col-md-3">
                                                            <label for="">IFSC Code</label>
                                                            <input type="text" name="ifsc_code"
                                                                class="form-control">
                                                        </div>
                                                        <div class="col-md-3">
                                                            <label for="">Account Number</label>
                                                            <input type="text" name="account_number"
                                                                class="form-control">
                                                        </div>
                                                        <div class="col-md-3">
                                                            <label for="">Mobile No.(As per Bank)</label>
                                                            <input type="number" name="mobile_as_bank"
                                                                class="form-control">
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="row pt-3">
                                                <div class="col-md-6">
                                                    <input type="checkbox" name="terms" value="checked" required>
                                                    <label for="">Terms and Conditions</label>
                                                    <br>
                                                    <input type="checkbox" name="privacy" value="checked" required>
                                                    <label for="">Privacy Policy </label>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="mt-3">
                                            <button class="button btn-navigate-form-step" type="button"
                                                step_number="1">Prev</button>
                                            <button class="button btn-navigate-form-step" type="button"
                                                step_number="3">Next</button>
                                        </div>
                                    </section>
                                    <!-- Step 3 Content, default hidden on page load. -->
                                    <section id="step-3" class="form-step d-none bg-white">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <label for="">Average Monthly Orders </label>
                                                    <select name="average_monthly_orders" id=""
                                                        class="form-control">
                                                        <option value="0-100">0-100</option>
                                                        <option value="100-500">100-500</option>
                                                        <option value="500-1500">500-1500</option>
                                                        <option value="1500-3000">1500-3000</option>
                                                        <option value="3000">3000<</option>
                                                        <option value="5000">5000<</option>
                                                        <option value="10000">10000<</option>

                                                    </select>
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="">Agreed Rates</label>
                                                    <input type="text" name="agreed_rates" class="form-control">
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="">Sales Person Name</label>
                                                    <input type="text" name="sales_person"
                                                        class="form-control">
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="">Sales Person Email</label>
                                                    <input type="text" name="sales_person_email"
                                                        class="form-control">
                                                </div>

                                            </div>
                                            <div class="row pt-2">

                                                <div class="col-md-3">
                                                    <label for="">
                                                        Assigined KAM*
                                                    </label>
                                                    <input type="text" name="assigined_kam" class="form-control">
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="">
                                                        COD Cycle*
                                                    </label>
                                                    <input type="text" class="form-control" name="cod_cycle">
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="">
                                                        Billing Cycle
                                                    </label>
                                                    <input type="text" class="form-control" name="billing_cycle">
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="">
                                                        Client ID
                                                    </label>
                                                    <input type="text" class="form-control" name="client_id" value="AN-{{ strtoupper(Str::random(4)) . strtoupper(Str::random(4)) . mt_rand(1000, 9999) }}" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mt-3">
                                            <button class="button btn-navigate-form-step" type="button"
                                                step_number="2">Prev</button>
                                            <button class="button btn-navigate-form-step" type="button"
                                                step_number="4">Next</button>

                                        </div>
                                    </section>

                                    <section id="step-4" class="form-step d-none bg-white">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <label for="">Loss Liability</label>
                                                    <input type="text" class="form-control" name="loss_liablity">
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="">User Name</label>
                                                    <input type="text" class="form-control" name="user_name">
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="">Billing Pin code</label>
                                                    <input type="text" class="form-control" id="pincode"
                                                        name="billing_pin_code">
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="">City </label>

                                                    <input name="city" id="city" class="form-control">

                                                </div>
                                                <div class="col-md-3">
                                                    <label for="">State</label>
                                                    <input type="text" id="state" class="form-control" name="states">
                                                </div>
                                                <div class="col-md-3">
                                                    <label >Courier Priority</label>
                                                    <input type="text"  class="form-control" name="courier_priority">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mt-3">
                                            <button class="button btn-navigate-form-step" type="button"
                                                step_number="3">Prev</button>
                                            <button class="button btn-navigate-form-step" type="button"
                                                step_number="5">Next</button>
                                        </div>
                                    </section>
                                    <section id="step-5" class="form-step d-none bg-white">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <label for="">Account Type</label>
                                                     <select name="account" class="form-control" id="">
                                                        <option value="Wallet">Wallet</option>
                                                        <option value="Credit ">Credit</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="">Client type</label>
                                                     <select name="B2B"  class="form-control">
                                                        <option value="B2B">B2B </option>
                                                        <option value="B2C">B2C </option>
                                                        <option value="International">International</option>
                                                        <option value="Retail">Retail</option>
                                                    </select>
                                                </div>

                                                <div class="col-md-3">
                                                    <label for="">Is Vendor and Is Center option ( by defualt
                                                        no ) </label>

                                                    <input type="radio" name="vendor_and_center"
                                                        id="passwordissue-0" value="No"> No
                                                    <input type="radio" name="vendor_and_center" class="show_hide"
                                                        rel="#slidingDiv_2" id="passwordissue-1" value="Yes"> Yes
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mt-3">
                                            <button class="button btn-navigate-form-step" type="button"
                                                step_number="4">Pre</button>
                                            <!-- <button class="button btn-navigate-form-step"
                                                type="submit">Submit</button> -->
                                            <button class="button btn-primary"
                                                type="submit">Submit</button>
                                        </div>
                                    </section>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- / Content -->
                    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
                    <script>
                        $(document).ready(function() {
                            $('#pincode').on('input', function() {
                                var pincode = $(this).val();

                                // Make an AJAX request to get city and state
                                $.ajax({
                                    type: 'POST',
                                    url: '/get-pincode',
                                    data: {
                                        _token: '{{ csrf_token() }}',
                                        code: pincode
                                    },
                                    success: function(response) {
                                        $('#city').val(response.city);
                                        $('#state').val(response.state);
                                    },
                                    error: function(error) {
                                        console.log('Error:', error);
                                    }
                                });
                            });
                        });
                    </script>
                    {{-- to get pin  --}}
                    <script>
                        var timeoutId;

                        document.getElementById('userInput').addEventListener('input', function(event) {
                            clearTimeout(timeoutId);

                            // Delay the AJAX request by 500 milliseconds after the user stops typing
                            timeoutId = setTimeout(function() {
                                var userInput = event.target.value;

                                fetch('/get-pincode?code=' + userInput)
                                    .then(response => response.json())
                                    .then(data => {
                                        console.log(data.data);

                                        // Clear existing data
                                        document.getElementById('usersContainer').innerHTML = '';

                                        data.forEach(user => {
                                            var userContainer = document.createElement('div');
                                            userContainer.className = 'user-info';
                                            alert(user);
                                            userContainer.innerHTML = `
                                            <div class="col-md mb-md-0 mb-2 p-1">
                                                <div class="custom-option custom-option-icon">
                                                <label class="form-check-label custom-option-content" for="customRadioOwner">
                                                    <span class="custom-option-body">

                                                    <span class="custom-option-title">${user.name} <small>${user.code}</small></span> <input name="outline_squircle" class="form-check-input" type="radio" value="${user.code}" id="customRadioOwner">

                                                    </span>

                                                </label>
                                                </div>
                                            </div>
                                                    `;

                                            var nameId = user.city_name;
                                            var codeId = user.code;

                                            console.log(nameId);


                                            document.getElementById('usersContainer').appendChild(
                                                userContainer);

                                        });
                                        document.getElementById('usersContainer').appendChild(userContainer);

                                        document.getElementById('card').style.display = 'block';
                                    })


                            }, 500);
                        });
                    </script>

                    <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            var toggleCheckbox = document.getElementById('customRadioIcon1');
                            var div1 = document.getElementById('div1');
                            var div2 = document.getElementById('div2');
                            var div3 = document.getElementById('div3');

                            toggleCheckbox.addEventListener('change', function() {
                                if (toggleCheckbox.checked) {
                                    // If checkbox is checked, show div1 and hide div2
                                    div1.classList.remove('hidden');
                                    div2.classList.add('hidden');
                                    div3.classList.add('hidden');
                                } else {
                                    // If checkbox is unchecked, show div2 and hide div1
                                    div2.classList.remove('hidden');
                                    div1.classList.add('hidden');
                                }
                            });
                        });
                        document.addEventListener('DOMContentLoaded', function() {
                            var toggleCheckbox = document.getElementById('customRadioIcon12');
                            var div1 = document.getElementById('div1');
                            var div2 = document.getElementById('div2');
                            var div3 = document.getElementById('div3');
                            toggleCheckbox.addEventListener('change', function() {
                                if (toggleCheckbox.checked) {
                                    // If checkbox is checked, show div1 and hide div2
                                    div2.classList.remove('hidden');
                                    div1.classList.add('hidden');
                                    div3.classList.add('hidden');
                                } else {
                                    // If checkbox is unchecked, show div2 and hide div1
                                    div2.classList.remove('hidden');
                                    div1.classList.add('hidden');
                                }
                            });
                        });
                        document.addEventListener('DOMContentLoaded', function() {
                            var toggleCheckbox = document.getElementById('customRadioIcon33');
                            var div3 = document.getElementById('div3');
                            var div2 = document.getElementById('div2');
                            var div1 = document.getElementById('div1');
                            toggleCheckbox.addEventListener('change', function() {
                                if (toggleCheckbox.checked) {
                                    // If checkbox is checked, show div1 and hide div2
                                    div3.classList.remove('hidden');
                                    div2.classList.add('hidden');
                                    div1.classList.add('hidden');
                                } else {
                                    // If checkbox is unchecked, show div2 and hide div1
                                    div2.classList.remove('hidden');
                                    div1.classList.add('hidden');
                                }
                            });
                        });
                    </script>
                    <script>
                        /**
                         * Define a function to navigate betweens form steps.
                         * It accepts one parameter. That is - step number.
                         */
                        const navigateToFormStep = (stepNumber) => {
                            /**
                             * Hide all form steps.
                             */
                            document.querySelectorAll(".form-step").forEach((formStepElement) => {
                                formStepElement.classList.add("d-none");
                            });
                            /**
                             * Mark all form steps as unfinished.
                             */
                            document.querySelectorAll(".form-stepper-list").forEach((formStepHeader) => {
                                formStepHeader.classList.add("form-stepper-unfinished");
                                formStepHeader.classList.remove("form-stepper-active", "form-stepper-completed");
                            });
                            /**
                             * Show the current form step (as passed to the function).
                             */
                            document.querySelector("#step-" + stepNumber).classList.remove("d-none");
                            /**
                             * Select the form step circle (progress bar).
                             */
                            const formStepCircle = document.querySelector('li[step="' + stepNumber + '"]');
                            /**
                             * Mark the current form step as active.
                             */
                            formStepCircle.classList.remove("form-stepper-unfinished", "form-stepper-completed");
                            formStepCircle.classList.add("form-stepper-active");
                            /**
                             * Loop through each form step circles.
                             * This loop will continue up to the current step number.
                             * Example: If the current step is 3,
                             * then the loop will perform operations for step 1 and 2.
                             */
                            for (let index = 0; index < stepNumber; index++) {
                                /**
                                 * Select the form step circle (progress bar).
                                 */
                                const formStepCircle = document.querySelector('li[step="' + index + '"]');
                                /**
                                 * Check if the element exist. If yes, then proceed.
                                 */
                                if (formStepCircle) {
                                    /**
                                     * Mark the form step as completed.
                                     */
                                    formStepCircle.classList.remove("form-stepper-unfinished", "form-stepper-active");
                                    formStepCircle.classList.add("form-stepper-completed");
                                }
                            }
                        };
                        /**
                         * Select all form navigation buttons, and loop through them.
                         */
                        document.querySelectorAll(".btn-navigate-form-step").forEach((formNavigationBtn) => {
                            /**
                             * Add a click event listener to the button.
                             */
                            formNavigationBtn.addEventListener("click", () => {
                                /**
                                 * Get the value of the step.
                                 */
                                const stepNumber = parseInt(formNavigationBtn.getAttribute("step_number"));
                                /**
                                 * Call the function to navigate to the target form step.
                                 */
                                navigateToFormStep(stepNumber);
                            });
                        });
                    </script>
                    <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            document.getElementById('userAccountSetupForm').addEventListener('submit', function(e) {
                                e.preventDefault();

                                var csrfToken = document.head.querySelector('meta[name="csrf-token"]').content;
                                var formData = new FormData(this);


                                fetch("{{ url('create-client') }}", {
                                        method: "POST",
                                        body: formData,
                                        headers: {
                                            'X-CSRF-TOKEN': csrfToken,
                                        },
                                    })
                                    .then(response => response.json())
                                    .then(data => {
                                        console.log(data);
                                        if (data.status === 'success') {

                                            toastr.options = {
                                                "closeButton": true,
                                                "progressBar": true,
                                                "timeOut": 15000
                                            };
                                            toastr.success(data.message);
                                            setTimeout(function() {

                                                window.location.href = '{{ url('all-client') }}';
                                            }, 2500);

                                        } else {
                                            toastr.options = {
                                                "closeButton": true,
                                                "closeButton": true,
                                                "progressBar": true,
                                                "timeOut": 15000

                                            };
                                            toastr.warning(data.message);
                                            setTimeout(function() {

                                                // window.location.href='{{ url('') }}';
                                            }, 4000);
                                        }
                                    })

                            });
                        });
                    </script>


                    @include('layouts.footer')
