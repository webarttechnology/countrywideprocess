<x-header-component />
 
 <section class="minbody">
     <div class="agentspg">
         <div class="cmpnyimage wow fadeInDown" data-wow-delay=".10s"><img src="{{ asset('design/images/registration.jpg') }}"></div>
         <div class="pgmincontent pt-4">
             <div class="container">
                 <div class="row justify-content-end">
                     <div class="col-md-6">
                         <div class="cmpnycontentbox wow bounceInDown" data-wow-delay=".6s">
                             <h1 class="d-inline-block display-5 fw-bold mt-3 py-2 mb-3 ">Registration</h1>
                            
                            <div id="errmsg" style="color:red; padding-left:5px ">{{ Session::get('errmsg') }}</div>
                            <div id="successmsg" style="color:green; padding-left:5px ">{{ Session::get('successmsg') }}</div>
                            <form  action="{{ url('/register') }}" method='POST' onsubmit=" return checkregistrationAs(); " enctype="multipart/form-data">
                            @csrf 
                            <h5 class="text-theme">General Information :</h5>
                                 <div class="row">
                                     <div class="col-md-12">
                                         <div class="mb-3">
                                             <label class="form-label">Registration as: <small class="text-danger">*</small></label>
                                             <select type="text" id='registration_as' name="registration_as" class="form-control" onclick="showfirmbarId()">
                                                <option value="">Select a Option</option>
                                                <option value="1" >Party Without Attorney</option>
                                                <option value="2" >Sole Practitioner</option>
                                                <option value="3" >Law Firm</option>
                                            </select>
                                             @if ($errors->has('registration_as'))
                                                                <span class="text-danger">{{ $errors->first('registration_as') }}</span>
                                            @endif
                                         </div>
                                     </div>

                                     <div class="col-md-3" id="div_indOrcoma" style="display:none"><label>Are You?</label></div>                    
                                        <div class="col-md-8" id="div_indOrcom" style="display:none;">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" checked name="areyou" id="individual" value="1" onchange="checkindivisualOrbusiness()" >
                                                <label class="form-check-label" for="inlineRadio1">Individial</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="areyou" id="business" value="2" onchange="checkindivisualOrbusiness()" >
                                                <label class="form-check-label" for="inlineRadio2">Business</label>
                                            </div>
                                         </div>


                                         <div class="col-md-12 business">
                                         <div class="mb-3">
                                             <label  class="form-label">Business Name: <small class="text-danger">*</small> </label>
                                             <input type="text" class="form-control" id="businessNameforWithoutatoney" name="businessNameforWithoutatoney" placeholder="Business Name" aria-describedby="emailHelp" value="{{old('businessNameforWithoutatoney')}}">
                                             @if ($errors->has('businessNameforWithoutatoney'))
                                                                <span class="text-danger">{{ $errors->first('businessNameforWithoutatoney') }}</span>
                                             @endif
                                            </div>
                                     </div>
                                    
                                            
                                    
                                     <div class="col-md-4 personname">
                                         <div class="mb-3">
                                             <label  class="form-label">First Name: <small class="text-danger">*</small> </label>
                                             <input type="text" class="form-control" id="fname" name="fname" placeholder="First Name" aria-describedby="emailHelp" value="{{old('fname')}}">
                                             @if ($errors->has('fname'))
                                                                <span class="text-danger">{{ $errors->first('fname') }}</span>
                                             @endif
                                            </div>
                                     </div>

                                     <div class="col-md-4 personname">
                                         <div class="mb-3">
                                             <label  class="form-label">Middle Name:  </label>
                                             <input type="text" class="form-control" id="mname" name="mname" placeholder="Middle Name" aria-describedby="emailHelp" value="{{old('mname')}}">
                                             @if ($errors->has('mname'))
                                                                <span class="text-danger">{{ $errors->first('mname') }}</span>
                                             @endif
                                            </div>
                                     </div>

                                     <div class="col-md-4 personname">
                                         <div class="mb-3">
                                             <label  class="form-label">Last Name: <small class="text-danger">*</small> </label>
                                             <input type="text" class="form-control" id="lname" name="lname" placeholder="Last Name" aria-describedby="emailHelp" value="{{old('lname')}}">
                                             @if ($errors->has('lname'))
                                                                <span class="text-danger">{{ $errors->first('lname') }}</span>
                                             @endif
                                            </div>
                                     </div>

                                     <div class="col-md-12 company">
                                         <div class="mb-3">
                                             <label  class="form-label">Company Name: <small class="text-danger">*</small> </label>
                                             <input type="text" class="form-control" id="company" name="company" placeholder="Company Name" aria-describedby="emailHelp" value="{{old('company')}}">
                                             @if ($errors->has('lname'))
                                                                <span class="text-danger">{{ $errors->first('lname') }}</span>
                                             @endif
                                            </div>
                                     </div>
                                    
                                     <div class="col-md-12">
                                         <div class="mb-3">
                                             <label  class="form-label">Email: <small class="text-danger">*</small></label>
                                             <input type="email" class="form-control" id="email_id" name="email_id" placeholder="Email" aria-describedby="emailHelp"  value="{{ old('email_id') }}">
                                             @if ($errors->has('email_id'))
                                                                <span class="text-danger">{{ $errors->first('email_id') }}</span>
                                             @endif
                                         </div>
                                     </div>

                                     <div class="col-md-6">
                                         <div class="mb-3">
                                             <label  class="form-label">Password: <small class="text-danger">*</small></label>
                                             <input type="password" class="form-control" id="password" name="password" placeholder="Password" aria-describedby="emailHelp" placeholder="Password" onkeypress="ValidatePassword()">
                                             @if ($errors->has('password'))
                                                                <span class="text-danger">{{ $errors->first('password') }}</span>
                                             @endif
                                             <span id="password_error"></span>
                                         </div>
                                     </div>

                                     <div class="col-md-6">
                                         <div class="mb-3">
                                             <label  class="form-label">Password Confirm: <small class="text-danger">*</small></label>
                                             <input type="password" class="form-control" id="con_password" name="con_password" placeholder="Confirm Password" aria-describedby="emailHelp" onkeypress="ValidateConPassword()" >
                                             @if ($errors->has('con_password'))
                                                                <span class="text-danger">{{ $errors->first('con_password') }}</span>
                                             @endif
                                             <span id="con_password_error"></span>
                                         </div>
                                     </div>

                                     <div class="col-md-12">
                                         <div class="mb-3">
                                             <label  class="form-label">Phone: <small class="text-danger">*</small></label>
                                             <input type="number" class="form-control" id="mobile_no" name="mobile_no" aria-describedby="emailHelp" placeholder="Mobile No" value="{{old('mobile_no')}}" >
                                             @if ($errors->has('mobile_no'))
                                                                <span class="text-danger">{{ $errors->first('mobile_no') }}</span>
                                             @endif
                                         </div>
                                     </div>

                                     <div class="col-md-12">
                                         <div class="mb-3">
                                             <label  class="form-label">Address Type: <small class="text-danger">*</small></label>
                                             <select type="text" class="form-control" id="address_type" name="address_type" aria-describedby="emailHelp" value="{{old('address_type')}}" onclick="businessNameShoworNot()" >
                                                 <option value="">Select A Address Type</option>
                                                 <option value="Residence">Residence</option>
                                                 <option value="Business">Business</option>
                                             </select>
                                             @if ($errors->has('address_type'))
                                                                <span class="text-danger">{{ $errors->first('address_type') }}</span>
                                             @endif
                                         </div>
                                     </div>

                                     <div class="col-md-12">
                                         <div class="mb-3">
                                             <label  class="form-label">Address: <small class="text-danger">*</small></label>
                                             <input type="text" class="form-control" id="address_atoney" name="address_atoney" aria-describedby="emailHelp" value="{{old('address_atoney')}}" placeholder="Address" >
                                             @if ($errors->has('address_atoney'))
                                                                <span class="text-danger">{{ $errors->first('address_atoney') }}</span>
                                             @endif
                                         </div>
                                     </div>

                                     <div class="col-md-6">
                                         <div class="mb-3">
                                             <label  class="form-label">Unit or Suite(Optional): </label>
                                             <input type="text" class="form-control" id="unit" name="unit" aria-describedby="emailHelp" value="{{old('unit')}}" placeholder="Unit or Suite" >
                                             @if ($errors->has('unit'))
                                                                <span class="text-danger">{{ $errors->first('unit') }}</span>
                                             @endif
                                         </div>
                                     </div>

                                     <div class="col-md-6">
                                         <div class="mb-3">
                                             <label  class="form-label">City: <small class="text-danger">*</small> </label>
                                             <input type="text" class="form-control" id="city" name="city" aria-describedby="emailHelp" value="{{old('city')}}" placeholder="City" >
                                             @if ($errors->has('city'))
                                                                <span class="text-danger">{{ $errors->first('city') }}</span>
                                             @endif
                                         </div>
                                     </div>

                                     <div class="col-md-6">
                                         <div class="mb-3">
                                             <label  class="form-label">State: <small class="text-danger">*</small> </label>
                                             <input type="text" class="form-control" id="state" name="state" aria-describedby="emailHelp" value="{{old('state')}}" placeholder="State" >
                                             @if ($errors->has('state'))
                                                                <span class="text-danger">{{ $errors->first('state') }}</span>
                                             @endif
                                         </div>
                                     </div>

                                     <div class="col-md-6">
                                         <div class="mb-3">
                                             <label  class="form-label">Zip Code: <small class="text-danger">*</small> </label>
                                             <input type="text" class="form-control" id="zipcode" name="zipcode" aria-describedby="emailHelp" value="{{old('zipcode')}}" placeholder="Zip Code" >
                                             @if ($errors->has('zipcode'))
                                                                <span class="text-danger">{{ $errors->first('zipcode') }}</span>
                                             @endif
                                         </div>
                                     </div>

                                     <div class="col-md-12" id="div_business" style="display:none">
                                         <div class="mb-3">
                                             <label  class="form-label">Business Name: <small class="text-danger">*</small> </label>
                                             <input type="text" class="form-control" id="business_name" name="business_name" aria-describedby="emailHelp" placeholder="Business Name" value="{{old('business_name')}}" >
                                             @if ($errors->has('business_name'))
                                                                <span class="text-danger">{{ $errors->first('business_name') }}</span>
                                             @endif
                                         </div>
                                     </div>

                                     <div class="col-md-6 lawfirm">
                                         <div class="mb-3">
                                             <label  class="form-label">Primary Billing Name:<small class="text-danger">*</small></label>
                                             <input type="text" class="form-control" id="billing_name" name="billing_name" aria-describedby="emailHelp" placeholder="Primary Billing Name" value="{{old('billing_name')}}">
                                            
                                         </div>
                                     </div>

                                     <div class="col-md-6 lawfirm">
                                         <div class="mb-3">
                                             <label  class="form-label">Primary Billing Email:<small class="text-danger">*</small></label>
                                             <input type="email" class="form-control" id="billing_email" name="billing_email" aria-describedby="emailHelp" placeholder="Primary Billing Email" value="{{old('billing_email')}}">
                                            
                                         </div>
                                     </div>

                                     <div class="col-md-6 lawfirm">
                                         <div class="mb-3">
                                             <label  class="form-label">Primary Billing Phone:<small class="text-danger">*</small></label>
                                             <input type="text" class="form-control" id="billing_phone" name="billing_phone" aria-describedby="emailHelp" placeholder="Primary Billing Phone" value="{{old('billing_phone')}}">
                                            
                                         </div>
                                     </div>

                                     <div class="col-md-6 lawfirm" >
                                         <div class="mb-3">
                                             <label  class="form-label">Billing Address:<small class="text-danger">*</small></label>
                                             <input type="text" class="form-control" id="billing_address" name="billing_address" aria-describedby="emailHelp" placeholder="Address" value="{{old('billing_address')}}">
                                            
                                         </div>
                                     </div>

                                     <div class="col-md-6 firm" id="div_firm" >
                                         <div class="mb-3">
                                             <label  class="form-label">Firm name (optional):</label>
                                             <input type="text" class="form-control" id="firm_name" name="firm_name" aria-describedby="emailHelp" placeholder="Firm Name" value="{{old('firm_name')}}">
                                            
                                         </div>
                                     </div>
                                     <div class="col-md-6 firm"  id="div_barId">
                                         <div class="mb-3">
                                             <label  class="form-label">Bar ID: <small class="text-danger">*</small></label>
                                             <input type="text" class="form-control" id="bar_id" name="bar_id" aria-describedby="emailHelp" placeholder="Bar ID" value="{{old('bar_id')}}">
                                             @if ($errors->has('bar_id'))
                                                                <span class="text-danger">{{ $errors->first('bar_id') }}</span>
                                             @endif
                                         </div>
                                     </div>

                                 </div>
                    
                                 <input type="submit" class="btn btn-primary" value="Submit">
                             </form>
                            
                         </div>
                     </div>
                 </div>
             </div>
         </div>
         
     </div>
 </section>

<x-footer-component />

<script>

$( document ).ready(function() {
    // $('.atoney').hide();
    $('.firm').hide();
    $('.lawfirm').hide();
    $('.company').hide();
    $('.business').hide();
});
function checkregistrationAs(){
        registrationAs = $('#registration_as').val();
        if(registrationAs == 2){
            return validforattorney();
        }else if(registrationAs == 3){ 
            return validationforlawfirm();
        }else{
            return validforindividual();
        }
}
    
function validforindividual() {
    var regex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[#$@!%&*?])[A-Za-z\d#$@!%&*?]{7,20}$/;
    var txt = document.getElementById("password");
    var con_psw = document.getElementById("con_password");
            if ($("#registration_as").val() == '') {
                $("#errmsg").html("Please Select a Option For Regstration As!!");
                //$("#email").css("border-color", "red");
                $("#registration_as").focus();
                return false;
            } else if ($("#fname").val() == '' && $("#individual").is(":checked") == true ) {
                $("#errmsg").html("Please Enter First Name!! ");
                //$("#email").css("border-color", "red");
                $("#fname").focus();
                return false;
            }else if ($("#lname").val() == '' && $("#individual").is(":checked") == true) {
                $("#errmsg").html("Please Enter Last Name!! ");
                //$("#email").css("border-color", "red");
                $("#lname").focus();
                return false;
            }else if ($("#businessNameforWithoutatoney").val() == '' && $("#business").is(":checked") == true) {
                $("#errmsg").html("Please Enter Business Name!! ");
                //$("#email").css("border-color", "red");
                $("#businessNameforWithoutatoney").focus();
                return false;
            }else if ($("#email_id").val() == '') {
                $("#errmsg").html("Please Enter Email ID!!");
                //$("#email").css("border-color", "red");
                $("#email_id").focus();
                return false;
            }else if ($("#password").val() == '') {
                $("#errmsg").html("Please Enter Password!!");
                $("#password").focus();
                return false;
            }else if (!regex.test(txt.value)) {
                    $("#password_error").html('Password strength is not good').css('color',"red");
                    $("#password").focus();
                    return false;
            }else if ($("#con_password").val() == '') {
                $("#errmsg").html("Please Enter Confirm Password!!");
                //$("#email").css("border-color", "red");
                $("#con_password").focus();
                return false;
            }else if (!regex.test(con_psw.value)) {
                $("#con_password_error").html('Password strength is not good').css('color',"red");
                $("#con_password").focus();
                return false;
            }else if ($("#mobile_no").val() == '') {
                $("#errmsg").html("Please Enter Mobile Number!!");
                //$("#email").css("border-color", "red");
                $("#mobile_no").focus();
                return false;
            }else if ($("#address_type").val() == '') {
                $("#errmsg").html("Please Enter Address Type!!");
                //$("#email").css("border-color", "red");
                $("#address_type").focus();
                return false;
            }else if ($("#address_atoney").val() == '') {
                $("#errmsg").html("Please Enter Sole Practitioner Address!!");
                //$("#email").css("border-color", "red");
                $("#address_atoney").focus();
                return false;
            }else if ($("#city").val() == '') {
                $("#errmsg").html("Please Enter City!!");
                //$("#email").css("border-color", "red");
                $("#city").focus();
                return false;
            }else if ($("#state").val() == '') {
                $("#errmsg").html("Please Enter State!!");
                //$("#email").css("border-color", "red");
                $("#state").focus();
                return false;
            }else if ($("#zipcode").val() == '') {
                $("#errmsg").html("Please Enter Zipcode!!");
                //$("#email").css("border-color", "red");
                $("#zipcode").focus();
                return false;
            }else if ($("#address_type").val() == 'Business' && $('#business_name').val() == '') {
                $("#errmsg").html("Please Enter Business Name!!");
                //$("#email").css("border-color", "red");
                $("#business_name").focus();
                return false;
            }
}

function validforattorney(){
    var regex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[#$@!%&*?])[A-Za-z\d#$@!%&*?]{7,20}$/;
    var txt = document.getElementById("password");
    var con_psw = document.getElementById("con_password");
  
        if ($("#registration_as").val() == '') {
                $("#errmsg").html("Please Select a Option For Regstration As!!");
                //$("#email").css("border-color", "red");
                return false;
            } else if ($("#fname").val() == '') {
                $("#errmsg").html("Please Enter First Name!! ");
                //$("#email").css("border-color", "red");
                $("#fname").focus();
                return false;
            }else if ($("#lname").val() == '') {
                $("#errmsg").html("Please Enter Last Name!! ");
                //$("#email").css("border-color", "red");
                $("#lname").focus();
                return false;
            }else if ($("#email_id").val() == '') {
                $("#errmsg").html("Please Enter Email ID!!");
                //$("#email").css("border-color", "red");
                return false;
            }else if ($("#password").val() == '') {
                $("#errmsg").html("Please Enter Password!!");
                $("#password").focus();
                return false;
            }else if (!regex.test(txt.value)) {
                    $("#password_error").html('Password strength is not good').css('color',"red");
                    $("#password").focus();
                    return false;
            }else if ($("#con_password").val() == '') {
                $("#errmsg").html("Please Enter Confirm Password!!");
                //$("#email").css("border-color", "red");
                $("#con_password").focus();
                return false;
            }else if (!regex.test(con_psw.value)) {
                $("#con_password_error").html('Password strength is not good').css('color',"red");
                $("#con_password").focus();
                return false;
            }else if ($("#mobile_no").val() == '') {
                $("#errmsg").html("Please Enter Mobile Number!!");
                //$("#email").css("border-color", "red");
                return false;
            }else if ($("#address_type").val() == '') {
                $("#errmsg").html("Please Enter Address Type!!");
                //$("#email").css("border-color", "red");
                $("#address_type").focus();
                return false;
            }else if ($("#address_atoney").val() == '') {
                $("#errmsg").html("Please Enter Sole Practitioner Address!!");
                //$("#email").css("border-color", "red");
                $("#address_atoney").focus();
                return false;
            }else if ($("#city").val() == '') {
                $("#errmsg").html("Please Enter City!!");
                //$("#email").css("border-color", "red");
                $("#city").focus();
                return false;
            }else if ($("#state").val() == '') {
                $("#errmsg").html("Please Enter State!!");
                //$("#email").css("border-color", "red");
                $("#state").focus();
                return false;
            }else if ($("#zipcode").val() == '') {
                $("#errmsg").html("Please Enter Zipcode!!");
                //$("#email").css("border-color", "red");
                $("#zipcode").focus();
                return false;
            }else if ($("#address_type").val() == 'Business' && $("#business_name").val() == '') {
                $("#errmsg").html("Please Enter Business Name!!");
                //$("#email").css("border-color", "red");
                $("#business_name").focus();
                return false;
            }else if ($("#bar_id").val() == '') {
                $("#errmsg").html("Please Enter Bar ID!!");
                //$("#email").css("border-color", "red");
                $("#bar_id").focus();
                return false;
            }

}

function validationforlawfirm(){
    var regex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[#$@!%&*?])[A-Za-z\d#$@!%&*?]{7,20}$/;
    var txt = document.getElementById("password");
    var con_psw = document.getElementById("con_password");
    if ($("#registration_as").val() == '') {
                $("#errmsg").html("Please Select a Option For Regstration As!!");
                //$("#email").css("border-color", "red");
                return false;
            } else if ($("#company").val() == '') {
                $("#errmsg").html("Please Enter Company Name!! ");
                //$("#email").css("border-color", "red");
                $("#company").focus();
                return false;
            }else if ($("#email_id").val() == '') {
                $("#errmsg").html("Please Enter Email ID!!");
                //$("#email").css("border-color", "red");
                return false;
            }else if ($("#password").val() == '') {
                $("#errmsg").html("Please Enter Password!!");
                $("#password").focus();
                return false;
            }else if (!regex.test(txt.value)) {
                    $("#password_error").html('Password strength is not good').css('color',"red");
                    $("#password").focus();
                    return false;
            }else if ($("#con_password").val() == '') {
                $("#errmsg").html("Please Enter Confirm Password!!");
                //$("#email").css("border-color", "red");
                $("#con_password").focus();
                return false;
            }else if (!regex.test(con_psw.value)) {
                $("#con_password_error").html('Password strength is not good').css('color',"red");
                $("#con_password").focus();
                return false;
            }else if ($("#mobile_no").val() == '') {
                $("#errmsg").html("Please Enter Mobile Number!!");
                //$("#email").css("border-color", "red");
                return false;
            }else if ($("#address_type").val() == '') {
                $("#errmsg").html("Please Enter Address Type!!");
                //$("#email").css("border-color", "red");
                $("#address_type").focus();
                return false;
            }else if ($("#address_atoney").val() == '') {
                $("#errmsg").html("Please Enter Sole Practitioner Address!!");
                //$("#email").css("border-color", "red");
                $("#address_atoney").focus();
                return false;
            }else if ($("#city").val() == '') {
                $("#errmsg").html("Please Enter City!!");
                //$("#email").css("border-color", "red");
                $("#city").focus();
                return false;
            }else if ($("#state").val() == '') {
                $("#errmsg").html("Please Enter State!!");
                //$("#email").css("border-color", "red");
                $("#state").focus();
                return false;
            }else if ($("#zipcode").val() == '') {
                $("#errmsg").html("Please Enter Zipcode!!");
                //$("#email").css("border-color", "red");
                $("#zipcode").focus();
                return false;
            }else if ($("#address_type").val() == 'Business' && $("#business_name").val() == '') {
                $("#errmsg").html("Please Enter Business Name!!");
                //$("#email").css("border-color", "red");
                $("#business_name").focus();
                return false;
            }else if ($("#billing_name").val() == '') {
                $("#errmsg").html("Please Enter Billing Name!!");
                //$("#email").css("border-color", "red");
                $("#billing_name").focus();
                return false;
            }else if ($("#billing_email").val() == '') {
                $("#errmsg").html("Please Enter Billing Email!!");
                //$("#email").css("border-color", "red");
                $("#billing_email").focus();
                return false;
            }else if ($("#billing_phone").val() == '') {
                $("#errmsg").html("Please Enter Billing Phone!!");
                //$("#email").css("border-color", "red");
                $("#billing_phone").focus();
                return false;
            }else if ($("#billing_address").val() == '') {
                $("#errmsg").html("Please Enter Billing Address!!");
                //$("#email").css("border-color", "red");
                $("#billing_address").focus();
                return false;
            }
}

function showfirmbarId(){
        registrationAs = $('#registration_as').val();
        if(registrationAs == 2){
            $('.firm').show();
            $('#div_indOrcoma').hide();
            $('#div_indOrcom').hide();
            $('.lawfirm').hide();
            // $('.atoney').show();
            $('.company').hide();
            $('.personname').show();
            $('.business').hide();

        }else if(registrationAs == 3){
            $('.lawfirm').show();
            // $('.atoney').hide();
            $('#div_indOrcoma').hide();
            $('#div_indOrcom').hide();
            $('.firm').hide();
            $('#div_business').hide();
            $('.company').show();
            $('.personname').hide();
            $('.business').hide();
        }else{
            $('.firm').hide();
            $('#div_indOrcoma').show();
            $('#div_indOrcom').show();
            $('.lawfirm').hide();
            // $('.atoney').hide();
            $('#div_business').hide();
            $('.company').hide();
            $('.personname').show();
        }
        
}

function checkindivisualOrbusiness(){
    if($("#individual").is(":checked") == true){
        $('.business').hide();
        $('.personname').show();
    }else if($("#business").is(":checked") == true){
        $('.business').show();
        $('.personname').hide();
    }
}

function businessNameShoworNot(){
       var addressType =  $('#address_type').val();
       if(addressType == "Business"){
          $('#div_business').show();
       }else{
          $('#div_business').hide();
       }
}


function ValidatePassword() {
        var regex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[#$@!%&*?])[A-Za-z\d#$@!%&*?]{7,20}$/;
        var txt = document.getElementById("password");
        lengthcheck =$('#password').val();
        if (!regex.test(txt.value)) {
            $("#password_error").html('Password strength is not good').css('color',"red");
            $("#password").focus()
            // alert("Password strength is not good.");
        } else {
            $("#password_error").html('Password strength is good').css('color',"green");
            //alert("Password strength is good.");
        }
    }

function ValidateConPassword(){
    var regex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[#$@!%&*?])[A-Za-z\d#$@!%&*?]{7,20}$/;
        var txt = document.getElementById("con_password");
        lengthcheck =$('#con_password').val();
        if (!regex.test(txt.value) ) {
            $("#con_password_error").html('Password strength is not good').css('color',"red");
            $("#con_password").focus()
        } else {
            $("#con_password_error").html('Password strength is good').css('color',"green");
            //alert("Password strength is good.");
        }
}
</script>