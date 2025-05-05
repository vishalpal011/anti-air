<!DOCTYPE html>

<html lang="en" class="light-style layout-navbar-fixed layout-menu-fixed layout-compact " dir="ltr"
    data-theme="theme-default" data-assets-path="../../assets/" data-template="vertical-menu-template">

<head>
    <meta charset="utf-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Dashboard - Analytics | Vuexy - Bootstrap Admin Template</title>


    <meta name="description" content="Start your development with a Dashboard for Bootstrap 5" />
    <meta name="keywords" content="dashboard, bootstrap 5 dashboard, bootstrap 5 design, bootstrap 5">

    @include('layouts.links')

    <link rel="stylesheet" href="{{ asset('node_modules/bootstrap/dist/css/bootstrap.min.css') }}">
</head>
<style>
    svg {
        height: 12px;
    }

    .custom-option-icon .custom-option-content {
        text-align: center;
        padding: 6px;
    }

    a {
        color: black !important;
    }

    .multipleChosen,
    .multipleSelect2 {
        width: 300px;
    }

    .filters-nav ul li {
        padding: 5px;
    }

    .multipleChosen,
    .multipleSelect2 {
        width: 300px;
    }

    .filters-nav ul li {
        padding: 5px;
    }

    table,
    th,
    /* td {
        border: 1px solid black;
    } */

    .table th {
        white-space: nowrap;
        /* font-weight: bold; */
        padding: 10px;
    }

    td {
        padding: 5px;
    }

    .weight ul li {
        padding: 1px;
    }

    #overlay {
        position: fixed;
        top: 0;
        z-index: 10000;
        width: 100%;
        height: 100%;
        display: none;
        background: rgba(0, 0, 0, 0.6);
    }

    #overlay img {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }


    /* table, th, td {
  border:1px solid black;
} */
</style>

<body>

    <!-- loader -->
    {{-- <div id="overlay">

        <img src="{{ url('images/tenor.gif') }}" alt="Loading..." />
    </div> --}}
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
                    <div class="container-xxl flex-grow-1 container-p-y">

                        <h4 class="py-3 mb-2">
                            <span class="text-muted fw-light">Bookings /</span> View Bookings / B2C Bookings
                        </h4>

                        <!-- Order List Widget -->

                        <div class="card mb-4">
                            <div class="card-widget-separator-wrapper">
                                <div class="card-body card-widget-separator">
                                    <div class="row gy-4 gy-sm-1">
                                        <div class="col-sm-4 col-lg-2">
                                            <div
                                                class="d-flex justify-content-between align-items-start card-widget-1 border-end pb-3 pb-sm-0">
                                                <div>
                                                    <h4 class="mb-2">{{ $all_booking }}</h4>
                                                    <p class="mb-0 fw-medium">All Orders </p>
                                                </div>
                                                <span class="avatar me-sm-4">
                                                    <span class="avatar-initial bg-label-secondary rounded">
                                                        <i class="ti-md ti ti-calendar-stats text-body"></i>
                                                    </span>
                                                </span>
                                            </div>
                                            <hr class="d-none d-sm-block d-lg-none me-4">
                                        </div>
                                        <div class="col-sm-4 col-lg-2">
                                            <div
                                                class="d-flex justify-content-between align-items-start card-widget-2 border-end pb-3 pb-sm-0">
                                                <div>
                                                    <h4 class="mb-2">{{ $faild_orders }}</h4>
                                                    <p class="mb-0 fw-medium">Failed Orders</p>
                                                </div>
                                                <span class="avatar p-2 me-lg-4">
                                                    <span class="avatar-initial bg-label-secondary rounded"><i
                                                            class="ti-md ti ti-checks text-body"></i></span>
                                                </span>
                                            </div>
                                            <hr class="d-none d-sm-block d-lg-none">
                                        </div>
                                        <div class="col-sm-4 col-lg-2">
                                            <div
                                                class="d-flex justify-content-between align-items-start card-widget-2 border-end pb-3 pb-sm-0">
                                                <div>
                                                    <h4 class="mb-2">{{ $booked }}</h4>
                                                    <p class="mb-0 fw-medium">Booked</p>
                                                </div>
                                                <span class="avatar p-2 me-lg-4">
                                                    <span class="avatar-initial bg-label-secondary rounded"><i
                                                            class="ti-md ti ti-checks text-body"></i></span>
                                                </span>
                                            </div>
                                            <hr class="d-none d-sm-block d-lg-none">
                                        </div>
                                        <div class="col-sm-4 col-lg-2">
                                            <div
                                                class="d-flex justify-content-between align-items-start card-widget-2 border-end pb-3 pb-sm-0">
                                                <div>
                                                    {{-- <h4 class="mb-2">{{ $active }}</h4> --}}
                                                    <p class="mb-0 fw-medium">Cancelled</p>
                                                </div>
                                                <span class="avatar p-2 me-lg-4">
                                                    <span class="avatar-initial bg-label-secondary rounded"><i
                                                            class="ti-md ti ti-checks text-body"></i></span>
                                                </span>
                                            </div>
                                            <hr class="d-none d-sm-block d-lg-none">
                                        </div>
                                    </div>

                                </div>
                            </div>
                            {{-- <ul class="nav nav-pills   bg-white  p-2" id="pills-tab" role="tablist">
                                <li class="nav-item text-white">
                                    <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home"
                                        role="tab" aria-controls="pills-home" aria-selected="true">All Orders</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile"
                                        role="tab" aria-controls="pills-profile" aria-selected="false">Pending
                                        Pickup</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact"
                                        role="tab" aria-controls="pills-contact" aria-selected="false">InTransit</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="pills-contact-tab" data-toggle="pill"
                                        href="#Out-For-Delivery" role="tab" aria-controls="pills-contact"
                                        aria-selected="false">Out For
                                        Delivery</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#Delivered"
                                        role="tab" aria-controls="pills-contact"
                                        aria-selected="false">Delivered</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#RTO"
                                        role="tab" aria-controls="pills-contact" aria-selected="false">RTO</a>
                                </li>

                            </ul> --}}

                            <ul class="nav nav-pills   bg-white  p-2" id="pills-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home"
                                        role="tab" aria-controls="pills-home" aria-selected="true">All Orders</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile"
                                        role="tab" aria-controls="pills-profile" aria-selected="false">Pending
                                        Pickup</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact"
                                        role="tab" aria-controls="pills-contact" aria-selected="false">InTransit</a>
                                </li>
                            </ul>

                        </div>

                        <!-- Order List Table -->
                        <div style="font-size: 13px;">

                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                                    aria-labelledby="pills-home-tab">
                                    <div class="filters-nav card p-1">
                                        <ul class="nav nav-pills bg-white" id="pills-tab" role="tablist">

                                            <li>
                                                <button class="btn btn-sm btn-primary p-2" id="changeStatusButton">
                                                    <i class="fa fa-check-square" aria-hidden="true"></i> &nbsp;
                                                    Assign
                                                    Courier By Manually
                                                </button>
                                            </li>
                                            <li>
                                                <button id="changeStatusButton2" class="btn btn-sm btn-success p-2"><i
                                                        class="fa fa-check" aria-hidden="true"></i> &nbsp; Assign
                                                    Courier By Priority</button>
                                            </li>
                                            <li>
                                                <button type="button" id="toggleButton"
                                                    class="btn btn-sm btn-primary p-2">
                                                    <i class="fa fa-filter" aria-hidden="true"></i>&nbsp;Filter
                                                </button>
                                            </li>
                                            <li>
                                                <button class="btn btn-sm btn-danger p-2"
                                                    id="deleteModalSubmitButton"><i class="fa fa-trash"
                                                        aria-hidden="true"></i> &nbsp;
                                                    Delete</button>
                                            </li>
                                            <li>
                                                <a href="{{ url('forword-booking-excel') }}"><button
                                                        class="btn btn-sm btn-success p-2"><i class="fa fa-file-excel"
                                                            aria-hidden="true"></i> &nbsp; Download Excel</button>
                                                </a>
                                            </li>

                                            @if ($bookings->contains('disputed_status', 'false'))
                                                <li>
                                                    <button type="button" class="btn btn-sm btn-primary"
                                                        data-bs-toggle="modal" data-bs-target="#modalCenters">
                                                        <i class="fa fa-upload" aria-hidden="true"></i> &nbsp;
                                                        Upload corrected sheet
                                                    </button>
                                                </li>
                                            @endif

                                            <li>

                                                <form action="{{ url()->current() }}" method="get">
                                                    <label for="perPage">Total data Show:</label>
                                                    <select class="form-control" name="perPage" id="perPage"
                                                        onchange="this.form.submit()">
                                                        <option value="10" {{ $perPage == 10 ? 'selected' : '' }}>
                                                            10</option>
                                                        <option value="50" {{ $perPage == 50 ? 'selected' : '' }}>
                                                            50</option>
                                                        <option value="200" {{ $perPage == 200 ? 'selected' : '' }}>
                                                            200</option>
                                                        <option value="all"
                                                            {{ $perPage == 1000 ? 'selected' : '' }}>All</option>
                                                    </select>
                                                </form>

                                            </li>
                                            <div class="modal fade" id="modalCenters" tabindex="-1"
                                                aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h6 class="modal-title" id="modalCenterTitle">
                                                                <div class="alert alert-warning d-flex align-items-center"
                                                                    role="alert">
                                                                    <span class="alert-icon text-warning me-2">
                                                                        <i class="fa fa-info" aria-hidden="true"></i>
                                                                    </span>
                                                                    &nbsp;
                                                                    You can only Upated or Corrected Sheet
                                                                </div>
                                                            </h6>
                                                            {{-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> --}}
                                                        </div>
                                                        <form id="updated_sheet" method="POST">
                                                            <div class="modal-body">
                                                                <div class="row">
                                                                    <div class="col mb-3">
                                                                        <label for="nameWithTitle"
                                                                            class="form-label">Upload Excel</label>
                                                                        <input type="file" id="nameWithTitle"
                                                                            name="updated_excel" class="form-control"
                                                                            placeholder="Enter Name">
                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-label-secondary"
                                                                    data-bs-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-primary">Upload
                                                                    changes</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>


                                        </ul>

                                        <div id="successDiv" style="display: none;">
                                            <div class="row pt-2">
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="">Disputed Oders</label>
                                                        <select name="" id="disputed" class="form-control">
                                                            <option selected disabled>Select Tags</option>
                                                            <option value="false">Disputed Orders</option>
                                                            <option value="true">Minifested Orders</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div>
                                                        <label for="">Sort by</label>
                                                        <select name="" id="sort_by" class="form-control">
                                                            <option selected disabled>Select Keys</option>
                                                            <option value="ASC">Ascending</option>
                                                            <option value="DESC">Descending</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="">Order Number</label>
                                                    <input type="text" id="order_number" class="form-control"
                                                        name="order_number">
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="">Order Type</label>
                                                    <select name="" id="order_type" class="form-control">
                                                        <option selected disabled>Select Type</option>
                                                        <option value="Air">Air</option>
                                                        <option value="Surface">Surface</option>
                                                        <option value="Same Day">Same Day</option>
                                                    </select>
                                                </div>
                                            </div>
                                            {{--  --}}
                                            <div class="row pt-2">
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="">Tags</label>
                                                        <select name="" id="tags" class="form-control">
                                                            <option selected disabled>Select BY Required</option>
                                                            <option value="order_no">Order No</option>
                                                            <option value="transport_mode">Transport Mode</option>
                                                            <option value="receiver_state">Receiver State</option>
                                                            <option value="receiver_name">Receiver Name</option>
                                                            <option value="receiver_address">Receiver Address</option>
                                                            <option value="receiver_address_2">Receiver Address 2
                                                            </option>
                                                            <option value="receiver_city">Receiver City</option>
                                                            <option value="receiver_pincode">Receiver Pincode</option>
                                                            <option value="receiver_contact_no">Receiver Contact No
                                                            </option>
                                                            <option value="receiver_alt_contact_no">Receiver Alternate
                                                                Contact No</option>
                                                            <option value="invoice_no">Invoice No</option>
                                                            <option value="payment_mode">Payment Mode</option>
                                                            <option value="item_price">Item Price</option>
                                                            <option value="cod_due">COD Due</option>
                                                            <option value="to_pay">To Pay</option>
                                                            <option value="item_weight_kg">Item_ Wight Kg</option>
                                                            <option value="item_height_cm">Item Height cm</option>
                                                            <option value="item_length_cm">Item Length cm</option>
                                                            <option value="item_width_cm">Item_width_cm</option>
                                                            <option value="invoice_amount_rs">Invoice Amount Rs
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div>
                                                        <label for="">By Pincode</label>
                                                        <input type="text" class="form-control"
                                                            name="order_number">
                                                    </div>
                                                </div>
                                                <div class="col-md-3 pt-4">
                                                    <button type="button" onclick="Datafilter()"
                                                        class="btn  btn-primary">Submit</button>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    {{-- main --}}
                                    <div class="card p-2">
                                        <div class="card-datatable table-responsive">
                                            <table class="table" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th> <input type="checkbox" id="selectAllCheckbox"> </th>
                                                        </th>
                                                        <th>S.No.</th>
                                                        <th>Status</th>
                                                        <th>Order Details</th>
                                                        <th>Business Type</th>
                                                        <th>A.W.B No.</th>
                                                        <th>Clients</th>
                                                        <th>Payment Details</th>
                                                        <th>warehouse</th>
                                                        <th>Couriers</th>
                                                        <th>Tags</th>
                                                        {{-- <th>Pin-Code Status</th> --}}

                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    @foreach ($bookings as $value)
                                                        <tr id="row{{ $value->id }}">
                                                            <td><input type="checkbox" class="item-checkbox"
                                                                    value="{{ $value->id }}"></td>
                                                            <td>{{ $loop->iteration }} </td>
                                                            <td>
                                                                @if ($value->disputed_status == 'false')
                                                                    <span
                                                                        class="badge rounded-pill bg-label-danger">Manifestated
                                                                        Booking</span>
                                                                @else
                                                                    @if ($value->status == 'Manifestated')
                                                                        <span
                                                                            class="badge rounded-pill bg-label-success">Booked</span>
                                                                    @endif
                                                                @endif

                                                                @if ($value->status == 'Assigned Request')
                                                                    <span class="badge bg-success">Assign Request
                                                                        Sent</span>
                                                                @else
                                                                    @if ($value->status == 'waiting for pickup')
                                                                        <span class="badge bg-primary">waiting for
                                                                            pickup</span>
                                                                    @endif
                                                                    @if ($value->status == 'cancel')
                                                                    <span class="badge bg-danger">Canceled Booking</span>
                                                                @endif
                                                                @endif

                                                            </td>
                                                            <td>
                                                                <ul style="list-style: none">
                                                                    <li>{{ $value->order_no }}
                                                                    </li>
                                                                    <li><b>Mode</b> - {{ $value->order_type }}</li>
                                                                </ul>
                                                            </td>

                                                            <td>{{ $value->business_type }}</td>
                                                            <td>
                                                                {{ $value->awb_no }}
                                                            </td>
                                                            <td>
                                                                {{ optional($value->clients)->first_name }}
                                                                {{ optional($value->clients)->last_name }}
                                                            </td>
                                                            <td>
                                                                <button
                                                                    class="btn btn-sm btn-primary">{{ $value->payment_mode }}</button>&nbsp;
                                                                <i class="fa fa-inr" aria-hidden="true"></i>
                                                                {{ $value->item_price }}
                                                            </td>
                                                            <td>{{ optional($value->warehouses)->warehouse_name }}</td>
                                                            <td>{{ optional($value->couriers)->courier_display_name }}
                                                            </td>

                                                            <td>
                                                                @foreach ($bookingauditByBookingId[$value->id] ?? [] as $audit)
                                                                    @php
                                                                        $response = $audit->response;
                                                                        $decodedResponse = json_decode($response, true);

                                                                        if (
                                                                            $decodedResponse !== null &&
                                                                            json_last_error() === JSON_ERROR_NONE
                                                                        ) {
                                                                            foreach ($decodedResponse as $json) {
                                                                                echo '<span class="badge bg-label-danger">' .
                                                                                    $json .
                                                                                    '</span> <br>';
                                                                            }
                                                                        } else {
                                                                            // Handle the case where the response is not valid JSON
                                                                            echo 'Issue Resolved';
                                                                        }
                                                                    @endphp
                                                                @endforeach

                                                            </td>
                                                            {{-- <td>
                                                                    @foreach ($pincode_audits->where('booking_id', $value->id) as $pin_audits)
                                                                        @if ($pin_audits->status == '1')
                                                                            <span class="badge rounded-pill bg-primary">Active
                                                                                Pin-code</span>
                                                                        @else
                                                                            <span class="badge rounded-pill bg-danger">Not
                                                                                Serviceable Pin-code</span>
                                                                        @endif
                                                                    @endforeach

                                                                </td> --}}

                                                            <td>
                                                                @if ($value->disputed_status == 'false')
                                                                    <a
                                                                        href="{{ url('view-bookings-b2c') }}/{{ $value->id }}">
                                                                        <i class="fa fa-refresh"
                                                                            aria-hidden="true"></i> </a>
                                                                @else
                                                                    @if ($value->status == 'Manifestated')
                                                                        <a
                                                                            href="{{ url('view-bookings-b2c') }}/{{ $value->id }}">
                                                                            <i
                                                                                class='menu-icon tf-icons ti ti-eye'></i>
                                                                        </a>
                                                                    @endif
                                                                    @if ($value->status == 'Assigned Request')
                                                                        <a
                                                                            href="{{ url('view-bookings-b2c') }}/{{ $value->id }}">
                                                                            <i
                                                                                class='menu-icon tf-icons ti ti-eye'></i>
                                                                        </a>
                                                                    @endif
                                                                @endif

                                                            </td>
                                                        </tr>
                                                    @endforeach

                                                </tbody>

                                            </table>
                                        </div>
                                        <div class="row mx-2 pt-4">

                                            <div class="col-sm-12 col-md-12">
                                                <div class="dataTables_paginate paging_simple_numbers"
                                                    id="DataTables_Table_0_paginate">
                                                    <ul class="pagination">
                                                        {{ $bookings->links() }}
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- end --}}
                                </div>

                                <div class="tab-pane fade" id="pills-profile" role="tabpanel"
                                    aria-labelledby="pills-profile-tab">
                                    <div class="filters-nav card p-1">
                                        <ul class="nav nav-pills bg-white" id="pills-tab" role="tablist">

                                            <li><button class="btn btn-sm btn-primary p-2" id="assign_labels">
                                                    <i class="fa fa-download" aria-hidden="true"></i> &nbsp;
                                                    Assign Labels & Download
                                                </button>
                                            </li>

                                            <li>
                                                <button class="btn btn-sm btn-primary p-2" id="download_invoice"> <i
                                                        class="fa fa-download" aria-hidden="true"></i> &nbsp; Download
                                                    Invoices</button>
                                            </li>
                                            {{-- <li>
                                                <button type="button" id="toggleButton"
                                                    class="btn btn-sm btn-primary p-2">
                                                    <i class="fa fa-filter" aria-hidden="true"></i>&nbsp;Filter
                                                </button>
                                            </li> --}}
                                            <li>
                                                <button class="btn btn-sm btn-success p-2" id="Scheduled_Pickup"><i
                                                        class="fa fa-clock" aria-hidden="true"></i> &nbsp; Scheduled
                                                    Pickup
                                                </button>
                                            </li>
                                            <li>
                                                <button class="btn btn-sm btn-danger p-2" id="cancel_booking"><i
                                                        class="fa fa-ban" aria-hidden="true"></i> &nbsp; Cancel
                                                    Bookings
                                                </button>
                                            </li>
                                        </ul>

                                        <div id="successDiv" style="display: none;">
                                            <div class="row pt-2">
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="">Disputed Oders</label>
                                                        <select name="" id="disputed" class="form-control">
                                                            <option selected disabled>Select Tags</option>
                                                            <option value="false">Disputed Orders</option>
                                                            <option value="true">Minifested Orders</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div>
                                                        <label for="">Sort by</label>
                                                        <select name="" id="sort_by" class="form-control">
                                                            <option selected disabled>Select Keys</option>
                                                            <option value="ASC">Ascending</option>
                                                            <option value="DESC">Descending</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="">Order Number</label>
                                                    <input type="text" id="order_number" class="form-control"
                                                        name="order_number">
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="">Order Type</label>
                                                    <select name="" id="order_type" class="form-control">
                                                        <option selected disabled>Select Type</option>
                                                        <option value="Air">Air</option>
                                                        <option value="Surface">Surface</option>
                                                        <option value="Same Day">Same Day</option>
                                                    </select>
                                                </div>
                                            </div>
                                            {{--  --}}
                                            <div class="row pt-2">
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="">Tags</label>
                                                        <select name="" id="tags" class="form-control">
                                                            <option selected disabled>Select BY Required</option>
                                                            <option value="order_no">Order No</option>
                                                            <option value="transport_mode">Transport Mode</option>
                                                            <option value="receiver_state">Receiver State</option>
                                                            <option value="receiver_name">Receiver Name</option>
                                                            <option value="receiver_address">Receiver Address</option>
                                                            <option value="receiver_address_2">Receiver Address 2
                                                            </option>
                                                            <option value="receiver_city">Receiver City</option>
                                                            <option value="receiver_pincode">Receiver Pincode</option>
                                                            <option value="receiver_contact_no">Receiver Contact No
                                                            </option>
                                                            <option value="receiver_alt_contact_no">Receiver Alternate
                                                                Contact No</option>
                                                            <option value="invoice_no">Invoice No</option>
                                                            <option value="payment_mode">Payment Mode</option>
                                                            <option value="item_price">Item Price</option>
                                                            <option value="cod_due">COD Due</option>
                                                            <option value="to_pay">To Pay</option>
                                                            <option value="item_weight_kg">Item_ Wight Kg</option>
                                                            <option value="item_height_cm">Item Height cm</option>
                                                            <option value="item_length_cm">Item Length cm</option>
                                                            <option value="item_width_cm">Item_width_cm</option>
                                                            <option value="invoice_amount_rs">Invoice Amount Rs
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div>
                                                        <label for="">By Pincode</label>
                                                        <input type="text" class="form-control"
                                                            name="order_number">
                                                    </div>
                                                </div>
                                                <div class="col-md-3 pt-4">
                                                    <button type="button" onclick="Datafilter()"
                                                        class="btn  btn-primary">Submit</button>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    {{-- main --}}
                                    <div class="card p-2">
                                        <div class="card-datatable table-responsive">
                                            <table class="table" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th> <input type="checkbox" id="selectAllCheckboxs"> </th>
                                                        </th>
                                                        <th>S.No.</th>
                                                        <th>Status</th>
                                                        <th>Order Number</th>
                                                        <th>Business Type</th>
                                                        <th>A.W.B No.</th>
                                                        <th>Clients</th>
                                                        <th>Payment Mode</th>
                                                        <th>warehouse</th>
                                                        <th>Couriers</th>
                                                        {{-- <th>Tags</th> --}}
                                                        <th>Pin-Code Status</th>

                                                        {{-- <th>Action</th> --}}
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    @forelse ($pickup as $value)
                                                        <tr id="row{{ $value->id }}">
                                                            <td><input type="checkbox" class="item-checkboxs"
                                                                    value="{{ $value->id }}"></td>
                                                            <td>{{ $loop->iteration }}</td>
                                                            <td>
                                                                @if ($value->disputed_status == 'false')
                                                                    <span
                                                                        class="badge rounded-pill bg-danger">Manifestated
                                                                        Booking</span>
                                                                @else
                                                                    @if ($value->status == 'Manifestated')
                                                                        <span class="badge bg-warning">Booked</span>
                                                                    @endif
                                                                @endif

                                                                @if ($value->status == 'Assigned Request')
                                                                    <span class="badge bg-success">Ready for
                                                                        pick-up</span>
                                                                @endif
                                                                @if ($value->status == 'waiting for pickup')
                                                                    <span class="badge bg-primary">waiting for
                                                                        pickup</span>
                                                                @endif
                                                            </td>
                                                            <td>{{ $value->order_no }}</td>
                                                            <td>{{ $value->business_type }}</td>
                                                            <td>{{ $value->awb_no }}</td>
                                                            <td>{{ optional($value->clients)->first_name }}
                                                                {{ optional($value->clients)->last_name }}</td>
                                                            <td>{{ $value->payment_mode }}</td>
                                                            <td>{{ optional($value->warehouses)->warehouse_name }}</td>
                                                            <td>{{ optional($value->couriers)->courier_display_name }}
                                                            </td>
                                                            {{-- <td>
                                                                @forelse ($bookingauditByBookingId[$value->id] ?? [] as $audit)
                                                                    @php
                                                                        $response = $audit->response;
                                                                        $decodedResponse = json_decode($response, true);
                                                                        if ($decodedResponse !== null && json_last_error() === JSON_ERROR_NONE) {
                                                                            foreach ($decodedResponse as $json) {
                                                                                echo '<span class="badge bg-label-danger">' . $json . '</span> <br>';
                                                                            }
                                                                        } else {
                                                                            // Handle the case where the response is not valid JSON
                                                                            echo 'Issue Resolved';
                                                                        }
                                                                    @endphp
                                                                @empty
                                                                    No Data Found
                                                                @endforelse
                                                            </td> --}}

                                                            <td>
                                                                @php
                                                                    $foundData = false;
                                                                @endphp
                                                                @foreach ($bookingauditByBookingId[$value->id] ?? [] as $audit)
                                                                    @php
                                                                        $response = $audit->response;
                                                                        $decodedResponse = json_decode($response, true);

                                                                        if (
                                                                            $decodedResponse !== null &&
                                                                            json_last_error() === JSON_ERROR_NONE
                                                                        ) {
                                                                            $foundData = true;
                                                                            foreach ($decodedResponse as $json) {
                                                                                echo '<span class="badge bg-label-danger">' .
                                                                                    $json .
                                                                                    '</span> <br>';
                                                                            }
                                                                        }
                                                                    @endphp
                                                                @endforeach

                                                                @if (!$foundData)
                                                                    No Data Found
                                                                @endif
                                                            </td>
                                                        </tr>
                                                    @empty
                                                        <tr class="text-center">
                                                            <td colspan="10">No Data Found</td>
                                                        </tr>
                                                    @endforelse

                                                </tbody>

                                            </table>
                                        </div>
                                        <div class="row mx-2 pt-4">

                                            <div class="col-sm-12 col-md-12">
                                                <div class="dataTables_paginate paging_simple_numbers"
                                                    id="DataTables_Table_0_paginate">
                                                    <ul class="pagination">
                                                        {{ $bookings->links() }}
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- end --}}
                                </div>
                                <div class="tab-pane fade" id="pills-contact" role="tabpanel"
                                    aria-labelledby="pills-contact-tab">...</div>
                            </div>
                        </div>



                        <!-- delete modal -->
                        <div class="modal modal-top fade" id="deleteModal" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog" role="document" style="width: 387px">
                                <div class="modal-content">
                                    <div class="modal-body">

                                        <h5 class="text-center" style="margin-top: 16px;">Are You Want to Delete This
                                            Record ?</h5>
                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal"
                                            style="    margin-left: 106px;">No</button>
                                        <button type="button" onclick="data_delete()" class="btn btn-success"
                                            data-bs-dismiss="modal">Yes</button>
                                    </div>
                                </div>
                            </div>
                        </div>



                        <!-- Assign Courier Modal -->
                        <div class="modal fade" id="modalCenter" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalCenterTitle">Assign Courier <span
                                                id="selectedCount">0</span> Bookings selected</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col mb-3">
                                                <select name="courier_id" id="courierNameInput" class="form-control">

                                                    <option selected disabled>Select Courier Service</option>

                                                    @foreach ($couriers as $courier)
                                                        <option value="{{ $courier->id }}">
                                                            {{ $courier->courier_display_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-label-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="submit" id="modalSubmitButton" class="btn btn-primary">Save
                                            changes</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- Filter Model --}}
                        <div class="modal fade" id="exLargeModal" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-xl" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel4">Filters</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col mb-3">
                                                <label for="nameExLarge" class="form-label">Name</label>
                                                <input type="text" id="nameExLarge" class="form-control"
                                                    placeholder="Enter Name">
                                            </div>
                                        </div>
                                        <div class="row g-2">
                                            <div class="col mb-0">
                                                <label for="emailExLarge" class="form-label">Email</label>
                                                <input type="email" id="emailExLarge" class="form-control"
                                                    placeholder="xxxx@xxx.xx">
                                            </div>
                                            <div class="col mb-0">
                                                <label for="dobExLarge" class="form-label">DOB</label>
                                                <input type="date" id="dobExLarge" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-label-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary">Save changes</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- allocation prioritywiese --}}
                        <div class="modal fade" id="modalCenter3" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalCenterTitle">Find Courier Allocations Client
                                            Wiese</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col mb-3">

                                                {{-- <select name="courier_id" id="courierNameInput3"
                                                    class="form-control">
                                                    <option selected disabled>Select Client</option>
                                                    @foreach ($clients as $courier)
                                                        <option value="{{ $courier->id }}">
                                                            {{ $courier->first_name }} {{ $courier->last_name }}
                                                        </option>
                                                    @endforeach
                                                </select> --}}

                                            </div>
                                        </div>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-label-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="submit" id="modalSubmitButton3" class="btn btn-primary">Save
                                            changes</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- end --}}

                        <script>
                            document.addEventListener('DOMContentLoaded', function() {
                                function updateSelectedCount() {
                                    var selectedCheckboxes = document.querySelectorAll('.item-checkbox:checked');
                                    var selectedCount = selectedCheckboxes.length;
                                    document.getElementById('selectedCount').innerText = selectedCount;
                                }

                                var checkboxes = document.querySelectorAll('.item-checkbox');
                                checkboxes.forEach(function(checkbox) {
                                    checkbox.addEventListener('change', updateSelectedCount);
                                });

                                document.getElementById('changeStatusButton').addEventListener('click', function() {
                                    updateSelectedCount();
                                    var selectedCheckboxes = document.querySelectorAll('.item-checkbox:checked');
                                    var selectedIds = Array.from(selectedCheckboxes).map(function(checkbox) {
                                        return checkbox.value;
                                    });

                                    if (selectedIds.length > 0) {
                                        var myModal = new bootstrap.Modal(document.getElementById('modalCenter'));
                                        myModal.show();
                                    }
                                });

                                document.getElementById('changeStatusButton2').addEventListener('click', function() {
                                    updateSelectedCount();
                                    var selectedCheckboxes = document.querySelectorAll('.item-checkbox:checked');
                                    var selectedIds = Array.from(selectedCheckboxes).map(function(checkbox) {
                                        return checkbox.value;
                                    });

                                    if (selectedIds.length > 0) {
                                        var myModal = new bootstrap.Modal(document.getElementById('modalCenter3'));
                                        myModal.show();
                                    }
                                });


                                document.getElementById('selectAllCheckbox').addEventListener('change', function() {
                                    var checkboxes = document.querySelectorAll('.item-checkbox');
                                    checkboxes.forEach(function(checkbox) {
                                        checkbox.checked = document.getElementById('selectAllCheckbox').checked;
                                    });
                                    updateSelectedCount();
                                });

                                // Handle submit button For courier allocation
                                document.getElementById('modalSubmitButton3').addEventListener('click', function() {
                                    // var selectedStatus = document.getElementById('statusDropdown').value;
                                    var selectedCheckboxes = document.querySelectorAll('.item-checkbox:checked');
                                    var selectedIds = Array.from(selectedCheckboxes).map(function(checkbox) {
                                        return checkbox.value;
                                    });

                                    if (selectedIds.length > 0) {
                                        var url = '{{ url('find-couriers-allocations') }}';
                                        $("#overlay").fadeIn(300);
                                        fetch(url, {
                                                method: 'POST',
                                                headers: {
                                                    'Content-Type': 'application/json',
                                                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                                },
                                                body: JSON.stringify({
                                                    ids: selectedIds,
                                                }),
                                            })
                                            .then(response => {
                                                if (response.ok) {
                                                    const contentType = response.headers.get('content-type');
                                                    if (contentType && contentType.includes('application/json')) {
                                                        return response.json();
                                                    } else {
                                                        // Handle file download
                                                        response.blob().then(blob => {
                                                            const url = window.URL.createObjectURL(blob);
                                                            const a = document.createElement('a');
                                                            a.href = url;
                                                            a.download =
                                                                'errors.xlsx'; // Adjust filename as needed
                                                            document.body.appendChild(a); // Append anchor to body
                                                            a.click(); // Click anchor to trigger download
                                                            a.remove(); // Remove anchor from body
                                                            $('#modalCenter3').modal('hide');
                                                            Swal.fire({
                                                                title: "success",
                                                                text: "Bookings Request Sent",
                                                                imageUrl: "{{ url('images/success.gif') }}",
                                                                imageWidth: 400,
                                                                imageHeight: 240,
                                                                imageAlt: "Custom image",
                                                            });
                                                        });

                                                    }
                                                } else {
                                                    return response.json();
                                                }
                                            })
                                            .then(data => {
                                                // Check if data is defined and has a 'status' property
                                                if (data && data.status) {
                                                    if (data.status === 'success') {
                                                        setTimeout(function() {
                                                            $("#overlay").fadeOut(300);
                                                            // window.location.href = '{{ url('all-booking') }}';
                                                        }, 500);

                                                        $('#modalCenter3').modal('hide');
                                                        Swal.fire({
                                                            title: data.status,
                                                            text: data.message,
                                                            imageUrl: "{{ url('images/success.gif') }}",
                                                            imageWidth: 400,
                                                            imageHeight: 240,
                                                            imageAlt: "Custom image",
                                                        });
                                                    } else {
                                                        setTimeout(function() {
                                                            $("#overlay").fadeOut(300);
                                                            // window.location.href = '{{ url('all-booking') }}';
                                                        }, 500);
                                                        $('#modalCenter3').modal('hide');
                                                        Swal.fire({
                                                            title: 'Error!',
                                                            text: data.message,
                                                            icon: 'error',
                                                            confirmButtonText: 'Close'
                                                        });
                                                    }
                                                } else {
                                                    throw new Error('Response data is invalid.');
                                                }
                                            })
                                            .catch(error => {
                                                setTimeout(function() {
                                                    $("#overlay").fadeOut(300);
                                                    // window.location.href = '{{ url('all-booking') }}';
                                                }, 500);
                                                $('#modalCenter3').modal('hide');
                                                Swal.fire({
                                                    title: 'Error!',
                                                    text: error.message,
                                                    icon: 'error',
                                                    confirmButtonText: 'Close'
                                                });
                                            });


                                    }
                                });


                                // Handle submit button click inside the modal
                                document.getElementById('modalSubmitButton').addEventListener('click', function() {
                                    // var selectedStatus = document.getElementById('statusDropdown').value;
                                    var selectedCheckboxes = document.querySelectorAll('.item-checkbox:checked');
                                    var selectedIds = Array.from(selectedCheckboxes).map(function(checkbox) {
                                        return checkbox.value;
                                    });

                                    // selected data from form in modal
                                    var modalFormData = document.getElementById('courierNameInput').value;
                                    if (selectedIds.length > 0) {
                                        var url = '{{ route('assign-couriers-b2c') }}';

                                        fetch(url, {
                                                method: 'POST',
                                                headers: {
                                                    'Content-Type': 'application/json',
                                                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                                },
                                                body: JSON.stringify({
                                                    ids: selectedIds,
                                                    modalFormData: modalFormData
                                                }),
                                            })
                                            .then(response => {
                                                if (response.ok)
                                                { // Check if response is okay (status code 200-299)
                                                    const contentType = response.headers.get('content-type');
                                                    if (contentType && contentType.includes('application/json')) {
                                                        // If content type is JSON, parse JSON response
                                                        return response.json();
                                                    } else {
                                                        // Handle file download
                                                        response.blob().then(blob => {
                                                            const url = window.URL.createObjectURL(blob);
                                                            const a = document.createElement('a');
                                                            a.href = url;
                                                            a.download = 'filename.xlsx'; // Specify the filename
                                                            document.body.appendChild(a);
                                                            a.click(); // Trigger download
                                                            a.remove(); // Clean up
                                                        });
                                                    }
                                                } else {
                                                    // If response is not okay, assume it's JSON and parse it and this code is temparearly
                                                    // return response.json();
                                                    response.blob().then(blob => {
                                                            const url = window.URL.createObjectURL(blob);
                                                            const a = document.createElement('a');
                                                            a.href = url;
                                                            a.download = 'filename.xlsx'; // Specify the filename
                                                            document.body.appendChild(a);
                                                            a.click(); // Trigger download
                                                            a.remove(); // Clean up
                                                        });
                                                }
                                            })

                                            // .then(response => response.json())
                                            .then(data => {
                                                // Check if data is defined and has a 'status' property
                                                if (data && data.status) {
                                                    if (data.status === 'success') {
                                                        $('#modalCenter').modal('hide');
                                                        Swal.fire({
                                                            title: data.status,
                                                            text: data.message,
                                                            imageUrl: "{{ url('images/success.gif') }}",
                                                            imageWidth: 400,
                                                            imageHeight: 240,
                                                            imageAlt: "Custom image",
                                                        });
                                                    } else {
                                                        $('#modalCenter').modal('hide');
                                                        Swal.fire({
                                                            title: 'Error!',
                                                            text: data.message,
                                                            icon: 'error',
                                                            confirmButtonText: 'Close'
                                                        });
                                                    }
                                                } else {
                                                    throw new Error('Response data is invalid.');
                                                }
                                            })
                                            .catch(error => {
                                                $('#modalCenter').modal('hide');
                                                Swal.fire({
                                                    title: 'Error!',
                                                    text: error.message,
                                                    icon: 'error',
                                                    confirmButtonText: 'Close'
                                                });
                                            });


                                    }
                                });

                                // Handle delete button click inside the delete modal
                                document.getElementById('deleteModalSubmitButton').addEventListener('click', function() {
                                    var selectedCheckboxes = document.querySelectorAll('.item-checkbox:checked');
                                    var selectedIds = Array.from(selectedCheckboxes).map(function(checkbox) {
                                        return checkbox.value;
                                    });

                                    if (selectedIds.length > 0) {
                                        var deleteUrl =
                                            '{{ route('delete-forword-booking') }}'; // Replace with your actual delete route

                                        fetch(deleteUrl, {
                                                method: 'DELETE',
                                                headers: {
                                                    'Content-Type': 'application/json',
                                                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                                },
                                                body: JSON.stringify({
                                                    ids: selectedIds,
                                                }),
                                            })
                                            .then(response => response.json())
                                            .then(data => {
                                                if (data.status === 'success') {
                                                    $('#deleteModal').modal('hide');
                                                    Swal.fire({
                                                        title: data.status,
                                                        text: data.message,
                                                        imageUrl: "{{ url('images/success.gif') }}",
                                                        imageWidth: 400,
                                                        imageHeight: 240,
                                                        imageAlt: "Custom image",
                                                        didClose: () => {
                                                            window.location.href = 'forword-Booking-B2C';
                                                        }
                                                    });
                                                } else {
                                                    $('#deleteModal').modal('hide');
                                                    Swal.fire({
                                                        title: 'Error!',
                                                        text: data.message,
                                                        icon: 'error',
                                                        confirmButtonText: 'Close',
                                                        didClose: () => {
                                                            window.location.href = 'forword-Booking-B2C';
                                                        }
                                                    });
                                                }
                                            })
                                            .catch(error => {
                                                $('#deleteModal').modal('hide');
                                                Swal.fire({
                                                    title: 'Error!',
                                                    text: error.message, // Use the actual error message
                                                    icon: 'error',
                                                    confirmButtonText: 'Close'
                                                });
                                            });
                                    }
                                });
                            });
                        </script>

                        <script>
                            document.addEventListener('DOMContentLoaded', function() {
                                document.getElementById('updated_sheet').addEventListener('submit', function(e) {
                                    e.preventDefault();

                                    var csrfToken = document.head.querySelector('meta[name="csrf-token"]').content;
                                    var formData = new FormData(this);

                                    fetch("{{ url('update-booking-excel') }}", {
                                            method: "POST",
                                            body: formData,
                                            headers: {
                                                'X-CSRF-TOKEN': csrfToken,
                                            },
                                        })
                                        .then(response => response.json())
                                        .then(data => {
                                            if (data.status === 'success') {

                                                toastr.options = {
                                                    "closeButton": true,
                                                    "progressBar": true,
                                                    "timeOut": 15000
                                                };
                                                toastr.success(data.message);
                                                setTimeout(function() {

                                                    // window.location.href = '{{ url('City') }}';
                                                }, 2000);
                                            } else {
                                                toastr.options = {
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
                        <div class="modal fade" id="exampleModal007" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        {{-- <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                      <button type="button" class="close" data-dismiss="modal"
                                          aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                      </button> --}}
                                    </div>
                                    <div class="modal-body">
                                        <H4>By Clicking on <a id="download" href="#" download></a> Your
                                            download will initiate</H4>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" onclick="closeing()" class="btn btn-secondary"
                                            data-dismiss="modal">Close</button>
                                        <!-- Add any other buttons here if needed -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- assign and download Labels --}}
                        <script>
                            document.addEventListener('DOMContentLoaded', function() {
                                // Function to update selected count
                                function updateSelectedCount() {
                                    var selectedCheckboxes = document.querySelectorAll('.item-checkboxs:checked');
                                    var selectedCount = selectedCheckboxes.length;
                                    document.getElementById('selectedCount').innerText = selectedCount;

                                }

                                // Add event listeners to checkboxes
                                var checkboxes = document.querySelectorAll('.item-checkboxs');
                                checkboxes.forEach(function(checkbox) {
                                    checkbox.addEventListener('change', updateSelectedCount);
                                });

                                // Add event listener to select all checkbox
                                document.getElementById('selectAllCheckboxs').addEventListener('change', function() {
                                    var checkboxes = document.querySelectorAll('.item-checkboxs');
                                    checkboxes.forEach(function(checkbox) {
                                        checkbox.checked = document.getElementById('selectAllCheckboxs').checked;
                                    });
                                    updateSelectedCount();
                                });

                                // Handle assign label click event
                                document.getElementById('assign_labels').addEventListener('click', function() {
                                    var selectedCheckboxes = document.querySelectorAll('.item-checkboxs:checked');
                                    var selectedIds = Array.from(selectedCheckboxes).map(function(checkbox) {
                                        return checkbox.value;
                                    });
                                    if (selectedIds.length > 0) {
                                        var url = '{{ url('assign-labels-b2c') }}';
                                        $("#overlay").fadeIn(300);
                                        fetch(url, {
                                                method: 'POST',
                                                headers: {
                                                    'Content-Type': 'application/json',
                                                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                                },
                                                body: JSON.stringify({
                                                    ids: selectedIds,
                                                    download_type: 'zip' // Add a parameter to indicate download type
                                                }),
                                            })

                                            .then(response => {
                                                if (!response.ok) {
                                                    throw new Error('Network response was not ok');
                                                }
                                                return response.json();
                                            })
                                            .then(data => {
                                                console.log(data);
                                                $('#exampleModal007').modal('show');

                                                var downloadLink = $('<a>', {
                                                    id: 'download',
                                                    href: data.zipFile,
                                                    text: 'Download'
                                                });

                                                // Append the link to an existing element in your HTML
                                                $('#download').append(downloadLink);
                                            })
                                            .catch(error => {
                                                // Handle errors
                                                $("#overlay").fadeOut(300);
                                                $('#modalCenter3').modal('hide');
                                                Swal.fire({
                                                    title: 'Error!',
                                                    text: error.message,
                                                    icon: 'error',
                                                    confirmButtonText: 'Close'
                                                });
                                            });

                                    }
                                });
                            });
                        </script>
                        {{-- end --}}


                        {{-- download-invoice --}}
                        <script>
                            function closeing() {

                                $('#exampleModal007').modal('hide');
                            }
                            document.addEventListener('DOMContentLoaded', function() {
                                // Function to update selected count
                                function updateSelectedCount() {
                                    var selectedCheckboxes = document.querySelectorAll('.item-checkboxs:checked');
                                    var selectedCount = selectedCheckboxes.length;
                                    document.getElementById('selectedCount').innerText = selectedCount;
                                }

                                // Add event listeners to checkboxes
                                var checkboxes = document.querySelectorAll('.item-checkboxs');
                                checkboxes.forEach(function(checkbox) {
                                    checkbox.addEventListener('change', updateSelectedCount);
                                });

                                // Add event listener to select all checkbox
                                document.getElementById('selectAllCheckboxs').addEventListener('change', function() {
                                    var checkboxes = document.querySelectorAll('.item-checkboxs');
                                    checkboxes.forEach(function(checkbox) {
                                        checkbox.checked = document.getElementById('selectAllCheckboxs').checked;
                                    });
                                    updateSelectedCount();
                                });

                                // Handle assign label click event
                                document.getElementById('download_invoice').addEventListener('click', function() {
                                    var selectedCheckboxes = document.querySelectorAll('.item-checkboxs:checked');
                                    var selectedIds = Array.from(selectedCheckboxes).map(function(checkbox) {
                                        return checkbox.value;
                                    });

                                    if (selectedIds.length > 0) {
                                        var url = '{{ url('download_invoice') }}';
                                        $("#overlay").fadeIn(300);
                                        fetch(url, {
                                                method: 'POST',
                                                headers: {
                                                    'Content-Type': 'application/json',
                                                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                                },
                                                body: JSON.stringify({
                                                    ids: selectedIds,
                                                    download_type: 'zip' // Add a parameter to indicate download type
                                                }),
                                            })
                                            .then(response => {
                                                if (!response.ok) {
                                                    throw new Error('Network response was not ok');
                                                }
                                                return response.json();
                                            })
                                            .then(data => {
                                                console.log(data.zipFileUrl);

                                                $('#exampleModal007').modal('show');
                                                // Update the content of the modal
                                                // $('#download').html(data.zipFileUrl);
                                                var downloadLink = $('<a>', {
                                                    id: 'download',
                                                    href: data.zipFileUrl,
                                                    text: 'Download'
                                                });

                                                // Append the link to an existing element in your HTML
                                                $('#download').append(downloadLink);

                                            })
                                            // .then(response => {
                                            //     if (!response.ok) {
                                            //         throw new Error('Network response was not ok');
                                            //     }
                                            //     return response.json();
                                            // })
                                            // .then(data => {
                                            //     const pdfFiles = data.pdfFiles;
                                            //     pdfFiles.forEach(pdfFileUrl => {
                                            //         const a = document.createElement('a');
                                            //         a.href = pdfFileUrl;
                                            //         a.target = '_blank';
                                            //         a.download = pdfFileUrl.split('/').pop();
                                            //         document.body.appendChild(a);
                                            //         a.click();
                                            //         document.body.removeChild(a);
                                            //     });

                                            //     // Hide overlay after downloading
                                            //     $("#overlay").fadeOut(300);
                                            // })
                                            .catch(error => {
                                                // Handle errors
                                                $("#overlay").fadeOut(300);
                                                $('#modalCenter3').modal('hide');
                                                Swal.fire({
                                                    title: 'Error!',
                                                    text: error.message,
                                                    icon: 'error',
                                                    confirmButtonText: 'Close'
                                                });
                                            });

                                    }
                                });
                            });
                        </script>
                        {{-- end --}}
                        {{-- Schedule pickup --}}
                        <script>
                            document.addEventListener('DOMContentLoaded', function() {
                                // Function to update selected count
                                function updateSelectedCount() {
                                    var selectedCheckboxes = document.querySelectorAll('.item-checkboxs:checked');
                                    var selectedCount = selectedCheckboxes.length;
                                    document.getElementById('selectedCount').innerText = selectedCount;
                                }

                                // Add event listeners to checkboxes
                                var checkboxes = document.querySelectorAll('.item-checkboxs');
                                checkboxes.forEach(function(checkbox) {
                                    checkbox.addEventListener('change', updateSelectedCount);
                                });

                                // Add event listener to select all checkbox
                                document.getElementById('selectAllCheckboxs').addEventListener('change', function() {
                                    var checkboxes = document.querySelectorAll('.item-checkboxs');
                                    checkboxes.forEach(function(checkbox) {
                                        checkbox.checked = document.getElementById('selectAllCheckboxs').checked;
                                    });
                                    updateSelectedCount();
                                });

                                // Handle assign label click event
                                document.getElementById('Scheduled_Pickup').addEventListener('click', function() {
                                    var selectedCheckboxes = document.querySelectorAll('.item-checkboxs:checked');
                                    var selectedIds = Array.from(selectedCheckboxes).map(function(checkbox) {
                                        return checkbox.value;
                                    });

                                    if (selectedIds.length > 0) {
                                        var url = '{{ url('scheduled-pickup-b2c') }}';
                                        $("#overlay").fadeIn(300);
                                        fetch(url, {
                                                method: 'POST',
                                                headers: {
                                                    'Content-Type': 'application/json',
                                                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                                },
                                                body: JSON.stringify({
                                                    ids: selectedIds,
                                                    download_type: 'zip' // Add a parameter to indicate download type
                                                }),
                                            })
                                            .then(response => {
                                                return response.json();

                                            })
                                            // .then(data => {
                                            //     const zipFileUrl = data.zipFileUrl;
                                            //     if (zipFileUrl) {
                                            //         // Create temporary anchor element
                                            //         const a = document.createElement('a');
                                            //         a.href = zipFileUrl;
                                            //         a.target = '_blank'; // Open in a new tab
                                            //         a.download = 'pdf_files.zip'; // Set desired file name

                                            //         // Append anchor to body and trigger click event
                                            //         document.body.appendChild(a);
                                            //         a.click();

                                            //         // Remove anchor from body
                                            //         document.body.removeChild(a);
                                            //     } else {
                                            //         // Handle case where zip file URL is not provided in the response
                                            //         throw new Error('Zip file URL is missing in the response');
                                            //     }
                                            // })
                                            // .then(response => {
                                            //     if (!response.ok) {
                                            //         throw new Error('Network response was not ok');
                                            //     }
                                            //     return response.json();
                                            // })
                                            // .then(data => {
                                            //     const pdfFiles = data.pdfFiles;
                                            //     pdfFiles.forEach(pdfFileUrl => {
                                            //         const a = document.createElement('a');
                                            //         a.href = pdfFileUrl;
                                            //         a.target = '_blank';
                                            //         a.download = pdfFileUrl.split('/').pop();
                                            //         document.body.appendChild(a);
                                            //         a.click();
                                            //         document.body.removeChild(a);
                                            //     });

                                            //     // Hide overlay after downloading
                                            //     $("#overlay").fadeOut(300);
                                            // })
                                            .catch(error => {
                                                // Handle errors
                                                $("#overlay").fadeOut(300);
                                                $('#modalCenter3').modal('hide');
                                                Swal.fire({
                                                    title: 'Error!',
                                                    text: error.message,
                                                    icon: 'error',
                                                    confirmButtonText: 'Close'
                                                });
                                            });

                                    }
                                });
                            });
                        </script>

                        {{-- Cancel Booking --}}
                        <script>
                            document.addEventListener('DOMContentLoaded', function() {
                                // Function to update selected count
                                function updateSelectedCount() {
                                    var selectedCheckboxes = document.querySelectorAll('.item-checkboxs:checked');
                                    var selectedCount = selectedCheckboxes.length;
                                    document.getElementById('selectedCount').innerText = selectedCount;

                                }

                                // Add event listeners to checkboxes
                                var checkboxes = document.querySelectorAll('.item-checkboxs');
                                checkboxes.forEach(function(checkbox) {
                                    checkbox.addEventListener('change', updateSelectedCount);
                                });

                                // Add event listener to select all checkbox
                                document.getElementById('selectAllCheckboxs').addEventListener('change', function() {
                                    var checkboxes = document.querySelectorAll('.item-checkboxs');
                                    checkboxes.forEach(function(checkbox) {
                                        checkbox.checked = document.getElementById('selectAllCheckboxs').checked;
                                    });
                                    updateSelectedCount();
                                });

                                // Handle assign label click event
                                document.getElementById('cancel_booking').addEventListener('click', function() {
                                    var selectedCheckboxes = document.querySelectorAll('.item-checkboxs:checked');
                                    var selectedIds = Array.from(selectedCheckboxes).map(function(checkbox) {
                                        return checkbox.value;
                                    });
                                    // alert(selectedIds);
                                    if (selectedIds.length > 0) {
                                        var url = '{{ url('cancel-booking-b2c') }}';
                                        $("#overlay").fadeIn(300);
                                        fetch(url, {
                                                method: 'POST',
                                                headers: {
                                                    'Content-Type': 'application/json',
                                                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                                },
                                                body: JSON.stringify({
                                                    ids: selectedIds,
                                                    download_type: 'zip' // Add a parameter to indicate download type
                                                }),
                                            })

                                            .then(response => {
                                                if (!response.ok) {
                                                    throw new Error('Network response was not ok');
                                                }
                                                return response.json();
                                            })
                                            .then(data => {
                                                Swal.fire({

                                                    title: data.status,
                                                    text: data.message,
                                                    imageUrl: "{{ url('images/success.gif') }}",
                                                    imageWidth: 400,
                                                    imageHeight: 240,
                                                    imageAlt: "Custom image"

                                                }).then((result) => {
                                                    if (result.isConfirmed) {
                                                        window.location.href = 'forword-Booking-B2C';
                                                    }
                                                });
                                            })
                                            .catch(error => {
                                                // Handle errors
                                                $("#overlay").fadeOut(300);
                                                $('#modalCenter3').modal('hide');
                                                Swal.fire({
                                                    title: 'Error!',
                                                    text: error.message,
                                                    icon: 'error',
                                                    confirmButtonText: 'Close'
                                                });
                                            });

                                    }
                                });
                            });
                        </script>
                        {{-- end --}}


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



                        {{-- get client --}}
                        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>


                        <!-- data delete ajax -->
                        <script>
                            function deleteModal(id) {
                                var modal = $('#deleteModal');
                                modal.data('id', id);
                                modal.modal('show');
                            }

                            function data_delete() {
                                var id = $('#deleteModal').data('id');
                                $.ajax({
                                    url: '{{ url('delete-ads') }}',
                                    type: 'post',
                                    data: {
                                        id: id,
                                        _token: '{{ csrf_token() }}'
                                    },
                                    success: function(result) {
                                        toastr.options = {
                                            "closeButton": true,
                                            "progressBar": true,
                                            "timeOut": 15000
                                        };
                                        toastr.success(result);
                                        jQuery('#row' + id).hide('slow');
                                    }
                                });
                            }
                        </script>

                        {{-- Select all script --}}

                        @include('layouts.footer')
