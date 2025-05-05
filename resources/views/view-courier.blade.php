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
                            <span class="text-muted fw-light">Courier /</span>All Courier
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
                                                    <p class="mb-0 fw-medium">Deactive Courier</p>
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
                                                    <p class="mb-0 fw-medium">Active Courier</p>
                                                </div>
                                                <span class="avatar p-2 me-lg-4">
                                                    <span class="avatar-initial bg-label-secondary rounded"><i
                                                            class="ti-md ti ti-checks text-body"></i></span>
                                                </span>
                                            </div>
                                            <hr class="d-none d-sm-block d-lg-none">
                                        </div>


                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Order List Table -->
                        <div class="card p-3">
                            <div class="p-4">
                                  <!-- filter section -->
                                  <div class="row">
                                        <div class="col-md-3">
                                            <label>Date : From</label>
                                            <input type="date" id="filterFrom" class="form-control">
                                        </div>
                                        <div class="col-md-3">
                                            <label for="">Date : To</label>
                                            <input type="date" id="filterTo" class="form-control">
                                        </div>
                                        <div class="col-md-3">
                                            <label>Latest/Oldest</label>
                                            <select id="latest_oldest" class="form-control">
                                                <option value="" selected>--Choose--</option>
                                                <option value="DESC">Latest</option>
                                                <option value="ASC">Oldest</option>
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <br>
                                            <button type="button" onclick="Datafilter()" class="btn btn-primary">Filter</button>
                                        </div>
                                    </div>
                                    <br>
                               <!-- filter section end -->
                                <div class="row">
                                    <div class="col-md-4">
                                        <select name="status" class="form-control" id="statusDropdown">
                                            <option selected disabled>Select Status</option>
                                            <option value="true">Active</option>
                                            <option value="false">Deactive</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <button class="btn btn-primary" id="changeStatusButton">Change Status</button>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="card-datatable table-responsive">
                              
                                <table id="example" class="display nowrap" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th><input type="checkbox" id="selectAllCheckbox"> Select</th>
                                            <th>S.No.</th>
                                            <th>Courier Code</th>
                                            <th>Courier Display Name</th>
                                            <th>Courier Registration Name</th>
                                            <th>Courier Rates</th>
                                            <th>Courier Cod Cycle</th>
                                            <th>Courier Zone</th>
                                            <th>Courier Billing</th>
                                            <th>Courier Loss</th>
                                            <th>Courier Weight</th>
                                            <th>Weight Dispute Timeline</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $count = 1;
                                        @endphp
                                        @foreach ($data as $value)
                                            <tr id="row{{ $value->id }}">
                                                <td><input type="checkbox" class="item-checkbox"
                                                        value="{{ $value->id }}"></td>
                                                <td>{{ $count }}</td>
                                                <td>{{ $value->courier_id }}</td>
                                                <td>{{ $value->courier_display_name }}</td>
                                                <td>{{ $value->courier_registration_name }}</td>

                                                <td>{{ $value->courier_rates }}</td>
                                                <td>{{ $value->courier_cod_cycle }}</td>
                                                <td>{{ $value->courier_zone }}</td>
                                                <td>{{ $value->courier_billing }}</td>
                                                <td>{{ $value->courier_loss }}</td>
                                                <td>{{ $value->courier_weight }}</td>
                                                <td>{{ $value->weight_dispute_timeline }}</td>

                                                <td>
                                                    @if ($value->status == 'true')
                                                        <span class="badge bg-success">Active</span>
                                                    @else
                                                        <span class="badge bg-danger">Deactive</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{ url('edit-courier') }}/{{ $value->id }}">
                                                        <i class='menu-icon tf-icons ti ti-edit'></i>
                                                    </a>
                                                    &nbsp;
                                                    
                                                    <a href="#" onclick="deleteModal({{ $value->id }})">
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
                               <div class="modal modal-top fade" id="deleteModal" tabindex="-1"
                                                aria-hidden="true">
                                                <div class="modal-dialog" role="document" style="width: 387px">
                                                    <div class="modal-content">
                                                            <div class="modal-body">
                                                               
                                                                 <h5 class="text-center" style="margin-top: 16px;">Are You Want to Delete This Record ?</h5>
                                                                 <button type="button" class="btn btn-danger"
                                                                    data-bs-dismiss="modal" style="    margin-left: 106px;">No</button>
                                                                <button type="button" onclick="data_delete()"
                                                                    class="btn btn-success" data-bs-dismiss="modal">Yes</button>
                                                            </div>
                                                    </div>
                                                </div>
                                            </div>

                    <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            // Handle change status button click
                            document.getElementById('changeStatusButton').addEventListener('click', function() {
                                // Get selected status from the dropdown
                                var selectedStatus = document.getElementById('statusDropdown').value;

                                // Get all selected checkboxes
                                var selectedCheckboxes = document.querySelectorAll('.item-checkbox:checked');

                                var selectedIds = Array.from(selectedCheckboxes).map(function(checkbox) {
                                    return checkbox.value;
                                });

                                if (selectedIds.length > 0) {
                                    // Assuming you have a route named 'updateStatus' in your Laravel routes
                                    var url = '{{ route('updateStatus') }}';

                                    fetch(url, {
                                            method: 'POST',
                                            headers: {
                                                'Content-Type': 'application/json',
                                                'X-CSRF-TOKEN': '{{ csrf_token() }}', // Add this line if you're using CSRF protection
                                            },
                                            body: JSON.stringify({
                                                ids: selectedIds,
                                                status: selectedStatus
                                            }),
                                        })
                                        .then(response => response.json())
                                        .then(data => {
                                            // Handle success, if needed
                                            // console.log(data);
                                            if (data.status === 'success') {

                                            window.location.href = "{{ url('view-Courier') }}";
                                            } else {

                                            }
                                        })
                                        .catch(error => {
                                            // Handle error, if needed
                                            console.error(error);
                                        });
                                }
                            });

                            // Handle "Select All" checkbox
                            document.getElementById('selectAllCheckbox').addEventListener('change', function() {
                                var checkboxes = document.querySelectorAll('.item-checkbox');
                                checkboxes.forEach(function(checkbox) {
                                    checkbox.checked = document.getElementById('selectAllCheckbox').checked;
                                });
                            });
                        });
                    </script>
 


<!-- data delete ajax -->
<script>
function deleteModal(id){
        var modal = $('#deleteModal');
        modal.data('id', id);
        modal.modal('show');
}

    function data_delete(){
        var id = $('#deleteModal').data('id');
            $.ajax({
                 url: '{{url('delete-courier')}}',
                 type: 'post',
                 data: {
                    id:id,
                    _token: '{{csrf_token()}}'
                 },
                 success: function(result) {
                     toastr.options = {
                      "closeButton": true,
                      "progressBar": true,
                      "timeOut": 15000
                     };
                    toastr.success(result);
                    jQuery('#row'+id).hide('slow');
                 }
                });
        }
</script>


<!-- data filter -->
<script>
    function Datafilter(){
        var from = $('#filterFrom').val();
        var to = $('#filterTo').val();
        var latest_oldest = $('#latest_oldest').val();

        $.ajax({
            url: '{{ url('courier-data-filter') }}',
            type: 'POST',
            data: {
                from: from,
                to: to,
                latest_oldest: latest_oldest,
                _token: '{{ csrf_token() }}'
            },
            success: function (result) {
                if(result=='')
                {
                    toastr.options = {
                      "closeButton": true,
                      "progressBar": true,
                      "timeOut": 15000
                    };
                    toastr.info('Data Not Found');
                }
                else
                {
                    // remove old data rows
                    $("table#example tbody").empty();

                    $.each(result, function (key, value) {
                        if (value.status == 'true') {
                            status = '<span class="badge bg-success">Active</span>';
                        }  else {
                            status = '<span class="badge bg-danger">Deactive</span>';
                        }

                        var inputcheck = '<input type="checkbox" class="item-checkbox" value="' + value.id + '">';


                        var editButton = '<a href="{{url('edit-courier')}}/' + value.id + '"> <i class="menu-icon tf-icons ti ti-edit"></i> </a>';


                        var deleteButton = '<a href="#" onclick="deleteModal('+ value.id +')"><i  class="menu-icontf-icons ti ti-trash"></i></a>';

                        //  after get data put on table   
                        $("table#example").append("<tr id='row" + value.id + "'><td>" + inputcheck + "</td><td>" + value.id + "</td><td>" + value.courier_id + "</td><td>" + value.courier_display_name + "</td><td>" + value.courier_registration_name + "</td><td>" + value.courier_rates + "</td><td>" + value.courier_cod_cycle + "</td><td>" + value.courier_zone + "</td><td>" + value.courier_billing + "</td><td>" + value.courier_loss + "</td><td>" + value.courier_weight + "</td><td>" + value.weight_dispute_timeline + "</td><td>" + status + "</td><td>" + editButton + deleteButton +"</td> </tr>");
                    });
                }
           
            }
        });
    }
</script>

                    @include('layouts.footer')
