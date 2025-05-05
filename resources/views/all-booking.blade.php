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

    table,
    th,
    td {
        border: 1px solid black;
    }

    th {
        white-space: nowrap;
        font-weight: bold;
        padding: 10px;
    }

    td {
        padding: 5px;
    }

    .weight ul li {
        padding: 1px;
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

                        <h4 class="py-3 mb-2">
                            <span class="text-muted fw-light">Bookings /</span> View Bookings / B2B Bookings
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
                                                    <h4 class="mb-2">{{ $canceled_orders }}</h4>
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
                            <ul class="nav nav-pills   bg-white  p-2" id="pills-tab" role="tablist">
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

                            </ul>
                        </div>



                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                                aria-labelledby="pills-home-tab">
                                <div class="filters-nav">
                                    <ul class="nav nav-pills bg-white p-2" id="pills-tab" role="tablist">

                                        <li><button class="btn btn-sm btn-primary p-2" id="changeStatusButton">
                                                <i class="fa fa-check-square" aria-hidden="true"></i> &nbsp;
                                                Assign
                                                Courier Service
                                            </button>
                                        </li>
                                        <li>
                                            <button type="button" id="toggleButton"
                                                class="btn btn-sm btn-primary p-2">
                                                <i class="fa fa-filter" aria-hidden="true"></i>&nbsp;Filter
                                            </button>
                                        </li>
                                        <li>
                                            <button class="btn btn-sm btn-danger p-2" id="deleteModalSubmitButton"><i
                                                    class="fa fa-trash" aria-hidden="true"></i> &nbsp;
                                                Delete</button>
                                        </li>
                                        <li>
                                            <a href="{{ url('forword-booking-excel') }}"><button
                                                    class="btn btn-sm btn-success p-2"><i class="fa fa-file-excel"
                                                        aria-hidden="true"></i> &nbsp; Download Excel</button>
                                            </a>
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
                                                        <option value="receiver_address_2">Receiver Address 2</option>
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
                                                        <option value="invoice_amount_rs">Invoice Amount Rs</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div>
                                                    <label for="">By Pincode</label>
                                                    <input type="text" class="form-control" name="order_number">
                                                </div>
                                            </div>
                                            <div class="col-md-3 pt-4">
                                                <button type="button" onclick="Datafilter()"
                                                    class="btn  btn-primary">Submit</button>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <!-- Order List Table -->
                                <div class="card p-3">
                                    <div class="row p-3">
                                        <div class="col-md-12 filters-nav">
                                            <ul style="display:flex; list-style:none;">

                                                <li>

                                                    <form action="{{ url()->current() }}" method="get">
                                                        <label for="perPage">Total data Show:</label>
                                                        <select class="form-control" name="perPage" id="perPage"
                                                            onchange="this.form.submit()">
                                                            <option value="10"
                                                                {{ $perPage == 10 ? 'selected' : '' }}>10</option>
                                                            <option value="50"
                                                                {{ $perPage == 50 ? 'selected' : '' }}>50</option>
                                                            <option value="200"
                                                                {{ $perPage == 200 ? 'selected' : '' }}>200</option>
                                                            <option value="all"
                                                                {{ $perPage == 'all' ? 'selected' : '' }}>All</option>
                                                        </select>
                                                    </form>

                                                </li>
                                            </ul>
                                        </div>
                                        <div id="city"></div>
                                        <div class="card-datatable table-responsive">

                                            <table style="width:100%; font-size: 13px;">
                                                <thead class="text-center">
                                                    <tr>
                                                        <th> <input type="checkbox" id="selectAllCheckbox"> </th>
                                                        <th>S.No.</th>
                                                        <th>Status</th>
                                                        <th>Channel.</th>
                                                        <th>Order Details</th>
                                                        <th>AWB No.</th>
                                                        <th colspan="2">Product & Amount</th>
                                                        <th>Amount Details</th>
                                                        <th>Weight Details</th>
                                                        <th>Clients</th>
                                                        <th>warehouse</th>
                                                        <th>Couriers</th>
                                                        <th>Tags</th>
                                                        <th>Pin-Code Status</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="text-center">
                                                    @foreach ($bookings as $value)
                                                        <tr id="row{{ $value->id }}">

                                                            <td><input type="checkbox" class="item-checkbox"
                                                                    value="{{ $value->id }}">
                                                            </td>
                                                            <td >
                                                                {{ $loop->iteration }}
                                                             </td>
                                                             <td>
                                                                @if ($value->disputed_status == 'false')
                                                                    <span class="badge rounded-pill bg-danger">
                                                                        Disputed Booking
                                                                    </span>
                                                                @else
                                                                    @if ($value->status == 'Manifestated')
                                                                        <span class="badge bg-warning">In
                                                                            Manifestation
                                                                        </span>
                                                                    @endif
                                                                @endif

                                                                @if ($value->status == 'Assigned Request')
                                                                    <span class="badge bg-success">Assign Request
                                                                        Sent</span>
                                                                @else
                                                                @endif
                                                            </td>
                                                            <td>
                                                                {{ $value->channel_name }}
                                                            </td>


                                                            <td>
                                                                <ul style="display: flex; list-style: none;">
                                                                    <li style="margin-right: 20px;"><b>Order No.</b>
                                                                        {{ $value->order_no }}</li>
                                                                    <li><b>Mode</b> {{ $value->transport_mode }}</li>

                                                                </ul>

                                                            </td>

                                                            <td>{{ $value->e_way_bill }}</td>
                                                            <td colspan="2">
                                                                <ul style="display: flex; list-style: none;">
                                                                    <li style="margin-right: 20px;"><b>QTY</b> 2 </li>

                                                                </ul>
                                                            </td>
                                                            <td>
                                                                <center>
                                                                    <button
                                                                        class="btn btn-sm btn-primary">{{ $value->payment_mode }}</button>
                                                                    <br> <br>
                                                                    <i class="fa fa-inr" aria-hidden="true"></i>
                                                                    {{ $value->invoice_amount_rs }}
                                                                </center>
                                                            </td>
                                                            <td class="weight">
                                                                <ul style="display:flex; list-style:none;">
                                                                    <li>weight : {{ $value->item_weight_kg }}</li>
                                                                    <li>Dimention :(L)
                                                                        {{ $value->item_length_cm }}X(B){{ $value->item_width_cm }}X(H){{ $value->item_height_cm }}
                                                                    </li>
                                                                </ul>
                                                            </td>
                                                            <td>
                                                                {{ optional($value->clients)->first_name }}
                                                                {{ optional($value->clients)->last_name }}
                                                            </td>
                                                            <td>
                                                                <div class="timeline-header">
                                                                    <span><b>Warehouse Name:</b>
                                                                        {{ optional($value->warehouses)->warehouse_name }}</span>

                                                                </div>
                                                                <p class="mt-2">
                                                                    <span>
                                                                        <b>Details</b><br>{{ optional($value->warehouses)->warehouse_phone }}
                                                                        <br>
                                                                        {{ optional($value->warehouses)->pin_code }}
                                                                        <br> {{ optional($value->warehouses)->state }}
                                                                        <br> {{ optional($value->warehouses)->city }}
                                                                    </span>
                                                                </p>

                                                            </td>
                                                            <td>
                                                                {{ optional($value->couriers)->courier_display_name }}
                                                            </td>

                                                            <td>
                                                                @foreach ($bookingauditByBookingId[$value->id] ?? [] as $audit)
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
                                                                @endforeach

                                                            </td>
                                                            <td>
                                                                @foreach ($pincode_audits->where('booking_id', $value->id) as $pin_audits)
                                                                    @if ($pin_audits->status == '1')
                                                                        <span
                                                                            class="badge rounded-pill bg-primary">Active
                                                                            Pin-code</span>
                                                                    @else
                                                                        <span class="badge rounded-pill bg-danger">Not
                                                                            Serviceable Pin-code</span>
                                                                    @endif
                                                                @endforeach

                                                            </td>

                                                            <td>
                                                                @if ($value->disputed_status == 'false')
                                                                    <a
                                                                        href="{{ url('view-bookings') }}/{{ $value->id }}">
                                                                        <i class="fa fa-refresh"
                                                                            aria-hidden="true"></i> </a>
                                                                @else
                                                                    @if ($value->status == 'Manifestated')
                                                                        <a
                                                                            href="{{ url('view-bookings') }}/{{ $value->id }}">
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


                                    </div>

                                </div>



                                <!-- delete modal -->
                                <div class="modal modal-top fade" id="deleteModal" tabindex="-1"
                                    aria-hidden="true">
                                    <div class="modal-dialog" role="document" style="width: 387px">
                                        <div class="modal-content">
                                            <div class="modal-body">

                                                <h5 class="text-center" style="margin-top: 16px;">Are You Want to
                                                    Delete This
                                                    Record ?</h5>
                                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal"
                                                    style="    margin-left: 106px;">No</button>
                                                <button type="button" onclick="data_delete()"
                                                    class="btn btn-success" data-bs-dismiss="modal">Yes</button>
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
                                                        <select name="courier_id" id="statusDropdown"
                                                            class="form-control">

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
                                                <button type="submit" id="modalSubmitButton"
                                                    class="btn btn-primary">Save
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
                                {{--  --}}
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
                            <div class="tab-pane fade" id="pills-profile" role="tabpanel"
                                aria-labelledby="pills-profile-tab">
                                <div class="filters-nav">
                                    <ul class="nav nav-pills bg-white p-2" id="pills-tab" role="tablist">

                                        <li>
                                            <button type="button" id="toggleButton"
                                                class="btn btn-sm btn-primary p-2">
                                                <i class="fa fa-filter" aria-hidden="true"></i>&nbsp;Filter
                                            </button>
                                        </li>

                                        <li>
                                            <a href="{{ url('forword-booking-excel') }}"><button
                                                    class="btn btn-sm btn-success p-2"><i class="fa fa-file-excel"
                                                        aria-hidden="true"></i> &nbsp; Download Excel</button>
                                            </a>
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
                                                        <option value="receiver_address_2">Receiver Address 2</option>
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
                                                        <option value="invoice_amount_rs">Invoice Amount Rs</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div>
                                                    <label for="">By Pincode</label>
                                                    <input type="text" class="form-control" name="order_number">
                                                </div>
                                            </div>
                                            <div class="col-md-3 pt-4">
                                                <button type="button" onclick="Datafilter()"
                                                    class="btn  btn-primary">Submit</button>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <!-- Order List Table -->
                                <div class=" p-3">
                                    <div class="row p-3">
                                        <div class="col-md-12 filters-nav">
                                            <ul style="display:flex; list-style:none;">

                                                <li>
                                                    <form action="{{ url()->current() }}" method="get">
                                                        <label for="perPage">Total data Show:</label>
                                                        <select class="form-control" name="perPage" id="perPage"
                                                            onchange="this.form.submit()">
                                                            <option value="10"
                                                                {{ $perPage == 10 ? 'selected' : '' }}>10</option>
                                                            <option value="50"
                                                                {{ $perPage == 50 ? 'selected' : '' }}>50</option>
                                                            <option value="200"
                                                                {{ $perPage == 200 ? 'selected' : '' }}>200</option>
                                                            <option value="all"
                                                                {{ $perPage == 'all' ? 'selected' : '' }}>All</option>
                                                        </select>
                                                    </form>
                                                </li>
                                                <li class="pt-4">
                                                    <button id="performActionButton"
                                                        class="btn btn-sm btn-primary">Assign Labels</button>
                                                </li>
                                                <li class="pt-4">
                                                    <button class="btn btn-sm btn-primary">Download Invoice</button>
                                                </li>
                                                <li class="pt-4">
                                                    <button class="btn btn-sm btn-primary">Schdeule Pickup</button>
                                                </li>
                                            </ul>
                                        </div>
                                        <div id="city"></div>
                                        <div class="card-datatable table-responsive">

                                            <table class="table" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th> <input type="checkbox" id="selectAllCheckbox2"> </th>
                                                        </th>
                                                        <th>Ready For Pickup</th>
                                                        <th>Order Number</th>
                                                        <th>Order Type</th>
                                                        <th>Product</th>
                                                        <th>Clients</th>
                                                        <th>warehouse</th>
                                                        <th>Couriers</th>

                                                        <th>Pin-Code Status</th>
                                                        <th>Status</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    @foreach ($ready_topickup as $value)
                                                        <tr id="row{{ $value->id }}">
                                                            <td><input type="checkbox" class="item-checkbox2"
                                                                    value="{{ $value->id }}"></td>
                                                            <td>{{ $loop->iteration }} </td>
                                                            <td> {{ $value->order_no }} </td>

                                                            <td>{{ $value->transport_mode }}</td>
                                                            <td>

                                                            </td>
                                                            <td>
                                                                {{ optional($value->clients)->first_name }}
                                                                {{ optional($value->clients)->last_name }}
                                                            </td>
                                                            <td>{{ optional($value->warehouses)->warehouse_name }}</td>
                                                            <td>{{ optional($value->couriers)->courier_display_name }}
                                                            </td>

                                                            <td>
                                                                @foreach ($bookingauditByBookingId[$value->id] ?? [] as $audit)
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
                                                                @endforeach

                                                            </td>
                                                            <td>
                                                                @foreach ($pincode_audits->where('booking_id', $value->id) as $pin_audits)
                                                                    @if ($pin_audits->status == '1')
                                                                        <span
                                                                            class="badge rounded-pill bg-primary">Active
                                                                            Pin-code</span>
                                                                    @else
                                                                        <span class="badge rounded-pill bg-danger">Not
                                                                            Serviceable Pin-code</span>
                                                                    @endif
                                                                @endforeach

                                                            </td>
                                                            <td>
                                                                @if ($value->disputed_status == 'false')
                                                                    <span class="badge rounded-pill bg-danger">
                                                                        Disputed Booking
                                                                    </span>
                                                                @else
                                                                    @if ($value->status == 'Manifestated')
                                                                        <span class="badge bg-warning">In
                                                                            Manifestation</span>
                                                                    @endif
                                                                @endif

                                                                @if ($value->status == 'Assigned Request')
                                                                    <span class="badge bg-success">Assign Request
                                                                        Sent</span>
                                                                @else
                                                                @endif
                                                                {{-- @if ($value->status == 'Assigned Request')
                                                                    <span class="badge bg-success">Assign Request
                                                                        Sent</span>
                                                                @else
                                                                @endif --}}
                                                            </td>
                                                            <td>
                                                                @if ($value->disputed_status == 'false')
                                                                    <a
                                                                        href="{{ url('view-bookings') }}/{{ $value->id }}">
                                                                        <i class="fa fa-refresh"
                                                                            aria-hidden="true"></i> </a>
                                                                @else
                                                                    @if ($value->status == 'Manifestated')
                                                                        <a
                                                                            href="{{ url('view-bookings') }}/{{ $value->id }}">
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


                                    </div>

                                </div>

                                <!-- delete modal -->
                                <div class="modal modal-top fade" id="deleteModal" tabindex="-1"
                                    aria-hidden="true">
                                    <div class="modal-dialog" role="document" style="width: 387px">
                                        <div class="modal-content">
                                            <div class="modal-body">

                                                <h5 class="text-center" style="margin-top: 16px;">Are You Want to
                                                    Delete This
                                                    Record ?</h5>
                                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal"
                                                    style="    margin-left: 106px;">No</button>
                                                <button type="button" onclick="data_delete()"
                                                    class="btn btn-success" data-bs-dismiss="modal">Yes</button>
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
                                                        <select name="courier_id" id="statusDropdown"
                                                            class="form-control">

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
                                                <button type="submit" id="modalSubmitButton"
                                                    class="btn btn-primary">Save
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
                                <div class="row mx-2 pt-4">

                                    <div class="col-sm-12 col-md-12">
                                        <div class="dataTables_paginate paging_simple_numbers"
                                            id="DataTables_Table_0_paginate">
                                            <ul class="pagination">
                                                {{ $ready_topickup->links() }}
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                {{--  --}}
                            </div>
                            <div class="tab-pane fade" id="pills-contact" role="tabpanel"
                                aria-labelledby="pills-contact-tab">
                                ...
                            </div>
                            <div class="tab-pane fade" id="Out-For-Delivery" role="tabpanel"
                                aria-labelledby="pills-contact-tab">
                                Out For Delivery
                            </div>
                            <div class="tab-pane fade" id="Delivered" role="tabpanel"
                                aria-labelledby="pills-contact-tab">
                                Delivered
                            </div>
                            <div class="tab-pane fade" id="RTO" role="tabpanel"
                                aria-labelledby="pills-contact-tab">
                                RTO
                            </div>
                        </div>

                        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                        <script>
                            $(document).ready(function() {
                                $("#toggleButton").click(function() {
                                    $("#successDiv").fadeToggle(500)();
                                });
                            });
                            // Runing Filter
                            function Datafilter() {
                                var from = $('#disputed').val();

                                alert(from);
                            }
                        </script>


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

                                document.getElementById('selectAllCheckbox').addEventListener('change', function() {
                                    var checkboxes = document.querySelectorAll('.item-checkbox');
                                    checkboxes.forEach(function(checkbox) {
                                        checkbox.checked = document.getElementById('selectAllCheckbox').checked;
                                    });
                                    updateSelectedCount();
                                });


                                // Handle submit button click inside the modal
                                document.getElementById('modalSubmitButton').addEventListener('click', function() {
                                    var selectedStatus = document.getElementById('statusDropdown').value;
                                    var selectedCheckboxes = document.querySelectorAll('.item-checkbox:checked');
                                    var selectedIds = Array.from(selectedCheckboxes).map(function(checkbox) {
                                        return checkbox.value;
                                    });

                                    // selected data from form in modal
                                    var modalFormData = document.getElementById('statusDropdown').value;

                                    if (selectedIds.length > 0) {
                                        var url = '{{ route('assign-couriers') }}';

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
                                            .then(response => response.json())
                                            .then(data => {
                                                if (data.status === 'success') {
                                                    $('#modalCenter').modal('hide');
                                                    Swal.fire({
                                                        title: data.status,
                                                        text: data.message,
                                                        imageUrl: "{{ url('images/success.gif') }}",
                                                        imageWidth: 400,
                                                        imageHeight: 240,
                                                        imageAlt: "Custom image",
                                                        // didClose: () => {
                                                        //     window.location.href = 'all-reverse-booking';
                                                        // }
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
                                            })
                                            .catch(error => {
                                                $('#modalCenter').modal('hide');
                                                Swal.fire({
                                                    title: 'Error!',
                                                    text: error.message,
                                                    icon: 'error',
                                                    confirmButtonText: 'Close'
                                                });
                                            })
                                            .finally(() => {
                                                myModal.hide();
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
                                                            window.location.href = 'all-booking';
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
                                                            window.location.href = 'all-reverse-booking';
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

                        {{-- for pickup --}}
                        <script>
                            $(document).ready(function() {
                                // Function to update selected count
                                function updateSelectedCount() {
                                    var selectedCheckboxes = document.querySelectorAll('.item-checkbox2:checked');
                                    var selectedCount = selectedCheckboxes.length;
                                    document.getElementById('selectedCount').innerText = selectedCount;
                                }

                                // Add event listener for change event on checkboxes
                                var checkboxes = document.querySelectorAll('.item-checkbox2');
                                checkboxes.forEach(function(checkbox) {
                                    checkbox.addEventListener('change', updateSelectedCount);
                                });

                                // Add event listener for click event on button
                                document.getElementById('performActionButton').addEventListener('click', function() {
                                    // Perform action here
                                    var selectedCheckboxes = document.querySelectorAll('.item-checkbox2:checked');
                                    var selectedIds = Array.from(selectedCheckboxes).map(function(checkbox) {
                                        return checkbox.value;
                                    });
                                    alert(selectedIds);

                                    // For demonstration, just log the selected IDs
                                    console.log("Selected IDs:", selectedIds);
                                });

                                // Add event listener for change event on select all checkbox
                                document.getElementById('selectAllCheckbox2').addEventListener('change', function() {
                                    var checkboxes = document.querySelectorAll('.item-checkbox2');
                                    checkboxes.forEach(function(checkbox) {
                                        checkbox.checked = document.getElementById('selectAllCheckbox2').checked;
                                    });
                                    updateSelectedCount();
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
