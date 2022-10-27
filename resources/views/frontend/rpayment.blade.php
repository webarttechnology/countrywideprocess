<x-header-component />
 
 <section class="minbody">
     <div class="agentspg">
         <div class="cmpnyimage wow fadeInDown" data-wow-delay=".10s"><img src="{{ asset('design/images/registration.jpg') }}"></div>
         <div class="pgmincontent pt-4">
             <div class="container">
                 <div class="row justify-content-end">
                     <div class="col-md-6">
                         <div class="cmpnycontentbox wow bounceInDown" data-wow-delay=".6s">
                             <h1 class="d-inline-block display-5 fw-bold mt-3 py-2 mb-3 ">Add Your Card Details</h1>
                            
                            <div id="errmsg" style="color:red; padding-left:5px ">{{ Session::get('errmsg') }}</div>
                            <div id="successmsg" style="color:green; padding-left:5px ">{{ Session::get('successmsg') }}</div>
                            <form action="{{ URL::to('/payment-getway') }}" method="post" onsubmit=" return valid(); ">
                             @csrf
                                <div class="row">
                                <div class="col-md-6">
                                        <input type="text" class="form-control mb-3" id="cardnumber" name="cardnumber" onkeypress="vaildcardnumber()" placeholder="Card number">
                                        <span id="card_error" style="color:red;"></span>
                                    </div>
                                <input type="hidden" name="name" id="name" value="{{ $registration->name }}">
                                <input type="hidden" name="email_id" id="email_id" value="{{ $registration->email_id }}">
                                <input type="hidden" name="mobile_no" id="mobile_no" value="{{ $registration->mobile_no }}">
                                <input type="hidden" name="customer_id" id="customer_id" value="{{ $registration->id }}">
                                    <div class="col-md-6">
                                        <select class="form-control mb-2" type="number" name="expiry_month" id="expiry_month">
                                            <option disabled="">Expiry Month</option>
                                            <option value="01">01</option>
                                            <option value="02" >02</option>
                                            <option value="03">03</option>
                                            <option value="04">04</option>
                                            <option value="05">05</option>
                                            <option value="06">06</option>
                                            <option value="07">07</option>
                                            <option value="08">08</option>
                                            <option value="09">09</option>
                                            <option value="10">10</option>
                                            <option value="11">11</option>
                                            <option value="12">12</option>
                                        </select>
                                    </div>

                                    <div class="col-md-6">
                                        <select class="form-control mb-2" type="number" name="expiry_year" id="expiry_year">
                                            <option disabled="">Expiry year</option>
                                            <option>2022</option>
                                            <option>2023</option>
                                            <option>2024</option>
                                            <option>2025</option>
                                            <option>2026</option>
                                            <option>2027</option>
                                            <option>2028</option>
                                            <option>2029</option>
                                            <option>2030</option>
                                            <option>2031</option>
                                            <option>2032</option>
                                            <option>2033</option>
                                        </select>
                                    </div>

                                    
                                    <div class="col-md-6">
                                        <input type="text" class="form-control mb-3" id="csv_code" name="csv_code" placeholder="CSV Code">
                                    </div>
                                    <div class="col-md-12">
                                        <input type="text" class="form-control mb-2" id="address" name="address" placeholder="Address">
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <input type="text" class="form-control mb-2" id="city" name="city" placeholder="City">
                                    </div>
                                    
                                    <div class="col-md-6">
                                    <input type="text" class="form-control mb-2" id="country" name="country" placeholder="Country" Value="USA">
                                    </div>
                                    <div class="col-md-6">
                                    <input type="text" class="form-control mb-2" id="state" name="state" placeholder="State">
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control mb-2" id="pincode" name="pincode" placeholder="ZIP Code">
                                    </div>    

                                    <div class="col-md-12">
                                        <input type="submit" class="btn btn-primary d-block fs-5 fw-bold text-center text-uppercase w-100 mt-3" value="Send Request">
                                    </div>
                                
                                </div>
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

function valid(){
        if($("#cardnumber").val() == ''){
            $("#error_msg").html("Card Number must be required!");
            $("#cardnumber").focus();
            return false;
        }else if(isNaN($('#cardnumber').val()) ){
            $('#card_error').html("Card Number must be a Number");
            return false;
        }else if(($('#cardnumber').val().length != 16) ){
            $('#card_error').html("Card Number must be 16 digit");
            $("#cardnumber").focus();
            return false;
        }else if($("#expiry_month").val() == ''){
            $("#error_msg").html("Card Expiry Month must be required!");
            $("#expiry_month").focus();
            return false;
        }else if($("#address").val() == ''){           
            $("#error_msg").html("Address must be required!");
            $("#address").focus();
            return false;           
        }else if($("#city").val() == ''){          
           $("#error_msg").html("City must be required!");
           $("#city").focus();
           return false;     
        }else if($("#country").val() == ''){
            $("#error_msg").html("Country must be required!");
            $("#country").focus();
            return false;
        }else if($("#state").val() == ''){
            $("#error_msg").html("State must be required!");
            $("#state").focus();
            return false;
        }else if($("#pincode").val() == ''){
            $("#error_msg").html("Pincode must be required!");
            $("#pincode").focus();
            return false;
        }
}

</script>

