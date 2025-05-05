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
    <link rel="stylesheet" href="../../assets/vendor/libs/select2/select2.css" />
    <link rel="stylesheet" href="../../assets/vendor/libs/tagify/tagify.css" />
    <link rel="stylesheet" href="../../assets/vendor/libs/bootstrap-select/bootstrap-select.css" />
    <link rel="stylesheet" href="../../assets/vendor/libs/typeahead-js/typeahead.css" />
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
                            <span class="text-muted fw-light">Rate Card /</span> Edit Courier Rate
                        </h5>
                        <!-- <h6> Create Courier </h6> -->
                        <form action="{{url('update-courier-rate/'.$data->id)}}" method="POST">
                            @csrf
                            <div class="row bg-white p-2">
                                <div class="col-md-4">

                                    <label for="">Courier</label>
                                    <select name="courier" id="select2Basic" class="select2 form-select form-select-lg"
                                        data-allow-clear="true" required>
                                        <option value="{{$data->courier_id}}" selected >{{ optional($data->couriers)->courier_display_name}} (Default Selected)</option>
                                        @foreach ($courier as $couriers)
                                        <option value="{{ $couriers->id }}">{{ $couriers->courier_display_name }}
                                          </option>
                                        @endforeach
                                    
                                    </select>



                                </div>
                                <div class="col-md-4">
                                    <label for="">Courier Service</label>
                                    <select name="service" class="form-control" required>
                                        <option value="{{$data->service_id}}" selected>{{ optional($data->courier_service)->service}} (Default Selected)</option>
                                        @foreach ($service as $services)
                                        <option value="{{ $services->id }}">{{ $services->service }}
                                          </option>
                                        @endforeach

                                        
                                    </select>
                                     
 
                                </div>
                                <div class="col-md-4">
                                    <label for="">Type</label>
                                    <select name="type" class="form-control" required>
                                        <option value="{{$data->type}}" selected>{{$data->type}} (Default Selected)</option>
                                        <option value="Forword">Forword</option>
                                        <option value="RTO">RTO</option>
                                        <option value="Additional">Additional</option>
                                     
                                    </select>
                                </div>
                                <div class="col-md-4 pt-3">
                                    <label for="">Weight (in Kg)</label>
                                    <input type="text" class="form-control" name="weight"
                                        placeholder="Weight" value="{{$data->weight}}" required>
                                </div>
                                <div class="col-md-4 pt-3">
                                    <label for="">Zone : A Price</label>
                                    <input type="number"   class="form-control" name="zone_a"
                                        placeholder="Zone A" value="{{$data->zone_a}}" required>
                                </div>
                                <div class="col-md-4 pt-3">
                                    <label for="">Zone : B Price</label>
                                    <input type="number" class="form-control" name="zone_b"
                                        placeholder="Zone B" value="{{$data->zone_b}}" required>
                                </div>
                                <div class="col-md-4 pt-3">
                                    <label for="">Zone : C Price</label>
                                    <input type="number"  class="form-control" name="zone_c"
                                        placeholder="Zone C" value="{{$data->zone_c}}" required>
                                </div>
                                <div class="col-md-4 pt-3">
                                    <label for="">Zone : D Price</label>
                                    <input type="number"  class="form-control" name="zone_d"
                                        placeholder="Zone D" value="{{$data->zone_d}}" required>
                                </div>
                                <div class="col-md-4 pt-3">
                                    <label for="">Zone : E Price</label>
                                    <input type="number"  class="form-control" name="zone_e"
                                        placeholder="Zone E" value="{{$data->zone_e}}" required>
                                </div>
                                <div class="col-md-4 pt-3">
                                    <label for="">Zone : F Price</label>
                                    <input type="number"  class="form-control" name="zone_f"
                                        placeholder="Zone F" value="{{$data->zone_f}}" required>
                                </div>
                                <div class="col-md-4 pt-3">
                                    <label for="">Zone : G Price</label>
                                    <input type="number"  class="form-control" name="zone_g"
                                        placeholder="Zone G" value="{{$data->zone_g}}" required>
                                </div>
                                <div class="col-md-4 pt-3">
                                    <label for="">FSC Percentage</label>
                                    <input type="text"   class="form-control" name="fsc_percentage"
                                        placeholder="FSC %" value="{{$data->fsc_percentage}}" required>
                                </div>
                                <div class="col-md-4 pt-3">
                                    <label for="">GST Percentage</label>
                                    <input type="text"  class="form-control" name="gst_percentage"
                                        placeholder="GST %" value="{{$data->gst_percentage}}" required>
                                </div>
                                <div class="col-md-4 pt-3">
                                    <label for="">COD Price</label>
                                    <input type="number"  class="form-control" name="cod"
                                        placeholder="COD" value="{{$data->cod}}" required>
                                </div>
                                <div class="col-md-4 pt-3">
                                    <label for="">COD Percentage</label>
                                    <input type="text" class="form-control" name="cod_percentage"
                                        placeholder="COD %" value="{{$data->cod_percentage}}" required>
                                </div>
                                <div class="col-md-4 pt-3">
                                    <label for="">Other Charges</label>
                                    <input type="number"  class="form-control" name="other_charges"
                                        placeholder="Other Charges" value="{{$data->other_charges}}" required>
                                </div>
                                <div class="col-md-4 pt-3">
                                    <label for="">COD Cycle</label>
                                    <input type="text"  class="form-control" name="cod_cycle"
                                        placeholder="COD Cycle" value="{{$data->cod_cycle}}" required>
                                </div>
                                <div class="col-md-4 pt-3">
                                    <label for="">Status</label>
                                    <select name="status" class="form-control" required>
                                      
                                        @if ($data->status == 'true')
                                        <option selected value="{{ $data->status }}">Active (Selected)</option>
                                        @else
                                        <option selected value="{{ $data->status }}">Deactive (Selected)</option>
                                        @endif
                                        <option value="true">Active</option>
                                        <option value="false">Deactive</option>
                                    </select>
                                </div>
                               
                                <div class="col-md-4 pt-5">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>


                            </div>
                        </form>
                    </div>
                    <!-- / Content -->

                 
                    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
                   

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
                    <script src="../../assets/vendor/libs/select2/select2.js"></script>
                    <script src="../../assets/vendor/libs/tagify/tagify.js"></script>
                    <script src="../../assets/vendor/libs/bootstrap-select/bootstrap-select.js"></script>
                    <script src="../../assets/vendor/libs/typeahead-js/typeahead.js"></script>
                    <script src="../../assets/vendor/libs/bloodhound/bloodhound.js"></script>

                    <!-- Main JS -->
                    <script src="../../assets/js/main.js"></script>


                    <!-- Page JS -->
                    <script src="../../assets/js/forms-selects.js"></script>
                    <script src="../../assets/js/forms-tagify.js"></script>
                    <script src="../../assets/js/forms-typeahead.js"></script>
