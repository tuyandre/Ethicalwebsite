@extends('layouts.auth.master')
@section('title','New Member Registration')
@push('css')
@endpush

@section('content')
    <!-- Start main-content -->
    <div class="main-content">

        <section id="home" class="divider parallax layer-overlay" data-bg-img="{{asset('/images/bg/online-registration.jpg')}}">
            <div class="display-table">
                <div class="display-table-cell">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-8 col-md-push-2">
                                <div class="text-center mb-20" style="padding: 0px;margin: 0px"><a href="{{url('/')}}" class=""><img alt="" src="{{asset('/images/logo-wide-white.png')}}" style="height:60px;"></a></div>
                                <div class="bg-lightest border-1px p-25">
                                    <h4 class="text-theme-colored text-uppercase m-0">Become  a part of our consumer Panel</h4>
                                    <div class="line-bottom mb-30"></div>
                                    <div class="add-messages"></div>

                                    <form id="register_form" name="register_form" class="mt-30" method="post" action="{{ route('admin.firstStore') }}">
                                        @csrf
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label for="first_name" class="form-label">First Name</label>
                                                    <input type="text" id="first_name" name="first_name" class="form-control" placeholder="First Name" required>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="last_name" class="form-label">Last Name</label>
                                                    <input type="text" id="last_name" name="last_name" class="form-control" placeholder="Last Name" required>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label for="email" class="form-label">Email</label>
                                                    <input type="email" id="email" name="email" class="form-control" placeholder="Email" required>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="username" class="form-label">Username</label>
                                                    <input type="text" id="username" name="username" class="form-control" placeholder="Username" required autocomplete="false">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">

                                                <div class="col-md-6">
                                                    <label for="phone" class="form-label">Phone</label>
                                                    <input type="number" id="phone" name="phone" class="form-control" placeholder="Phone Number" required>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="dob" class="form-label">Date Of Birth</label>
                                                    <div id="birth-date">
                                                        <div class="input-group date inline-icon">
                                                            <input type="date" name="dob" class="form-control" id="dob" placeholder="Date Of Birth" required><span class="input-group-addon"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">

                                                <div class="col-md-6">
                                                    <label>Gender*</label>
                                                    <select name="gender" class="form-control" id="gender" required>
                                                        <option value="none">Select Gender</option>
                                                        <option value="M" selected>Male</option>
                                                        <option value="F">Female</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="address">Address*</label>
                                                    <input type="text" name="address" class="form-control" id="address" placeholder="Address" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="ctate">Country*</label>
                                                    <select name="country" class="form-control" id="state" required>
                                                        <option value="none">Select Country</option>
                                                        <option value="Afganistan">Afghanistan</option>
                                                        <option value="Albania">Albania</option>
                                                        <option value="Algeria">Algeria</option>
                                                        <option value="American Samoa">American Samoa</option>
                                                        <option value="Andorra">Andorra</option>
                                                        <option value="Angola">Angola</option>
                                                        <option value="Anguilla">Anguilla</option>
                                                        <option value="Antigua & Barbuda">Antigua & Barbuda</option>
                                                        <option value="Argentina">Argentina</option>
                                                        <option value="Armenia">Armenia</option>
                                                        <option value="Aruba">Aruba</option>
                                                        <option value="Australia">Australia</option>
                                                        <option value="Austria">Austria</option>
                                                        <option value="Azerbaijan">Azerbaijan</option>
                                                        <option value="Bahamas">Bahamas</option>
                                                        <option value="Bahrain">Bahrain</option>
                                                        <option value="Bangladesh">Bangladesh</option>
                                                        <option value="Barbados">Barbados</option>
                                                        <option value="Belarus">Belarus</option>
                                                        <option value="Belgium">Belgium</option>
                                                        <option value="Belize">Belize</option>
                                                        <option value="Benin">Benin</option>
                                                        <option value="Bermuda">Bermuda</option>
                                                        <option value="Bhutan">Bhutan</option>
                                                        <option value="Bolivia">Bolivia</option>
                                                        <option value="Bonaire">Bonaire</option>
                                                        <option value="Bosnia & Herzegovina">Bosnia & Herzegovina</option>
                                                        <option value="Botswana">Botswana</option>
                                                        <option value="Brazil">Brazil</option>
                                                        <option value="British Indian Ocean Ter">British Indian Ocean Ter</option>
                                                        <option value="Brunei">Brunei</option>
                                                        <option value="Bulgaria">Bulgaria</option>
                                                        <option value="Burkina Faso">Burkina Faso</option>
                                                        <option value="Burundi">Burundi</option>
                                                        <option value="Cambodia">Cambodia</option>
                                                        <option value="Cameroon">Cameroon</option>
                                                        <option value="Canada">Canada</option>
                                                        <option value="Canary Islands">Canary Islands</option>
                                                        <option value="Cape Verde">Cape Verde</option>
                                                        <option value="Cayman Islands">Cayman Islands</option>
                                                        <option value="Central African Republic">Central African Republic</option>
                                                        <option value="Chad">Chad</option>
                                                        <option value="Channel Islands">Channel Islands</option>
                                                        <option value="Chile">Chile</option>
                                                        <option value="China">China</option>
                                                        <option value="Christmas Island">Christmas Island</option>
                                                        <option value="Cocos Island">Cocos Island</option>
                                                        <option value="Colombia">Colombia</option>
                                                        <option value="Comoros">Comoros</option>
                                                        <option value="Congo">Congo</option>
                                                        <option value="Cook Islands">Cook Islands</option>
                                                        <option value="Costa Rica">Costa Rica</option>
                                                        <option value="Cote DIvoire">Cote DIvoire</option>
                                                        <option value="Croatia">Croatia</option>
                                                        <option value="Cuba">Cuba</option>
                                                        <option value="Curaco">Curacao</option>
                                                        <option value="Cyprus">Cyprus</option>
                                                        <option value="Czech Republic">Czech Republic</option>
                                                        <option value="Denmark">Denmark</option>
                                                        <option value="Djibouti">Djibouti</option>
                                                        <option value="Dominica">Dominica</option>
                                                        <option value="Dominican Republic">Dominican Republic</option>
                                                        <option value="Democratic Republic of Congo">DRC</option>
                                                        <option value="East Timor">East Timor</option>
                                                        <option value="Ecuador">Ecuador</option>
                                                        <option value="Egypt">Egypt</option>
                                                        <option value="El Salvador">El Salvador</option>
                                                        <option value="Equatorial Guinea">Equatorial Guinea</option>
                                                        <option value="Eritrea">Eritrea</option>
                                                        <option value="Estonia">Estonia</option>
                                                        <option value="Ethiopia">Ethiopia</option>
                                                        <option value="Falkland Islands">Falkland Islands</option>
                                                        <option value="Faroe Islands">Faroe Islands</option>
                                                        <option value="Fiji">Fiji</option>
                                                        <option value="Finland">Finland</option>
                                                        <option value="France">France</option>
                                                        <option value="French Guiana">French Guiana</option>
                                                        <option value="French Polynesia">French Polynesia</option>
                                                        <option value="French Southern Ter">French Southern Ter</option>
                                                        <option value="Gabon">Gabon</option>
                                                        <option value="Gambia">Gambia</option>
                                                        <option value="Georgia">Georgia</option>
                                                        <option value="Germany">Germany</option>
                                                        <option value="Ghana">Ghana</option>
                                                        <option value="Gibraltar">Gibraltar</option>
                                                        <option value="Great Britain">Great Britain</option>
                                                        <option value="Greece">Greece</option>
                                                        <option value="Greenland">Greenland</option>
                                                        <option value="Grenada">Grenada</option>
                                                        <option value="Guadeloupe">Guadeloupe</option>
                                                        <option value="Guam">Guam</option>
                                                        <option value="Guatemala">Guatemala</option>
                                                        <option value="Guinea">Guinea</option>
                                                        <option value="Guyana">Guyana</option>
                                                        <option value="Haiti">Haiti</option>
                                                        <option value="Hawaii">Hawaii</option>
                                                        <option value="Honduras">Honduras</option>
                                                        <option value="Hong Kong">Hong Kong</option>
                                                        <option value="Hungary">Hungary</option>
                                                        <option value="Iceland">Iceland</option>
                                                        <option value="Indonesia">Indonesia</option>
                                                        <option value="India">India</option>
                                                        <option value="Iran">Iran</option>
                                                        <option value="Iraq">Iraq</option>
                                                        <option value="Ireland">Ireland</option>
                                                        <option value="Isle of Man">Isle of Man</option>
                                                        <option value="Israel">Israel</option>
                                                        <option value="Italy">Italy</option>
                                                        <option value="Jamaica">Jamaica</option>
                                                        <option value="Japan">Japan</option>
                                                        <option value="Jordan">Jordan</option>
                                                        <option value="Kazakhstan">Kazakhstan</option>
                                                        <option value="Kenya">Kenya</option>
                                                        <option value="Kiribati">Kiribati</option>
                                                        <option value="Korea North">Korea North</option>
                                                        <option value="Korea Sout">Korea South</option>
                                                        <option value="Kuwait">Kuwait</option>
                                                        <option value="Kyrgyzstan">Kyrgyzstan</option>
                                                        <option value="Laos">Laos</option>
                                                        <option value="Latvia">Latvia</option>
                                                        <option value="Lebanon">Lebanon</option>
                                                        <option value="Lesotho">Lesotho</option>
                                                        <option value="Liberia">Liberia</option>
                                                        <option value="Libya">Libya</option>
                                                        <option value="Liechtenstein">Liechtenstein</option>
                                                        <option value="Lithuania">Lithuania</option>
                                                        <option value="Luxembourg">Luxembourg</option>
                                                        <option value="Macau">Macau</option>
                                                        <option value="Macedonia">Macedonia</option>
                                                        <option value="Madagascar">Madagascar</option>
                                                        <option value="Malaysia">Malaysia</option>
                                                        <option value="Malawi">Malawi</option>
                                                        <option value="Maldives">Maldives</option>
                                                        <option value="Mali">Mali</option>
                                                        <option value="Malta">Malta</option>
                                                        <option value="Marshall Islands">Marshall Islands</option>
                                                        <option value="Martinique">Martinique</option>
                                                        <option value="Mauritania">Mauritania</option>
                                                        <option value="Mauritius">Mauritius</option>
                                                        <option value="Mayotte">Mayotte</option>
                                                        <option value="Mexico">Mexico</option>
                                                        <option value="Midway Islands">Midway Islands</option>
                                                        <option value="Moldova">Moldova</option>
                                                        <option value="Monaco">Monaco</option>
                                                        <option value="Mongolia">Mongolia</option>
                                                        <option value="Montserrat">Montserrat</option>
                                                        <option value="Morocco">Morocco</option>
                                                        <option value="Mozambique">Mozambique</option>
                                                        <option value="Myanmar">Myanmar</option>
                                                        <option value="Nambia">Nambia</option>
                                                        <option value="Nauru">Nauru</option>
                                                        <option value="Nepal">Nepal</option>
                                                        <option value="Netherland Antilles">Netherland Antilles</option>
                                                        <option value="Netherlands">Netherlands (Holland, Europe)</option>
                                                        <option value="Nevis">Nevis</option>
                                                        <option value="New Caledonia">New Caledonia</option>
                                                        <option value="New Zealand">New Zealand</option>
                                                        <option value="Nicaragua">Nicaragua</option>
                                                        <option value="Niger">Niger</option>
                                                        <option value="Nigeria">Nigeria</option>
                                                        <option value="Niue">Niue</option>
                                                        <option value="Norfolk Island">Norfolk Island</option>
                                                        <option value="Norway">Norway</option>
                                                        <option value="Oman">Oman</option>
                                                        <option value="Pakistan">Pakistan</option>
                                                        <option value="Palau Island">Palau Island</option>
                                                        <option value="Palestine">Palestine</option>
                                                        <option value="Panama">Panama</option>
                                                        <option value="Papua New Guinea">Papua New Guinea</option>
                                                        <option value="Paraguay">Paraguay</option>
                                                        <option value="Peru">Peru</option>
                                                        <option value="Phillipines">Philippines</option>
                                                        <option value="Pitcairn Island">Pitcairn Island</option>
                                                        <option value="Poland">Poland</option>
                                                        <option value="Portugal">Portugal</option>
                                                        <option value="Puerto Rico">Puerto Rico</option>
                                                        <option value="Qatar">Qatar</option>
                                                        <option value="Republic of Montenegro">Republic of Montenegro</option>
                                                        <option value="Republic of Serbia">Republic of Serbia</option>
                                                        <option value="Reunion">Reunion</option>
                                                        <option value="Romania">Romania</option>
                                                        <option value="Russia">Russia</option>
                                                        <option value="Rwanda">Rwanda</option>
                                                        <option value="St Barthelemy">St Barthelemy</option>
                                                        <option value="St Eustatius">St Eustatius</option>
                                                        <option value="St Helena">St Helena</option>
                                                        <option value="St Kitts-Nevis">St Kitts-Nevis</option>
                                                        <option value="St Lucia">St Lucia</option>
                                                        <option value="St Maarten">St Maarten</option>
                                                        <option value="St Pierre & Miquelon">St Pierre & Miquelon</option>
                                                        <option value="St Vincent & Grenadines">St Vincent & Grenadines</option>
                                                        <option value="Saipan">Saipan</option>
                                                        <option value="Samoa">Samoa</option>
                                                        <option value="Samoa American">Samoa American</option>
                                                        <option value="San Marino">San Marino</option>
                                                        <option value="Sao Tome & Principe">Sao Tome & Principe</option>
                                                        <option value="Saudi Arabia">Saudi Arabia</option>
                                                        <option value="Senegal">Senegal</option>
                                                        <option value="Seychelles">Seychelles</option>
                                                        <option value="Sierra Leone">Sierra Leone</option>
                                                        <option value="Singapore">Singapore</option>
                                                        <option value="Slovakia">Slovakia</option>
                                                        <option value="Slovenia">Slovenia</option>
                                                        <option value="Solomon Islands">Solomon Islands</option>
                                                        <option value="Somalia">Somalia</option>
                                                        <option value="South Africa">South Africa</option>
                                                        <option value="Spain">Spain</option>
                                                        <option value="Sri Lanka">Sri Lanka</option>
                                                        <option value="Sudan">Sudan</option>
                                                        <option value="Suriname">Suriname</option>
                                                        <option value="Swaziland">Swaziland</option>
                                                        <option value="Sweden">Sweden</option>
                                                        <option value="Switzerland">Switzerland</option>
                                                        <option value="Syria">Syria</option>
                                                        <option value="Tahiti">Tahiti</option>
                                                        <option value="Taiwan">Taiwan</option>
                                                        <option value="Tajikistan">Tajikistan</option>
                                                        <option value="Tanzania">Tanzania</option>
                                                        <option value="Thailand">Thailand</option>
                                                        <option value="Togo">Togo</option>
                                                        <option value="Tokelau">Tokelau</option>
                                                        <option value="Tonga">Tonga</option>
                                                        <option value="Trinidad & Tobago">Trinidad & Tobago</option>
                                                        <option value="Tunisia">Tunisia</option>
                                                        <option value="Turkey">Turkey</option>
                                                        <option value="Turkmenistan">Turkmenistan</option>
                                                        <option value="Turks & Caicos Is">Turks & Caicos Is</option>
                                                        <option value="Tuvalu">Tuvalu</option>
                                                        <option value="Uganda">Uganda</option>
                                                        <option value="United Kingdom">United Kingdom</option>
                                                        <option value="Ukraine">Ukraine</option>
                                                        <option value="United Arab Erimates">United Arab Emirates</option>
                                                        <option value="United States of America">United States of America</option>
                                                        <option value="Uraguay">Uruguay</option>
                                                        <option value="Uzbekistan">Uzbekistan</option>
                                                        <option value="Vanuatu">Vanuatu</option>
                                                        <option value="Vatican City State">Vatican City State</option>
                                                        <option value="Venezuela">Venezuela</option>
                                                        <option value="Vietnam">Vietnam</option>
                                                        <option value="Virgin Islands (Brit)">Virgin Islands (Brit)</option>
                                                        <option value="Virgin Islands (USA)">Virgin Islands (USA)</option>
                                                        <option value="Wake Island">Wake Island</option>
                                                        <option value="Wallis & Futana Is">Wallis & Futana Is</option>
                                                        <option value="Yemen">Yemen</option>

                                                        <option value="Zambia">Zambia</option>
                                                        <option value="Zimbabwe">Zimbabwe</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="state">State*</label>

                                                    <input name="state" type="text" class="form-control" id="state" placeholder="State" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="city">City*</label>
                                                    <input name="city" type="text" class="form-control" id="city" placeholder="City" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="postal-code">Postal Code*</label>
                                                    <input name="postal_code" type="text" class="form-control" id="postal-code" placeholder="Postal/PIN Code" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="password">Create Password*</label>
                                                    <input name="password" type="password" class="form-control" id="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" placeholder="Password" required>
                                                    <div id="message" style="display:none">
                                                        <ol>
                                                            <!-- Password must contain the following: -->
                                                            <li id="letter" class="text-danger">Lowercase letter</li>
                                                            <li id="capital" class="text-danger">Uppercase letter</li>
                                                            <li id="number" class="text-danger">Number</li>
                                                            <li id="scharacter" class="text-danger">Special characters</li>
                                                            <li id="length" class="text-danger">Min. 8 Characters</li>
                                                        </ol>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="cpassword">Confirm Password*</label>
                                                    <input name="cpassword" type="password" class="form-control" id="cpassword" placeholder="Confirm Password" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="g-recaptcha" id="rcaptcha" data-sitekey="6LeSzskZAAAAAIFv1_I4qsnz3pjIx1Hpy3Dwnsb1"></div>
                                                <span id="captcha" style="color:red"></span>
                                                <!-- this will show captcha errors -->


                                            </div>
                                            <div class="col-md-6">
                                                <label for="checkedCheckbox" class="si si-checkbox">
                                                    <input type="checkbox" id="agreement"  checked />
                                                    <label for="agreement" class="color-black border-color-red">By Signing Up, You Agree our term of use, Privacy</label>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="add-messages"></div>
                                        <input  type="submit" id="save" class="btn btn btn-theme-colored" value="Join Our panel"></input>
                                    </form>
                                    <script>
                                        $(document).ready(function () {
                                            // Saving

                                            $('#register_form').submit(function (e) {
                                                e.preventDefault();
                                                var form = $(this);



                                                var btn = $('#save');
                                                btn.button('loading');
                                                console.log(form.serialize());
                                                $.ajax({
                                                    url: form.attr('action'),
                                                    method: form.attr('method'),
                                                    data: form.serialize()
                                                }).done(function (data) {
                                                    console.log(data);
                                                    if (data.message=="ok") {
                                                        btn.button('reset');
                                                        form[0].reset();

                                                        $('.add-messages').html('<div class="alert alert-success flat">' +
                                                            '<button type="button" class="close" data-dismiss="alert">&times;</button>' +
                                                            '<strong><i class="glyphicon glyphicon-ok-sign"></i></strong>You are Registered successfully. </div>');

                                                        $(".alert-success").delay(500).show(10, function () {
                                                            $(this).delay(3000).hide(10, function () {
                                                                $(this).remove();
                                                            });
                                                        }); // /.alert
                                                    }
                                                }).fail(function (response) {
                                                    console.log(response.responseJSON);
                                                    btn.button('reset');


                                                    var errors= "";
                                                    errors+="<b>"+response.responseJSON.message+"</b>";
                                                    var data=response.responseJSON.errors;

                                                    $.each(data,function (i, value) {
                                                        console.log(value);
                                                        $.each(value,function (j, values) {
                                                            errors += '<p>' + values + '</p>';
                                                        });
                                                    });
                                                    $('#add-messages').html('<div class="alert alert-danger flat">' +
                                                        '<button type="button" class="close" data-dismiss="alert">&times;</button>' +
                                                        '<strong><i class="glyphicon glyphicon-glyphicon-remove"></i></strong><b>oops:</b>'+errors+'</div>');

                                                    $(".alert-success").delay(5000).show(10, function () {
                                                        $(this).delay(3000).hide(10, function () {
                                                            $(this).remove();
                                                        });
                                                    });




                                                });
                                                return false;
                                            });

                                        });

                                    </script>
                                    <script type="text/javascript">
                                        $(document).ready(function() {
                                            $('.gender').click(function() {
                                                $(this).find('.btn').toggleClass('active');
                                                if ($(this).find('.btn-primary').length>0) {
                                                    $(this).find('.btn').toggleClass('btn-primary');
                                                }
                                                $(this).find('.btn').toggleClass('btn-default');
                                            });
                                        });
                                    </script>

                                    <script type="text/javascript">
                                        var myInput = document.getElementById("password");
                                        var letter = document.getElementById("letter");
                                        var capital = document.getElementById("capital");
                                        var number = document.getElementById("number");
                                        var length = document.getElementById("length");
                                        var scharacter = document.getElementById("scharacter");

                                        // When the user clicks on the password field, show the message box
                                        myInput.onfocus = function() {
                                            document.getElementById("message").style.display = "block";
                                        }
                                        // When the user clicks outside of the password field, hide the message box
                                        myInput.onblur = function() {
                                            document.getElementById("message").style.display = "none";
                                        }

                                        // When the user starts to type something inside the password field
                                        myInput.onkeyup = function() {
                                            // Validate lowercase letters
                                            var lowerCaseLetters = /[a-z]/g;
                                            if (myInput.value.match(lowerCaseLetters)) {
                                                letter.classList.remove("text-danger");
                                                letter.classList.add("text-success");
                                            } else {
                                                letter.classList.remove("text-success");
                                                letter.classList.add("text-danger");
                                            }
                                            // Validate capital letters
                                            var upperCaseLetters = /[A-Z]/g;
                                            if (myInput.value.match(upperCaseLetters)) {
                                                capital.classList.remove("text-danger");
                                                capital.classList.add("text-success");
                                            } else {
                                                capital.classList.remove("text-success");
                                                capital.classList.add("text-danger");
                                            }
                                            // Validate numbers
                                            var numbers = /[0-9]/g;
                                            if (myInput.value.match(numbers)) {
                                                number.classList.remove("text-danger");
                                                number.classList.add("text-success");
                                            } else {
                                                number.classList.remove("text-success");
                                                number.classList.add("text-danger");
                                            }
                                            var specialCharacter = /[^\w\s]/gi;
                                            if (myInput.value.match(specialCharacter)) {
                                                scharacter.classList.remove("text-danger");
                                                scharacter.classList.add("text-success");
                                            } else {
                                                scharacter.classList.remove("text-success");
                                                scharacter.classList.add("text-danger");
                                            }
                                            // Validate length
                                            if (myInput.value.length >= 8) {
                                                length.classList.remove("text-danger");
                                                length.classList.add("text-success");
                                            } else {
                                                length.classList.remove("text-success");
                                                length.classList.add("text-danger");
                                            }
                                        }
                                    </script>

                                    <script>
                                        $(document).ready(function() {
                                            $('#agreement').change(call_all_function);

                                            function call_all_function() {
                                                var agreement = $('#agreement').is(":checked");
                                                if ($('#agreement').is(":checked")) {
                                                    $('.form-inputs').find(':input').prop('disabled', false);
                                                    $('.sumbit-btn').prop('disabled', false);
                                                } else {
                                                    $('.form-inputs').find(':input').prop('disabled', true);
                                                    $('.sumbit-btn').prop('disabled', true);
                                                }
                                            }
                                        });
                                    </script>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>
    <!-- end main-content -->

    <a class="scrollToTop" href="#"><i class="fa fa-angle-up"></i></a>
    </div>
@endsection
@push('js')
@endpush
