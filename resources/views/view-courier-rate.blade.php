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
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<!-- end toster alert -->
<link
rel="stylesheet"
href="https://site-assets.fontawesome.com/releases/v5.15.4/css/all.css"
>
    <!-- Helpers -->
    <script src="assets/vendor/js/helpers.js"></script>
    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Template customizer: To hide customizer set displayCustomizer value false in config.js.  -->
    <script src="assets/vendor/js/template-customizer.js"></script>
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    {{-- <script src="assets/js/config.js"></script> --}}</head>
<style>
    .custom-option-icon .custom-option-content {
        text-align: center;
        padding: 6px;
    }
</style>

<body>
<script>
@if(Session::has('error'))
toastr.options = {
    "closeButton": true,
    "progressBar": true
}
toastr.warning("{{session('error')}}", {
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
                            <span class="text-muted fw-light">Rate Cards /</span> View Courier Rate
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
                                                    <h4 class="mb-2"> {{$deactive}}</h4>
                                                    <p class="mb-0 fw-medium">Deactive Courier Rate</p>
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
                                                    <h4 class="mb-2"> {{$active}}</h4>
                                                    <p class="mb-0 fw-medium">Active Courier Rate</p>
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
                            <div class="card-datatable table-responsive">
 
                                <ul class="nav nav-tabs" id="myTab" role="tablist" style="margin-left: 5px;">
                                    <li class="nav-item" role="presentation">
                                      <button class="nav-link active" id="home-tab" data-toggle="tab" data-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Forword</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                      <button class="nav-link" id="profile-tab" data-toggle="tab" data-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">RTO</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                      <button class="nav-link" id="contact-tab" data-toggle="tab" data-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">Additional</button>
                                    </li>
                                </ul>


                                {{-- forword --}}
                                  <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

                                        <table id="forword_table" class="display nowrap" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>S.No</th>
                                                    <th>Courier</th>
                                                    <th>Service</th>
                                                    <th>Weight (in KG)</th>
                                                    <th>Zone A</th>
                                                    <th>Zone B</th>
                                                    <th>Zone C</th>
                                                    <th>Zone D</th>
                                                    <th>Zone E</th>
                                                    <th>Zone F</th>
                                                    <th>Zone G</th>
                                                    <th>FSC Percentage</th>
                                                    <th>GST Percentage</th>
                                                    <th>COD</th>
                                                    <th>COD Percentage</th>
                                                    <th>Other Charges</th>
                                                    <th>COD Cycle</th>
                                                    <th>Type</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                           <tbody>
                                            @php
                                            $count = 1;
                                        @endphp
                                        @foreach ($data as $value)
                                        @if($value->type == 'Forword')
                                            <tr id="row{{ $value->id }}">

                                                <td>{{ $count }}</td>
                                                <td>{{ optional($value->couriers)->courier_display_name }}</td>
                                                <td>{{ optional($value->courier_service)->service }}</td>
                                                <td>{{ $value->weight }}</td>
                                                <td><i class="fas fa-rupee-sign"></i>{{ $value->zone_a }}</td>
                                                <td><i class="fas fa-rupee-sign"></i>{{ $value->zone_b }}</td>
                                                <td><i class="fas fa-rupee-sign"></i>{{ $value->zone_c }}</td>
                                                <td><i class="fas fa-rupee-sign"></i>{{ $value->zone_d }}</td>
                                                <td><i class="fas fa-rupee-sign"></i>{{ $value->zone_e }}</td>
                                                <td><i class="fas fa-rupee-sign"></i>{{ $value->zone_f }}</td>
                                                <td><i class="fas fa-rupee-sign"></i>{{ $value->zone_g }}</td>
                                                <td>{{ $value->fsc_percentage }}</td>
                                                <td>{{ $value->gst_percentage }}</td>
                                                <td><i class="fas fa-rupee-sign"></i>{{ $value->cod }}</td>
                                                <td>{{ $value->cod_percentage }}</td>
                                                <td><i class="fas fa-rupee-sign"></i>{{ $value->other_charges }}</td>
                                                <td>{{ $value->cod_cycle }}</td>
                                                <td>{{ $value->type }}</td>


                                                <td>
                                                    @if ($value->status == 'true')
                                                        <span class="badge bg-success">Active</span>
                                                    @else
                                                        <span class="badge bg-danger">Deactive</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{url('edit-courier-rate/'.$value->id)}}">
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
                                            @endif
                                        @endforeach
                                           </tbody>
        
                                        </table>
                                    </div>

                                {{-- RTO --}}
                                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">


                                        <table id="example" class="display nowrap" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>S.No</th>
                                                    <th>Courier</th>
                                                    <th>Mode</th>
                                                    <th>Weight (in KG)</th>
                                                    <th>Zone A</th>
                                                    <th>Zone B</th>
                                                    <th>Zone C</th>
                                                    <th>Zone D</th>
                                                    <th>Zone E</th>
                                                    <th>Zone F</th>
                                                    <th>Zone G</th>
                                                    <th>FSC Percentage</th>
                                                    <th>GST Percentage</th>
                                                    <th>COD</th>
                                                    <th>COD Percentage</th>
                                                    <th>Other Charges</th>
                                                    <th>COD Cycle</th>
                                                    <th>Type</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                           <tbody>
                                            @php
                                            $count = 1;
                                        @endphp
                                        @foreach ($data as $value)
                                        @if($value->type == 'RTO')
                                            <tr id="row{{ $value->id }}">

                                                <td>{{ $count }}</td>
                                                <td>{{ optional($value->couriers)->courier_display_name }}</td>
                                                <td>{{ optional($value->courier_service)->service }}</td>
                                                <td>{{ $value->weight }}</td>
                                                <td><i class="fas fa-rupee-sign"></i>{{ $value->zone_a }}</td>
                                                <td><i class="fas fa-rupee-sign"></i>{{ $value->zone_b }}</td>
                                                <td><i class="fas fa-rupee-sign"></i>{{ $value->zone_c }}</td>
                                                <td><i class="fas fa-rupee-sign"></i>{{ $value->zone_d }}</td>
                                                <td><i class="fas fa-rupee-sign"></i>{{ $value->zone_e }}</td>
                                                <td><i class="fas fa-rupee-sign"></i>{{ $value->zone_f }}</td>
                                                <td><i class="fas fa-rupee-sign"></i>{{ $value->zone_g }}</td>
                                                <td>{{ $value->fsc_percentage }}</td>
                                                <td>{{ $value->gst_percentage }}</td>
                                                <td><i class="fas fa-rupee-sign"></i>{{ $value->cod }}</td>
                                                <td>{{ $value->cod_percentage }}</td>
                                                <td><i class="fas fa-rupee-sign"></i>{{ $value->other_charges }}</td>
                                                <td>{{ $value->cod_cycle }}</td>
                                                <td>{{ $value->type }}</td>


                                                <td>
                                                    @if ($value->status == 'true')
                                                        <span class="badge bg-success">Active</span>
                                                    @else
                                                        <span class="badge bg-danger">Deactive</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{url('edit-courier-rate/'.$value->id)}}">
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
                                            @endif
                                        @endforeach
                                           </tbody>
        
                                        </table>
                                    </div>


                                     {{-- Additional --}}
                                    <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">


                                        <table id="additional_table" class="display nowrap" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>S.No</th>
                                                    <th>Courier</th>
                                                    <th>Mode</th>
                                                    <th>Weight (in KG)</th>
                                                    <th>Zone A</th>
                                                    <th>Zone B</th>
                                                    <th>Zone C</th>
                                                    <th>Zone D</th>
                                                    <th>Zone E</th>
                                                    <th>Zone F</th>
                                                    <th>Zone G</th>
                                                    <th>FSC Percentage</th>
                                                    <th>GST Percentage</th>
                                                    <th>COD</th>
                                                    <th>COD Percentage</th>
                                                    <th>Other Charges</th>
                                                    <th>COD Cycle</th>
                                                    <th>Type</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                           <tbody>
                                            @php
                                            $count = 1;
                                        @endphp
                                        @foreach ($data as $value)
                                        @if($value->type == 'Additional')
                                            <tr id="row{{ $value->id }}">

                                                <td>{{ $count }}</td>
                                                <td>{{ optional($value->couriers)->courier_display_name }}</td>
                                                <td>{{ optional($value->courier_service)->service }}</td>
                                                <td>{{ $value->weight }}</td>
                                                <td><i class="fas fa-rupee-sign"></i>{{ $value->zone_a }}</td>
                                                <td><i class="fas fa-rupee-sign"></i>{{ $value->zone_b }}</td>
                                                <td><i class="fas fa-rupee-sign"></i>{{ $value->zone_c }}</td>
                                                <td><i class="fas fa-rupee-sign"></i>{{ $value->zone_d }}</td>
                                                <td><i class="fas fa-rupee-sign"></i>{{ $value->zone_e }}</td>
                                                <td><i class="fas fa-rupee-sign"></i>{{ $value->zone_f }}</td>
                                                <td><i class="fas fa-rupee-sign"></i>{{ $value->zone_g }}</td>
                                                <td>{{ $value->fsc_percentage }}</td>
                                                <td>{{ $value->gst_percentage }}</td>
                                                <td><i class="fas fa-rupee-sign"></i>{{ $value->cod }}</td>
                                                <td>{{ $value->cod_percentage }}</td>
                                                <td><i class="fas fa-rupee-sign"></i>{{ $value->other_charges }}</td>
                                                <td>{{ $value->cod_cycle }}</td>
                                                <td>{{ $value->type }}</td>


                                                <td>
                                                    @if ($value->status == 'true')
                                                        <span class="badge bg-success">Active</span>
                                                    @else
                                                        <span class="badge bg-danger">Deactive</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{url('edit-courier-rate/'.$value->id)}}">
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
                                            @endif
                                        @endforeach
                                           </tbody>
        
                                        </table>
                                    </div>
                                  </div>

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
                            document.getElementById('aws').addEventListener('submit', function(e) {
                                e.preventDefault();

                                var csrfToken = document.head.querySelector('meta[name="csrf-token"]').content;
                                var formData = new FormData(this);


                                fetch("{{ url('create-city') }}", {
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

                                                window.location.href = '{{ url('City') }}';
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

                    <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            document.getElementById('update').addEventListener('submit', function(e) {
                                e.preventDefault();

                                var csrfToken = document.head.querySelector('meta[name="csrf-token"]').content;
                                var formData = new FormData(this);


                                fetch("{{ url('update-city') }}", {
                                        method: "POST",
                                        body: formData,
                                        headers: {
                                            'X-CSRF-TOKEN': csrfToken,
                                        },
                                    })
                                    .then(response => response.json())
                                    .then(data => {
                                        if (data.status === 'success')
                                        {

                                            toastr.options = {
                                                "closeButton": true,
                                                "progressBar": true,
                                                "timeOut": 15000
                                            };
                                            toastr.success(data.message);
                                            setTimeout(function() {

                                                window.location.href = '{{ url('City') }}';
                                            }, 2500);

                                        }
                                        else
                                        {
                                            toastr.options = {
                                                "closeButton": true,


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
    function deleteModal(id){
        var modal = $('#deleteModal');
        modal.data('id', id);
        modal.modal('show');
}

     function data_delete(){
        var id = $('#deleteModal').data('id');
            $.ajax({
                 url: '{{url('delete-courier-rate')}}',
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
            url: '{{ url('city-data-filter') }}',
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
                }else
                {
                // remove old data rows
                $("table#example tbody").empty();

                $.each(result, function (key, value) {
                    if (value.status == 'true') {
                        status = '<span class="badge bg-success">Active</span>';
                    }  else {
                        status = '<span class="badge bg-danger">Deactive</span>';
                    }

                    var editButton = '<span data-bs-toggle="modal" data-bs-target="#basicModals' + value.id + '"><i class="menu-icon tf-icons ti ti-edit"></i></span>';

                   
                    var deleteButton = '<a href="#" onclick="deleteModal('+ value.id +')"><i  class="menu-icontf-icons ti ti-trash"></i></a>';
                   
                    //  after get data put on table   
                    $("table#example").append("<tr id='row" + value.id + "'><td>" + value.id + "</td><td>" + value.city_code + "</td><td>" + value.city_name + "</td><td>" + value.state_name + "</td><td>" + status + "</td><td>" + editButton + deleteButton +"</td> </tr>");
                });
            }
            }
        });
    }
</script>

<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>


<script>
    $(document).ready(function() {
    $('#forword_table').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    } );
    $('#additional_table').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    } );
} );
</script>
                    @include('layouts.footer')
