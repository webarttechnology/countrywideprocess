<x-countrywide.header title="Testimonials | CountryWide Proccess" />
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
                                <form class="form-horizontal"  action="{{ url('admin/testimonials/update') }}" method='POST' onsubmit=" return valid(); " enctype="multipart/form-data" >
                                        @csrf
                                       
                                        <div class="row">
                                            <div class="col-md-12 col-xs-6">
                                                <div class="form-group">
                                                    <label>Title<span style="color:red"> *</span></label>
                                                    <input type="text" name="author_name" id="author_name" class="form-control" placeholder="Author Name" value="{{ $testimonial->author_name }}") />
                                                    <input type="hidden" name="id" id="id" value="{{ $testimonial->id }}" />
                                                    @if ($errors->has('author_name'))
                                                                <span class="text-danger">{{ $errors->first('author_name') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12 col-xs-6">
                                                <div class="form-group">
                                                    <label>Description<span style="color:red"> *</span></label>
                                                    <textarea type="text" name="details" id="details" class="form-control" placeholder="Title">{{ $testimonial->details }}</textarea> 
                                                    @if ($errors->has('details'))
                                                                <span class="text-danger">{{ $errors->first('details') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12 col-xs-6">
                                                <div class="form-group">
                                                    <label>Status<span style="color:red"> </span></label>
                                                    <select type="number" name="is_active" id="is_active" class="form-control" placeholder="Status" value="{{ $testimonial->is_active }}") >
                                                     <option value="1" {{ $testimonial->is_active == 1?"selected":''}}>Active</option>
                                                     <option value="0" {{ $testimonial->is_active == 0?"selected":''}}>Inactive</option>
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
    CKEDITOR.replace( 'details' );
</script>
<script>




function valid() {
            if ($("#author_name").val() == '') {
                $("#errmsg").html("Please Enter Author Name!!");
                //$("#email").css("border-color", "red");
                return false;
            }else if ($("#details").val() == '') {
                $("#errmsg").html("Please Enter Details!!");
                //$("#email").css("border-color", "red");
                return false;
            } else if ($("#is_active").val() == '') {
                $("#errmsg").html("Please Enter A Status!! ");
                //$("#email").css("border-color", "red");
                return false;
            }
    }
</script>

<x-countrywide.footer />

