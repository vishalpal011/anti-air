<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\Announcements;
use App\Http\Controllers\ApimasterController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\LabelController;
use App\Http\Controllers\SalesLeadController;
use App\Http\Controllers\WeightController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AirWayStockController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\CourierController;
use App\Http\Controllers\warehouseController;
use App\Http\Controllers\RateCardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', [Controller::class, 'index']);
// login section
Route::group(['middleware' => 'guest'], function () {
    Route::get('/login', [AdminController::class, 'index']);
    Route::post('/login-admin', [AdminController::class, 'admin_login']);
    Route::get('/forgot-password', [AdminController::class, 'forgot_pass']);
    Route::post('/send-otp', [AdminController::class, 'send_otp']);
});
Route::get('/logout', [Controller::class, 'logout']);
// end
Route::group(['middleware' => 'admin_login'], function () {

    // AWB Stocks
    Route::get('/create-awb', [Controller::class, 'create_awb']);
    Route::get('/get-awb-users', [AirWayStockController::class, 'show_users']);
    Route::Post('creat-aws-stock', [AirWayStockController::class, 'create']);
    Route::get('/awb-inventory', [AirWayStockController::class, 'view_inventory']);
    Route::POST('/update-awb-inventory', [AirWayStockController::class, 'update_awb_inventory']);
    Route::POST('/delete-awb-inventory', [AirWayStockController::class, 'delete_awb_inventory']);
    Route::get('/download-awbcodes/{user_id}', [AirWayStockController::class, 'download_awbcodes']);
    // end
    // AWB for couriers
    Route::get('/create-awb-couriers', [Controller::class, 'create_awb_couriers']);
    Route::Post('creat-awb-courier', [AirWayStockController::class, 'creat_awb_courier']);


    // Courier
    Route::get('/Courier', [Controller::class, 'Courier']);
    Route::post('/creat-courier', [CourierController::class, 'create_courier']);
    Route::get('/view-Courier', [CourierController::class, 'view_Courier']);
    Route::get('/edit-courier/{id}', [CourierController::class, 'edit_Courier']);
    Route::post('/update-courier', [CourierController::class, 'update_Courier']);
    Route::post('/update-status', [CourierController::class, 'updateStatus'])->name('updateStatus');
    Route::post('/delete-courier', [CourierController::class, 'delete_courier']);

    // couries allocation
    Route::get('/courier-allocation', [CourierController::class, 'courier_allocation']);
    Route::post('/create-courier-allocated', [CourierController::class, 'create_courier_allocated']);
    Route::post('/update-courier-allocateds', [CourierController::class, 'update_courier_allocateds']);
    Route::post('/delete-courier-allocated', [CourierController::class, 'delete_courier_allocated']);
    Route::post('/allocation-status', [CourierController::class, 'allocation_status']);

    // locations
    Route::get('/Country', [Controller::class, 'Country']);
    Route::post('/create-country', [LocationController::class, 'create_country']);
    Route::post('/update-country', [LocationController::class, 'update_country']);
    Route::post('/delete-country', [LocationController::class, 'delete_country']);
    // regions
    Route::get('/Regions', [Controller::class, 'Regions']);
    Route::post('/create-regions', [LocationController::class, 'create_regions']);

    Route::post('/update-regions ', [LocationController::class, 'update_regions']);
    Route::post('/delete-regions', [LocationController::class, 'delete_regions']);
    // State
    Route::get('/State', [Controller::class, 'State']);
    Route::post('/create-state', [LocationController::class, 'create_state']);
    Route::post('/update-state', [LocationController::class, 'update_state']);
    Route::post('/delete-state', [LocationController::class, 'delete_state']);
    // City
    Route::get('/City', [Controller::class, 'City']);
    Route::post('/create-city', [LocationController::class, 'create_city']);
    Route::post('/update-city', [LocationController::class, 'update_city']);
    Route::post('/delete-city', [LocationController::class, 'delete_city']);
    // Service Center
    Route::get('/Service-Center', [Controller::class, 'service_center']);
    Route::post('/create-service-center', [LocationController::class, 'create_service_center']);
    Route::post('/update-service-center', [LocationController::class, 'update_service_center']);
    Route::post('/delete-service-center', [LocationController::class, 'delete_service_center']);
    // Pin Code (Location & Regions)
    Route::get('/Pin-Code', [Controller::class, 'pin_code']);
    Route::post('/create-pin-code', [LocationController::class, 'create_pin_code']);
    Route::post('/update-pin-code', [LocationController::class, 'update_pin_code']);
    Route::post('/delete-pin-code', [LocationController::class, 'delete_pin_code']);
    // Zone
    Route::get('/Zone', [Controller::class, 'Zone']);
    Route::post('/create-zone', [LocationController::class, 'create_zone']);
    Route::post('/update-zone', [LocationController::class, 'update_zone']);
    Route::post('/delete-zone', [LocationController::class, 'delete_zone']);
    Route::post('/search-pin-codes', [LocationController::class, 'search_pin_codes']);

    // Clients
    Route::get('/client', [Controller::class, 'client']);
    Route::post('/create-client', [ClientController::class, 'create_client']);
    Route::post('/get-pincode', [ClientController::class, 'get_pincode_data']);
    Route::post('/get-pincode2', [ClientController::class, 'get_pincode_data2']);

    Route::get('/all-client', [ClientController::class, 'all_client']);
    Route::get('/view-client-details/{id}', [ClientController::class, 'view_client']);
    Route::post('/delete-client', [ClientController::class, 'delete_client']);
    Route::post('/client-update/{id}', [ClientController::class, 'client_update']);
    Route::post('/client-docs-update/{id}', [ClientController::class, 'client_docs_update']);
    Route::post('/client-company-docs-update/{id}', [ClientController::class, 'company_docs_update']);
    // Sales
    Route::get('/Sales', [Controller::class, 'Sales']);
    Route::post('/view-sales', [SalesLeadController::class, 'view_sales']);




    Route::post('/create-sales', [SalesLeadController::class, 'create_sales']);
    Route::post('/update-sales', [SalesLeadController::class, 'update_sales']);
    Route::post('/delete-sales', [SalesLeadController::class, 'delete_sales']);
    // Announcements - Post Ad
    Route::get('/Announcements', [Controller::class, 'Announcements']);
    Route::post('/create-announcements', [AnnouncementController::class, 'create_announcements']);
    Route::post('/update-post', [AnnouncementController::class, 'update_post']);
    Route::post('/delete-ads', [AnnouncementController::class, 'delete_ad']);


    // Announcements - Post Video Ad
    Route::get('/video-ads', [Controller::class, 'video_ad']);
    Route::post('/create-video-ads', [AnnouncementController::class, 'create_video_ad']);
    Route::post('/update-video-ad', [AnnouncementController::class, 'update_video_ad']);
    Route::post('/delete-video-ads', [AnnouncementController::class, 'delete_video_ad']);

    // Announcements - Post Video Ad url
    Route::get('/video-ads-url', [Controller::class, 'video_ad_url']);
    Route::post('/create-video-ads-url', [AnnouncementController::class, 'create_video_ad_url']);
    Route::post('/update-video-ad-url', [AnnouncementController::class, 'update_video_ad_url']);
    Route::post('/delete-video-url', [AnnouncementController::class, 'delete_video_ad_url']);
    // upload Pin codes
    Route::get('/upload-pin-Code', [Controller::class, 'upload_pin_code']);
    Route::post('/create-upload-pin', [LocationController::class, 'upload_pin']);
    Route::DELETE('/delete-upload-pins', [LocationController::class, 'delete_pincodes']);
    Route::get('/export-pins', [LocationController::class, 'export_pins']);


    // warehouse
    Route::get('/warehouse', [Controller::class, 'warehouse']);
    // booking & View Booking
    Route::get('/booking', [Controller::class, 'booking']);
    Route::post('/manual-booking', [BookingController::class, 'manual_booking']);
    Route::get('/view-booking', [Controller::class, 'view_booking']);
    Route::get('/all-booking', [BookingController::class, 'all_booking']);
    Route::POST('/get-clients', [BookingController::class, 'get_client']);
    Route::POST('/get-warehouse', [BookingController::class, 'get_warehouse']);
    Route::get('/rebooking/{id}', [BookingController::class, 'rebooking']);

    Route::POST('/update-manual-booking', [BookingController::class, 'update_manual_booking']);
    // forwaord B2C
    Route::get('/forword-Booking-B2C', [BookingController::class, 'forword_Booking_B2C']);



    // uploading BulkBooking and Assigning
    Route::post('/upload-bulkbooking', [BookingController::class, 'upload_bulkbooking']);
    Route::post('/assign-couriers', [BookingController::class, 'assign_couriers'])->name('assign-couriers');
    Route::get('/view-bookings/{id}', [BookingController::class, 'view_bookings']);
    Route::DELETE('/delete-forword-booking', [BookingController::class, 'delete_forword_booking'])->name('delete-forword-booking');
    Route::get('/forword-booking-excel', [BookingController::class, 'all_forword_booking']);

    //
    // B2C
    Route::get('/all-b2c-bookings', [BookingController::class, 'all_b2c_bookings']);
    Route::post('/assign-couriers-b2c', [BookingController::class, 'assign_couriers_b2c'])->name('assign-couriers-b2c');
    Route::get('/view-bookings-b2c/{id}', [BookingController::class, 'view_bookings_b2c']);
    Route::post('/create-booking-b2c-manual', [BookingController::class, 'create_booking_b2c_manual']);
    Route::post('/update-booking-b2c', [BookingController::class, 'update_bookings_b2c']);
    Route::post('/update-booking-excel', [BookingController::class, 'update_bookings_excel']);
    Route::post('/assign-labels-b2c', [BookingController::class, 'assign_labels_b2c']);
    Route::post('scheduled-pickup-b2c', [BookingController::class, 'scheduled_pickup_b2c']);
    Route::post('download_invoice', [BookingController::class, 'download_invoice']);
    Route::post('cancel-booking-b2c', [BookingController::class, 'cancel_booking_b2c']);
    Route::get('/transaction-log/{id}', [BookingController::class, 'transaction_log']);



    //
    // B2C Couriers Allocations
    Route::POST('/find-couriers-allocations', [BookingController::class, 'find_couriers_allocations']);



    // filter data
    Route::POST('/awb-filter-data', [AirWayStockController::class, 'awb_filter_data']);
    Route::POST('/client-data-filter', [ClientController::class, 'client_data_filter']);
    Route::POST('/courier-data-filter', [CourierController::class, 'courier_data_filter']);
    Route::POST('/country-data-filter', [LocationController::class, 'country_data_filter']);
    Route::POST('/regions-data-filter', [LocationController::class, 'regions_data_filter']);
    Route::POST('/state-data-filter', [LocationController::class, 'state_data_filter']);
    Route::POST('/city-data-filter', [LocationController::class, 'city_data_filter']);
    Route::POST('/servicecenter-data-filter', [LocationController::class, 'servicecenter_data_filter']);
    Route::POST('/pincode-data-filter', [LocationController::class, 'pincode_data_filter']);
    Route::POST('/zone-data-filter', [LocationController::class, 'zone_data_filter']);
    Route::POST('/sales-data-filter', [SalesLeadController::class, 'sales_data_filter']);
    Route::POST('/announcements-data-filter', [AnnouncementController::class, 'announcements_data_filter']);
    Route::POST('/videoads-data-filter', [AnnouncementController::class, 'videoads_data_filter']);
    Route::POST('/videourl-data-filter', [AnnouncementController::class, 'videourl_data_filter']);
    Route::POST('/warehouse-data-filter', [warehouseController::class, 'warehouse_data_filter']);


    // warehouse
    Route::POST('/creat-warehouse', [warehouseController::class, 'creat_warehouse']);
    Route::get('/view-warehouses', [warehouseController::class, 'view_warehouses']);
    Route::get('/edit-warehouse/{id}', [warehouseController::class, 'edit_warehouse']);
    Route::post('/update-warehouse', [warehouseController::class, 'update_warehouse']);
    Route::post('/delete-warehouse', [warehouseController::class, 'delete_warehouse']);

    // label setting
    Route::get('/lable-designs', [LabelController::class, 'defualt']);
    Route::get('/edit-label-4x4', [LabelController::class, 'edit_label']);
    Route::get('/edit-label-4.5x6.25', [LabelController::class, 'edit_label2']);
    Route::get('/edit-label-4x6', [LabelController::class, 'edit_label3']);
    Route::get('/default', [LabelController::class, 'edit_label4']);

    Route::get('/lable-setting', [LabelController::class, 'lable_setting']);


    // Section Activation ( label setting)
    Route::Post('/active_sold_by', [LabelController::class, 'active_sold_by']);
    Route::Post('/active_shippeing', [LabelController::class, 'active_shippeing']);
    Route::Post('/active_Product', [LabelController::class, 'active_Product']);
    Route::Post('/active_declaration', [LabelController::class, 'active_declaration']);
    Route::Post('/active_return_address', [LabelController::class, 'active_return_address']);
    Route::Post('/active_display_logo', [LabelController::class, 'active_display_logo']);
    Route::Post('/active_consignee_mobile', [LabelController::class, 'active_consignee_mobile']);
    // end

    // Email
    Route::get('/email-settings', [Controller::class, 'email_settings']);
    Route::post('/update-mail-config', [Controller::class, 'update_mail_config']);

    // all reverse Booking
    Route::get('/reverse-booking', [BookingController::class, 'reverse_booking']);
    Route::Post('/reverse-booking-create', [BookingController::class, 'reverse_booking_create']);
    Route::Post('upload-bulkbooking-reverse', [BookingController::class, 'upload_bulkbooking_reverse']);
    Route::get('/all-reverse-booking', [BookingController::class, 'all_reverse_booking']);
    Route::post('/assign-couriers-reverse-request', [BookingController::class, 'assign_couriers_reverse_request'])->name('assign-couriers-reverse-request');
    Route::DELETE('/delete-reverse-booking', [BookingController::class, 'delete_reverse_booking'])->name('delete-reverse-booking');
    Route::get('/reverse-booking-excel', [BookingController::class, 'reverse_booking_excel']);


    //

    // Weight and EDD
    Route::get('/weight-and-EDD', [WeightController::class, 'weight_and_EDD']);
    //
    // APIs Master
    Route::get('/all-apis', [ApimasterController::class, 'all_api']);
    Route::POST('/create-api-name', [ApimasterController::class, 'create_api_name']);
    Route::get('/apis-status', [ApimasterController::class, 'apis_status']);
    Route::POST('/create-api-status', [ApimasterController::class, 'create_api_status']);

    Route::get('/apis-comments', [ApimasterController::class, 'api_comments']);
    Route::post('/get-apis-status', [ApimasterController::class, 'get_apis_status']);
    Route::post('/create-courier-comments', [ApimasterController::class, 'create_courier_comments']);

    // end

    // kyc status
    Route::post('/client-kyc-reject', [ClientController::class, 'client_kyc_reject']);
    Route::post('/client-kyc-approve', [ClientController::class, 'client_kyc_approve']);

    // rate card
    Route::get('/courier-service', [RateCardController::class, 'courier_service']);
    Route::get('/create-courier-rates', [RateCardController::class, 'create_courier_rates']);
    Route::post('/upload-courier-rate', [RateCardController::class, 'upload_courier_rate']);
    Route::get('/view-courier-rates', [RateCardController::class, 'view_courier_rates']);
    Route::get('/edit-courier-rate/{id}', [RateCardController::class, 'edit_courier_rate']);
    Route::post('/update-courier-rate/{id}', [RateCardController::class, 'update_courier_rate']);
    Route::post('/delete-courier-rate', [RateCardController::class, 'delete_courier_rate']);

    // courier service
    Route::post('/create-courier-service', [RateCardController::class, 'create_courier_service']);
    Route::post('/update-courier-service/{id}', [RateCardController::class, 'update_courier_service']);
    Route::post('/delete-courier-service', [RateCardController::class, 'delete_courier_service']);

    // filters
    Route::post('/transaction-filter', [BookingController::class, 'transaction_filter']);




    // Error Redirection
    // Route::get('/error/404', [Controller::class, 'email_settings']);
    Route::get('/errors/404', function () {
        return view('errors.500');
    });

});
