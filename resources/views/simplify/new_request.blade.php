<x-header-component /> 
 <section class="minbody">
     <div class="agentspg">
         <div class="pgmincontent pt-4">
             <div class="container">
                 <div class="row justify-content-end">
                     <div class="col-md-12">
                         <div class="cmpnycontentbox wow bounceInDown" data-wow-delay=".6s">
                             <h1 class="d-inline-block display-5 fw-bold mt-3 py-2 mb-3 ">Add new document</h1>
                            <div id="errmsg" style="color:red; padding-left:5px "></div>
                            <form class="form-horizontal"  action="{{ url('require-document') }}" method='POST' autocomplete="off" onsubmit="return valid();">
                            <input type="hidden" name="county" id="county" value="{{ $countryCode }}"/> 
                            <input type="hidden" name="package_name" id="package_name" value="{{ $package_name }}"/> 
                            

                            @csrf
                                 <div class="row">
                                     <div class="col-md-6">
                                         <div class="mb-3">
                                             <label for="exampleInputEmail1" class="form-label">Document Type To Record: <small class="text-danger">*</small></label>
                                             <select  class="form-select" name="jurisdiction" id="jurisdiction" onchange="ordersummary()">
                                                <option selected value="">Select</option>
                                                @foreach($jurisdiction as $val)
                                                <option value="{{ $val -> instrument}}">{{ $val -> instrument}}</option>
                                                @endforeach
                                            </select>
                                            <span id="jurisdiction_error" class="text-danger"></span>
                                             @if ($errors->has('jurisdiction'))
                                            <span class="text-danger">{{ $errors->first('jurisdiction') }}</span>
                                             @endif
                                         </div>
                                     </div>
                                 </div>  
                                 <input type="submit" class="btn btn-success" value="Next">

                                 <input type="button" class="btn btn-dark back" value="Back" onclick="history.back()">
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
  $("#jurisdiction").select2();
 }); 
function valid(){
   if($("#jurisdiction").val() == ''){
        $("#errmsg").html("Document type is a require field");
        $("#jurisdiction").focus();
        return false;
    }
}
</script>