<x-countrywide.header title="Blog | CountrywideProcess" />
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
										<h4>Add {{ $title }} Details</h4>
										<span id="errmsg" style="color:red"></span>
									</div>
                                    <div style="color:green; padding-left:50px ">{{ Session::get('successmsg') }}</div>
                                     <div style="color:red; padding-left:50px ">{{ Session::get('errmsg') }}</div>
								<div class="card-body">
									<form class="form-horizontal"  action="{{ url('admin/blog/add') }}" method='POST' onsubmit=" return valid(); " enctype="multipart/form-data" >
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-12 col-xs-6">
                                                <div class="form-group">
                                                    <label>Name<span style="color:red"> *</span></label>
                                                    <input type="text" name="name" id="name" class="form-control" placeholder="Name" value="{{ old('name') }}") />
                                                    @if ($errors->has('name'))
                                                                <span class="text-danger">{{ $errors->first('name') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                     


                                        <div class="row">
                                            <div class="col-md-12 col-xs-6">
                                                <div class="form-group">
                                                    <label>Description<span style="color:red"> *</span></label>
                                                    <textarea type="text" name="details" id="details" class="form-control" placeholder="Title">{{ old('details') }}</textarea> 
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
                                                    <select type="number" name="is_active" id="is_active" class="form-control" placeholder="Status" value="{{ old('is_active') }}") >
                                                     <option value="1">Active</option>
                                                     <option value="0">Inactive</option>
                                                    </select>
                                                    @if ($errors->has('is_active'))
                                                                <span class="text-danger">{{ $errors->first('is_active') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12 col-xs-6">
                                                <div class="form-group">
                                                    <label>Image<span style="color:red"> *</span></label>
                                                    <input type="file" name="image" id="image" class="form-control" />
                                                    @if ($errors->has('image'))
                                                                <span class="text-danger">{{ $errors->first('image') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                            <div class="row">
                                                <div class="col-md-6 col-xs-6">
                                                    <div class="form-group">
                                                        <label>Upload Pdf</label>
                                                        <input type="file" name="document[]" class="form-control"  />
                                                        <span id="multipleimage"></span>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-xs-6">
                                                    <span
                                                        class="btn btn-primary m-b-5 m-t-5" id="addrow" style="float: left;"><i class="fa fa-plus"
                                                        aria-hidden="true"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3 col-xs-6">
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


            
            $(document).ready(function () {
                let lineNo = 1;
                $("#addrow").click(function () {
                   
                    markup = '<div class="inputmin my-2" id="deleterow'+ lineNo +'"><input type="file" class="d-inline-block form-control"  name="document[]" id="image'+ lineNo +'" style="width: 85%;"> <div class="fv-plugins-message-container d-inline-block"> <button class="btn btn-danger m-b-5 ml-2 py-2"  onclick="deleteRow('+ lineNo +')"><i class="fa fa-trash-o" aria-hidden="true"></i></button></div></div>' ;
                    tableBody = $("#multipleimage");
                   // alert(tableBody);
                    tableBody.append(markup);
                    lineNo++;
                });

              
            }); 
     


     function deleteRow(lineno){
         
        $("#deleterow"+lineno).click(function () {
                   
            $('#deleterow'+lineno).remove();
        });
     }

    function valid() {
            if ($("#name").val() == '') {
                $("#errmsg").html("Please Enter A Name!!");
                //$("#email").css("border-color", "red");
                return false;
            }else if ($("#details").val() == '') {
                $("#errmsg").html("Please Enter Service Description!!");
                //$("#email").css("border-color", "red");
                return false;
            } else if ($("#is_active").val() == '') {
                $("#errmsg").html("Please Enter A Status!! ");
                //$("#email").css("border-color", "red");
                return false;
            }else if ($("#image").val() == '') {
                $("#errmsg").html("Please Upload a Picture!!");
                //$("#email").css("border-color", "red");
                return false;
            }
    }


      

</script>

<x-countrywide.footer />

