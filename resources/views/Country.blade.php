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
                            <span class="text-muted fw-light">Location /</span> Country
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
                                                    <p class="mb-0 fw-medium">Deactive Country</p>
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
                                                    <p class="mb-0 fw-medium">Active Country</p>
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
                                                                        Add New Country</h5>
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal"
                                                                        aria-label="Close"></button>
                                                                </div>
                                                                <form id="aws" method="post">
                                                                    <div class="modal-body">

                                                                        <div class="row g-2">
                                                                            <div class="col mb-0">
                                                                                <input type="text"
                                                                                    name="country_code"
                                                                                    class="form-control"
                                                                                    placeholder="Enter Country Code" required>
                                                                            </div>
                                                                            <div class="col mb-0">
                                                                                <select name="country_name"
                                                                                    class="form-control" id="" required>
                                                                                    <option value="" selected>Select
                                                                                        Country
                                                                                        Name</option>
                                                                                    <option value="Afghanistan">
                                                                                        Afghanistan
                                                                                    </option>
                                                                                    <option value="Albania">Albania
                                                                                    </option>
                                                                                    <option value="Algeria">Algeria
                                                                                    </option>
                                                                                    <option value="American Samoa">
                                                                                        American
                                                                                        Samoa</option>
                                                                                    <option value="Andorra">Andorra
                                                                                    </option>
                                                                                    <option value="Angola">Angola
                                                                                    </option>
                                                                                    <option value="Anguilla">Anguilla
                                                                                    </option>
                                                                                    <option value="Antartica">Antarctica
                                                                                    </option>
                                                                                    <option value="Antigua and Barbuda">
                                                                                        Antigua and Barbuda</option>
                                                                                    <option value="Argentina">Argentina
                                                                                    </option>
                                                                                    <option value="Armenia">Armenia
                                                                                    </option>
                                                                                    <option value="Aruba">Aruba
                                                                                    </option>
                                                                                    <option value="Australia">Australia
                                                                                    </option>
                                                                                    <option value="Austria">Austria
                                                                                    </option>
                                                                                    <option value="Azerbaijan">
                                                                                        Azerbaijan
                                                                                    </option>
                                                                                    <option value="Bahamas">Bahamas
                                                                                    </option>
                                                                                    <option value="Bahrain">Bahrain
                                                                                    </option>
                                                                                    <option value="Bangladesh">
                                                                                        Bangladesh
                                                                                    </option>
                                                                                    <option value="Barbados">Barbados
                                                                                    </option>
                                                                                    <option value="Belarus">Belarus
                                                                                    </option>
                                                                                    <option value="Belgium">Belgium
                                                                                    </option>
                                                                                    <option value="Belize">Belize
                                                                                    </option>
                                                                                    <option value="Benin">Benin
                                                                                    </option>
                                                                                    <option value="Bermuda">Bermuda
                                                                                    </option>
                                                                                    <option value="Bhutan">Bhutan
                                                                                    </option>
                                                                                    <option value="Bolivia">Bolivia
                                                                                    </option>
                                                                                    <option
                                                                                        value="Bosnia and Herzegowina">
                                                                                        Bosnia and Herzegowina</option>
                                                                                    <option value="Botswana">Botswana
                                                                                    </option>
                                                                                    <option value="Bouvet Island">
                                                                                        Bouvet
                                                                                        Island</option>
                                                                                    <option value="Brazil">Brazil
                                                                                    </option>
                                                                                    <option
                                                                                        value="British Indian Ocean Territory">
                                                                                        British Indian Ocean Territory
                                                                                    </option>
                                                                                    <option value="Brunei Darussalam">
                                                                                        Brunei Darussalam</option>
                                                                                    <option value="Bulgaria">Bulgaria
                                                                                    </option>
                                                                                    <option value="Burkina Faso">
                                                                                        Burkina
                                                                                        Faso</option>
                                                                                    <option value="Burundi">Burundi
                                                                                    </option>
                                                                                    <option value="Cambodia">Cambodia
                                                                                    </option>
                                                                                    <option value="Cameroon">Cameroon
                                                                                    </option>
                                                                                    <option value="Canada">Canada
                                                                                    </option>
                                                                                    <option value="Cape Verde">Cape
                                                                                        Verde
                                                                                    </option>
                                                                                    <option value="Cayman Islands">
                                                                                        Cayman
                                                                                        Islands</option>
                                                                                    <option
                                                                                        value="Central African Republic">
                                                                                        Central African Republic
                                                                                    </option>
                                                                                    <option value="Chad">Chad
                                                                                    </option>
                                                                                    <option value="Chile">Chile
                                                                                    </option>
                                                                                    <option value="China">China
                                                                                    </option>
                                                                                    <option value="Christmas Island">
                                                                                        Christmas Island</option>
                                                                                    <option value="Cocos Islands">Cocos
                                                                                        (Keeling) Islands</option>
                                                                                    <option value="Colombia">Colombia
                                                                                    </option>
                                                                                    <option value="Comoros">Comoros
                                                                                    </option>
                                                                                    <option value="Congo">Congo
                                                                                    </option>
                                                                                    <option value="Congo">Congo, the
                                                                                        Democratic Republic of the
                                                                                    </option>
                                                                                    <option value="Cook Islands">Cook
                                                                                        Islands</option>
                                                                                    <option value="Costa Rica">Costa
                                                                                        Rica
                                                                                    </option>
                                                                                    <option value="Cota D'Ivoire">Cote
                                                                                        d'Ivoire</option>
                                                                                    <option value="Croatia">Croatia
                                                                                        (Hrvatska)</option>
                                                                                    <option value="Cuba">Cuba
                                                                                    </option>
                                                                                    <option value="Cyprus">Cyprus
                                                                                    </option>
                                                                                    <option value="Czech Republic">
                                                                                        Czech
                                                                                        Republic</option>
                                                                                    <option value="Denmark">Denmark
                                                                                    </option>
                                                                                    <option value="Djibouti">Djibouti
                                                                                    </option>
                                                                                    <option value="Dominica">Dominica
                                                                                    </option>
                                                                                    <option value="Dominican Republic">
                                                                                        Dominican Republic</option>
                                                                                    <option value="East Timor">East
                                                                                        Timor
                                                                                    </option>
                                                                                    <option value="Ecuador">Ecuador
                                                                                    </option>
                                                                                    <option value="Egypt">Egypt
                                                                                    </option>
                                                                                    <option value="El Salvador">El
                                                                                        Salvador
                                                                                    </option>
                                                                                    <option value="Equatorial Guinea">
                                                                                        Equatorial Guinea</option>
                                                                                    <option value="Eritrea">Eritrea
                                                                                    </option>
                                                                                    <option value="Estonia">Estonia
                                                                                    </option>
                                                                                    <option value="Ethiopia">Ethiopia
                                                                                    </option>
                                                                                    <option value="Falkland Islands">
                                                                                        Falkland Islands (Malvinas)
                                                                                    </option>
                                                                                    <option value="Faroe Islands">Faroe
                                                                                        Islands</option>
                                                                                    <option value="Fiji">Fiji
                                                                                    </option>
                                                                                    <option value="Finland">Finland
                                                                                    </option>
                                                                                    <option value="France">France
                                                                                    </option>
                                                                                    <option
                                                                                        value="France Metropolitan">
                                                                                        France, Metropolitan</option>
                                                                                    <option value="French Guiana">
                                                                                        French
                                                                                        Guiana</option>
                                                                                    <option value="French Polynesia">
                                                                                        French
                                                                                        Polynesia</option>
                                                                                    <option
                                                                                        value="French Southern Territories">
                                                                                        French Southern Territories
                                                                                    </option>
                                                                                    <option value="Gabon">Gabon
                                                                                    </option>
                                                                                    <option value="Gambia">Gambia
                                                                                    </option>
                                                                                    <option value="Georgia">Georgia
                                                                                    </option>
                                                                                    <option value="Germany">Germany
                                                                                    </option>
                                                                                    <option value="Ghana">Ghana
                                                                                    </option>
                                                                                    <option value="Gibraltar">Gibraltar
                                                                                    </option>
                                                                                    <option value="Greece">Greece
                                                                                    </option>
                                                                                    <option value="Greenland">Greenland
                                                                                    </option>
                                                                                    <option value="Grenada">Grenada
                                                                                    </option>
                                                                                    <option value="Guadeloupe">
                                                                                        Guadeloupe
                                                                                    </option>
                                                                                    <option value="Guam">Guam
                                                                                    </option>
                                                                                    <option value="Guatemala">Guatemala
                                                                                    </option>
                                                                                    <option value="Guinea">Guinea
                                                                                    </option>
                                                                                    <option value="Guinea-Bissau">
                                                                                        Guinea-Bissau</option>
                                                                                    <option value="Guyana">Guyana
                                                                                    </option>
                                                                                    <option value="Haiti">Haiti
                                                                                    </option>
                                                                                    <option
                                                                                        value="Heard and McDonald Islands">
                                                                                        Heard and Mc Donald Islands
                                                                                    </option>
                                                                                    <option value="Holy See">Holy See
                                                                                        (Vatican City State)</option>
                                                                                    <option value="Honduras">Honduras
                                                                                    </option>
                                                                                    <option value="Hong Kong">Hong Kong
                                                                                    </option>
                                                                                    <option value="Hungary">Hungary
                                                                                    </option>
                                                                                    <option value="Iceland">Iceland
                                                                                    </option>
                                                                                    <option value="India">India
                                                                                    </option>
                                                                                    <option value="Indonesia">Indonesia
                                                                                    </option>
                                                                                    <option value="Iran">Iran
                                                                                        (Islamic
                                                                                        Republic of)</option>
                                                                                    <option value="Iraq">Iraq
                                                                                    </option>
                                                                                    <option value="Ireland">Ireland
                                                                                    </option>
                                                                                    <option value="Israel">Israel
                                                                                    </option>
                                                                                    <option value="Italy">Italy
                                                                                    </option>
                                                                                    <option value="Jamaica">Jamaica
                                                                                    </option>
                                                                                    <option value="Japan">Japan
                                                                                    </option>
                                                                                    <option value="Jordan">Jordan
                                                                                    </option>
                                                                                    <option value="Kazakhstan">
                                                                                        Kazakhstan
                                                                                    </option>
                                                                                    <option value="Kenya">Kenya
                                                                                    </option>
                                                                                    <option value="Kiribati">Kiribati
                                                                                    </option>
                                                                                    <option
                                                                                        value="Democratic People's Republic of Korea">
                                                                                        Korea, Democratic People's
                                                                                        Republic
                                                                                        of</option>
                                                                                    <option value="Korea">Korea,
                                                                                        Republic
                                                                                        of</option>
                                                                                    <option value="Kuwait">Kuwait
                                                                                    </option>
                                                                                    <option value="Kyrgyzstan">
                                                                                        Kyrgyzstan
                                                                                    </option>
                                                                                    <option value="Lao">Lao People's
                                                                                        Democratic Republic</option>
                                                                                    <option value="Latvia">Latvia
                                                                                    </option>
                                                                                    <option value="Lebanon">
                                                                                        Lebanon</option>
                                                                                    <option value="Lesotho">Lesotho
                                                                                    </option>
                                                                                    <option value="Liberia">Liberia
                                                                                    </option>
                                                                                    <option
                                                                                        value="Libyan Arab Jamahiriya">
                                                                                        Libyan Arab Jamahiriya</option>
                                                                                    <option value="Liechtenstein">
                                                                                        Liechtenstein</option>
                                                                                    <option value="Lithuania">Lithuania
                                                                                    </option>
                                                                                    <option value="Luxembourg">
                                                                                        Luxembourg
                                                                                    </option>
                                                                                    <option value="Macau">Macau
                                                                                    </option>
                                                                                    <option value="Macedonia">
                                                                                        Macedonia,
                                                                                        The Former Yugoslav Republic of
                                                                                    </option>
                                                                                    <option value="Madagascar">
                                                                                        Madagascar
                                                                                    </option>
                                                                                    <option value="Malawi">Malawi
                                                                                    </option>
                                                                                    <option value="Malaysia">Malaysia
                                                                                    </option>
                                                                                    <option value="Maldives">Maldives
                                                                                    </option>
                                                                                    <option value="Mali">Mali
                                                                                    </option>
                                                                                    <option value="Malta">Malta
                                                                                    </option>
                                                                                    <option value="Marshall Islands">
                                                                                        Marshall Islands</option>
                                                                                    <option value="Martinique">
                                                                                        Martinique
                                                                                    </option>
                                                                                    <option value="Mauritania">
                                                                                        Mauritania
                                                                                    </option>
                                                                                    <option value="Mauritius">Mauritius
                                                                                    </option>
                                                                                    <option value="Mayotte">Mayotte
                                                                                    </option>
                                                                                    <option value="Mexico">Mexico
                                                                                    </option>
                                                                                    <option value="Micronesia">
                                                                                        Micronesia,
                                                                                        Federated States of</option>
                                                                                    <option value="Moldova">Moldova,
                                                                                        Republic of</option>
                                                                                    <option value="Monaco">Monaco
                                                                                    </option>
                                                                                    <option value="Mongolia">Mongolia
                                                                                    </option>
                                                                                    <option value="Montserrat">
                                                                                        Montserrat
                                                                                    </option>
                                                                                    <option value="Morocco">Morocco
                                                                                    </option>
                                                                                    <option value="Mozambique">
                                                                                        Mozambique
                                                                                    </option>
                                                                                    <option value="Myanmar">Myanmar
                                                                                    </option>
                                                                                    <option value="Namibia">Namibia
                                                                                    </option>
                                                                                    <option value="Nauru">Nauru
                                                                                    </option>
                                                                                    <option value="Nepal">Nepal
                                                                                    </option>
                                                                                    <option value="Netherlands">
                                                                                        Netherlands
                                                                                    </option>
                                                                                    <option
                                                                                        value="Netherlands Antilles">
                                                                                        Netherlands Antilles</option>
                                                                                    <option value="New Caledonia">New
                                                                                        Caledonia</option>
                                                                                    <option value="New Zealand">New
                                                                                        Zealand
                                                                                    </option>
                                                                                    <option value="Nicaragua">Nicaragua
                                                                                    </option>
                                                                                    <option value="Niger">Niger
                                                                                    </option>
                                                                                    <option value="Nigeria">Nigeria
                                                                                    </option>
                                                                                    <option value="Niue">Niue
                                                                                    </option>
                                                                                    <option value="Norfolk Island">
                                                                                        Norfolk
                                                                                        Island</option>
                                                                                    <option
                                                                                        value="Northern Mariana Islands">
                                                                                        Northern Mariana Islands
                                                                                    </option>
                                                                                    <option value="Norway">Norway
                                                                                    </option>
                                                                                    <option value="Oman">Oman
                                                                                    </option>
                                                                                    <option value="Pakistan">Pakistan
                                                                                    </option>
                                                                                    <option value="Palau">Palau
                                                                                    </option>
                                                                                    <option value="Panama">Panama
                                                                                    </option>
                                                                                    <option value="Papua New Guinea">
                                                                                        Papua
                                                                                        New Guinea</option>
                                                                                    <option value="Paraguay">Paraguay
                                                                                    </option>
                                                                                    <option value="Peru">Peru
                                                                                    </option>
                                                                                    <option value="Philippines">
                                                                                        Philippines
                                                                                    </option>
                                                                                    <option value="Pitcairn">Pitcairn
                                                                                    </option>
                                                                                    <option value="Poland">Poland
                                                                                    </option>
                                                                                    <option value="Portugal">Portugal
                                                                                    </option>
                                                                                    <option value="Puerto Rico">Puerto
                                                                                        Rico
                                                                                    </option>
                                                                                    <option value="Qatar">Qatar
                                                                                    </option>
                                                                                    <option value="Reunion">Reunion
                                                                                    </option>
                                                                                    <option value="Romania">Romania
                                                                                    </option>
                                                                                    <option value="Russia">Russian
                                                                                        Federation</option>
                                                                                    <option value="Rwanda">Rwanda
                                                                                    </option>
                                                                                    <option
                                                                                        value="Saint Kitts and Nevis">
                                                                                        Saint Kitts and Nevis</option>
                                                                                    <option value="Saint LUCIA">Saint
                                                                                        LUCIA
                                                                                    </option>
                                                                                    <option value="Saint Vincent">Saint
                                                                                        Vincent and the Grenadines
                                                                                    </option>
                                                                                    <option value="Samoa">Samoa
                                                                                    </option>
                                                                                    <option value="San Marino">San
                                                                                        Marino
                                                                                    </option>
                                                                                    <option
                                                                                        value="Sao Tome and Principe">
                                                                                        Sao Tome and Principe</option>
                                                                                    <option value="Saudi Arabia">Saudi
                                                                                        Arabia</option>
                                                                                    <option value="Senegal">Senegal
                                                                                    </option>
                                                                                    <option value="Seychelles">
                                                                                        Seychelles
                                                                                    </option>
                                                                                    <option value="Sierra">Sierra Leone
                                                                                    </option>
                                                                                    <option value="Singapore">Singapore
                                                                                    </option>
                                                                                    <option value="Slovakia">Slovakia
                                                                                        (Slovak Republic)</option>
                                                                                    <option value="Slovenia">Slovenia
                                                                                    </option>
                                                                                    <option value="Solomon Islands">
                                                                                        Solomon
                                                                                        Islands</option>
                                                                                    <option value="Somalia">Somalia
                                                                                    </option>
                                                                                    <option value="South Africa">South
                                                                                        Africa</option>
                                                                                    <option value="South Georgia">South
                                                                                        Georgia and the South Sandwich
                                                                                        Islands</option>
                                                                                    <option value="Span">Spain
                                                                                    </option>
                                                                                    <option value="SriLanka">Sri Lanka
                                                                                    </option>
                                                                                    <option value="St. Helena">St.
                                                                                        Helena
                                                                                    </option>
                                                                                    <option
                                                                                        value="St. Pierre and Miguelon">
                                                                                        St.
                                                                                        Pierre and Miquelon</option>
                                                                                    <option value="Sudan">Sudan
                                                                                    </option>
                                                                                    <option value="Suriname">Suriname
                                                                                    </option>
                                                                                    <option value="Svalbard">Svalbard
                                                                                        and
                                                                                        Jan Mayen Islands</option>
                                                                                    <option value="Swaziland">Swaziland
                                                                                    </option>
                                                                                    <option value="Sweden">Sweden
                                                                                    </option>
                                                                                    <option value="Switzerland">
                                                                                        Switzerland
                                                                                    </option>
                                                                                    <option value="Syria">Syrian Arab
                                                                                        Republic</option>
                                                                                    <option value="Taiwan">Taiwan,
                                                                                        Province
                                                                                        of China</option>
                                                                                    <option value="Tajikistan">
                                                                                        Tajikistan
                                                                                    </option>
                                                                                    <option value="Tanzania">Tanzania,
                                                                                        United Republic of</option>
                                                                                    <option value="Thailand">Thailand
                                                                                    </option>
                                                                                    <option value="Togo">Togo
                                                                                    </option>
                                                                                    <option value="Tokelau">Tokelau
                                                                                    </option>
                                                                                    <option value="Tonga">Tonga
                                                                                    </option>
                                                                                    <option
                                                                                        value="Trinidad and Tobago">
                                                                                        Trinidad and Tobago</option>
                                                                                    <option value="Tunisia">Tunisia
                                                                                    </option>
                                                                                    <option value="Turkey">Turkey
                                                                                    </option>
                                                                                    <option value="Turkmenistan">
                                                                                        Turkmenistan</option>
                                                                                    <option value="Turks and Caicos">
                                                                                        Turks
                                                                                        and Caicos Islands</option>
                                                                                    <option value="Tuvalu">Tuvalu
                                                                                    </option>
                                                                                    <option value="Uganda">Uganda
                                                                                    </option>
                                                                                    <option value="Ukraine">Ukraine
                                                                                    </option>
                                                                                    <option
                                                                                        value="United Arab Emirates">
                                                                                        United Arab Emirates</option>
                                                                                    <option value="United Kingdom">
                                                                                        United
                                                                                        Kingdom</option>
                                                                                    <option value="United States">
                                                                                        United
                                                                                        States</option>
                                                                                    <option
                                                                                        value="United States Minor Outlying Islands">
                                                                                        United States Minor Outlying
                                                                                        Islands
                                                                                    </option>
                                                                                    <option value="Uruguay">Uruguay
                                                                                    </option>
                                                                                    <option value="Uzbekistan">
                                                                                        Uzbekistan
                                                                                    </option>
                                                                                    <option value="Vanuatu">Vanuatu
                                                                                    </option>
                                                                                    <option value="Venezuela">Venezuela
                                                                                    </option>
                                                                                    <option value="Vietnam">Viet Nam
                                                                                    </option>
                                                                                    <option
                                                                                        value="Virgin Islands (British)">
                                                                                        Virgin Islands (British)
                                                                                    </option>
                                                                                    <option
                                                                                        value="Virgin Islands (U.S)">
                                                                                        Virgin Islands (U.S.)</option>
                                                                                    <option
                                                                                        value="Wallis and Futana Islands">
                                                                                        Wallis and Futuna Islands
                                                                                    </option>
                                                                                    <option value="Western Sahara">
                                                                                        Western
                                                                                        Sahara</option>
                                                                                    <option value="Yemen">Yemen
                                                                                    </option>
                                                                                    <option value="Serbia">Serbia
                                                                                    </option>
                                                                                    <option value="Zambia">Zambia
                                                                                    </option>
                                                                                    <option value="Zimbabwe">Zimbabwe
                                                                                    </option>
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
                                <table id="example" class="display nowrap" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>S.No.</th>
                                            <th>Country Code</th>
                                            <th>Country Name</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $count = 1 ;
                                        @endphp
                                        @foreach ($data as $value)
                                            <tr id="row{{ $value->id }}">

                                                <td>{{$count}}</td>
                                                <td>{{ $value->country_code }}</td>
                                                <td>{{ $value->country_name }}</td>
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
                                                    <span data-bs-toggle="modal" data-bs-target="#deleteFunction{{$value->id}}"><i class='menu-icon tf-icons ti ti-trash'></i></span>
                                                   
                                                </td>
                                            </tr>
                                            <div class="modal fade" id="basicModals{{ $value->id }}"
                                                tabindex="-1" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel1">
                                                                Edit Country</h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <form action="{{url('update-country')}}" method="post">
                                                            @csrf
                                                            <div class="modal-body">

                                                                <div class="row g-2">
                                                                    <div class="col mb-0">
                                                                        <input type="text" name="country_code"
                                                                            class="form-control"
                                                                            placeholder="Enter Country Code"
                                                                            value="{{ $value->country_code }}" required>
                                                                            <input type="text" hidden name="id" value="{{ $value->id }}">
                                                                    </div>
                                                                    <div class="col mb-0">
                                                                        

                                                                            <select name="country_name"
                                                                                    class="form-control" id="">
                                                                                    <option value="{{ $value->country_name }}" selected>{{ $value->country_name }} (Default Selected)</option>
                                                                                    <option value="Afghanistan">
                                                                                        Afghanistan
                                                                                    </option>
                                                                                    <option value="Albania">Albania
                                                                                    </option>
                                                                                    <option value="Algeria">Algeria
                                                                                    </option>
                                                                                    <option value="American Samoa">
                                                                                        American
                                                                                        Samoa</option>
                                                                                    <option value="Andorra">Andorra
                                                                                    </option>
                                                                                    <option value="Angola">Angola
                                                                                    </option>
                                                                                    <option value="Anguilla">Anguilla
                                                                                    </option>
                                                                                    <option value="Antartica">Antarctica
                                                                                    </option>
                                                                                    <option value="Antigua and Barbuda">
                                                                                        Antigua and Barbuda</option>
                                                                                    <option value="Argentina">Argentina
                                                                                    </option>
                                                                                    <option value="Armenia">Armenia
                                                                                    </option>
                                                                                    <option value="Aruba">Aruba
                                                                                    </option>
                                                                                    <option value="Australia">Australia
                                                                                    </option>
                                                                                    <option value="Austria">Austria
                                                                                    </option>
                                                                                    <option value="Azerbaijan">
                                                                                        Azerbaijan
                                                                                    </option>
                                                                                    <option value="Bahamas">Bahamas
                                                                                    </option>
                                                                                    <option value="Bahrain">Bahrain
                                                                                    </option>
                                                                                    <option value="Bangladesh">
                                                                                        Bangladesh
                                                                                    </option>
                                                                                    <option value="Barbados">Barbados
                                                                                    </option>
                                                                                    <option value="Belarus">Belarus
                                                                                    </option>
                                                                                    <option value="Belgium">Belgium
                                                                                    </option>
                                                                                    <option value="Belize">Belize
                                                                                    </option>
                                                                                    <option value="Benin">Benin
                                                                                    </option>
                                                                                    <option value="Bermuda">Bermuda
                                                                                    </option>
                                                                                    <option value="Bhutan">Bhutan
                                                                                    </option>
                                                                                    <option value="Bolivia">Bolivia
                                                                                    </option>
                                                                                    <option
                                                                                        value="Bosnia and Herzegowina">
                                                                                        Bosnia and Herzegowina</option>
                                                                                    <option value="Botswana">Botswana
                                                                                    </option>
                                                                                    <option value="Bouvet Island">
                                                                                        Bouvet
                                                                                        Island</option>
                                                                                    <option value="Brazil">Brazil
                                                                                    </option>
                                                                                    <option
                                                                                        value="British Indian Ocean Territory">
                                                                                        British Indian Ocean Territory
                                                                                    </option>
                                                                                    <option value="Brunei Darussalam">
                                                                                        Brunei Darussalam</option>
                                                                                    <option value="Bulgaria">Bulgaria
                                                                                    </option>
                                                                                    <option value="Burkina Faso">
                                                                                        Burkina
                                                                                        Faso</option>
                                                                                    <option value="Burundi">Burundi
                                                                                    </option>
                                                                                    <option value="Cambodia">Cambodia
                                                                                    </option>
                                                                                    <option value="Cameroon">Cameroon
                                                                                    </option>
                                                                                    <option value="Canada">Canada
                                                                                    </option>
                                                                                    <option value="Cape Verde">Cape
                                                                                        Verde
                                                                                    </option>
                                                                                    <option value="Cayman Islands">
                                                                                        Cayman
                                                                                        Islands</option>
                                                                                    <option
                                                                                        value="Central African Republic">
                                                                                        Central African Republic
                                                                                    </option>
                                                                                    <option value="Chad">Chad
                                                                                    </option>
                                                                                    <option value="Chile">Chile
                                                                                    </option>
                                                                                    <option value="China">China
                                                                                    </option>
                                                                                    <option value="Christmas Island">
                                                                                        Christmas Island</option>
                                                                                    <option value="Cocos Islands">Cocos
                                                                                        (Keeling) Islands</option>
                                                                                    <option value="Colombia">Colombia
                                                                                    </option>
                                                                                    <option value="Comoros">Comoros
                                                                                    </option>
                                                                                    <option value="Congo">Congo
                                                                                    </option>
                                                                                    <option value="Congo">Congo, the
                                                                                        Democratic Republic of the
                                                                                    </option>
                                                                                    <option value="Cook Islands">Cook
                                                                                        Islands</option>
                                                                                    <option value="Costa Rica">Costa
                                                                                        Rica
                                                                                    </option>
                                                                                    <option value="Cota D'Ivoire">Cote
                                                                                        d'Ivoire</option>
                                                                                    <option value="Croatia">Croatia
                                                                                        (Hrvatska)</option>
                                                                                    <option value="Cuba">Cuba
                                                                                    </option>
                                                                                    <option value="Cyprus">Cyprus
                                                                                    </option>
                                                                                    <option value="Czech Republic">
                                                                                        Czech
                                                                                        Republic</option>
                                                                                    <option value="Denmark">Denmark
                                                                                    </option>
                                                                                    <option value="Djibouti">Djibouti
                                                                                    </option>
                                                                                    <option value="Dominica">Dominica
                                                                                    </option>
                                                                                    <option value="Dominican Republic">
                                                                                        Dominican Republic</option>
                                                                                    <option value="East Timor">East
                                                                                        Timor
                                                                                    </option>
                                                                                    <option value="Ecuador">Ecuador
                                                                                    </option>
                                                                                    <option value="Egypt">Egypt
                                                                                    </option>
                                                                                    <option value="El Salvador">El
                                                                                        Salvador
                                                                                    </option>
                                                                                    <option value="Equatorial Guinea">
                                                                                        Equatorial Guinea</option>
                                                                                    <option value="Eritrea">Eritrea
                                                                                    </option>
                                                                                    <option value="Estonia">Estonia
                                                                                    </option>
                                                                                    <option value="Ethiopia">Ethiopia
                                                                                    </option>
                                                                                    <option value="Falkland Islands">
                                                                                        Falkland Islands (Malvinas)
                                                                                    </option>
                                                                                    <option value="Faroe Islands">Faroe
                                                                                        Islands</option>
                                                                                    <option value="Fiji">Fiji
                                                                                    </option>
                                                                                    <option value="Finland">Finland
                                                                                    </option>
                                                                                    <option value="France">France
                                                                                    </option>
                                                                                    <option
                                                                                        value="France Metropolitan">
                                                                                        France, Metropolitan</option>
                                                                                    <option value="French Guiana">
                                                                                        French
                                                                                        Guiana</option>
                                                                                    <option value="French Polynesia">
                                                                                        French
                                                                                        Polynesia</option>
                                                                                    <option
                                                                                        value="French Southern Territories">
                                                                                        French Southern Territories
                                                                                    </option>
                                                                                    <option value="Gabon">Gabon
                                                                                    </option>
                                                                                    <option value="Gambia">Gambia
                                                                                    </option>
                                                                                    <option value="Georgia">Georgia
                                                                                    </option>
                                                                                    <option value="Germany">Germany
                                                                                    </option>
                                                                                    <option value="Ghana">Ghana
                                                                                    </option>
                                                                                    <option value="Gibraltar">Gibraltar
                                                                                    </option>
                                                                                    <option value="Greece">Greece
                                                                                    </option>
                                                                                    <option value="Greenland">Greenland
                                                                                    </option>
                                                                                    <option value="Grenada">Grenada
                                                                                    </option>
                                                                                    <option value="Guadeloupe">
                                                                                        Guadeloupe
                                                                                    </option>
                                                                                    <option value="Guam">Guam
                                                                                    </option>
                                                                                    <option value="Guatemala">Guatemala
                                                                                    </option>
                                                                                    <option value="Guinea">Guinea
                                                                                    </option>
                                                                                    <option value="Guinea-Bissau">
                                                                                        Guinea-Bissau</option>
                                                                                    <option value="Guyana">Guyana
                                                                                    </option>
                                                                                    <option value="Haiti">Haiti
                                                                                    </option>
                                                                                    <option
                                                                                        value="Heard and McDonald Islands">
                                                                                        Heard and Mc Donald Islands
                                                                                    </option>
                                                                                    <option value="Holy See">Holy See
                                                                                        (Vatican City State)</option>
                                                                                    <option value="Honduras">Honduras
                                                                                    </option>
                                                                                    <option value="Hong Kong">Hong Kong
                                                                                    </option>
                                                                                    <option value="Hungary">Hungary
                                                                                    </option>
                                                                                    <option value="Iceland">Iceland
                                                                                    </option>
                                                                                    <option value="India">India
                                                                                    </option>
                                                                                    <option value="Indonesia">Indonesia
                                                                                    </option>
                                                                                    <option value="Iran">Iran
                                                                                        (Islamic
                                                                                        Republic of)</option>
                                                                                    <option value="Iraq">Iraq
                                                                                    </option>
                                                                                    <option value="Ireland">Ireland
                                                                                    </option>
                                                                                    <option value="Israel">Israel
                                                                                    </option>
                                                                                    <option value="Italy">Italy
                                                                                    </option>
                                                                                    <option value="Jamaica">Jamaica
                                                                                    </option>
                                                                                    <option value="Japan">Japan
                                                                                    </option>
                                                                                    <option value="Jordan">Jordan
                                                                                    </option>
                                                                                    <option value="Kazakhstan">
                                                                                        Kazakhstan
                                                                                    </option>
                                                                                    <option value="Kenya">Kenya
                                                                                    </option>
                                                                                    <option value="Kiribati">Kiribati
                                                                                    </option>
                                                                                    <option
                                                                                        value="Democratic People's Republic of Korea">
                                                                                        Korea, Democratic People's
                                                                                        Republic
                                                                                        of</option>
                                                                                    <option value="Korea">Korea,
                                                                                        Republic
                                                                                        of</option>
                                                                                    <option value="Kuwait">Kuwait
                                                                                    </option>
                                                                                    <option value="Kyrgyzstan">
                                                                                        Kyrgyzstan
                                                                                    </option>
                                                                                    <option value="Lao">Lao People's
                                                                                        Democratic Republic</option>
                                                                                    <option value="Latvia">Latvia
                                                                                    </option>
                                                                                    <option value="Lebanon">
                                                                                        Lebanon</option>
                                                                                    <option value="Lesotho">Lesotho
                                                                                    </option>
                                                                                    <option value="Liberia">Liberia
                                                                                    </option>
                                                                                    <option
                                                                                        value="Libyan Arab Jamahiriya">
                                                                                        Libyan Arab Jamahiriya</option>
                                                                                    <option value="Liechtenstein">
                                                                                        Liechtenstein</option>
                                                                                    <option value="Lithuania">Lithuania
                                                                                    </option>
                                                                                    <option value="Luxembourg">
                                                                                        Luxembourg
                                                                                    </option>
                                                                                    <option value="Macau">Macau
                                                                                    </option>
                                                                                    <option value="Macedonia">
                                                                                        Macedonia,
                                                                                        The Former Yugoslav Republic of
                                                                                    </option>
                                                                                    <option value="Madagascar">
                                                                                        Madagascar
                                                                                    </option>
                                                                                    <option value="Malawi">Malawi
                                                                                    </option>
                                                                                    <option value="Malaysia">Malaysia
                                                                                    </option>
                                                                                    <option value="Maldives">Maldives
                                                                                    </option>
                                                                                    <option value="Mali">Mali
                                                                                    </option>
                                                                                    <option value="Malta">Malta
                                                                                    </option>
                                                                                    <option value="Marshall Islands">
                                                                                        Marshall Islands</option>
                                                                                    <option value="Martinique">
                                                                                        Martinique
                                                                                    </option>
                                                                                    <option value="Mauritania">
                                                                                        Mauritania
                                                                                    </option>
                                                                                    <option value="Mauritius">Mauritius
                                                                                    </option>
                                                                                    <option value="Mayotte">Mayotte
                                                                                    </option>
                                                                                    <option value="Mexico">Mexico
                                                                                    </option>
                                                                                    <option value="Micronesia">
                                                                                        Micronesia,
                                                                                        Federated States of</option>
                                                                                    <option value="Moldova">Moldova,
                                                                                        Republic of</option>
                                                                                    <option value="Monaco">Monaco
                                                                                    </option>
                                                                                    <option value="Mongolia">Mongolia
                                                                                    </option>
                                                                                    <option value="Montserrat">
                                                                                        Montserrat
                                                                                    </option>
                                                                                    <option value="Morocco">Morocco
                                                                                    </option>
                                                                                    <option value="Mozambique">
                                                                                        Mozambique
                                                                                    </option>
                                                                                    <option value="Myanmar">Myanmar
                                                                                    </option>
                                                                                    <option value="Namibia">Namibia
                                                                                    </option>
                                                                                    <option value="Nauru">Nauru
                                                                                    </option>
                                                                                    <option value="Nepal">Nepal
                                                                                    </option>
                                                                                    <option value="Netherlands">
                                                                                        Netherlands
                                                                                    </option>
                                                                                    <option
                                                                                        value="Netherlands Antilles">
                                                                                        Netherlands Antilles</option>
                                                                                    <option value="New Caledonia">New
                                                                                        Caledonia</option>
                                                                                    <option value="New Zealand">New
                                                                                        Zealand
                                                                                    </option>
                                                                                    <option value="Nicaragua">Nicaragua
                                                                                    </option>
                                                                                    <option value="Niger">Niger
                                                                                    </option>
                                                                                    <option value="Nigeria">Nigeria
                                                                                    </option>
                                                                                    <option value="Niue">Niue
                                                                                    </option>
                                                                                    <option value="Norfolk Island">
                                                                                        Norfolk
                                                                                        Island</option>
                                                                                    <option
                                                                                        value="Northern Mariana Islands">
                                                                                        Northern Mariana Islands
                                                                                    </option>
                                                                                    <option value="Norway">Norway
                                                                                    </option>
                                                                                    <option value="Oman">Oman
                                                                                    </option>
                                                                                    <option value="Pakistan">Pakistan
                                                                                    </option>
                                                                                    <option value="Palau">Palau
                                                                                    </option>
                                                                                    <option value="Panama">Panama
                                                                                    </option>
                                                                                    <option value="Papua New Guinea">
                                                                                        Papua
                                                                                        New Guinea</option>
                                                                                    <option value="Paraguay">Paraguay
                                                                                    </option>
                                                                                    <option value="Peru">Peru
                                                                                    </option>
                                                                                    <option value="Philippines">
                                                                                        Philippines
                                                                                    </option>
                                                                                    <option value="Pitcairn">Pitcairn
                                                                                    </option>
                                                                                    <option value="Poland">Poland
                                                                                    </option>
                                                                                    <option value="Portugal">Portugal
                                                                                    </option>
                                                                                    <option value="Puerto Rico">Puerto
                                                                                        Rico
                                                                                    </option>
                                                                                    <option value="Qatar">Qatar
                                                                                    </option>
                                                                                    <option value="Reunion">Reunion
                                                                                    </option>
                                                                                    <option value="Romania">Romania
                                                                                    </option>
                                                                                    <option value="Russia">Russian
                                                                                        Federation</option>
                                                                                    <option value="Rwanda">Rwanda
                                                                                    </option>
                                                                                    <option
                                                                                        value="Saint Kitts and Nevis">
                                                                                        Saint Kitts and Nevis</option>
                                                                                    <option value="Saint LUCIA">Saint
                                                                                        LUCIA
                                                                                    </option>
                                                                                    <option value="Saint Vincent">Saint
                                                                                        Vincent and the Grenadines
                                                                                    </option>
                                                                                    <option value="Samoa">Samoa
                                                                                    </option>
                                                                                    <option value="San Marino">San
                                                                                        Marino
                                                                                    </option>
                                                                                    <option
                                                                                        value="Sao Tome and Principe">
                                                                                        Sao Tome and Principe</option>
                                                                                    <option value="Saudi Arabia">Saudi
                                                                                        Arabia</option>
                                                                                    <option value="Senegal">Senegal
                                                                                    </option>
                                                                                    <option value="Seychelles">
                                                                                        Seychelles
                                                                                    </option>
                                                                                    <option value="Sierra">Sierra Leone
                                                                                    </option>
                                                                                    <option value="Singapore">Singapore
                                                                                    </option>
                                                                                    <option value="Slovakia">Slovakia
                                                                                        (Slovak Republic)</option>
                                                                                    <option value="Slovenia">Slovenia
                                                                                    </option>
                                                                                    <option value="Solomon Islands">
                                                                                        Solomon
                                                                                        Islands</option>
                                                                                    <option value="Somalia">Somalia
                                                                                    </option>
                                                                                    <option value="South Africa">South
                                                                                        Africa</option>
                                                                                    <option value="South Georgia">South
                                                                                        Georgia and the South Sandwich
                                                                                        Islands</option>
                                                                                    <option value="Span">Spain
                                                                                    </option>
                                                                                    <option value="SriLanka">Sri Lanka
                                                                                    </option>
                                                                                    <option value="St. Helena">St.
                                                                                        Helena
                                                                                    </option>
                                                                                    <option
                                                                                        value="St. Pierre and Miguelon">
                                                                                        St.
                                                                                        Pierre and Miquelon</option>
                                                                                    <option value="Sudan">Sudan
                                                                                    </option>
                                                                                    <option value="Suriname">Suriname
                                                                                    </option>
                                                                                    <option value="Svalbard">Svalbard
                                                                                        and
                                                                                        Jan Mayen Islands</option>
                                                                                    <option value="Swaziland">Swaziland
                                                                                    </option>
                                                                                    <option value="Sweden">Sweden
                                                                                    </option>
                                                                                    <option value="Switzerland">
                                                                                        Switzerland
                                                                                    </option>
                                                                                    <option value="Syria">Syrian Arab
                                                                                        Republic</option>
                                                                                    <option value="Taiwan">Taiwan,
                                                                                        Province
                                                                                        of China</option>
                                                                                    <option value="Tajikistan">
                                                                                        Tajikistan
                                                                                    </option>
                                                                                    <option value="Tanzania">Tanzania,
                                                                                        United Republic of</option>
                                                                                    <option value="Thailand">Thailand
                                                                                    </option>
                                                                                    <option value="Togo">Togo
                                                                                    </option>
                                                                                    <option value="Tokelau">Tokelau
                                                                                    </option>
                                                                                    <option value="Tonga">Tonga
                                                                                    </option>
                                                                                    <option
                                                                                        value="Trinidad and Tobago">
                                                                                        Trinidad and Tobago</option>
                                                                                    <option value="Tunisia">Tunisia
                                                                                    </option>
                                                                                    <option value="Turkey">Turkey
                                                                                    </option>
                                                                                    <option value="Turkmenistan">
                                                                                        Turkmenistan</option>
                                                                                    <option value="Turks and Caicos">
                                                                                        Turks
                                                                                        and Caicos Islands</option>
                                                                                    <option value="Tuvalu">Tuvalu
                                                                                    </option>
                                                                                    <option value="Uganda">Uganda
                                                                                    </option>
                                                                                    <option value="Ukraine">Ukraine
                                                                                    </option>
                                                                                    <option
                                                                                        value="United Arab Emirates">
                                                                                        United Arab Emirates</option>
                                                                                    <option value="United Kingdom">
                                                                                        United
                                                                                        Kingdom</option>
                                                                                    <option value="United States">
                                                                                        United
                                                                                        States</option>
                                                                                    <option
                                                                                        value="United States Minor Outlying Islands">
                                                                                        United States Minor Outlying
                                                                                        Islands
                                                                                    </option>
                                                                                    <option value="Uruguay">Uruguay
                                                                                    </option>
                                                                                    <option value="Uzbekistan">
                                                                                        Uzbekistan
                                                                                    </option>
                                                                                    <option value="Vanuatu">Vanuatu
                                                                                    </option>
                                                                                    <option value="Venezuela">Venezuela
                                                                                    </option>
                                                                                    <option value="Vietnam">Viet Nam
                                                                                    </option>
                                                                                    <option
                                                                                        value="Virgin Islands (British)">
                                                                                        Virgin Islands (British)
                                                                                    </option>
                                                                                    <option
                                                                                        value="Virgin Islands (U.S)">
                                                                                        Virgin Islands (U.S.)</option>
                                                                                    <option
                                                                                        value="Wallis and Futana Islands">
                                                                                        Wallis and Futuna Islands
                                                                                    </option>
                                                                                    <option value="Western Sahara">
                                                                                        Western
                                                                                        Sahara</option>
                                                                                    <option value="Yemen">Yemen
                                                                                    </option>
                                                                                    <option value="Serbia">Serbia
                                                                                    </option>
                                                                                    <option value="Zambia">Zambia
                                                                                    </option>
                                                                                    <option value="Zimbabwe">Zimbabwe
                                                                                    </option>
                                                                                </select>

                                                                    </div>
                                                                </div>
                                                                
                                                                <br>

                                                                <div class="row g-2">
                                                                    <div class="col mb-2">
                                                                         <select name="status" id="" class="form-control">

                                                                                <option value="{{$value->status}}" selected>
                                                                                    @if($value->status == 'true')
                                                                                        Active (Default Selected)
                                                                                    @else
                                                                                    Deactive (Default Selected)
                                                                                    @endif
                                                                                 
                                                                            </option>
                                                                                <option value="true">Active</option>
                                                                                <option value="false">Deactive</option>
                                                                             </select>

                                                                            
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
                                            $count++
                                            @endphp


                                            <div class="modal modal-top fade" id="deleteFunction{{$value->id}}" tabindex="-1"
                                                aria-hidden="true">
                                                <div class="modal-dialog" role="document" style="width: 387px">
                                                    <div class="modal-content">
                                                            <div class="modal-body">
                                                                 <h5 class="text-center" style="margin-top: 16px;">Are You Want to Delete This Record ?</h5>
                                                                 <button type="button" class="btn btn-danger"
                                                                    data-bs-dismiss="modal" style="    margin-left: 106px;">No</button>
                                                                <button type="button" onclick="data_delete({{ $value->id }})"
                                                                    class="btn btn-success" data-bs-dismiss="modal">Yes</button>
                                                            </div>
                                                    </div>
                                                </div>
                                            </div>

                                        @endforeach
                                    </tbody>

                                </table>
                            </div>
                        </div>

                    </div>
                    <!-- / Content -->

                    <!-- Footer -->
                    <script>
                        var timeoutId;
                        document.getElementById('userInput').addEventListener('input', function(event) {
                            clearTimeout(timeoutId);

                            // Delay the AJAX request by 500 milliseconds after the user stops typing
                            timeoutId = setTimeout(function() {
                                var userInput = event.target.value;

                                // Send an AJAX request to retrieve data
                                fetch('/get-awb-users?code=' + userInput)
                                    .then(response => response.json())
                                    .then(data => {
                                        console.log(data);

                                        // Clear existing data
                                        document.getElementById('usersContainer').innerHTML = '';



                                        // Loop through each user and display their information
                                        data.data.forEach(user => {
                                            var userContainer = document.createElement('div');
                                            userContainer.className = 'user-info';

                                            userContainer.innerHTML = `
                                            <div class="col-md mb-md-0 mb-2 p-1">
                                                <div class="custom-option custom-option-icon">
                                                <label class="form-check-label custom-option-content" for="customRadioOwner">
                                                    <span class="custom-option-body">

                                                    <span class="custom-option-title">${user.name} <small>${user.code}</small></span> <input name="outline_squircle" class="form-check-input" type="radio" value="${user.code}" id="customRadioOwner">

                                                    </span>

                                                </label>
                                                </div>
                                            </div>
                                                    `;

                                            var nameId = user.nam;
                                            var codeId = user.code;

                                            document.getElementById('usersContainer').appendChild(
                                                userContainer);

                                        });

                                        document.getElementById('card').style.display = 'block';
                                    })

                            }, 500);
                        });
                    </script>
                    <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            document.getElementById('aws').addEventListener('submit', function(e) {
                                e.preventDefault();

                                var csrfToken = document.head.querySelector('meta[name="csrf-token"]').content;
                                var formData = new FormData(this);


                                fetch("{{ url('create-country') }}", {
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

                                                window.location.href = '{{ url('Country') }}';
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


                                fetch("{{ url('update-country') }}", {
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

                                                window.location.href = '{{ url('Country') }}';
                                            }, 2500);
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
     function data_delete(id){
            $.ajax({
                 url: '{{url('delete-country')}}',
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
            url: '{{ url('country-data-filter') }}',
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

                    var editButton = '<span data-bs-toggle="modal" data-bs-target="#basicModals' + value.id + '"><i class="menu-icon tf-icons ti ti-edit"></i></span>';

                    var deleteButton = '<span data-bs-toggle="modal" data-bs-target="#deleteFunction' + value.id + '"><i class="menu-icon tf-icons ti ti-trash"></i></span>';
 

                    //  after get data put on table   
                    $("table#example").append("<tr id='row" + value.id + "'><td>" + value.id + "</td><td>" + value.country_code + "</td><td>" + value.country_name + "</td><td>" + status + "</td><td>" + editButton + deleteButton +"</td> </tr>");
                });
            }
            }
        });
    }
</script>

                    @include('layouts.footer')
