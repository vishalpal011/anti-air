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





    <link rel="stylesheet" href="{{url('assets/css/label.css')}}">
</head>
<style>
    .top_rw {
        background-color: #f4f4f4;
    }

    .td_w {}

    button {
        padding: 5px 10px;
        font-size: 14px;
    }

    .invoice-box {
        max-width: 890px;
        margin: auto;
        padding: 10px;
        border: 1px solid #eee;
        box-shadow: 0 0 10px rgba(0, 0, 0, .15);
        font-size: 14px;
        line-height: 24px;
        font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        color: #555;
    }

    .invoice-box table {
        width: 100%;
        line-height: inherit;
        text-align: left;
        border-bottom: solid 1px #ccc;
    }

    .invoice-box table td {
        padding: 5px;
        vertical-align: middle;
    }

    .invoice-box table tr td:nth-child(2) {
        text-align: right;
    }

    .invoice-box table tr.top table td {
        padding-bottom: 20px;
    }

    .invoice-box table tr.top table td.title {
        font-size: 45px;
        line-height: 45px;
        color: #333;
    }

    .invoice-box table tr.information table td {
        padding-bottom: 40px;
    }

    .invoice-box table tr.heading td {
        background: #eee;
        border-bottom: 1px solid #ddd;
        font-weight: bold;
        font-size: 12px;
    }

    .invoice-box table tr.details td {
        padding-bottom: 20px;
    }

    .invoice-box table tr.item td {
        border-bottom: 1px solid #eee;
    }

    .invoice-box table tr.item.last td {
        border-bottom: none;
    }

    .invoice-box table tr.total td:nth-child(2) {
        border-top: 2px solid #eee;
        font-weight: bold;
    }

    @media only screen and (max-width: 600px) {
        .invoice-box table tr.top table td {
            width: 100%;
            display: block;
            text-align: center;
        }

        .invoice-box table tr.information table td {
            width: 100%;
            display: block;
            text-align: center;
        }
    }

    /** RTL **/
    .rtl {
        direction: rtl;
        font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
    }

    .rtl table {
        text-align: right;
    }

    .rtl table tr td:nth-child(2) {
        text-align: left;
    }

    .hidden {
        display: none;
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


    <div class="card p-3">


        <div class="row">
            <div class="col-md-12">
                <section>
                    <div class="blue_dart">
                        <table style="width: 100%">
                          <tr>
                            <th colspan="2">Delhi</th>
                            <th colspan="2" id="blue_dart"><img src="{{url('assets/images/blue.png')}}" /></th>
                          </tr>
                          <tr id="bar_code">
                            <th colspan="2">
                              <img src="{{url('assets/images/code.png')}}" />
                              <p>98544788855</p>
                            </th>
                            <th colspan="2">
                              <p>(COD)</p>
                              <p>Rs. 20000.00</p>
                            </th>
                          </tr>
                          <tr>
                            <td colspan="2">
                              <div class="delive">
                                <p>Dieliver To</p>
                                <p>JAI/JMK/JMU</p>
                              </div>
                              <p><b>Vinay pathak</b></p>
                              <p>
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Ad
                                delectus dolores sequi, earum quisquam, quo harum, non
                                voluptatem velit eligendi hic beatae atque sed laudantium ab
                                incidunt? Maxime, enim asperiores?
                              </p>
                              <p>Pin : 84656556</p>
                            </td>
                            <th colspan="2">
                              <p>Order id : 89455655</p>
                              <p>Invoice : #59889898</p>
                              <p>Date : #10-02-2021</p>
                              <p>Weight : 0.5 kg</p>
                              <p>Invoice value :Rs . 200000</p>
                            </th>
                          </tr>
                          <tr>
                            <th>Product Name</th>
                            <th>SKU</th>
                            <th>Qty</th>
                            <th>Price</th>
                          </tr>
                          <tr>
                            <td>1 new dsfff f</td>
                            <td>1</td>
                            <td>1</td>
                            <td>20000</td>
                          </tr>
                          <tr class="t_foot">
                            <th colspan="2">Total</th>
                            <th>1</th>
                            <th>2000</th>
                          </tr>
                          <tr>
                            <td colspan="5">
                              <p><b>If not delivered , return to.</b></p>
                              <p>
                                Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                Voluptatem consectetur possimus maiores voluptatum,
                                necessitatibus suscipit in. Ipsum, quia ea? Quod?
                              </p>
                            </td>
                          </tr>
                        </table>
                      </div>
                    <div class="action">
                        <table style="width: 100%">
                            <thead class="">
                                <tr>
                                    <th><b>Setting Name</b></th>
                                    <th><b>Action</b></th>
                                </tr>
                            </thead>
                            <tbody>



                                <tr>
                                    <td>Sold By</td>
                                    <td>


                                        @if ($setting->sold_by == 'true')
                                            <input type="checkbox" checked data-size="xs" class="status-toggle"
                                                data-toggle="toggle" data-on="Active" data-off="Inactive"
                                                data-status="{{ $setting->sold_by }}" data-id="{{ $setting->id }}">
                                        @else
                                            <input type="checkbox" data-size="xs" class="status-toggle" data-toggle="toggle"
                                                data-on="Active" data-off="active" data-status="{{ $setting->sold_by }}"
                                                data-id="{{ $setting->id }}">
                                        @endif
                                        <span class="slider round"></span>

                                    </td>
                                </tr>



                                <tr>
                                    <td>Shipping Address </td>
                                    <td>

                                        @if ($setting->shipping_address == 'true')
                                            <input type="checkbox" checked data-size="xs" class="status-toggle  shippeing"
                                                data-toggle="toggle" data-on="Active" data-off="Inactive"
                                                data-status="{{ $setting->shipping_address }}" data-id="{{ $setting->id }}">
                                        @else
                                            <input type="checkbox" data-size="xs" class="status-toggle  shippeing"
                                                data-toggle="toggle" data-on="Active" data-off="active"
                                                data-status="{{ $setting->shipping_address }}" data-id="{{ $setting->id }}">
                                        @endif

                                    </td>
                                </tr>






                                <tr>
                                    <td>Product Section </td>
                                    <td>
                                        @if ($setting->product_section == 'true')
                                            <input type="checkbox" checked data-size="xs" class="  Product"
                                                data-toggle="toggle" data-on="Active" data-off="Inactive"
                                                data-status="{{ $setting->product_section }}" data-id="{{ $setting->id }}">
                                        @else
                                            <input type="checkbox" data-size="xs" class="  Product" data-toggle="toggle"
                                                data-on="Active" data-off="active"
                                                data-status="{{ $setting->product_section }}" data-id="{{ $setting->id }}">
                                        @endif
                                    </td>
                                </tr>


                                <tr>
                                    <td>Declaration</td>
                                    <td>
                                        @if ($setting->declaration == 'true')
                                            <input type="checkbox" checked data-size="xs" class="declaration"
                                                data-toggle="toggle" data-on="Active" data-off="Inactive"
                                                data-status="{{ $setting->declaration }}" data-id="{{ $setting->id }}">
                                        @else
                                            <input type="checkbox" data-size="xs" class="declaration" data-toggle="toggle"
                                                data-on="Active" data-off="active" data-status="{{ $setting->declaration }}"
                                                data-id="{{ $setting->id }}">
                                        @endif
                                    </td>
                                </tr>



                                <tr>
                                    <td>Return Address</td>
                                    <td>
                                        @if ($setting->return_address == 'true')
                                            <input type="checkbox" checked data-size="xs" class="return_address"
                                                data-toggle="toggle" data-on="Active" data-off="Inactive"
                                                data-status="{{ $setting->return_address }}" data-id="{{ $setting->id }}">
                                        @else
                                            <input type="checkbox" data-size="xs" class="return_address"
                                                data-toggle="toggle" data-on="Active" data-off="active"
                                                data-status="{{ $setting->return_address }}" data-id="{{ $setting->id }}">
                                        @endif
                                    </td>
                                </tr>



                                <tr>
                                    <td>Consignee Mobile</td>
                                    <td>
                                        @if ($setting->consignee_mobile == 'true')
                                            <input type="checkbox" checked data-size="xs" class="consignee_mobile"
                                                data-toggle="toggle" data-on="Active" data-off="Inactive"
                                                data-status="{{ $setting->consignee_mobile }}"
                                                data-id="{{ $setting->id }}">
                                        @else
                                            <input type="checkbox" data-size="xs" class="consignee_mobile"
                                                data-toggle="toggle" data-on="Active" data-off="active"
                                                data-status="{{ $setting->consignee_mobile }}"
                                                data-id="{{ $setting->id }}">
                                        @endif
                                    </td>
                                </tr>



                                <tr>
                                    <td>Display Logo</td>
                                    <td>
                                        @if ($setting->display_logo == 'true')
                                            <input type="checkbox" checked data-size="xs" class="display_logo"
                                                data-toggle="toggle" data-on="Active" data-off="Inactive"
                                                data-status="{{ $setting->display_logo }}" data-id="{{ $setting->id }}">
                                        @else
                                            <input type="checkbox" data-size="xs" class="display_logo" data-toggle="toggle"
                                                data-on="Active" data-off="active"
                                                data-status="{{ $setting->display_logo }}" data-id="{{ $setting->id }}">
                                        @endif
                                    </td>
                                </tr>


                            </tbody>
                        </table>
                        <br>
                        <button class="btn btn-primary" onclick="goBack()">Back</button>
                    </div>
                </section>
            </div>

        </div>

    </div>
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    {{-- go back URL --}}

    <script>
        function goBack() {
            window.history.back();
        }
    </script>

    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('.status-toggle').change(function() {
                var status = $(this).prop('checked');
                var id = $(this).data('id');
                // alert(id);
                // alert(status);
                $.ajax({
                    url: '/active_sold_by',
                    type: 'POST',
                    data: {
                        id: id,
                        status: status
                    },
                    success: function(response) {
                        // alert(response);
                    },
                    error: function(xhr, status, error) {}
                });

            });


        });
    </script>


    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('.shippeing').change(function() {
                var status = $(this).prop('checked');
                var id = $(this).data('id');
                // alert(id);
                // alert(status);
                $.ajax({
                    url: '/active_shippeing',
                    type: 'POST',
                    data: {
                        id: id,
                        status: status
                    },
                    success: function(response) {
                        // alert(response);
                    },
                    error: function(xhr, status, error) {}
                });

            });


        });
    </script>

    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('.Product').change(function() {
                var status = $(this).prop('checked');
                var id = $(this).data('id');
                // alert(id);
                // alert(status);
                $.ajax({
                    url: '/active_Product',
                    type: 'POST',
                    data: {
                        id: id,
                        status: status
                    },
                    success: function(response) {

                    },
                    error: function(xhr, status, error) {}
                });

            });


        });
    </script>

    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('.declaration').change(function() {
                var status = $(this).prop('checked');
                var id = $(this).data('id');
                // alert(id);
                // alert(status);
                $.ajax({
                    url: '/active_declaration',
                    type: 'POST',
                    data: {
                        id: id,
                        status: status
                    },
                    success: function(response) {

                    },
                    error: function(xhr, status, error) {}
                });

            });


        });
    </script>

    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('.return_address').change(function() {
                var status = $(this).prop('checked');
                var id = $(this).data('id');
                // alert(id);
                // alert(status);
                $.ajax({
                    url: '/active_return_address',
                    type: 'POST',
                    data: {
                        id: id,
                        status: status
                    },
                    success: function(response) {

                    },
                    error: function(xhr, status, error) {}
                });

            });


        });
    </script>

    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('.consignee_mobile').change(function() {
                var status = $(this).prop('checked');
                var id = $(this).data('id');
                // alert(id);
                // alert(status);
                $.ajax({
                    url: '/active_consignee_mobile',
                    type: 'POST',
                    data: {
                        id: id,
                        status: status
                    },
                    success: function(response) {

                    },
                    error: function(xhr, status, error) {}
                });

            });


        });
    </script>

    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('.display_logo').change(function() {
                var status = $(this).prop('checked');
                var id = $(this).data('id');
                // alert(id);
                // alert(status);
                $.ajax({
                    url: '/active_display_logo',
                    type: 'POST',
                    data: {
                        id: id,
                        status: status
                    },
                    success: function(response) {

                    },
                    error: function(xhr, status, error) {}
                });

            });


        });
    </script>
</body>
