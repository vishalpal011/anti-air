<!DOCTYPE html>

<html lang="en" dir="ltr" data-theme="theme-default" data-assets-path="assets/"
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
    <link rel="stylesheet" href="assets/vendor/libs/bs-stepper/bs-stepper.css" />
    <link rel="stylesheet" href="assets/vendor/libs/select2/select2.css" />
    <link rel="stylesheet" href="assets/vendor/libs/tagify/tagify.css" />
    <link rel="stylesheet" href="assets/vendor/libs/flatpickr/flatpickr.css" />
    <link rel="stylesheet" href="assets/vendor/libs/%40form-validation/umd/styles/index.min.css" />
    <link rel="stylesheet" href="assets/vendor/libs/select2/select2.css" />

    <!-- Page CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css"
        integrity="sha512-6S2HWzVFxruDlZxI3sXOZZ4/eJ8AcxkQH1+JjSe/ONCEqR9L4Ysq5JdT5ipqtzU7WHalNwzwBv+iE51gNHJNqQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Helpers -->
    <script src="assets/vendor/js/helpers.js"></script>
    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Template customizer: To hide customizer set displayCustomizer value false in config.js.  -->
    <script src="assets/vendor/js/template-customizer.js"></script>
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="assets/js/config.js"></script>

</head>

<body>



    <div class="layout-wrapper layout-content-navbar  ">
        <div class="layout-container">

            <div class="layout-page">
                <!-- Navbar -->
                @include('layouts.header')
                <!-- / Navbar -->
                <!-- Content wrapper -->
                <div class="content-wrapper">

                    <div class="container-xxl flex-grow-1 container-p-y">

                        <h4 class="py-3 mb-4">
                            <span class="text-muted fw-light">Booking/</span>
                            Update Booking-B2C / <a href="{{ url('forword-Booking-B2C') }}"><button
                                    class="btn btn-label-primary "><i class="fa fa-arrow-left"
                                        aria-hidden="true"></i></button></a>

                        </h4>
                        <div class="tab-content bg-white" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                                aria-labelledby="pills-home-tab">
                                <form action="{{ url('update-booking-b2c') }}" method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-4">
                                            <Label>Order No</Label>
                                            <input type="text" class="form-control" name="OrderNo"
                                                value="{{ $booking->order_no }}">
                                            <input type="text" name="booking_id" value="{{ $booking->id }}">
                                        </div>
                                        <div class="col-md-4">
                                            <Label>Awb No</Label>
                                            <input type="text" class="form-control" name="awb_no"
                                                value="{{ $booking->awb_no }}">
                                        </div>
                                        <div class="col-md-4">
                                            <Label>Business Type</Label>
                                            <input type="text" class="form-control" name="business_type" readonly
                                                value="{{ $booking->business_type }}">
                                        </div>
                                        <div class="col-md-4 pt-2">
                                            <Label>Payment Mode</Label>
                                            <input type="text" class="form-control" name="PaymentMode"
                                                value="{{ $booking->payment_mode }}">
                                        </div>
                                        <div class="col-md-4 pt-2">
                                            <Label>Item Price</Label>
                                            <input type="text" class="form-control" name="ItemPrice"
                                                value="{{ $booking->item_price }}">
                                        </div>
                                        <div class="col-md-4 pt-2">
                                            <Label>COD Due</Label>
                                            <input type="text" class="form-control" name="CODDue"
                                                value="{{ $booking->cod_due }}">
                                        </div>
                                        <div class="col-md-4 pt-2">
                                            <Label>Receiver Name</Label>
                                            <input type="text" class="form-control" name="receiver_name "
                                                value="{{ $booking->receiver_name }}">
                                        </div>
                                        <div class="col-md-4 pt-2">
                                            <Label>Receiver Address</Label>
                                            <textarea class="form-control" name="receiver_address" cols="30" rows="5">{{ $booking->receiver_address }}</textarea>
                                        </div>
                                        <div class="col-md-4 pt-2">
                                            <Label>Receiver Address 2</Label>
                                            <textarea class="form-control" name="receiver_address_2" cols="30" rows="5">{{ $booking->receiver_address_2 }}</textarea>
                                        </div>
                                        <div class="col-md-4 pt-2">
                                            <Label>Receiver State</Label>
                                            <input type="text" class="form-control" name="receiver_state"
                                                value="{{ $booking->receiver_state }}">
                                        </div>
                                        <div class="col-md-4 pt-2">
                                            <Label>Receiver City </Label>
                                            <input type="text" class="form-control" name="receiver_city "
                                                value="{{ $booking->receiver_city }}">
                                        </div>
                                        <div class="col-md-4 pt-2">
                                            <Label>Receiver Pincode</Label>
                                            <input type="text" class="form-control" name="receiver_pincode "
                                                value="{{ $booking->receiver_pincode }}">
                                        </div>
                                        <div class="col-md-4 pt-2">
                                            <Label>Receiver Contact No.</Label>
                                            <input type="text" class="form-control" name="receiver_contact"
                                                value="{{ $booking->receiver_contactno }}">
                                        </div>
                                        <div class="col-md-4 pt-2">
                                            <Label>Receiver Alt Contact No</Label>
                                            <input type="text" class="form-control" name="ReceiverAltContactNo"
                                                value="{{ $booking->receiver_alt_contactno }}">
                                        </div>
                                        <div class="col-md-4 pt-2">
                                            <Label>Item SKU</Label>
                                            <input type="text" class="form-control" name="ItemSKU"
                                                value="{{ $booking->item_sku }}">
                                        </div>
                                        <div class="col-md-4 pt-2">
                                            <Label>Item Name</Label>
                                            <input type="text" class="form-control" name="ItemName"
                                                value="{{ $booking->item_name }}">
                                        </div>
                                        <div class="col-md-4 pt-2">
                                            <Label>Item Height (In CM)</Label>
                                            <input type="text" class="form-control" name="ItemHeight"
                                                value="{{ $booking->item_height }}">
                                        </div>
                                        <div class="col-md-4 pt-2">
                                            <Label>Item Length (In CM)</Label>
                                            <input type="text" class="form-control" name="ItemLength"
                                                value="{{ $booking->item_length }}">
                                        </div>
                                        <div class="col-md-4 pt-2">
                                            <Label>Item Weight (KG)*</Label>
                                            <input type="text" class="form-control" name="ItemWeight"
                                                value="{{ $booking->item_weight }}">
                                        </div>
                                        <div class="col-md-4 pt-2">
                                            <Label>Item Width (In CM)</Label>
                                            <input type="text" class="form-control" name="ItemWidth"
                                                value="{{ $booking->item_Width }}">
                                        </div>

                                        <div class="col-md-4 pt-2">
                                            <Label>Item Qty</Label>
                                            <input type="text" class="form-control" name="ItemQty"
                                                value="{{ $booking->item_qty }}">
                                        </div>
                                        <div class="col-md-4 pt-2">
                                            <Label>Order Type</Label>
                                            <input type="text" class="form-control" name="OrderType"
                                                value="{{ $booking->order_type }}">
                                        </div>
                                        <div class="col-md-4 pt-2">
                                            <Label>Item Width (In CM)</Label>
                                            <input type="text" class="form-control" name="ItemWidth"
                                                value="{{ $booking->item_Width }}">
                                        </div>
                                        <div class="col-md-4 pt-2">
                                            <label for="select2Basic" class="form-label">Client</label>
                                            <select name="client_id" id="select2Basic"
                                                class="select2 form-select form-select-lg" data-allow-clear="true">
                                                <option selected disabled>Search For Client</option>
                                                <option selected value="{{ $client->id ?? null }}">
                                                    {{ $client->first_name ?? null }}</option>

                                                {{-- @foreach ($client as $val)
                                                    <option value="{{ $val->id }}">
                                                        {{ $val->first_name }}
                                                        {{ $val->last_name }}
                                                    </option>
                                                @endforeach --}}
                                            </select>
                                        </div>
                                        <div class="col-md-4 pt-2">
                                            <label for="select2Basic" class="form-label">warehouse</label>
                                            <select name="warehouse_id" id="select2Basics"
                                                class="select2 form-select form-select-lg" data-allow-clear="true">
                                                <option selected disabled>Search For
                                                    warehouse</option>
                                                @foreach ($warehouse as $ware)
                                                    <option value="{{ $ware->id }}">{{ $ware->warehouse_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-12 d-flex justify-content-between mt-4">
                                            <button class="btn btn-label-secondary btn-prev"> <i
                                                    class="ti ti-arrow-left ti-xs me-sm-1 me-0"></i>
                                                <span class="align-middle d-sm-inline-block d-none">Go Back</span>
                                            </button>
                                            <button class="btn btn-success btn-submit btn-next"><span
                                                    class="align-middle d-sm-inline-block d-none me-sm-1">Submit</span><i
                                                    class="ti ti-check ti-xs"></i></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane fade" id="pills-profile" role="tabpanel"
                                aria-labelledby="pills-profile-tab">
                                ...
                            </div>
                        </div>



                    </div>

                    <div class="content-backdrop fade"></div>
                </div>
                <!-- Content wrapper -->
            </div>
            <!-- / Layout page -->
        </div>


</body>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(document).ready(function() {


        $('#button').click(function() {


            $("#overlay").fadeIn(300);
            var formData = new FormData($('#myForm')[0]);
            var csrfToken = $('meta[name="csrf-token"]').attr('content');

            fetch("{{ url('upload-bulkbooking') }}", {
                    method: "POST",
                    body: formData,
                    headers: {
                        'X-CSRF-TOKEN': csrfToken,
                    },
                })
                .then(response => response.json())
                .then(data => {

                    if (data.status === 'success') {
                        setTimeout(function() {
                            $("#overlay").fadeOut(300);
                            // window.location.href = '{{ url('all-booking') }}';
                        }, 500);
                        $('#modalCenter').modal('hide');
                        Swal.fire({
                            title: data.status,
                            text: data.message,
                            imageUrl: "{{ url('images/success.gif') }}",
                            imageWidth: 400,
                            imageHeight: 240,
                            imageAlt: "Custom image"
                        });
                    } else {
                        $('#modalCenter').modal('hide');
                        Swal.fire({
                            title: 'Error!',
                            text: data.message,
                            icon: 'error',
                            confirmButtonText: 'Close'
                        })
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    // Handle error or show an appropriate message
                });
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
                url: '{{ url('get-warehouse') }}',
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    client_id: selectedClientId
                },
                success: function(response) {
                    $('#select2Basics').html(response);
                },
                error: function(error) {
                    console.error(error);
                }
            });
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
<script src="assets/vendor/libs/cleavejs/cleave.js"></script>
<script src="assets/vendor/libs/cleavejs/cleave-phone.js"></script>
<script src="assets/vendor/libs/bs-stepper/bs-stepper.js"></script>
<script src="assets/vendor/libs/select2/select2.js"></script>
<script src="assets/vendor/libs/tagify/tagify.js"></script>
<script src="assets/vendor/libs/flatpickr/flatpickr.js"></script>
<script src="assets/vendor/libs/%40form-validation/umd/bundle/popular.min.js"></script>
<script src="assets/vendor/libs/%40form-validation/umd/plugin-bootstrap5/index.min.js"></script>
<script src="assets/vendor/libs/%40form-validation/umd/plugin-auto-focus/index.min.js"></script>

<!-- Main JS -->
<script src="assets/js/main.js"></script>

<!-- Page JS -->
<script src="assets/js/forms-selects.js"></script>
<script src="assets/js/wizard-ex-property-listing.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"
    integrity="sha512-lbwH47l/tPXJYG9AcFNoJaTMhGvYWhVM9YI43CT+uteTRRaiLCui8snIgyAN8XWgNjNhCqlAUdzZptso6OCoFQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</body>


</html>
