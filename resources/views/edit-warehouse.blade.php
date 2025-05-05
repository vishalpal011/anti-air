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
    <link rel="icon" type="image/x-icon" href="https://demos.pixinvent.com/vuexy-html-admin-template/assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&amp;ampdisplay=swap" rel="stylesheet">

    <!-- Icons -->
    <link rel="stylesheet" href="assets/vendor/fonts/fontawesome.css" />
    <link rel="stylesheet" href="assets/vendor/fonts/tabler-icons.css"/>
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
                            <span class="text-muted fw-light">warehouse /</span> Edit warehouse
                        </h5>
                        <!-- <h6> Create Courier </h6> -->
                        <form id="aws" method="POST">
                            <div class="row bg-white p-2">
                                <input type="hidden" name="id" value="{{$data->id}}">
                                <div class="col-md-4">
                                    {{-- <label for="">Client</label>
                                    <select name="client" class="form-control" required>

                                      <option value="{{$data->client_id}}" selected>{{$data->client->first_name}} {{$data->client->last_name}} (Default Selected)</option>
                                      @foreach($client as $clients)
                                        <option value="{{$clients->id}}">{{$clients->first_name}} {{$clients->last_name}}</option>
                                      @endforeach
                                    </select> --}}

                                    <label for="select2Basic" class="form-label">Basic</label>
                                    <select name="client" id="select2Basic" class="select2 form-select form-select-lg"
                                        data-allow-clear="true">
                                        <option selected disabled="disabled">--Select Clients--</option>
                                        <option value="{{$data->client_id}}" selected>{{$data->client->first_name}} {{$data->client->last_name}} (Default Selected)</option>
                                        @foreach ($client as $clients)
                                            <option value="{{ $clients->id }}">{{ $clients->first_name }}
                                                {{ $clients->last_name }}</option>
                                        @endforeach


                                    </select>

                                </div>
                                <div class="col-md-4">
                                    <label for="">Business Name</label>
                                    <input type="text" class="form-control" value="{{$data->business_name}}" name="business_name" placeholder="Business Name" required>

                                </div>
                                <div class="col-md-4">
                                    <label for="">warehouse Name</label>
                                    <input type="text"  class="form-control" value="{{$data->warehouse_name}}" name="warehouse_name"  placeholder="warehouse Name" required>
                                </div>
                                <div class="col-md-4 pt-3">
                                    <label for="">warehouse Phone Number</label>
                                    <input type="number" class="form-control" value="{{$data->warehouse_phone}}" name="warehouse_phone_number"  placeholder="warehouse Phone Number" required>
                                </div>
                                <div class="col-md-4 pt-3">
                                    <label for="">Pin Code</label>
                                    <input type="number"  class="form-control" value="{{$data->pin_code}}"  name="courier_rates"  placeholder="Pin Code" required>
                                </div>
                                <div class="col-md-4 pt-3">
                                    <label for="">State</label>
                                    <input type="text" class="form-control" name="state" value="{{$data->state}}" placeholder="State" required>
                                </div>
                                <div class="col-md-4 pt-3">
                                    <label for="">City</label>
                                    <input type="text"  class="form-control" name="city" value="{{$data->city}}" placeholder="City" required>
                                </div>
                                <div class="col-md-4 pt-3">
                                    <label for="">Full Address</label>
                                    <input type="text"  class="form-control" name="address" value="{{$data->address}}" placeholder="Full Address" required>
                                </div>

                                <div class="col-md-4 pt-3">
                                    <label for="">Status</label>
                                     <select name="status" class="form-control">
                                        <option value="{{$data->status}}" selected>
                                            @if($data->status == 'true')
                                                Active (Default Selected)
                                            @else
                                                Deactive (Default Selected)
                                            @endif
                                        </option>
                                        <option value="true">Active</option>
                                        <option value="false">Deactive</option>

                                     </select>
                                </div>


                                <div class="col-md-4 pt-3">
                                    <button class="btn btn-primary">Upload</button>
                                </div>


                            </div>
                        </form>
                    </div>
                    <!-- / Content -->

                    <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            document.getElementById('aws').addEventListener('submit', function(e) {
                                e.preventDefault();

                                var csrfToken = document.head.querySelector('meta[name="csrf-token"]').content;
                                var formData = new FormData(this);


                                fetch("{{ url('update-warehouse') }}", {
                                        method: "POST",
                                        body: formData,
                                        headers: {
                                            'X-CSRF-TOKEN': csrfToken,
                                        },
                                    })
                                    .then(response => response.json())
                                    .then(data => {
                                        console.log(data);
                                        if (data.status === 'success')
                                        {

                                            toastr.options = {
                                                "closeButton": true,
                                                "progressBar": true,
                                                "timeOut": 15000
                                            };
                                            toastr.success(data.message);
                                            setTimeout(function() {

                                                window.location.href = '{{ url('view-warehouses') }}';
                                            }, 2500);

                                        }
                                        else
                                        {
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js" integrity="sha512-lbwH47l/tPXJYG9AcFNoJaTMhGvYWhVM9YI43CT+uteTRRaiLCui8snIgyAN8XWgNjNhCqlAUdzZptso6OCoFQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<!-- Page JS -->
<script src="assets/js/forms-selects.js"></script>
<script src="assets/js/forms-tagify.js"></script>
<script src="assets/js/forms-typeahead.js"></script>
