@extends('admin.layouts.master')

@section('title', __('static.user.edit'))

@section('content')
    <div class="row">
        <div class="col-sm-10 col-xxl-8 mx-auto">
            <div class="card tab2-card">
                <div class="card-body">
                    <ul class="nav nav-tabs nav-material" id="top-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link {{ $errors->has('name') || $errors->has('email') || $errors->has('role') || !$errors->any() ? 'active' : '' }}"
                                id="top-profile-tab" data-bs-toggle="tab" href="#top-profile" role="tab"
                                aria-controls="top-profile" aria-selected="true"><i
                                    data-feather="user"></i>{{ __('static.user.edit') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ $errors->has('current_password') || $errors->has('new_password') || $errors->has('confirm_password') ? 'active' : '' }}"
                                id="changepassword-tab" data-bs-toggle="tab" href="#changepassword" role="tab"
                                aria-controls="changepassword" aria-selected="false"><i
                                    data-feather="settings"></i>{{ __('static.user.change_password') }}</a>
                        </li>
                    </ul>
                    </ul>
                    <div class="tab-content" id="top-tabContent">
                        <div class="tab-pane fade {{ $errors->has('name') || $errors->has('email') || !$errors->any() ? 'show active' : '' }}"
                            id="top-profile" role="tabpanel" aria-labelledby="top-profile-tab">

                            {!! Form::open([
                                'route' => ['user.update', $user->id],
                                'method' => 'PUT',
                                'files' => true,
                                'enctype' => 'multipart/form-data',
                                'class' => 'needs-validation user-add',
                            ]) !!}
                            <div class="card-body pb-0">
                                <div class="form-group row">
                                    {!! Form::label('name', __('static.name') . ' <span>*</span>', ['class' => 'col-xl-3 col-md-4'], false) !!}
                                    <div class="col-xl-9 col-md-8">
                                        {!! Form::text('name', isset($user->name) ? $user->name : old('name'), ['class' => 'form-control']) !!}
                                        @error('name')
                                            <span class="invalid-feedback d-block" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    {!! Form::label('email', __('static.user.email') . ' <span>*</span>', ['class' => 'col-xl-3 col-md-4'], false) !!}
                                    <div class="col-xl-9 col-md-8">
                                        {!! Form::email('email', isset($user->email) ? $user->email : old('email'), ['class' => 'form-control']) !!}
                                        @error('email')
                                            <span class="invalid-feedback d-block" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    {!! Form::label('PHONE', __('static.user.phone') . ' <span>*</span>', ['class' => 'col-xl-3 col-md-4'], false) !!}
                                    <div class="col-xl-9 col-md-8 phone-detail">
                                        <select name="country_code" id="country_code" class="form-control"
                                            style="width: 76px;position: absolute;">
                                            <option data-countryCode="IN" value="91"
                                                @if (@$user->country_code == 91) selected @endif>
                                                (+91) India</option>
                                            <option data-countryCode="GB" value="44"
                                                @if (@$user->country_code == 44) selected @endif>
                                                (+44) UK
                                            </option>
                                            <option data-countryCode="US" value="1"
                                                @if (@$user->country_code == 1) selected @endif>
                                                (+1) USA
                                            </option>
                                            <optgroup label="Other countries">
                                                <option data-countryCode="DZ" value="213">(+92) Pakistan</option>
                                                <option data-countryCode="DZ" value="213">(+213) Algeria</option>
                                                <option data-countryCode="AD" value="376">(+376) Andorra</option>
                                                <option data-countryCode="AO" value="244">(+244) Angola</option>
                                                <option data-countryCode="AI" value="1264">(+1264) Anguilla</option>
                                                <option data-countryCode="AG" value="1268"> (+1268) Antigua &amp; Barbuda
                                                </option>
                                                <option data-countryCode="AR" value="54">(+54) Argentina </option>
                                                <option data-countryCode="AM" value="374">(+374) Armenia</option>
                                                <option data-countryCode="AW" value="297">(+297) Aruba</option>
                                                <option data-countryCode="AU" value="61">(+61) Australia</option>
                                                <option data-countryCode="AT" value="43">(+43) Austria</option>
                                                <option data-countryCode="AZ" value="994">(+994) Azerbaijan</option>
                                                <option data-countryCode="BS" value="1242">(+1242) Bahamas</option>
                                                <option data-countryCode="BH" value="973">(+973) Bahrain</option>
                                                <option data-countryCode="BD" value="880">(+880) Bangladesh</option>
                                                <option data-countryCode="BB" value="1246">(+1246) Barbados</option>
                                                <option data-countryCode="BY" value="375">(+375) Belarus</option>
                                                <option data-countryCode="BE" value="32">(+32) Belgium</option>
                                                <option data-countryCode="BZ" value="501">(+501) Belize</option>
                                                <option data-countryCode="BJ" value="229">(+229) Benin</option>
                                                <option data-countryCode="BM" value="1441">(+1441) Bermuda</option>
                                                <option data-countryCode="BT" value="975">(+975) Bhutan</option>
                                                <option data-countryCode="BO" value="591">(+591) Bolivia</option>
                                                <option data-countryCode="BA" value="387">(+387) Bosnia Herzegovina
                                                </option>
                                                <option data-countryCode="BW" value="267">(+267) Botswana</option>
                                                <option data-countryCode="BR" value="55">(+55) Brazil</option>
                                                <option data-countryCode="BN" value="673">(+673) Brunei</option>
                                                <option data-countryCode="BG" value="359">(+359) Bulgaria</option>
                                                <option data-countryCode="BF" value="226">(+226) Burkina Faso</option>
                                                <option data-countryCode="BI" value="257">(+257) Burundi</option>
                                                <option data-countryCode="KH" value="855">(+855) Cambodia</option>
                                                <option data-countryCode="CM" value="237">(+237) Cameroon</option>
                                                <option data-countryCode="CA" value="1">(+1) Canada</option>
                                                <option data-countryCode="CV" value="238">(+238) Cape Verde Islands
                                                </option>
                                                <option data-countryCode="KY" value="1345">(+1345) Cayman Islands
                                                </option>
                                                <option data-countryCode="CF" value="236">(+236) Central African
                                                    Republic
                                                </option>
                                                <option data-countryCode="CL" value="56">(+56) Chile</option>
                                                <option data-countryCode="CN" value="86">(+86) China</option>
                                                <option data-countryCode="CO" value="57">(+57) Colombia</option>
                                                <option data-countryCode="KM" value="269">(+269) Comoros</option>
                                                <option data-countryCode="CG" value="242">(+242) Congo</option>
                                                <option data-countryCode="CK" value="682">(+682) Cook Islands</option>
                                                <option data-countryCode="CR" value="506">(+506) Costa Rica</option>
                                                <option data-countryCode="HR" value="385">(+385) Croatia</option>
                                                <option data-countryCode="CU" value="53">(+53) Cuba</option>
                                                <option data-countryCode="CY" value="90392">(+90392) Cyprus North
                                                </option>
                                                <option data-countryCode="CY" value="357">(+357) Cyprus South</option>
                                                <option data-countryCode="CZ" value="42">(+42) Czech Republic</option>
                                                <option data-countryCode="DK" value="45">(+45) Denmark</option>
                                                <option data-countryCode="DJ" value="253">(+253) Djibouti</option>
                                                <option data-countryCode="DM" value="1809">(+1809) Dominica</option>
                                                <option data-countryCode="DO" value="1809">(+1809) Dominican Republic
                                                </option>
                                                <option data-countryCode="EC" value="593">(+593) Ecuador</option>
                                                <option data-countryCode="EG" value="20">(+20) Egypt</option>
                                                <option data-countryCode="SV" value="503">(+503) El Salvador</option>
                                                <option data-countryCode="GQ" value="240">(+240) Equatorial Guinea
                                                </option>
                                                <option data-countryCode="ER" value="291">(+291) Eritrea</option>
                                                <option data-countryCode="EE" value="372">(+372) Estonia</option>
                                                <option data-countryCode="ET" value="251">(+251) Ethiopia</option>
                                                <option data-countryCode="FK" value="500">(+500) Falkland Islands
                                                </option>
                                                <option data-countryCode="FO" value="298">(+298) Faroe Islands</option>
                                                <option data-countryCode="FJ" value="679">(+679) Fiji</option>
                                                <option data-countryCode="FI" value="358">(+358) Finland</option>
                                                <option data-countryCode="FR" value="33">(+33) France</option>
                                                <option data-countryCode="GF" value="594">(+594) French Guiana</option>
                                                <option data-countryCode="PF" value="689">(+689) French Polynesia
                                                </option>
                                                <option data-countryCode="GA" value="241">(+241) Gabon</option>
                                                <option data-countryCode="GM" value="220">(+220) Gambia</option>
                                                <option data-countryCode="GE" value="7880">(+7880) Georgia</option>
                                                <option data-countryCode="DE" value="49">(+49) Germany</option>
                                                <option data-countryCode="GH" value="233">(+233) Ghana</option>
                                                <option data-countryCode="GI" value="350">(+350) Gibraltar</option>
                                                <option data-countryCode="GR" value="30">(+30) Greece</option>
                                                <option data-countryCode="GL" value="299">(+299) Greenland</option>
                                                <option data-countryCode="GD" value="1473">(+1473) Grenada</option>
                                                <option data-countryCode="GP" value="590">(+590) Guadeloupe</option>
                                                <option data-countryCode="GU" value="671">(+671) Guam</option>
                                                <option data-countryCode="GT" value="502">(+502) Guatemala</option>
                                                <option data-countryCode="GN" value="224">(+224) Guinea</option>
                                                <option data-countryCode="GW" value="245">(+245) Guinea - Bissau
                                                </option>
                                                <option data-countryCode="GY" value="592">(+592) Guyana</option>
                                                <option data-countryCode="HT" value="509">(+509) Haiti</option>
                                                <option data-countryCode="HN" value="504">(+504) Honduras</option>
                                                <option data-countryCode="HK" value="852">Hong (+852) Kong</option>
                                                <option data-countryCode="HU" value="36">(+36) Hungary</option>
                                                <option data-countryCode="IS" value="354">(+354) Iceland</option>
                                                <option data-countryCode="ID" value="62">(+62) Indonesia</option>
                                                <option data-countryCode="IR" value="98">(+98) Iran</option>
                                                <option data-countryCode="IQ" value="964">(+964) Iraq</option>
                                                <option data-countryCode="IE" value="353">(+353) Ireland</option>
                                                <option data-countryCode="IL" value="972">(+972) Israel</option>
                                                <option data-countryCode="IT" value="39">(+39) Italy</option>
                                                <option data-countryCode="JM" value="1876">(+1876) Jamaica</option>
                                                <option data-countryCode="JP" value="81">(+81) Japan</option>
                                                <option data-countryCode="JO" value="962">(+962) Jordan</option>
                                                <option data-countryCode="KZ" value="7">(+7) Kazakhstan</option>
                                                <option data-countryCode="KE" value="254">(+254) Kenya</option>
                                                <option data-countryCode="KI" value="686">(+686) Kiribati</option>
                                                <option data-countryCode="KP" value="850">(+850) Korea North</option>
                                                <option data-countryCode="KR" value="82">(+82) Korea South</option>
                                                <option data-countryCode="KW" value="965">(+965) Kuwait</option>
                                                <option data-countryCode="KG" value="996">(+996) Kyrgyzstan</option>
                                                <option data-countryCode="LA" value="856">(+856) Laos</option>
                                                <option data-countryCode="LV" value="371">(+371) Latvia</option>
                                                <option data-countryCode="LB" value="961">(+961) Lebanon</option>
                                                <option data-countryCode="LS" value="266">(+266) Lesotho</option>
                                                <option data-countryCode="LR" value="231">(+231) Liberia</option>
                                                <option data-countryCode="LY" value="218">(+218) Libya</option>
                                                <option data-countryCode="LI" value="417">(+417) Liechtenstein</option>
                                                <option data-countryCode="LT" value="370">(+370) Lithuania</option>
                                                <option data-countryCode="LU" value="352">(+352) Luxembourg</option>
                                                <option data-countryCode="MO" value="853">(+853) Macao</option>
                                                <option data-countryCode="MK" value="389">(+389) Macedonia</option>
                                                <option data-countryCode="MG" value="261">(+261) Madagascar</option>
                                                <option data-countryCode="MW" value="265">(+265) Malawi</option>
                                                <option data-countryCode="MY" value="60">(+60) Malaysia</option>
                                                <option data-countryCode="MV" value="960">(+960) Maldives</option>
                                                <option data-countryCode="ML" value="223">(+223) Mali</option>
                                                <option data-countryCode="MT" value="356">(+356) Malta</option>
                                                <option data-countryCode="MH" value="692">(+692) Marshall Islands
                                                </option>
                                                <option data-countryCode="MQ" value="596">(+596) Martinique</option>
                                                <option data-countryCode="MR" value="222">(+222) Mauritania</option>
                                                <option data-countryCode="YT" value="269">(+269) Mayotte</option>
                                                <option data-countryCode="MX" value="52">(+52) Mexico</option>
                                                <option data-countryCode="FM" value="691">(+691) Micronesia</option>
                                                <option data-countryCode="MD" value="373">(+373) Moldova</option>
                                                <option data-countryCode="MC" value="377">(+377) Monaco</option>
                                                <option data-countryCode="MN" value="976">(+976) Mongolia</option>
                                                <option data-countryCode="MS" value="1664">(+1664) Montserrat</option>
                                                <option data-countryCode="MA" value="212">(+212) Morocco</option>
                                                <option data-countryCode="MZ" value="258">(+258) Mozambique</option>
                                                <option data-countryCode="MN" value="95">(+95) Myanmar</option>
                                                <option data-countryCode="NA" value="264">(+264) Namibia</option>
                                                <option data-countryCode="NR" value="674">(+674) Nauru</option>
                                                <option data-countryCode="NP" value="977">(+977) Nepal</option>
                                                <option data-countryCode="NL" value="31">(+31) Netherlands</option>
                                                <option data-countryCode="NC" value="687">(+687) New Caledonia</option>
                                                <option data-countryCode="NZ" value="64">(+64) New Zealand</option>
                                                <option data-countryCode="NI" value="505">(+505) Nicaragua</option>
                                                <option data-countryCode="NE" value="227">(+227) Niger</option>
                                                <option data-countryCode="NG" value="234">(+234) Nigeria</option>
                                                <option data-countryCode="NU" value="683">(+683) Niue</option>
                                                <option data-countryCode="NF" value="672">(+672) Norfolk Islands
                                                </option>
                                                <option data-countryCode="NP" value="670">(+670) Northern Marianas
                                                </option>
                                                <option data-countryCode="NO" value="47">(+47) Norway</option>
                                                <option data-countryCode="OM" value="968">(+968) Oman</option>
                                                <option data-countryCode="PW" value="680">(+680) Palau</option>
                                                <option data-countryCode="PA" value="507">(+507) Panama</option>
                                                <option data-countryCode="PG" value="675">(+675) Papua New Guinea
                                                </option>
                                                <option data-countryCode="PY" value="595">(+595) Paraguay</option>
                                                <option data-countryCode="PE" value="51">(+51) Peru</option>
                                                <option data-countryCode="PH" value="63">(+63) Philippines</option>
                                                <option data-countryCode="PL" value="48">(+48) Poland</option>
                                                <option data-countryCode="PT" value="351">(+351) Portugal</option>
                                                <option data-countryCode="PR" value="1787">(+1787) Puerto Rico</option>
                                                <option data-countryCode="QA" value="974">(+974) Qatar</option>
                                                <option data-countryCode="RE" value="262">(+262) Reunion</option>
                                                <option data-countryCode="RO" value="40">(+40) Romania</option>
                                                <option data-countryCode="RU" value="7">(+7) Russia</option>
                                                <option data-countryCode="RW" value="250">(+250) Rwanda</option>
                                                <option data-countryCode="SM" value="378">(+378) San Marino</option>
                                                <option data-countryCode="ST" value="239">(+239) Sao Tome &amp;
                                                    Principe</option>
                                                <option data-countryCode="SA" value="966">(+966) Saudi Arabia</option>
                                                <option data-countryCode="SN" value="221">(+221) Senegal</option>
                                                <option data-countryCode="CS" value="381">(+381) Serbia</option>
                                                <option data-countryCode="SC" value="248">(+248) Seychelles</option>
                                                <option data-countryCode="SL" value="232">(+232) Sierra Leone</option>
                                                <option data-countryCode="SG" value="65">(+65) Singapore</option>
                                                <option data-countryCode="SK" value="421">(+421) Slovak Republic
                                                </option>
                                                <option data-countryCode="SI" value="386">(+386) Slovenia</option>
                                                <option data-countryCode="SB" value="677">(+677) Solomon Islands
                                                </option>
                                                <option data-countryCode="SO" value="252">(+252) Somalia</option>
                                                <option data-countryCode="ZA" value="27">(+27) South Africa</option>
                                                <option data-countryCode="ES" value="34">(+34) Spain</option>
                                                <option data-countryCode="LK" value="94">(+94) Sri Lanka</option>
                                                <option data-countryCode="SH" value="290">(+290) St. Helena</option>
                                                <option data-countryCode="KN" value="1869">(+1869) St. Kitts</option>
                                                <option data-countryCode="SC" value="1758">(+1758) St. Lucia</option>
                                                <option data-countryCode="SD" value="249">(+249) Sudan</option>
                                                <option data-countryCode="SR" value="597">(+597) Suriname</option>
                                                <option data-countryCode="SZ" value="268">(+268) Swaziland</option>
                                                <option data-countryCode="SE" value="46">(+46) Sweden</option>
                                                <option data-countryCode="CH" value="41">(+41) Switzerland</option>
                                                <option data-countryCode="SI" value="963">(+963) Syria</option>
                                                <option data-countryCode="TW" value="886">(+886) Taiwan</option>
                                                <option data-countryCode="TJ" value="7">(+7) Tajikstan</option>
                                                <option data-countryCode="TH" value="66">(+66) Thailand</option>
                                                <option data-countryCode="TG" value="228">(+228) Togo</option>
                                                <option data-countryCode="TO" value="676">(+676) Tonga</option>
                                                <option data-countryCode="TT" value="1868">(+1868) Trinidad &amp; Tobago
                                                </option>
                                                <option data-countryCode="TN" value="216">(+216) Tunisia</option>
                                                <option data-countryCode="TR" value="90">(+90) Turkey</option>
                                                <option data-countryCode="TM" value="7">(+7) Turkmenistan</option>
                                                <option data-countryCode="TM" value="993">(+993) Turkmenistan</option>
                                                <option data-countryCode="TC" value="1649">(+1649) Turks &amp; Caicos
                                                    Islands

                                                </option>
                                                <option data-countryCode="TV" value="688">(+688) Tuvalu</option>
                                                <option data-countryCode="UG" value="256">(+256) Uganda</option>
                                                <option data-countryCode="UA" value="380">(+380) Ukraine</option>
                                                <option data-countryCode="AE" value="971">(+971) United Arab Emirates
                                                </option>
                                                <option data-countryCode="UY" value="598">(+598) Uruguay</option>
                                                <option data-countryCode="UZ" value="7">(+7) Uzbekistan</option>
                                                <option data-countryCode="VU" value="678">(+678) Vanuatu</option>
                                                <option data-countryCode="VA" value="379">(+379) Vatican City</option>
                                                <option data-countryCode="VE" value="58">(+58) Venezuela</option>
                                                <option data-countryCode="VN" value="84">(+84) Vietnam</option>
                                                <option data-countryCode="VG" value="84">(+1284) Virgin Islands -
                                                    British
                                                </option>
                                                <option data-countryCode="VI" value="84">(+1340) Virgin Islands - US
                                                </option>
                                                <option data-countryCode="WF" value="681">(+681) Wallis &amp; Futuna
                                                </option>
                                                <option data-countryCode="YE" value="969">(+969) Yemen (North)</option>
                                                <option data-countryCode="YE" value="967">(+967) Yemen (South)</option>
                                                <option data-countryCode="ZM" value="260">(+260) Zambia</option>
                                                <option data-countryCode="ZW" value="263">(+263) Zimbabwe</option>
                                            </optgroup>
                                        </select>
                                        {!! Form::text('phone', isset($user->phone) ? $user->phone : old('phone'), ['class' => 'form-control']) !!}
                                    </div>
                                </div>
                                <div class="form-group row">
                                    {!! Form::label('profile_image', __('static.image'), ['class' => 'col-xl-3 col-md-4'], false) !!}
                                    <div class="col-xl-9 col-md-8">
                                        {!! Form::file('profile_image', [
                                            'class' => 'form-control',
                                            'files' => true,
                                            'multiple' => false,
                                        ]) !!}
                                    </div>
                                </div>
                                <div class="col-12 text-end">
                                    {!! Form::submit(__('static.save'), ['class' => 'btn btn-primary']) !!}
                                </div>
                            </div>
                            {!! Form::close() !!}
                        </div>
                        <div class="tab-pane fade {{ $errors->has('new_password') || $errors->has('confirm_password') ? 'active show' : '' }}"
                            id="changepassword" role="tabpanel" aria-labelledby="changepassword-tab">
                            <div class="account-setting">
                                {!! Form::open([
                                    'route' => ['user.password.update', $user->id],
                                    'method' => 'PUT',
                                    'class' => 'needs-validation',
                                ]) !!}
                                <div class="card-body pb-0">
                                    <div class="form-group row">
                                        {!! Form::label('new_password', __('static.user.new_password'), ['class' => 'col-xl-3 col-md-4']) !!}
                                        <div class="col-xl-9 col-md-8">
                                            {!! Form::password('new_password', ['class' => 'form-control']) !!}
                                            @error('new_password')
                                                <span class="invalid-feedback d-block" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        {!! Form::label('confirm_password', __('static.user.confirm_password'), ['class' => 'col-xl-3 col-md-4']) !!}
                                        <div class="col-xl-9 col-md-8">
                                            {!! Form::password('confirm_password', ['class' => 'form-control']) !!}
                                            @error('confirm_password')
                                                <span class="invalid-feedback d-block" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 text-end">
                                        {!! Form::submit(__('static.save'), ['class' => 'btn btn-primary']) !!}
                                    </div>
                                </div>
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
