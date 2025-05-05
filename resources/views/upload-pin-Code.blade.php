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
    <link rel="stylesheet" href="assets/vendor/libs/select2/select2.css" />
    <link rel="stylesheet" href="assets/vendor/libs/tagify/tagify.css" />
    <link rel="stylesheet" href="assets/vendor/libs/bootstrap-select/bootstrap-select.css" />
    <link rel="stylesheet" href="assets/vendor/libs/typeahead-js/typeahead.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css"
        integrity="sha512-6S2HWzVFxruDlZxI3sXOZZ4/eJ8AcxkQH1+JjSe/ONCEqR9L4Ysq5JdT5ipqtzU7WHalNwzwBv+iE51gNHJNqQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />


</head>
<style>
    .custom-option-icon .custom-option-content {
        text-align: center;
        padding: 6px;
    }

    .limited-paragraph {
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        max-width: 300px;
        /* Adjust the maximum width as needed */
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
                            <span class="text-muted fw-light">Location /</span>Upload pin code
                        </h4>
                        <div class="card mb-4">
                            <div class="card-widget-separator-wrapper">
                                <div class="card-body card-widget-separator">
                                    <div class="row gy-4 gy-sm-1">
                                        <div class="col-sm-6 col-lg-3">
                                            <div
                                                class="d-flex justify-content-between align-items-start card-widget-1 border-end pb-3 pb-sm-0">
                                                <div>
                                                    <h4 class="mb-2">{{ $total_serviceable_pin }}</h4>
                                                    <p class="mb-0 fw-medium">Total Serviceable Pincodes</p>
                                                </div>
                                                <span class="avatar me-sm-4">
                                                    <span class="avatar-initial bg-label-secondary rounded">
                                                        <i class="ti-md ti ti-calendar-stats text-body"></i>
                                                    </span>
                                                </span>
                                            </div>
                                            <hr class="d-none d-sm-block d-lg-none me-4">
                                        </div>
                                        {{-- <div class="col-sm-6 col-lg-3">
                                            <div class="d-flex justify-content-between align-items-start card-widget-2 border-end pb-3 pb-sm-0">
                                                <div>
                                                    <h4 class="mb-2">{{$total_serviceable_pin}}</h4>
                                                    <p class="mb-0 fw-medium">Used Air Way Bills</p>
                                                </div>
                                                <span class="avatar p-2 me-lg-4">
                                                    <span class="avatar-initial bg-label-secondary rounded"><i class="ti-md ti ti-checks text-body"></i></span>
                                                </span>
                                            </div>
                                            <hr class="d-none d-sm-block d-lg-none">
                                        </div> --}}
                                        <div class="col-sm-6 col-lg-3">
                                            <div
                                                class="d-flex justify-content-between align-items-start border-end pb-3 pb-sm-0 card-widget-3">
                                                <div>
                                                    <h4 class="mb-2">1</h4>
                                                    <p class="mb-0 fw-medium">Users</p>
                                                </div>
                                                <span class="avatar p-2 me-sm-4">
                                                    <span class="avatar-initial bg-label-secondary rounded"><i
                                                            class="ti-md ti ti-user text-body"></i></span>
                                                </span>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Order List Widget -->

                        <div class="card mb-4">
                            <div class="card-widget-separator-wrapper">
                                <div class="card-body card-widget-separator">
                                    <div class="row gy-4 gy-sm-1">

                                        <div class="col-sm-6 col-lg-3">
                                            <div
                                                class="d-flex justify-content-between align-items-start card-widget-2 border-end pb-3 pb-sm-0">
                                                <div>
                                                    <h4 class="mb-2"> </h4>
                                                    <p class="mb-0 fw-medium">
                                                        <button type="button" class="btn btn-sm btn-primary"
                                                            data-bs-toggle="modal" data-bs-target="#largeModal"><i
                                                                class='menu-icon tf-icons ti ti-location'></i>Add New
                                                        </button>
                                                        <button type="button" id="deleteButton"
                                                            class="btn btn-sm btn-danger"><i
                                                                class='menu-icon tf-icons ti ti-trash'></i>Delete
                                                        </button>
                                                    </p>
                                                    <div class="modal fade" id="largeModal" tabindex="-1"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog modal-lg" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel3">
                                                                        Add
                                                                        New Upload pin code</h5>
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal"
                                                                        aria-label="Close"></button>
                                                                </div>
                                                                <form id="aws" method="post"
                                                                    enctype="multipart/form-data">
                                                                    <div class="modal-body">
                                                                        <div class="row">
                                                                            <div class="col-md-6">
                                                                                <label for="select2Basic"
                                                                                    class="form-label">Clients</label>
                                                                                <select name="client"
                                                                                    id="select2Basic"
                                                                                    class="select2 form-select form-select-lg"
                                                                                    data-allow-clear="true">
                                                                                    <option selected disabled>Search For
                                                                                        Clients</option>
                                                                                    @foreach ($client as $val)
                                                                                        <option
                                                                                            value="{{ $val->id }}">
                                                                                            {{ $val->first_name }}
                                                                                            {{ $val->last_name }}
                                                                                        </option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <label for="select2Basics"
                                                                                    class="form-label">Couriers</label>
                                                                                <select name="courier"
                                                                                    id="select2Basics"
                                                                                    class="select2 form-select form-select-lg"
                                                                                    data-allow-clear="true" required>
                                                                                    <option selected disabled>Search For
                                                                                        Courier</option>
                                                                                    @foreach ($courier as $val)
                                                                                        <option
                                                                                            value="{{ $val->id }}">
                                                                                            {{ $val->courier_display_name }}
                                                                                        </option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row pt-3">
                                                                            <div class="col-md-6">
                                                                                <label for="">Upload
                                                                                    Excel</label>
                                                                                <input type="file" name="file"
                                                                                    class="form-control"
                                                                                    placeholder="Enter Pin code"
                                                                                    required>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button"
                                                                            class="btn btn-label-secondary"
                                                                            data-bs-dismiss="modal">Close</button>
                                                                        <button type="submit"
                                                                            class="btn btn-primary">Upload</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>

                                        </div>
                                        {{-- export --}}
                                        <div class="col-sm-6 col-lg-3">
                                            <div
                                                class="d-flex justify-content-between align-items-start card-widget-2 border-end pb-3 pb-sm-0">
                                                <div>
                                                    <h4 class="mb-2"> </h4>
                                                    <p class="mb-0 fw-medium">

                                                    <div class="modal fade" id="basicModal" tabindex="-1"
                                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">
                                                                        Export Excel Courierswise </h5>
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal"
                                                                        aria-label="Close"></button>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>

                                                    <button type="button" class="btn btn-sm btn-warning"
                                                        id="toggleButton">
                                                        <i class="fa fa-file-excel" aria-hidden="true"></i> &nbsp; Export
                                                    </button>
                                                    <div id="successDiv" style="display: none">
                                                        <form action="{{ url('export-pins') }}" method="get">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <label for="statusDropdown"
                                                                        class="form-label">Status</label>
                                                                    <select class="form-select" name="courier_id"
                                                                        id="statusDropdown"
                                                                        aria-label="Select status">
                                                                        <option disabled selected>Select Status
                                                                        </option>
                                                                        <option value="all">All</option>
                                                                        @foreach ($courier as $couriers)
                                                                            <option value="{{ $couriers->id }}">
                                                                                {{ $couriers->courier_display_name }}
                                                                            </option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <button type="submit"
                                                                        class="btn btn-primary">Download</button>
                                                                </div>
                                                            </div>
                                                        </form>


                                                    </div>

                                                    </p>

                                                </div>

                                            </div>

                                        </div>


                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Order List Table -->
                        <div class="card p-3">
                            <div class="table-responsive text-nowrap">
                                <table class="table">
                                    <thead class="table-dark">
                                        <tr>
                                            <th><input type="checkbox" id="selectAllCheckbox"></th>
                                            <th>S.No.</th>
                                            <th>client</th>
                                            <th>courier</th>
                                            <th>Pin Code</th>
                                            <th>Short Code</th>
                                            <th>Value Capping</th>
                                            <th>COD</th>
                                            <th>Pre Paid</th>
                                            <th>Reverse Pickup</th>
                                            <th>Surface</th>
                                            <th>Air</th>
                                            <th>Code Priority</th>
                                            <th>pppriority</th>
                                            {{-- <th>Status</th>
                                            <th>Action</th> --}}
                                        </tr>
                                    </thead>
                                    <tbody class="table-border-bottom-0">
                                        @php
                                            $count = 1;
                                        @endphp
                                        @foreach ($data as $value)
                                            <tr>
                                                <td><input type="checkbox" class="item-checkbox"
                                                        value="{{ $value->id }}"> </td>
                                                <td>
                                                    {{ $count }}
                                                </td>
                                                <td>
                                                    @if ($value->clients)
                                                        {{ $value->clients->first_name }}
                                                        {{ $value->clients->last_name }}
                                                    @else
                                                        No client associated
                                                    @endif
                                                </td>

                                                <td>
                                                    @if ($value->couriers)
                                                        {{ $value->couriers->courier_display_name }}
                                                        ({{ $value->couriers->courier_id }})
                                                    @else
                                                        No client associated
                                                    @endif
                                                </td>
                                                <td>{{ $value->pincode }}</td>
                                                <td>{{ $value->shortcode }}</td>
                                                <td>{{ $value->valuecappings }}</td>
                                                <td>{{ $value->cod }}</td>
                                                <td>{{ $value->prepaid }}</td>
                                                <td>{{ $value->reverse_pickup }}</td>
                                                <td>{{ $value->surface }}</td>
                                                <td>{{ $value->air }}</td>
                                                <td>{{ $value->codepriority }}</td>
                                                <td>{{ $value->pppriority }}</td>
                                                {{-- <td>
                                                    @if ($value->status == 'true')
                                                        <span class="badge bg-success">Active</span>
                                                    @else
                                                        <span class="badge bg-danger">Deactive</span>
                                                    @endif
                                                </td> --}}
                                                {{-- <td>
                                                    <a data-bs-toggle="modal"
                                                        data-bs-target="#largeModals{{ $value->id }}">
                                                        <i class='menu-icon tf-icons ti ti-edit'></i>
                                                    </a>
                                                    &nbsp;
                                                    <!-- <a href="{{ url('delete-service-center') }}/{{ $value->id }}">
                                                        <i class='menu-icon tf-icons ti ti-trash'></i>
                                                    </a> -->

                                                    <a href="#" onclick="deleteFunction({{ $value->id }})">
                                                        <i class='menu-icon tf-icons ti ti-trash'></i>
                                                    </a>
                                                </td> --}}
                                            </tr>
                                            <div class="modal fade" id="largeModals{{ $value->id }}"
                                                tabindex="-1" aria-hidden="true">
                                                <div class="modal-dialog modal-lg" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel3">Edit
                                                                Upload pin code</h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <form id="update" method="post">
                                                            <div class="modal-body">
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <input type="text" class="form-control"
                                                                            name="service_code"
                                                                            placeholder="Service Code"
                                                                            value="{{ $value->service_code }}">
                                                                        <input type="text" hidden name="id"
                                                                            value="{{ $value->id }}">
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <input type="text" class="form-control"
                                                                            name="service_name"
                                                                            placeholder="Service Name"
                                                                            value="{{ $value->service_name }}">
                                                                    </div>
                                                                </div>
                                                                <div class="row pt-3">
                                                                    <div class="col-md-6">
                                                                        <label for="">Pin code</label>
                                                                        <input type="text" id="pincode"
                                                                            name="pincode" class="form-control"
                                                                            placeholder="Enter Pin code"
                                                                            value="{{ $value->pincode }}">
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <label for="">City</label>
                                                                        <input type="text" name="city_name"
                                                                            class="form-control"
                                                                            placeholder="City Name" id="city"
                                                                            value="{{ $value->city_name }}">
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <label for="">State</label>
                                                                        <input type="text" name="state"
                                                                            class="form-control"
                                                                            placeholder="State Name" id="state"
                                                                            value="{{ $value->state }}">
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <label for="">Region</label>
                                                                        <input type="text" name="region"
                                                                            class="form-control"
                                                                            placeholder="City Name" id="regions"
                                                                            value="{{ $value->region }}">
                                                                    </div>
                                                                </div>
                                                                <div class="row pt-3">
                                                                    <div class="col-md-12">
                                                                        <textarea name="center_address" id="" cols="30" rows="4" class="form-control"
                                                                            placeholder="Your Placeholder Text">
                                                                        {{ $value->center_address }}
                                                                    </textarea>
                                                                    </div>

                                                                </div>
                                                                <div class="row pt-3">
                                                                    <div class="col-md-12">
                                                                        <select name="status" class="form-control"
                                                                            id="">
                                                                            <option value="true">Active</option>
                                                                            <option value="false">Deactive</option>
                                                                        </select>
                                                                    </div>

                                                                </div>

                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-label-secondary"
                                                                    data-bs-dismiss="modal">Close</button>
                                                                <button type="submit"
                                                                    class="btn btn-primary">Upload</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            @php
                                                $count++;
                                            @endphp
                                        @endforeach
                                    </tbody>

                                </table>
                            </div>
                        </div>

                    </div>
                    <!-- / Content -->
                    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
                    <!-- Footer -->

                    {{-- bulk Delete js --}}

                    <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            // Handle delete button click
                            document.getElementById('deleteButton').addEventListener('click', function() {
                                var selectedCheckboxes = document.querySelectorAll('.item-checkbox:checked');
                                var selectedIds = Array.from(selectedCheckboxes).map(function(checkbox) {
                                    return checkbox.value;
                                });
                                if (selectedIds.length > 0) {
                                    var deleteUrl =
                                        '{{ url('delete-upload-pins') }}'; // Replace with your actual delete route

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
                                                Swal.fire({
                                                    title: data.status,
                                                    text: data.message,
                                                    imageUrl: "https://anteair.blivmi.com/images/success.gif",
                                                    imageWidth: 400,
                                                    imageHeight: 240,
                                                    imageAlt: "Custom image",
                                                    didClose: () => {
                                                        window.location.href = 'upload-pin-Code';
                                                    }
                                                });
                                            } else {
                                                Swal.fire({
                                                    title: 'Error!',
                                                    text: data.message,
                                                    icon: 'error',
                                                    confirmButtonText: 'Close',
                                                    didClose: () => {
                                                        window.location.href = 'upload-pin-Code';
                                                    }
                                                });
                                            }
                                        })
                                        .catch(error => {
                                            Swal.fire({
                                                title: 'Error!',
                                                text: error.message, // Use the actual error message
                                                icon: 'error',
                                                confirmButtonText: 'Close'
                                            });
                                        });
                                }


                            });

                            // Handle "Select All" checkbox
                            document.getElementById('selectAllCheckbox').addEventListener('change', function() {
                                var checkboxes = document.querySelectorAll('.item-checkbox');
                                checkboxes.forEach(function(checkbox) {
                                    checkbox.checked = document.getElementById('selectAllCheckbox').checked;
                                });
                            });
                        });
                    </script>

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


                    {{-- end --}}

                    {{-- <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            document.getElementById('aws').addEventListener('submit', function(e) {
                                e.preventDefault();

                                var csrfToken = document.head.querySelector('meta[name="csrf-token"]').content;
                                var formData = new FormData(this);

                                fetch("{{ url('create-upload-pin') }}", {
                                        method: "POST",
                                        body: formData,
                                        headers: {
                                            'X-CSRF-TOKEN': csrfToken,
                                        },
                                    })
                                    .then(response => response.json())
                                    .then(data => {
                                        if (data.status === 'success') {



                                            // toastr.options = {
                                            //     "closeButton": true,

                                            // };
                                            toastr.success(data.message);
                                            setTimeout(function() {

                                                window.location.href = '{{ url('upload-pin-Code') }}';
                                            }, 2000);
                                        } else {
                                            alert("Okk Report h ");
                                            // toastr.options = {
                                            //     "closeButton": true,

                                            // };
                                            // toastr.warning(data.message);
                                            // setTimeout(function() {

                                            //     window.location.href='{{ url('') }}';
                                            // }, 4000);
                                        }
                                    })


                            });
                        });
                    </script> --}}

                    <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            document.getElementById('aws').addEventListener('submit', function(e) {
                                e.preventDefault();

                                var csrfToken = document.head.querySelector('meta[name="csrf-token"]').content;
                                var formData = new FormData(this);


                                fetch("{{ url('create-upload-pin') }}", {
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

                                                window.location.href = '{{ url('upload-pin-Code') }}';
                                            }, 2000);
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

                    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
                    <script src="assets/vendor/libs/select2/select2.js"></script>
                    <script src="assets/vendor/libs/tagify/tagify.js"></script>
                    <script src="assets/vendor/libs/bootstrap-select/bootstrap-select.js"></script>
                    <script src="assets/vendor/libs/typeahead-js/typeahead.js"></script>
                    <script src="assets/vendor/libs/bloodhound/bloodhound.js"></script>

                    <!-- Main JS -->
                    <script src="assets/js/main.js"></script>


                    <!-- Page JS -->
                    <script src="assets/js/forms-selects.js"></script>
                    <script src="assets/js/forms-tagify.js"></script>
                    <script src="assets/js/forms-typeahead.js"></script>
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"
                        integrity="sha512-lbwH47l/tPXJYG9AcFNoJaTMhGvYWhVM9YI43CT+uteTRRaiLCui8snIgyAN8XWgNjNhCqlAUdzZptso6OCoFQ=="
                        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
