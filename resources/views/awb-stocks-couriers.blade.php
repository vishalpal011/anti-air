<!DOCTYPE html>

<html lang="en" dir="ltr" data-theme="theme-default" data-assets-path="../../assets/"
    data-template="vertical-menu-template">


<!-- Mirrored from demos.pixinvent.com/vuexy-html-admin-template/html/vertical-menu-template/app-ecommerce-order-details.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 20 Dec 2023 06:08:27 GMT -->

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Order Details - eCommerce | Vuexy - Bootstrap Admin Template</title>

    <meta name="csrf-token" content="{{ csrf_token() }}">
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

    <link rel="stylesheet" href="../../assets/vendor/fonts/fontawesome.css" />
    <link rel="stylesheet" href="../../assets/vendor/fonts/tabler-icons.css" />
    <link rel="stylesheet" href="../../assets/vendor/fonts/flag-icons.css" />

    <!-- Core CSS -->

    <link rel="stylesheet" href="../../assets/vendor/css/rtl/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="../../assets/vendor/css/rtl/theme-default.css" class="template-customizer-theme-css" />

    <link rel="stylesheet" href="../../assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="../../assets/vendor/libs/node-waves/node-waves.css" />
    <link rel="stylesheet" href="../../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="../../assets/vendor/libs/typeahead-js/typeahead.css" />
    <link rel="stylesheet" href="../../assets/vendor/libs/bs-stepper/bs-stepper.css" />
    <link rel="stylesheet" href="../../assets/vendor/libs/select2/select2.css" />
    <link rel="stylesheet" href="../../assets/vendor/libs/tagify/tagify.css" />
    <link rel="stylesheet" href="../../assets/vendor/libs/flatpickr/flatpickr.css" />
    <link rel="stylesheet" href="../../assets/vendor/libs/%40form-validation/umd/styles/index.min.css" />
    <link rel="stylesheet" href="../../assets/vendor/libs/select2/select2.css" />

    <!-- Page CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css"
        integrity="sha512-6S2HWzVFxruDlZxI3sXOZZ4/eJ8AcxkQH1+JjSe/ONCEqR9L4Ysq5JdT5ipqtzU7WHalNwzwBv+iE51gNHJNqQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Helpers -->
    <script src="../../assets/vendor/js/helpers.js"></script>
    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Template customizer: To hide customizer set displayCustomizer value false in config.js.  -->
    <script src="../../assets/vendor/js/template-customizer.js"></script>
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="../../assets/js/config.js"></script>

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
                            <span class="text-muted fw-light">AWB Stocks /</span> Create Stocks
                        </h5>
                        <form id="aws" method="POST">
                            <div class="row">

                                <div class="col-md-10">
                                    <div class="col" data-select2-id="23">
                                        <!-- <h6> Create Stocks </h6> -->
                                        <div class="accordion" id="collapsibleSection">
                                            <div class="card accordion-item active" data-select2-id="22">
                                                <h2 class="accordion-header" id="headingDeliveryAddress">
                                                    <button type="button" class="accordion-button">Stock for couriers
                                                    </button>
                                                </h2>


                                                <div id="collapseDeliveryAddress"
                                                    class="accordion-collapse collapse show"
                                                    data-bs-parent="#collapsibleSection"
                                                    data-select2-id="collapseDeliveryAddress" style="">
                                                    <div class="accordion-body" data-select2-id="21">
                                                        <div class="row g-3" data-select2-id="20">
                                                            <div class="col-md-6">
                                                                <label class="form-label" for="collapsible-fullname">
                                                                    AWB's Excel
                                                                </label>
                                                                <input type="file" id="collapsible-fullname"
                                                                    class="form-control" name="file" required>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label for="select2Basic"
                                                                    class="form-label">Client</label>
                                                                <select name="outline_squircle" id="select2Basic"
                                                                    class="select2 form-select form-select-lg"
                                                                    data-allow-clear="true">
                                                                    <option selected disabled>Search For Client</option>
                                                                    {{-- <option selected  value="{{$client->id}}">{{$client->first_name}}</option> --}}

                                                                    @foreach ($client as $val)
                                                                        <option value="{{ $val->id }}">
                                                                            {{ $val->courier_display_name }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="col text-center">
                                                                <div class="col-md-12 pt-5 pr-4">
                                                                    <button type="submit"
                                                                        class="btn btn-primary">Upload</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2 pt-5">
                                    <div id="card" style="display: none;">
                                        <div id="usersContainer"></div>
                                    </div>
                                </div>

                            </div>
                        </form>
                    </div>
                    <!-- / Content -->




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

                                                    <span class="custom-option-title">${user.first_name} <small>${user.client_id}</small></span> <input name="outline_squircle" class="form-check-input" type="radio" value="${user.client_id}" id="customRadioOwner">

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


                                fetch("{{ url('creat-awb-courier') }}", {
                                        method: "POST",
                                        body: formData,
                                        headers: {
                                            'X-CSRF-TOKEN': csrfToken,
                                        },
                                    })
                                    .then(response => response.json())
                                    .then(data => {

                                        if (data.status === 'success') {

                                            window.location.href = "{{ url('awb-inventory') }}";
                                        } else {

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

                    <script src="../../assets/vendor/libs/jquery/jquery.js"></script>
                    <script src="../../assets/vendor/libs/popper/popper.js"></script>
                    <script src="../../assets/vendor/js/bootstrap.js"></script>
                    <script src="../../assets/vendor/libs/node-waves/node-waves.js"></script>
                    <script src="../../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
                    <script src="../../assets/vendor/libs/hammer/hammer.js"></script>
                    <script src="../../assets/vendor/libs/i18n/i18n.js"></script>
                    <script src="../../assets/vendor/libs/typeahead-js/typeahead.js"></script>
                    <script src="../../assets/vendor/js/menu.js"></script>

                    <!-- endbuild -->

                    <!-- Vendors JS -->
                    <script src="../../assets/vendor/libs/cleavejs/cleave.js"></script>
                    <script src="../../assets/vendor/libs/cleavejs/cleave-phone.js"></script>
                    <script src="../../assets/vendor/libs/bs-stepper/bs-stepper.js"></script>
                    <script src="../../assets/vendor/libs/select2/select2.js"></script>
                    <script src="../../assets/vendor/libs/tagify/tagify.js"></script>
                    <script src="../../assets/vendor/libs/flatpickr/flatpickr.js"></script>
                    <script src="../../assets/vendor/libs/%40form-validation/umd/bundle/popular.min.js"></script>
                    <script src="../../assets/vendor/libs/%40form-validation/umd/plugin-bootstrap5/index.min.js"></script>
                    <script src="../../assets/vendor/libs/%40form-validation/umd/plugin-auto-focus/index.min.js"></script>

                    <!-- Main JS -->
                    <script src="../../assets/js/main.js"></script>

                    <!-- Page JS -->
                    <script src="../../assets/js/forms-selects.js"></script>
                    <script src="../../assets/js/wizard-ex-property-listing.js"></script>
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"
                        integrity="sha512-lbwH47l/tPXJYG9AcFNoJaTMhGvYWhVM9YI43CT+uteTRRaiLCui8snIgyAN8XWgNjNhCqlAUdzZptso6OCoFQ=="
                        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</body>


</html>
