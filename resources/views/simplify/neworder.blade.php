<x-header-component /> 
 <section class="minbody">
     <div class="agentspg">
         <div class="pgmincontent pt-4">
             <div class="container">
                 <div class="row justify-content-end">
                     <div class="col-md-12">
                         <div class="cmpnycontentbox wow bounceInDown" data-wow-delay=".6s">
                             <h1 class="d-inline-block display-5 fw-bold mt-3 py-2 mb-3 ">Order Info</h1>
                            <div id="successmsg" style="color:green; padding-left:5px ">{{ $message }}</div>
                             <div style="color:green; padding-left:10px ">{{ Session::get('successmsg') }}</div>
                             <div style="color:red; padding-left:50px ">{{ Session::get('errmsg') }}</div>
                            <div id="errmsg" style="color:red; padding-left:5px "></div>
                            <form class="form-horizontal"  action="{{ url('require-document') }}" method='POST' autocomplete="off" onsubmit="return valid();">
                            @csrf
                                 <div class="row">
                                     
                                  <div class="col-md-12 mb-3">
                                        <lable>Package Name</lable>
                                        <input type="text" class="form-control"  name="package_name" id="package_name" placeholder="Package name">
                                  </div>         
                                     
                                 <div class="col-md-6">
                                         <div class="mb-3">
                                             <label for="exampleInputEmail1" class="form-label">County Name : <small class="text-danger">*</small> </label>
                                             <select  class="form-select" id="county" name="county" onchange="showjurisdiction()">
                                                <option value="">Select A County</option>
                                                @foreach($country as $item)                                                               
                                                <option value="{{ $item->recipientID  }}">{{ $item->name.' ('.$item->state.' )'  }}</option>
                                                @endforeach
                                            </select>                                            
                                            @if ($errors->has('county'))
                                            <span class="text-danger">{{ $errors->first('county') }}</span>
                                             @endif
                                            </div>
                                     </div>
                                     <div class="col-md-6">
                                         <div class="mb-3">
                                             <label for="exampleInputEmail1" class="form-label">Document Type To Record: <small class="text-danger">*</small></label>
                                             <select  class="form-select" name="jurisdiction" id="jurisdiction" onchange="ordersummary()">
                                                <option selected value="">Select</option>
                                            </select>
                                            <span id="jurisdiction_error" class="text-danger"></span>
                                             @if ($errors->has('jurisdiction'))
                                            <span class="text-danger">{{ $errors->first('jurisdiction') }}</span>
                                             @endif
                                         </div>
                                     </div>
                                 </div>  
                                 <input type="submit" class="btn btn-success" value="Next">
                             </form>
                            
                         </div>
                     </div>
                 </div>
             </div>
         </div>
         
     </div>
 </section>
 <x-footer-component />
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>

 $(function(){
  $("#county").select2();
  $("#jurisdiction").select2();
 }); 


    const showjurisdiction = () => {
    const countryCode = $("#county").val();
     $.ajax({
        type: 'get',
        url: 'get-jusisdiction',
        data: {countryCode: countryCode},
        success: function(data){
            $("#jurisdiction").html(data);
        }
    })
    $('#div_jurisdiction').show();
}

function valid(){
     if($("#package_name").val() == ''){
        $("#errmsg").html("Package name is a require field");
        $("#package_name").focus();
        return false;
    }else if($("#county").val() == ''){
        $("#errmsg").html("County name is a require field");
        $("#county").focus();
        return false;
    }else if($("#jurisdiction").val() == ''){
        $("#errmsg").html("Document type is a require field");
        $("#jurisdiction").focus();
        return false;
    }
}
</script>