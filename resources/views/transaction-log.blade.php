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
    <!-- Page CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css"
        integrity="sha512-6S2HWzVFxruDlZxI3sXOZZ4/eJ8AcxkQH1+JjSe/ONCEqR9L4Ysq5JdT5ipqtzU7WHalNwzwBv+iE51gNHJNqQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    @include('layouts.links')


</head>

<body>

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

                        <h5 class="py-3 mb-2">
                            <span class="text-muted fw-light">Client /</span>All Client
                        </h5>

                        <!-- Order List Widget -->

                        <div class="card mb-4">
                            {{-- <div class="card-widget-separator-wrapper">
                                <div class="card-body card-widget-separator">
                                    <div class="row gy-4 gy-sm-1">
                                        <div class="col-sm-6 col-lg-3">
                                            <div
                                                class="d-flex justify-content-between align-items-start card-widget-1 border-end pb-3 pb-sm-0">
                                                <div>
                                                    <h4 class="mb-2">{{ $deactive }}</h4>
                                                    <p class="mb-0 fw-medium">Deactive Clients</p>
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
                                                    <p class="mb-0 fw-medium">Active Clients</p>
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
                            </div> --}}

                            <!-- Order List Table -->
                            <div class="card p-3 pt-4">
                                <div class="card-datatable table-responsive">

                                    <!-- filter section -->
                                    <form id="filter" method="post">
                                        <div class="row">

                                            <div class="col-md-2">
                                                <label>Date : From</label>
                                                <input type="date" name="form" class="form-control">
                                            </div>
                                            <div class="col-md-2">
                                                <label for="">Date : To</label>
                                                <input type="date" name="To" class="form-control">
                                            </div>
                                            <div class="col-md-2">
                                                <label>Recent/Oldest</label>
                                                <select name="latest_oldest" class="form-control">
                                                    <option disabled selected>--Choose--</option>
                                                    <option value="DESC">Latest</option>
                                                    <option value="ASC">Oldest</option>
                                                </select>
                                            </div>
                                            <br>
                                            <div class="col-md-2">
                                                <label>Order Id or A.W.B No.</label>
                                                <input type="text" name="order_number" class="form-control">
                                            </div>
                                            <div class="col-md-2 ">
                                                <label>Transaction ID.</label>
                                                <input type="text" class="form-control" name="transaction_id">
                                            </div>
                                            <div class="col-md-2">
                                                <label>Status</label>
                                                <select name="status_type" class="form-control">
                                                    <option disabled selected>--Choose--</option>
                                                    <option value="debit">Debit </option>
                                                    <option value="credit">Credit </option>
                                                </select>
                                            </div>
                                            <div class="col-md-2 pt-3">
                                                <br>
                                                <button type="submit" class="btn btn-primary">Filter</button>
                                            </div>
                                            <div class="col-md-2 pt-3">
                                                <br>
                                                <button type="button" class="btn btn-primary">Current Balance</button>
                                            </div>
                                        </div>
                                    </form>
                                    <br>
                                    <!-- filter section end -->
                                    <table style="width: 100%" class="table">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th>Transection Date </th>
                                                <th>AWB Id / Booking Id</th>
                                                <th>Amount</th>
                                                <th>Transaction ID</th>
                                                <th>Balance</th>
                                                <th>Description</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody id="tableData">
                                            @foreach ($data as $value)
                                                <tr>
                                                    <td>{{ \Carbon\Carbon::parse($value->created_at)->format('d, M Y h:iA') }}
                                                    </td>
                                                    <td>{{ $value->booking_id }}</td>
                                                    <td>{{ $value->amount }}</td>
                                                    <td>
                                                        @if ($value->transactionId === null)
                                                            No Data Found
                                                        @else
                                                            {{ $value->transactionId }}
                                                        @endif
                                                    </td>
                                                    <td>{{ $value->balance }}</td>
                                                    <td>{{ $value->description }}</td>
                                                    <td>{{ $value->status }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>
                        <!-- / Content -->

                        <!-- Footer -->

                        <script>
                            document.addEventListener('DOMContentLoaded', function() {
                                document.getElementById('filter').addEventListener('submit', function(e) {
                                    e.preventDefault();

                                    var csrfToken = document.head.querySelector('meta[name="csrf-token"]').content;
                                    var formData = new FormData(this);
                                    fetch("{{ url('transaction-filter') }}", {
                                            method: "POST",
                                            body: formData,
                                            headers: {
                                                'X-CSRF-TOKEN': csrfToken,
                                            },
                                        })
                                        .then(response => response.json())
                                        .then(data => {
                                            if (data.status === 'success') {
                                                var table = $('#tableData');

                                                // Clear current table data
                                                table.empty();

                                                // Append new rows with filtered data
                                                $.each(data.message, function(index, item)
                                                {
                                                    var row = '<tr>' +
                                                        '<td>' + item.created_at + '</td>' +
                                                        // Replace 'field1', 'field2', etc. with your actual field names
                                                        '<td>' + item.booking_id + '</td>' +
                                                        '<td>' + item.amount + '</td>' +
                                                        '<td>' + item.transactionId + '</td>' +
                                                        '<td>' + item.balance + '</td>' +
                                                        '<td>' + item.description + '</td>' +
                                                        '<td>' + item.status + '</td>' +


                                                        // Add more fields as needed
                                                        '</tr>';
                                                    table.append(row);
                                                });

                                            }
                                            else
                                            {
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


                        @include('layouts.footer')
