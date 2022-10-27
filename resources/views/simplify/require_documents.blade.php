<x-header-component /> 
 <section class="minbody">
     <div class="agentspg">
         <div class="pgmincontent pt-4">
             <div class="container">
                 <div class="row justify-content-end">
                     <div class="col-md-12">
                         <div class="cmpnycontentbox wow bounceInDown" data-wow-delay=".6s">
                             <h1 class="d-inline-block display-5 fw-bold mt-3 py-2 mb-3 ">Upload Require documents</h1>
                            
                            <div id="errmsg" style="color:red; padding-left:5px ">{{ Session::get('errmsg') }}</div>
                            <div id="successmsg" style="color:green; padding-left:5px ">{{ Session::get('successmsg') }}</div>
                            <form class="form-horizontal"  action="{{ url('save-document') }}" method='POST' autocomplete="off" enctype= "multipart/form-data" >
                            @csrf
                                
                                 <div class="row">
                                     
                                     
                                    <div class="col-md-12 mb-3" id="'.$blogId.'">
                                        <lable>Optimise My Document</lable>
                                        <input type="radio" name="applyMagicWand" value="true"> Yes
                                        <input type="radio" name="applyMagicWand" value="false" checked> No
                                    </div>
                                     
                                  {!! $inputfields !!}
                                 </div>
                                 <div class="row">
                                     <div class="col-md-1">
                                         <input type="submit" class="btn btn-success mb-4" value="Next">
                                     </div>
                                     <div class="col-md-1">
                                         <input type="button" class="btn btn-dark back" value="Back" onclick="history.back()">
                                     </div>
                                     <div class="col-md-10">
                                         @if($isHelperdocuments != 0)
                                         <a href="javascript:void(0)" class="btn btn-info" id="additionalId" onclick="showhelperdocuments()">Add additional document</a>
                                         <a href="javascript:void(0)" class="btn btn-danger" id="removeadditionalId" onclick="removeshowhelperdocuments()">Remove additional document</a>
                                         @endif
                                     </div>
                                    
                                 </div>
                             </form>
                             
                             <iframe src="" height="500px" width="100%" scrolling="auto" id="showpdf"></iframe>
                        
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
         $(".helperdoc").hide();
         $(".helperdocname").hide();
         $("#removeadditionalId").hide()
     })
     
    function showhelperdocuments(){
            $(".helperdoc").show();
            $(".helperdocname").show();
            $("#additionalId").hide()
            $("#removeadditionalId").show()
    }
    
    function removeshowhelperdocuments(){
          $(".helperdoc").hide();
          $(".helperdocname").hide();
          $("#additionalId").show()
          $("#removeadditionalId").hide()
    }
    
    function getFileData(myFile){
        var file = myFile.files[0];  
        $('#showpdf').attr('src', window.URL.createObjectURL(file));
    
    }
 </script>