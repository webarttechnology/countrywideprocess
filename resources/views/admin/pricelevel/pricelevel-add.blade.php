<x-countrywide.header title="Price Item | CountryWide Process" />
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
                                        <div style="color:green; padding-left:5px ">{{ Session::get('successmsg') }}</div>
                                        <div style="color:red; padding-left:5px ">{{ Session::get('errmsg') }}</div>
									</div>
								<div class="card-body">
									<form class="form-horizontal"  action="{{ url('admin/price-level/add') }}" method='POST' onsubmit=" return valid(); " enctype="multipart/form-data" >
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-12 col-xs-6">
                                                <div class="form-group">
                                                    <label>Service<span style="color:red"> *</span></label>
                                                    <select type="number" name="service_master_id" id="service_master_id" class="form-control" onchange="getPriceItem()"  >
                                                        <option value="">Pleace Select A Service</option>
                                                        @foreach($service as $item)
                                                            <option value="{{ $item->id }}" {{ $item->id == old('service_master_id')?"selected":'' }}>{{ $item->name }}</option>
                                                        
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
                                                    <select type="number" name="priceitem_id" id="priceitem_id" class="form-control" onchange="getpricezone()"  >
                                                        <option value=""> Price Item</option>
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
                                                    <label>Price Zone<span style="color:red"> *</span></label>
                                                    <select type="number" name="pricezone_id" id="pricezone_id" class="form-control"  >
                                                        <option value=""> Price zone</option>
                                                    </select>
                                                    @if ($errors->has('pricezone_id'))
                                                                <span class="text-danger">{{ $errors->first('pricezone_id') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12 col-xs-6">
                                                <div class="form-group">
                                                    <label>Price Level Name<span style="color:red"> *</span></label>
                                                    <input type="text" name="name" id="name" class="form-control" placeholder="Name" value="{{ old('name') }}") />
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

$(document).ready(function () {
    var service =$('#service_master_id').val();
   
        
        $.ajax({
            type:"GET",
            url: "{{ URL::to('admin/price-zone/item') }}",
            data: {
                serviceId: service,
            },
            success: function(response){
               // console.log(response);
                $('#priceitem_id').html(response);
            }
       });


}); 
    
    function getPriceItem(){
        var service =$('#service_master_id').val();

        
        $.ajax({
            type:"GET",
            url: "{{ URL::to('admin/price-zone/item') }}",
            data: {
                serviceId: service,
            },
            success: function(response){
                //console.log(response);
                $('#priceitem_id').html(response);
            }
       });
    }

    function getpricezone(){
        var service =$('#service_master_id').val();
        var item =$('#priceitem_id').val();
        console.log(item);
        $.ajax({
            type:"GET",
            url: "{{ URL::to('admin/price-level/zone') }}",
            data: {
                serviceId: service,
                item_id:item
            },
            success: function(response){
                //console.log(response);
                $('#pricezone_id').html(response);
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
            }else if ($("#pricezone_id").val() == '') {
                $("#errmsg").html("Please Select Price Zone!!");
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

