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
                                <form class="form-horizontal"  action="{{ url('admin/price/update') }}" method='POST' onsubmit=" return valid(); " enctype="multipart/form-data" >
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-12 col-xs-6">
                                                <div class="form-group">
                                                    <label>Name<span style="color:red"> *</span></label>
                                                    <select type="text" name="service_master_id" id="service_master_id" class="form-control" onchange="getPriceItem()" >
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
                                                    <select type="number" name="priceitem_id" id="priceitem_id" class="form-control" onchange="getpricezone()"  >
                                                        <option value=""> Price Item</option>
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
                                                    <label>Price Zone<span style="color:red"> *</span></label>
                                                    <select type="number" name="pricezone_id" id="pricezone_id" class="form-control" onchange="getpricelevel()"  >
                                                        <option value=""> Price zone</option>
                                                        @foreach($pricezone as $item)
                                                            <option value="{{ $item->id }}" {{ $item->id == $price->pricezone_id?"selected":'' }}>{{ $item->name }}</option>
                                                        
                                                        @endforeach
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
                                                    <label>Price level<span style="color:red"> *</span></label>
                                                    <select type="number" name="pricelevel_id" id="pricelevel_id" class="form-control"  >
                                                        <option value=""> Price Level</option>
                                                        @foreach($pricelevel as $item)
                                                            <option value="{{ $item->id }}" {{ $item->id == $price->pricelevel_id?"selected":'' }}>{{ $item->name }}</option>
                                                        
                                                        @endforeach
                                                    </select>
                                                    @if ($errors->has('pricelevel_id'))
                                                                <span class="text-danger">{{ $errors->first('pricelevel_id') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6 col-xs-12">
                                                <div class="form-group">
                                                    <label>Amount<span style="color:red"> *</span></label>
                                                    <input type="num" name="amount" id="amountt" class="form-control" placeholder="Amount" value="{{ $price->amount }}" >
                                                    <input type="hidden" name="id" id="id" class="form-control" value="{{ $price->id }}" >
                                                    @if ($errors->has('amount'))
                                                                <span class="text-danger">{{ $errors->first('amount') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-xs-12">
                                                <div class="form-group">
                                                    <label>Price Per Page<span style="color:red"> *</span></label>
                                                    <input type="number" name="page" id="page" class="form-control" placeholder="Price Per Page" value="{{ $price->page }}" >
                                                    @if ($errors->has('page'))
                                                                <span class="text-danger">{{ $errors->first('page') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12 col-xs-6">
                                                <div class="form-group">
                                                    <label>Additional Case<span style="color:red"> *</span></label>
                                                    <textarea type="text" name="additional_case" id="additional_case" class="form-control" placeholder="Additional Case" >{{ $price->additional_case }}</textarea>
                                                    @if ($errors->has('additional_case'))
                                                                <span class="text-danger">{{ $errors->first('additional_case') }}</span>
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
                console.log(response);
                $('#pricezone_id').html(response);
            }
       });
    }

    function getpricelevel(){
        var service =$('#service_master_id').val();
        var item =$('#priceitem_id').val();
        var zone =$('#pricezone_id').val();
        $.ajax({
            type:"GET",
            url: "{{ URL::to('admin/price/level') }}",
            data: {
                serviceId: service,
                item_id:item,
                zone_id:zone
            },
            success: function(response){
                console.log(response);
                $('#pricelevel_id').html(response);
            }
       });
    }


    function valid() {
            if ($("#service_master_id").val() == '') {
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
            }else if ($("#pricelevel_id").val() == '') {
                $("#errmsg").html("Please select Price Level!!");
                //$("#email").css("border-color", "red");
                return false;
            }else if ($("#amountt").val() == '') {
                $("#errmsg").html("Please enter Price Amount!!");
                //$("#email").css("border-color", "red");
                return false;
            }
    }
</script>

<x-countrywide.footer />

