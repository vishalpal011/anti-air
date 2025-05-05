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

                        <h4 class="py-3 mb-2">
                            <span class="text-muted fw-light">Settings /</span> API Settings / All APIs Comments
                        </h4>

                        <!-- Order List Widget -->
                         <div class="card p-3">
                            <div class="card-datatable ">
                                <!-- filter section -->
                                <div class="row">
                                  <form action="create-courier-comments" method="post">
                                    @csrf
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label>Courier</label>
                                                 <select class="form-control" name="courier" id="select2Basic">
                                                    <option selected disabled>Select Courier Api</option>
                                                    @foreach ($api as $val)
                                                        <option value="{{$val->id}}">{{$val->courier_name}}</option>
                                                    @endforeach
                                                 </select>
                                            </div>
                                            <div class="col-md-3">
                                                <label  >Status Name</label>

                                                <select name="status_name" id="select2Basics" class="form-control">
                                                    <option selected disabled>Select Status</option>
                                                </select>
                                            </div>
                                            <div class="col-md-3">
                                                <div id="more-email">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Courier Comments</label>
                                                        <input type="text" name="comments_name[]" class="form-control">

                                                    </div>
                                                </div>
                                                <br>
                                                <button type="button" id="addEmail" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i></button>
                                                <button type="button" id="removeEmail" class="btn btn-danger"><i class="fa fa-minus" aria-hidden="true"></i></button>
                                            </div>
                                            <div class="col-md-3">
                                                <br>
                                                <button type="submit" class="btn btn-primary">Create</button>
                                            </div>
                                        </div>
                                  </form>
                                </div>
                                <br>

                            </div>
                            @if(Session::has('success'))
                                <div class="alert alert-success">
                                    {{ Session::get('success') }}
                                </div>
                            @endif

                            @if(Session::has('error'))
                                <div class="alert alert-danger">
                                    {{ Session::get('error') }}
                                </div>
                            @endif


                            <table class="table" style="width: 100%">
                                <thead>
                                    <tr>
                                        <th>API Name</th>
                                        <th>Status Name</th>
                                        <th>Couriers Comments</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($comments as $value)
                                        <tr>
                                            <td>{{$value->courierss->courier_name}}</td>
                                            <td>
                                                {{$value->status_name}}
                                            </td>
                                            <td>
                                                @php
                                                $statuses = explode(',', $value->courier_comments);
                                                    @endphp
                                                    @foreach ($statuses as $status)
                                                        <div class="p-2">
                                                            <button class="btn-sm btn btn-primary">{{$status}}</button>
                                                        </div>
                                                    @endforeach
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>

                    </div>

                    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                    <script>
                        $(document).ready(function() {
                            $("#addEmail").on("click", function() {
                                $("#more-email").append("<div class='form-group'><label for='exampleInputEmail1'>Courier Comments</label><input type='text' name='comments_name[]' class='form-control'></div>");
                                $("#removeEmail").prop("disabled", false); // Enable remove button
                            });

                            $("#removeEmail").on("click", function() {
                                $("#more-email").children().last().remove();
                                // Disable remove button if only one input left
                                if ($("#more-email").children().length === 1) {
                                    $("#removeEmail").prop("disabled", true);
                                }
                            });
                        });
                    </script>

                        <script>
                            $(document).ready(function() {
                                // Attach change event listener to the select element
                                $('#select2Basic').on('change', function() {
                                    // Get the selected value
                                    var selectedClientId = $(this).val();

                                    $.ajax({
                                        url: '{{ url('get-apis-status') }}',
                                        method: 'POST',
                                        data: {
                                            _token: '{{ csrf_token() }}',
                                            client_id: selectedClientId
                                        },
                                        success: function(response)
                                        {
                                            console.log(response);
                                            $('#select2Basics').html(response);
                                        },
                                        error: function(error) {
                                            console.error(error);
                                        }
                                    });
                                });
                            });
                        </script>

@include('layouts.footer');

