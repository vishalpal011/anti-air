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
                            <span class="text-muted fw-light">Reverse Bookings /</span> View Bookings / B2B Bookings
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
                                                    {{-- <h4 class="mb-2">{{ $deactive }}</h4> --}}
                                                    <p class="mb-0 fw-medium"> Un-Assigned Bookings</p>
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
                                                    {{-- <h4 class="mb-2">{{ $active }}</h4> --}}
                                                    <p class="mb-0 fw-medium">Assigned Bookings</p>
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
                                                    <div class="dropdown">
                                                        <button class="btn btn-secondary dropdown-toggle" type="button"
                                                            id="dropdownMenuButton" data-toggle="dropdown"
                                                            aria-haspopup="true" aria-expanded="false">
                                                            Create Booking
                                                        </button>
                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                            <a class="dropdown-item" href="{{ url('booking') }}"><i
                                                                    class="ti-md ti ti-plus text-body"></i> Create
                                                                Forword Orders</a>
                                                            <a class="dropdown-item"
                                                                href="{{ url('reverse-booking') }}"><i
                                                                    class="ti-md ti ti-plus text-body"></i> Create
                                                                Reverce Orders</a>
                                                        </div>
                                                    </div>
                                                    </p>
                                                </div>

                                            </div>

                                        </div>
                                        <div class="col-sm-6 col-lg-3 pt-2">
                                            <div
                                                class="d-flex justify-content-between align-items-start card-widget-2 border-end pb-3 pb-sm-0">
                                                <div>
                                                    {{-- <h4 class="mb-2">{{ $active }}</h4> --}}
                                                    <p class="mb-0 fw-medium">
                                                        <a href="{{ url('all-b2c-bookings') }}">
                                                            <button type="button" class="btn btn-primary">
                                                                All B2C Reverse Bookings
                                                            </button>
                                                        </a>
                                                    </p>
                                                </div>
                                            </div>
                                            <hr class="d-none d-sm-block d-lg-none">
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <!-- Order List Table -->
                        <div class="card p-3">
                            <div class="row p-3">
                                <div class="col-md-4" style="display: none;">
                                    <select name="status" class="form-control" id="statusDropdown">
                                        <option selected disabled>Select Status</option>
                                        <option value="true">Active</option>
                                        <option value="false">Deactive</option>
                                    </select>
                                </div>
                                <div class="col-md-8 filters-nav">
                                    <ul style="display:flex; list-style:none;">
                                        <li><button class="btn btn-primary" id="changeStatusButton">
                                                <i class="fa fa-check-square" aria-hidden="true"></i> &nbsp; Assign
                                                Courier Service
                                            </button>
                                        </li>
                                        {{-- <li>
                                            <button class="btn btn-primary" id="changeStatusButton">Select Courier
                                                Service</button>
                                        </li> --}}
                                        <li>
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                data-bs-target="#exLargeModal">
                                                <i class="fa fa-filter" aria-hidden="true"></i>&nbsp;Filter
                                            </button>
                                        </li>
                                        <li>
                                            <button class="btn btn-danger" id="deleteModalSubmitButton"><i
                                                    class="fa fa-trash" aria-hidden="true"></i> &nbsp; Delete</button>
                                        </li>
                                        <li>
                                            <a href="{{ url('reverse-booking-excel') }}"><button
                                                    class="btn btn-success"><i class="fa fa-file-excel"
                                                        aria-hidden="true"></i> &nbsp; Download Excel</button>
                                            </a>
                                        </li>
                                    </ul>
                                </div>


                            </div>
                            <div id="city"></div>
                            <div class="card-datatable table-responsive">

                                <table class="table" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th> <input type="checkbox" id="selectAllCheckbox"> </th>
                                            </th>
                                            <th>S.No.</th>
                                            <th>Order Number</th>
                                            <th>Order Type</th>
                                            <th>Clients</th>
                                            <th>warehouse</th>
                                            <th>Couriers</th>

                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($bookings as $value)
                                            <tr id="row{{ $value->id }}">
                                                <td><input type="checkbox" class="item-checkbox"
                                                        value="{{ $value->id }}"></td>
                                                <td>{{ $loop->iteration }}</td>
                                                <td> {{ $value->order_no }} </td>
                                                <td>{{ $value->transport_mode }}</td>
                                                <td>
                                                    {{ optional($value->clients)->first_name }}
                                                    {{ optional($value->clients)->last_name }}
                                                </td>
                                                <td>{{ optional($value->warehouses)->warehouse_name }}</td>
                                                <td>{{ optional($value->couriers)->courier_display_name }}</td>


                                                <td>
                                                    @if ($value->status == !null)
                                                        <span class="badge bg-success">Assign Request Sent</span>
                                                    @else
                                                        <span class="badge bg-warning">In Manifastation</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{ url('view-bookings') }}/{{ $value->id }}">
                                                        <i class='menu-icon tf-icons ti ti-eye'></i>
                                                    </a>
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
                                    <h5 class="modal-title" id="modalCenterTitle">Assign Courier</h5>
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
                    {{--  --}}


                    <script>
                        document.addEventListener('DOMContentLoaded', function () {
                        document.getElementById('changeStatusButton').addEventListener('click', function () {
                            var selectedCheckboxes = document.querySelectorAll('.item-checkbox:checked');

                            var selectedIds = Array.from(selectedCheckboxes).map(function (checkbox) {
                                return checkbox.value;
                            });

                            if (selectedIds.length > 0) {
                                var myModal = new bootstrap.Modal(document.getElementById('modalCenter'));
                                myModal.show();
                            }
                        });

                        // Handle "Select All" checkbox
                        document.getElementById('selectAllCheckbox').addEventListener('change', function () {
                            var checkboxes = document.querySelectorAll('.item-checkbox');
                            checkboxes.forEach(function (checkbox) {
                                checkbox.checked = document.getElementById('selectAllCheckbox').checked;
                            });
                        });

                        // Handle submit button click inside the modal
                        document.getElementById('modalSubmitButton').addEventListener('click', function () {
                            var selectedStatus = document.getElementById('statusDropdown').value;
                            var selectedCheckboxes = document.querySelectorAll('.item-checkbox:checked');
                            var selectedIds = Array.from(selectedCheckboxes).map(function (checkbox) {
                                return checkbox.value;
                            });

                            // selected data from form in modal
                            var modalFormData = document.getElementById('courierNameInput').value;
                            // end

                            if (selectedIds.length > 0) {
                                var url = '{{ route('assign-couriers-reverse-request') }}';

                                var myModal = new bootstrap.Modal(document.getElementById('modalCenter')); // Move this line here

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
                                                imageAlt: "Custom image"
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
                                            text: error.message, // Use the actual error message
                                            icon: 'error',
                                            confirmButtonText: 'Close'
                                        });
                                    })
                                    .finally(() => {
                                        myModal.hide();
                                    });
                            }
                        });

                        document.getElementById('deleteModalSubmitButton').addEventListener('click', function () {
                            var selectedCheckboxes = document.querySelectorAll('.item-checkbox:checked');
                            var selectedIds = Array.from(selectedCheckboxes).map(function (checkbox) {
                                return checkbox.value;
                            });

                            if (selectedIds.length > 0) {
                                var deleteUrl = '{{ route('delete-reverse-booking') }}';

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
                                                    window.location.href = 'all-reverse-booking';
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
