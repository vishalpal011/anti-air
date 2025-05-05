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


    <!-- Helpers -->
    <script src="../../assets/vendor/js/helpers.js"></script>
    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Template customizer: To hide customizer set displayCustomizer value false in config.js.  -->
    <script src="../../assets/vendor/js/template-customizer.js"></script>
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    {{-- <script src="../../assets/js/config.js"></script> --}}
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
                            <span class="text-muted fw-light">Sales & Announcements /</span> Announcements / Post AD's
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
                                                    <p class="mb-0 fw-medium">Deactive Announcements / Post AD's</p>
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
                                                    <p class="mb-0 fw-medium">Active Announcements / Post AD's</p>
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
                                                            data-bs-toggle="modal" data-bs-target="#exLargeModal"><i
                                                                class='menu-icon tf-icons ti ti-location'></i>Add New
                                                        </button>
                                                    </p>
                                                    <div class="modal fade" id="exLargeModal" tabindex="-1"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog modal-xl" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel4">
                                                                        Announcements / Post AD's</h5>
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal"
                                                                        aria-label="Close"></button>
                                                                </div>
                                                                <form id="aws" method="POST">
                                                                    <div class="modal-body">
                                                                        <div class="row">
                                                                            <div class="col mb-0">
                                                                                <select name="client_id" id="dropdown"
                                                                                    class="form-control" required>
                                                                                    <option value="">
                                                                                        Search for an Cleint
                                                                                    </option>
                                                                                    @foreach($client as $clientdata)
                                                                                    <option value="{{$clientdata->id}}">{{$clientdata->first_name}} {{$clientdata->last_name}}</option>
                                                                                    @endforeach
                                                                                </select>

                                                                            </div>
                                                                            <div class="col mb-0">
                                                                                <select name="vendor_id" id="dropdown"
                                                                                    class="form-control" required>
                                                                                    <option value="">
                                                                                        Search for an Vendor
                                                                                    </option>
                                                                                    @foreach($courier as $courierdata)
                                                                                    <option value="{{$courierdata->id}}">{{$courierdata->courier_display_name}}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                            <div class="col mb-0">
                                                                                <input type="text" name="title"
                                                                                    placeholder="Enter Title"
                                                                                    class="form-control" required>
                                                                            </div>
                                                                            <div class="col mb-0">
                                                                                <select name="status" id="dropdown"
                                                                                    class="form-control" required>
                                                                                    <option selected disabled>
                                                                                        Status
                                                                                    </option>
                                                                                    <option value="true">Active
                                                                                    </option>
                                                                                    <option value="false">Deactive
                                                                                    </option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row pt-3">
                                                                            <div class="col mb-0">
                                                                                <label for="">Image</label>
                                                                                <input type="file" name="image"
                                                                                    id=""
                                                                                    class="form-control" required>
                                                                            </div>
                                                                            <div class="col mb-0">
                                                                                <label for="">Start
                                                                                    Date</label>
                                                                                <input type="date"
                                                                                    name="start_date" id=""
                                                                                    class="form-control" required>
                                                                            </div>
                                                                            <div class="col mb-0">
                                                                                <label for="">End
                                                                                    Date</label>
                                                                                <input type="date" name="end_date"
                                                                                    id=""
                                                                                    class="form-control" required>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row pt-3">
                                                                            <div class="col mb-0">
                                                                                <label
                                                                                    for="">Discription</label>
                                                                                <textarea name="description" id="editor" cols="30" rows="4" class="form-control"  ></textarea>

                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button"
                                                                            class="btn btn-label-secondary"
                                                                            data-bs-dismiss="modal">Close</button>
                                                                        <button type="submit"
                                                                            class="btn btn-primary">Save
                                                                            changes</button>
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
                                <table id="example" class="display nowrap" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>S.No.</th>
                                            <th>Client Name</th>
                                            <th>Vendor Name</th>
                                            <th>Title</th>
                                            <th>Image</th>
                                            <th>Start Date</th>
                                            <th>End Date</th>
                                            <th>Description</th>
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

                                                <td>{{ $count }}</td>
                                                <td>{{ optional($value->client)->first_name }} {{ optional($value->client)->last_name }}
                                                </td>
                                                <td>{{ optional($value->courier)->courier_display_name }}</td>
                                                <td>{{ $value->title }}</td>

                                                <td><img src="{{ url('assets/images' . '/' . $value->image) }}"
                                                        alt="" height="100"></td>
                                                <td>{{ $value->start_date }}</td>
                                                <td>{{ $value->end_date }}</td>
                                                <td>{{ $value->description }}</td>


                                                <td>
                                                    @if ($value->status == 'true')
                                                        <span class="badge bg-success">Active</span>
                                                    @else
                                                        <span class="badge bg-danger">Deactive</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a data-bs-toggle="modal"
                                                        data-bs-target="#exLargeModals{{ $value->id }}">
                                                        <i class='menu-icon tf-icons ti ti-edit'></i>
                                                    </a>

                                                    &nbsp;

                                                    <a href="#" onclick="deleteModal({{ $value->id }})">
                                                        <i class='menu-icon tf-icons ti ti-trash'></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            {{-- edit model --}}
                                            <div class="modal fade" id="exLargeModals{{ $value->id }}"
                                                tabindex="-1" aria-hidden="true">
                                                <div class="modal-dialog modal-xl" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel4">
                                                                Edit Announcements</h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <form action="{{url('update-post')}}" method="POST" enctype="multipart/form-data">
                                                            @csrf
                                                            <div class="modal-body">
                                                                <div class="row">
                                                                    <div class="col mb-0">
                                                                        <select name="client_id" id="dropdown"
                                                                            class="form-control">
                                                                            <option selected
                                                                                value="{{ $value->client->id }}">
                                                                                {{ $value->client->first_name }}
                                                                                {{ $value->client->last_name }} (
                                                                                Defualt Selected ) </option>
                                                                                @foreach($client as $clientdata)
                                                                                    <option value="{{$clientdata->id}}">{{$clientdata->first_name}} {{$clientdata->last_name}}</option>
                                                                                    @endforeach
                                                                        </select>

                                                                    </div>
                                                                    <div class="col mb-0">
                                                                        <select name="vendor_id" id="dropdown"
                                                                            class="form-control">

                                                                            <option selected
                                                                                value="{{optional($value->courier)->id }}">
                                                                                {{ optional($value->courier)->courier_display_name }}
                                                                                (Defualt Selected)
                                                                            </option>

                                                                            @foreach($courier as $courierdata)
                                                                                    <option value="{{$courierdata->id}}">{{$courierdata->courier_display_name}}</option>
                                                                                @endforeach
                                                                        </select>
                                                                    </div>
                                                                    <div class="col mb-0">
                                                                        <input type="text" name="title"
                                                                            placeholder="Enter Title"
                                                                            class="form-control"
                                                                            value="{{ $value->title }}">
                                                                        <input type="text" hidden name="id"
                                                                            value="{{ $value->id }}">
                                                                    </div>
                                                                    <div class="col mb-0">
                                                                        <select name="status" id="dropdown"
                                                                            class="form-control">
                                                                            <option value="{{$value->status}}" selected>
                                                                                @if ($value->status == 'true')
                                                                                    Active (Defualt Selected)
                                                                                @else
                                                                                    Deactive ( Defualt Selected)
                                                                                @endif
                                                                            </option>
                                                                            <option value="true">Active
                                                                            </option>
                                                                            <option value="false">Deactive
                                                                            </option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="row pt-3">
                                                                    <div class="col mb-0">
                                                                        <label for="">Image</label>
                                                                        <input type="file" name="image"
                                                                            id="" class="form-control">
                                                                        <br>
                                                                        <img src="{{ url('assets/images' . '/' . $value->image) }}"
                                                                            alt="" height="100"
                                                                            width="50%">
                                                                    </div>
                                                                    <div class="col mb-0">
                                                                        <label for="">Start
                                                                            Date</label>
                                                                        <input type="date" name="start_date"
                                                                            id="" class="form-control"
                                                                            value="{{ $value->start_date }}">
                                                                    </div>
                                                                    <div class="col mb-0">
                                                                        <label for="">End
                                                                            Date</label>
                                                                        <input type="date" name="end_date"
                                                                            id="" class="form-control"
                                                                            value="{{ $value->end_date }}">
                                                                    </div>
                                                                </div>
                                                                <div class="row pt-3">
                                                                    <div class="col mb-0">
                                                                        <label for="">Discription</label>
                                                                        <textarea name="description" id="editor{{ $value->id }}" cols="30" rows="4" class="form-control">{{ $value->description }}</textarea>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-label-secondary"
                                                                    data-bs-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-primary">Save
                                                                    changes</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- end --}}
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


                  




                    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
                        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
                    </script>
                    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
                        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
                    </script>
                    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
                        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
                    </script>
                    <script src="https://cdn.ckeditor.com/ckeditor5/35.3.2/classic/ckeditor.js"></script>
                    <script>
                        ClassicEditor
                            .create(document.querySelector('#editor'))
                            .then(editor => {
                                console.log(editor);
                            })
                            .catch(error => {
                                console.error(error);
                            });
                    </script>
                    @foreach($data as $value)
                    <script>
                        ClassicEditor
                            .create(document.querySelector('#editor{{ $value->id }}'))
                            .then(editor => {
                                console.log(editor);
                            })
                            .catch(error => {
                                console.error(error);
                            });
                    </script>
                    @endforeach


                    <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            document.getElementById('aws').addEventListener('submit', function(e) {
                                e.preventDefault();

                                var csrfToken = document.head.querySelector('meta[name="csrf-token"]').content;
                                var formData = new FormData(this);

                                fetch("{{ url('create-announcements') }}", {
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

                                                window.location.href = '{{ url('Announcements') }}';
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


                                fetch("{{ url('update-post') }}", {
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

                                            };
                                            toastr.success(data.message);
                                            setTimeout(function() {

                                                window.location.href = '{{ url('Announcements') }}';
                                            }, 2500);

                                        } else {
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
                 url: '{{url('delete-ads')}}',
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
            url: '{{ url('announcements-data-filter') }}',
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

                    var image = '<img src="assets/images/' + value.image + '" height="100">';


                    var editButton = '<span data-bs-toggle="modal" data-bs-target="#exLargeModals' + value.id + '"><i class="menu-icon tf-icons ti ti-edit"></i></span>';

                    var deleteButton = '<a href="#" onclick="deleteModal('+ value.id +')"><i  class="menu-icontf-icons ti ti-trash"></i></a>';

                    @if(isset($value))
                        var clientFirstName = @json(optional($value->client)->first_name);
                        var clientLastName = @json(optional($value->client)->last_name);
                        var courierName = @json(optional($value->courier)->courier_display_name);
                    @endif

                    //  after get data put on table
                    $("table#example").append("<tr id='row" + value.id + "'><td>" + value.id + "</td><td>" + clientFirstName + " " + clientLastName +  "</td><td>" + courierName + "</td><td>" + value.title + "</td><td>" + image + "</td><td>" + value.start_date + "</td><td>" + value.end_date + "</td><td>" + value.description + "</td><td>" + status + "</td><td>" + editButton + deleteButton + "</td></tr>");
                });
            }
            }
        });
    }
</script>

                    @include('layouts.footer')
