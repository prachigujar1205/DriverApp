<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Drive With Us</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="http://127.0.0.1:8000/assets/images/favicon.png" />
</head>
<style>
body {
    background-color: #f8f9fa;
    padding: 20px;
}

.card-body {
    padding: 20px;
    border: 1px solid #ccc;
    border-radius: 8px;
    background-color: #fff;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.form-label {
    font-weight: bold;
}

.form-control {
    width: 100%;
    height: 40px;
    padding: 0.375rem 0.75rem;
    font-size: 1rem;
    line-height: 1.5;
    color: #495057;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #ced4da;
    border-radius: 0.25rem;
}

.input-group {
    position: relative;
    display: flex;
    width: 100%;
}

.input-group-text {
    background-color: #f0f0f0;
    border: 1px solid #ced4da;
    border-right: 0;
    border-radius: 0.25rem 0 0 0.25rem;
}

.input-group input[type="text"],
.input-group input[type="number"],
.input-group input[type="email"],
.input-group select {
    border-radius: 0 0.25rem 0.25rem 0;
}

.btn-primary {
    background-color: #007bff;
    border-color: #007bff;
}

.btn-primary:hover {
    background-color: #0069d9;
    border-color: #0062cc;
}

.text-danger {
    color: #dc3545;
}

.icon-sm {
    width: 1.25rem;
    height: 1.25rem;
}
</style>

<body>

    <form class="card-body" action="{{ route('store.driver.enquiry') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('POST')
        @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
        </div>
        @endif
        @if ($errors->has('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ $errors->first('error') }}
        </div>
        @endif
        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label">First Name <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <span class="input-group-text">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-user fea icon-sm icons">
                                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                <circle cx="12" cy="7" r="4"></circle>
                            </svg>
                        </span>
                        <input type="text" class="form-control" placeholder="Enter Your Name" name="first_name"
                            id="first_name">
                    </div>
                </div>
            </div>
            <!--end col-->
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label">Last Name <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <span class="input-group-text">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-user fea icon-sm icons">
                                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                <circle cx="12" cy="7" r="4"></circle>
                            </svg>
                        </span>
                        <input type="text" class="form-control" placeholder="Enter Your Last Name" name="last_name"
                            id="last_name">
                    </div>
                </div>
            </div>
            <!--end col-->
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label">Phone <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <span class="input-group-text">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-phone fea icon-sm icons">
                                <path
                                    d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z">
                                </path>
                            </svg>
                        </span>
                        <input type="number" class="form-control" placeholder="Enter Your Phone Number" name="mobile_no"
                            id="mobile_no">
                    </div>
                </div>
            </div>
            <!--end col-->
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label">Email <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <span class="input-group-text">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-mail fea icon-sm icons">
                                <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z">
                                </path>
                                <polyline points="22,6 12,13 2,6"></polyline>
                            </svg>
                        </span>
                        <input type="email" class="form-control" placeholder="Enter Your Email Address"
                            name="driver_email" id="driver_email">
                    </div>
                </div>
            </div>
            <!--end col-->

            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label">Country <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <span class="input-group-text">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-globe fea icon-sm icons">
                                <circle cx="12" cy="12" r="10"></circle>
                                <line x1="2" y1="12" x2="22" y2="12"></line>
                                <path
                                    d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z">
                                </path>
                            </svg>
                        </span>
                        <select class="form-control dropdown" name="country" id="country">
                            <option value="" selected="selected">Select Country</option>
                            <option value="AF">
                                Afghanistan</option>
                            <option value="AL">Albania
                            </option>
                            <option value="DZ">Algeria
                            </option>
                            <option value="AS">American
                                Samoa</option>
                            <option value="AD">Andorra
                            </option>
                            <option value="AO">Angola
                            </option>
                            <option value="AI">Anguilla
                            </option>
                            <option value="AQ">Antarctica
                            </option>
                            <option value="AG">Antigua
                                and Barbuda</option>
                            <option value="AR">Argentina
                            </option>
                            <option value="AM">Armenia
                            </option>
                            <option value="AW">Aruba
                            </option>
                            <option value="AU">Australia
                            </option>
                            <option value="AT">Austria
                            </option>
                            <option value="AZ">Azerbaijan
                            </option>
                            <option value="BS">Bahamas
                            </option>
                            <option value="BH">Bahrain
                            </option>
                            <option value="BD">Bangladesh
                            </option>
                            <option value="BB">Barbados
                            </option>
                            <option value="BY">Belarus
                            </option>
                            <option value="BE">Belgium
                            </option>
                            <option value="BZ">Belize
                            </option>
                            <option value="BJ">Benin
                            </option>
                            <option value="BM">Bermuda
                            </option>
                            <option value="BT">Bhutan
                            </option>
                            <option value="BO">Bolivia
                            </option>
                            <option value="BA">Bosnia and
                                Herzegovina</option>
                            <option value="BW">Botswana
                            </option>
                            <option value="BV">Bouvet
                                Island</option>
                            <option value="BR">Brazil
                            </option>
                            <option value="BQ">British
                                Antarctic Territory</option>
                            <option value="IO">British
                                Indian Ocean Territory</option>
                            <option value="VG">British
                                Virgin Islands</option>
                            <option value="BN">Brunei
                            </option>
                            <option value="BG">Bulgaria
                            </option>
                            <option value="BF">Burkina
                                Faso</option>
                            <option value="BI">Burundi
                            </option>
                            <option value="KH">Cambodia
                            </option>
                            <option value="CM">Cameroon
                            </option>
                            <option value="CA">Canada
                            </option>
                            <option value="CT">Canton and
                                Enderbury Islands</option>
                            <option value="CV">Cape Verde
                            </option>
                            <option value="KY">Cayman
                                Islands</option>
                            <option value="CF">Central
                                African Republic</option>
                            <option value="TD">Chad
                            </option>
                            <option value="CL">Chile
                            </option>
                            <option value="CN">China
                            </option>
                            <option value="CX">Christmas
                                Island</option>
                            <option value="CC">Cocos
                                [Keeling] Islands</option>
                            <option value="CO">Colombia
                            </option>
                            <option value="KM">Comoros
                            </option>
                            <option value="CG">Congo -
                                Brazzaville</option>
                            <option value="CD">Congo -
                                Kinshasa</option>
                            <option value="CK">Cook
                                Islands</option>
                            <option value="CR">Costa Rica
                            </option>
                            <option value="HR">Croatia
                            </option>
                            <option value="CU">Cuba
                            </option>
                            <option value="CY">Cyprus
                            </option>
                            <option value="CZ">Czech
                                Republic</option>
                            <option value="CI">Côte
                                d’Ivoire</option>
                            <option value="DK">Denmark
                            </option>
                            <option value="DJ">Djibouti
                            </option>
                            <option value="DM">Dominica
                            </option>
                            <option value="DO">Dominican
                                Republic</option>
                            <option value="NQ">Dronning
                                Maud Land</option>
                            <option value="DD">East
                                Germany</option>
                            <option value="EC">Ecuador
                            </option>
                            <option value="EG">Egypt
                            </option>
                            <option value="SV">El
                                Salvador</option>
                            <option value="GQ">Equatorial
                                Guinea</option>
                            <option value="ER">Eritrea
                            </option>
                            <option value="EE">Estonia
                            </option>
                            <option value="ET">Ethiopia
                            </option>
                            <option value="FK">Falkland
                                Islands</option>
                            <option value="FO">Faroe
                                Islands</option>
                            <option value="FJ">Fiji
                            </option>
                            <option value="FI">Finland
                            </option>
                            <option value="FR">France
                            </option>
                            <option value="GF">French
                                Guiana</option>
                            <option value="PF">French
                                Polynesia</option>
                            <option value="TF">French
                                Southern Territories</option>
                            <option value="FQ">French
                                Southern and Antarctic Territories</option>
                            <option value="GA">Gabon
                            </option>
                            <option value="GM">Gambia
                            </option>
                            <option value="GE">Georgia
                            </option>
                            <option value="DE">Germany
                            </option>
                            <option value="GH">Ghana
                            </option>
                            <option value="GI">Gibraltar
                            </option>
                            <option value="GR">Greece
                            </option>
                            <option value="GL">Greenland
                            </option>
                            <option value="GD">Grenada
                            </option>
                            <option value="GP">Guadeloupe
                            </option>
                            <option value="GU">Guam
                            </option>
                            <option value="GT">Guatemala
                            </option>
                            <option value="GG">Guernsey
                            </option>
                            <option value="GN">Guinea
                            </option>
                            <option value="GW">
                                Guinea-Bissau</option>
                            <option value="GY">Guyana
                            </option>
                            <option value="HT">Haiti
                            </option>
                            <option value="HM">Heard
                                Island and McDonald Islands</option>
                            <option value="HN">Honduras
                            </option>
                            <option value="HK">Hong Kong
                                SAR China</option>
                            <option value="HU">Hungary
                            </option>
                            <option value="IS">Iceland
                            </option>
                            <option value="IN">India
                            </option>
                            <option value="ID">Indonesia
                            </option>
                            <option value="IR">Iran
                            </option>
                            <option value="IQ">Iraq
                            </option>
                            <option value="IE">Ireland
                            </option>
                            <option value="IM">Isle of
                                Man</option>
                            <option value="IL">Israel
                            </option>
                            <option value="IT">Italy
                            </option>
                            <option value="JM">Jamaica
                            </option>
                            <option value="JP">Japan
                            </option>
                            <option value="JE">Jersey
                            </option>
                            <option value="JT">Johnston
                                Island</option>
                            <option value="JO">Jordan
                            </option>
                            <option value="KZ">Kazakhstan
                            </option>
                            <option value="KE">Kenya
                            </option>
                            <option value="KI">Kiribati
                            </option>
                            <option value="KW">Kuwait
                            </option>
                            <option value="KG">Kyrgyzstan
                            </option>
                            <option value="LA">Laos
                            </option>
                            <option value="LV">Latvia
                            </option>
                            <option value="LB">Lebanon
                            </option>
                            <option value="LS">Lesotho
                            </option>
                            <option value="LR">Liberia
                            </option>
                            <option value="LY">Libya
                            </option>
                            <option value="LI">
                                Liechtenstein</option>
                            <option value="LT">Lithuania
                            </option>
                            <option value="LU">Luxembourg
                            </option>
                            <option value="MO">Macau SAR
                                China</option>
                            <option value="MK">Macedonia
                            </option>
                            <option value="MG">Madagascar
                            </option>
                            <option value="MW">Malawi
                            </option>
                            <option value="MY">Malaysia
                            </option>
                            <option value="MV">Maldives
                            </option>
                            <option value="ML">Mali
                            </option>
                            <option value="MT">Malta
                            </option>
                            <option value="MH">Marshall
                                Islands</option>
                            <option value="MQ">Martinique
                            </option>
                            <option value="MR">Mauritania
                            </option>
                            <option value="MU">Mauritius
                            </option>
                            <option value="YT">Mayotte
                            </option>
                            <option value="FX">
                                Metropolitan France</option>
                            <option value="MX">Mexico
                            </option>
                            <option value="FM">Micronesia
                            </option>
                            <option value="MI">Midway
                                Islands</option>
                            <option value="MD">Moldova
                            </option>
                            <option value="MC">Monaco
                            </option>
                            <option value="MN">Mongolia
                            </option>
                            <option value="ME">Montenegro
                            </option>
                            <option value="MS">Montserrat
                            </option>
                            <option value="MA">Morocco
                            </option>
                            <option value="MZ">Mozambique
                            </option>
                            <option value="MM">Myanmar
                                [Burma]</option>
                            <option value="NA">Namibia
                            </option>
                            <option value="NR">Nauru
                            </option>
                            <option value="NP">Nepal
                            </option>
                            <option value="NL">
                                Netherlands</option>
                            <option value="AN">
                                Netherlands Antilles</option>
                            <option value="NT">Neutral
                                Zone</option>
                            <option value="NC">New
                                Caledonia</option>
                            <option value="NZ">New
                                Zealand</option>
                            <option value="NI">Nicaragua
                            </option>
                            <option value="NE">Niger
                            </option>
                            <option value="NG">Nigeria
                            </option>
                            <option value="NU">Niue
                            </option>
                            <option value="NF">Norfolk
                                Island</option>
                            <option value="KP">North
                                Korea</option>
                            <option value="VD">North
                                Vietnam</option>
                            <option value="MP">Northern
                                Mariana Islands</option>
                            <option value="NO">Norway
                            </option>
                            <option value="OM">Oman
                            </option>
                            <option value="PC">Pacific
                                Islands Trust Territory</option>
                            <option value="PK">Pakistan
                            </option>
                            <option value="PW">Palau
                            </option>
                            <option value="PS">
                                Palestinian Territories</option>
                            <option value="PA">Panama
                            </option>
                            <option value="PZ">Panama
                                Canal Zone</option>
                            <option value="PG">Papua New
                                Guinea</option>
                            <option value="PY">Paraguay
                            </option>
                            <option value="YD">
                                People&#039;s Democratic Republic of Yemen</option>
                            <option value="PE">Peru
                            </option>
                            <option value="PH">
                                Philippines</option>
                            <option value="PN">Pitcairn
                                Islands</option>
                            <option value="PL">Poland
                            </option>
                            <option value="PT">Portugal
                            </option>
                            <option value="PR">Puerto
                                Rico</option>
                            <option value="QA">Qatar
                            </option>
                            <option value="RO">Romania
                            </option>
                            <option value="RU">Russia
                            </option>
                            <option value="RW">Rwanda
                            </option>
                            <option value="RE">Réunion
                            </option>
                            <option value="BL">Saint
                                Barthélemy</option>
                            <option value="SH">Saint
                                Helena</option>
                            <option value="KN">Saint
                                Kitts and Nevis</option>
                            <option value="LC">Saint
                                Lucia</option>
                            <option value="MF">Saint
                                Martin</option>
                            <option value="PM">Saint
                                Pierre and Miquelon</option>
                            <option value="VC">Saint
                                Vincent and the Grenadines</option>
                            <option value="WS">Samoa
                            </option>
                            <option value="SM">San Marino
                            </option>
                            <option value="SA">Saudi
                                Arabia</option>
                            <option value="SN">Senegal
                            </option>
                            <option value="RS">Serbia
                            </option>
                            <option value="CS">Serbia and
                                Montenegro</option>
                            <option value="SC">Seychelles
                            </option>
                            <option value="SL">Sierra
                                Leone</option>
                            <option value="SG">Singapore
                            </option>
                            <option value="SK">Slovakia
                            </option>
                            <option value="SI">Slovenia
                            </option>
                            <option value="SB">Solomon
                                Islands</option>
                            <option value="SO">Somalia
                            </option>
                            <option value="ZA">South
                                Africa</option>
                            <option value="GS">South
                                Georgia and the South Sandwich Islands</option>
                            <option value="KR">South
                                Korea</option>
                            <option value="ES">Spain
                            </option>
                            <option value="LK">Sri Lanka
                            </option>
                            <option value="SD">Sudan
                            </option>
                            <option value="SR">Suriname
                            </option>
                            <option value="SJ">Svalbard
                                and Jan Mayen</option>
                            <option value="SZ">Swaziland
                            </option>
                            <option value="SE">Sweden
                            </option>
                            <option value="CH">
                                Switzerland</option>
                            <option value="SY">Syria
                            </option>
                            <option value="ST">São Tomé
                                and Príncipe</option>
                            <option value="TW">Taiwan
                            </option>
                            <option value="TJ">Tajikistan
                            </option>
                            <option value="TZ">Tanzania
                            </option>
                            <option value="TH">Thailand
                            </option>
                            <option value="TL">
                                Timor-Leste</option>
                            <option value="TG">Togo
                            </option>
                            <option value="TK">Tokelau
                            </option>
                            <option value="TO">Tonga
                            </option>
                            <option value="TT">Trinidad
                                and Tobago</option>
                            <option value="TN">Tunisia
                            </option>
                            <option value="TR">Turkey
                            </option>
                            <option value="TM">
                                Turkmenistan</option>
                            <option value="TC">Turks and
                                Caicos Islands</option>
                            <option value="TV">Tuvalu
                            </option>
                            <option value="UM">U.S. Minor
                                Outlying Islands</option>
                            <option value="PU">U.S.
                                Miscellaneous Pacific Islands</option>
                            <option value="VI">U.S.
                                Virgin Islands</option>
                            <option value="UG">Uganda
                            </option>
                            <option value="UA">Ukraine
                            </option>
                            <option value="SU">Union of
                                Soviet Socialist Republics</option>
                            <option value="AE">United
                                Arab Emirates</option>
                            <option value="GB">United
                                Kingdom</option>
                            <option value="US">United
                                States</option>
                            <option value="ZZ">Unknown or
                                Invalid Region</option>
                            <option value="UY">Uruguay
                            </option>
                            <option value="UZ">Uzbekistan
                            </option>
                            <option value="VU">Vanuatu
                            </option>
                            <option value="VA">Vatican
                                City</option>
                            <option value="VE">Venezuela
                            </option>
                            <option value="VN">Vietnam
                            </option>
                            <option value="WK">Wake
                                Island</option>
                            <option value="WF">Wallis and
                                Futuna</option>
                            <option value="EH">Western
                                Sahara</option>
                            <option value="YE">Yemen
                            </option>
                            <option value="ZM">Zambia
                            </option>
                            <option value="ZW">Zimbabwe
                            </option>
                            <option value="AX">Åland
                                Islands</option>
                            <!-- Add options for countries dynamically if needed -->
                        </select>
                    </div>
                </div>
            </div>
            <!--end col-->



            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label">Gear type <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <span class="input-group-text">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-settings fea icon-sm icons">
                                <circle cx="12" cy="12" r="3"></circle>
                                <path
                                    d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 1 1-2.83 2.83l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V20a2 2 0 1 1-4 0v-.09a1.65 1.65 0 0 0-1-1.51 1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 1 1-2.83-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H4a2 2 0 1 1 0-4h.09a1.65 1.65 0 0 0 1.51-1 1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 1 1 2.83-2.83l.06.06a1.65 1.65 0 0 0 1.82.33h.18a1.65 1.65 0 0 0 1-1.51V4a2 2 0 1 1 4 0v.09a1.65 1.65 0 0 0 1 1.51h.18a1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 1 1 2.83 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82v.18a1.65 1.65 0 0 0 1.51 1H20a2 2 0 1 1 0 4h-.09a1.65 1.65 0 0 0-1.51 1z">
                                </path>
                            </svg>
                        </span>
                        <select class="form-control" id="gear_type" name="gear_type">
                            <option value="" selected>Select Gear</option>
                            <option value="Manual">Manual</option>
                            <option value="Automatic">Automatic</option>
                            <option value="Both">Both</option>
                        </select>
                    </div>
                </div>
            </div>
            <!--end col-->


            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label">Car Class <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <span class="input-group-text">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-truck fea icon-sm icons">
                                <rect x="1" y="3" width="15" height="13"></rect>
                                <polygon points="16 8 20 8 23 11 23 16 16 16 16 8"></polygon>
                                <circle cx="5.5" cy="18.5" r="2.5"></circle>
                                <circle cx="18.5" cy="18.5" r="2.5"></circle>
                            </svg>
                        </span>
                        <select class="form-control" id="car_name" name="car_name">
                            <option value="" selected>Select Car Class</option>
                            @foreach($carclasses as $carclass)
                            <option value="{{$carclass->carclass_name}}">{{$carclass->carclass_name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <!--end col-->

            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label">Profile Image <span class="text-danger">*</span></label>
                    <input type="file" name="profile_image" class="form-control" id="profile_image">
                </div>
            </div>
            <!--end col-->

            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label">Driving licence front <span class="text-danger">*</span></label>
                    <input type="file" name="driving_licence" class="form-control" id="driving_licence">
                </div>
            </div>
            <!--end col-->

            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label">Pan Card <span class="text-danger">*</span></label>
                    <input type="file" name="pan_card" class="form-control" id="pan_card">
                </div>
            </div>
            <!--end col-->

            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label">Aadhar Card<span class="text-danger">*</span></label>
                    <input type="file" name="aadhar_card" class="form-control" id="aadhar_card">
                </div>
            </div>
            <!--end col-->

            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label">Police Certification Report<span class="text-danger">*</span></label>
                    <input type="file" name="police_verification" class="form-control" id="police_verification">
                </div>
            </div>
            <!--end col-->

            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label">Current Electricity Bill<span class="text-danger">*</span></label>
                    <input type="file" name="electricity_bill" class="form-control" id="electricity_bill">
                </div>
            </div>
            <!--end col-->

            <div class="col-md-12" id="error_message"></div>

            <div class="col-md-12">
                <button type="submit" id="send_driver_inquiry" class="btn btn-primary">Submit</button>
            </div>
            <!--end col-->
        </div>
        <!--end row-->
    </form>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>