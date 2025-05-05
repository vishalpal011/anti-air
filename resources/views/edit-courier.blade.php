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
                            <span class="text-muted fw-light">Courier /</span> Edit Courier
                        </h5>
                        <!-- <h6> Create Courier </h6> -->
                        <form id="aws" method="POST">
                            <div class="row bg-white p-2">
                                <div class="col-md-4">
                                    <label for="">Courier ID</label>
                                    <input type="text" class="form-control" name="courier_id" value="{{$data->courier_id}}" readonly>
                                    <input type="text" hidden class="form-control" name="id" value="{{$data->id}}">
                                </div>
                                <div class="col-md-4">
                                    <label for="">Courier Display Name</label>
                                    <input type="text"  class="form-control" name="courier_display_name" value="{{$data->courier_display_name}}"  placeholder="Courier Name">
                                </div>
                                <div class="col-md-4">
                                    <label for="">Courier Registration Name</label>
                                    <input type="text"  class="form-control" name="courier_registration_name" value="{{$data->courier_registration_name}}"  placeholder="Courier Registration Name">
                                </div>
                                <div class="col-md-4 pt-3">
                                    <label for="">Courier Rates</label>
                                    <input type="text"  class="form-control" name="courier_rates" value="{{$data->courier_rates}}"  placeholder="Courier Rates">
                                </div>
                                <div class="col-md-4 pt-3">
                                    <label for="">Courier COD Cycle</label>
                                    <select name="courier_cod_cycle" class="form-control" required>
                                    <option value="{{$data->courier_cod_cycle}}" selected>{{$data->courier_cod_cycle}} (Default Selected)</option>
                                  @for ($cod = 1; $cod <= 100; $cod++)
                                        <option value="{{ $cod }}"> {{ $cod }}</option>
                                    @endfor
                                  </select>
                                </div>
                                <div class="col-md-4 pt-3">
                                    <label for="">Courier Agreed TAT Zone Wise</label>
                                    <input type="text"  class="form-control" name="courier_zone" value="{{$data->courier_zone}}" placeholder="Courier Agreed TAT Zone Wise">
                                </div>
                                <div class="col-md-4 pt-3">
                                    <label for="">Courier Billing Cycle</label>
                                    <select name="courier_billing" class="form-control">
                                    <option value="{{$data->courier_billing}}" selected>{{$data->courier_billing}} (Default Selected)</option>
                                  @for ($i = 1; $i <= 100; $i++)
                                        <option value="{{ $i }}"> {{ $i }}</option>
                                    @endfor
                                  </select>
                                </div>
                                <div class="col-md-4 pt-3">
                                    <label for="">Courier Loss Liability</label>
                                    <input type="text"  class="form-control" name="courier_loss" value="{{$data->courier_loss}}" placeholder="Courier Loss Liability">
                                </div>
                                <div class="col-md-4 pt-3">
                                    <label for="">Courier Weight</label>
                                    <input type="date"  class="form-control" name="courier_weight" value="{{$data->courier_weight}}"  placeholder="Weight Dispute Timeline">
                                </div>
                                <div class="col-md-4 pt-3">

                                     <label for="">Weight Dispute Timeline</label>
 
                                     <select name="weight_dispute_timeline" class="form-control">
                                    <option value="{{$data->weight_dispute_timeline}}" selected>{{$data->weight_dispute_timeline}} (Default Selected)</option>
                                    @for ($wt = 1; $wt <= 100; $wt++)
                                        <option value="{{ $wt }}"> {{ $wt }}</option>
                                    @endfor
                                  </select>
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

                                <div class="col-md-4 pt-5">
                                    <button class="btn btn-primary">Upload</button>
                                </div>
                                <div class="col-md-4 pt-5">
                                    <a href="{{url('view-Courier')}}"><button type="button" class="btn btn-primary">Go Back</button></a>
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


                                fetch("{{ url('update-courier') }}", {
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

                                                location.reload(true);
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
