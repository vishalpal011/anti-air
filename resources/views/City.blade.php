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

@if(Session::has('update'))
toastr.options = {
    "closeButton": true,
    "progressBar": true
}
toastr.success("{{session('update')}}", {
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
                            <span class="text-muted fw-light">Location /</span> City
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
                                                    <p class="mb-0 fw-medium">Deactive City</p>
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
                                                    <p class="mb-0 fw-medium">Active City</p>
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
                                                                        Add New City</h5>
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal"
                                                                        aria-label="Close"></button>
                                                                </div>
                                                                <form id="aws" method="post">
                                                                    <div class="modal-body">

                                                                        <div class="row g-2">
                                                                            <div class="col mb-0">
                                                                                <input type="text"
                                                                                    name="city_code"
                                                                                    class="form-control"
                                                                                    placeholder="City Code" required>
                                                                            </div>
                                                                            <div class="col mb-0">
                                                                                <input type="text"
                                                                                    name="city_name"
                                                                                    class="form-control"
                                                                                    placeholder="City Name" required>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row g-2 pt-3">
                                                                            <div class="col-md-12 mb-0">
                                                                               <select name="state_name" class="form-control" id="" required>
                                                                                <option value="" selected>Select State</option>
                                                                                    @foreach ($region as $value)
                                                                                      <option value="{{$value->state_name}}">{{$value->state_name}}</option>
                                                                                    @endforeach
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

                                <table class="table display nowrap" style="width:100%">
                                    <thead class="table-light">
                                        <tr>
                                            <th>S.No.</th>
                                            <th>City Code</th>
                                            <th>City Name</th>
                                            <th>State Name</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="table-border-bottom-0">
                                        @php
                                            $count = 1;
                                        @endphp
                                        @foreach ($data as $value)
                                            <tr id="row{{ $value->id }}">

                                                <td>{{ $count }}</td>
                                                <td>{{ $value->city_code }}</td>
                                                <td>{{ $value->city_name }}</td>
                                                <td>{{ $value->state_name }}</td>


                                                <td>
                                                    @if ($value->status == 'true')
                                                        <span class="badge bg-success">Active</span>
                                                    @else
                                                        <span class="badge bg-danger">Deactive</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a data-bs-toggle="modal"
                                                        data-bs-target="#basicModals{{ $value->id }}">
                                                        <i class='menu-icon tf-icons ti ti-edit'></i>
                                                    </a>
                                                    &nbsp;
                                                   
                                                    <a href="#" onclick="deleteModal({{ $value->id }})">
                                                        <i class='menu-icon tf-icons ti ti-trash'></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            <div class="modal fade" id="basicModals{{ $value->id }}" tabindex="-1"
                                                aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel1">
                                                                Edit City</h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <form action="{{url('update-city')}}" method="post">
                                                            @csrf
                                                            <div class="modal-body">
                                                                <div class="row g-2">



                                                                    <div class="col mb-0">
                                                                        <input type="text"
                                                                            name="city_code"
                                                                            class="form-control"
                                                                            placeholder="City Code" value="{{ $value->city_code }}" required>
                                                                            <input type="text" hidden name="id" value="{{ $value->id }}">
                                                                    </div>
                                                                    <div class="col mb-0">
                                                                        <input type="text"
                                                                            name="city_name"
                                                                            class="form-control"
                                                                            placeholder="City Name" value="{{ $value->city_name }}" required>
                                                                    </div>
                                                                </div>
                                                                <div class="row g-2 pt-3">
                                                                    <div class="col mb-0">
                                                                       <select name="State_name" class="form-control" id="">
                                                                        {{-- <option  disabled>Select Country</option> --}}
                                                                        <option selected value="{{ $value->state_name }}">{{ $value->state_name }} ( Default Selected )</option>
                                                                            @foreach ($region as $value)
                                                                              <option value="{{$value->state_name}}">{{$value->state_name}}</option>
                                                                            @endforeach
                                                                       </select>
                                                                    </div>
                                                                    <div class="col mb-0">
                                                                        <select name="status" class="form-control" id="">
                                                                           
                                                                            @if($value->status == 'true')
                                                                            <option value="true" selected>Active</option>
                                                                            <option value="false">Deactive</option>
                                                                        @else
                                                                            <option value="true">Active</option>
                                                                            <option value="false" selected>Deactive</option>
                                                                        @endif
                                                                        </select>
                                                                     </div>

                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-label-secondary"
                                                                    data-bs-dismiss="modal">Close</button>
                                                                <button type="submit"
                                                                    class="btn btn-primary">Upload</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            @php
                                                $count++;
                                            @endphp
                                        @endforeach
                                    </tbody>

                                </table>

                                <nav aria-label="Page navigation example">
                                    <ul class="pagination justify-content-center mt-5">
                                        {{$data->links("pagination::bootstrap-4")}}
                                    </ul>
                                </nav>
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
                 url: '{{url('delete-city')}}',
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



                    @include('layouts.footer')
