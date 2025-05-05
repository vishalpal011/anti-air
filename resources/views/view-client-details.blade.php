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
    {{-- <script src="assets/js/config.js"></script> --}}
</head>
<style>
    .custom-option-icon .custom-option-content {
        text-align: center;
        padding: 6px;
    }

    .btn-per-info {
        margin-left: 252px;
    }

    .btn-edit {
        margin-left: 186px;
    }

    .btn-business {
        margin-left: 75px;
    }

    .btn-edit-business {
        margin-left: 22px;
    }

    .modal-business {
        width: 627px;
    }
</style>


<!-- client card css -->
<style>
    .main-body {
        padding: 15px;
    }

    .card {
        box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .1), 0 1px 2px 0 rgba(0, 0, 0, .06);
    }

    .card {
        position: relative;
        display: flex;
        flex-direction: column;
        min-width: 0;
        word-wrap: break-word;
        background-color: #fff;
        background-clip: border-box;
        border: 0 solid rgba(0, 0, 0, .125);
        border-radius: .25rem;
    }

    .card-body {
        flex: 1 1 auto;
        min-height: 1px;
        padding: 1rem;
    }

    .gutters-sm {
        margin-right: -8px;
        margin-left: -8px;
    }

    .gutters-sm>.col,
    .gutters-sm>[class*=col-] {
        padding-right: 8px;
        padding-left: 8px;
    }

    .mb-3,
    .my-3 {
        margin-bottom: 1rem !important;
    }

    .bg-gray-300 {
        background-color: #e2e8f0;
    }

    .h-100 {
        height: 100% !important;
    }

    .shadow-none {
        box-shadow: none !important;
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

                    <div class="content-wrapper">

                        <!-- Content -->

                        <div class="container-xxl flex-grow-1 container-p-y">



                            <h4 class="py-3 mb-2">
                                <span class="text-muted fw-light">Clients /</span> View Clients /
                                {{ $data['first_name'] }} {{ $data['last_name'] }}
                            </h4>






                            <div class="row gutters-sm">
                                <div class="col-md-4 mb-3">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="d-flex flex-column align-items-center text-center">
                                                <img src="{{ url('assets/images/avatar7.png') }}" alt="Admin"
                                                    class="rounded-circle" width="150">
                                                <div class="mt-3">
                                                    <h4>{{ $data['first_name'] }} {{ $data['last_name'] }}</h4>
                                                    <h5>Client ID : {{ $data['client_id'] }}</h5>
                                                    <!-- <p class="text-secondary mb-1">Client</p> -->

                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="card mt-3">
                                        <div class="card-header">
                                            <h6 class="card-title m-0">Number of Bookings</h6>
                                        </div>
                                        <div class="card-body">

                                            <div class="d-flex justify-content-start align-items-center mb-4">
                                                <span
                                                    class="avatar rounded-circle bg-label-success me-2 d-flex align-items-center justify-content-center"><i
                                                        class='ti ti-shopping-cart ti-sm'></i></span>
                                                <h6 class="text-body text-nowrap mb-0">12 Bookings</h6>
                                            </div>
                                            <div class="d-flex justify-content-start align-items-center mb-4">
                                                <span
                                                    class="avatar rounded-circle bg-label-success me-2 d-flex align-items-center justify-content-center"><i
                                                        class='ti ti-list ti-sm'></i></span>
                                                <h6 class="text-body text-nowrap mb-0">12 Used AWB</h6>
                                            </div>


                                        </div>
                                    </div>


                                    <div class="card mt-3">
                                        <div class="mt-4">
                                            <h5 class="text-center btn-business">Business Doc's <span
                                                    class="btn btn-edit-business btn-info" data-bs-toggle="modal"
                                                    data-bs-target="#updateDocs{{ $data['id'] }}">Edit</span></h5>
                                        </div>
                                        <hr>
                                        <div class="container">
                                            <div class="row">

                                                <div class="col-sm-6">
                                                    <h6 class="mb-0">Business Type</h6>
                                                </div>
                                                <div class="col-sm-6 text-secondary">
                                                    {{ $data['business_type'] }}
                                                </div>
                                            </div>
                                            <hr>
                                        </div>
                                        <!-- </div> -->

                                        <div class="row p-2">
                                            @if ($data['business_type'] == 'Personal')
                                                <div class="col-sm-6 col-lg-6">
                                                    <div class="card p-2 h-100 shadow-none border">

                                                        <div
                                                            class="rounded-2 text-center mb-3 image-popup-vertical-fit">
                                                            <a
                                                                href="{{ asset('uploads/aadhar/' . $data['aadhar_card']) }}">
                                                                <img class="img-fluid"
                                                                    src="{{ asset('uploads/aadhar/' . $data['aadhar_card']) }}"
                                                                    alt="tutor image 1" style="height: 132px;"
                                                                    onerror="this.onerror=null; this.src='{{ env('Web_URL') }}/uploads/aadhar/{{ $data->aadhar_card }}';">
                                                            </a>
                                                        </div>
                                                        <div class="card-body p-3 pt-2">
                                                            <div
                                                                class="d-flex justify-content-between align-items-center mb-3">
                                                                <span class="badge bg-label-primary">Aadhar Card</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @else
                                                <div class="col-sm-6 col-lg-6">
                                                    <div class="card p-2 h-100 shadow-none border">

                                                        <div
                                                            class="rounded-2 text-center mb-3 image-popup-vertical-fit">
                                                            <a
                                                                href="{{ asset('uploads/gst/' . $data['company_gst']) }}"><img
                                                                    class="img-fluid"
                                                                    src="{{ asset('uploads/gst/' . $data['company_gst']) }}"
                                                                    alt="tutor image 1" style="height: 132px;"
                                                                    onerror="this.onerror=null; this.src='{{ env('Web_URL') }}/uploads/gst/{{ $data->company_gst }}';"></a>
                                                        </div>
                                                        <div class="card-body p-3 pt-2">
                                                            <div
                                                                class="d-flex justify-content-between align-items-center mb-3">
                                                                <span class="badge bg-label-primary">Company GST</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                            <div class="col-sm-6 col-lg-6">
                                                <div class="card p-2 h-100 shadow-none border">
                                                    <div class="rounded-2 text-center mb-3">
                                                        <a href="{{ asset('uploads/pan/' . $data['pan_card']) }}"><img
                                                                class="img-fluid"
                                                                src="{{ asset('uploads/pan/' . $data['pan_card']) }}"
                                                                alt="tutor image 1" style="height: 132px;"
                                                                onerror="this.onerror=null; this.src='{{ env('Web_URL') }}/uploads/pan/{{ $data->pan_card }}';"></a>
                                                    </div>
                                                    <div class="card-body p-3 pt-2">
                                                        <div
                                                            class="d-flex justify-content-between align-items-center mb-3">
                                                            <span class="badge bg-label-primary">Pan Card</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="row p-2">
                                            <div class="col-sm-6 col-lg-6">
                                                <div class="card p-2 h-100 shadow-none border">

                                                    <div class="rounded-2 text-center mb-3 image-popup-vertical-fit">
                                                        <a
                                                            href="{{ asset('uploads/address_proof/' . $data['address_proof']) }}"><img
                                                                class="img-fluid"
                                                                src="{{ asset('uploads/address_proof/' . $data['address_proof']) }}"
                                                                alt="tutor image 1" style="height: 132px;"
                                                                onerror="this.onerror=null; this.src='{{ env('Web_URL') }}/uploads/address_proof/{{ $data->address_proof }}';"></a>
                                                    </div>
                                                    <div class="card-body p-3 pt-2">
                                                        <div
                                                            class="d-flex justify-content-between align-items-center mb-3">
                                                            <span class="badge bg-label-primary">Address Proof</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-lg-6">
                                                <div class="card p-2 h-100 shadow-none border">
                                                    <div class="rounded-2 text-center mb-3">
                                                        <a
                                                            href="{{ asset('uploads/cancel_cheque/' . $data['cancel_cheque']) }}"><img
                                                                class="img-fluid"
                                                                src="{{ asset('uploads/cancel_cheque/' . $data['cancel_cheque']) }}"
                                                                alt="tutor image 1" style="height: 132px;"
                                                                onerror="this.onerror=null; this.src='{{ env('Web_URL') }}/uploads/cancel_cheque/{{ $data->cancel_cheque }}';"></a>
                                                    </div>
                                                    <div class="card-body p-3 pt-2">
                                                        <div
                                                            class="d-flex justify-content-between align-items-center mb-3">
                                                            <span class="badge bg-label-primary">Cancel Cheque</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                                <div class="col-md-8">
                                    <div class="card mb-3">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="mt-1">
                                                    <h4 class="text-center btn-per-info">Personal Info <span
                                                            class="btn btn-edit btn-info" data-bs-toggle="modal"
                                                            data-bs-target="#updateDetails{{ $data['id'] }}">Edit</span>
                                                    </h4>
                                                </div>
                                                <hr>
                                                <div class="col-sm-4">
                                                    <h6 class="mb-0">First Name</h6>
                                                </div>
                                                <div class="col-sm-8 text-secondary">
                                                    {{ $data['first_name'] }}
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <h6 class="mb-0">Last Name</h6>
                                                </div>
                                                <div class="col-sm-8 text-secondary">
                                                    {{ $data['last_name'] }}
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <h6 class="mb-0">Email ID</h6>
                                                </div>
                                                <div class="col-sm-8 text-secondary">
                                                    {{ $data['email'] }}
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <h6 class="mb-0">Mobile Number</h6>
                                                </div>
                                                <div class="col-sm-8 text-secondary">
                                                    {{ $data['phone'] }}
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <h6 class="mb-0">Status</h6>
                                                </div>
                                                <div class="col-sm-8 text-secondary">

                                                    @if ($data->status == 'true')
                                                        <span class="badge bg-success">Active</span>
                                                    @else
                                                        <span class="badge bg-danger">Deactive</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <h6 class="mb-0">KYC Status</h6>
                                                </div>
                                                <div class="col-sm-8 text-secondary">



                                                    @if ($data->kyc_status == 'Approved')
                                                        <span class="badge bg-success">Approved</span>
                                                    @endif
                                                    @if ($data->kyc_status == 'Pending')
                                                        <span data-bs-toggle="modal"
                                                            data-bs-target="#KycStatusModal{{ $data['id'] }}"
                                                            class="badge bg-secondary"style="cursor: pointer;">Pending</span>
                                                    @endif

                                                    @if ($data->kyc_status === null)
                                                        <span class="badge bg-secondary">Null</span>
                                                        {{-- <span data-bs-toggle="modal"
                                                            data-bs-target="#KycStatusModal{{ $data['id'] }}"
                                                            class="badge bg-secondary"style="cursor: pointer;">Pending</span> --}}
                                                    @endif


                                                </div>
                                            </div>


                                        </div>
                                    </div>

                                    <div class="card mb-3">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="mt-1">
                                                    <h4 class="btn-per-info">Bank Details</h4>
                                                </div>
                                                <hr>
                                                <div class="col-sm-4">
                                                    <h6 class="mb-0">Bank Name</h6>
                                                </div>
                                                <div class="col-sm-8 text-secondary">
                                                    {{ $data['bank_name'] }}
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <h6 class="mb-0">IFSC Code</h6>
                                                </div>
                                                <div class="col-sm-8 text-secondary">
                                                    {{ $data['ifsc_code'] }}
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <h6 class="mb-0">Account Number</h6>
                                                </div>
                                                <div class="col-sm-8 text-secondary">
                                                    {{ $data['account_number'] }}
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <h6 class="mb-0">Mobile Number (As per Bank)</h6>
                                                </div>
                                                <div class="col-sm-8 text-secondary">
                                                    {{ $data['mobile_as_bank'] }}
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="row gutters-sm">
                                        <div class="col-sm-6 mb-3">
                                            <div class="card h-100">
                                                <div class="card-body">
                                                    <!-- row -->
                                                    <div class="row">
                                                        <div class="mt-1">
                                                            <h5 class="text-center">Orders Sales & Cycle</h5>
                                                        </div>
                                                        <hr>

                                                        <div class="col-sm-6">
                                                            <h6 class="mb-0">Average Monthly Orders</h6>
                                                        </div>

                                                        <div class="col-sm-6 text-secondary">
                                                            {{ $data['average_monthly_orders'] }}
                                                        </div>

                                                    </div>
                                                    <hr>

                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <h6 class="mb-0">Agreed Rates</h6>
                                                        </div>

                                                        <div class="col-sm-6 text-secondary">
                                                            {{ $data['agreed_rates'] }}
                                                        </div>

                                                    </div>
                                                    <hr>
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <h6 class="mb-0">Sales Person Name</h6>
                                                        </div>

                                                        <div class="col-sm-6 text-secondary">
                                                            {{ $data['sales_person'] }}
                                                        </div>

                                                    </div>
                                                    <hr>
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <h6 class="mb-0">Sales Person Email</h6>
                                                        </div>

                                                        <div class="col-sm-6 text-secondary">
                                                            {{ $data['sales_person_email'] }}
                                                        </div>

                                                    </div>
                                                    <hr>
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <h6 class="mb-0">Assigined KAM*</h6>
                                                        </div>

                                                        <div class="col-sm-6 text-secondary">
                                                            {{ $data['assigined_kam'] }}
                                                        </div>

                                                    </div>
                                                    <hr>
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <h6 class="mb-0">COD Cycle*</h6>
                                                        </div>

                                                        <div class="col-sm-6 text-secondary">
                                                            {{ $data['cod_cycle'] }}
                                                        </div>

                                                    </div>





                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 mb-3">
                                            <div class="card h-100">
                                                <div class="card-body">
                                                    <!-- row -->
                                                    <div class="row">
                                                        <div class="mt-1">
                                                            <h5 class="text-center">Client Info & Address</h5>
                                                        </div>
                                                        <hr>

                                                        <div class="col-sm-6">
                                                            <h6 class="mb-0">Loss Liability</h6>
                                                        </div>

                                                        <div class="col-sm-6 text-secondary">
                                                            {{ $data['loss_liablity'] }}
                                                        </div>

                                                    </div>
                                                    <hr>

                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <h6 class="mb-0">User Name</h6>
                                                        </div>

                                                        <div class="col-sm-6 text-secondary">
                                                            {{ $data['user_name'] }}
                                                        </div>

                                                    </div>
                                                    <hr>
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <h6 class="mb-0">Billing Pin code</h6>
                                                        </div>

                                                        <div class="col-sm-6 text-secondary">
                                                            {{ $data['billing_pin_code'] }}
                                                        </div>

                                                    </div>
                                                    <hr>
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <h6 class="mb-0">City</h6>
                                                        </div>

                                                        <div class="col-sm-6 text-secondary">
                                                            {{ $data['city'] }}
                                                        </div>

                                                    </div>
                                                    <hr>
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <h6 class="mb-0">State</h6>
                                                        </div>

                                                        <div class="col-sm-6 text-secondary">
                                                            {{ $data['states'] }}
                                                        </div>

                                                    </div>
                                                    <hr>

                                                </div>
                                            </div>
                                        </div>
                                    </div>



                                </div>
                            </div>



                        </div>

                        <!-- Edit User Modal -->
                        <div class="modal fade" id="editUser" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-simple modal-edit-user">
                                <div class="modal-content p-3 p-md-5">
                                    <div class="modal-body">
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                        <div class="text-center mb-4">
                                            <h3 class="mb-2">Edit User Information</h3>
                                            <p class="text-muted">Updating user details will receive a privacy
                                                audit.</p>
                                        </div>
                                        <form id="editUserForm" class="row g-3" onsubmit="return false">
                                            <div class="col-12 col-md-6">
                                                <label class="form-label" for="modalEditUserFirstName">First
                                                    Name</label>
                                                <input type="text" id="modalEditUserFirstName"
                                                    name="modalEditUserFirstName" class="form-control"
                                                    placeholder="John" />
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <label class="form-label" for="modalEditUserLastName">Last
                                                    Name</label>
                                                <input type="text" id="modalEditUserLastName"
                                                    name="modalEditUserLastName" class="form-control"
                                                    placeholder="Doe" />
                                            </div>
                                            <div class="col-12">
                                                <label class="form-label" for="modalEditUserName">Username</label>
                                                <input type="text" id="modalEditUserName" name="modalEditUserName"
                                                    class="form-control" placeholder="john.doe.007" />
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <label class="form-label" for="modalEditUserEmail">Email</label>
                                                <input type="text" id="modalEditUserEmail"
                                                    name="modalEditUserEmail" class="form-control"
                                                    placeholder="example@domain.com" />
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <label class="form-label" for="modalEditUserStatus">Status</label>
                                                <select id="modalEditUserStatus" name="modalEditUserStatus"
                                                    class="select2 form-select" aria-label="Default select example">
                                                    <option selected>Status</option>
                                                    <option value="1">Active</option>
                                                    <option value="2">Inactive</option>
                                                    <option value="3">Suspended</option>
                                                </select>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <label class="form-label" for="modalEditTaxID">Tax ID</label>
                                                <input type="text" id="modalEditTaxID" name="modalEditTaxID"
                                                    class="form-control modal-edit-tax-id"
                                                    placeholder="123 456 7890" />
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <label class="form-label" for="modalEditUserPhone">Phone
                                                    Number</label>
                                                <div class="input-group">
                                                    <span class="input-group-text">US (+1)</span>
                                                    <input type="text" id="modalEditUserPhone"
                                                        name="modalEditUserPhone"
                                                        class="form-control phone-number-mask"
                                                        placeholder="202 555 0111" />
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <label class="form-label" for="modalEditUserLanguage">Language</label>
                                                <select id="modalEditUserLanguage" name="modalEditUserLanguage"
                                                    class="select2 form-select" multiple>
                                                    <option value="">Select</option>
                                                    <option value="english" selected>English</option>
                                                    <option value="spanish">Spanish</option>
                                                    <option value="french">French</option>
                                                    <option value="german">German</option>
                                                    <option value="dutch">Dutch</option>
                                                    <option value="hebrew">Hebrew</option>
                                                    <option value="sanskrit">Sanskrit</option>
                                                    <option value="hindi">Hindi</option>
                                                </select>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <label class="form-label" for="modalEditUserCountry">Country</label>
                                                <select id="modalEditUserCountry" name="modalEditUserCountry"
                                                    class="select2 form-select" data-allow-clear="true">
                                                    <option value="">Select</option>
                                                    <option value="Australia">Australia</option>
                                                    <option value="Bangladesh">Bangladesh</option>
                                                    <option value="Belarus">Belarus</option>
                                                    <option value="Brazil">Brazil</option>
                                                    <option value="Canada">Canada</option>
                                                    <option value="China">China</option>
                                                    <option value="France">France</option>
                                                    <option value="Germany">Germany</option>
                                                    <option value="India">India</option>
                                                    <option value="Indonesia">Indonesia</option>
                                                    <option value="Israel">Israel</option>
                                                    <option value="Italy">Italy</option>
                                                    <option value="Japan">Japan</option>
                                                    <option value="Korea">Korea, Republic of</option>
                                                    <option value="Mexico">Mexico</option>
                                                    <option value="Philippines">Philippines</option>
                                                    <option value="Russia">Russian Federation</option>
                                                    <option value="South Africa">South Africa</option>
                                                    <option value="Thailand">Thailand</option>
                                                    <option value="Turkey">Turkey</option>
                                                    <option value="Ukraine">Ukraine</option>
                                                    <option value="United Arab Emirates">United Arab Emirates
                                                    </option>
                                                    <option value="United Kingdom">United Kingdom</option>
                                                    <option value="United States">United States</option>
                                                </select>
                                            </div>
                                            <div class="col-12">
                                                <label class="switch">
                                                    <input type="checkbox" class="switch-input">
                                                    <span class="switch-toggle-slider">
                                                        <span class="switch-on"></span>
                                                        <span class="switch-off"></span>
                                                    </span>
                                                    <span class="switch-label">Use as a billing address?</span>
                                                </label>
                                            </div>
                                            <div class="col-12 text-center">
                                                <button type="submit"
                                                    class="btn btn-primary me-sm-3 me-1">Submit</button>
                                                <button type="reset" class="btn btn-label-secondary"
                                                    data-bs-dismiss="modal" aria-label="Close">Cancel</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--/ Edit User Modal -->

                        <!-- Add New Address Modal -->
                        <div class="modal fade" id="updateDetails{{ $data['id'] }}" tabindex="-1"
                            aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-simple modal-add-new-address">
                                <div class="modal-content ">
                                    <div class="modal-body">
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                        <div class="text-center mb-4">
                                            <h3 class="address-title mb-2">Update</h3>
                                            <!-- <p class="text-muted address-subtitle">Add new address for express
                                                delivery</p> -->
                                        </div>
                                        <form action="{{ url('client-update/' . $data['id']) }}" method="POST"
                                            class="row g-3">
                                            @csrf
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label for="">First Name</label>
                                                    <input type="text" name="first_name"
                                                        value="{{ $data['first_name'] }}" class="form-control">
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="">Last Name</label>
                                                    <input type="text" name="last_name"
                                                        value="{{ $data['last_name'] }}" class="form-control">
                                                </div>


                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label for="">Email ID</label>
                                                    <input type="email" name="email_id"
                                                        value="{{ $data['email'] }}" class="form-control">
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="">Phone No</label>
                                                    <input type="number" name="phone"
                                                        value="{{ $data['phone'] }}" class="form-control">
                                                </div>


                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label for="">Status</label>
                                                    <select name="status" class="form-control">

                                                        @if ($data->status == 'true')
                                                            <option value="true">Active (Default Selected)</option>
                                                        @else
                                                            <option value="false">Deactive (Default Selected)</option>
                                                        @endif
                                                        <option value="true">Active</option>
                                                        <option value="false">Deactive</option>
                                                    </select>
                                                </div>



                                            </div>
                                            <div class="col-12 text-center">
                                                <button type="submit"
                                                    class="btn btn-primary me-sm-3 me-1">Update</button>
                                                <button type="reset" class="btn btn-label-secondary"
                                                    data-bs-dismiss="modal" aria-label="Close">Cancel</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <!-- updates docs -->
                        <div class="modal fade" id="updateDocs{{ $data['id'] }}" tabindex="-1"
                            aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-simple modal-add-new-address modal-business">
                                <div class="modal-content ">
                                    <div class="modal-body">
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                        <div class="text-center mb-4">
                                            <h3 class="address-title mb-2">Update</h3>
                                        </div>
                                        @if ($data->business_type == 'Personal')
                                            <form action="{{ url('client-docs-update/' . $data['id']) }}"
                                                method="POST" class="row g-3" enctype="multipart/form-data">
                                                @csrf
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <label for="">Aadhar Card</label>
                                                        <input type="file" name="aadhar_card"
                                                            class="form-control">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <label for="">Pan Card</label>
                                                        <input type="file" name="pan_card" class="form-control">
                                                    </div>


                                                </div>

                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <label for="">Addess Proof</label>
                                                        <input type="file" name="address_proof"
                                                            class="form-control">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <label for="">Cancel Cheque</label>
                                                        <input type="file" name="cancel_chaque"
                                                            class="form-control">
                                                    </div>


                                                </div>


                                                <div class="col-12 text-center">
                                                    <button type="submit"
                                                        class="btn btn-primary me-sm-3 me-1">Update</button>
                                                    <button type="reset" class="btn btn-label-secondary"
                                                        data-bs-dismiss="modal" aria-label="Close">Cancel</button>
                                                </div>
                                            </form>
                                        @else
                                            <form action="{{ url('client-company-docs-update/' . $data['id']) }}"
                                                method="POST" class="row g-3" enctype="multipart/form-data">
                                                @csrf

                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <label for="">Company GST</label>
                                                        <input type="file" name="company_gst"
                                                            class="form-control">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <label for="">Pan Card</label>
                                                        <input type="file" name="pan_card" class="form-control">
                                                    </div>


                                                </div>

                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <label for="">Addess Proof</label>
                                                        <input type="file" name="address_proof"
                                                            class="form-control">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <label for="">Cancel Cheque</label>
                                                        <input type="file" name="cancel_chaque"
                                                            class="form-control">
                                                    </div>


                                                </div>

                                                <div class="col-12 text-center">
                                                    <button type="submit"
                                                        class="btn btn-primary me-sm-3 me-1">Update</button>
                                                    <button type="reset" class="btn btn-label-secondary"
                                                        data-bs-dismiss="modal" aria-label="Close">Cancel</button>
                                                </div>
                                            </form>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--/ Add New Address Modal -->



                    </div>
                    <!-- / Content -->







                    <div class="content-backdrop fade"></div>
                </div>
                <script>
                    $(document).ready(function() {
                        $('.image-popup-vertical-fit').magnificPopup({
                            type: 'image',
                            mainClass: 'mfp-with-zoom',
                            gallery: {
                                enabled: true
                            },
                            zoom: {
                                enabled: true,
                                duration: 300, // duration of the effect, in milliseconds
                                easing: 'ease-in-out', // CSS transition easing function
                                opener: function(openerElement) {
                                    return openerElement.is('img') ? openerElement : openerElement.find('img');
                                }
                            }
                        });
                    });
                </script>

                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        document.getElementById('aws').addEventListener('submit', function(e) {
                            e.preventDefault();

                            var csrfToken = document.head.querySelector('meta[name="csrf-token"]').content;
                            var formData = new FormData(this);


                            fetch("{{ url('create-pin-code') }}", {
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

                                            window.location.href = '{{ url('Pin-Code') }}';
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

                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        document.getElementById('update').addEventListener('submit', function(e) {
                            e.preventDefault();

                            var csrfToken = document.head.querySelector('meta[name="csrf-token"]').content;
                            var formData = new FormData(this);


                            fetch("{{ url('update-pin-code') }}", {
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

                                            window.location.href = '{{ url('Pin-Code') }}';
                                        }, 2500);

                                    } else {
                                        toastr.options = {
                                            "closeButton": true,


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


                <div class="modal fade" id="KycStatusModal{{ $data['id'] }}" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-simple modal-add-new-address">
                        <div class="modal-content "
                            style="width: 306px; height: 193px; padding: 28px;     margin-left: 257px;">
                            <div class="modal-body" style="padding: 0px;">
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                                    style="top: -1rem; right: -1rem;"></button>
                                <h5 class="text-center" style="margin-top: 16px;">Are You Want to Change Kyc Status ?
                                </h5>
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal"
                                    onclick="ClicntKycReject({{ $data['id'] }})"
                                    style="margin-left: 21px;">Reject</button>

                                <button type="button" onclick="ClicntKycApprove({{ $data['id'] }})"
                                    class="btn btn-success" data-bs-dismiss="modal">Approved</button>
                            </div>

                        </div>
                    </div>
                </div>


                <script>
                    function ClicntKycReject(id) {
                        var client_id = id;
                        $.ajax({
                            url: '{{ url('client-kyc-reject') }}',
                            type: 'POST',
                            data: {
                                client_id: client_id,
                                _token: '{{ csrf_token() }}'
                            },
                            success: function(result) {
                                if (result == 'true') {
                                    window.location.reload();
                                }
                            }
                        });
                    }

                    function ClicntKycApprove(id) {
                        var client_id = id;
                        $.ajax({
                            url: '{{ url('client-kyc-approve') }}',
                            type: 'POST',
                            data: {
                                client_id: client_id,
                                _token: '{{ csrf_token() }}'
                            },
                            success: function(result) {
                                if (result == 'true') {
                                    window.location.reload();
                                }
                            }
                        });
                    }
                </script>



                @include('layouts.footer')
