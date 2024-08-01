@extends('admin.layouts.app')

@section('content')
<div class="container-fluid page-body-wrapper">
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h4>Edit Driver</h4>
                            <div>
                                <a class="btn btn-sm btn-success" href="/dashboard">
                                    <i class="mdi mdi-home"></i> Back
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <form class="forms-sample" action="{{route('update.driver')}}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('POST')
                                <input type="hidden" class="form-control" name="driver_id"
                                    value="{{$driver->driver_id}}">
                                <div class="form-group">
                                    <label for="exampleInputUsername1">First Name</label>
                                    <input type="text" class="form-control" id="exampleInputUsername1" name="first_name"
                                        value="{{$driver->first_name}}" placeholder="Enter Your Driver First Name">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputUsername1">Last Name</label>
                                    <input type="text" class="form-control" id="exampleInputUsername1" name="last_name"
                                        value="{{$driver->last_name}}" placeholder="Enter Your Driver Last Name">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email Address</label>
                                    <input type="email" class="form-control" id="exampleInputEmail1" name="driver_email"
                                        value="{{$driver->driver_email}}" placeholder="Enter Your Driver Email">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Mobile Number</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" name="mobile_no"
                                        value="{{$driver->mobile_no}}" placeholder="Enter Your Mobile No">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Alternate Mobile Number</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1"
                                        value="{{$driver->alternate_mobile_no}}" name="alternate_mobile_no"
                                        placeholder="Enter Alternative Mobile Number">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Address</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" name="address"
                                        value="{{$driver->address}}" placeholder="Enter Your Address">
                                </div>

                                <div class="form-group">
                                    <label for="country">Country</label>
                                    <select class="form-control" name="country" id="country">
                                        <option value="" selected="selected">-- Select Country --</option>
                                        <option value="AF"
                                            {{ old('country', $driver->country) == 'AF' ? 'selected' : '' }}>
                                            Afghanistan</option>
                                        <option value="AL"
                                            {{ old('country', $driver->country) == 'AF' ? 'selected' : '' }}>Albania
                                        </option>
                                        <option value="DZ"
                                            {{ old('country', $driver->country) == 'DZ' ? 'selected' : '' }}>Algeria
                                        </option>
                                        <option value="AS"
                                            {{ old('country', $driver->country) == 'AS' ? 'selected' : '' }}>American
                                            Samoa</option>
                                        <option value="AD"
                                            {{ old('country', $driver->country) == 'AD' ? 'selected' : '' }}>Andorra
                                        </option>
                                        <option value="AO"
                                            {{ old('country', $driver->country) == 'AO' ? 'selected' : '' }}>Angola
                                        </option>
                                        <option value="AI"
                                            {{ old('country', $driver->country) == 'AI' ? 'selected' : '' }}>Anguilla
                                        </option>
                                        <option value="AQ"
                                            {{ old('country', $driver->country) == 'AQ' ? 'selected' : '' }}>Antarctica
                                        </option>
                                        <option value="AG"
                                            {{ old('country', $driver->country) == 'AG' ? 'selected' : '' }}>Antigua
                                            and Barbuda</option>
                                        <option value="AR"
                                            {{ old('country', $driver->country) == 'AR' ? 'selected' : '' }}>Argentina
                                        </option>
                                        <option value="AM"
                                            {{ old('country', $driver->country) == 'AM' ? 'selected' : '' }}>Armenia
                                        </option>
                                        <option value="AW"
                                            {{ old('country', $driver->country) == 'AW' ? 'selected' : '' }}>Aruba
                                        </option>
                                        <option value="AU"
                                            {{ old('country', $driver->country) == 'AU' ? 'selected' : '' }}>Australia
                                        </option>
                                        <option value="AT"
                                            {{ old('country', $driver->country) == 'AT' ? 'selected' : '' }}>Austria
                                        </option>
                                        <option value="AZ"
                                            {{ old('country', $driver->country) == 'AZ' ? 'selected' : '' }}>Azerbaijan
                                        </option>
                                        <option value="BS"
                                            {{ old('country', $driver->country) == 'BS' ? 'selected' : '' }}>Bahamas
                                        </option>
                                        <option value="BH"
                                            {{ old('country', $driver->country) == 'BH' ? 'selected' : '' }}>Bahrain
                                        </option>
                                        <option value="BD"
                                            {{ old('country', $driver->country) == 'BD' ? 'selected' : '' }}>Bangladesh
                                        </option>
                                        <option value="BB"
                                            {{ old('country', $driver->country) == 'BB' ? 'selected' : '' }}>Barbados
                                        </option>
                                        <option value="BY"
                                            {{ old('country', $driver->country) == 'BY' ? 'selected' : '' }}>Belarus
                                        </option>
                                        <option value="BE"
                                            {{ old('country', $driver->country) == 'BE' ? 'selected' : '' }}>Belgium
                                        </option>
                                        <option value="BZ"
                                            {{ old('country', $driver->country) == 'BZ' ? 'selected' : '' }}>Belize
                                        </option>
                                        <option value="BJ"
                                            {{ old('country', $driver->country) == 'BJ' ? 'selected' : '' }}>Benin
                                        </option>
                                        <option value="BM"
                                            {{ old('country', $driver->country) == 'BM' ? 'selected' : '' }}>Bermuda
                                        </option>
                                        <option value="BT"
                                            {{ old('country', $driver->country) == 'BT' ? 'selected' : '' }}>Bhutan
                                        </option>
                                        <option value="BO"
                                            {{ old('country', $driver->country) == 'BO' ? 'selected' : '' }}>Bolivia
                                        </option>
                                        <option value="BA"
                                            {{ old('country', $driver->country) == 'BA' ? 'selected' : '' }}>Bosnia and
                                            Herzegovina</option>
                                        <option value="BW"
                                            {{ old('country', $driver->country) == 'BW' ? 'selected' : '' }}>Botswana
                                        </option>
                                        <option value="BV"
                                            {{ old('country', $driver->country) == 'BV' ? 'selected' : '' }}>Bouvet
                                            Island</option>
                                        <option value="BR"
                                            {{ old('country', $driver->country) == 'BR' ? 'selected' : '' }}>Brazil
                                        </option>
                                        <option value="BQ"
                                            {{ old('country', $driver->country) == 'BQ' ? 'selected' : '' }}>British
                                            Antarctic Territory</option>
                                        <option value="IO"
                                            {{ old('country', $driver->country) == 'IO' ? 'selected' : '' }}>British
                                            Indian Ocean Territory</option>
                                        <option value="VG"
                                            {{ old('country', $driver->country) == 'VG' ? 'selected' : '' }}>British
                                            Virgin Islands</option>
                                        <option value="BN"
                                            {{ old('country', $driver->country) == 'BN' ? 'selected' : '' }}>Brunei
                                        </option>
                                        <option value="BG"
                                            {{ old('country', $driver->country) == 'BG' ? 'selected' : '' }}>Bulgaria
                                        </option>
                                        <option value="BF"
                                            {{ old('country', $driver->country) == 'BF' ? 'selected' : '' }}>Burkina
                                            Faso</option>
                                        <option value="BI"
                                            {{ old('country', $driver->country) == 'BI' ? 'selected' : '' }}>Burundi
                                        </option>
                                        <option value="KH"
                                            {{ old('country', $driver->country) == 'KH' ? 'selected' : '' }}>Cambodia
                                        </option>
                                        <option value="CM"
                                            {{ old('country', $driver->country) == 'CM' ? 'selected' : '' }}>Cameroon
                                        </option>
                                        <option value="CA"
                                            {{ old('country', $driver->country) == 'CA' ? 'selected' : '' }}>Canada
                                        </option>
                                        <option value="CT"
                                            {{ old('country', $driver->country) == 'CT' ? 'selected' : '' }}>Canton and
                                            Enderbury Islands</option>
                                        <option value="CV"
                                            {{ old('country', $driver->country) == 'CV' ? 'selected' : '' }}>Cape Verde
                                        </option>
                                        <option value="KY"
                                            {{ old('country', $driver->country) == 'KY' ? 'selected' : '' }}>Cayman
                                            Islands</option>
                                        <option value="CF"
                                            {{ old('country', $driver->country) == 'CF' ? 'selected' : '' }}>Central
                                            African Republic</option>
                                        <option value="TD"
                                            {{ old('country', $driver->country) == 'TD' ? 'selected' : '' }}>Chad
                                        </option>
                                        <option value="CL"
                                            {{ old('country', $driver->country) == 'CL' ? 'selected' : '' }}>Chile
                                        </option>
                                        <option value="CN"
                                            {{ old('country', $driver->country) == 'CN' ? 'selected' : '' }}>China
                                        </option>
                                        <option value="CX"
                                            {{ old('country', $driver->country) == 'CX' ? 'selected' : '' }}>Christmas
                                            Island</option>
                                        <option value="CC"
                                            {{ old('country', $driver->country) == 'CC' ? 'selected' : '' }}>Cocos
                                            [Keeling] Islands</option>
                                        <option value="CO"
                                            {{ old('country', $driver->country) == 'CO' ? 'selected' : '' }}>Colombia
                                        </option>
                                        <option value="KM"
                                            {{ old('country', $driver->country) == 'KM' ? 'selected' : '' }}>Comoros
                                        </option>
                                        <option value="CG"
                                            {{ old('country', $driver->country) == 'CG' ? 'selected' : '' }}>Congo -
                                            Brazzaville</option>
                                        <option value="CD"
                                            {{ old('country', $driver->country) == 'CD' ? 'selected' : '' }}>Congo -
                                            Kinshasa</option>
                                        <option value="CK"
                                            {{ old('country', $driver->country) == 'CK' ? 'selected' : '' }}>Cook
                                            Islands</option>
                                        <option value="CR"
                                            {{ old('country', $driver->country) == 'CR' ? 'selected' : '' }}>Costa Rica
                                        </option>
                                        <option value="HR"
                                            {{ old('country', $driver->country) == 'HR' ? 'selected' : '' }}>Croatia
                                        </option>
                                        <option value="CU"
                                            {{ old('country', $driver->country) == 'CU' ? 'selected' : '' }}>Cuba
                                        </option>
                                        <option value="CY"
                                            {{ old('country', $driver->country) == 'CY' ? 'selected' : '' }}>Cyprus
                                        </option>
                                        <option value="CZ"
                                            {{ old('country', $driver->country) == 'CZ' ? 'selected' : '' }}>Czech
                                            Republic</option>
                                        <option value="CI"
                                            {{ old('country', $driver->country) == 'CI' ? 'selected' : '' }}>Côte
                                            d’Ivoire</option>
                                        <option value="DK"
                                            {{ old('country', $driver->country) == 'DK' ? 'selected' : '' }}>Denmark
                                        </option>
                                        <option value="DJ"
                                            {{ old('country', $driver->country) == 'DJ' ? 'selected' : '' }}>Djibouti
                                        </option>
                                        <option value="DM"
                                            {{ old('country', $driver->country) == 'DM' ? 'selected' : '' }}>Dominica
                                        </option>
                                        <option value="DO"
                                            {{ old('country', $driver->country) == 'DO' ? 'selected' : '' }}>Dominican
                                            Republic</option>
                                        <option value="NQ"
                                            {{ old('country', $driver->country) == 'NQ' ? 'selected' : '' }}>Dronning
                                            Maud Land</option>
                                        <option value="DD"
                                            {{ old('country', $driver->country) == 'DD' ? 'selected' : '' }}>East
                                            Germany</option>
                                        <option value="EC"
                                            {{ old('country', $driver->country) == 'EC' ? 'selected' : '' }}>Ecuador
                                        </option>
                                        <option value="EG"
                                            {{ old('country', $driver->country) == 'EG' ? 'selected' : '' }}>Egypt
                                        </option>
                                        <option value="SV"
                                            {{ old('country', $driver->country) == 'SV' ? 'selected' : '' }}>El
                                            Salvador</option>
                                        <option value="GQ"
                                            {{ old('country', $driver->country) == 'GQ' ? 'selected' : '' }}>Equatorial
                                            Guinea</option>
                                        <option value="ER"
                                            {{ old('country', $driver->country) == 'ER' ? 'selected' : '' }}>Eritrea
                                        </option>
                                        <option value="EE"
                                            {{ old('country', $driver->country) == 'EE' ? 'selected' : '' }}>Estonia
                                        </option>
                                        <option value="ET"
                                            {{ old('country', $driver->country) == 'ET' ? 'selected' : '' }}>Ethiopia
                                        </option>
                                        <option value="FK"
                                            {{ old('country', $driver->country) == 'FK' ? 'selected' : '' }}>Falkland
                                            Islands</option>
                                        <option value="FO"
                                            {{ old('country', $driver->country) == 'FO' ? 'selected' : '' }}>Faroe
                                            Islands</option>
                                        <option value="FJ"
                                            {{ old('country', $driver->country) == 'FJ' ? 'selected' : '' }}>Fiji
                                        </option>
                                        <option value="FI"
                                            {{ old('country', $driver->country) == 'FI' ? 'selected' : '' }}>Finland
                                        </option>
                                        <option value="FR"
                                            {{ old('country', $driver->country) == 'FR' ? 'selected' : '' }}>France
                                        </option>
                                        <option value="GF"
                                            {{ old('country', $driver->country) == 'GF' ? 'selected' : '' }}>French
                                            Guiana</option>
                                        <option value="PF"
                                            {{ old('country', $driver->country) == 'PF' ? 'selected' : '' }}>French
                                            Polynesia</option>
                                        <option value="TF"
                                            {{ old('country', $driver->country) == 'TF' ? 'selected' : '' }}>French
                                            Southern Territories</option>
                                        <option value="FQ"
                                            {{ old('country', $driver->country) == 'FQ' ? 'selected' : '' }}>French
                                            Southern and Antarctic Territories</option>
                                        <option value="GA"
                                            {{ old('country', $driver->country) == 'GA' ? 'selected' : '' }}>Gabon
                                        </option>
                                        <option value="GM"
                                            {{ old('country', $driver->country) == 'GM' ? 'selected' : '' }}>Gambia
                                        </option>
                                        <option value="GE"
                                            {{ old('country', $driver->country) == 'GE' ? 'selected' : '' }}>Georgia
                                        </option>
                                        <option value="DE"
                                            {{ old('country', $driver->country) == 'DE' ? 'selected' : '' }}>Germany
                                        </option>
                                        <option value="GH"
                                            {{ old('country', $driver->country) == 'GH' ? 'selected' : '' }}>Ghana
                                        </option>
                                        <option value="GI"
                                            {{ old('country', $driver->country) == 'GI' ? 'selected' : '' }}>Gibraltar
                                        </option>
                                        <option value="GR"
                                            {{ old('country', $driver->country) == 'GR' ? 'selected' : '' }}>Greece
                                        </option>
                                        <option value="GL"
                                            {{ old('country', $driver->country) == 'GL' ? 'selected' : '' }}>Greenland
                                        </option>
                                        <option value="GD"
                                            {{ old('country', $driver->country) == 'GD' ? 'selected' : '' }}>Grenada
                                        </option>
                                        <option value="GP"
                                            {{ old('country', $driver->country) == 'GP' ? 'selected' : '' }}>Guadeloupe
                                        </option>
                                        <option value="GU"
                                            {{ old('country', $driver->country) == 'GU' ? 'selected' : '' }}>Guam
                                        </option>
                                        <option value="GT"
                                            {{ old('country', $driver->country) == 'GT' ? 'selected' : '' }}>Guatemala
                                        </option>
                                        <option value="GG"
                                            {{ old('country', $driver->country) == 'GG' ? 'selected' : '' }}>Guernsey
                                        </option>
                                        <option value="GN"
                                            {{ old('country', $driver->country) == 'GN' ? 'selected' : '' }}>Guinea
                                        </option>
                                        <option value="GW"
                                            {{ old('country', $driver->country) == 'GW' ? 'selected' : '' }}>
                                            Guinea-Bissau</option>
                                        <option value="GY"
                                            {{ old('country', $driver->country) == 'GY' ? 'selected' : '' }}>Guyana
                                        </option>
                                        <option value="HT"
                                            {{ old('country', $driver->country) == 'HT' ? 'selected' : '' }}>Haiti
                                        </option>
                                        <option value="HM"
                                            {{ old('country', $driver->country) == 'HM' ? 'selected' : '' }}>Heard
                                            Island and McDonald Islands</option>
                                        <option value="HN"
                                            {{ old('country', $driver->country) == 'HN' ? 'selected' : '' }}>Honduras
                                        </option>
                                        <option value="HK"
                                            {{ old('country', $driver->country) == 'HK' ? 'selected' : '' }}>Hong Kong
                                            SAR China</option>
                                        <option value="HU"
                                            {{ old('country', $driver->country) == 'HU' ? 'selected' : '' }}>Hungary
                                        </option>
                                        <option value="IS"
                                            {{ old('country', $driver->country) == 'IS' ? 'selected' : '' }}>Iceland
                                        </option>
                                        <option value="IN"
                                            {{ old('country', $driver->country) == 'IN' ? 'selected' : '' }}>India
                                        </option>
                                        <option value="ID"
                                            {{ old('country', $driver->country) == 'ID' ? 'selected' : '' }}>Indonesia
                                        </option>
                                        <option value="IR"
                                            {{ old('country', $driver->country) == 'IR' ? 'selected' : '' }}>Iran
                                        </option>
                                        <option value="IQ"
                                            {{ old('country', $driver->country) == 'IQ' ? 'selected' : '' }}>Iraq
                                        </option>
                                        <option value="IE"
                                            {{ old('country', $driver->country) == 'IE' ? 'selected' : '' }}>Ireland
                                        </option>
                                        <option value="IM"
                                            {{ old('country', $driver->country) == 'IM' ? 'selected' : '' }}>Isle of
                                            Man</option>
                                        <option value="IL"
                                            {{ old('country', $driver->country) == 'IL' ? 'selected' : '' }}>Israel
                                        </option>
                                        <option value="IT"
                                            {{ old('country', $driver->country) == 'IT' ? 'selected' : '' }}>Italy
                                        </option>
                                        <option value="JM"
                                            {{ old('country', $driver->country) == 'JM' ? 'selected' : '' }}>Jamaica
                                        </option>
                                        <option value="JP"
                                            {{ old('country', $driver->country) == 'JP' ? 'selected' : '' }}>Japan
                                        </option>
                                        <option value="JE"
                                            {{ old('country', $driver->country) == 'JE' ? 'selected' : '' }}>Jersey
                                        </option>
                                        <option value="JT"
                                            {{ old('country', $driver->country) == 'JT' ? 'selected' : '' }}>Johnston
                                            Island</option>
                                        <option value="JO"
                                            {{ old('country', $driver->country) == 'JO' ? 'selected' : '' }}>Jordan
                                        </option>
                                        <option value="KZ"
                                            {{ old('country', $driver->country) == 'KZ' ? 'selected' : '' }}>Kazakhstan
                                        </option>
                                        <option value="KE"
                                            {{ old('country', $driver->country) == 'KE' ? 'selected' : '' }}>Kenya
                                        </option>
                                        <option value="KI"
                                            {{ old('country', $driver->country) == 'KI' ? 'selected' : '' }}>Kiribati
                                        </option>
                                        <option value="KW"
                                            {{ old('country', $driver->country) == 'KW' ? 'selected' : '' }}>Kuwait
                                        </option>
                                        <option value="KG"
                                            {{ old('country', $driver->country) == 'KG' ? 'selected' : '' }}>Kyrgyzstan
                                        </option>
                                        <option value="LA"
                                            {{ old('country', $driver->country) == 'LA' ? 'selected' : '' }}>Laos
                                        </option>
                                        <option value="LV"
                                            {{ old('country', $driver->country) == 'LV' ? 'selected' : '' }}>Latvia
                                        </option>
                                        <option value="LB"
                                            {{ old('country', $driver->country) == 'LB' ? 'selected' : '' }}>Lebanon
                                        </option>
                                        <option value="LS"
                                            {{ old('country', $driver->country) == 'LS' ? 'selected' : '' }}>Lesotho
                                        </option>
                                        <option value="LR"
                                            {{ old('country', $driver->country) == 'LR' ? 'selected' : '' }}>Liberia
                                        </option>
                                        <option value="LY"
                                            {{ old('country', $driver->country) == 'LY' ? 'selected' : '' }}>Libya
                                        </option>
                                        <option value="LI"
                                            {{ old('country', $driver->country) == 'LI' ? 'selected' : '' }}>
                                            Liechtenstein</option>
                                        <option value="LT"
                                            {{ old('country', $driver->country) == 'LT' ? 'selected' : '' }}>Lithuania
                                        </option>
                                        <option value="LU"
                                            {{ old('country', $driver->country) == 'LU' ? 'selected' : '' }}>Luxembourg
                                        </option>
                                        <option value="MO"
                                            {{ old('country', $driver->country) == 'MO' ? 'selected' : '' }}>Macau SAR
                                            China</option>
                                        <option value="MK"
                                            {{ old('country', $driver->country) == 'MK' ? 'selected' : '' }}>Macedonia
                                        </option>
                                        <option value="MG"
                                            {{ old('country', $driver->country) == 'MG' ? 'selected' : '' }}>Madagascar
                                        </option>
                                        <option value="MW"
                                            {{ old('country', $driver->country) == 'MW' ? 'selected' : '' }}>Malawi
                                        </option>
                                        <option value="MY"
                                            {{ old('country', $driver->country) == 'MY' ? 'selected' : '' }}>Malaysia
                                        </option>
                                        <option value="MV"
                                            {{ old('country', $driver->country) == 'MV' ? 'selected' : '' }}>Maldives
                                        </option>
                                        <option value="ML"
                                            {{ old('country', $driver->country) == 'ML' ? 'selected' : '' }}>Mali
                                        </option>
                                        <option value="MT"
                                            {{ old('country', $driver->country) == 'MT' ? 'selected' : '' }}>Malta
                                        </option>
                                        <option value="MH"
                                            {{ old('country', $driver->country) == 'MH' ? 'selected' : '' }}>Marshall
                                            Islands</option>
                                        <option value="MQ"
                                            {{ old('country', $driver->country) == 'MQ' ? 'selected' : '' }}>Martinique
                                        </option>
                                        <option value="MR"
                                            {{ old('country', $driver->country) == 'MR' ? 'selected' : '' }}>Mauritania
                                        </option>
                                        <option value="MU"
                                            {{ old('country', $driver->country) == 'MU' ? 'selected' : '' }}>Mauritius
                                        </option>
                                        <option value="YT"
                                            {{ old('country', $driver->country) == 'YT' ? 'selected' : '' }}>Mayotte
                                        </option>
                                        <option value="FX"
                                            {{ old('country', $driver->country) == 'FX' ? 'selected' : '' }}>
                                            Metropolitan France</option>
                                        <option value="MX"
                                            {{ old('country', $driver->country) == 'MX' ? 'selected' : '' }}>Mexico
                                        </option>
                                        <option value="FM"
                                            {{ old('country', $driver->country) == 'FM' ? 'selected' : '' }}>Micronesia
                                        </option>
                                        <option value="MI"
                                            {{ old('country', $driver->country) == 'MI' ? 'selected' : '' }}>Midway
                                            Islands</option>
                                        <option value="MD"
                                            {{ old('country', $driver->country) == 'MD' ? 'selected' : '' }}>Moldova
                                        </option>
                                        <option value="MC"
                                            {{ old('country', $driver->country) == 'MC' ? 'selected' : '' }}>Monaco
                                        </option>
                                        <option value="MN"
                                            {{ old('country', $driver->country) == 'MN' ? 'selected' : '' }}>Mongolia
                                        </option>
                                        <option value="ME"
                                            {{ old('country', $driver->country) == 'ME' ? 'selected' : '' }}>Montenegro
                                        </option>
                                        <option value="MS"
                                            {{ old('country', $driver->country) == 'MS' ? 'selected' : '' }}>Montserrat
                                        </option>
                                        <option value="MA"
                                            {{ old('country', $driver->country) == 'MA' ? 'selected' : '' }}>Morocco
                                        </option>
                                        <option value="MZ"
                                            {{ old('country', $driver->country) == 'MZ' ? 'selected' : '' }}>Mozambique
                                        </option>
                                        <option value="MM"
                                            {{ old('country', $driver->country) == 'MM' ? 'selected' : '' }}>Myanmar
                                            [Burma]</option>
                                        <option value="NA"
                                            {{ old('country', $driver->country) == 'NA' ? 'selected' : '' }}>Namibia
                                        </option>
                                        <option value="NR"
                                            {{ old('country', $driver->country) == 'NR' ? 'selected' : '' }}>Nauru
                                        </option>
                                        <option value="NP"
                                            {{ old('country', $driver->country) == 'NP' ? 'selected' : '' }}>Nepal
                                        </option>
                                        <option value="NL"
                                            {{ old('country', $driver->country) == 'NL' ? 'selected' : '' }}>
                                            Netherlands</option>
                                        <option value="AN"
                                            {{ old('country', $driver->country) == 'AN' ? 'selected' : '' }}>
                                            Netherlands Antilles</option>
                                        <option value="NT"
                                            {{ old('country', $driver->country) == 'NT' ? 'selected' : '' }}>Neutral
                                            Zone</option>
                                        <option value="NC"
                                            {{ old('country', $driver->country) == 'NC' ? 'selected' : '' }}>New
                                            Caledonia</option>
                                        <option value="NZ"
                                            {{ old('country', $driver->country) == 'NZ' ? 'selected' : '' }}>New
                                            Zealand</option>
                                        <option value="NI"
                                            {{ old('country', $driver->country) == 'NI' ? 'selected' : '' }}>Nicaragua
                                        </option>
                                        <option value="NE"
                                            {{ old('country', $driver->country) == 'NE' ? 'selected' : '' }}>Niger
                                        </option>
                                        <option value="NG"
                                            {{ old('country', $driver->country) == 'NG' ? 'selected' : '' }}>Nigeria
                                        </option>
                                        <option value="NU"
                                            {{ old('country', $driver->country) == 'NU' ? 'selected' : '' }}>Niue
                                        </option>
                                        <option value="NF"
                                            {{ old('country', $driver->country) == 'NF' ? 'selected' : '' }}>Norfolk
                                            Island</option>
                                        <option value="KP"
                                            {{ old('country', $driver->country) == 'KP' ? 'selected' : '' }}>North
                                            Korea</option>
                                        <option value="VD"
                                            {{ old('country', $driver->country) == 'VD' ? 'selected' : '' }}>North
                                            Vietnam</option>
                                        <option value="MP"
                                            {{ old('country', $driver->country) == 'MP' ? 'selected' : '' }}>Northern
                                            Mariana Islands</option>
                                        <option value="NO"
                                            {{ old('country', $driver->country) == 'NO' ? 'selected' : '' }}>Norway
                                        </option>
                                        <option value="OM"
                                            {{ old('country', $driver->country) == 'OM' ? 'selected' : '' }}>Oman
                                        </option>
                                        <option value="PC"
                                            {{ old('country', $driver->country) == 'PC' ? 'selected' : '' }}>Pacific
                                            Islands Trust Territory</option>
                                        <option value="PK"
                                            {{ old('country', $driver->country) == 'PK' ? 'selected' : '' }}>Pakistan
                                        </option>
                                        <option value="PW"
                                            {{ old('country', $driver->country) == 'PW' ? 'selected' : '' }}>Palau
                                        </option>
                                        <option value="PS"
                                            {{ old('country', $driver->country) == 'PS' ? 'selected' : '' }}>
                                            Palestinian Territories</option>
                                        <option value="PA"
                                            {{ old('country', $driver->country) == 'PA' ? 'selected' : '' }}>Panama
                                        </option>
                                        <option value="PZ"
                                            {{ old('country', $driver->country) == 'PZ' ? 'selected' : '' }}>Panama
                                            Canal Zone</option>
                                        <option value="PG"
                                            {{ old('country', $driver->country) == 'PG' ? 'selected' : '' }}>Papua New
                                            Guinea</option>
                                        <option value="PY"
                                            {{ old('country', $driver->country) == 'PY' ? 'selected' : '' }}>Paraguay
                                        </option>
                                        <option value="YD"
                                            {{ old('country', $driver->country) == 'YD' ? 'selected' : '' }}>
                                            People&#039;s Democratic Republic of Yemen</option>
                                        <option value="PE"
                                            {{ old('country', $driver->country) == 'PE' ? 'selected' : '' }}>Peru
                                        </option>
                                        <option value="PH"
                                            {{ old('country', $driver->country) == 'PH' ? 'selected' : '' }}>
                                            Philippines</option>
                                        <option value="PN"
                                            {{ old('country', $driver->country) == 'PN' ? 'selected' : '' }}>Pitcairn
                                            Islands</option>
                                        <option value="PL"
                                            {{ old('country', $driver->country) == 'PL' ? 'selected' : '' }}>Poland
                                        </option>
                                        <option value="PT"
                                            {{ old('country', $driver->country) == 'PT' ? 'selected' : '' }}>Portugal
                                        </option>
                                        <option value="PR"
                                            {{ old('country', $driver->country) == 'PR' ? 'selected' : '' }}>Puerto
                                            Rico</option>
                                        <option value="QA"
                                            {{ old('country', $driver->country) == 'QA' ? 'selected' : '' }}>Qatar
                                        </option>
                                        <option value="RO"
                                            {{ old('country', $driver->country) == 'RO' ? 'selected' : '' }}>Romania
                                        </option>
                                        <option value="RU"
                                            {{ old('country', $driver->country) == 'RU' ? 'selected' : '' }}>Russia
                                        </option>
                                        <option value="RW"
                                            {{ old('country', $driver->country) == 'RW' ? 'selected' : '' }}>Rwanda
                                        </option>
                                        <option value="RE"
                                            {{ old('country', $driver->country) == 'RE' ? 'selected' : '' }}>Réunion
                                        </option>
                                        <option value="BL"
                                            {{ old('country', $driver->country) == 'BL' ? 'selected' : '' }}>Saint
                                            Barthélemy</option>
                                        <option value="SH"
                                            {{ old('country', $driver->country) == 'SH' ? 'selected' : '' }}>Saint
                                            Helena</option>
                                        <option value="KN"
                                            {{ old('country', $driver->country) == 'KN' ? 'selected' : '' }}>Saint
                                            Kitts and Nevis</option>
                                        <option value="LC"
                                            {{ old('country', $driver->country) == 'LC' ? 'selected' : '' }}>Saint
                                            Lucia</option>
                                        <option value="MF"
                                            {{ old('country', $driver->country) == 'MF' ? 'selected' : '' }}>Saint
                                            Martin</option>
                                        <option value="PM"
                                            {{ old('country', $driver->country) == 'PM' ? 'selected' : '' }}>Saint
                                            Pierre and Miquelon</option>
                                        <option value="VC"
                                            {{ old('country', $driver->country) == 'VC' ? 'selected' : '' }}>Saint
                                            Vincent and the Grenadines</option>
                                        <option value="WS"
                                            {{ old('country', $driver->country) == 'WS' ? 'selected' : '' }}>Samoa
                                        </option>
                                        <option value="SM"
                                            {{ old('country', $driver->country) == 'SM' ? 'selected' : '' }}>San Marino
                                        </option>
                                        <option value="SA"
                                            {{ old('country', $driver->country) == 'SA' ? 'selected' : '' }}>Saudi
                                            Arabia</option>
                                        <option value="SN"
                                            {{ old('country', $driver->country) == 'SN' ? 'selected' : '' }}>Senegal
                                        </option>
                                        <option value="RS"
                                            {{ old('country', $driver->country) == 'RS' ? 'selected' : '' }}>Serbia
                                        </option>
                                        <option value="CS"
                                            {{ old('country', $driver->country) == 'CS' ? 'selected' : '' }}>Serbia and
                                            Montenegro</option>
                                        <option value="SC"
                                            {{ old('country', $driver->country) == 'SC' ? 'selected' : '' }}>Seychelles
                                        </option>
                                        <option value="SL"
                                            {{ old('country', $driver->country) == 'SL' ? 'selected' : '' }}>Sierra
                                            Leone</option>
                                        <option value="SG"
                                            {{ old('country', $driver->country) == 'SG' ? 'selected' : '' }}>Singapore
                                        </option>
                                        <option value="SK"
                                            {{ old('country', $driver->country) == 'SK' ? 'selected' : '' }}>Slovakia
                                        </option>
                                        <option value="SI"
                                            {{ old('country', $driver->country) == 'SI' ? 'selected' : '' }}>Slovenia
                                        </option>
                                        <option value="SB"
                                            {{ old('country', $driver->country) == 'SB' ? 'selected' : '' }}>Solomon
                                            Islands</option>
                                        <option value="SO"
                                            {{ old('country', $driver->country) == 'SO' ? 'selected' : '' }}>Somalia
                                        </option>
                                        <option value="ZA"
                                            {{ old('country', $driver->country) == 'ZA' ? 'selected' : '' }}>South
                                            Africa</option>
                                        <option value="GS"
                                            {{ old('country', $driver->country) == 'GS' ? 'selected' : '' }}>South
                                            Georgia and the South Sandwich Islands</option>
                                        <option value="KR"
                                            {{ old('country', $driver->country) == 'KR' ? 'selected' : '' }}>South
                                            Korea</option>
                                        <option value="ES"
                                            {{ old('country', $driver->country) == 'ES' ? 'selected' : '' }}>Spain
                                        </option>
                                        <option value="LK"
                                            {{ old('country', $driver->country) == 'LK' ? 'selected' : '' }}>Sri Lanka
                                        </option>
                                        <option value="SD"
                                            {{ old('country', $driver->country) == 'SD' ? 'selected' : '' }}>Sudan
                                        </option>
                                        <option value="SR"
                                            {{ old('country', $driver->country) == 'SR' ? 'selected' : '' }}>Suriname
                                        </option>
                                        <option value="SJ"
                                            {{ old('country', $driver->country) == 'SJ' ? 'selected' : '' }}>Svalbard
                                            and Jan Mayen</option>
                                        <option value="SZ"
                                            {{ old('country', $driver->country) == 'SZ' ? 'selected' : '' }}>Swaziland
                                        </option>
                                        <option value="SE"
                                            {{ old('country', $driver->country) == 'SE' ? 'selected' : '' }}>Sweden
                                        </option>
                                        <option value="CH"
                                            {{ old('country', $driver->country) == 'CH' ? 'selected' : '' }}>
                                            Switzerland</option>
                                        <option value="SY"
                                            {{ old('country', $driver->country) == 'SY' ? 'selected' : '' }}>Syria
                                        </option>
                                        <option value="ST"
                                            {{ old('country', $driver->country) == 'ST' ? 'selected' : '' }}>São Tomé
                                            and Príncipe</option>
                                        <option value="TW"
                                            {{ old('country', $driver->country) == 'TW' ? 'selected' : '' }}>Taiwan
                                        </option>
                                        <option value="TJ"
                                            {{ old('country', $driver->country) == 'TJ' ? 'selected' : '' }}>Tajikistan
                                        </option>
                                        <option value="TZ"
                                            {{ old('country', $driver->country) == 'TZ' ? 'selected' : '' }}>Tanzania
                                        </option>
                                        <option value="TH"
                                            {{ old('country', $driver->country) == 'TH' ? 'selected' : '' }}>Thailand
                                        </option>
                                        <option value="TL"
                                            {{ old('country', $driver->country) == 'TL' ? 'selected' : '' }}>
                                            Timor-Leste</option>
                                        <option value="TG"
                                            {{ old('country', $driver->country) == 'TG' ? 'selected' : '' }}>Togo
                                        </option>
                                        <option value="TK"
                                            {{ old('country', $driver->country) == 'TK' ? 'selected' : '' }}>Tokelau
                                        </option>
                                        <option value="TO"
                                            {{ old('country', $driver->country) == 'TO' ? 'selected' : '' }}>Tonga
                                        </option>
                                        <option value="TT"
                                            {{ old('country', $driver->country) == 'TT' ? 'selected' : '' }}>Trinidad
                                            and Tobago</option>
                                        <option value="TN"
                                            {{ old('country', $driver->country) == 'TN' ? 'selected' : '' }}>Tunisia
                                        </option>
                                        <option value="TR"
                                            {{ old('country', $driver->country) == 'TR' ? 'selected' : '' }}>Turkey
                                        </option>
                                        <option value="TM"
                                            {{ old('country', $driver->country) == 'TM' ? 'selected' : '' }}>
                                            Turkmenistan</option>
                                        <option value="TC"
                                            {{ old('country', $driver->country) == 'TC' ? 'selected' : '' }}>Turks and
                                            Caicos Islands</option>
                                        <option value="TV"
                                            {{ old('country', $driver->country) == 'TV' ? 'selected' : '' }}>Tuvalu
                                        </option>
                                        <option value="UM"
                                            {{ old('country', $driver->country) == 'UM' ? 'selected' : '' }}>U.S. Minor
                                            Outlying Islands</option>
                                        <option value="PU"
                                            {{ old('country', $driver->country) == 'PU' ? 'selected' : '' }}>U.S.
                                            Miscellaneous Pacific Islands</option>
                                        <option value="VI"
                                            {{ old('country', $driver->country) == 'VI' ? 'selected' : '' }}>U.S.
                                            Virgin Islands</option>
                                        <option value="UG"
                                            {{ old('country', $driver->country) == 'UG' ? 'selected' : '' }}>Uganda
                                        </option>
                                        <option value="UA"
                                            {{ old('country', $driver->country) == 'UA' ? 'selected' : '' }}>Ukraine
                                        </option>
                                        <option value="SU"
                                            {{ old('country', $driver->country) == 'SU' ? 'selected' : '' }}>Union of
                                            Soviet Socialist Republics</option>
                                        <option value="AE"
                                            {{ old('country', $driver->country) == 'AE' ? 'selected' : '' }}>United
                                            Arab Emirates</option>
                                        <option value="GB"
                                            {{ old('country', $driver->country) == 'GB' ? 'selected' : '' }}>United
                                            Kingdom</option>
                                        <option value="US"
                                            {{ old('country', $driver->country) == 'US' ? 'selected' : '' }}>United
                                            States</option>
                                        <option value="ZZ"
                                            {{ old('country', $driver->country) == 'ZZ' ? 'selected' : '' }}>Unknown or
                                            Invalid Region</option>
                                        <option value="UY"
                                            {{ old('country', $driver->country) == 'UY' ? 'selected' : '' }}>Uruguay
                                        </option>
                                        <option value="UZ"
                                            {{ old('country', $driver->country) == 'UZ' ? 'selected' : '' }}>Uzbekistan
                                        </option>
                                        <option value="VU"
                                            {{ old('country', $driver->country) == 'VU' ? 'selected' : '' }}>Vanuatu
                                        </option>
                                        <option value="VA"
                                            {{ old('country', $driver->country) == 'VA' ? 'selected' : '' }}>Vatican
                                            City</option>
                                        <option value="VE"
                                            {{ old('country', $driver->country) == 'VE' ? 'selected' : '' }}>Venezuela
                                        </option>
                                        <option value="VN"
                                            {{ old('country', $driver->country) == 'VN' ? 'selected' : '' }}>Vietnam
                                        </option>
                                        <option value="WK"
                                            {{ old('country', $driver->country) == 'WK' ? 'selected' : '' }}>Wake
                                            Island</option>
                                        <option value="WF"
                                            {{ old('country', $driver->country) == 'WF' ? 'selected' : '' }}>Wallis and
                                            Futuna</option>
                                        <option value="EH"
                                            {{ old('country', $driver->country) == 'EH' ? 'selected' : '' }}>Western
                                            Sahara</option>
                                        <option value="YE"
                                            {{ old('country', $driver->country) == 'YE' ? 'selected' : '' }}>Yemen
                                        </option>
                                        <option value="ZM"
                                            {{ old('country', $driver->country) == 'ZM' ? 'selected' : '' }}>Zambia
                                        </option>
                                        <option value="ZW"
                                            {{ old('country', $driver->country) == 'ZW' ? 'selected' : '' }}>Zimbabwe
                                        </option>
                                        <option value="AX"
                                            {{ old('country', $driver->country) == 'AX' ? 'selected' : '' }}>Åland
                                            Islands</option>
                                        <!-- Add options for countries dynamically if needed -->
                                    </select>

                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">State</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" name="state"
                                        value="{{$driver->state}}" placeholder="Enter Your State">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">City</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" name="city"
                                        value="{{$driver->city}}" placeholder="Enter Your City">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">PinCode</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" name="pincode"
                                        value="{{$driver->pincode}}" placeholder="Enter Your Pin Code">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Profile Image</label>
                                    <input type="file" class="form-control" id="exampleInputEmail1"
                                        name="profile_image">
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-8">
                                    <img src="{{ asset('assets/driver_images/' .$driver->profile_image) }}"
                                        alt="restaurant-img2" class="" style="height:70px; width:100px; ">

                                </div><br>
                                <!-- 
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Password</label>
                                    <input type="password" class="form-control" id="exampleInputPassword1"
                                        placeholder="Password">
                                </div> -->

                                <div class="form-group">
                                    <label for="driver_status">Status</label>
                                    <select name="driver_status" id="driver_status" class="form-control">
                                        <option value="0" {{ $driver->driver_status == "0" ? 'selected' : '' }}>New
                                        </option>
                                        <option value="1" {{ $driver->driver_status == "1" ? 'selected' : '' }}>Pending
                                            For Verification</option>
                                        <option value="2" {{ $driver->driver_status == "2" ? 'selected' : '' }}>Verified
                                        </option>
                                        <option value="3" {{ $driver->driver_status == "3" ? 'selected' : '' }}>Online
                                        </option>
                                        <option value="4" {{ $driver->driver_status == "4" ? 'selected' : '' }}>Offline
                                        </option>
                                    </select>
                                </div>



                                <button type="submit" class="btn btn-primary me-2">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection