<x-header-component /> 
 <section class="minbody">
     <div class="agentspg">
         <div class="pgmincontent pt-4">
             <div class="container">
                 <div class="row justify-content-end">
                     <div class="col-md-12">
                         <div class="cmpnycontentbox wow bounceInDown" data-wow-delay=".6s">
                             <h1 class="d-inline-block display-5 fw-bold mt-3 py-2 mb-3 ">Case Participants</h1>
                            
                            <div id="errmsg" style="color:red; padding-left:5px ">{{ Session::get('errmsg') }}</div>
                            <div id="successmsg" style="color:green; padding-left:5px ">{{ Session::get('successmsg') }}</div>
                            <form class="form-horizontal"  action="{{ url('case-participants') }}" method='POST' autocomplete="off" >
                            @csrf
                                 <div class="row">
                                  {!! $inputfields !!}
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
 
 <script>
     $(document).ready(function(){
         $("#grantors_nameUnparsed_blog").hide();
         $("#grantees_nameUnparsed_blog").hide();
         
         
         
         $("#grantors_type").change(function(){
             if($("#grantors_type").val() == "individual"){
                 $("#grantors_nameUnparsed_blog").hide();
                 $("#grantors_firstName_blog").show();
                 $("#grantors_middleName_blog").show();
                 $("#grantors_lastName_blog").show();
                 $("#grantors_nameSuffix_blog").show();
             }else{
                 $("#grantors_nameUnparsed_blog").show();
                 $("#grantors_firstName_blog").hide();
                 $("#grantors_middleName_blog").hide();
                 $("#grantors_lastName_blog").hide();
                 $("#grantors_nameSuffix_blog").hide();
             }
         })
         
          $("#grantees_type").change(function(){
             if($("#grantees_type").val() == "individual"){
                 $("#grantees_nameUnparsed_blog").hide();
                 $("#grantees_firstName_blog").show();
                 $("#grantees_middleName_blog").show();
                 $("#grantees_lastName_blog").show();
                 $("#grantees_nameSuffix_blog").show();
             }else{
                 $("#grantees_nameUnparsed_blog").show();
                 $("#grantees_firstName_blog").hide();
                 $("#grantees_middleName_blog").hide();
                 $("#grantees_lastName_blog").hide();
                 $("#grantees_nameSuffix_blog").hide();
             }
         })
     })
 </script>