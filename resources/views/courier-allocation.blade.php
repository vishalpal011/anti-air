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


    <!-- Helpers -->
    <script src="assets/vendor/js/helpers.js"></script>
    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Template customizer: To hide customizer set displayCustomizer value false in config.js.  -->
    <script src="assets/vendor/js/template-customizer.js"></script>
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    {{-- <script src="assets/js/config.js"></script> --}}
</head>
<style>
    .custom-option-icon .custom-option-content {
        text-align: center;
        padding: 6px;
    }
</style>

{{-- switch button css --}}
<style>
                                    .switch {
    display: inline-block;
    position: relative;
    width: 50px;
    height: 25px;
    border-radius: 20px;
    background: #dfd9ea;
    transition: background 0.28s cubic-bezier(0.4, 0, 0.2, 1);
    vertical-align: middle;
    cursor: pointer;
    margin-top: 21px;
}
.switch::before {
    content: '';
    position: absolute;
    top: 1px;
    left: 2px;
    width: 22px;
    height: 22px;
    background: #fafafa;
    border-radius: 50%;
    transition: left 0.28s cubic-bezier(0.4, 0, 0.2, 1), background 0.28s cubic-bezier(0.4, 0, 0.2, 1), box-shadow 0.28s cubic-bezier(0.4, 0, 0.2, 1);
}
.switch:active::before {
    box-shadow: 0 2px 8px rgba(0,0,0,0.28), 0 0 0 20px rgba(128,128,128,0.1);
}
input:checked + .switch {
    background: #72da67;
}
input:checked + .switch::before {
    left: 27px;
    background: #fff;
}
input:checked + .switch:active::before {
    box-shadow: 0 2px 8px rgba(0,0,0,0.28), 0 0 0 20px rgba(0,150,136,0.2);
}
</style>
{{-- switch button css --}}

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
                            <span class="text-muted fw-light">Courier /</span> Courier Allocation
                        </h4>

                        <!-- Order List Widget -->

                        <div class="card mb-4">
                            <div class="card-widget-separator-wrapper">
                                <div class="card-body card-widget-separator">
                                    <div class="row gy-4 gy-sm-1">
                                        <div class="col-sm-6 col-lg-3">
                                            <div
                                                class="d-flex justify-content-between align-items-start card-widget-1 border-end pb-3 pb-sm-0">
                                                <div>
                                                    <h4 class="mb-2">{{ $deactive }}</h4>
                                                    <p class="mb-0 fw-medium">Deactive Allocation</p>
                                                </div>
                                                <span class="avatar me-sm-4">
                                                    <span class="avatar-initial bg-label-secondary rounded">
                                                        <i class="ti-md ti ti-calendar-stats text-body"></i>
                                                    </span>
                                                </span>
                                            </div>
                                            <hr class="d-none d-sm-block d-lg-none me-4">
                                        </div>
                                        <div class="col-sm-6 col-lg-3">
                                            <div
                                                class="d-flex justify-content-between align-items-start card-widget-2 border-end pb-3 pb-sm-0">
                                                <div>
                                                    <h4 class="mb-2">{{ $active }}</h4>
                                                    <p class="mb-0 fw-medium">Active Allocation</p>
                                                </div>
                                                <span class="avatar p-2 me-lg-4">
                                                    <span class="avatar-initial bg-label-secondary rounded"><i
                                                            class="ti-md ti ti-checks text-body"></i></span>
                                                </span>
                                            </div>
                                            <hr class="d-none d-sm-block d-lg-none">
                                        </div>
                                        <div class="col-sm-6 col-lg-3">
                                            <div
                                                class="d-flex justify-content-between align-items-start card-widget-2 border-end pb-3 pb-sm-0">
                                                <div>
                                                    <h4 class="mb-2"> </h4>
                                                    <p class="mb-0 fw-medium">
                                                        <button type="button" class="btn btn-sm btn-primary"
                                                            data-bs-toggle="modal" data-bs-target="#basicModal"><i
                                                                class='menu-icon tf-icons ti ti-location'></i>Add New
                                                        </button>
                                                    </p>
                                                    <div class="modal fade" id="basicModal" tabindex="-1"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel1">
                                                                        Add Allocation</h5>
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal"
                                                                        aria-label="Close"></button>
                                                                </div>
                                                                <form id="aws" method="post">
                                                                    <div class="modal-body">

                                                                        <div class="row g-2">
                                                                            <div class="col mb-0">
                                                                                <label for="select2Basic"
                                                                                    class="form-label">Client</label>
                                                                                <select name="client_id"
                                                                                    id="select2Basic"
                                                                                    class="select2 form-select form-select-lg"
                                                                                    data-allow-clear="true">
                                                                                    <option selected disabled>Search For
                                                                                        Clients</option>
                                                                                    @foreach ($client as $clients)
                                                                                        <option
                                                                                            value="{{ $clients->id }}">
                                                                                            {{ $clients->first_name }}
                                                                                            {{ $clients->last_name }}
                                                                                        </option>
                                                                                    @endforeach

                                                                                </select>
                                                                            </div>
                                                                            <div class="col mb-0">
                                                                                <label for="select2Basic2"
                                                                                    class="form-label">Courier</label>
                                                                                <select name="courier_id"
                                                                                    id="select2Basic2"
                                                                                    class="select2 form-select form-select-lg"
                                                                                    data-allow-clear="true">
                                                                                    <option selected disabled>Search For
                                                                                        Clients</option>
                                                                                    @foreach ($courier as $couriers)
                                                                                        <option
                                                                                            value="{{ $couriers->id }}">
                                                                                            {{ $couriers->courier_display_name }}
                                                                                        </option>
                                                                                    @endforeach



                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row g-2 pt-3">
                                                                            <div class="col-md-12 mb-0">
                                                                                <label for="">Priority</label>
                                                                                <select name="priority"
                                                                                    class="form-control"
                                                                                    id="" required>
                                                                                    <option selected disabled>--Select--
                                                                                    </option>

                                                                                    @for ($i = 1; $i <= 15; $i++)
                                                                                        <option
                                                                                            value="{{ $i }}">
                                                                                            {{ $i }}
                                                                                        </option>
                                                                                    @endfor

                                                                                </select>
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button"
                                                                            class="btn btn-label-secondary"
                                                                            data-bs-dismiss="modal">Close</button>
                                                                        <button type="submit"
                                                                            class="btn btn-primary">Upload</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>

                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Order List Table -->
                        <div class="card p-3">
                            <div class="card-datatable table-responsive">

                                <!-- filter section -->

                                <!-- filter section end -->
                                <table id="example" class="display nowrap" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>S.No.</th>
                                            <th>Client</th>
                                            <th>Courier</th>
                                            <th>Priority</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $count = 1;
                                        @endphp
                                        @foreach ($allocated as $allocateds)

                                            <tr id="row{{ $allocateds->id }}">

                                                <td>{{ $count }}</td>

                                                <td>{{ optional($allocateds->clients)->first_name }}
                                                    {{ optional($allocateds->clients)->last_name }}</td>
                                                      
                                                    <td>
                                                        <span id="add_courier_name{{ $allocateds->id }}"></span>

                                                        <span id="get_courier_name{{ $allocateds->id }}">{{ optional($allocateds->couriers)->courier_display_name }}</span>

                                                        <select id="dropdown_courier{{ $allocateds->id }}" class="form-control editselect2">
                                                            <option selected disabled>--Select Courier--</option>
                                                            @foreach ($courier as $couriers)
                                                                <option value="{{ $couriers->id }}">{{ $couriers->courier_display_name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </td>

                                                    <td>
                                                        <span id="add_priority{{ $allocateds->id }}"></span>

                                                        <span id="get_priority{{ $allocateds->id }}">{{ $allocateds->priority }}</span>

                                                        <select name="priority" id="dropdown_priority{{ $allocateds->id }}" class="form-control priority" required>
                                                            <option selected disabled>Select priority</option>
                                                            @for ($i = 1; $i <= $courier_count; $i++)
                                                                <option value="{{ $i }}">{{ $i }}</option>
                                                            @endfor
                                                        </select>
                                                    </td>

                                                <td>
                                                
                                                    @if ($allocateds->status == 'true')
                                                    
                                                    <input type="checkbox" hidden="hidden" value="{{ $allocateds->id }}" id="trueSwitchCheck_{{ $allocateds->id }}" checked>
                                                    <label class="switch" for="trueSwitchCheck_{{ $allocateds->id }}"></label>
                                                    
                                                    @else
                                                        <input type="checkbox"  hidden="hidden" value="{{ $allocateds->id }}" id="trueSwitchCheck_{{ $allocateds->id }}" >
                                                        <label class="switch" for="trueSwitchCheck_{{ $allocateds->id }}" ></label>
                                                       
                                                    @endif
                                                    
                                                </td>
                                                <td>
                                                    <a href="#" onclick="deleteModal({{ $allocateds->id }})">
                                                        <i class='menu-icon tf-icons ti ti-trash'></i>
                                                    </a>
                                                </td>
                                            </tr>


                                            @php
                                                $count++;
                                            @endphp
                                        @endforeach

                                    </tbody>

                                </table>
                            </div>
                        </div>

                    </div>


                    <!-- delete modal -->
                    <div class="modal modal-top fade" id="deleteModal" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog" role="document" style="width: 387px">
                            <div class="modal-content">
                                <div class="modal-body">

                                    <h5 class="text-center" style="margin-top: 16px;">Are You Want to Delete This
                                        Record ?</h5>
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal"
                                        style="    margin-left: 106px;">No</button>
                                    <button type="button" onclick="data_delete()" class="btn btn-success"
                                        data-bs-dismiss="modal">Yes</button>
                                </div>
                            </div>
                        </div>
                    </div>


                    <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            document.getElementById('aws').addEventListener('submit', function(e) {
                                e.preventDefault();

                                var csrfToken = document.head.querySelector('meta[name="csrf-token"]').content;
                                var formData = new FormData(this);


                                fetch("{{ url('create-courier-allocated') }}", {
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
                                                "progressBar": true,
                                                "timeOut": 15000
                                            };
                                            toastr.success(data.message);
                                            setTimeout(function() {

                                                window.location.href = '{{ url('courier-allocation') }}';
                                            }, 2000);
                                        } else {
                                            toastr.options = {
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

                    <!-- data delete ajax -->
                    <script>
                        function deleteModal(id) {
                            var modal = $('#deleteModal');
                            modal.data('id', id);
                            modal.modal('show');
                        }

                        function data_delete() {
                            var id = $('#deleteModal').data('id');
                            $.ajax({
                                url: '{{ url('delete-courier-allocated') }}',
                                type: 'post',
                                data: {
                                    id: id,
                                    _token: '{{ csrf_token() }}'
                                },
                                success: function(result) {
                                    toastr.options = {
                                        "closeButton": true,
                                        "progressBar": true,
                                        "timeOut": 15000
                                    };
                                    toastr.success(result);
                                    jQuery('#row' + id).hide('slow');
                                }
                            });
                        }
                    </script>



                    {{-- Updations --}}
                    <script>
                        // $(document).ready(function() {
                        //     $('[id^="editselect2"], [id^="priority"]').on('change', function() {
                        //         var selectedClientId = $(this).val();
                        //         var elementId = $(this).attr('id');
                        //         var clientId = elementId.split('_')[1];
                        //         var selectedOptionValue = $(this).val();
                        //         var selectedItemName = $(this).find('option:selected').text();

                        //         var requestData = {
                        //             _token: '{{ csrf_token() }}',
                        //             id: clientId,
                        //             courier_id: selectedOptionValue,
                        //             selectedName: selectedItemName
                        //         };

                        //         if (elementId.indexOf('editselect2') === 0) {
                        //             requestData.element_type = 'editselect2';
                        //         } else if (elementId.indexOf('priority') === 0) {
                        //             requestData.element_type = 'priority';
                        //         }

                        //         $.ajax({
                        //             url: '{{ url('update-courier-allocateds') }}',
                        //             method: 'POST',
                        //             data: requestData,
                        //             success: function(response) {
                        //                 if (response.status === 'editselect2')
                        //                 {
                        //                     $('#select2Basics_' + clientId).html(response.message);
                        //                     $("#select2Basics_" + clientId).show();
                        //                     $("#hide_" + clientId).hide();
                        //                 }
                        //                 else if (response.status === 'priority')
                        //                 {

                        //                     $('#priority_' + clientId).html(response.message);
                        //                     $("#priority_" + clientId).show();
                        //                     $("#hidep_" + clientId).hide();
                        //                 }
                        //             },
                        //             error: function(error) {
                        //                 console.error(error);
                        //                 alert('Error occurred while processing your request. Please try again.');
                        //             }
                        //         });
                        //     });
                        // });
                    </script>

                @foreach ($allocated as $allocateds)
                    <script>

                        // dropdown_courier
                        $("#dropdown_courier{{ $allocateds->id }}").change(function() {
                            var courierval = $('#dropdown_courier{{ $allocateds->id }}').val();
                            $.ajax({
                                url:'{{url('update-courier-allocateds')}}',
                                type:'POST',
                                data:{
                                    id:'{{ $allocateds->id }}',
                                    courier_value:courierval,
                                    _token:'{{csrf_token()}}'
                                },
                                success:function(result){
                                    if(result.message=='successfully')
                                    {
                                        $('#get_courier_name{{ $allocateds->id }}').css('display','none');
                                        $('#add_courier_name{{ $allocateds->id }}').html(result.courier_name);
                                    }
                                }
                            });
                        });


                        // dropdown_priority
                        $("#dropdown_priority{{ $allocateds->id }}").change(function() {
                            var priority = $('#dropdown_priority{{ $allocateds->id }}').val();
                            $.ajax({
                                url:'{{url('update-courier-allocateds')}}',
                                type:'POST',
                                data:{
                                    id:'{{ $allocateds->id }}',
                                    priority:priority,
                                    type:'priority',
                                    _token:'{{csrf_token()}}'
                                },
                                success:function(result){
                                    if(result.message=='successfully')
                                    {
                                        $('#get_priority{{ $allocateds->id }}').css('display','none');
                                        $('#add_priority{{ $allocateds->id }}').html(result.priority);
                                    }
                                }
                            });
                        });
                    </script>


<script>
   $(document).ready(function() {
        $('#trueSwitchCheck_{{ $allocateds->id }}').click(function() {
            var status_value = $(this).prop('checked') ? 'true' : 'false';
            var id =  $('#trueSwitchCheck_{{ $allocateds->id }}').val();
            $.ajax({
                url:'{{url('allocation-status')}}',
                type:'POST',
                data:{
                    id:id,
                    status:status_value,
                    _token:'{{csrf_token()}}'
                },
                success:function(result){
                    
                }
            });
            
        });
    });
</script>

                @endforeach    

                    {{-- <script>
                        $(document).ready(function()
                        {
                            $('[id^="editselect2"], [id^="priority"]').on('change', function()
                            {
                                var selectedClientId = $(this).val();
                                var elementId = $(this).attr('id');
                                var clientId = elementId.split('_')[1];

                                var selectedOptionValue = $(this).val();
                                var selectedItemName = $(this).find('option:selected').text();

                                if (elementId.indexOf('editselect2') === 0)
                                {
                                     $.ajax({
                                        url: '{{ url('update-courier-allocateds') }}',
                                        method: 'POST',
                                        data: {
                                            _token: '{{ csrf_token() }}',
                                            id: clientId,
                                            courier_id : selectedOptionValue,
                                            element_type: elementId.indexOf('editselect2'),
                                            selectedName: selectedItemName,
                                        },
                                        success: function(response)
                                        {
                                            console.log(response.message);
                                            $('#select2Basics').html(response.message);
                                            $("#select2Basics").show();
                                            $("#hide").hide();
                                        },
                                        error: function(error)
                                        {
                                            alert(error);
                                            console.error(error);
                                        }
                                    });


                                }
                                else if (elementId.indexOf('priority') === 0)
                                {
                                    $.ajax({
                                        url: '{{ url('update-courier-allocateds') }}',
                                        method: 'POST',
                                        data: {
                                            _token: '{{ csrf_token() }}',
                                            id: clientId,
                                            courier_id: selectedOptionValue,
                                            element_type: elementId.indexOf('editselect2') !== -1 ? 'editselect2' : 'priority', // Check if elementId contains 'editselect2'
                                            selectedName: selectedItemName,
                                        },
                                        success: function(response)
                                        {
                                            if (response.status == 'editselect2')
                                            {
                                                $('#select2Basics_' + clientId).html(response.message);
                                                $("#select2Basics_" + clientId).show();
                                                $("#hide_" + clientId).hide();
                                            }
                                            else
                                            {
                                                console.log(response.message);
                                                // Handle success response for priority
                                                $('#priority_' + clientId).html(response.message);
                                                $("#priority_" + clientId).show();
                                                $("#hide_priority_" + clientId).hide();
                                            }
                                        },
                                        error: function(error) {
                                            console.error(error);
                                            // Handle error response as needed
                                        }
                                    });

                                 }
                            });
                        });
                    </script> --}}





                    <!-- data filter -->

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

                    <script>
                        $(document).ready(function() {
                            $('#example').DataTable({
                                dom: 'Bfrtip',
                                buttons: [
                                    'copy', 'csv', 'excel', 'pdf', 'print'
                                ]
                            });
                        });
                    </script>

                    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
                    <script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
                    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>
                    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.print.min.js"></script>
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"
                        integrity="sha512-lbwH47l/tPXJYG9AcFNoJaTMhGvYWhVM9YI43CT+uteTRRaiLCui8snIgyAN8XWgNjNhCqlAUdzZptso6OCoFQ=="
                        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</body>


</html>
