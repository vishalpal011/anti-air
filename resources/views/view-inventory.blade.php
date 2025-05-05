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
    <script src="assets/js/config.js"></script>
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

                        <h5 class="py-3 mb-2">
                            <span class="text-muted fw-light">AWB Stocks /</span> AWB Inventory
                        </h5>

                        <!-- Order List Widget -->

                        <div class="card mb-4">
                            <div class="card-widget-separator-wrapper">
                                <div class="card-body card-widget-separator">
                                    <div class="row gy-4 gy-sm-1">
                                        <div class="col-sm-6 col-lg-3">
                                            <div
                                                class="d-flex justify-content-between align-items-start card-widget-1 border-end pb-3 pb-sm-0">
                                                <div>
                                                    <h4 class="mb-2">{{ $pending }}</h4>
                                                    <p class="mb-0 fw-medium">Un used Air Way Bills</p>
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
                                                    <h4 class="mb-2">{{ $used }}</h4>
                                                    <p class="mb-0 fw-medium">Used Air Way Bills</p>
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
                                                class="d-flex justify-content-between align-items-start border-end pb-3 pb-sm-0 card-widget-3">
                                                <div>
                                                    <h4 class="mb-2">{{ $user }}</h4>
                                                    <p class="mb-0 fw-medium">Users</p>
                                                </div>
                                                <span class="avatar p-2 me-sm-4">
                                                    <span class="avatar-initial bg-label-secondary rounded"><i
                                                            class="ti-md ti ti-user text-body"></i></span>
                                                </span>
                                            </div>
                                        </div>
                                        {{-- <div class="col-sm-6 col-lg-3">
                                            <div class="d-flex justify-content-between align-items-start">
                                                <div>
                                                    <h4 class="mb-2">32</h4>
                                                    <p class="mb-0 fw-medium">Failed</p>
                                                </div>
                                                <span class="avatar p-2">
                                                    <span class="avatar-initial bg-label-secondary rounded"><i
                                                            class="ti-md ti ti-alert-octagon text-body"></i></span>
                                                </span>
                                            </div>
                                        </div> --}}
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Order List Table -->
                        <div class="card p-2">
                            <div class="card-datatable table-responsive">
                                <!-- filter section -->
                                <br>
                                <div class="container">
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
                                            <button type="button" onclick="Datafilter()"
                                                class="btn btn-primary">Filter</button>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <!-- filter section end -->
                                <table id="example" class="display nowrap" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Client</th>
                                            <th>AWB Type</th>

                                            <th>View AWD Codes</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $value)
                                            <tr id="row{{ $value->id }}">
                                                <td>{{ optional($value->Clients)->first_name }}
                                                    {{ optional($value->Clients)->last_name }}</td>
                                                <td>{{ $value->waybill_type }}</td>

                                                <td><a href="{{ url('download-awbcodes') }}/{{ $value->user_id }}"><img
                                                            src="images/excel.jpg" alt="" height="30"></a>
                                                </td>
                                                <td>
                                                    <a data-bs-toggle="modal"
                                                        data-bs-target="#basicModals{{ $value->id }}">
                                                        <i class='menu-icon tf-icons ti ti-edit'></i>
                                                    </a>
                                                    &nbsp;
                                                    <a href="#" onclick="deleteModal({{ $value->id }})">
                                                        <i class='menu-icon tf-icons ti ti-trash'></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            <div class="modal fade" id="basicModals{{ $value->id }}" tabindex="-1"
                                                aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel1">
                                                                Edit AWB Inventory</h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <form action="{{ url('update-awb-inventory') }}"
                                                            method="post">
                                                            @csrf
                                                            <div class="modal-body">
                                                                <div class="row g-2">

                                                                    <div class="col mb-6">
                                                                        <label for="select2Basic"
                                                                            class="form-label">Clients</label>
                                                                        <select name="user" id="select2Basic"
                                                                            class="select2 form-select form-select-lg"
                                                                            data-allow-clear="true">
                                                                            <option value="{{ $value->user_id }}"
                                                                                selected>
                                                                                {{ optional($value->Clients)->first_name }}
                                                                                {{ optional($value->Clients)->last_name }}
                                                                                (Default Selected)</option>
                                                                            @foreach ($userdata as $val)
                                                                                <option value="{{ $val->client_id }}">
                                                                                    {{ $val->first_name }}
                                                                                    {{ $val->last_name }}
                                                                                </option>
                                                                            @endforeach
                                                                        </select>
                                                                        <input type="text" hidden name="id"
                                                                            value="{{ $value->id }}">

                                                                        <input type="text" hidden name="update_id"
                                                                            value="{{ $value->user_id }}">
                                                                    </div>
                                                                    <div class="col mb-6">
                                                                        <label for="form-label">AWB Type</label>
                                                                        <input type="text" name="awb_type"
                                                                            class="form-control"
                                                                            value="{{ $value->waybill_type }}">
                                                                    </div>

                                                                </div>



                                                                <div class="col mt-2 pt-4">
                                                                    <div class="form-check form-check-inline">
                                                                        <input name="cod" class="form-check-input"
                                                                            type="checkbox" value="on"
                                                                            id="cod"
                                                                            {{ $value->cod == 'on' ? 'checked' : '' }}>
                                                                        <label class="form-check-label"
                                                                            for="cod">
                                                                            COD
                                                                        </label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline">

                                                                        <input name="prepaid" class="form-check-input"
                                                                            type="checkbox" value="on"
                                                                            id="Prepaid"
                                                                            {{ $value->prepaid == 'on' ? 'checked' : '' }}>
                                                                        <label class="form-check-label"
                                                                            for="Prepaid">
                                                                            Prepaid
                                                                        </label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline">

                                                                        <input name="rvp" class="form-check-input"
                                                                            type="checkbox" value="on"
                                                                            id="RVP"
                                                                            {{ $value->rvp == 'on' ? 'checked' : '' }}>
                                                                        <label class="form-check-label"
                                                                            for="RVP">
                                                                            RVP
                                                                        </label>
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
                                        @endforeach
                                    </tbody>

                                </table>
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

                    <!-- Footer -->
                    <script>
                        var timeoutId;
                        document.getElementById('userInput').addEventListener('input', function(event) {
                            clearTimeout(timeoutId);

                            // Delay the AJAX request by 500 milliseconds after the user stops typing
                            timeoutId = setTimeout(function() {
                                var userInput = event.target.value;

                                // Send an AJAX request to retrieve data
                                fetch('/get-awb-users?code=' + userInput)
                                    .then(response => response.json())
                                    .then(data => {
                                        console.log(data);

                                        // Clear existing data
                                        document.getElementById('usersContainer').innerHTML = '';



                                        // Loop through each user and display their information
                                        data.data.forEach(user => {
                                            var userContainer = document.createElement('div');
                                            userContainer.className = 'user-info';

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

                                            var nameId = user.nam;
                                            var codeId = user.code;

                                            document.getElementById('usersContainer').appendChild(
                                                userContainer);

                                        });

                                        document.getElementById('card').style.display = 'block';
                                    })

                            }, 500);
                        });
                    </script>
                    <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            document.getElementById('aws').addEventListener('submit', function(e) {
                                e.preventDefault();

                                var csrfToken = document.head.querySelector('meta[name="csrf-token"]').content;
                                var formData = new FormData(this);


                                fetch("{{ url('creat-aws-stock') }}", {
                                        method: "POST",
                                        body: formData,
                                        headers: {
                                            'X-CSRF-TOKEN': csrfToken,
                                        },
                                    })
                                    .then(response => response.json())
                                    .then(data => {

                                        if (data.status === 'success') {

                                            window.location.href = "{{ url('create-awb') }}";
                                        } else {

                                        }
                                    })

                            });
                        });
                    </script>


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
                                url: '{{ url('delete-awb-inventory') }}',
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
                                    toastr.success('AWB-Inventory deleted');
                                    jQuery('#row' + id).hide('slow');
                                }
                            });
                        }
                    </script>


                    <!-- data filter -->
                    <script>
                        function Datafilter() {
                            var from = $('#filterFrom').val();
                            var to = $('#filterTo').val();
                            var latest_oldest = $('#latest_oldest').val();

                            $.ajax({
                                url: '{{ url('awb-filter-data') }}',
                                type: 'POST',
                                data: {
                                    from: from,
                                    to: to,
                                    latest_oldest: latest_oldest,
                                    _token: '{{ csrf_token() }}'
                                },
                                success: function(result) {
                                    if (result == '') {
                                        toastr.options = {
                                            "closeButton": true,
                                            "progressBar": true,
                                            "timeOut": 15000
                                        };
                                        toastr.info('Data Not Found');
                                    } else {
                                        // remove old data rows
                                        $("table#example tbody").empty();

                                        $.each(result, function(key, value) {

                                            var excel = '<a href="download-awbcodes/' + value.user_id +
                                                '"><img src="images/excel.jpg"  height="30"></a>';


                                            var editButton =
                                                '<span data-bs-toggle="modal" data-bs-target="#basicModals' + value.id +
                                                '"><i class="menu-icon tf-icons ti ti-edit"></i></span>';


                                            var deleteButton = '<a href="#" onclick="deleteModal(' + value.id +
                                                ')"><i  class="menu-icontf-icons ti ti-trash"></i></a>';


                                            //  after get data put on table
                                            $("table#example").append("<tr id='row" + value.id + "'><td>" + value
                                                .user_id + "</td><td>" + value.waybill_type + "</td><td>" + value
                                                .cod + "</td><td>" + value.prepaid + "</td> <td>" + value.rvp +
                                                "</td><td>" + excel + "</td><td>" + editButton + deleteButton +
                                                "</td></tr>");
                                        });
                                    }
                                }
                            });
                        }
                    </script>



                    @include('layouts.footer')
