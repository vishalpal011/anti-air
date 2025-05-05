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





    <link rel="stylesheet" href="{{ url('assets/css/label.css') }}">
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
                    <div class="bili_3">
                        <table style="width: 100%">
                            <tbody>
                                <tr class="mainHead">
                                    <th>Logo</th>
                                    <th colspan="2">V Xpress</th>
                                    <th colspan="2">Online</th>
                                </tr>
                                <tr>
                                    <th>Product Name</th>
                                    <th>SKU</th>
                                    <th>Price</th>
                                    <th>Quty</th>
                                    <th>Total</th>
                                </tr>
                            </tbody>
                            <tbody>
                                <tr>
                                    <th>xiomi 20000 fdsff fddsf</th>
                                    <th>fddsf</th>
                                    <th>98755</th>
                                    <th>5</th>
                                    <th>90000</th>
                                </tr>
                                <tr>
                                    <th colspan="2">
                                        <p>Note : Lorem ipsum dolor sit amet.</p>
                                        <p>Order Number : Orderd.</p>
                                    </th>
                                    <th colspan="3">
                                        <p>Package wt & Dream</p>
                                        <p>564599888988</p>
                                    </th>
                                </tr>
                                <tr>
                                    <th colspan="2">
                                        <p>To : Johan Doe.</p>

                                        <p>
                                            Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                                            Reiciendis, unde! Lorem ipsum dolor sit amet, consectetur
                                            adipisicing elit. In, aut?
                                        </p>
                                        <p>Conteact Number : 87954455699</p>
                                    </th>
                                    <th colspan="3">
                                        <p>Maharastra</p>
                                        <p>5645998</p>
                                    </th>
                                </tr>
                                <tr>
                                    <th colspan="5" class="codebarss">
                                        <p>Maharastra</p>
                                        <img src="{{ url('assets/images/code.png') }}" />
                                        <p>5645998</p>
                                    </th>
                                </tr>
                                <tr>
                                    <td colspan="5" class="billl_footer">
                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laudantium,
                                            laboriosam.</p>
                                        <b>Test Pickup</b>
                                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Tempore hic non
                                            ipsum suscipit eaque eveniet quas fugiat maiores beatae architecto!</p>
                                        <p><b>Gst Number :</b> 989524898999</p>
                                        <p> <b>Mobile Number :</b> 989524898999</p>
                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime aspernatur
                                            optio numquam saepe eius fugiat. Temporibus nemo corrupti quas deleniti!</p>
                                        <b>Powered By : xyz</b>
                                    </td>
                                </tr>
                            </tbody>
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
                                            <input type="checkbox" data-size="xs" class="status-toggle"
                                                data-toggle="toggle" data-on="Active" data-off="active"
                                                data-status="{{ $setting->sold_by }}" data-id="{{ $setting->id }}">
                                        @endif
                                        <span class="slider round"></span>

                                    </td>
                                </tr>



                                <tr>
                                    <td>Shipping Address </td>
                                    <td>

                                        @if ($setting->shipping_address == 'true')
                                            <input type="checkbox" checked data-size="xs"
                                                class="status-toggle  shippeing" data-toggle="toggle" data-on="Active"
                                                data-off="Inactive" data-status="{{ $setting->shipping_address }}"
                                                data-id="{{ $setting->id }}">
                                        @else
                                            <input type="checkbox" data-size="xs" class="status-toggle  shippeing"
                                                data-toggle="toggle" data-on="Active" data-off="active"
                                                data-status="{{ $setting->shipping_address }}"
                                                data-id="{{ $setting->id }}">
                                        @endif

                                    </td>
                                </tr>






                                <tr>
                                    <td>Product Section </td>
                                    <td>
                                        @if ($setting->product_section == 'true')
                                            <input type="checkbox" checked data-size="xs" class="  Product"
                                                data-toggle="toggle" data-on="Active" data-off="Inactive"
                                                data-status="{{ $setting->product_section }}"
                                                data-id="{{ $setting->id }}">
                                        @else
                                            <input type="checkbox" data-size="xs" class="  Product" data-toggle="toggle"
                                                data-on="Active" data-off="active"
                                                data-status="{{ $setting->product_section }}"
                                                data-id="{{ $setting->id }}">
                                        @endif
                                    </td>
                                </tr>


                                <tr>
                                    <td>Declaration</td>
                                    <td>
                                        @if ($setting->declaration == 'true')
                                            <input type="checkbox" checked data-size="xs" class="declaration"
                                                data-toggle="toggle" data-on="Active" data-off="Inactive"
                                                data-status="{{ $setting->declaration }}"
                                                data-id="{{ $setting->id }}">
                                        @else
                                            <input type="checkbox" data-size="xs" class="declaration"
                                                data-toggle="toggle" data-on="Active" data-off="active"
                                                data-status="{{ $setting->declaration }}"
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
                                                data-status="{{ $setting->return_address }}"
                                                data-id="{{ $setting->id }}">
                                        @else
                                            <input type="checkbox" data-size="xs" class="return_address"
                                                data-toggle="toggle" data-on="Active" data-off="active"
                                                data-status="{{ $setting->return_address }}"
                                                data-id="{{ $setting->id }}">
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
                                                data-status="{{ $setting->display_logo }}"
                                                data-id="{{ $setting->id }}">
                                        @else
                                            <input type="checkbox" data-size="xs" class="display_logo"
                                                data-toggle="toggle" data-on="Active" data-off="active"
                                                data-status="{{ $setting->display_logo }}"
                                                data-id="{{ $setting->id }}">
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
