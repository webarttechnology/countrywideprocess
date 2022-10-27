<x-header-component />
 
 <section class="minbody">
     <div class="agentspg">
         <div class="cmpnyimage wow fadeInDown" data-wow-delay=".10s"><img src="{{ asset('design/images/registration.jpg') }}"></div>
         <div class="pgmincontent pt-4">
             <div class="container">
                 <div class="row justify-content-end">
                     <div class="col-md-6">
                         <div class="cmpnycontentbox wow bounceInDown" data-wow-delay=".6s">
                             <h1 class="d-inline-block display-5 fw-bold mt-3 py-2 mb-3 ">Login</h1>
                            
                            <div id="errmsg" style="color:red; padding-left:5px ">{{ Session::get('errmsg') }}</div>
                            <div id="successmsg" style="color:green; padding-left:5px ">{{ Session::get('successmsg') }}</div>
                            <form  action="{{ url('/login') }}" method='POST' onsubmit=" return valid(); " enctype="multipart/form-data">
                            @csrf 
                                 <div class="row">
                                      
                                    
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label  class="form-label">Email: <small class="text-danger">*</small></label>
                                                <input type="email" class="form-control" id="email_id" name="email_id" aria-describedby="emailHelp" value="{{ old('email_id') }}" placeholder="Email Id">
                                                @if ($errors->has('email_id'))
                                                                    <span class="text-danger">{{ $errors->first('email_id') }}</span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label  class="form-label">Password: <small class="text-danger">*</small></label>
                                                <input type="password" class="form-control" id="password" name="password" aria-describedby="emailHelp" onkeypress="ValidatePassword()" placeholder="Password">
                                                @if ($errors->has('password'))
                                                                    <span class="text-danger">{{ $errors->first('password') }}</span>
                                                @endif
                                                <span id="password_error"></span>
                                            </div>
                                        </div>
                                     </div>
                    
                                 <input type="submit" class="btn btn-primary" value="Login">
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
   
    function valid() {
            var regex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[#$@!%&*?])[A-Za-z\d#$@!%&*?]{7,20}$/;
            var txt = document.getElementById("password");
            if ($("#email_id").val() == '') {
                $("#errmsg").html("Please Enter Email ID!!");
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

    

   
</script>