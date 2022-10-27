<x-countrywide.header title="Users | CountryWide Proccess" />
<x-countrywide.nav />
<div class="wave -three"></div>
<div class="app-content">
				<section class="section">


                        <!--page-header open-->
						<div class="page-header">
							<h4 class="page-title">Add {{ $title }}</h4>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#" class="text-light-color">Add</a></li>
								<li class="breadcrumb-item active" aria-current="page">Add {{ $title }} Details</li>
							</ol>
						</div>
						<!--page-header closed-->

                        <!--row open-->
						
						<!--row closed-->

                        <!--row open-->
				    <div class="row justify-content-center " >
						
					    <div class="col-12">
						    <div class="card" style="style">
									<div class="card-header">
										<h4>Add {{$accesrole == 2?"Attorney":"Individual"}} Details</h4>
										<span id="errmsg" style="color:red"></span>
									</div>
								<div class="card-body">
									<form class="form-horizontal"  action="{{ url('admin/users/adduser') }}" method='POST' onsubmit=" return valid(); " enctype="multipart/form-data" >
                                        @csrf
                                       
                                        <div class="row" style="display:none">
                                            <div class="col-md-12 col-xs-6">
                                                <div class="form-group">
                                                    <label>Title<span style="color:red"> *</span></label>
                                                    
                                                    <input type="hidden" name="registration_as" id="registration_as" class="form-control" value="{{$accesrole }}"  readonly >
                                                       
                                                    @if ($errors->has('registration_as'))
                                                                <span class="text-danger">{{ $errors->first('registration_as') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                                <div class="col-md-6">
                                                   <div class="form-group fv-plugins-icon-container ">
                                                       <label>Name: <span style="color:red"> *</span></label>
                                                       <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
                                                       @if ($errors->has('name'))
                                                           <span class="text-danger">{{ $errors->first('name') }}</span>
                                                       @endif
                                                       <div class="fv-plugins-message-container"></div>
                                                   </div>
                                               </div>
                                               <div class="col-md-6">
                                                   <div class="form-group fv-plugins-icon-container ">
                                                       <label>Email Id:<span style="color:red"> *</span></label>
                                                       <input type="email" class="form-control " id="email_id"  name="email_id" value="{{ old('email_id') }}"  placeholder="Email ID">
                                                       @if ($errors->has('email_id'))
                                                           <span class="text-danger">{{ $errors->first('email_id') }}</span>
                                                       @endif
                                                       <div class="fv-plugins-message-container"></div>
                                                   </div>
                                               </div>
                                        </div>

                                        <div class="row">
                                                <div class="col-md-6">
                                                   <div class="form-group fv-plugins-icon-container ">
                                                       <label>Password: <span style="color:red"> *</span></label>
                                                       <input type="password" class="form-control" id="password" name="password" aria-describedby="emailHelp">
                                                        @if ($errors->has('password'))
                                                                            <span class="text-danger">{{ $errors->first('password') }}</span>
                                                        @endif
                                                       <div class="fv-plugins-message-container"></div>
                                                   </div>
                                               </div>
                                               <div class="col-md-6">
                                                   <div class="form-group fv-plugins-icon-container ">
                                                       <label>Confirm Password:<span style="color:red"> *</span></label>
                                                       <input type="text" class="form-control" id="con_password" name="con_password" aria-describedby="emailHelp" >
                                                        @if ($errors->has('con_password'))
                                                                            <span class="text-danger">{{ $errors->first('con_password') }}</span>
                                                        @endif
                                                       <div class="fv-plugins-message-container"></div>
                                                   </div>
                                               </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12 col-xs-6">
                                                <div class="form-group">
                                                    <label>Mobile No<span style="color:red"> *</span></label>
                                                    <input type="number" class="form-control" id="mobile_no" name="mobile_no" aria-describedby="emailHelp" value="{{ old('mobile_no')}}" >
                                                    @if ($errors->has('mobile_no'))
                                                                        <span class="text-danger">{{ $errors->first('mobile_no') }}</span>
                                                    @endif 
                                                </div>
                                            </div>
                                        </div>
                                        @if($accesrole == 2)

                                            <div class="row" id="div_showOrnot">
                                                    <div class="col-md-6">
                                                    <div class="form-group fv-plugins-icon-container ">
                                                        <label>Firm name (optional): </label>
                                                        <input type="text" class="form-control" id="firm_name" name="firm_name" aria-describedby="emailHelp" value="{{ old('firm_name')}}">
                                                        
                                                        <div class="fv-plugins-message-container"></div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group fv-plugins-icon-container ">
                                                        <label>Bar ID:<span style="color:red"> *</span></label>
                                                        <input type="text" class="form-control" id="bar_id" name="bar_id" aria-describedby="emailHelp" value="{{ old('bar_id')}}">
                                                            @if ($errors->has('bar_id'))
                                                                                <span class="text-danger">{{ $errors->first('bar_id') }}</span>
                                                            @endif
                                                        <div class="fv-plugins-message-container"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif

                                        <div class="row">
                                            <div class="col-md-6 col-xs-6">
                                                <div class="form-group">
                                                    <input type="Submit" class="btn btn-primary" 
                                                        value="Save" />
                                                </div>
                                            </div>
                                        </div>
									</form>
								</div>
							</div>
						</div>
					</div>
					
				</section>
			</div>



<script>
    function checkregistrationAs(){
        registrationAs = $('#registration_as').val();
        if(registrationAs == 2){
            return validforattorney();
        }else{
            return validforindividual();
        }
    }
    function validforindividual() {
            if ($("#registration_as").val() == '') {
                $("#errmsg").html("Please Select a Option For Regstration As!!");
                //$("#email").css("border-color", "red");
                return false;
            } else if ($("#name").val() == '') {
                $("#errmsg").html("Please Enter Name!! ");
                //$("#email").css("border-color", "red");
                return false;
            }else if ($("#email_id").val() == '') {
                $("#errmsg").html("Please Enter Email ID!!");
                //$("#email").css("border-color", "red");
                return false;
            }else if ($("#password").val() == '') {
                $("#errmsg").html("Please Enter Password!!");
                //$("#email").css("border-color", "red");
                return false;
            }else if ($("#con_password").val() == '') {
                $("#errmsg").html("Please Enter Confirm Password!!");
                //$("#email").css("border-color", "red");
                return false;
            }
    }

    function validforattorney(){
        if ($("#registration_as").val() == '') {
                $("#errmsg").html("Please Select a Option For Regstration As!!");
                //$("#email").css("border-color", "red");
                return false;
            } else if ($("#name").val() == '') {
                $("#errmsg").html("Please Enter Name!! ");
                //$("#email").css("border-color", "red");
                return false;
            }else if ($("#email_id").val() == '') {
                $("#errmsg").html("Please Enter Email ID!!");
                //$("#email").css("border-color", "red");
                return false;
            }else if ($("#password").val() == '') {
                $("#errmsg").html("Please Enter Password!!");
                //$("#email").css("border-color", "red");
                return false;
            }else if ($("#con_password").val() == '') {
                $("#errmsg").html("Please Enter Confirm Password!!");
                //$("#email").css("border-color", "red");
                return false;
            }else if ($("#bar_id").val() == '') {
                $("#errmsg").html("Please Enter Bar ID!!");
                //$("#email").css("border-color", "red");
                return false;
            }

    }

   
</script>

<x-countrywide.footer />

