<x-countrywide.header title="Company | CountrywideProcess" />
<x-countrywide.nav />
<div class="wave -three"></div>
<div class="app-content">
				<section class="section">


                        <!--page-header open-->
						<div class="page-header">
							<h4 class="page-title">Update {{ $title }}</h4>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#" class="text-light-color">Update</a></li>
								<li class="breadcrumb-item active" aria-current="page">Update {{ $title }} Details</li>
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
										<h4>Update {{ $title }} Details</h4>
                                        <span id="errmsg" style="color:red; padding-left:50px ">{{ Session::get('errmsg') }}</span>
									</div>
								<div class="card-body">
									<form class="form-horizontal"  action="{{ url('admin/company/update') }}" method='POST' onsubmit=" return valid(); " enctype="multipart/form-data" >
                                        @csrf

                                      

                                        <div class="row">
                                            <div class="col-md-12 col-xs-6">
                                                <div class="form-group">
                                                    <label>Description<span style="color:red"> *</span></label>
                                                    <textarea type="text" name="ourmission_details" id="ourmission_details" class="form-control" placeholder="Description">{{ $company->ourmission_details }}</textarea> 
                                                    <input type="hidden" name="id" id="id" value="{{ $company->id }}" />
                                                    @if ($errors->has('ourmission_details'))
                                                                <span class="text-danger">{{ $errors->first('ourmission_details') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                                <div class="col-md-6">
                                                   <div class="form-group fv-plugins-icon-container ">
                                                       <label>Name: <span style="color:red"> *</span></label>
                                                       <input type="text" class="form-control" id="name" name="name" value="{{ $company->name }}">
                                                       @if ($errors->has('name'))
                                                           <span class="text-danger">{{ $errors->first('name') }}</span>
                                                       @endif
                                                       <div class="fv-plugins-message-container"></div>
                                                   </div>
                                               </div>
                                               <div class="col-md-6">
                                                   <div class="form-group fv-plugins-icon-container ">
                                                       <label>Email Id:<span style="color:red"> *</span></label>
                                                       <input type="email" class="form-control " id="email_id"  name="email_id" value="{{ $company->email_id }}"  placeholder="Email ID">
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
                                                       <label>Mobile No 1: <span style="color:red"> *</span></label>
                                                       <input type="number" class="form-control" id="mobile_no" name="mobile_no" value="{{ $company->mobile_no }}">
                                                       @if ($errors->has('mobile_no'))
                                                           <span class="text-danger">{{ $errors->first('mobile_no') }}</span>
                                                       @endif
                                                       <div class="fv-plugins-message-container"></div>
                                                   </div>
                                               </div>
                                               <div class="col-md-6">
                                                   <div class="form-group fv-plugins-icon-container ">
                                                       <label>Mobile No 2:<span style="color:red"> *</span></label>
                                                       <input type="text" class="form-control " id="mobile_no1"  name="mobile_no1" value="{{ $company->mobile_no1 }}" >
                                                       @if ($errors->has('mobile_no1'))
                                                           <span class="text-danger">{{ $errors->first('mobile_no1') }}</span>
                                                       @endif
                                                       <div class="fv-plugins-message-container"></div>
                                                   </div>
                                               </div>
                                           </div>

                                           <div class="row">
                                                <div class="col-md-6">
                                                   <div class="form-group fv-plugins-icon-container ">
                                                       <label>Fax: <span style="color:red"> *</span></label>
                                                       <input type="text" class="form-control" id="fax" name="fax" value="{{ $company->fax }}">
                                                       @if ($errors->has('fax'))
                                                           <span class="text-danger">{{ $errors->first('fax') }}</span>
                                                       @endif
                                                       <div class="fv-plugins-message-container"></div>
                                                   </div>
                                               </div>
                                               <div class="col-md-6">
                                                   <div class="form-group fv-plugins-icon-container ">
                                                       <label>Address:<span style="color:red"> *</span></label>
                                                       <textarea type="text" class="form-control " id="address"  name="address" >{{ $company->address }}</textarea>
                                                       @if ($errors->has('address'))
                                                           <span class="text-danger">{{ $errors->first('address') }}</span>
                                                       @endif
                                                       <div class="fv-plugins-message-container"></div>
                                                   </div>
                                               </div>
                                           </div>


                                           <div class="row">
                                                <div class="col-md-6">
                                                   <div class="form-group fv-plugins-icon-container ">
                                                       <label>Facebook Link: <span style="color:red"> *</span></label>
                                                       <input type="text" class="form-control" id="facebook_link" name="facebook_link" value="{{ $company->facebook_link }}">
                                                       @if ($errors->has('facebook_link'))
                                                           <span class="text-danger">{{ $errors->first('facebook_link') }}</span>
                                                       @endif
                                                       <div class="fv-plugins-message-container"></div>
                                                   </div>
                                               </div>
                                               <div class="col-md-6">
                                                   <div class="form-group fv-plugins-icon-container ">
                                                       <label>Map Link:<span style="color:red"> *</span></label>
                                                       <textarea type="email" class="form-control " id="map_link"  name="map_link" >{{ $company->map_link }}</textarea>
                                                       @if ($errors->has('map_link'))
                                                           <span class="text-danger">{{ $errors->first('map_link') }}</span>
                                                       @endif
                                                       <div class="fv-plugins-message-container"></div>
                                                   </div>
                                               </div>
                                           </div>

                                           <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group fv-plugins-icon-container ">
                                                    <label>Image<span style="color:red"> *</span></label>
                                                    <input type="file" name="image" id="image" class="form-control" >
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group fv-plugins-icon-container ">
                                                    <label>Logo<span style="color:red"> *</span></label>
                                                    <input type="file" name="logo" id="logo" class="form-control" >
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
    CKEDITOR.replace( 'ourmission_details' );
    CKEDITOR.replace( 'address' );
</script>
<script>



function valid() {
           if ($("#ourmission_details").val() == '') {
                $("#errmsg").html("Please Enter Our Mission!!");
                //$("#email").css("border-color", "red");
                return false;
            }
    }
</script>

<x-countrywide.footer />

