<x-countrywide.header title="Service Master | CountryWide Process" />
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
                                <form class="form-horizontal"  action="{{ url('admin/price-zone/update') }}" method='POST' onsubmit=" return valid(); " enctype="multipart/form-data" >
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-12 col-xs-6">
                                                <div class="form-group">
                                                    <label>Service<span style="color:red"> *</span></label>
                                                    <select type="text" name="service_master_id" id="service_master_id" class="form-control" onchange="getPriceItem()"   >
                                                        <option value="">Pleace Select A Service</option>
                                                        @foreach($service_master as $item)
                                                            <option value="{{ $item->id }}" {{ $item->id == $price->service_master_id?"selected":'' }}>{{ $item->name }}</option>
                                                        
                                                        @endforeach
                                                    </select>
                                                    @if ($errors->has('service_master_id'))
                                                                <span class="text-danger">{{ $errors->first('service_master_id') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12 col-xs-6">
                                                <div class="form-group">
                                                    <label>Price Item<span style="color:red"> *</span></label>
                                                    <select type="text" name="priceitem_id" id="priceitem_id" class="form-control"  >
                                                        <option value="">Pleace Select A Price Item</option>
                                                        @foreach($priceitem as $item)
                                                            <option value="{{ $item->id }}" {{ $item->id == $price->priceitem_id?"selected":'' }}>{{ $item->name }}</option>
                                                        
                                                        @endforeach
                                                    </select>
                                                    @if ($errors->has('priceitem_id'))
                                                                <span class="text-danger">{{ $errors->first('priceitem_id') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12 col-xs-6">
                                                <div class="form-group">
                                                    <label>Item<span style="color:red"> *</span></label>
                                                    <input type="text" name="name" id="name" class="form-control" placeholder="" value="{{ $price->name }}") />
                                                    <input type="hidden" name="id" id="id" value="{{ $price->id }}" />
                                                    @if ($errors->has('name'))
                                                                <span class="text-danger">{{ $errors->first('name') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                     

                                      
                                        <div class="row">
                                            <div class="col-md-6 col-xs-6">
                                                <div class="form-group">
                                                    <input type="Submit" class="btn btn-primary" 
                                                        value="Update" />
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




function getPriceItem(){
        var service =$('#service_master_id').val();
        console.log(service);
        $.ajax({
            type:"GET",
            url: "{{ URL::to('admin/price-zone/item') }}",
            data: {
                serviceId: service,
            },
            success: function(response){
                console.log(response);
                $('#priceitem_id').html(response);
            }
       });
    }

    function valid() {
            if ($("#service_master_id	").val() == '') {
                $("#errmsg").html("Please Select a Service!!");
                //$("#email").css("border-color", "red");
                return false;
            }else if ($("#priceitem_id").val() == '') {
                $("#errmsg").html("Please Select Price Item!!");
                //$("#email").css("border-color", "red");
                return false;
            }else if ($("#name").val() == '') {
                $("#errmsg").html("Please Enter Price Zone Name!!");
                //$("#email").css("border-color", "red");
                return false;
            }
    }

</script>

<x-countrywide.footer />

