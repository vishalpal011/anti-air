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
    <script src="assets/vendor/js/helpers.js"></script>
    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Template customizer: To hide customizer set displayCustomizer value false in config.js.  -->
    <script src="assets/vendor/js/template-customizer.js"></script>
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    {{-- <script src="assets/js/config.js"></script> --}}
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
                            <span class="text-muted fw-light">Label /</span> Designs
                        </h4>

                        <!-- Order List Widget -->

                        <!-- Order List Table -->
                        <div class="card p-3">

                            {{-- <div class="invoice-box">
                                <table cellpadding="0" cellspacing="0">
                                    <tr class="top_rw">
                                        <td colspan="2">
                                            <h2 style="margin-bottom: 0px;"> Tax invoice/Bill of Supply/Cash memo </h2>
                                            <span style=""> Number: 27B00032991LQ354 Date: 21-11-2018 </span>
                                        </td>
                                        <td style="width:30%; margin-right: 10px;">
                                            PaytmMall Order Id: 6580083283
                                        </td>
                                    </tr>
                                    <tr class="top">
                                        <td colspan="3">
                                            <table>
                                                <tr>
                                                    <td>
                                                        <b> Sold By: Nova Enterprises </b> <br>
                                                        Delhivery Pvt. Ltd. Plot No. A5 Indian Corporation <br>
                                                        warehouse Park Village Dive-anjur, Bhiwandi, Off <br>
                                                        Nh-3, Near Mankoli Naka, District Thane, Pin Code :
                                                        421302 <br>
                                                        Mumbai, Maharashtra - 421302 <br>
                                                        PAN: AALFN0535C <br>
                                                        GSTIN: 27AALFN0535C1ZK <br>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                    <tr class="information">
                                        <td colspan="3">
                                            <table>
                                                <tr>
                                                    <td colspan="2">
                                                        <b> Shipping Address: w3learnpoint </b> <br>
                                                        Kokar, Ranchi <br>
                                                        +0651-908-090-009<br>
                                                        info@w3learnpoint.com<br>
                                                        www.w3learnpoint.com
                                                    </td>
                                                    <td> <b> Billing Address: w3learnpoint </b><br>
                                                        Acme Corp.<br>
                                                        John Doe<br>
                                                        john@example.com
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                    <td colspan="3">
                                        <table cellspacing="0px" cellpadding="2px">
                                            <tr class="heading">
                                                <td style="width:25%;">
                                                    ITEM
                                                </td>
                                                <td style="width:10%; text-align:center;">
                                                    QTY.
                                                </td>
                                                <td style="width:10%; text-align:right;">
                                                    PRICE (INR)
                                                </td>
                                                <td style="width:15%; text-align:right;">
                                                    TAX RATE & TYPE
                                                </td>
                                                <td style="width:15%; text-align:right;">
                                                    TAX AMOUNT (INR)
                                                </td>
                                                <td style="width:15%; text-align:right;">
                                                    TOTAL AMOUNT (INR)
                                                </td>
                                            </tr>
                                            <tr class="item">
                                                <td style="width:25%;">
                                                    Johnson's Baby Skincare Wipes 80s
                                                    Pack Of 2 Rs. 60 Off
                                                    HSN Code :4818
                                                    novajj079
                                                </td>
                                                <td style="width:10%; text-align:center;">
                                                    2
                                                </td>
                                                <td style="width:10%; text-align:right;">
                                                    322.03
                                                </td>
                                                <td style="width:15%; text-align:right;">
                                                    18% IGST
                                                </td>
                                                <td style="width:15%; text-align:right;">
                                                    57.97
                                                </td>
                                                <td style="width:15%; text-align:right;">
                                                    380
                                                </td>
                                            </tr>
                                            <tr class="item">
                                                <td style="width:25%;"> <b> Grand Total </b> </td>
                                                <td style="width:10%; text-align:center;">
                                                    2
                                                </td>
                                                <td style="width:10%; text-align:right;">
                                                    322.03
                                                </td>
                                                <td style="width:15%; text-align:right;">
                                                </td>
                                                <td style="width:15%; text-align:right;">
                                                    57.97
                                                </td>
                                                <td style="width:15%; text-align:right;">
                                                    380
                                                </td>
                                            </tr>
                                    </td>
                                </table>
                                <tr class="total">
                                    <td colspan="3" align="right"> Total Amount in Words : <b> Three Hundred Eighty
                                            Rupees Only </b> </td>
                                </tr>
                                <tr>
                                    <td colspan="3">
                                        <table cellspacing="0px" cellpadding="2px">
                                            <tr>
                                                <td width="50%">
                                                    <b> Declaration: </b> <br>
                                                    We declare that this invoice shows the actual price of the goods
                                                    described above and that all particulars are true and correct. The
                                                    goods sold are intended for end user consumption and not for resale.
                                                </td>
                                                <td>
                                                    * This is a computer generated invoice and does not
                                                    require a physical signature
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="50%">
                                                </td>
                                                <td>
                                                    <b> Authorized Signature </b>
                                                    <br>
                                                    <br>
                                                    ...................................
                                                    <br>
                                                    <br>
                                                    <br>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                </table>
                            </div> --}}

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="card" style="width: 18rem;">
                                        <img class="card-img-top" src="{{url('assets/images/4x4.png')}}" alt="Card image cap">
                                        <div class="card-body">
                                          <p class="card-text"> 4*4 Label</p>
                                          <ul style="display: flex; list-style:none;">
                                            <li>
                                                <a href="{{ url('edit-label-4x4') }}">
                                                    <button class="btn btn-primary">Edit</button>
                                                </a>
                                            </li>

                                        </ul>
                                        </div>
                                      </div>

                                </div>
                                <div class="col-md-4">
                                    <div class="card" style="width: 18rem;">
                                        <img class="card-img-top" src="{{url('assets/images/4.5.png')}}" alt="Card image cap">
                                        <div class="card-body">
                                          <p class="card-text">   4.5*6.25 Label</p>
                                          <ul style="display: flex; list-style:none;">
                                            <li>
                                                <a href="{{ url('edit-label-4.5x6.25') }}">
                                                    <button class="btn btn-primary">Edit</button>
                                                </a>
                                            </li>


                                        </ul>
                                        </div>
                                      </div>


                                </div>
                                <div class="col-md-4">
                                    <div class="card" style="width: 18rem;">
                                        <img class="card-img-top" src="{{url('assets/images/4x6.png')}}" alt="Card image cap">
                                        <div class="card-body">
                                          <p class="card-text"> 4*6 Label</p>
                                          <ul style="display: flex; list-style:none;">
                                                <li>
                                                    <a href="{{ url('edit-label-4x6') }}">
                                                        <button class="btn btn-primary">Edit</button>
                                                    </a>
                                                </li>

                                           </ul>
                                        </div>
                                      </div>
                                 </div>
                            </div>
                            <div class="row pt-3">
                                <div class="col-md-4">
                                    <div class="card" style="width: 18rem;">
                                        <img class="card-img-top" src="{{url('assets/images/defualt.png')}}" alt="Card image cap">
                                        <div class="card-body">
                                          <p class="card-text">Default Label</p>
                                          <ul style="display: flex; list-style:none;">
                                                <li>
                                                    <a href="{{ url('default') }}">
                                                        <button class="btn btn-primary">Edit</button>
                                                    </a>
                                                </li>

                                           </ul>
                                        </div>
                                      </div>
                                 </div>


                            </div>

                        </div>

                    </div>
                    <!-- / Content -->



                    <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            var toggleCheckbox = document.getElementById('customRadioIcon1');
                            var div1 = document.getElementById('div1');
                            var div2 = document.getElementById('div2');
                            var div3 = document.getElementById('div3');

                            toggleCheckbox.addEventListener('change', function() {
                                if (toggleCheckbox.checked) {
                                    // If checkbox is checked, show div1 and hide div2
                                    div1.classList.remove('hidden');
                                    div2.classList.add('hidden');
                                    div3.classList.add('hidden');
                                } else {
                                    // If checkbox is unchecked, show div2 and hide div1
                                    div2.classList.remove('hidden');
                                    div1.classList.add('hidden');
                                }
                            });
                        });
                    </script>

                    <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            document.getElementById('save').addEventListener('submit', function(e) {
                                e.preventDefault();

                                var csrfToken = document.head.querySelector('meta[name="csrf-token"]').content;
                                var formData = new FormData(this);

                                alert("Are You Sure want to save this")

                                fetch("{{ url('save-label') }}", {
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

                                                window.location.href = '{{ url('view-Courier') }}';
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
                    @include('layouts.footer')
