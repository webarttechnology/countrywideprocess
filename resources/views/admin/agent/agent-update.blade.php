<x-countrywide.header title="Blog | CountrywideProcess" />
<x-countrywide.nav />
<div class="wave -three"></div>
<div class="app-content">
				<section class="section">


                        <!--page-header open-->
						<div class="page-header">
							<h4 class="page-title">Edit {{ $title }}</h4>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#" class="text-light-color">Edit</a></li>
								<li class="breadcrumb-item active" aria-current="page">Edit {{ $title }} Details</li>
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
										<h4>Edit {{ $title }} Details</h4>
										<span id="errmsg" style="color:red"></span>
									</div>
								<div class="card-body">
									<form class="form-horizontal"  action="{{ url('admin/agents/update') }}" method='POST' onsubmit=" return valid(); " enctype="multipart/form-data" >
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-12 col-xs-6">
                                                <div class="form-group">
                                                    <label>County of Registration:<span style="color:red"> *</span></label>
                                                    <select type="text" name="country_id" id="country_id" class="form-control" >
                                                        <option value ="">Please Select A Country</option>
                                                        @foreach($country as $item)
                                                            <option value="{{ $item->code }}" {{ $item->code == $agent->country_id?'selected':'' }}>{{ $item-> name}}</option>
                                                        @endforeach
                                                    </select>
                                                    @if ($errors->has('country_id'))
                                                                <span class="text-danger">{{ $errors->first('country_id') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12 col-xs-6">
                                                <div class="form-group">
                                                    <label>Badge Number</label>
                                                    <input type="text" name="badge_no" id="badge_no" class="form-control" placeholder="Badge Number" value="{{ $agent->badge_no }}") />
                                                    <input type="hidden" name="id" id="id" class="form-control"  value="{{ $agent->id }}") />

                                                </div>
                                            </div>
                                        </div>



                                        <div class="row">
                                                <div class="col-md-6">
                                                   <div class="form-group fv-plugins-icon-container ">
                                                       <label>First Name: <span style="color:red"> *</span></label>
                                                       <input type="text" class="form-control" id="fname" name="fname" value="{{ $agent->fname }}" placeholder="Fast Name">
                                                       @if ($errors->has('fname'))
                                                           <span class="text-danger">{{ $errors->first('fname') }}</span>
                                                       @endif
                                                       <div class="fv-plugins-message-container"></div>
                                                   </div>
                                               </div>
                                               <div class="col-md-6">
                                                   <div class="form-group fv-plugins-icon-container ">
                                                       <label>Last Name:<span style="color:red"> *</span></label>
                                                       <input type="text" class="form-control " id="lname"  name="lname" value="{{ $agent->lname }}"  placeholder="Last Name">
                                                       @if ($errors->has('lname'))
                                                           <span class="text-danger">{{ $errors->first('lname') }}</span>
                                                       @endif
                                                       <div class="fv-plugins-message-container"></div>
                                                   </div>
                                               </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12 col-xs-6">
                                                <div class="form-group">
                                                    <label>Email<span style="color:red"> *</span></label>
                                                    <input type="email" name="email_id" id="email_id" class="form-control" placeholder="Email ID" value="{{ $agent->email_id }}") />
                                                    @if ($errors->has('email_id'))
                                                                <span class="text-danger">{{ $errors->first('email_id') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12 col-xs-6">
                                                <div class="form-group">
                                                    <label>Company/ Business Name <span style="color:red"> *</span></label>
                                                    <input type="text" name="company" id="company" class="form-control" placeholder="Company/ Business Name" value="{{ $agent->company }}") />
                                                    @if ($errors->has('company'))
                                                                <span class="text-danger">{{ $errors->first('company') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                        <h5 class="text-theme">Contact Information :</h5>

                                        <div class="row">
                                            <div class="col-md-12 col-xs-6">
                                                <div class="form-group">
                                                    <label>Address1<span style="color:red"> *</span></label>
                                                    <input type="text" name="address1" id="address1" class="form-control" placeholder="Address1" value="{{ $agent->address1 }}") />
                                                    @if ($errors->has('address1'))
                                                                <span class="text-danger">{{ $errors->first('address1') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12 col-xs-6">
                                                <div class="form-group">
                                                    <label>Address2</label>
                                                    <input type="text" name="address2" id="address2" class="form-control" placeholder="Address2" value="{{ $agent->address2 }}") />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                                <div class="col-md-4">
                                                   <div class="form-group fv-plugins-icon-container ">
                                                       <label>City: <span style="color:red"> *</span></label>
                                                       <input type="text" class="form-control" id="city" name="city" value="{{ $agent->city }}" placeholder="Fast Name">
                                                       @if ($errors->has('city'))
                                                           <span class="text-danger">{{ $errors->first('city') }}</span>
                                                       @endif
                                                       <div class="fv-plugins-message-container"></div>
                                                   </div>
                                               </div>
                                               <div class="col-md-4">
                                                   <div class="form-group fv-plugins-icon-container ">
                                                       <label>State:<span style="color:red"> *</span></label>
                                                       <input type="text" class="form-control " id="state"  name="state" value="{{ $agent->state }}"  placeholder="Last Name">
                                                       @if ($errors->has('state'))
                                                           <span class="text-danger">{{ $errors->first('state') }}</span>
                                                       @endif
                                                       <div class="fv-plugins-message-container"></div>
                                                   </div>
                                               </div>
                                               <div class="col-md-4">
                                                   <div class="form-group fv-plugins-icon-container ">
                                                       <label>Zip:<span style="color:red"> *</span></label>
                                                       <input type="number" class="form-control " id="pincode"  name="pincode" value="{{ $agent->pincode }}"  placeholder="Last Name">
                                                       @if ($errors->has('pincode'))
                                                           <span class="text-danger">{{ $errors->first('pincode') }}</span>
                                                       @endif
                                                       <div class="fv-plugins-message-container"></div>
                                                   </div>
                                               </div>
                                        </div>

                                        <div class="row">
                                                <div class="col-md-6">
                                                   <div class="form-group fv-plugins-icon-container ">
                                                       <label>Phone: <span style="color:red"> *</span></label>
                                                       <input type="number" class="form-control" id="mobile_no" name="mobile_no" value="{{ $agent->mobile_no }}" placeholder="Phone">
                                                       @if ($errors->has('mobile_no'))
                                                           <span class="text-danger">{{ $errors->first('mobile_no') }}</span>
                                                       @endif
                                                       <div class="fv-plugins-message-container"></div>
                                                   </div>
                                               </div>
                                               <div class="col-md-6">
                                                   <div class="form-group fv-plugins-icon-container ">
                                                       <label>Fax:</label>
                                                       <input type="number" class="form-control " id="fax_no"  name="fax_no" value="{{ $agent->fax_no }}"  placeholder="Fax">
                                                       <div class="fv-plugins-message-container"></div>
                                                   </div>
                                               </div>
                                        </div>

                                        <h5 class="text-theme">Experience :</h5>

                                        <div class="row">
                                            <div class="col-md-12 col-xs-6">
                                                <div class="form-group">
                                                    <label>Years of Experience <span style="color:red"> *</span></label>
                                                    <input type="text" name="yoe" id="yoe" class="form-control" placeholder="Year Of Experience" value="{{ $agent->yoe }}") />
                                                    @if ($errors->has('yoe'))
                                                                <span class="text-danger">{{ $errors->first('yoe') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12 col-xs-6">
                                                <div class="form-group">
                                                    <label>Past Experience</label>
                                                    <textarea type="text" name="past_experience" id="past_experience" class="form-control" >{{ $agent->past_experience }}</textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12 col-xs-6">
                                                <div class="form-group">
                                                    <label>Status<span style="color:red"> </span></label>
                                                    <select type="number" name="is_active" id="is_active" class="form-control"  >
                                                     <option value="1"{{ $agent->is_active == 1?'selected':'' }}>Active</option>
                                                     <option value="0"{{ $agent->is_active == 0?'selected':'' }}>Inactive</option>
                                                    </select>
                                                    @if ($errors->has('is_active'))
                                                                <span class="text-danger">{{ $errors->first('is_active') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                      

                                     
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
    CKEDITOR.replace( 'past_experience' );
</script>
<script>



    function valid() {
            if ($("#country_id").val() == '') {
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

<x-countrywide.footer />

