@extends('admin.layouts.app')

@section('content')
<div class="container-fluid page-body-wrapper">
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Add Driver Information</h4>

                            <form class="forms-sample" action="{{ route('store.driver') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('POST')

                                <div class="form-group">
                                    <label for="exampleInputUsername1">First Name</label>
                                    <input type="text" class="form-control" id="exampleInputUsername1" name="first_name"
                                        placeholder="Enter Your Driver First Name" value="{{ old('first_name') }}">
                                    @if ($errors->has('first_name'))
                                    <div class="text-danger">{{ $errors->first('first_name') }}</div>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputUsername1">Last Name</label>
                                    <input type="text" class="form-control" id="exampleInputUsername1" name="last_name"
                                        placeholder="Enter Your Driver Last Name" value="{{ old('last_name') }}">
                                    @if ($errors->has('last_name'))
                                    <div class="text-danger">{{ $errors->first('last_name') }}</div>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email Address</label>
                                    <input type="email" class="form-control" id="exampleInputEmail1" name="driver_email"
                                        placeholder="Enter Your Driver Email" value="{{ old('driver_email') }}">
                                    @if ($errors->has('driver_email'))
                                    <div class="text-danger">{{ $errors->first('driver_email') }}</div>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Mobile Number</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" name="mobile_no"
                                        placeholder="Enter Your Mobile No" value="{{ old('mobile_no') }}">
                                    @if ($errors->has('mobile_no'))
                                    <div class="text-danger">{{ $errors->first('mobile_no') }}</div>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Alternate Mobile Number</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1"
                                        name="alternate_mobile_no" placeholder="Enter Alternative Mobile Number"
                                        value="{{ old('alternate_mobile_no') }}">
                                    @if ($errors->has('alternate_mobile_no'))
                                    <div class="text-danger">{{ $errors->first('alternate_mobile_no') }}</div>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Address</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" name="address"
                                        placeholder="Enter Your Address" value="{{ old('address') }}">
                                    @if ($errors->has('address'))
                                    <div class="text-danger">{{ $errors->first('address') }}</div>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="country">Country</label>
                                    <select class="form-control dropdown" name="country" id="country">
                                        <option value="" selected="selected">-- Select Country --</option>
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

                                <div class="form-group">
                                    <label for="exampleInputEmail1">State</label>
                                    <!-- <input type="text" class="form-control" id="exampleInputEmail1" name="state"
                                        placeholder="Enter Your State" value="{{ old('state') }}"> -->
                                    <select class="form-control" name="state" id="inputState">
                                        <option value="SelectState">Select State</option>
                                        <option value="Andra Pradesh">Andra Pradesh</option>
                                        <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                                        <option value="Assam">Assam</option>
                                        <option value="Bihar">Bihar</option>
                                        <option value="Chhattisgarh">Chhattisgarh</option>
                                        <option value="Goa">Goa</option>
                                        <option value="Gujarat">Gujarat</option>
                                        <option value="Haryana">Haryana</option>
                                        <option value="Himachal Pradesh">Himachal Pradesh</option>
                                        <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                                        <option value="Jharkhand">Jharkhand</option>
                                        <option value="Karnataka">Karnataka</option>
                                        <option value="Kerala">Kerala</option>
                                        <option value="Madya Pradesh">Madya Pradesh</option>
                                        <option value="Maharashtra">Maharashtra</option>
                                        <option value="Manipur">Manipur</option>
                                        <option value="Meghalaya">Meghalaya</option>
                                        <option value="Mizoram">Mizoram</option>
                                        <option value="Nagaland">Nagaland</option>
                                        <option value="Orissa">Orissa</option>
                                        <option value="Punjab">Punjab</option>
                                        <option value="Rajasthan">Rajasthan</option>
                                        <option value="Sikkim">Sikkim</option>
                                        <option value="Tamil Nadu">Tamil Nadu</option>
                                        <option value="Telangana">Telangana</option>
                                        <option value="Tripura">Tripura</option>
                                        <option value="Uttaranchal">Uttaranchal</option>
                                        <option value="Uttar Pradesh">Uttar Pradesh</option>
                                        <option value="West Bengal">West Bengal</option>
                                        <option disabled style="background-color:#aaa; color:#fff">UNION Territories
                                        </option>
                                        <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
                                        <option value="Chandigarh">Chandigarh</option>
                                        <option value="Dadar and Nagar Haveli">Dadar and Nagar Haveli</option>
                                        <option value="Daman and Diu">Daman and Diu</option>
                                        <option value="Delhi">Delhi</option>
                                        <option value="Lakshadeep">Lakshadeep</option>
                                        <option value="Pondicherry">Pondicherry</option>
                                    </select>
                                    @if ($errors->has('state'))
                                    <div class="text-danger">{{ $errors->first('state') }}</div>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">City</label>
                                    <!-- <input type="text" class="form-control" id="exampleInputEmail1" name="city"
                                        placeholder="Enter Your City" value="{{ old('city') }}"> -->
                                    <select class="form-control" id="inputDistrict" name="city">
                                        <option value="">-- Select City -- </option>
                                    </select>
                                    @if ($errors->has('city'))
                                    <div class="text-danger">{{ $errors->first('city') }}</div>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">PinCode</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" name="pincode"
                                        placeholder="Enter Your Pin Code" value="{{ old('pincode') }}">
                                    @if ($errors->has('pincode'))
                                    <div class="text-danger">{{ $errors->first('pincode') }}</div>
                                    @endif
                                </div>

                                
                                <div class="form-group">
                                    <label for="gear_type">Select Gear</label>
                                    <select class="form-control dropdown" name="gear_type" id="gear_type">
                                        <option value="" selected="selected">-- Select Gear --</option>
                                        <option value="manual"> Manual</option>
                                        <option value="Automatic">Automatic </option>
                                        <option value="Both">Both</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="car_name">Car Name</label>
                                    <select class="form-control dropdown" name="car_name" id="car_name">
                                        <option value="" selected="selected">-- Select Car Name --</option>
                                        @foreach($carclasses as $carclass)
                                        <option value="{{$carclass->carclass_name}}"> {{$carclass->carclass_name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Profile Image</label>
                                    <input type="file" class="form-control" id="exampleInputEmail1"
                                        name="profile_image">
                                    @if ($errors->has('profile_image'))
                                    <div class="text-danger">{{ $errors->first('profile_image') }}</div>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Password</label>
                                    <input type="password" class="form-control" id="exampleInputPassword1"
                                        name="password" placeholder="Password">
                                    @if ($errors->has('password'))
                                    <div class="text-danger">{{ $errors->first('password') }}</div>
                                    @endif
                                </div>

                                <div class="form-check form-check-flat form-check-primary">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input">
                                        Remember me
                                    </label>
                                </div>
                                <button type="submit" class="btn btn-primary me-2">Submit</button>
                                <button class="btn btn-light">Cancel</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
    integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"
    integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous">
</script>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
    integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"
    integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous">
</script>

<script>
var AndraPradesh = ["Anantapur", "Chittoor", "East Godavari", "Guntur", "Kadapa", "Krishna", "Kurnool", "Prakasam",
    "Nellore", "Srikakulam", "Visakhapatnam", "Vizianagaram", "West Godavari"
];
var ArunachalPradesh = ["Anjaw", "Changlang", "Dibang Valley", "East Kameng", "East Siang", "Kra Daadi", "Kurung Kumey",
    "Lohit", "Longding", "Lower Dibang Valley", "Lower Subansiri", "Namsai", "Papum Pare", "Siang", "Tawang",
    "Tirap", "Upper Siang", "Upper Subansiri", "West Kameng", "West Siang", "Itanagar"
];
var Assam = ["Baksa", "Barpeta", "Biswanath", "Bongaigaon", "Cachar", "Charaideo", "Chirang", "Darrang", "Dhemaji",
    "Dhubri", "Dibrugarh", "Goalpara", "Golaghat", "Hailakandi", "Hojai", "Jorhat", "Kamrup Metropolitan",
    "Kamrup (Rural)", "Karbi Anglong", "Karimganj", "Kokrajhar", "Lakhimpur", "Majuli", "Morigaon", "Nagaon",
    "Nalbari", "Dima Hasao", "Sivasagar", "Sonitpur", "South Salmara Mankachar", "Tinsukia", "Udalguri",
    "West Karbi Anglong"
];
var Bihar = ["Araria", "Arwal", "Aurangabad", "Banka", "Begusarai", "Bhagalpur", "Bhojpur", "Buxar", "Darbhanga",
    "East Champaran", "Gaya", "Gopalganj", "Jamui", "Jehanabad", "Kaimur", "Katihar", "Khagaria", "Kishanganj",
    "Lakhisarai", "Madhepura", "Madhubani", "Munger", "Muzaffarpur", "Nalanda", "Nawada", "Patna", "Purnia",
    "Rohtas", "Saharsa", "Samastipur", "Saran", "Sheikhpura", "Sheohar", "Sitamarhi", "Siwan", "Supaul", "Vaishali",
    "West Champaran"
];
var Chhattisgarh = ["Balod", "Baloda Bazar", "Balrampur", "Bastar", "Bemetara", "Bijapur", "Bilaspur", "Dantewada",
    "Dhamtari", "Durg", "Gariaband", "Janjgir Champa", "Jashpur", "Kabirdham", "Kanker", "Kondagaon", "Korba",
    "Koriya", "Mahasamund", "Mungeli", "Narayanpur", "Raigarh", "Raipur", "Rajnandgaon", "Sukma", "Surajpur",
    "Surguja"
];
var Goa = ["North Goa", "South Goa"];
var Gujarat = ["Ahmedabad", "Amreli", "Anand", "Aravalli", "Banaskantha", "Bharuch", "Bhavnagar", "Botad",
    "Chhota Udaipur", "Dahod", "Dang", "Devbhoomi Dwarka", "Gandhinagar", "Gir Somnath", "Jamnagar", "Junagadh",
    "Kheda", "Kutch", "Mahisagar", "Mehsana", "Morbi", "Narmada", "Navsari", "Panchmahal", "Patan", "Porbandar",
    "Rajkot", "Sabarkantha", "Surat", "Surendranagar", "Tapi", "Vadodara", "Valsad"
];
var Haryana = ["Ambala", "Bhiwani", "Charkhi Dadri", "Faridabad", "Fatehabad", "Gurugram", "Hisar", "Jhajjar", "Jind",
    "Kaithal", "Karnal", "Kurukshetra", "Mahendragarh", "Mewat", "Palwal", "Panchkula", "Panipat", "Rewari",
    "Rohtak", "Sirsa", "Sonipat", "Yamunanagar"
];
var HimachalPradesh = ["Bilaspur", "Chamba", "Hamirpur", "Kangra", "Kinnaur", "Kullu", "Lahaul Spiti", "Mandi",
    "Shimla", "Sirmaur", "Solan", "Una"
];
var JammuKashmir = ["Anantnag", "Bandipora", "Baramulla", "Budgam", "Doda", "Ganderbal", "Jammu", "Kargil", "Kathua",
    "Kishtwar", "Kulgam", "Kupwara", "Leh", "Poonch", "Pulwama", "Rajouri", "Ramban", "Reasi", "Samba", "Shopian",
    "Srinagar", "Udhampur"
];
var Jharkhand = ["Bokaro", "Chatra", "Deoghar", "Dhanbad", "Dumka", "East Singhbhum", "Garhwa", "Giridih", "Godda",
    "Gumla", "Hazaribagh", "Jamtara", "Khunti", "Koderma", "Latehar", "Lohardaga", "Pakur", "Palamu", "Ramgarh",
    "Ranchi", "Sahebganj", "Seraikela Kharsawan", "Simdega", "West Singhbhum"
];
var Karnataka = ["Bagalkot", "Bangalore Rural", "Bangalore Urban", "Belgaum", "Bellary", "Bidar", "Vijayapura",
    "Chamarajanagar", "Chikkaballapur", "Chikkamagaluru", "Chitradurga", "Dakshina Kannada", "Davanagere",
    "Dharwad", "Gadag", "Gulbarga", "Hassan", "Haveri", "Kodagu", "Kolar", "Koppal", "Mandya", "Mysore", "Raichur",
    "Ramanagara", "Shimoga", "Tumkur", "Udupi", "Uttara Kannada", "Yadgir"
];
var Kerala = ["Alappuzha", "Ernakulam", "Idukki", "Kannur", "Kasaragod", "Kollam", "Kottayam", "Kozhikode",
    "Malappuram", "Palakkad", "Pathanamthitta", "Thiruvananthapuram", "Thrissur", "Wayanad"
];
var MadhyaPradesh = ["Agar Malwa", "Alirajpur", "Anuppur", "Ashoknagar", "Balaghat", "Barwani", "Betul", "Bhind",
    "Bhopal", "Burhanpur", "Chhatarpur", "Chhindwara", "Damoh", "Datia", "Dewas", "Dhar", "Dindori", "Guna",
    "Gwalior", "Harda", "Hoshangabad", "Indore", "Jabalpur", "Jhabua", "Katni", "Khandwa", "Khargone", "Mandla",
    "Mandsaur", "Morena", "Narsinghpur", "Neemuch", "Panna", "Raisen", "Rajgarh", "Ratlam", "Rewa", "Sagar",
    "Satna",
    "Sehore", "Seoni", "Shahdol", "Shajapur", "Sheopur", "Shivpuri", "Sidhi", "Singrauli", "Tikamgarh", "Ujjain",
    "Umaria", "Vidisha"
];
var Maharashtra = ["Ahmednagar", "Akola", "Amravati", "Aurangabad", "Beed", "Bhandara", "Buldhana", "Chandrapur",
    "Dhule", "Gadchiroli", "Gondia", "Hingoli", "Jalgaon", "Jalna", "Kolhapur", "Latur", "Mumbai City",
    "Mumbai Suburban", "Nagpur", "Nanded", "Nandurbar", "Nashik", "Osmanabad", "Palghar", "Parbhani", "Pune",
    "Raigad", "Ratnagiri", "Sangli", "Satara", "Sindhudurg", "Solapur", "Thane", "Wardha", "Washim", "Yavatmal"
];
var Manipur = ["Bishnupur", "Chandel", "Churachandpur", "Imphal East", "Imphal West", "Jiribam", "Kakching", "Kamjong",
    "Kangpokpi", "Noney", "Pherzawl", "Senapati", "Tamenglong", "Tengnoupal", "Thoubal", "Ukhrul"
];
var Meghalaya = ["East Garo Hills", "East Jaintia Hills", "East Khasi Hills", "North Garo Hills", "Ri Bhoi",
    "South Garo Hills", "South West Garo Hills", "South West Khasi Hills", "West Garo Hills", "West Jaintia Hills",
    "West Khasi Hills"
];
var Mizoram = ["Aizawl", "Champhai", "Kolasib", "Lawngtlai", "Lunglei", "Mamit", "Saiha", "Serchhip", "Aizawl",
    "Champhai", "Kolasib", "Lawngtlai", "Lunglei", "Mamit", "Saiha", "Serchhip"
];
var Nagaland = ["Dimapur", "Kiphire", "Kohima", "Longleng", "Mokokchung", "Mon", "Peren", "Phek", "Tuensang", "Wokha",
    "Zunheboto"
];
var Odisha = ["Angul", "Balangir", "Balasore", "Bargarh", "Bhadrak", "Boudh", "Cuttack", "Debagarh", "Dhenkanal",
    "Gajapati", "Ganjam", "Jagatsinghpur", "Jajpur", "Jharsuguda", "Kalahandi", "Kandhamal", "Kendrapara",
    "Kendujhar", "Khordha", "Koraput", "Malkangiri", "Mayurbhanj", "Nabarangpur", "Nayagarh", "Nuapada", "Puri",
    "Rayagada", "Sambalpur", "Subarnapur", "Sundergarh"
];
var Punjab = ["Amritsar", "Barnala", "Bathinda", "Faridkot", "Fatehgarh Sahib", "Fazilka", "Firozpur", "Gurdaspur",
    "Hoshiarpur", "Jalandhar", "Kapurthala", "Ludhiana", "Mansa", "Moga", "Mohali", "Muktsar", "Pathankot",
    "Patiala", "Rupnagar", "Sangrur", "Shaheed Bhagat Singh Nagar", "Tarn Taran"
];
var Rajasthan = ["Ajmer", "Alwar", "Banswara", "Baran", "Barmer", "Bharatpur", "Bhilwara", "Bikaner", "Bundi",
    "Chittorgarh", "Churu", "Dausa", "Dholpur", "Dungarpur", "Ganganagar", "Hanumangarh", "Jaipur", "Jaisalmer",
    "Jalore", "Jhalawar", "Jhunjhunu", "Jodhpur", "Karauli", "Kota", "Nagaur", "Pali", "Pratapgarh", "Rajsamand",
    "Sawai Madhopur", "Sikar", "Sirohi", "Tonk", "Udaipur"
];
var Sikkim = ["East Sikkim", "North Sikkim", "South Sikkim", "West Sikkim"];
var TamilNadu = ["Ariyalur", "Chennai", "Coimbatore", "Cuddalore", "Dharmapuri", "Dindigul", "Erode", "Kanchipuram",
    "Kanyakumari", "Karur", "Krishnagiri", "Madurai", "Nagapattinam", "Namakkal", "Nilgiris", "Perambalur",
    "Pudukkottai", "Ramanathapuram", "Salem", "Sivaganga", "Thanjavur", "Theni", "Thoothukudi", "Tiruchirappalli",
    "Tirunelveli", "Tiruppur", "Tiruvallur", "Tiruvannamalai", "Tiruvarur", "Vellore", "Viluppuram", "Virudhunagar"
];
var Telangana = ["Adilabad", "Bhadradri Kothagudem", "Hyderabad", "Jagtial", "Jangaon", "Jayashankar", "Jogulamba",
    "Kamareddy", "Karimnagar", "Khammam", "Komaram Bheem", "Mahabubabad", "Mahbubnagar", "Mancherial", "Medak",
    "Medchal", "Nagarkurnool", "Nalgonda", "Nirmal", "Nizamabad", "Peddapalli", "Rajanna Sircilla", "Ranga Reddy",
    "Sangareddy", "Siddipet", "Suryapet", "Vikarabad", "Wanaparthy", "Warangal Rural", "Warangal Urban",
    "Yadadri Bhuvanagiri"
];
var Tripura = ["Dhalai", "Gomati", "Khowai", "North Tripura", "Sepahijala", "South Tripura", "Unakoti", "West Tripura"];
var UttarPradesh = ["Agra", "Aligarh", "Allahabad", "Ambedkar Nagar", "Amethi", "Amroha", "Auraiya", "Azamgarh",
    "Baghpat", "Bahraich", "Ballia", "Balrampur", "Banda", "Barabanki", "Bareilly", "Basti", "Bhadohi", "Bijnor",
    "Budaun", "Bulandshahr", "Chandauli", "Chitrakoot", "Deoria", "Etah", "Etawah", "Faizabad", "Farrukhabad",
    "Fatehpur", "Firozabad", "Gautam Buddha Nagar", "Ghaziabad", "Ghazipur", "Gonda", "Gorakhpur", "Hamirpur",
    "Hapur", "Hardoi", "Hathras", "Jalaun", "Jaunpur", "Jhansi", "Kannauj", "Kanpur Dehat", "Kanpur Nagar",
    "Kasganj", "Kaushambi", "Kheri", "Kushinagar", "Lalitpur", "Lucknow", "Maharajganj", "Mahoba", "Mainpuri",
    "Mathura", "Mau", "Meerut", "Mirzapur", "Moradabad", "Muzaffarnagar", "Pilibhit", "Pratapgarh", "Raebareli",
    "Rampur", "Saharanpur", "Sambhal", "Sant Kabir Nagar", "Shahjahanpur", "Shamli", "Shravasti", "Siddharthnagar",
    "Sitapur", "Sonbhadra", "Sultanpur", "Unnao", "Varanasi"
];
var Uttarakhand = ["Almora", "Bageshwar", "Chamoli", "Champawat", "Dehradun", "Haridwar", "Nainital", "Pauri",
    "Pithoragarh", "Rudraprayag", "Tehri", "Udham Singh Nagar", "Uttarkashi"
];
var WestBengal = ["Alipurduar", "Bankura", "Birbhum", "Cooch Behar", "Dakshin Dinajpur", "Darjeeling", "Hooghly",
    "Howrah", "Jalpaiguri", "Jhargram", "Kalimpong", "Kolkata", "Malda", "Murshidabad", "Nadia",
    "North 24 Parganas", "Paschim Bardhaman", "Paschim Medinipur", "Purba Bardhaman", "Purba Medinipur", "Purulia",
    "South 24 Parganas", "Uttar Dinajpur"
];
var AndamanNicobar = ["Nicobar", "North Middle Andaman", "South Andaman"];
var Chandigarh = ["Chandigarh"];
var DadraHaveli = ["Dadra Nagar Haveli"];
var DamanDiu = ["Daman", "Diu"];
var Delhi = ["Central Delhi", "East Delhi", "New Delhi", "North Delhi", "North East Delhi", "North West Delhi",
    "Shahdara", "South Delhi", "South East Delhi", "South West Delhi", "West Delhi"
];
var Lakshadweep = ["Lakshadweep"];
var Puducherry = ["Karaikal", "Mahe", "Puducherry", "Yanam"];


$("#inputState").change(function() {
    var StateSelected = $(this).val();
    var optionsList;
    var htmlString = "";

    switch (StateSelected) {
        case "Andra Pradesh":
            optionsList = AndraPradesh;
            break;
        case "Arunachal Pradesh":
            optionsList = ArunachalPradesh;
            break;
        case "Assam":
            optionsList = Assam;
            break;
        case "Bihar":
            optionsList = Bihar;
            break;
        case "Chhattisgarh":
            optionsList = Chhattisgarh;
            break;
        case "Goa":
            optionsList = Goa;
            break;
        case "Gujarat":
            optionsList = Gujarat;
            break;
        case "Haryana":
            optionsList = Haryana;
            break;
        case "Himachal Pradesh":
            optionsList = HimachalPradesh;
            break;
        case "Jammu and Kashmir":
            optionsList = JammuKashmir;
            break;
        case "Jharkhand":
            optionsList = Jharkhand;
            break;
        case "Karnataka":
            optionsList = Karnataka;
            break;
        case "Kerala":
            optionsList = Kerala;
            break;
        case "Madya Pradesh":
            optionsList = MadhyaPradesh;
            break;
        case "Maharashtra":
            optionsList = Maharashtra;
            break;
        case "Manipur":
            optionsList = Manipur;
            break;
        case "Meghalaya":
            optionsList = Meghalaya;
            break;
        case "Mizoram":
            optionsList = Mizoram;
            break;
        case "Nagaland":
            optionsList = Nagaland;
            break;
        case "Orissa":
            optionsList = Orissa;
            break;
        case "Punjab":
            optionsList = Punjab;
            break;
        case "Rajasthan":
            optionsList = Rajasthan;
            break;
        case "Sikkim":
            optionsList = Sikkim;
            break;
        case "Tamil Nadu":
            optionsList = TamilNadu;
            break;
        case "Telangana":
            optionsList = Telangana;
            break;
        case "Tripura":
            optionsList = Tripura;
            break;
        case "Uttaranchal":
            optionsList = Uttaranchal;
            break;
        case "Uttar Pradesh":
            optionsList = UttarPradesh;
            break;
        case "West Bengal":
            optionsList = WestBengal;
            break;
        case "Andaman and Nicobar Islands":
            optionsList = AndamanNicobar;
            break;
        case "Chandigarh":
            optionsList = Chandigarh;
            break;
        case "Dadar and Nagar Haveli":
            optionsList = DadraHaveli;
            break;
        case "Daman and Diu":
            optionsList = DamanDiu;
            break;
        case "Delhi":
            optionsList = Delhi;
            break;
        case "Lakshadeep":
            optionsList = Lakshadeep;
            break;
        case "Pondicherry":
            optionsList = Pondicherry;
            break;
    }


    for (var i = 0; i < optionsList.length; i++) {
        htmlString = htmlString + "<option value='" + optionsList[i] + "'>" + optionsList[i] + "</option>";
    }
    $("#inputDistrict").html(htmlString);

});
</script>

@endsection