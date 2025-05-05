<!DOCTYPE html>

<html lang="en" class="light-style layout-navbar-fixed layout-menu-fixed layout-compact " dir="ltr"
    data-theme="theme-default" data-assets-path="assets/" data-template="vertical-menu-template">

<head>
    <meta charset="utf-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Property Listing - Wizard Examples | Vuexy - Bootstrap Admin
        Template</title>

    <meta name="description" content="Start your development with a Dashboard for Bootstrap 5" />
    <meta name="keywords" content="dashboard, bootstrap 5 dashboard, bootstrap 5 design, bootstrap 5">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css"
        integrity="sha512-6S2HWzVFxruDlZxI3sXOZZ4/eJ8AcxkQH1+JjSe/ONCEqR9L4Ysq5JdT5ipqtzU7WHalNwzwBv+iE51gNHJNqQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon"
        href="https://demos.pixinvent.com/vuexy-html-admin-template/assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&amp;ampdisplay=swap"
        rel="stylesheet">

    <!-- Icons -->

    <link rel="stylesheet" href="assets/vendor/fonts/fontawesome.css" />
    <link rel="stylesheet" href="assets/vendor/fonts/tabler-icons.css" />
    <link rel="stylesheet" href="assets/vendor/fonts/flag-icons.css" />

    <!-- Core CSS -->

    <link rel="stylesheet" href="assets/vendor/css/rtl/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="assets/vendor/css/rtl/theme-default.css" class="template-customizer-theme-css" />

    <link rel="stylesheet" href="assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="assets/vendor/libs/node-waves/node-waves.css" />
    <link rel="stylesheet" href="assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="assets/vendor/libs/typeahead-js/typeahead.css" />
    <link rel="stylesheet" href="assets/vendor/libs/bs-stepper/bs-stepper.css" />
    <link rel="stylesheet" href="assets/vendor/libs/select2/select2.css" />
    <link rel="stylesheet" href="assets/vendor/libs/tagify/tagify.css" />
    <link rel="stylesheet" href="assets/vendor/libs/flatpickr/flatpickr.css" />
    <link rel="stylesheet" href="assets/vendor/libs/%40form-validation/umd/styles/index.min.css" />
    <link rel="stylesheet" href="assets/vendor/libs/select2/select2.css" />

    <!-- Page CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css"
        integrity="sha512-6S2HWzVFxruDlZxI3sXOZZ4/eJ8AcxkQH1+JjSe/ONCEqR9L4Ysq5JdT5ipqtzU7WHalNwzwBv+iE51gNHJNqQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Helpers -->
    <script src="assets/vendor/js/helpers.js"></script>
    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Template customizer: To hide customizer set displayCustomizer value false in config.js.  -->
    <script src="assets/vendor/js/template-customizer.js"></script>
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="assets/js/config.js"></script>

</head>
<style>
    #overlay {
        position: fixed;
        top: 0;
        z-index: 10000;
        width: 100%;
        height: 100%;
        display: none;
        background: rgba(0, 0, 0, 0.6);
    }

    .cv-spinner {
        height: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .spinner {
        width: 40px;
        height: 40px;
        border: 4px #ddd solid;
        border-top: 4px #2e93e6 solid;
        border-radius: 50%;
        animation: sp-anime 0.8s infinite linear;
    }

    @keyframes sp-anime {
        100% {
            transform: rotate(360deg);
        }
    }

    .is-hide {
        display: none;
    }

    #toast-container {
        z-index: 9999;
        /* Set a high z-index value */
    }
</style>

<body>

    <!-- loader -->
    <div id="overlay">
        <div class="cv-spinner">
            <span class="spinner"></span>
        </div>
    </div>
    <!-- loader -->

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

                    <!-- Content -->

                    <div class="container-xxl flex-grow-1 container-p-y">

                        <h4 class="py-3 mb-4">
                            <span class="text-muted fw-light">Reverse Booking /</span>
                            Create new
                        </h4>

                        {{-- Bulk Upload Model --}}
                        <div class="modal fade" id="modalCenter" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalCenterTitle">Bulk Upload</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <form id="myForm">
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col mb-3">
                                                    <label for="nameWithTitle" class="form-label">Business Type</label>
                                                    <select name="business_type" id="" class="form-control">
                                                        <option value="B2B">B2B</option>
                                                        <option value="B2C">B2C</option>
                                                    </select>
                                                </div>
                                                <div class="col mb-3">
                                                    <label for="nameWithTitle" class="form-label">File ( Excel Only
                                                        )</label>
                                                    <input type="file" id="nameWithTitle" class="form-control"
                                                        placeholder="Enter Name" name="file">
                                                </div>
                                            </div>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-label-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary"
                                                id="button">Upload</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        {{-- end --}}


                        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home"
                                    role="tab" aria-controls="pills-home" aria-selected="true">B2B Manual
                                    Booking</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile"
                                    role="tab" aria-controls="pills-profile" aria-selected="false">B2C Manual
                                    Booking</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact"
                                    role="tab" aria-controls="pills-contact" aria-selected="false"
                                    data-bs-toggle="modal" data-bs-target="#modalCenter"> BulkUpload</a>
                            </li>

                        </ul>
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                                aria-labelledby="pills-home-tab">
                                <!-- B2B Manual Booking -->
                                <div id="wizard-property-listing" class="bs-stepper vertical mt-2">
                                    <div class="bs-stepper-header">
                                        <div class="step" data-target="#personal-details">
                                            <button type="button" class="step-trigger">
                                                <span class="bs-stepper-circle"><i
                                                        class="ti ti-users ti-sm"></i></span>
                                                <span class="bs-stepper-label">
                                                    <span class="bs-stepper-title">Client Information</span>
                                                </span>
                                            </button>
                                        </div>
                                        <div class="line"></div>
                                        <div class="step" data-target="#property-details">
                                            <button type="button" class="step-trigger">
                                                <span class="bs-stepper-circle"><i
                                                        class="ti ti-home ti-sm"></i></span>
                                                <span class="bs-stepper-label">
                                                    <span class="bs-stepper-title">Shipping Information</span>
                                                </span>
                                            </button>
                                        </div>
                                        <div class="line"></div>
                                        <div class="step" data-target="#property-features">
                                            <button type="button" class="step-trigger">
                                                <span class="bs-stepper-circle"><i
                                                        class="ti ti-bookmarks ti-sm"></i></span>
                                                <span class="bs-stepper-label">
                                                    <span class="bs-stepper-title">Item Information</span>

                                                </span>
                                            </button>
                                        </div>

                                    </div>
                                    <div class="bs-stepper-content">
                                        <form id="wizard-property-listing-form" onSubmit="return false"
                                            action="" method="post">

                                            <!-- Personal Details -->
                                            <div id="personal-details" class="content">
                                                <div class="row g-3">

                                                    <div class="col-sm-6">
                                                        <label for="select2Basic" class="form-label">Clients</label>
                                                        <select name="client_id" id="select2Basic"
                                                            class="select2 form-select form-select-lg"
                                                            data-allow-clear="true">
                                                            <option selected disabled>Search For
                                                                Clients</option>
                                                            @foreach ($client as $val)
                                                                <option value="{{ $val->id }}">
                                                                    {{ $val->first_name }}
                                                                    {{ $val->last_name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label class="form-label" for="plLastName">Business
                                                            Type</label>
                                                        <input type="text" name="business_type"
                                                            class="form-control" value="B2B" readonly>
                                                    </div>

                                                    <div class="col-sm-6">
                                                        <label for="select2Basic" class="form-label">warehouse</label>
                                                        <select name="warehouse_id" id="select2Basics"
                                                            class="select2 form-select form-select-lg"
                                                            data-allow-clear="true">
                                                            <option selected disabled>Search For
                                                                warehouse</option>

                                                        </select>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label class="form-label" for="plLastName">LR No.</label>
                                                        <input type="text" name="lr_no" class="form-control">
                                                    </div>

                                                    <div class="col-12 d-flex justify-content-between mt-4">
                                                        <button type="button"
                                                            class="btn btn-label-secondary btn-prev" disabled> <i
                                                                class="ti ti-arrow-left ti-xs me-sm-1 me-0"></i>
                                                            <span
                                                                class="align-middle d-sm-inline-block d-none">Previous</span>
                                                        </button>
                                                        <button type="button" class="btn btn-primary btn-next"> <span
                                                                class="align-middle d-sm-inline-block d-none me-sm-1">Next</span>
                                                            <i class="ti ti-arrow-right ti-xs"></i></button>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Property Details -->
                                            <div id="property-details" class="content">
                                                <div class="row g-3">
                                                    <div class="col-sm-6">
                                                        <label class="form-label" for="plFirstName">Order
                                                            Number</label>
                                                        <input type="text" id="plFirstName" name="order_no"
                                                            class="form-control" placeholder="Order Number"
                                                            value="{{ strtoupper(Str::random(8)) }}
                                                    " />
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label class="form-label" for="plLastName">Transport
                                                            Mode</label>
                                                        <select name="transport_mode" class="form-control">
                                                            <option selected disabled>Order Type</option>
                                                            <option value="Air">Air</option>
                                                            <option value="Surface">Surface</option>
                                                            <option value="Same Day">Same Day</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label class="form-label" for="plCity">Vendor Name</label>
                                                        <input name="vendor_name" class="form-control"></input>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label class="form-label" for="plCity">CD No.</label>
                                                        <input name="cd_no" class="form-control"></input>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label class="form-label" for="plCity">EDD .</label>
                                                        <input name="edd" class="form-control"></input>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label class="form-label" for="plCity">Receiver Name
                                                            .</label>
                                                        <input name="receiver_name" class="form-control"></input>
                                                    </div>

                                                    <div class="col-sm-6">
                                                        <label class="form-label" for="plCity">Addres 1</label>
                                                        <textarea name="receiver_address" id="" cols="30" rows="4" class="form-control"></textarea>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label class="form-label" for="plCity">Addres 2</label>
                                                        <textarea name="receiver_address_2" id="" cols="30" rows="4" class="form-control"></textarea>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label class="form-label" for="plCity">State</label>
                                                        <input type="text" name="receiver_state"
                                                            class="form-control" placeholder="City">
                                                    </div>

                                                    <div class="col-sm-6">
                                                        <label class="form-label" for="plCity">City</label>
                                                        <input type="text" name="receiver_city"
                                                            class="form-control" placeholder="City">
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label class="form-label" for="plCity">Pin Code</label>
                                                        <input type="text" name="receiver_pincode"
                                                            class="form-control" placeholder="Pin Code">
                                                    </div>

                                                    <div class="col-sm-6">
                                                        <label class="form-label" for="plCity">Contact
                                                            Number</label>
                                                        <input type="text" name="receiver_contact_no"
                                                            class="form-control" placeholder="Contact Number">
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label class="form-label" for="plCity">Alternate
                                                            Number</label>
                                                        <input type="text" name="receiver_alt_contact_no"
                                                            class="form-control" placeholder="Alternate Number">
                                                    </div>

                                                    <div class="col-sm-6">
                                                        <label class="form-label" for="plCity">Remarks</label>
                                                        <input type="text" name="remarks" class="form-control"
                                                            placeholder="Alternate Number">
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label class="form-label" for="plCity">Invoice No</label>
                                                        <input type="text" name="invoice_no" class="form-control"
                                                            placeholder="Alternate Number">
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label class="form-label" for="plCity">COD DUE</label>
                                                        <input type="text" name="cod_due" class="form-control"
                                                            placeholder="Alternate Number">
                                                    </div>



                                                    <div class="col-12 d-flex justify-content-between mt-4">
                                                        <button type="button"
                                                            class="btn btn-label-secondary btn-prev"> <i
                                                                class="ti ti-arrow-left ti-xs me-sm-1 me-0"></i>
                                                            <span
                                                                class="align-middle d-sm-inline-block d-none">Previous</span>
                                                        </button>
                                                        <button type="button" class="btn btn-primary btn-next"> <span
                                                                class="align-middle d-sm-inline-block d-none me-sm-1">Next</span>
                                                            <i class="ti ti-arrow-right ti-xs"></i></button>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Property Features -->
                                            <div id="property-features" class="content">
                                                <div class="row g-3">
                                                    <div class="col-sm-6">
                                                        <label class="form-label d-block" for="plBedrooms">Payment
                                                            Mode</label>

                                                        <div class="form-check mb-2">
                                                            <input class="form-check-input" type="radio"
                                                                name="payment_mode" id="plCommonAreaRadioYes"
                                                                value="cod" checked>
                                                            <label class="form-check-label"
                                                                for="plCommonAreaRadioYes">COD</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio"
                                                                name="payment_mode" id="plCommonAreaRadioNo"
                                                                value="Prepaid">
                                                            <label class="form-check-label"
                                                                for="plCommonAreaRadioNo">Prepaid</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label class="form-label" for="plFloorNo">Item Price</label>
                                                        <input type="text" id="plFloorNo" name="item_price"
                                                            class="form-control" placeholder="Item Price" />
                                                    </div>

                                                    <div class="col-sm-6">
                                                        <label class="form-label d-block" for="plBathrooms">To
                                                            Pay</label>
                                                        <input type="text" id="plBathrooms" name="to_pay"
                                                            class="form-control" placeholder="To Pay" />
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label class="form-label d-block" for="plBathrooms">Cash
                                                            Received</label>
                                                        <input type="text" id="plBathrooms" name="item_name"
                                                            class="form-control" placeholder="Cash Received" />
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label class="form-label d-block"
                                                            for="plBathrooms">CFT</label>
                                                        <input type="text" id="plBathrooms" name="cft"
                                                            class="form-control" placeholder="CFT" />
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <label class="form-label" for="plFurnishingDetails">Item
                                                            Height</label>
                                                        <input name="item_height_cm" class="form-control"
                                                            placeholder="Item Height">
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label class="form-label" for="plFurnishingDetails">Item
                                                            Lenght</label>
                                                        <input name="item_length_cm" class="form-control"
                                                            placeholder="Item Lenght">
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label class="form-label" for="plFurnishingDetails">Item
                                                            Width</label>
                                                        <input id="plFurnishingDetails" name="item_width_cm"
                                                            class="form-control" placeholder="Item Width">
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label class="form-label" for="plFurnishingDetails">Item
                                                            Weight</label>
                                                        <input id="plFurnishingDetails" name="item_weight_kg"
                                                            class="form-control" placeholder="Item Weight">
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label class="form-label" for="plFurnishingDetails">Receiver
                                                            Gstin</label>
                                                        <input id="plFurnishingDetails" name="receiver_gstin"
                                                            class="form-control" placeholder="Receiver Gstin">
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label class="form-label" for="plFurnishingDetails">Invoice
                                                            Amount Rs</label>
                                                        <input id="plFurnishingDetails" name="invoice_amount_rs"
                                                            class="form-control" placeholder="Invoice Amount Rs">
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label class="form-label" for="plFurnishingDetails">E way
                                                            Bill</label>
                                                        <input id="plFurnishingDetails" name="e_way_bill"
                                                            class="form-control" placeholder="E way Bill">
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label class="form-label"
                                                            for="plFurnishingDetails">Fragile</label>
                                                        <input id="plFurnishingDetails" name="fragile"
                                                            class="form-control" placeholder="Fragile">
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label class="form-label" for="plFurnishingDetails">Rov
                                                            Type</label>
                                                        <input id="plFurnishingDetails" name="rov_type"
                                                            class="form-control" placeholder="Rov Type">
                                                    </div>

                                                    <div class="col-12 d-flex justify-content-between mt-4">
                                                        <button type="button"
                                                            class="btn btn-label-secondary btn-prev"> <i
                                                                class="ti ti-arrow-left ti-xs me-sm-1 me-0"></i>
                                                            <span
                                                                class="align-middle d-sm-inline-block d-none">Previous</span>
                                                        </button>
                                                        <button type="submit"
                                                            class="btn btn-success btn-submit btn-next"><span
                                                                class="align-middle d-sm-inline-block d-none me-sm-1">Submit</span><i
                                                                class="ti ti-check ti-xs"></i></button>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Property Area -->
                                            <div id="property-area" class="content">
                                                <div class="row g-3">
                                                    <div class="col-sm-6">
                                                        <label class="form-label d-block" for="plTotalArea">Total
                                                            Area</label>
                                                        <div class="input-group input-group-merge">
                                                            <input type="number" class="form-control"
                                                                id="plTotalArea" name="plTotalArea"
                                                                placeholder="1000" aria-describedby="pl-total-area">
                                                            <span class="input-group-text"
                                                                id="pl-total-area">sq-ft</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label class="form-label d-block" for="plCarpetArea">Carpet
                                                            Area</label>
                                                        <div class="input-group input-group-merge">
                                                            <input type="number" class="form-control"
                                                                id="plCarpetArea" name="plCarpetArea"
                                                                placeholder="800" aria-describedby="pl-carpet-area">
                                                            <span class="input-group-text"
                                                                id="pl-carpet-area">sq-ft</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label class="form-label d-block" for="plPlotArea">Plot
                                                            Area</label>
                                                        <div class="input-group input-group-merge">
                                                            <input type="number" class="form-control"
                                                                id="plPlotArea" name="plPlotArea" placeholder="800"
                                                                aria-describedby="pl-plot-area">
                                                            <span class="input-group-text"
                                                                id="pl-plot-area">sq-yd</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label class="form-label d-block"
                                                            for="plAvailableFrom">Available
                                                            From</label>
                                                        <input type="text" id="plAvailableFrom"
                                                            name="plAvailableFrom" class="form-control flatpickr"
                                                            placeholder="YYYY-MM-DD" />
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label class="form-label">Possession Status</label>
                                                        <div class="form-check mb-2">
                                                            <input class="form-check-input" type="radio"
                                                                name="plPossessionStatus" id="plUnderConstruction"
                                                                checked>
                                                            <label class="form-check-label"
                                                                for="plUnderConstruction">Under
                                                                Construction</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio"
                                                                name="plPossessionStatus" id="plReadyToMoveRadio">
                                                            <label class="form-check-label"
                                                                for="plReadyToMoveRadio">Ready to
                                                                Move</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label class="form-label">Transaction Type</label>
                                                        <div class="form-check mb-2">
                                                            <input class="form-check-input" type="radio"
                                                                name="plTransectionType" id="plNewProperty" checked>
                                                            <label class="form-check-label" for="plNewProperty">New
                                                                Property</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio"
                                                                name="plTransectionType" id="plResaleProperty">
                                                            <label class="form-check-label"
                                                                for="plResaleProperty">Resale</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label class="form-label">Is Property Facing Main
                                                            Road?</label>
                                                        <div class="form-check mb-2">
                                                            <input class="form-check-input" type="radio"
                                                                name="plRoadFacingRadio" id="plRoadFacingRadioYes"
                                                                checked>
                                                            <label class="form-check-label"
                                                                for="plRoadFacingRadioYes">Yes</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio"
                                                                name="plRoadFacingRadio" id="plRoadFacingRadioNo">
                                                            <label class="form-check-label"
                                                                for="plRoadFacingRadioNo">No</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label class="form-label">Gated Colony?</label>
                                                        <div class="form-check mb-2">
                                                            <input class="form-check-input" type="radio"
                                                                name="plGatedColonyRadio" id="plGatedColonyRadioYes"
                                                                checked>
                                                            <label class="form-check-label"
                                                                for="plGatedColonyRadioYes">Yes</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio"
                                                                name="plGatedColonyRadio" id="plGatedColonyRadioNo">
                                                            <label class="form-check-label"
                                                                for="plGatedColonyRadioNo">No</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 d-flex justify-content-between mt-4">
                                                        <button class="btn btn-label-secondary btn-prev"> <i
                                                                class="ti ti-arrow-left ti-xs me-sm-1 me-0"></i>
                                                            <span
                                                                class="align-middle d-sm-inline-block d-none">Previous</span>
                                                        </button>
                                                        <button class="btn btn-primary btn-next"> <span
                                                                class="align-middle d-sm-inline-block d-none me-sm-1">Next</span>
                                                            <i class="ti ti-arrow-right ti-xs"></i></button>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Price Details -->
                                            <div id="price-details" class="content">
                                                <div class="row g-3">
                                                    <div class="col-sm-6">
                                                        <label class="form-label d-block"
                                                            for="plExpeactedPrice">Expected
                                                            Price</label>
                                                        <div class="input-group input-group-merge">
                                                            <input type="number" class="form-control"
                                                                id="plExpeactedPrice" name="plExpeactedPrice"
                                                                placeholder="25,000"
                                                                aria-describedby="pl-expeacted-price">
                                                            <span class="input-group-text"
                                                                id="pl-expeacted-price">$</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label class="form-label d-block" for="plPriceSqft">Price per
                                                            Sqft</label>
                                                        <div class="input-group input-group-merge">
                                                            <input type="number" class="form-control"
                                                                id="plPriceSqft" name="plPriceSqft" placeholder="500"
                                                                aria-describedby="pl-price-sqft">
                                                            <span class="input-group-text" id="pl-price-sqft">$</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label class="form-label d-block"
                                                            for="plMaintenenceCharge">Maintenance Charge</label>
                                                        <div class="input-group input-group-merge">
                                                            <input type="number" class="form-control"
                                                                id="plMaintenenceCharge" name="plMaintenenceCharge"
                                                                placeholder="50"
                                                                aria-describedby="pl-mentenence-charge">
                                                            <span class="input-group-text"
                                                                id="pl-mentenence-charge">$</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label class="form-label"
                                                            for="plMaintenencePer">Maintenance</label>
                                                        <select id="plMaintenencePer" name="plMaintenencePer"
                                                            class="form-select">
                                                            <option value="1" selected>Monthly</option>
                                                            <option value="2">Quarterly</option>
                                                            <option value="3">Yearly</option>
                                                            <option value="3">One-time</option>
                                                            <option value="3">Per sqft. Monthly</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label class="form-label d-block"
                                                            for="plBookingAmount">Booking/Token
                                                            Amount</label>
                                                        <div class="input-group input-group-merge">
                                                            <input type="number" class="form-control"
                                                                id="plBookingAmount" name="plBookingAmount"
                                                                placeholder="250"
                                                                aria-describedby="pl-booking-amount">
                                                            <span class="input-group-text"
                                                                id="pl-booking-amount">$</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label class="form-label d-block" for="plOtherAmount">Other
                                                            Amount</label>
                                                        <div class="input-group input-group-merge">
                                                            <input type="number" class="form-control"
                                                                id="plOtherAmount" name="plOtherAmount"
                                                                placeholder="500" aria-describedby="pl-other-amount">
                                                            <span class="input-group-text"
                                                                id="pl-other-amount">$</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label class="form-label">Show Price as</label>
                                                        <div class="form-check mb-2">
                                                            <input class="form-check-input" type="radio"
                                                                name="plShowPriceRadio" id="plNagotiablePrice"
                                                                checked>
                                                            <label class="form-check-label"
                                                                for="plNagotiablePrice">Negotiable</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio"
                                                                name="plShowPriceRadio" id="plCallForPrice">
                                                            <label class="form-check-label" for="plCallForPrice">Call
                                                                for
                                                                Price</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label class="form-label">Price includes</label>
                                                        <div class="form-check mb-2">
                                                            <input class="form-check-input" type="checkbox"
                                                                name="plCarParking" id="plCarParking">
                                                            <label class="form-check-label" for="plCarParking">Car
                                                                Parking</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox"
                                                                name="plClubMembership" id="plClubMembership">
                                                            <label class="form-check-label"
                                                                for="plClubMembership">Club
                                                                Membership</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox"
                                                                name="plOtherCharges" id="plOtherCharges">
                                                            <label class="form-check-label" for="plOtherCharges">Stamp
                                                                Duty &
                                                                Registration
                                                                charges
                                                                excluded.</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 d-flex justify-content-between mt-4">
                                                        <button class="btn btn-label-secondary btn-prev"> <i
                                                                class="ti ti-arrow-left ti-xs me-sm-1 me-0"></i>
                                                            <span
                                                                class="align-middle d-sm-inline-block d-none">Previous</span>
                                                        </button>
                                                        <button class="btn btn-success btn-submit btn-next"><span
                                                                class="align-middle d-sm-inline-block d-none me-sm-1">Submit</span><i
                                                                class="ti ti-check ti-xs"></i></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <!--/ end-->
                            </div>
                            <div class="tab-pane fade" id="pills-profile" role="tabpanel"
                                aria-labelledby="pills-profile-tab">
                                ...
                            </div>
                        </div>



                    </div>
                    <!-- / Content -->

                    <!-- Footer -->
                    <footer class="content-footer footer bg-footer-theme">
                        <div class="container-xxl">
                            <div
                                class="footer-container d-flex align-items-center justify-content-between py-2 flex-md-row flex-column">
                                <div>
                                    ©
                                    <script>
                                        document.write(new Date().getFullYear())
                                    </script>, made with ❤️ by <a href="https://pixinvent.com/"
                                        target="_blank" class="fw-medium">Pixinvent</a>
                                </div>
                                <div class="d-none d-lg-inline-block">

                                    <a href="https://themeforest.net/licenses/standard" class="footer-link me-4"
                                        target="_blank">License</a>
                                    <a href="https://1.envato.market/pixinvent_portfolio" target="_blank"
                                        class="footer-link me-4">More
                                        Themes</a>

                                    <a href="https://demos.pixinvent.com/vuexy-html-admin-template/documentation/"
                                        target="_blank" class="footer-link me-4">Documentation</a>

                                    <a href="https://pixinvent.ticksy.com/" target="_blank"
                                        class="footer-link d-none d-sm-inline-block">Support</a>

                                </div>
                            </div>
                        </div>
                    </footer>
                    <!-- / Footer -->

                    <div class="content-backdrop fade"></div>
                </div>
                <!-- Content wrapper -->
            </div>
            <!-- / Layout page -->
        </div>

        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>

        <!-- Drag Target Area To SlideIn Menu On Small Screens -->
        <div class="drag-target"></div>

    </div>
    <!-- / Layout wrapper -->


    {{-- loader --}}

    {{-- end --}}
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        $(document).ready(function() {


            $('#button').click(function() {


                $("#overlay").fadeIn(300);
                var formData = new FormData($('#myForm')[0]);
                var csrfToken = $('meta[name="csrf-token"]').attr('content');

                fetch("{{ url('upload-bulkbooking-reverse') }}", {
                        method: "POST",
                        body: formData,
                        headers: {
                            'X-CSRF-TOKEN': csrfToken,
                        },
                    })
                    .then(response => response.json())
                    .then(data => {

                        if (data.status === 'success') {
                            setTimeout(function()
                            {
                                $("#overlay").fadeOut(300);
                                // window.location.href = '{{ url('all-booking') }}';
                            }, 500);
                            $('#modalCenter').modal('hide');
                            Swal.fire({
                                title: data.status,
                                text: data.message,
                                imageUrl: "{{ url('images/success.gif') }}",
                                imageWidth: 400,
                                imageHeight: 240,
                                imageAlt: "Custom image"
                            });
                        } else {
                            $('#modalCenter').modal('hide');
                            Swal.fire({
                                title: 'Error!',
                                text: data.message,
                                icon: 'error',
                                confirmButtonText: 'Close'
                            })
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        // Handle error or show an appropriate message
                    });
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            // Attach change event listener to the select element
            $('#select2Basic').on('change', function() {
                // Get the selected value
                var selectedClientId = $(this).val();

                $.ajax({
                    url: '{{ url('get-warehouse') }}',
                    method: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        client_id: selectedClientId
                    },
                    success: function(response) {
                        $('#select2Basics').html(response);
                    },
                    error: function(error) {
                        console.error(error);
                    }
                });
            });
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('wizard-property-listing-form').addEventListener('submit', function(e) {
                e.preventDefault();

                var csrfToken = document.head.querySelector('meta[name="csrf-token"]').content;
                var formData = new FormData(this);

                fetch("{{ url('reverse-booking') }}", {
                        method: "POST",
                        body: formData,
                        headers: {
                            'X-CSRF-TOKEN': csrfToken,
                        },
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.status === 'success') {
                            Swal.fire({
                                title: data.status,
                                text: data.message,
                                imageUrl: "{{ url('images/success.gif') }}",
                                imageWidth: 400,
                                imageHeight: 240,
                                imageAlt: "Custom image"
                            });
                        } else {
                            Swal.fire({
                                title: 'Error!',
                                text: data.message,
                                icon: 'error',
                                confirmButtonText: 'Close'
                            })
                        }
                    })


            });
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->

    <script src="assets/vendor/libs/jquery/jquery.js"></script>
    <script src="assets/vendor/libs/popper/popper.js"></script>
    <script src="assets/vendor/js/bootstrap.js"></script>
    <script src="assets/vendor/libs/node-waves/node-waves.js"></script>
    <script src="assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="assets/vendor/libs/hammer/hammer.js"></script>
    <script src="assets/vendor/libs/i18n/i18n.js"></script>
    <script src="assets/vendor/libs/typeahead-js/typeahead.js"></script>
    <script src="assets/vendor/js/menu.js"></script>

    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="assets/vendor/libs/cleavejs/cleave.js"></script>
    <script src="assets/vendor/libs/cleavejs/cleave-phone.js"></script>
    <script src="assets/vendor/libs/bs-stepper/bs-stepper.js"></script>
    <script src="assets/vendor/libs/select2/select2.js"></script>
    <script src="assets/vendor/libs/tagify/tagify.js"></script>
    <script src="assets/vendor/libs/flatpickr/flatpickr.js"></script>
    <script src="assets/vendor/libs/%40form-validation/umd/bundle/popular.min.js"></script>
    <script src="assets/vendor/libs/%40form-validation/umd/plugin-bootstrap5/index.min.js"></script>
    <script src="assets/vendor/libs/%40form-validation/umd/plugin-auto-focus/index.min.js"></script>

    <!-- Main JS -->
    <script src="assets/js/main.js"></script>

    <!-- Page JS -->
    <script src="assets/js/forms-selects.js"></script>
    <script src="assets/js/wizard-ex-property-listing.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"
        integrity="sha512-lbwH47l/tPXJYG9AcFNoJaTMhGvYWhVM9YI43CT+uteTRRaiLCui8snIgyAN8XWgNjNhCqlAUdzZptso6OCoFQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</body>


</html>

<!-- beautify ignore:end -->
