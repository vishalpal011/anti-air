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
                            <span class="text-muted fw-light">Sales & Announcements /</span> Sales Leads
                        </h4>

                        <!-- Order List Widget -->

                        <div class="card mb-4">
                            <div class="card-widget-separator-wrapper">
                                <div class="card-body card-widget-separator">
                                    <div class="row gy-4 gy-sm-1">
                                        <div class="col-sm-6 col-lg-3">
                                            <div
                                                class="d-flex justify-content-between align-items-start card-widget-1 border-end pb-3 pb-sm-0">
                                                <div>
                                                    <h4 class="mb-2">{{ $deactive }}</h4>
                                                    <p class="mb-0 fw-medium">Deactive Sales Leads</p>
                                                </div>
                                                <span class="avatar me-sm-4">
                                                    <span class="avatar-initial bg-label-secondary rounded">
                                                        <i class="ti-md ti ti-calendar-stats text-body"></i>
                                                    </span>
                                                </span>
                                            </div>
                                            <hr class="d-none d-sm-block d-lg-none me-4">
                                        </div>
                                        <div class="col-sm-6 col-lg-3">
                                            <div
                                                class="d-flex justify-content-between align-items-start card-widget-2 border-end pb-3 pb-sm-0">
                                                <div>
                                                    <h4 class="mb-2">{{ $active }}</h4>
                                                    <p class="mb-0 fw-medium">Active Sales Leads</p>
                                                </div>
                                                <span class="avatar p-2 me-lg-4">
                                                    <span class="avatar-initial bg-label-secondary rounded"><i
                                                            class="ti-md ti ti-checks text-body"></i></span>
                                                </span>
                                            </div>
                                            <hr class="d-none d-sm-block d-lg-none">
                                        </div>
                                        <div class="col-sm-6 col-lg-3">
                                            <div
                                                class="d-flex justify-content-between align-items-start card-widget-2 border-end pb-3 pb-sm-0">
                                                <div>
                                                    <h4 class="mb-2"> </h4>
                                                    <p class="mb-0 fw-medium">
                                                        <button type="button" class="btn btn-sm btn-primary"
                                                            data-bs-toggle="modal" data-bs-target="#exLargeModal"><i
                                                                class='menu-icon tf-icons ti ti-location'></i>Add New
                                                        </button>
                                                    </p>
                                                    <div class="modal fade" id="exLargeModal" tabindex="-1"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog modal-xl" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel4">
                                                                        Sales Leads</h5>
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal"
                                                                        aria-label="Close"></button>
                                                                </div>
                                                                <form id="aws" method="POST">
                                                                    <div class="modal-body">
                                                                        <div class="row">
                                                                            <div class="col mb-4">
                                                                                <label for="nameExLarge"
                                                                                    class="form-label">Company
                                                                                    Name</label>
                                                                                <input type="text"
                                                                                    name="company_name" id="nameExLarge"
                                                                                    class="form-control"
                                                                                    placeholder="Company Name" required>
                                                                            </div>
                                                                            <div class="col mb-4">
                                                                                <label for="nameExLarge"
                                                                                    class="form-label">Brand
                                                                                    Name</label>
                                                                                <input type="text" name="brand_name"
                                                                                    id="nameExLarge"
                                                                                    class="form-control"
                                                                                    placeholder="Brand Name" required>
                                                                            </div>
                                                                            <div class="col mb-4">
                                                                                <label for="nameExLarge"
                                                                                    class="form-label">Vendor
                                                                                    Name</label>
                                                                                <input type="text" name="vendor_name"
                                                                                    id="nameExLarge"
                                                                                    class="form-control"
                                                                                    placeholder="Vendor Name" required>
                                                                            </div>
                                                                            <div class="col mb-4">
                                                                                <label for="nameExLarge"
                                                                                    class="form-label">Decision Maker
                                                                                    Name</label>
                                                                                <input type="text"
                                                                                    name="decision_maker_name"
                                                                                    id="nameExLarge"
                                                                                    class="form-control"
                                                                                    placeholder="Decision Maker Name" required>
                                                                            </div>

                                                                        </div>

                                                                        <div class="row g-2">


                                                                        <div class="col mb-4">
                                                                                <label for="nameExLarge"
                                                                                    class="form-label">Decicion Maker
                                                                                    Number</label>
                                                                                <input type="number"
                                                                                    name="decicion_maker_number"
                                                                                    id="nameExLarge"
                                                                                    class="form-control"
                                                                                    placeholder="Decicion Maker Number" required>
                                                                            </div>
                                                                            <div class="col mb-4">
                                                                                <label for="nameExLarge"
                                                                                    class="form-label">Decicion Maker
                                                                                    Email ID</label>
                                                                                <input type="email"
                                                                                    name="decicion_maker_email"
                                                                                    id="nameExLarge"
                                                                                    class="form-control"
                                                                                    placeholder="Decicion Maker Email ID" required>
                                                                            </div>


                                                                            <div class="col mb-4">
                                                                                <label for="emailExLarge"
                                                                                    class="form-label">Contact person
                                                                                    Name</label>
                                                                                <input type="text"
                                                                                    id="emailExLarge"
                                                                                    class="form-control"
                                                                                    placeholder="Contact person Name"
                                                                                    name="contact_person_name" required>
                                                                            </div>
                                                                            <div class="col mb-4">
                                                                                <label for="dobExLarge"
                                                                                    class="form-label">Contact person
                                                                                    Number</label>
                                                                                <input type="number" id="dobExLarge"
                                                                                    class="form-control"
                                                                                    placeholder="Contact person Number"
                                                                                    name="contact_person_number" required>
                                                                            </div>
                                                                            <div class="col mb-4">
                                                                                <label for="dobExLarge"
                                                                                    class="form-label">Contact person
                                                                                    Email ID</label>
                                                                                <input type="email" id="dobExLarge"
                                                                                    class="form-control"
                                                                                    name="contact_person_email"
                                                                                    placeholder="Contact person Email ID" required>
                                                                            </div>


                                                                        </div>

                                                                        <div class="row g-2">
                                                                        <div class="col mb-4">
                                                                                <label for="dobExLarge"
                                                                                    class="form-label">             Sales Person Name</label>
                                                                                <input type="text" id="dobExLarge"
                                                                                    class="form-control"
                                                                                    name="sales_person_name"
                                                                                    placeholder="Sales person name" required>
                                                                            </div>
                                                                            <div class="col mb-4">
                                                                                <label for="dobExLarge"
                                                                                    class="form-label">Lead
                                                                                    Date</label>
                                                                                <input type="date" id="dobExLarge"
                                                                                    class="form-control"
                                                                                    name="lead_date"
                                                                                    placeholder="Lead Date" required>
                                                                            </div>
                                                                            <div class="col mb-4">
                                                                                <label for="dobExLarge"
                                                                                    class="form-label">Service
                                                                                    Type</label>
                                                                                <input type="text" id="dobExLarge"
                                                                                    class="form-control"
                                                                                    name="service_type"
                                                                                    placeholder="Service Type" required>
                                                                            </div>
                                                                            <div class="col mb-4">
                                                                                <label for="dobExLarge"
                                                                                    class="form-label">Volume</label>
                                                                                <input type="number" id="dobExLarge"
                                                                                    class="form-control"
                                                                                    name="volume"
                                                                                    placeholder="Volume" required>
                                                                            </div>
                                                                            <div class="col mb-4">
                                                                                <label for="dobExLarge"
                                                                                    class="form-label">Lead
                                                                                    Type</label>
                                                                                <input type="text" id="dobExLarge"
                                                                                    class="form-control"
                                                                                    name="lead_type"
                                                                                    placeholder="Lead Type" required>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row pt-3">
                                                                            <div class="col mb-0">
                                                                                <textarea name="office_address" id="" class="form-control" cols="30" rows="4"
                                                                                    placeholder="Office Address" required></textarea>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button"
                                                                            class="btn btn-label-secondary"
                                                                            data-bs-dismiss="modal">Close</button>
                                                                        <button type="submit"
                                                                            class="btn btn-primary">Save
                                                                            changes</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>

                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Order List Table -->
                        <div class="card p-3">
                            <div class="card-datatable table-responsive">
                                 <!-- filter section -->
                                 <div class="row">
                                        <div class="col-md-3">
                                            <label>Date : From</label>
                                            <input type="date" id="filterFrom" class="form-control">
                                        </div>
                                        <div class="col-md-3">
                                            <label for="">Date : To</label>
                                            <input type="date" id="filterTo" class="form-control">
                                        </div>
                                        <div class="col-md-3">
                                            <label>Latest/Oldest</label>
                                            <select id="latest_oldest" class="form-control">
                                                <option value="" selected>--Choose--</option>
                                                <option value="DESC">Latest</option>
                                                <option value="ASC">Oldest</option>
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <br>
                                            <button type="button" onclick="Datafilter()" class="btn btn-primary">Filter</button>
                                        </div>
                                    </div>
                                    <br>
                               <!-- filter section end -->
                                <table id="example" class="display nowrap" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>S.No.</th>
                                            <th>Company Name</th>
                                            <th>Brand Name</th>
                                            <th>Vendor Name</th>
                                            <th>Decision Maker Name</th>
                                            <th>Decicion Maker Number</th>
                                            <th>Decicion Maker Email ID</th>

                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $count = 1;
                                        @endphp
                                        @foreach ($data as $value)
                                            <tr id="row{{ $value->id }}">

                                                <td>{{ $count }}</td>
                                                <td>{{ $value->company_name }}</td>
                                                <td>{{ $value->brand_name }}</td>
                                                <td>{{ $value->vendor_name }}</td>

                                                <td>{{ $value->decision_maker_name }}</td>
                                                <td>{{ $value->decicion_maker_number }}</td>
                                                <td>{{ $value->decicion_maker_email }}</td>



                                                <td>
                                                    @if ($value->status == 'true')
                                                        <span class="badge bg-success">Active</span>
                                                    @else
                                                        <span class="badge bg-danger">Deactive</span>
                                                    @endif
                                                </td>
                                                {{-- data-bs-toggle="modal" data-bs-target="#exLargeModals{{ $value->id }}" --}}
                                                <td>
                                                    <a onclick="view({{ $value->id }})">
                                                        <i class='menu-icon tf-icons ti ti-eye'></i>
                                                    </a>
                                                    &nbsp;
                                                    <a data-bs-toggle="modal"
                                                        data-bs-target="#exLargeModalss{{ $value->id }}">
                                                        <i class='menu-icon tf-icons ti ti-edit'></i>
                                                    </a>
                                                    &nbsp;

                                                    <a href="#" onclick="deleteModal({{ $value->id }})">
                                                        <i class='menu-icon tf-icons ti ti-trash'></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            {{-- edit model --}}
                                            <div class="modal fade" id="exLargeModalss{{ $value->id }}"
                                                tabindex="-1" aria-hidden="true">
                                                <div class="modal-dialog modal-xl" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel4">
                                                                Edit Sales Leads</h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <form action="{{url('update-sales')}}" method="POST">
                                                            @csrf
                                                            <div class="modal-body">
                                                                <div class="row">
                                                                    <div class="col mb-4">
                                                                        <label for="nameExLarge"
                                                                            class="form-label">Company
                                                                            Name</label>
                                                                        <input type="text" name="company_name"
                                                                            id="nameExLarge" class="form-control"
                                                                            placeholder="Company Name"
                                                                            value="{{ $value->company_name }}">
                                                                        <input type="text" hidden name="id"
                                                                            value="{{ $value->id }}">
                                                                    </div>
                                                                    <div class="col mb-4">
                                                                        <label for="nameExLarge"
                                                                            class="form-label">Brand
                                                                            Name</label>
                                                                        <input type="text" name="brand_name"
                                                                            id="nameExLarge" class="form-control"
                                                                            placeholder="Brand Name"
                                                                            value="{{ $value->brand_name }}">
                                                                    </div>
                                                                    <div class="col mb-4">
                                                                        <label for="nameExLarge"
                                                                            class="form-label">Vendor
                                                                            Name</label>
                                                                        <input type="text" name="vendor_name"
                                                                            id="nameExLarge" class="form-control"
                                                                            placeholder="Vendor Name"
                                                                            value="{{ $value->vendor_name }}">
                                                                    </div>
                                                                    <div class="col mb-4">
                                                                        <label for="nameExLarge"
                                                                            class="form-label">Decision Maker
                                                                            Name</label>
                                                                        <input type="text"
                                                                            name="decision_maker_name"
                                                                            id="nameExLarge" class="form-control"
                                                                            placeholder="Decision Maker Name"
                                                                            value="{{ $value->decision_maker_name }}">
                                                                    </div>
                                                                    <div class="col mb-4">
                                                                        <label for="nameExLarge"
                                                                            class="form-label">Decicion Maker
                                                                            Number</label>
                                                                        <input type="number"
                                                                            name="decicion_maker_number"
                                                                            id="nameExLarge" class="form-control"
                                                                            placeholder="Decicion Maker Number"
                                                                            value="{{ $value->decicion_maker_number }}">
                                                                    </div>

                                                                </div>
                                                                <div class="row g-2">

                                                                    <div class="col mb-4">
                                                                        <label for="nameExLarge"
                                                                            class="form-label">Decicion Maker
                                                                            Email ID</label>
                                                                        <input type="email"
                                                                            name="decicion_maker_email"
                                                                            id="nameExLarge" class="form-control"
                                                                            placeholder="Decicion Maker Email ID"
                                                                            value="{{ $value->decicion_maker_email }}">
                                                                    </div>
                                                                    <div class="col mb-4">
                                                                        <label for="emailExLarge"
                                                                            class="form-label">Contact person
                                                                            Name</label>
                                                                        <input type="text" id="emailExLarge"
                                                                            class="form-control"
                                                                            placeholder="Contact person Name"
                                                                            name="contact_person_name"
                                                                            value="{{ $value->contact_person_name }}">
                                                                    </div>
                                                                    <div class="col mb-4">
                                                                        <label for="dobExLarge"
                                                                            class="form-label">Contact person
                                                                            Number</label>
                                                                        <input type="number" id="dobExLarge"
                                                                            class="form-control"
                                                                            placeholder="Contact person Number"
                                                                            name="contact_person_number"
                                                                            value="{{ $value->contact_person_number }}">
                                                                    </div>
                                                                    <div class="col mb-4">
                                                                        <label for="dobExLarge"
                                                                            class="form-label">Contact person
                                                                            Email ID</label>
                                                                        <input type="email" id="dobExLarge"
                                                                            class="form-control"
                                                                            name="contact_person_email"
                                                                            placeholder="Contact person Email ID"
                                                                            value="{{ $value->contact_person_email }}">
                                                                    </div>

                                                                    <div class="col mb-4">
                                                                        <label for="dobExLarge"
                                                                            class="form-label">Lead
                                                                            Date</label>
                                                                        <input type="date" id="dobExLarge"
                                                                            class="form-control" name="lead_date"
                                                                            placeholder="Lead Date"
                                                                            value="{{ $value->lead_date }}">
                                                                    </div>

                                                                </div>

                                                                <div class="row g-2">
                                                                <div class="col mb-4">
                                                                                <label for="dobExLarge"
                                                                                    class="form-label">             Sales Person Name</label>
                                                                                <input type="text" value="{{ $value->sales_person_name }}"
                                                                                    class="form-control"
                                                                                    name="sales_person_name"
                                                                                    placeholder="Sales person name">
                                                                            </div>
                                                                    <div class="col mb-4">
                                                                        <label for="dobExLarge"
                                                                            class="form-label">Service
                                                                            Type</label>
                                                                        <input type="text" id="dobExLarge"
                                                                            class="form-control" name="service_type"
                                                                            placeholder="Service Type"
                                                                            value="{{ $value->service_type }}">
                                                                    </div>
                                                                    <div class="col mb-4">
                                                                        <label for="dobExLarge"
                                                                            class="form-label">Volume</label>
                                                                        <input type="number" id="dobExLarge"
                                                                            class="form-control" name="volume"
                                                                            placeholder="Volume"
                                                                            value="{{ $value->volume }}">
                                                                    </div>
                                                                    <div class="col mb-4">
                                                                        <label for="dobExLarge"
                                                                            class="form-label">Lead
                                                                            Type</label>
                                                                        <input type="text" id="dobExLarge"
                                                                            class="form-control" name="lead_type"
                                                                            placeholder="Lead Type"
                                                                            value="{{ $value->lead_type }}">
                                                                    </div>
                                                                    <div class="col mb-4">
                                                                        <label for="dobExLarge"
                                                                            class="form-label">Status</label>
                                                                        <select name="status" id=""
                                                                            class="form-control">
                                                                            <option value="{{ $value->status }}">
                                                                                @if ($value->status == 'true')
                                                                                    Active ( Defualt )
                                                                                @else
                                                                                    Deactive ( Defualt )
                                                                                @endif
                                                                            </option>
                                                                            <option value="true">Active</option>
                                                                            <option value="false">Deactive</option>
                                                                        </select>
                                                                    </div>
                                                                </div>


                                                                <div class="row pt-3">
                                                                    <div class="col mb-0">
                                                                        <textarea name="office_address" id="" class="form-control" cols="30" rows="4"
                                                                            placeholder="Office Address"> 
                                                                            {{ $value->office_address ?? '' }}
                                                                        </textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-label-secondary"
                                                                    data-bs-dismiss="modal">Close</button>
                                                                <button type="submit"
                                                                    class="btn btn-primary">Save</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- end --}}
                                            @php
                                                $count++;
                                            @endphp
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

                                                                 <h5 class="text-center" style="margin-top: 16px;">Are You Want to Delete This Record ?</h5>
                                                                 <button type="button" class="btn btn-danger"
                                                                    data-bs-dismiss="modal" style="    margin-left: 106px;">No</button>
                                                                <button type="button" onclick="data_delete()"
                                                                    class="btn btn-success" data-bs-dismiss="modal">Yes</button>
                                                            </div>
                                                    </div>
                                                </div>
                                            </div>



                    {{-- view model --}}
                    <div class="modal fade" id="exLargeModals{{ $value->id ?? 'null' }}" tabindex="-1"
                        aria-hidden="true">
                        <div class="modal-dialog modal-xl" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel4">
                                        View Sales Leads</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <form id="aws" method="POST">
                                                                    <div class="modal-body">
                                                                        <div class="row">
                                                                            <div class="col mb-4">
                                                                                <label for="nameExLarge"
                                                                                    class="form-label">Company
                                                                                    Name</label>
                                                                                <input type="text"
                                                                                    name="company_name" id="nameExLarge"
                                                                                    class="form-control"
                                                                                    placeholder="Company Name" value="{{ $value->company_name ?? 'Default Company Name' }}" readonly>
                                                                            </div>
                                                                            <div class="col mb-4">
                                                                                <label for="nameExLarge"
                                                                                    class="form-label">Brand
                                                                                    Name</label>
                                                                                <input type="text" name="brand_name"
                                                                                    id="nameExLarge"
                                                                                    class="form-control"
                                                                                    placeholder="Brand Name" value="{{ $value->brand_name ?? 'Default Company Name' }}" readonly>
                                                                            </div>
                                                                            <div class="col mb-4">
                                                                                <label for="nameExLarge"
                                                                                    class="form-label">Vendor
                                                                                    Name</label>
                                                                                <input type="text" name="vendor_name"
                                                                                    id="nameExLarge"
                                                                                    class="form-control"
                                                                                    placeholder="Vendor Name" value="{{ $value->vendor_name ?? 'Default Company Name' }}" readonly>
                                                                            </div>
                                                                            <div class="col mb-4">
                                                                                <label for="nameExLarge"
                                                                                    class="form-label">Decision Maker
                                                                                    Name</label>
                                                                                <input type="text"
                                                                                    name="decision_maker_name"
                                                                                    id="nameExLarge"
                                                                                    class="form-control"
                                                                                    placeholder="Decision Maker Name" value="{{ $value->decision_maker_name ?? 'Default Company Name' }}" readonly>
                                                                            </div>

                                                                        </div>

                                                                        <div class="row g-2">


                                                                        <div class="col mb-4">
                                                                                <label for="nameExLarge"
                                                                                    class="form-label">Decicion Maker
                                                                                    Number</label>
                                                                                <input type="number"
                                                                                    name="decicion_maker_number"
                                                                                    id="nameExLarge"
                                                                                    class="form-control"
                                                                                    placeholder="Decicion Maker Number" value="{{ $value->decicion_maker_number ?? 'Default Company Name' }}" readonly>
                                                                            </div>
                                                                            <div class="col mb-4">
                                                                                <label for="nameExLarge"
                                                                                    class="form-label">Decicion Maker
                                                                                    Email ID</label>
                                                                                <input type="email"
                                                                                    name="decicion_maker_email"
                                                                                    id="nameExLarge"
                                                                                    class="form-control"
                                                                                    placeholder="Decicion Maker Email ID" value="{{ $value->decicion_maker_email ?? 'Default Company Name' }}" readonly>
                                                                            </div>


                                                                            <div class="col mb-4">
                                                                                <label for="emailExLarge"
                                                                                    class="form-label">Contact person
                                                                                    Name</label>
                                                                                <input type="text"
                                                                                    id="emailExLarge"
                                                                                    class="form-control"
                                                                                    placeholder="Contact person Name"
                                                                                    name="contact_person_name" value="{{ $value->contact_person_name ?? 'Default Company Name' }}" readonly>
                                                                            </div>
                                                                            <div class="col mb-4">
                                                                                <label for="dobExLarge"
                                                                                    class="form-label">Contact person
                                                                                    Number</label>
                                                                                <input type="number" id="dobExLarge"
                                                                                    class="form-control"
                                                                                    placeholder="Contact person Number"
                                                                                    name="contact_person_number" value="{{ $value->contact_person_number ?? 'Default Company Name' }}" readonly>
                                                                            </div>
                                                                            <div class="col mb-4">
                                                                                <label for="dobExLarge"
                                                                                    class="form-label">Contact person
                                                                                    Email ID</label>
                                                                                <input type="email" id="dobExLarge"
                                                                                    class="form-control"
                                                                                    name="contact_person_email"
                                                                                    placeholder="Contact person Email ID" value="{{ $value->contact_person_email ?? 'Default Company Name' }}" readonly>
                                                                            </div>


                                                                        </div>

                                                                        <div class="row g-2">
                                                                        <div class="col mb-4">
                                                                                <label for="dobExLarge"
                                                                                    class="form-label">             Sales Person Name</label>
                                                                                <input type="text" id="dobExLarge"
                                                                                    class="form-control"
                                                                                    name="sales_person_name"
                                                                                    placeholder="Sales person name" value="{{ $value->sales_person_name ?? 'Default Company Name' }}" readonly>
                                                                            </div>
                                                                            <div class="col mb-4">
                                                                                <label for="dobExLarge"
                                                                                    class="form-label">Lead
                                                                                    Date</label>
                                                                                <input type="date" id="dobExLarge"
                                                                                    class="form-control"
                                                                                    name="lead_date"
                                                                                    placeholder="Lead Date"value="{{ $value->lead_date  ?? 'Default Company Name' }}" readonly>
                                                                            </div>
                                                                            <div class="col mb-4">
                                                                                <label for="dobExLarge"
                                                                                    class="form-label">Service
                                                                                    Type</label>
                                                                                <input type="text" id="dobExLarge"
                                                                                    class="form-control"
                                                                                    name="service_type"
                                                                                    placeholder="Service Type" value="{{ $value->service_type ?? 'Default Company Name' }}" readonly>
                                                                            </div>
                                                                            <div class="col mb-4">
                                                                                <label for="dobExLarge"
                                                                                    class="form-label">Volume</label>
                                                                                <input type="number" id="dobExLarge"
                                                                                    class="form-control"
                                                                                    name="volume"
                                                                                    placeholder="Volume" value="{{ $value->volume ?? 'Default Company Name' }}" readonly>
                                                                            </div>
                                                                            <div class="col mb-4">
                                                                                <label for="dobExLarge"
                                                                                    class="form-label">Lead
                                                                                    Type</label>
                                                                                <input type="text" id="dobExLarge"
                                                                                    class="form-control"
                                                                                    name="lead_type"
                                                                                    placeholder="Lead Type" value="{{ $value->lead_type ?? 'Default Company Name' }}" readonly>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row pt-3">
                                                                            <div class="col mb-0">
                                                                                <textarea name="office_address" id="" class="form-control" cols="30" rows="4"
                                                                                    placeholder="Office Address" readonly> 
                                                                                    {{ $value->office_address ?? ' ' }}"
                                                                                </textarea>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button"
                                                                            class="btn btn-label-secondary"
                                                                            data-bs-dismiss="modal">Close</button>
                                                                        <button type="submit"
                                                                            class="btn btn-primary">Save
                                                                            changes</button>
                                                                    </div>
                                                                </form>
                            </div>
                        </div>
                    </div>
                    {{-- end --}}

                    <script>
                        function view(id)
                        {

                            var id = id;
                            alert(id);
                            $.ajax({
                                url: '{{url('view-sales')}}',
                                type: 'post',
                                data: {
                                    id:id,
                                    _token: '{{csrf_token()}}'
                                },
                                success: function(result)
                                {
                                    alert(result);
                                    // toastr.options = {
                                    // "closeButton": true,
                                    // "progressBar": true,
                                    // "timeOut": 15000
                                    // };
                                    // toastr.success(result);
                                    // jQuery('#row'+id).hide('slow');
                                }
                                });
                        }
                    </script>

                    <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            document.getElementById('aws').addEventListener('submit', function(e) {
                                e.preventDefault();

                                var csrfToken = document.head.querySelector('meta[name="csrf-token"]').content;
                                var formData = new FormData(this);


                                fetch("{{ url('create-sales') }}", {
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

                                                window.location.href = '{{ url('Sales') }}';
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


                                fetch("{{ url('update-sales') }}", {
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

                                            };
                                            toastr.success(data.message);
                                            setTimeout(function() {

                                                window.location.href = '{{ url('Sales') }}';
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




<!-- data delete ajax -->
<script>
    function deleteModal(id){
        var modal = $('#deleteModal');
        modal.data('id', id);
        modal.modal('show');
}

     function data_delete(){
        var id = $('#deleteModal').data('id');
            $.ajax({
                 url: '{{url('delete-sales')}}',
                 type: 'post',
                 data: {
                    id:id,
                    _token: '{{csrf_token()}}'
                 },
                 success: function(result) {
                     toastr.options = {
                      "closeButton": true,
                      "progressBar": true,
                      "timeOut": 15000
                     };
                    toastr.success(result);
                    jQuery('#row'+id).hide('slow');
                 }
                });
        }
</script>

 <!-- data filter -->
 <script>
    function Datafilter(){
        var from = $('#filterFrom').val();
        var to = $('#filterTo').val();
        var latest_oldest = $('#latest_oldest').val();

        $.ajax({
            url: '{{ url('sales-data-filter') }}',
            type: 'POST',
            data: {
                from: from,
                to: to,
                latest_oldest: latest_oldest,
                _token: '{{ csrf_token() }}'
            },
            success: function (result) {
                if(result=='')
                {
                    toastr.options = {
                      "closeButton": true,
                      "progressBar": true,
                      "timeOut": 15000
                    };
                    toastr.info('Data Not Found');
                }
                else
                {
                // remove old data rows
                $("table#example tbody").empty();

                $.each(result, function (key, value) {
                    if (value.status == 'true') {
                        status = '<span class="badge bg-success">Active</span>';
                    }  else {
                        status = '<span class="badge bg-danger">Deactive</span>';
                    }

                    var editButton = '<span data-bs-toggle="modal" data-bs-target="#exLargeModalss' + value.id + '"><i class="menu-icon tf-icons ti ti-edit"></i></span>';


                    var deleteButton = '<a href="#" onclick="deleteModal('+ value.id +')"><i  class="menu-icontf-icons ti ti-trash"></i></a>';

                    //  after get data put on table
                    $("table#example").append("<tr id='row" + value.id + "'><td>" + value.id + "</td><td>" + value.company_name + "</td><td>" + value.brand_name + "</td><td>" + value.vendor_name + "</td><td>" + value.decision_maker_name + "</td><td>" + value.decicion_maker_number + "</td><td>" + value.decicion_maker_email + "</td><td>" + status + "</td><td>" + editButton + deleteButton +"</td> </tr>");
                });
            }
            }
        });
    }
</script>

                    @include('layouts.footer')
