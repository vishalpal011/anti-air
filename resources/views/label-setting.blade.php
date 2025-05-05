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
                            <span class="text-muted fw-light">Labels /</span> Settings
                        </h4>

                        <!-- Order List Widget -->



                        <!-- Order List Table -->
                        <div class="card p-3">
                            <div class="card-datatable table-responsive">
                                <table style="width:100%;">
                                    <thead>
                                        <tr>
                                            <th>Label Name</th>
                                            <th>Created By</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>4*4</td>
                                            <td>@Admin</td>
                                            <td>Active</td>
                                        </tr>
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

                                                window.location.href = '{{ url('State') }}';
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
        });
    }
</script>



                    @include('layouts.footer')
