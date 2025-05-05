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

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css"
        integrity="sha512-6S2HWzVFxruDlZxI3sXOZZ4/eJ8AcxkQH1+JjSe/ONCEqR9L4Ysq5JdT5ipqtzU7WHalNwzwBv+iE51gNHJNqQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- toster alert link -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    @include('layouts.links')
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
                            <span class="text-muted fw-light">warehouse /</span> Create warehouse
                        </h5>
                        <!-- <h6> Create Courier </h6> -->
                        <form id="aws" method="POST">
                            <div class="row bg-white p-2">
                                <div class="col-md-4">




                                    <label for="select2Basic" class="form-label">Basic</label>
                                    <select name="client" id="select2Basic" class="select2 form-select form-select-lg"
                                        data-allow-clear="true">
                                        <option selected disabled="disabled">--Select Clients--</option>
                                        @foreach ($client as $clients)
                                            <option value="{{ $clients->id }}">{{ $clients->first_name }}
                                                {{ $clients->last_name }}</option>
                                        @endforeach


                                    </select>



                                </div>
                                <div class="col-md-4">
                                    <label for="">Business Name</label>
                                    <input type="text" class="form-control" name="business_name"
                                        placeholder="Business Name" required>

                                </div>
                                <div class="col-md-4">
                                    <label for="">warehouse Name</label>
                                    <input type="text" class="form-control" name="warehouse_name"
                                        placeholder="warehouse Name" required>
                                </div>
                                <div class="col-md-4 pt-3">
                                    <label for="">warehouse Phone Number</label>
                                    <input type="number" class="form-control" name="warehouse_phone_number"
                                        placeholder="warehouse Phone Number" required>
                                </div>
                                <div class="col-md-4 pt-3">
                                    <label for="">Pin Code</label>
                                    <input type="number" id="pincode" class="form-control" name="courier_rates"
                                        placeholder="Pin Code" required>
                                </div>
                                <div class="col-md-4 pt-3">
                                    <label for="">State</label>
                                    <input type="text" class="form-control" id="state" name="state" placeholder="State"
                                        required>
                                </div>
                                <div class="col-md-4 pt-3">
                                    <label for="">City</label>
                                    <input type="text" class="form-control" id="city" name="city" placeholder="City"
                                        required>
                                </div>
                                <div class="col-md-4 pt-3">
                                    <label for="">Full Address</label>
                                    <input type="text" class="form-control" name="address"
                                        placeholder="Full Address" required>
                                </div>


                                <div class="col-md-4 pt-5">
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


                                fetch("{{ url('creat-warehouse') }}", {
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

                                                window.location.href = '{{ url('view-warehouses') }}';
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
                    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
                    <script>
                        $(document).ready(function() {
                            $('#pincode').on('input', function() {
                                var pincode = $(this).val();

                                 $.ajax({
                                    type: 'POST',
                                    url: '/get-pincode',
                                    data: {
                                        _token: '{{ csrf_token() }}',
                                        code: pincode
                                    },
                                    success: function(response)
                                    {


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
