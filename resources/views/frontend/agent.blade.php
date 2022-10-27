<x-header-component />
 
 <section class="minbody">
     <div class="agentspg">
         <div class="cmpnyimage wow fadeInDown" data-wow-delay=".10s"><img src="{{ asset('design/images/registration.jpg') }}"></div>
         <div class="pgmincontent pt-4">
             <div class="container">
                 <div class="row justify-content-end">
                     <div class="col-md-6">
                         <div class="cmpnycontentbox wow bounceInDown" data-wow-delay=".6s">
                             <h1 class="d-inline-block display-5 fw-bold mt-3 py-2 mb-3 ">Agents Registration</h1>
                            
                            <p>Are you looking to becoming an Agent with Countrywide Process, LLC? Please fill out the below form and one of our Representatives will contact you with more information. Thank you.</p>
                            <div id="errmsg" style="color:red; padding-left:5px ">{{ Session::get('errmsg') }}</div>
                            <div id="successmsg" style="color:green; padding-left:5px ">{{ Session::get('successmsg') }}</div>
                            <form  action="{{ url('/agent') }}" method='POST' onsubmit=" return valid(); " enctype="multipart/form-data">
                            @csrf 
                            <h5 class="text-theme">General Information :</h5>
                                 <div class="row">
                                     <div class="col-md-12">
                                         <div class="mb-3">
                                             <label for="exampleInputEmail1" class="form-label">Registration Jurisdiction (City or County): <small class="text-danger">*</small></label>
                                             <select id='selCounty' name="country_id" class="form-select">
                                                <option value="" selected>Select Your County</option>
                                                @foreach($country as $item)
                                                    <option value="{{ $item ->code }}" {{ $item->code == old('country_id')?"Selected":'' }}>{{ $item->name }}</option>
                                                @endforeach

                                            </select>
                                             @if ($errors->has('country_id'))
                                                                <span class="text-danger">{{ $errors->first('country_id') }}</span>
                                            @endif
                                         </div>
                                     </div>
                                     <div class="col-md-12">
                                         <div class="mb-3">
                                             <label for="exampleInputEmail1" class="form-label">Badge / License / Registration Number (if applicable) </label>
                                             <input type="text" class="form-control" id="badge_no" name="badge_no" aria-describedby="emailHelp" value="{{old('badge_no')}}" Placeholder="Badge / License / Registration Number (if applicable)">
                                           
                                            </div>
                                     </div>
                                     <div class="col-md-6">
                                         <div class="mb-3">
                                             <label for="exampleInputEmail1" class="form-label">First Name <small class="text-danger">*</small></label>
                                             <input type="text" class="form-control" id="fname" name="fname" aria-describedby="emailHelp" value="{{ old('fname') }}" placeholder="First Name">
                                             @if ($errors->has('fname'))
                                                                <span class="text-danger">{{ $errors->first('fname') }}</span>
                                             @endif
                                         </div>
                                     </div>
                                     <div class="col-md-6">
                                         <div class="mb-3">
                                             <label for="exampleInputEmail1" class="form-label">Last Name <small class="text-danger">*</small></label>
                                             <input type="text" class="form-control" id="lname" name="lname" aria-describedby="emailHelp" value="{{ old('lname') }}" placeholder="Last Name">
                                             @if ($errors->has('lname'))
                                                                <span class="text-danger">{{ $errors->first('lname') }}</span>
                                             @endif
                                         </div>
                                     </div>
                                     <div class="col-md-12">
                                         <div class="mb-3">
                                             <label for="exampleInputEmail1" class="form-label">Email <small class="text-danger">*</small></label>
                                             <input type="email" class="form-control" id="email_id" name="email_id" aria-describedby="emailHelp" value="{{ old('email_id') }}" placeholder="Email">
                                             @if ($errors->has('email_id'))
                                                                <span class="text-danger">{{ $errors->first('email_id') }}</span>
                                             @endif
                                         </div>
                                     </div>

                                     <div class="col-md-12">
                                         <div class="mb-3">
                                             <label for="exampleInputEmail1" class="form-label">Company/ Business Name  <small class="text-danger">*</small></label>
                                             <input type="text" class="form-control" id="company" name="company" aria-describedby="emailHelp" value="{{ old('company') }}" placeholder="Company/ Business Name">
                                             @if ($errors->has('company'))
                                                                <span class="text-danger">{{ $errors->first('company') }}</span>
                                             @endif
                                         </div>
                                     </div>
                                 </div>
                                 <h5 class="text-theme">Contact Information :</h5>
                                 <div class="row">
                                     <div class="col-md-12">
                                         <div class="mb-3">
                                             <label for="exampleInputEmail1" class="form-label">Address1 <small class="text-danger">*</small></label>
                                             <input type="text" class="form-control" id="address1" name="address1" aria-describedby="emailHelp" value="{{ old('address1') }}" Placeholder="Address1">
                                             @if ($errors->has('address1'))
                                                                <span class="text-danger">{{ $errors->first('address1') }}</span>
                                             @endif
                                         </div>
                                     </div>
                                     <div class="col-md-12">
                                         <div class="mb-3">
                                             <label for="exampleInputEmail1" class="form-label">Address2</label>
                                             <input type="text" class="form-control" id="address2" name="address2" aria-describedby="emailHelp" value="{{ old('address2') }}" placeholder="Address2">

                                         </div>
                                     </div>
                                     <div class="col-md-4">
                                         <div class="mb-3">
                                             <label for="exampleInputEmail1" class="form-label">City <small class="text-danger">*</small></label>
                                             <input type="text" class="form-control" id="city" name="city" aria-describedby="emailHelp" value="{{ old('city') }}" placeholder="City">
                                             @if ($errors->has('city'))
                                                                <span class="text-danger">{{ $errors->first('city') }}</span>
                                             @endif
                                         </div>
                                     </div>
                                     <div class="col-md-4">
                                         <div class="mb-3">
                                             <label for="exampleInputEmail1" class="form-label">State <small class="text-danger">*</small></label>
                                             <input type="text" class="form-control" id="state" name="state" aria-describedby="emailHelp" value="{{ old('state') }}" placeholder="State">
                                             @if ($errors->has('state'))
                                                                <span class="text-danger">{{ $errors->first('state') }}</span>
                                             @endif
                                         </div>
                                     </div>
                                     <div class="col-md-4">
                                         <div class="mb-3">
                                             <label for="exampleInputEmail1" class="form-label">Zip <small class="text-danger">*</small></label>
                                             <input type="text" class="form-control" id="pincode" name="pincode" aria-describedby="emailHelp" value="{{ old('pincode') }}" placeholder="Zip">
                                             @if ($errors->has('pincode'))
                                                                <span class="text-danger">{{ $errors->first('pincode') }}</span>
                                             @endif
                                         </div>
                                     </div>
                                     <div class="col-md-6">
                                         <div class="mb-3">
                                             <label for="exampleInputEmail1" class="form-label">Phone <small class="text-danger">*</small></label>
                                             <input type="text" class="form-control" id="mobile_no" name="mobile_no" aria-describedby="emailHelp" value="{{ old('mobile_no') }}" placeholder="Phone">
                                             @if ($errors->has('mobile_no'))
                                                                <span class="text-danger">{{ $errors->first('mobile_no') }}</span>
                                             @endif
                                         </div>
                                     </div>
                                     <div class="col-md-6">
                                         <div class="mb-3">
                                             <label for="exampleInputEmail1" class="form-label">Fax </label>
                                             <input type="text" class="form-control" id="fax_no" name="fax_no" aria-describedby="emailHelp" value="{{ old('fax_no') }}" placeholder="Fax No">
                                         </div>
                                     </div>
                                 </div>
                                 <h5 class="text-theme">Experience :</h5>
                                 <div class="row">
                                     <div class="col-md-12">
                                         <div class="mb-3">
                                             <label for="exampleInputEmail1" class="form-label">Years of Experience <small class="text-danger">*</small></label>
                                             <input type="text" class="form-control" id="yoe" name="yoe" aria-describedby="emailHelp" value="{{ old('yoe') }}" placeholder="Years of Experienc">
                                             @if ($errors->has('yoe'))
                                                                <span class="text-danger">{{ $errors->first('yoe') }}</span>
                                             @endif
                                         </div>
                                     </div>
                                     <div class="col-md-12">
                                         <div class="mb-3">
                                             <label for="exampleFormControlTextarea1" class="form-label">Past Experience</label>
                                             <textarea class="form-control" id="past_experience" name="past_experience" rows="3" placeholder="Past Experience">{{ old('past_experience') }}</textarea>
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
<div class="content-main-arrow left ng-scope" >
 <a class="content-arrow-trigger" href="{{ URL::to('testimonials') }}">
     <div class="info-wrapper">
         <div  class="thumb ng-isolate-scope" style="background-image: url(/design/images/testimo-menu-img.jpg); background-size: cover; background-repeat: no-repeat; background-position: 57% 48%;"></div>
         <strong>Previous</strong>
         <span class="ng-binding">Testimonial</span>
     </div>
     <div class="pointer"></div>
 </a>
</div>
<div class="content-main-arrow right ng-scope">
 <a class="content-arrow-trigger"  href="{{ URL::to('blog') }}">
     <div class="info-wrapper">
         <div class="thumb ng-isolate-scope" style="background-image: url(/design/images/blog-menu-img.jpg); background-size: cover; background-repeat: no-repeat; background-position: 50% 50%;"></div>
         <strong>Next</strong>
         <span class="ng-binding">Blog</span>
     </div>
     <div class="pointer"></div>
 </a>
</div>
<x-footer-component />

<script>
    function valid() {
            if ($("#selCounty").val() == '') {
                $("#errmsg").html("Please Select A Country!!");
                //$("#email").css("border-color", "red");
                return false;
            } else if ($("#fname").val() == '') {
                $("#errmsg").html("Please Enter Fast Name!! ");
                //$("#email").css("border-color", "red");
                return false;
            }else if ($("#lname").val() == '') {
                $("#errmsg").html("Please Enter Last Name!!");
                //$("#email").css("border-color", "red");
                return false;
            }else if ($("#email_id").val() == '') {
                $("#errmsg").html("Please Enter Email ID!!");
                //$("#email").css("border-color", "red");
                return false;
            }else if ($("#company").val() == '') {
                $("#errmsg").html("Please Enter Company/ Business Name!!");
                //$("#email").css("border-color", "red");
                return false;
            }else if ($("#address1").val() == '') {
                $("#errmsg").html("Please Enter Address1!!");
                //$("#email").css("border-color", "red");
                return false;
            }else if ($("#city").val() == '') {
                $("#errmsg").html("Please Enter City Name!!");
                //$("#email").css("border-color", "red");
                return false;
            }else if ($("#state").val() == '') {
                $("#errmsg").html("Please Enter State Name!!");
                //$("#email").css("border-color", "red");
                return false;
            }else if ($("#pincode").val() == '') {
                $("#errmsg").html("Please Enter Pincode!!");
                //$("#email").css("border-color", "red");
                return false;
            }else if ($("#mobile_no").val() == '') {
                $("#errmsg").html("Please Enter Mobile No!!");
                //$("#email").css("border-color", "red");
                return false;
            }else if ($("#yoe").val() == '') {
                $("#errmsg").html("Please Enter Year!!");
                //$("#email").css("border-color", "red");
                return false;
            }
    }
</script>