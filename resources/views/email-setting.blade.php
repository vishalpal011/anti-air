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

    <!-- Page CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css"
        integrity="sha512-6S2HWzVFxruDlZxI3sXOZZ4/eJ8AcxkQH1+JjSe/ONCEqR9L4Ysq5JdT5ipqtzU7WHalNwzwBv+iE51gNHJNqQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- toster alert link -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <!-- end toster alert -->

    <!-- Helpers -->
    <script src="../../assets/vendor/js/helpers.js"></script>
    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Template customizer: To hide customizer set displayCustomizer value false in config.js.  -->
    <script src="../../assets/vendor/js/template-customizer.js"></script>
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    {{-- <script src="../../assets/js/config.js"></script> --}}
</head>
<style>
    .custom-option-icon .custom-option-content {
        text-align: center;
        padding: 6px;
    }
</style>

<body>
    <script>
        @if (Session::has('error'))
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            }
            toastr.warning("{{ session('error') }}", {
                timeOut: 15000
            })
        @endif
    </script>
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
                            <span class="text-muted fw-light">Settings /</span> Email & SMTP
                        </h4>

                        <!-- Order List Widget -->


                        <!-- Order List Table -->
                        <div class="card p-3">
                            <div class="card-datatable table-responsive">
                                <div class="row">
                                    <div class="col-md-6">
                                        <table style="width:100%;" class="table table-borderless">
                                            <thead>
                                                <tr>
                                                    <th>Modules</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Client Mailing </td>
                                                    <td>
                                                        <div class="has-error">
                                                            <label class="switch">
                                                                <input type="checkbox" id=""
                                                                    class="switch-input" checked=""
                                                                    onchange="updateStatus(this, 'client_email')">
                                                                <span class="switch-toggle-slider">
                                                                    <span class="switch-on"></span>
                                                                    <span class="switch-off"></span>
                                                                </span>
                                                            </label>
                                                        </div>
                                                    </td>
                                                </tr>
                                                {{-- AWB --}}
                                                <tr>
                                                    <td>Alert : Awb Inventory Shortage</td>
                                                    <td>
                                                        <div class="has-error">
                                                            <label class="switch">
                                                                <input type="checkbox" id=""
                                                                    class="switch-input" checked=""
                                                                    onchange="updateStatus(this, 'inventory_shortage')">
                                                                <span class="switch-toggle-slider">
                                                                    <span class="switch-on"></span>
                                                                    <span class="switch-off"></span>
                                                                </span>
                                                            </label>
                                                        </div>
                                                    </td>
                                                </tr>
                                                {{-- end --}}
                                                {{-- NDR Email - Client wise --}}
                                                <tr>
                                                    <td>NDR Email - Client wise</td>
                                                    <td>
                                                        <div class="has-error">
                                                            <label class="switch">
                                                                <input type="checkbox" id=""
                                                                    class="switch-input" checked=""
                                                                    onchange="updateStatus(this, 'ndr_email')">
                                                                <span class="switch-toggle-slider">
                                                                    <span class="switch-on"></span>
                                                                    <span class="switch-off"></span>
                                                                </span>
                                                            </label>
                                                        </div>
                                                    </td>
                                                </tr>
                                                {{-- end --}}
                                                {{-- Wallet Recharged confirmation --}}
                                                <tr>
                                                    <td>Wallet Recharged confirmation</td>
                                                    <td>
                                                        <div class="has-error">
                                                            <label class="switch">
                                                                <input type="checkbox" id=""
                                                                    class="switch-input" checked=""
                                                                    onchange="updateStatus(this, 'Wallet_Recharged')">
                                                                <span class="switch-toggle-slider">
                                                                    <span class="switch-on"></span>
                                                                    <span class="switch-off"></span>
                                                                </span>
                                                            </label>
                                                        </div>
                                                    </td>
                                                </tr>
                                                {{-- end --}}
                                                {{-- Legal Agreement Email --}}
                                                <tr>
                                                    <td>Legal Agreement Email</td>
                                                    <td>
                                                        <div class="has-error">
                                                            <label class="switch">
                                                                <input type="checkbox" id=""
                                                                    class="switch-input" checked=""
                                                                    onchange="updateStatus(this, 'Legal_Agreement')">
                                                                <span class="switch-toggle-slider">
                                                                    <span class="switch-on"></span>
                                                                    <span class="switch-off"></span>
                                                                </span>
                                                            </label>
                                                        </div>
                                                    </td>
                                                </tr>
                                                {{-- end --}}
                                                {{-- Agreement Acceptance Email --}}
                                                <tr>
                                                    <td>Agreement Acceptance Email</td>
                                                    <td>
                                                        <div class="has-error">
                                                            <label class="switch">
                                                                <input type="checkbox" id=""
                                                                    class="switch-input" checked=""
                                                                    onchange="updateStatus(this, 'Acceptance_Agreement')">
                                                                <span class="switch-toggle-slider">
                                                                    <span class="switch-on"></span>
                                                                    <span class="switch-off"></span>
                                                                </span>
                                                            </label>
                                                        </div>
                                                    </td>
                                                </tr>
                                                {{-- end --}}
                                                {{-- Paytm Settlement Email --}}
                                                <tr>
                                                    <td>Paytm Settlement Email</td>
                                                    <td>
                                                        <div class="has-error">
                                                            <label class="switch">
                                                                <input type="checkbox" id=""
                                                                    class="switch-input" checked=""
                                                                    onchange="updateStatus(this, 'Acceptance_Agreement')">
                                                                <span class="switch-toggle-slider">
                                                                    <span class="switch-on"></span>
                                                                    <span class="switch-off"></span>
                                                                </span>
                                                            </label>
                                                        </div>
                                                    </td>
                                                </tr>
                                                {{-- end --}}
                                                {{-- Not Pick Report --}}
                                                <tr>
                                                    <td>Not Pick Report</td>
                                                    <td>
                                                        <div class="has-error">
                                                            <label class="switch">
                                                                <input type="checkbox" id=""
                                                                    class="switch-input" checked=""
                                                                    onchange="updateStatus(this, 'Acceptance_Agreement')">
                                                                <span class="switch-toggle-slider">
                                                                    <span class="switch-on"></span>
                                                                    <span class="switch-off"></span>
                                                                </span>
                                                            </label>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="col-md-6">
                                        <form id="update" method="POST">
                                            <div>
                                                <label for="defaultFormControlInput" class="form-label">Mail SMTP
                                                    Host</label>
                                                <input type="text" name="host" class="form-control"
                                                    id="defaultFormControlInput"
                                                    aria-describedby="defaultFormControlHelp" value="{{$data->host}}">
                                            </div>
                                            <div>
                                                <label for="defaultFormControlInput" class="form-label">Mail
                                                    Port</label>
                                                <input type="text" name="port" class="form-control"
                                                    id="defaultFormControlInput"
                                                    aria-describedby="defaultFormControlHelp" value="{{$data->port}}">
                                            </div>
                                            <div>
                                                <label for="defaultFormControlInput" class="form-label">Mail User
                                                    Name</label>
                                                <input type="text" name="username" class="form-control"
                                                    id="defaultFormControlInput"
                                                    aria-describedby="defaultFormControlHelp" value="{{$data->username}}">
                                            </div>
                                            <div>
                                                <label for="defaultFormControlInput" class="form-label">Mail
                                                    Password</label>
                                                <input type="text" name="password" class="form-control"
                                                    id="defaultFormControlInput"
                                                    aria-describedby="defaultFormControlHelp" value="{{$data->password}}">
                                            </div>
                                            <div>
                                                <label for="defaultFormControlInput" class="form-label">From Mail
                                                    Address</label>
                                                <input type="text" name="from_address" class="form-control"
                                                    id="defaultFormControlInput"
                                                    aria-describedby="defaultFormControlHelp"  value="{{$data->from_address}}">
                                            </div>
                                            <div>
                                                <label for="defaultFormControlInput" class="form-label">From Mail
                                                    Name</label>
                                                <input type="text" name="from_name" class="form-control"
                                                    id="defaultFormControlInput"
                                                    aria-describedby="defaultFormControlHelp"  value="{{$data->from_name}}">
                                            </div>
                                            <br>
                                            <button type="submit"
                                                class="btn btn-primary waves-effect waves-light">Update</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>


                    <script>
                        function updateStatus(checkbox, inputName) {
                            // Get the current status (true or false)
                            var status = checkbox.checked;
                            var name = inputName;
                            alert(name);
                            alert(status);
                            // Make an AJAX request
                            var xhr = new XMLHttpRequest();
                            xhr.onreadystatechange = function() {
                                if (xhr.readyState === 4) {
                                    if (xhr.status === 200) {
                                        // Update was successful, handle any response if needed
                                        console.log(xhr.responseText);
                                    } else {
                                        // Handle error
                                        console.error('Error updating status');
                                    }
                                }
                            };

                            // Specify the method, URL, and asynchronous flag
                            xhr.open('POST', 'update_status.php', true);

                            // Set the Content-Type header for POST requests
                            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

                            // Send the request with the status and input name as data
                            xhr.send('status=' + status + '&inputName=' + encodeURIComponent(inputName));
                        }
                    </script>
                    <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            document.getElementById('update').addEventListener('submit', function(e) {
                                e.preventDefault();

                                var csrfToken = document.head.querySelector('meta[name="csrf-token"]').content;
                                var formData = new FormData(this);

                                fetch("{{ url('update-mail-config') }}", {
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

                                                window.location.href = '{{ url('email-settings') }}';
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





                    @include('layouts.footer')
