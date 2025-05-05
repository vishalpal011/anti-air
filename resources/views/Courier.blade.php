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
                            <span class="text-muted fw-light">Courier /</span> Create Courier
                        </h5>
                        <!-- <h6> Create Courier </h6> -->
                        <form id="aws" method="POST">
                            <div class="row bg-white p-2">
                                <div class="col-md-4">
                                    <label for="">Courier ID</label>
                                    <input type="text" class="form-control" name="courier_id" value="{{ Str::random(8) }}" readonly>

                                </div>
                                <div class="col-md-4">
                                    <label for="">Courier Display Name</label>
                                    <input type="text"  class="form-control" name="courier_display_name"  placeholder="Courier Name" required>
                                </div>
                                <div class="col-md-4">
                                    <label for="">Courier Registration Name</label>
                                    <input type="text"  class="form-control" name="courier_registration_name"  placeholder="Courier Registration Name" required>
                                </div>
                                <div class="col-md-4 pt-3">
                                    <label for="">Courier Rates</label>
                                    <input type="text"  class="form-control" name="courier_rates"  placeholder="Courier Rates" required>
                                </div>
                                <div class="col-md-4 pt-3">
                                    <label for="">Courier COD Cycle</label>
                              
                                    <select name="courier_cod_cycle" class="form-control" required>
                                    <option selected>--Select--</option>
                                  @for ($cod = 1; $cod <= 100; $cod++)
                                        <option value="{{ $cod }}"> {{ $cod }}</option>
                                    @endfor
                                  </select>
                                </div>
                                <div class="col-md-4 pt-3">
                                    <label for="">Courier Agreed TAT Zone Wise</label>
                                    <input type="text"  class="form-control" name="courier_zone"  placeholder="Courier Agreed TAT Zone Wise" required>
                                </div>
                                <div class="col-md-4 pt-3">
                                    <label for="">Courier Billing Cycle</label>
                                  <select name="courier_billing" class="form-control" required>
                                    <option selected>--Select--</option>
                                  @for ($i = 1; $i <= 100; $i++)
                                        <option value="{{ $i }}"> {{ $i }}</option>
                                    @endfor
                                  </select>
                                </div>
                                <div class="col-md-4 pt-3">
                                    <label for="">Courier Loss Liability</label>
                                    <input type="text"  class="form-control" name="courier_loss"  placeholder="Courier Loss Liability" required>
                                </div>
                                <div class="col-md-4 pt-3">
                                    <label for="">Courier Weight</label>
                                    <input type="date"  class="form-control" name="courier_weight"  placeholder="Weight Dispute Timeline" required>
                                </div>
                                <div class="col-md-4 pt-3">
                                    <label for="">Weight Dispute Timeline</label>
 
                                     <select name="weight_dispute_timeline" class="form-control" required>
                                    <option selected>--Select--</option>
                                  @for ($wt = 1; $wt <= 100; $wt++)
                                        <option value="{{ $wt }}"> {{ $wt }}</option>
                                    @endfor
                                  </select>
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


                                fetch("{{ url('creat-courier') }}", {
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

                                                window.location.href = '{{ url('view-Courier') }}';
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


 @include('layouts.footer')
