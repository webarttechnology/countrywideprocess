<x-header-component /> 
 <section class="minbody">
     <div class="agentspg">
         <div class="pgmincontent pt-4">
             <div class="container">
                 <div class="row justify-content-end">
                     <div class="col-md-12">
                         <div class="cmpnycontentbox wow bounceInDown" data-wow-delay=".6s">
                            <span style="color:red" id="errmsg"></span>
                            <div>
                                <p>Click on the Add document button to add new document & click on submit button to create package.</p>
                            </div>
                             <a href="{{ url('new-request') }}" class="btn btn-success">Add new document</a>
                             <a href="javascript:void(0)"  class="btn btn-info" onclick="submit();" id="submitbtn">Submit Package</a>
                             <a href="javascript:void(0)" style="width: 10%; float: inherit" class="btn progress-bar progress-bar-striped progress-bar-animated" id="inprogressbtn">Inprogress...</a>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </section>
 
 <div class="modal" tabindex="-1" role="dialog" id="myModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body text-center">
        <img src="{{ asset('public/success-icon-10.png') }}" style="width:150px;" />
        <p class="display-6 mt-4 text-success">Your Package has been submitted successfully.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" onclick="closepop()">Close</button>
      </div>
    </div>
  </div>
</div>
 
 
 <x-footer-component />
 <script>
     $(document).ready(function(){
         $("#inprogressbtn").hide();
     })
     function submit(){
        $("#inprogressbtn").show();
        $("#submitbtn").hide();
        
        $.ajax({
            type: "get",
            url: "{{ url('submit-document') }}",
            success: function(data){
                if(data == "SUCCESS"){
                     $("#inprogressbtn").hide();
                    $('#myModal').modal('show');
                }else{
                    $("#errmsg").html(data)
                    $("#inprogressbtn").hide();
                    $("#submitbtn").show();
                }
            }
        })
     }
     
     function closepop(){
         $('#myModal').modal('hide');
         window.location.href="{{ url('/') }}"
     }
 </script>