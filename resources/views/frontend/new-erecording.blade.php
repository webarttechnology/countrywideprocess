<x-header-component />



<section class="minbody">
    <div class="pricingpg progresspg">
        <!--  <div class="cmpnyimage wow fadeInDown" data-wow-delay=".10s"><img src="images/contact-us-banner.jpg"></div> -->
        <div class="pgmincontent pt-0">
            <div class="priceimage wow fadeInDown pricetxt" data-wow-delay=".10s"><span>
                <span class="fw-bold d-block mb-2 fs-1 text-white">View County Requirements</span>
                <span  class="fw-bold-500 d-block mb-3 fs-4 text-white">Building Homes & Jobs Act (SB2)</span>
All California counties charge a $75 Affordable Housing Act Fee per transaction. Documents not subject to this fee MUST have a valid exemption clearly noted on the face of each exempt document. The county has provided a Cover Sheet to assist with this. For more information, please call Simplifile CA Support at 1-800-460-5657.
Los Angeles County will only allow the following information on the cover page: Name of the person requesting the recording, Name and address to which the recorded document is to be returned and the Title or Titles of the Document.
Los Angeles County has requested that any inquiries concerning submissions be routed through Simplifile. Please contact Simplifile Support at 800.460.5657 ext.3 regarding rejections or any questions you may have with submissions.
See the County Naming Convention Information Sheet for county required naming conventions.
Los Angeles County charges an additional $3.00 per legal sized page when it is recorded.
If the document you intended to submit is title insured, a priority queue is available for submission. To submit to the priority queue, create a package with 'Los Angeles County 7AM Priority Queue' as the 'County'. Documents submitted by 7:00 a.m. PT to this queue, on a normal recording day, will be processed the same day. . Documents submitted after 7:00 a.m. PT will be processed the following normal recording day. The priority queue is currently limited to title insured documents only.
Documents that were generated and/or signed electronically are not acceptable at this time pending regulatory review. This county will only be receiving documents that contain original signatures and original notary acknowledgments.
Re-recording requirements per County Recorders Association:
Any document submitted for re-recording will need to be re-executed by the appropriate parties:
-Re-execution includes new signatures, acknowledgments and/or verifications, depending on the type of document being re-recorded.
-A completed coversheet will be need to be included to provide adequate space for the new recording information.
-The reason for re-recording must be noted on the lead sheet or on the face of the document.</span></div>
            <div class="container-fluid">
                <div class="row justify-content-end">
                    <div class="col-md-7">
                        <div class="contentbox pb-5 px-3 wow bounceInDown" data-wow-delay=".6s">
                            <h5>Customer: 94174 - Law Office of Joseph Trenk</h5>
                            <div class="row calculetorbox">
                                <div class="col-md-8">
                                    <label>What would you like us to do ?</label>
                                    <select  class="form-select" name="service" id="service" onchange="ordersummary()" >
                                        <option selected="" value="">Select A Service</option>
                                        @foreach($service as $item)
                                        <option value="{{ $item->name }}"{{ $item->name =="County Recording"?'selected':'' }}>{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                    <span id="service_error" class="text danger"></span>
                                </div>
                            </div>
                            <div class="row" >
                                <div class="col-md-9">
                                    <div class="form-wizard">
                                        <div class="steps">
                                            <ul>
                                                <li>Order Info</li>
                                                <li>Case Info</li>
                                                <li>Case Participants</li>
                                                <li>Documents</li>
                                                <li>Order Details</li>
                                            </ul>
                                        </div>
                                        <div class="myContainer">
                                            <div class="form-container animated border shadow p-4">
                                                <h3 class="text-center form-title">Order Info</h3>
                                                <form>
                                                    <div class="row mb-3">
                                                        <div class="col-md-3"><label>Select County :</label></div>
                                                        <div class="col-md-9">
                                                            <select  class="form-select" id="county" name="county" onchange="showjurisdiction();ordersummary()">
                                                                <option value="">Select A County</option>
                                                                @foreach($county as $item)
                                                                <option value="{{ $item->county  }}">{{ $item->county  }}</option>
                                                                @endforeach
                                                            </select>
                                                            <span id="county_error" class="text-danger"></span>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3" id="div_jurisdiction" style="display:none;">
                                                        <div class="col-md-3"><label>Jurisdiction</label></div>
                                                        <div class="col-md-9">
                                                            <select  class="form-select" name="jurisdiction" id="jurisdiction" onchange="ordersummary()">
                                                                <option selected value="Alameda County Recorders - 1106 Madison Street, Oakland">Alameda County Recorders - 1106 Madison Street, Oakland</option>
                                                            </select>
                                                            <span id="jurisdiction_error" class="text-danger"></span>
                                                        </div>
                                                    </div>
                                                     
                                                    

                                                    <div class="form-group text-center mar-b-0">
                                                        <input type="button" value="NEXT" class="btn btn-primary next" id="connectData">        
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="form-container animated border shadow p-4">
                                              
                                                <h3 class="text-center form-title">Case Info</h3>
                                                <form>
                                                    <div class="row mb-3">
                                                        <div class="col-md-3"><label>Case Number:</label></div>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control" name="case_number" id="case_number" placeholder="Enter your Case Number" >
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <div class="col-md-3"></div>
                                                        <div class="col-md-9">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox"  name="flexCheckChecked" value="" id="flexCheckChecked" onclick="casenumbernotrequires()" >
                                                                <label class="form-check-label" for="flexCheckChecked">Check here if you do not have a Case Number.</label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row mb-3" id="div_jurisdiction2" style="display:none;">
                                                        <div class="col-md-3"><label>Jurisdiction</label></div>
                                                        <div class="col-md-9">
                                                            <select  class="form-select"  id="jurisdiction1">
                                                                <option selected value="">Select</option>
                                                                <option  value="Alameda County Recorders - 1106 Madison Street, Oakland">Alameda County Recorders - 1106 Madison Street, Oakland</option>
                                                                <option  value="Alameda County Recorders - 1106 Madison Street, Oakland">Alameda County Recorders - 1106 Madison Street, Oakland</option>
                                                            </select>
                                                            <span id="jurisdiction1_error" class="text-danger"></span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group text-center mar-b-0">
                                                        <input type="button" value="BACK" class="btn btn-dark back">        
                                                        <input type="button" value="NEXT" class="btn btn-primary next" id="connectData1">        
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="form-container animated border shadow p-4">
                                                <h3 class="text-center form-title">Case Participants</h3>
                                                <span id="case_participent_error" class="text-danger"></span>
                                                <p>Click to add Party(s) if not listed below: <button type="button" data-toggle="modal" data-target="#myModal" class="btn bg-theme text-white ms-2">Add Party(s)</button></p>
                                                <!-- <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button> -->


                                                 <!-- Modal Start -->
                                                <div id="myModal" class="modal fade" role="dialog">
                                                <div class="modal-dialog">

                                                    <!-- Modal content-->
                                                    <div class="modal-content">
                                                    <div class="form-container animated border shadow p-4 active" style="background: #2374ee;" >
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        <h4 class="modal-title">Add Party</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                    <form enctype="multipart/form-data" >
                                                    <div class="row mb-3" id="fileinfo">
                                                        <div class="col-md-2"><label></label></div>
                                                        <div class="col-md-8">
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" checked="checked" name="inlineRadioOptions" id="inlineRadio1" value="1">
                                                                <label class="form-check-label" for="inlineRadio1">Person</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="2">
                                                                <label class="form-check-label" for="inlineRadio2">Organization</label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row mb-3"  >
                                                        <div class="col-md-2 mb-3">
                                                        <lable>Role :<span style="color:red;">*</span></lable>
                                                            <span id="organization_name_error" class="text-danger"></span>
                                                        </div>
                                                        <div class="col-md-10 mb-3">
                                                       
                                                            <select type="text" class="form-control" id="roles">
                                                                <option value="">Select</option>
                                                                <option value="APP">Appellant</option>
                                                                <option value="CLT">Claimant</option>
                                                            </select>
                                                            <span id="organization_name_error" class="text-danger"></span>
                                                        </div>
                                                          
                                                    </div>
                                                    <div class="row mb-3" id="personblock">
                                                        <span id="suffix_error" class="text-danger"></span>
                                                        
                                                        <div class="col-md-2">
                                                            <lable>Name:<span style="color:red;">*</span></lable>
                                                        </div>

                                                        <div class="col-md-3">
                                                        <input type="text" class="form-control" id="fast_name" placeholder="First Name">
                                                        </div>
                                                        
                                                        <div class="col-md-3">
                                                            <input type="text" class="form-control" id="middle_name" placeholder="Middle Name">
                                                        </div>
                                                        <div class="col-md-3">
                                                            <input type="text" class="form-control" id="last_name" placeholder="Last Name">
                                                        </div>

                                                        <div class="col-md-2">
                                                        <lable>Suffix:</lable>
                                                          
                                                        </div>

                                                        <div class="col-md-4">
                                                        <select  class="form-select" id="suffix">
                                                                <option value="">Select</option>
                                                                <option value="Jr">Jr.</option>
                                                                <option value="Sr">Sr.</option>
                                                                <option value="I">I</option>
                                                                <option value="II">II</option>
                                                                <option value="III">III</option>
                                                                <option value="IV">IV</option>
                                                                <option value="V">V</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="row mb-3" id="organizationblock">
                                                    <div class="col-md-2">
                                                            <lable>Name:<span style="color:red;">*</span></lable>
                                                        </div>

                                                       <div class="col-md-10">
                                                       <input type="text" class="form-control" id="organigation_name" placeholder="Name">
                                                        </div>
                                                        

                                                    </div>

                                                    <div class="row mb-3">
                                                        <div class="col-md-5"><label>Is this your Lead Client ?	</label></div>
                                                        <div class="col-md-6">
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio"  name="isthisleadclient1" id="isthisleadclient1" >
                                                                <label class="form-check-label" for="isthisleadclient1">Yes</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="isthisleadclient2" id="isthisleadclient2" >
                                                                <label class="form-check-label" for="isthisleadclient2">No</label>
                                                            </div>
                                                        </div>
                                                    </div>

                                     
                                               
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-primary" data-dismiss="modal" id="addparty" >Save</button>
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                    </div>
                                                    </div>
                                                    </form>  

                                                </div>
                                                </div>

                                                <!-- Model End -->

                                                

                                                <table class="table">
                                                  <thead>
                                                    <tr>
                                                      <th>Lead Client</th>
                                                      <th>Name</th>
                                                      <th>Role</th>
                                                    </tr>
                                                  </thead>
                                                  <tbody>
                                                    <tr id="addtd">
                                                      
                                                        <th colspan="4"> <p>There are no Case Participants entered</p></th>
                                                    </tr>
                                                  </tbody>
                                                </table>
                                                <form>
                                                    
                                                    <div class="form-group text-center mar-b-0">
                                                        <input type="button" value="BACK" class="btn btn-dark back">        
                                                        <input type="button" value="NEXT" class="btn btn-primary next" id="connectData2">        
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="form-container animated border shadow p-4">
                                                <h3 class="text-center form-title">Documents</h3>
                                                <form enctype="multipart/form-data">
                                                <input type="hidden" id="imagerowcount" value="2">
                                                <input type="hidden" id="deleteposition" value="" >
                                                    <span id="image1_error" class="text-danger"></span>
                                                        <div class="row">
                                                            <div class="col-md-7 mb-3">
                                                            <label for="formFile" class="form-label">Document Title<span style="color:red"> * </span></label>
                                                                <input type="text" class="form-control" id="image_title1" name="image_title1" placeholder="Document Title">
                                                                <span id="image_title1_error" class="text-danger"></span>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <label for="formFile" class="form-label">Document 1<span style="color:red"> * </span></label>
                                                                <input class="form-control" type="file" id="image1" name="image1">
                                                                
                                                            </div>
                                                            <div class="col-md-2">
                                                            <span class="btn btn-primary" id="addrow" style="float: left;margin-top: 34px;"><i class="fa fa-plus" aria-hidden="true"></i></span>
                                                            </div>
                                                            
                                                        </div>
                                                            <span id="multipleimage"></span>
                                                            <span style="color:red;" id="radiobutton_error"></span>
                                                            <div class="col-md-12">
                                                            

                                                            </div>
                                                                <div class="form-group text-center mar-b-0 mt-3">
                                                                    <input type="button" value="BACK" class="btn btn-dark back">        
                                                                    <input type="button" value="NEXT" class="btn btn-primary next" id="connectData3">        
                                                                </div>
                                                    </form>
                                            </div>
                                            
                                            <div class="form-container animated border shadow p-4">
                                                <h3 class="text-center form-title">Order Details</h3>
                                                <form  class="payoptn" >
                                                    @csrf
                                                    <span id="radiobutton" class="text-danger"></span>
                                                  <div class="row">
                                                        <div class="col-md-12 mb-3">
                                                        <input type="hidden" id="record_id" name="record_id" >    
                                                        <input type="radio" id="payment1" name="fav_language" value="35">
                                                        
                                                            <label for="payment1">Record by Today 5:00 PM for $95.00 (Urgent) * </label><br>
                                                           
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="row">
                                                        <div class="col-md-12 mb-3">
                                                        <input type="radio" id="payment2" name="fav_language" value="65">
                                                        <label for="payment2">Record by Tomorrow 5:00 PM for $65.00 (Priority) * </label><br>
                                                           
                                                        </div>
                                                     </div>  
                                                     <div class="row">  
                                                        <div class="col-md-12 mb-3">
                                                        <input type="radio" id="payment3" name="fav_language" value="95">
                                                        <label for="payment3">Record by Friday 5:00 PM for $55.00 (Routine) * </label><br>
                                                           
                                                        </div>
                                                      </div>
                                                        <input type="button" value="BACK" class="btn btn-dark back"> 
                                                        <input type="button" value="Payment"  id="connectData5" class="btn btn-primary">   
                                                    </div>
                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                <!-- </div> -->
                                <div class="col-md-3">
                                    <div class="border mt-5 ordersumari shadow">
                                        <h3 class="bg-theme fs-5 py-2 text-center text-white mb-0">Order Summary</h3>
                                        <div class="content">
                                            <h6 class="text-center" id="service_summary">{{ Session::get('service') }}</h6>
                                            <p class="order-info" style="display:none"><b class="fw-bold">County :</b> <span id="county_summary"></span> </p>
                                            <p class="order-info" style="display:none"><b class="fw-bold">Jurisdiction :</b> <span id="jurisdiction_summary"></span></p>
                                            <p class="case-info" style="display:none"><b class="fw-bold">Case Number :</b> <span id="case_number_summary"></span></p>
                                            <p class="party-info" style="display:none"><b class="fw-bold">Party As :</b> <span id="party_summary"></span></p>
                                            <p class="party-info" style="display:none"><b class="fw-bold">Party Name :</b> <span id="party_name_summary"></span></p>
                                            <p class="party-info"  style="display:none"><b class="fw-bold">Party Role :</b> <span id="role_summary"></span></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<x-footer-component />


<script type="text/javascript">
    // searchable Autocomplete start
    $(document).ready(function(){
            
            // Initialize select2
            $("#county").select2();

            // Read selected option
            $('#but_read').click(function(){
                var username = $('#county option:selected').text();
                var userid = $('#county').val();
           
                $('#result').html("id : " + userid + ", name : " + username);
            });
        });

    // searchable Autocomplete end
 var totalSteps = $(".steps li").length;

$(".submit").on("click", function(){
  return false; 
});

$(".steps li:nth-of-type(1)").addClass("active");
$(".myContainer .form-container:nth-of-type(1)").addClass("active");

$(".form-container").on("click", ".next", function() { 
  $(".steps li").eq($(this).parents(".form-container").index() + 1).addClass("active"); 
  $(this).parents(".form-container").removeClass("active").next().addClass("active flipInX");   
});

$(".form-container").on("click", ".back", function() {  
  $(".steps li").eq($(this).parents(".form-container").index() - totalSteps).removeClass("active"); 
  $(this).parents(".form-container").removeClass("active flipInX").prev().addClass("active flipInY"); 
});


/*=========================================================
*     If you won't to make steps clickable, Please comment below code 
=================================================================*/
$(".steps li").on("click", function() {
  var stepVal = $(this).find("span").text();
  $(this).prevAll().addClass("active");
  $(this).addClass("active");
  $(this).nextAll().removeClass("active");
  $(".myContainer .form-container").removeClass("active flipInX");  
  $(".myContainer .form-container:nth-of-type("+ stepVal +")").addClass("active flipInX");     
});


$(document).ready(function(){
    $("#organizationblock").hide();
    $("#sb2-block").hide(); 
    $("#fileinfo input:radio").change(function () {        
        if ($(this).val() == "1"){
            $("#organizationblock").hide();
            $("#personblock").show();
        } else {
            $("#organizationblock").show();
            $("#personblock").hide();
        }
    })
});

let presentCount = 2;
$("#addrow").click(function () {
       delrowpos = $("#deleteposition").val();
        const presentCount = parseInt($("#imagerowcount").val());
       // alert(presentCount);
          if( presentCount <= 4){  
              if(delrowpos == '') {       
                markup = '<div class="row" id="deleterow'+ presentCount +'"><div class="col-md-7 mb-3"><input type="text" class="form-control" id="image_title'+ presentCount +'" name="image_title'+presentCount+'" placeholder="Document Title"></div><div class="col-md-3"><input class="form-control" type="file" id="image'+presentCount+'" name="image'+presentCount+'"></div><div class="col-md-2"><button class="btn btn-danger "   onclick="deleteRow('+ presentCount +')"><i class="fa fa-trash-o" aria-hidden="true"></i></button></div></div>' ;
                tableBody = $("#multipleimage");
                tableBody.append(markup);
                $("#imagerowcount").val(presentCount + 1)              
                $("#radiobutton_error").html(" ");
                $("#radiobutton_error").focus();
              }else if(delrowpos == 2 && document.getElementById("image2") == null){
                markup = '<div class="row" id="deleterow2"><div class="col-md-7 mb-3"><input type="text" class="form-control" id="image_title2" name="image_title2" placeholder="Document Title"></div><div class="col-md-3"><input class="form-control" type="file" id="image2" name="image2"></div><div class="col-md-2"><button class="btn btn-danger "   onclick="deleteRow(2)"><i class="fa fa-trash-o" aria-hidden="true"></i></button></div></div>' ;
                tableBody = $("#multipleimage");
                tableBody.append(markup);
                $("#imagerowcount").val(presentCount + 1)              
                $("#radiobutton_error").html(" ");
                $("#radiobutton_error").focus();
              }else if(delrowpos == 3 && document.getElementById("image3") == null){
                markup = '<div class="row" id="deleterow3"><div class="col-md-7 mb-3"><input type="text" class="form-control" id="image_title3" name="image_title3" placeholder="Document Title"></div><div class="col-md-3"><input class="form-control" type="file" id="image3" name="image3"></div><div class="col-md-2"><button class="btn btn-danger "   onclick="deleteRow(3)"><i class="fa fa-trash-o" aria-hidden="true"></i></button></div></div>' ;
                tableBody = $("#multipleimage");
                tableBody.append(markup);
                $("#imagerowcount").val(presentCount + 1)              
                $("#radiobutton_error").html(" ");
                $("#radiobutton_error").focus();
              }else{
                markup = '<div class="row" id="deleterow'+ presentCount +'"><div class="col-md-7 mb-3"><input type="text" class="form-control" id="image_title'+ presentCount +'" name="image_title'+presentCount+'" placeholder="Document Title"></div><div class="col-md-3"><input class="form-control" type="file" id="image'+presentCount+'" name="image'+presentCount+'"></div><div class="col-md-2"><button class="btn btn-danger "   onclick="deleteRow('+ presentCount +')"><i class="fa fa-trash-o" aria-hidden="true"></i></button></div></div>' ;
                tableBody = $("#multipleimage");
                tableBody.append(markup);
                $("#imagerowcount").val(presentCount + 1)              
                $("#radiobutton_error").html(" ");
                $("#radiobutton_error").focus();
              }
          }else{
            $("#radiobutton_error").html("You cannot upload more than three supporting documents. Contact us if you have more than three supporting documents!").css("color", "red");
            $("#radiobutton_error").focus();
          }
    });



    function deleteRow(lineno){
        const presentCount = parseInt($("#imagerowcount").val());
    // alert(presentCount);
        $("#deleterow"+lineno).click(function () {       
            $('#deleterow'+lineno).remove();        
            $("#imagerowcount").val(presentCount - 1);      
        });
        $("#deleteposition").val(lineno);

        $("#radiobutton_error").html("").css("color", "white");
    }



$("#connectData").click(function(){

if($("#service").val() == ''){
    $("#service_error").html("Service Name must be required!");
    $("#service").focus();
    return false;
}else if($("#county").val() == ''){
    $("#county_error").html("County Name must be required!");
    $("#county").focus();
    return false;
}else if($("#jurisdiction").val() == ''){
   // $("#jurisdiction_error").html("Country Name must be required!");
   // $("#jurisdiction").focus();
    return false;
}else{
    const xCsrfToken = "{{ csrf_token() }}";
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': xCsrfToken
        }
    });
    var form_data = new FormData(); 
    form_data.append('service', $("#service").val());
    form_data.append('county', $("#county").val());
    form_data.append('jurisdiction', $("#jurisdiction").val());  
    form_data.append('form_status', 1);
   
    $.ajax({
        url: "{{ URL::to('/order-info')}}",
        type: "POST",
        data: form_data,
        enctype: 'multipart/form-data',
        processData: false,  // tell jQuery not to process the data
        contentType: false,   // tell jQuery not to set contentType
        success: function(data){
         console.log(data);
         $('.order-info').show();
         $('#service_summary').html(data.service);
         $('#county_summary').html(data.county);
         $('#jurisdiction_summary').html(data.jurisdiction);
        }
    })
}
})


$("#connectData1").click(function(){

if($("#flexCheckChecked").is(":checked") == false && $('#case_number').val() == '' && $('#jurisdiction1').val() == ''){
    $("#div_jurisdiction2").show();
    $("#jurisdiction1_error").html("Please Select a Jurisdiction"); 
    return false;
}else{
    const xCsrfToken = "{{ csrf_token() }}";
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': xCsrfToken
        }
    });
    var form_data = new FormData(); 
    form_data.append('case_number', $("#case_number").val());
    form_data.append('flexCheckChecked', $("#flexCheckChecked").is(":checked"));
    form_data.append('jurisdiction1', $("#jurisdiction1").val());  
    form_data.append('form_status', 2);
   
    $.ajax({
        url: "{{ URL::to('/case-info')}}",
        type: "POST",
        data: form_data,
        enctype: 'multipart/form-data',
        processData: false,  // tell jQuery not to process the data
        contentType: false,   // tell jQuery not to set contentType
        success: function(data){
         console.log(data);
         $('.case-info').show();
         if(data.jurisdiction !=  null ){
            $('#jurisdiction_summary').html(data.jurisdiction);
         }
         $('#case_number_summary').html(data.case_number);
        }
    })
}
})


$("#connectData2").click(function(){

if($('input[name="checkerror"]').val() == undefined){  
    $("#case_participent_error").html("Please enter Case Participants."); 
    return false;
}else{
    const xCsrfToken = "{{ csrf_token() }}";
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': xCsrfToken
        }
    });
    var form_data = new FormData(); 
    form_data.append('case_number', $("#case_number").val());
    form_data.append('flexCheckChecked', $("#flexCheckChecked").is(":checked"));
    form_data.append('jurisdiction1', $("#jurisdiction1").val());  
    form_data.append('form_status', 2);
   
    $.ajax({
        url: "{{ URL::to('/case-info')}}",
        type: "POST",
        data: form_data,
        enctype: 'multipart/form-data',
        processData: false,  // tell jQuery not to process the data
        contentType: false,   // tell jQuery not to set contentType
        success: function(data){
         console.log(data);
        }
    })
}
})



$("#addparty").click(function(){


    const xCsrfToken = "{{ csrf_token() }}";
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': xCsrfToken
        }
    });
    var form_data = new FormData(); 
    form_data.append('roles', $("#roles").val());
    form_data.append('inlineRadio1', $("#inlineRadio1").is(":checked"));
    form_data.append('inlineRadio2', $("#inlineRadio2").is(":checked"));  
    form_data.append('fast_name', $("#fast_name").val());
    form_data.append('middle_name', $("#middle_name").val());
    form_data.append('last_name', $("#last_name").val());
    form_data.append('organigation_name', $("#organigation_name").val());
    form_data.append('suffix', $("#suffix").val());
    form_data.append('isthisleadclient1', $("#isthisleadclient1").is(":checked"));
    form_data.append('isthisleadclient2', $("#isthisleadclient2").is(":checked"));
   
    $.ajax({
        url: "{{ URL::to('/add-party')}}",
        type: "POST",
        data: form_data,
        enctype: 'multipart/form-data',
        processData: false,  // tell jQuery not to process the data
        contentType: false,   // tell jQuery not to set contentType
        success: function(data){
         console.log(data);
         $('.party-info').show();
         $('#addtd').html(data.party_record);
         if(data.person == "true"){
            $('#party_name_summary').html(data.peoplename);
            $('#party_summary').html("Person");
         }else{
            $('#party_name_summary').html(data.organigation_name);
            $('#party_summary').html("Organization");
         }
         $('#role_summary').html(data.roles);
    
        }
    })

})





function showjurisdiction(){
    $('#div_jurisdiction').show();
}

function casenumbernotrequires(){
   if($('#flexCheckChecked').is(":checked") == true){
        $("#case_number").val('Not Applicable').attr('readonly',true);
   }else{
        $("#case_number").val("").attr('readonly',false);
   }

}

function ordersummary(){
   var service = $('#service').val();
   var county =$('#county').val();
   $('#service_summary').html(service);
   $('#county_summary').html(county);
}



</script>