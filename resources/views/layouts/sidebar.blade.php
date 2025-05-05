<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">


    <div class="app-brand demo ">
        <a href="javascript:void(0);" class="app-brand-link">
            <span class="app-brand-logo demo">
                <svg width="32" height="22" viewBox="0 0 32 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M0.00172773 0V6.85398C0.00172773 6.85398 -0.133178 9.01207 1.98092 10.8388L13.6912 21.9964L19.7809 21.9181L18.8042 9.88248L16.4951 7.17289L9.23799 0H0.00172773Z"
                        fill="#7367F0" />
                    <path opacity="0.06" fill-rule="evenodd" clip-rule="evenodd"
                        d="M7.69824 16.4364L12.5199 3.23696L16.5541 7.25596L7.69824 16.4364Z" fill="#161616" />
                    <path opacity="0.06" fill-rule="evenodd" clip-rule="evenodd"
                        d="M8.07751 15.9175L13.9419 4.63989L16.5849 7.28475L8.07751 15.9175Z" fill="#161616" />
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M7.77295 16.3566L23.6563 0H32V6.88383C32 6.88383 31.8262 9.17836 30.6591 10.4057L19.7824 22H13.6938L7.77295 16.3566Z"
                        fill="#7367F0" />
                </svg>
            </span>
            <span class="app-brand-text demo menu-text fw-bold">Ante Air</span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
            <i class="ti menu-toggle-icon d-none d-xl-block ti-sm align-middle"></i>
            <i class="ti ti-x d-block d-xl-none ti-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>



    <ul class="menu-inner py-1 pb-4">
        <!-- Dashboards -->
        <li class="menu-item active open">
            <a href="javascript:void(0);" class="menu-link">
                <div data-i18n="Dashboards">Dashboards</div>
            </a>
        </li>
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text" data-i18n="Master Managment">Master Managment</span>
        </li>
        <!-- Layouts -->
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class='menu-icon tf-icons ti ti-settings'></i>
                <div data-i18n="Roles">Roles</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="javascript:void(0);" class="menu-link">
                        <div data-i18n="Roles">Roles</div>
                    </a>
                </li>
            </ul>
        </li>
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class='menu-icon tf-icons ti ti-settings'></i>
                <div data-i18n="Permissions"> Permissions</div>
            </a>
            <ul class="menu-sub">

                <li class="menu-item">
                    <a href="javascript:void(0);" class="menu-link">
                        <div data-i18n="Permission">Permission</div>
                    </a>
                </li>
            </ul>
        </li>
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class='menu-icon tf-icons ti ti-truck'></i>
                <div data-i18n="Courier"> Courier</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="{{ url('Courier') }}" class="menu-link">
                        <div data-i18n="Create Courier">Create Courier</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ url('view-Courier') }}" class="menu-link">
                        <div data-i18n="All Courier">All Courier</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ url('courier-allocation') }}" class="menu-link">
                        <div data-i18n="Courier Allocation">Courier Allocation</div>
                    </a>
                </li>

            </ul>
        </li>
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-layout-sidebar"></i>
                <div data-i18n="AWB Stocks">AWB Stocks</div>
            </a>

            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="{{ url('create-awb') }}" class="menu-link">
                        <div data-i18n="Create AWB">Create AWB</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ url('awb-inventory') }}" class="menu-link">
                        <div data-i18n="AWB Inventory">AWB Inventory</div>
                    </a>
                </li>

            </ul>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="javascript:void(0);" class="menu-link menu-toggle">
                        <div data-i18n=" AWB (Couriers)"> AWB (Couriers)</div>
                    </a>
                    <ul class="menu-sub">
                        <li class="menu-item">
                            <a href="{{ url('create-awb-couriers') }}" class="menu-link">
                                <div data-i18n="Upload">Upload </div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="{{ url('all-booking') }}" class="menu-link">
                                <div data-i18n="View All">View All</div>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </li>
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-users"></i>
                <div data-i18n="Client">Client</div>
            </a>

            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="{{ url('client') }}" class="menu-link">
                        <div data-i18n="Create Client">Create Client</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ url('all-client') }}" class="menu-link">
                        <div data-i18n="All Clients">All Clients</div>
                    </a>
                </li>
            </ul>
        </li>
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class='menu-icon tf-icons ti ti-home'></i>
                <div data-i18n="Warehouse">warehouse</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="{{ url('warehouse') }}" class="menu-link">
                        <div data-i18n="Create warehouse">Create warehouse</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ url('view-warehouses') }}" class="menu-link">
                        <div data-i18n="All warehouses">All warehouses</div>
                    </a>
                </li>
            </ul>
        </li>
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-tags"></i>
                <div data-i18n="Labe Settings">Labe Settings</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="{{ url('lable-designs') }}" class="menu-link">
                        <div data-i18n="Labels Designs">Labels Designs</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ url('lable-setting') }}" class="menu-link">
                        <div data-i18n="Settings">Settings</div>
                    </a>
                </li>

            </ul>
        </li>
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class='menu-icon tf-icons ti ti-location'></i>
                <div data-i18n="Locations & Regions">Locations & Regions</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="{{ url('Country') }}" class="menu-link">
                        <div data-i18n="Country">Country</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ url('Regions') }}" class="menu-link">
                        <div data-i18n="Regions">Regions</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ url('State') }}" class="menu-link">
                        <div data-i18n="State">State</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ url('City') }}" class="menu-link">
                        <div data-i18n="City">City</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ url('Service-Center') }}" class="menu-link">
                        <div data-i18n="Service Center">Service Center</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ url('Pin-Code') }}" class="menu-link">
                        <div data-i18n="Pin Code">Pin Code</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ url('upload-pin-Code') }}" class="menu-link">
                        <div data-i18n="Upload Pin Code">Upload Pin Code</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ url('Zone') }}" class="menu-link">
                        <div data-i18n="Zone">Zone</div>
                    </a>
                </li>
            </ul>
        </li>
        <!-- Front Pages -->
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class='menu-icon tf-icons ti ti-graph'></i>
                <div data-i18n="Ads">Ads</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="{{ url('Announcements') }}" class="menu-link">
                        <div data-i18n="Post AD's">Post AD's</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ url('video-ads') }}" class="menu-link">
                        <div data-i18n="Post Video AD's">Post Video AD's</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ url('video-ads-url') }}" class="menu-link">
                        <div data-i18n="Post Video Via URL AD's">Post Video Via URL AD's</div>
                    </a>
                </li>
                {{-- <li class="menu-item">
                    <a href="https://demos.pixinvent.com/vuexy-html-admin-template/html/front-pages/payment-page.html"
                        class="menu-link" target="_blank">
                        <div data-i18n="Payment">Payment</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="https://demos.pixinvent.com/vuexy-html-admin-template/html/front-pages/checkout-page.html"
                        class="menu-link" target="_blank">
                        <div data-i18n="Checkout">Checkout</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="https://demos.pixinvent.com/vuexy-html-admin-template/html/front-pages/help-center-landing.html"
                        class="menu-link" target="_blank">
                        <div data-i18n="Help Center">Help Center</div>
                    </a>
                </li> --}}
            </ul>
        </li>
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class='menu-icon tf-icons ti ti-graph'></i>
                <div data-i18n="Sales Leads">Sales Leads</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="{{ url('Sales') }}" class="menu-link">
                        <div data-i18n="Sales">Sales</div>
                    </a>
                </li>

            </ul>
        </li>



        <li class="menu-header small text-uppercase">
            <span class="menu-header-text" data-i18n="Bookings">Bookings</span>
        </li>

        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class='menu-icon tf-icons ti ti-book'></i>

                <div data-i18n="All Booking"></div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="javascript:void(0);" class="menu-link menu-toggle">
                        <div data-i18n="Forword Booking">Forword Booking</div>
                    </a>
                    <ul class="menu-sub">
                        <li class="menu-item">
                            <a href="{{ url('booking') }}" class="menu-link">
                                <div data-i18n="Create Booking">Create Booking</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="{{ url('all-booking') }}" class="menu-link">
                                <div data-i18n="Forword Booking B2B">Forword Booking B2B</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="{{ url('forword-Booking-B2C') }}" class="menu-link">
                                <div data-i18n="Forword Booking B2C">Forword Booking B2C</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="{{ url('all-reverse-booking') }}" class="menu-link">
                                <div data-i18n="NDR"> NDR </div>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="menu-item">
                    <a href="javascript:void(0);" class="menu-link menu-toggle">
                        <div data-i18n="Reverse Booking">Reverse Booking</div>
                    </a>
                    <ul class="menu-sub">
                        <li class="menu-item">
                            <a href="{{ url('reverse-booking') }}" class="menu-link">
                                <div data-i18n="Create New">Create New</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="{{ url('all-reverse-booking') }}" class="menu-link">
                                <div data-i18n=" Reverse Booking B2B"> Reverse Booking B2B</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="{{ url('all-reverse-booking') }}" class="menu-link">
                                <div data-i18n="NDR"> NDR </div>
                            </a>
                        </li>

                    </ul>
                </li>
                <li class="menu-item">
                    <a href="{{url('weight-and-EDD')}}" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-download"></i>
                        <div data-i18n="Weight and EDD">Weight and EDD</div>
                    </a>
                </li>

                {{-- <li class="menu-item">
                    <a href="{{ url('view-booking') }}" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-download"></i>
                        <div data-i18n="Order Book">Order Book</div>
                    </a>
                </li>

                <li class="menu-item">
                    <a href="app-kanban.html" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-download"></i>
                        <div data-i18n="Upload Reference">Upload Reference</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="app-kanban.html" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-download"></i>
                        <div data-i18n="Courier Rates">Courier Rates </div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="app-kanban.html" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-download"></i>
                        <div data-i18n="Client Rates">Client Rates</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="app-kanban.html" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-download"></i>
                        <div data-i18n="Merchant Payment">Merchant Payment</div>
                    </a>
                </li>

                <li class="menu-item">
                    <a href="app-kanban.html" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-download"></i>
                        <div data-i18n="B2B Booking Vendor">B2B Booking Vendor</div>
                    </a>
                </li>

                <li class="menu-item">
                    <a href="app-kanban.html" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-download"></i>
                        <div data-i18n="B2B Upload Dimensions">B2B Upload Dimensions</div>
                    </a>
                </li> --}}



            </ul>
        </li>


        <li class="menu-header small text-uppercase">
            <span class="menu-header-text" data-i18n="Rate Cards">Rate Cards</span>
        </li>

        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class='menu-icon tf-icons ti ti-book'></i>

                <div data-i18n="Rate Cards"></div>
            </a>
            <ul class="menu-sub">




                <li class="menu-item">
                    <a href="{{url('courier-service')}}" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-download"></i>
                        <div data-i18n="Courier Service">Courier Service</div>
                    </a>
                </li>

                <li class="menu-item">
                    <a href="{{url('create-courier-rates')}}" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-download"></i>
                        <div data-i18n="Create Courier Rates">Create Courier Rates</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{url('view-courier-rates')}}" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-download"></i>
                        <div data-i18n="View Courier Rates">View Courier Rates</div>
                    </a>
                </li>




            </ul>
        </li>


        {{-- <li class="menu-header small text-uppercase">
            <span class="menu-header-text" data-i18n="Transaction">Transaction</span>
        </li>
        <li class="menu-item">
            <a href="app-email.html" class="menu-link">
                <i class="menu-icon tf-icons ti ti-map"></i>
                <div data-i18n="Tracking">Tracking</div>
            </a>
        </li>

        <li class="menu-item">
            <a href="app-kanban.html" class="menu-link">
                <i class="menu-icon tf-icons ti ti-truck"></i>
                <div data-i18n="Pickup Request">Pickup Request</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class='menu-icon tf-icons ti ti-upload'></i>
                <div data-i18n="Uploads">Uploads</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="app-chat.html" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-upload"></i>
                        <div data-i18n="Upload POD ">Upload POD</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="app-calendar.html" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-tags"></i>
                        <div data-i18n="Upload Docket">Upload Docket</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="app-kanban.html" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-columns"></i>
                        <div data-i18n="Upload NDR">Upload NDR</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="app-kanban.html" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-list"></i>
                        <div data-i18n="Upload Invoice">Upload Invoice</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="app-kanban.html" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-check"></i>
                        <div data-i18n="Upload Agreement">Upload Agreement</div>
                    </a>
                </li>
            </ul>
        </li>

        <li class="menu-header small text-uppercase">
            <span class="menu-header-text" data-i18n="Reports">Reports</span>
        </li>

        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class='menu-icon tf-icons ti ti-download'></i>

                <div data-i18n="Reports">Reports</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="app-email.html" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-download"></i>
                        <div data-i18n="Report - MIS">Report - MIS</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="app-chat.html" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-download"></i>
                        <div data-i18n="Report - NDR ">Report - NDR </div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="app-calendar.html" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-download"></i>
                        <div data-i18n="Report - Invoice">Report - Invoice</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="app-kanban.html" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-download"></i>
                        <div data-i18n="Report - Merchant Payment">Report - Merchant Payment</div>
                    </a>
                </li>
            </ul>
        </li>



        <li class="menu-header small text-uppercase">
            <span class="menu-header-text" data-i18n="COD Management">COD Management</span>
        </li>

        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class='menu-icon tf-icons ti ti-cloud'></i>

                <div data-i18n="COD Management">COD Management</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="app-email.html" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-download"></i>
                        <div data-i18n="COD To Remit">COD To Remit</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="app-chat.html" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-download"></i>
                        <div data-i18n="COD Reconcilation Report  ">COD Reconcilation Report </div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="app-calendar.html" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-download"></i>
                        <div data-i18n="COD Remittance Report">COD Remittance Report</div>
                    </a>
                </li>

            </ul>
        </li>

        <li class="menu-header small text-uppercase">
            <span class="menu-header-text" data-i18n=" AWB Expense "> AWB Expense </span>
        </li>

        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class='menu-icon tf-icons ti ti-ticket'></i>

                <div data-i18n=" AWB Expense "> AWB Expense </div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="app-email.html" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-download"></i>
                        <div data-i18n="AWB Expense - Booking ">AWB Expense - Booking </div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="app-chat.html" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-download"></i>
                        <div data-i18n="AWB Expense - Payment">AWB Expense - Payment</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="app-calendar.html" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-download"></i>
                        <div data-i18n="AWB Expense - approval">AWB Expense - approval</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="app-calendar.html" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-download"></i>
                        <div data-i18n="AWB Expense - Expense Report">AWB Expense - Expense Report</div>
                    </a>
                </li>

            </ul>
        </li>


        <li class="menu-header small text-uppercase">
            <span class="menu-header-text" data-i18n=" AWB Expense "> AWB Expense </span>
        </li>

        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class='menu-icon tf-icons ti ti-ticket'></i>

                <div data-i18n=" AWB Expense "> AWB Expense </div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="app-email.html" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-download"></i>
                        <div data-i18n="AWB Expense - Booking ">AWB Expense - Booking </div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="app-chat.html" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-download"></i>
                        <div data-i18n="AWB Expense - Payment">AWB Expense - Payment</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="app-calendar.html" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-download"></i>
                        <div data-i18n="AWB Expense - approval">AWB Expense - approval</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="app-calendar.html" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-download"></i>
                        <div data-i18n="AWB Expense - Expense Report">AWB Expense - Expense Report</div>
                    </a>
                </li>

            </ul>
        </li> --}}
    </ul>



</aside>
