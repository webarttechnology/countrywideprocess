<x-header-component />


<section class="minbody" id="div_makepayment">
    <div class="pricingpg progresspg" >
        <!--  <div class="cmpnyimage wow fadeInDown" data-wow-delay=".10s"><img src="images/contact-us-banner.jpg"></div> -->
        <div class="pgmincontent pt-0">
            <div class="priceimage wow fadeInDown" data-wow-delay=".10s"><img src="{{ asset('design/images/step-bg.jpg') }}"></div>
            <div class="container-fluid">
                <div class="row justify-content-end">
                    <div class="col-md-12 col-lg-8">
                        <div class="contentbox pb-5 px-3 wow bounceInDown" data-wow-delay=".6s">
                            <h5>Assisted eRecording Form</h5>
                              <div class="row calculetorbox">
                                <div class="col-md-12">
                                    <div class="row">

                                       <div class="col-md-12">
                                            
                                            <label>State</label>
                                            <select  class="form-select" name="name" id="name" onchange="loadcountryName(); checknewyork()">
                                                <option selected value="">Select A State</option>
                                                @foreach($state as $item)
                                                    <option value="{{ $item->name}}">{{ $item->name }}</option>
                                                @endforeach
                                           </select>
                                            <span id="state_error" class="text-danger"></span>                    
                                        </div>

                                        <div class="col-md-12" id="div_county">                                          
                                            <label>county</label>
                                            <select  class="form-select" name="county" id="county">
                                                <option selected value="">County</option>
                                             </select>
                                            <span id="county_error" class="text-danger"></span>
                                            
                                        </div>
                                        <div class="col-md-12">
                                            
                                            <label>What type of Document are you Recording?</label>
                                            <select  class="form-select" name="document_type" id="document_type">
                                            <option selected value="">Select A Option</option>
                                            <option value="Property (DEEDS, Affidavits etc)">Property (DEEDS, Affidavits etc)</option>
                                            <option value="Construction (Liens and releases)">Construction (Liens and releases)</option>
                                            <option value="Court (Abstracts and LIS PENDENS)">Court (Abstracts and LIS PENDENS)</option>
                                            <option value="Other (eg: Power of Attorney)">Other (eg: Power of Attorney)</option>
                                                
                                            </select>
                                            <span id="doc_error" class="text-danger"></span>
                                            
                                        </div>
                                       
                                      
                                     
                                       
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-wizard">
                                        <div class="steps">
                                            <ul>
                                                <li>Grantor Information</li>
                                                <li id="div_legal">Legal Descriptions</li>                                           
                                                <li>Grantee Information</li>
                                                <li>Property Taxation Info</li>
                                                <li>Documents Tab</li>
                                                <li>Service Level</li>                                            
                                         
                                                 
                                            </ul>
                                        </div>
                                        <div class="myContainer">
                                            <div class="form-container animated border shadow p-4">

                                               <form enctype="multipart/form-data" id="fileinfo">
                                                    <div class="row mb-3">
                                                        <div class="col-md-2"><label>Grantor is a?</label></div>
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
                                                    <h3 class="form-title fs-6" id="title">Person</h3>

                                                    <div class="row mb-3" id="organizationblock">
                                                        <div class="col-md-6 mb-3">
                                                        <lable>Organization Name :<span style="color:red;">*</span></lable>
                                                            <input type="text" class="form-control" id="organization_name" placeholder="Organization name">
                                                            <span id="organization_name_error" class="text-danger"></span>
                                                        </div>
                                                        
                                                        <div class="col-md-6 mb-3">
                                                        <lable>Authorized Agent name :<span style="color:red;">*</span></lable>
                                                            <input type="text" class="form-control" id="authorized_agent_name" placeholder="Authorized Agent name">
                                                            <span id="authorized_agent_name_error" class="text-danger"></span>
                                                        </div>  
                                                    </div>
                                                    <div class="row mb-3">
                                                        <span id="suffix_error" class="text-danger"></span>
                                                      
                                                        <div class="col-md-4">
                                                            <lable>Grantor First Name :<span style="color:red;">*</span></lable>
                                                            <input type="text" class="form-control" id="first_name" placeholder="First Name">
                                                        </div>
                                                        
                                                        <div class="col-md-3">
                                                        <lable>Grantor Middle Name :</lable>
                                                            <input type="text" class="form-control" id="middle_name" placeholder="Middle Name">
                                                        </div>
                                                        <div class="col-md-3">
                                                            <lable>Grantor Last Name :<span style="color:red;">*</span></lable>
                                                            <input type="text" class="form-control" id="last_name" placeholder="Last Name">
                                                        </div>

                                                        <div class="col-md-2">
                                                        <lable>Suffix :</lable>
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

                                     
                                                  
                                                    
                                                    <div class="form-group text-center mar-b-0">
                                                        <input type="button" value="NEXT" class="btn btn-primary next" id="connectData">
                                                    </div>
                                                </form>
                                            </div>

                                            <!-- Legal Description Start -->
                                           
                                            <div class="form-container animated border shadow p-4" id="div_legaldescription" disable>
                                               

                                               <form id="fileinfo4">
                                                

                                                 <div class="row mb-3">
                                                 <span id="section_error" class="text-danger"></span>
                                                     <div class="col-md-4">
                                                         <lable>Section :<span style="color:red;">*</span></lable>
                                                         <input type="text" class="form-control" id="section" placeholder="Section">
                                                        
                                                     </div>
                                                     <div class="col-md-4">
                                                     <lable>Block :<span style="color:red;">*</span></lable>
                                                         <input type="text" class="form-control" id="block" placeholder="Block">
                                                     </div>
                                                     <div class="col-md-4">
                                                     <lable>Lot :<span style="color:red;">*</span></lable>
                                                         <input type="text" class="form-control" id="lot" placeholder="Lot">
                                                     </div>
                                                     <div class="col-md-6">
                                                        <lable>Unit :</lable>
                                                         <input type="text" class="form-control" id="unit" placeholder="Unit">
                                                     </div>
                                                     <div class="col-md-6">
                                                         <lable>Town :</lable>
                                                         <input type="text" class="form-control" id="town" placeholder="Town">
                                                     </div>
                                                    
                                                 </div>
                                                
                                                 
                                                  <div class="form-group text-center mar-b-0">
                                                     <input type="button" value="BACK" class="btn btn-dark back">        
                                                     <input type="button" value="NEXT" class="btn btn-primary next" id="connectData4">        
                                                 </div>
                                             </form>
                                         </div>

                                        

                                         

                                         <!-- End Legal Description -->

                                         <!-- Start Grantee Information  -->
                                         <div class="form-container animated border shadow p-4">
                                               

                                               <form id="fileinfo2">
                                                 <div class="row mb-3">
                                                 <span id="grantee_suffix_error" class="text-danger"></span>
                                                     <div class="col-md-2"><label>grantee is a?</label></div>
                                                     <div class="col-md-8">
                                                         <div class="form-check form-check-inline">
                                                             <input class="form-check-input" type="radio" name="inlineRadioOptions" checked="checked" id="grantee_inlineRadio1" value="1">
                                                             <label class="form-check-label" for="grantee_inlineRadio1">Person</label>
                                                         </div>
                                                         <div class="form-check form-check-inline">
                                                             <input class="form-check-input" type="radio" name="inlineRadioOptions" id="grantee_inlineRadio2" value="2">
                                                             <label class="form-check-label" for="grantee_inlineRadio2">Organization</label>
                                                         </div>
                                                     </div>
                                                 </div>
                                                 <h3 class="form-title fs-6" id="grantee_title">Persons</h3>

                                                 <div class="row mb-3" id="grantee_organization_block">
                                                     <div class="col-md-6 mb-3">
                                                         <lable>Organization Name :<span style="color:red;">*</span></lable>
                                                         <input type="text" class="form-control" id="grantee_organization_name" placeholder="Organization name">
                                                     </div>
                                                     <div class="col-md-6 mb-3">
                                                     <lable>Authorized Agent name :<span style="color:red;">*</span></lable>
                                                         <input type="text" class="form-control" id="grantee_authorized_agent_name" placeholder="Authorized Agent name">
                                                     </div> 
                                                 </div>

                                                 <div class="row mb-3">
                                                    
                                                     <div class="col-md-4">
                                                     <lable>Grantee First Name :<span style="color:red;">*</span></lable>
                                                         <input type="text" class="form-control" id="grantee_first_name" placeholder="First Name">
                                                     </div>
                                                     <div class="col-md-3">
                                                     <lable>Grantee Middle Name :</lable>
                                                         <input type="text" class="form-control" id="grantee_middle_name" placeholder="Middle Name">
                                                     </div>
                                                     <div class="col-md-3">
                                                     <lable>Grantee Last Name :<span style="color:red;">*</span></lable>
                                                         <input type="text" class="form-control" id="grantee_last_name" placeholder="Last Name">
                                                     </div>
                                                     <div class="col-md-2">
                                                     <lable>Suffix :</lable>
                                                         <select  class="form-select" id="grantee_suffix">
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

                                                 <div class="row mb-3">
                                                        <span id="suffix_error" class="text-danger"></span>
                                                      
                                                        <div class="col-md-6">
                                                            <lable>Execution date :<span style="color:red;">*</span> <lable>
                                                            <input type="date" class="form-control" id="execution_date" placeholder="Execution Date">
                                                        </div>
                                                        
                                                        <div class="col-md-6">
                                                            <lable>Cosideration amount :<span style="color:red;">*</span> <lable>
                                                            <input type="text" class="form-control" id="consideration" placeholder="Cosideration amount">
                                                        </div>
                                                    </div>
                                                
                                                 
                                                  <div class="form-group text-center mar-b-0">
                                                     <input type="button" value="BACK" class="btn btn-dark back">        
                                                     <input type="button" value="NEXT" class="btn btn-primary next" id="connectData1">        
                                                 </div>
                                             </form>
                                         </div>


                                         <!-- End Grantee Information  -->


                                         <!-- Start Property Taxation Info -->


                                         <div class="form-container animated border shadow p-4">
                                           <form id="fileinfo3">
                                                 <div class="row mb-3">
                                                     <div class="col-md-3"><label>Transfer Tax Exempt?</label></div>
                                                     <span id="error" class="text-danger"></span>
                                                     <div class="col-md-9">
                                                         <div class="form-check form-check-inline">
                                                             <input class="form-check-input" type="radio" name="inlineRadioOptions" id="transfer_tax_exempt1" checked value="1">
                                                             <label class="form-check-label" for="inlineRadio1">Yes</label>
                                                         </div>
                                                         <div class="form-check form-check-inline">
                                                             <input class="form-check-input" type="radio" name="inlineRadioOptions" id="transfer_tax_exempt2" value="0">
                                                             <label class="form-check-label" for="inlineRadio2">No</label>
                                                         </div>
                                                     </div>
                                                     <div class="col-md-12 mt-3">
                                                         <label>Consideration Amount in $ :<span style="color:red;">*</span></label>
                                                         <input type="text" class="form-control" id="consideration_amount" name="consideration_amount" placeholder="Consideration Amount in $">
                                                     </div>
                                                     <div class="col-md-4 mt-3">
                                                         
                                                         <label>Party Count :<span style="color:red;">*</span></label>
                                                         <input type="text" class="form-control" id="party_count" name="party_count" placeholder="Party Count">
                                                         
                                                     </div>
                                                     <div class="col-md-4 mt-3">
                                                         
                                                         <label>Transfer Tax($) :<span style="color:red;">*</span></label>
                                                         <input type="text" class="form-control" id="transfer_tax" name="transfer_tax" placeholder="Transfer Tax($)"/>
                                                         
                                                     </div>
                                                     <div class="col-md-4 mt-3">
                                                         
                                                         <label>Title Count :<span style="color:red;">*</span></label>
                                                         <input type="text" class="form-control" id="title_count" name="title_count" placeholder="Title Count"/>
                                                         
                                                     </div>
                                                     <div class="col-md-12 mt-3">
                                                         <div class="form-check">
                                                         <input class="form-check-input" type="checkbox" value="1" id="sb2" name="sb2">
                                                         <label class="form-check-label" for="defaultCheck1">
                                                         SB2 Fee Exempt 
                                                         </label>
                                                         </div>
                                                     </div>

                                                     <div class="col-md-12 mt-3" id="sb2-block">
                                                         <div class="form-check">
                                                         The State of California, as well as cities, counties and other political subdivisions in the State, are officially exempt from paying a recently enacted $75 fee for document recording. 
                                                         </div>
                                                     </div>


                                                     <div class="form-group text-center mar-b-0">
                                                     <input type="button" value="BACK" class="btn btn-dark back">        
                                                     <input type="button" value="NEXT" class="btn btn-primary next" id="connectData2">         
                                                 </div>
                                                 </div>
                                             </form>
                                         </div>

                                          <!-- End Property Taxation Info -->


                                           
                                            <!-- Start Document Tab -->

                                            <div class="form-container animated border shadow p-4">
                                                
                                        <form enctype="multipart/form-data">
                                        <input type="hidden" id="imagerowcount" value="2">
                                        <input type="hidden" id="deleteposition" value="" >
                                        <span id="image1_error" class="text-danger"></span>
                                            <div class="row">
                                                <div class="col-md-7 mb-3">
                                                <label for="formFile" class="form-label">Upload Document to be recorded<span style="color:red"> * </span></label>
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
                                                   <span><b>The first page of the document has to be a TITLE PAGE in order to avoid rejection from the county. Title page varies with each county, Check with your county prior to submitting.</b></span>

                                                 </div>
                                                    <div class="form-group text-center mar-b-0 mt-3">
                                                        <input type="button" value="BACK" class="btn btn-dark back">        
                                                        <input type="button" value="NEXT" class="btn btn-primary next" id="connectData3">        
                                                    </div>
                                        </form>
                                            </div>

                                            <!-- End Document Tab -->

                                            <!-- Start Service Level -->
                                            
                                            <div class="form-container animated border shadow p-4">
                                               
                                                <h3 class="text-center form-title">Choose Your Service Level</h3>
                                                <span></span>
                                                <div class="form-group text-start mar-b-0"> 
                                                <form  class="payoptn" method="post" action="{{ URL::to('payment') }}" onsubmit="valid()">
                                                    @csrf
                                                    <span id="radiobutton" class="text-danger"></span>
                                                  <div class="row">
                                                        <div class="col-md-12 mb-3">
                                                        <input type="hidden" id="record_id" name="record_id" >    
                                                        <input type="radio" id="payment1" name="fav_language" value="35">
                                                        
                                                            <label for="payment1">Routine (within 72 hours): $35 </label><br>
                                                           
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="row">
                                                        <div class="col-md-12 mb-3">
                                                        <input type="radio" id="payment2" name="fav_language" value="65">
                                                        <label for="payment2">Urgent (Same day, until midnight): $65 </label><br>
                                                           
                                                        </div>
                                                     </div>  
                                                     <div class="row">  
                                                        <div class="col-md-12 mb-3">
                                                        <input type="radio" id="payment3" name="fav_language" value="95">
                                                        <label for="payment3">On Demand (within 3 hours) : $95 </label><br>
                                                           
                                                        </div>
                                                      </div>
                                                        <!-- <input type="button" value="BACK" class="btn btn-dark back">  -->
                                                        <input type="submit" value="Payment"  id="connectData5" class="btn btn-primary">   
                                                    </div>
                                                </form>
                                              
                                            </div>
                                            <!-- End Service Level -->
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
//Searchable Autocomplete
$(document).ready(function(){
            
            // Initialize select2
            $("#name").select2();

            // Read selected option
            $('#but_read').click(function(){
                var username = $('#name option:selected').text();
                var userid = $('#name').val();
           
                $('#result').html("id : " + userid + ", name : " + username);
            });
        });

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

//end searchable Autocomplete


var totalSteps = $(".steps li").length;
$(".steps li:nth-of-type(1)").addClass("active");
$(".myContainer .form-container:nth-of-type(1)").addClass("active");

$(".form-container").on("click", ".next", function() { 

    if($("#name").val() == 'New York' && $(this).parents(".form-container").index() == 0 ){      
        $(".steps li").eq($(this).parents(".form-container").index() + 1).addClass("active");  
        $(this).parents(".form-container").removeClass("active").next().addClass("active flipInX");       
    }else{     
        
        if($(this).parents(".form-container").index() == 0){
            $(".steps li").eq($(this).parents(".form-container").index() + 2).addClass("active"); 
            $(this).parents(".form-container").removeClass("active").next().next().addClass("active flipInX"); 
        }else{
            $(".steps li").eq($(this).parents(".form-container").index() + 1).addClass("active"); 
            $(this).parents(".form-container").removeClass("active").next().addClass("active flipInX"); 
        }
       
    }    
    
});

$(".form-container").on("click", ".back", function() {  
    if($("#name").val() == 'New York' ){      
       $(".steps li").eq($(this).parents(".form-container").index() - totalSteps).removeClass("active");
       $(this).parents(".form-container").removeClass("active flipInX").prev().addClass("active flipInY");
   }else{

       if($(this).parents(".form-container").index() == 2){            
           $(".steps li").eq(2).removeClass("active");
           $(this).parents(".form-container").removeClass("active flipInX").prev().prev().addClass("active flipInY");
       }else{
           $(".steps li").eq($(this).parents(".form-container").index() - totalSteps).removeClass("active");
           $(this).parents(".form-container").removeClass("active flipInX").prev().addClass("active flipInY");
       }
       
   }
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
    $("#grantee_organization_block").hide();
    $("#sb2-block").hide(); 
    $("#fileinfo input:radio").change(function () {        
        if ($(this).val() == "1"){
            $("#organizationblock").hide();
            $("#title").html("Person");
        } else {
            $("#title").html("Organization");
            $("#organizationblock").show();
        }
    });

    $("#fileinfo2 input:radio").change(function () {        
        if ($(this).val() == "1"){
            $("#grantee_organization_block").hide();
            $("#grantee_title").html("Person");
        } else {
            $("#grantee_title").html("Organization");
            $("#grantee_organization_block").show();
        }
    });

    $("#fileinfo3 input:checkbox").change(function () {        
        if($('#sb2').is(":checked") == true){
            $("#sb2-block").show();
        }else{
            $("#sb2-block").hide(); 
        }
    });



    $("#connectData").click(function(){

        if($("#name").val() == ''){
            $("#state_error").html("State Name must be required!");
            $("#name").focus();
            return false;
        }else if($("#county").val() == ''){
            $("#county_error").html("Country Name must be required!");
            $("#county").focus();
            return false;
        }else if($("#document_type").val() == ''){
            $("#doc_error").html("Document type must be required!");
            $("#document_type").focus();
            return false;
        }else if($('#inlineRadio2').is(":checked") && $("#organization_name").val() == ''){           
            $("#suffix_error").html("Organization name must be required!");
            $("#organization_name").focus();
            return false;           
        }else if($('#inlineRadio2').is(":checked") && $("#authorized_agent_name").val() == ''){          
           $("#suffix_error").html("Authorized agent name must be required!");
           $("#authorized_agent_name").focus();
           return false;     
        }else if($("#first_name").val() == ''){
            $("#suffix_error").html("First name must be required!");
            $("#first_name").focus();
            return false;
        }else if($("#last_name").val() == ''){
            $("#suffix_error").html("Last name must be required!");
            $("#last_name").focus();
            return false;
        }else{
            const xCsrfToken = "{{ csrf_token() }}";
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': xCsrfToken
                }
            });
            var form_data = new FormData(); 
            form_data.append('state_name', $("#name").val());
            form_data.append('county', $("#county").val());
            form_data.append('document_type', $("#document_type").val());
            form_data.append('suffix', $("#suffix").val());
            form_data.append('inlineRadio2', $('#inlineRadio2').is(":checked"));
            form_data.append('inlineRadio1', $('#inlineRadio1').is(":checked"));
            form_data.append('first_name', $("#first_name").val());
            form_data.append('last_name', $("#last_name").val());          
            form_data.append('organization_name', $("#organization_name").val());
            form_data.append('authorized_agent_name', $("#authorized_agent_name").val());
           
            form_data.append('form_status', 1);
           
            $.ajax({
                url: "{{ URL::to('/erecording-service')}}",
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

$("#connectData1").click(function(){
    if($("#name").val() == ''){
        $("#state_error").html("State Name must be required!");
        $("#name").focus();
        return false;
    }else if($("#county").val() == ''){
        $("#county_error").html("Country Name must be required!");
        $("#county").focus();
        return false;
   }else if($("#document_type").val() == ''){
    $("#doc_error").html("Document type must be required!");
    $("#document_type").focus();
    return false;
}else if($('#grantee_inlineRadio2').is(":checked") && $("#grantee_organization_name").val() == ''){
        $("#grantee_suffix_error").html("Organization name must be required!");
        $("#grantee_organization_name").focus();
        return false;    
}else if($('#grantee_inlineRadio2').is(":checked") && $("#grantee_authorized_agent_name").val() == ''){
        $("#grantee_suffix_error").html("Organization name must be required!");
        $("#grantee_organization_name").focus();
        return false;       
}else if($("#grantee_first_name").val() == ''){
    $("#grantee_suffix_error").html("First name must be required!");
    $("#grantee_first_name").focus();
    return false;
}else if($("#grantee_last_name").val() == ''){
    $("#grantee_suffix_error").html("Last name must be required!");
    $("#grantee_last_name").focus();
    return false;
}else if($("#execution_date").val() == ''){
    $("#suffix_error").html("Execution Date must be required!");
    $("#execution_date").focus();
    return false;
}else if($("#consideration").val() == ''){
    $("#suffix_error").html("Consideration must be required!");
    $("#consideration").focus();
    return false;
}else{
    const xCsrfToken = "{{ csrf_token() }}";
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': xCsrfToken
        }
    });
    var form_data = new FormData(); 
    form_data.append('state_name', $("#name").val());
    form_data.append('county', $("#county").val());
    form_data.append('form_status', 2);
    form_data.append('document_type', $("#document_type").val());
    form_data.append('grantee_suffix', $("#grantee_suffix").val());
    form_data.append('grantee_inlineRadio2', $('#grantee_inlineRadio2').is(":checked"));
    form_data.append('grantee_inlineRadio1', $('#grantee_inlineRadio1').is(":checked"));
    form_data.append('grantee_first_name', $("#grantee_first_name").val());
    form_data.append('grantee_last_name', $("#grantee_last_name").val());          
    form_data.append('grantee_organization_name', $("#grantee_organization_name").val());
    form_data.append('grantee_authorized_agent_name', $("#grantee_authorized_agent_name").val());
    form_data.append('execution_date', $("#execution_date").val());
    form_data.append('consideration', $("#consideration").val());

    $.ajax({
        url: "{{ URL::to('/erecording-service')}}",
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


$("#connectData2").click(function(){

    if($("#name").val() == ''){
        $("#state_error").html("State Name must be required!");
        $("#name").focus();
        return false;
    }else if($("#county").val() == ''){
        $("#county_error").html("Country Name must be required!");
        $("#county").focus();
        return false;
   }else if($("#document_type").val() == ''){
    $("#doc_error").html("Document type must be required!");
    $("#document_type").focus();
    return false;
}else if($("#consideration_amount").val() == ''){
    $("#error").html("Consideration amount must be required!");
    $("#consideration_amount").focus();
    return false;
}else if($("#party_count").val() == ''){
    $("#error").html("Party Count must be required!");
    $("#party_count").focus();
    return false;
}else if($("#transfer_tax").val() == ''){
    $("#error").html("Transfer Tax must be required!");
    $("#transfer_tax").focus();
    return false;
}else if($("#title_count").val() == ''){
    $("#error").html("Title count must be required!");
    $("#title_count").focus();
    return false;
}else{
    const xCsrfToken = "{{ csrf_token() }}";
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': xCsrfToken
        }
    });
    var form_data = new FormData(); 
    form_data.append('form_status', 3);
    form_data.append('state_name', $("#name").val());
    form_data.append('county', $("#county").val());
    form_data.append('document_type', $("#document_type").val());
    form_data.append('transfer_tax_exempt1', $("#transfer_tax_exempt1").is(":checked"));
    form_data.append('transfer_tax_exempt2', $("#transfer_tax_exempt2").is(":checked"));
    form_data.append('consideration_amount', $("#consideration_amount").val());
    form_data.append('party_count', $("#party_count").val());
    form_data.append('transfer_tax', $("#transfer_tax").val());          
    form_data.append('title_count', $("#title_count").val());
    form_data.append('sb2', $("#sb2").is(":checked"));

    $.ajax({
        url: "{{ URL::to('/property-tax')}}",
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




$("#connectData3").click(function(){
   
    if($("#name").val() == ''){
        $("#state_error").html("State Name must be required!");
        $("#name").focus();
        return false;
    }else if($("#county").val() == ''){
        $("#county_error").html("Country Name must be required!");
        $("#county").focus();
        return false;
    }else if($("#document_type").val() == ''){
        $("#doc_error").html("Document type must be required!");
        $("#document_type").focus();
        return false;
    }else if($("#image_title1").val() == ''){
        $("#image1_error").html("Must upload main document to be recorded. The supporting documents can be left empty but if you are recording property documents in California, an additional fee will be charged by the county recorder for preparing your PCOR, if you have not done so.Please check with your county recording regarding additional fees!!");
        $("#image1_error").focus();
        return false;
    }else if($("#image1").val() == ''){
        $("#image1_error").html("Must upload main document to be recorded. The supporting documents can be left empty but if you are recording property documents in California, an additional fee will be charged by the county recorder for preparing your PCOR, if you have not done so.Please check with your county recording regarding additional fees!!");
        $("#image1_error").focus();
        return false;
    }else{
        
        const xCsrfToken = "{{ csrf_token() }}";
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': xCsrfToken
            }
        });
        var form_data = new FormData(); 
        form_data.append('form_status', 4);
        form_data.append('state_name', $("#name").val());
        form_data.append('county', $("#county").val());
        form_data.append('document_type', $("#document_type").val());
        form_data.append('image_title1', $("#image_title1").val());
        form_data.append('image_title2', $("#image_title2").val());
        form_data.append('image_title3', $("#image_title3").val());
        form_data.append('image_title4', $("#image_title4").val());
        form_data.append('image1', $("#image1").prop("files")[0]);
       
        if($('input[name="image2"]').prop('files') != undefined){
            form_data.append('image2', $("#image2").prop("files")[0]);
           
            
        }if($('input[name="image3"]').prop('files') != undefined ){
            form_data.append('image3', $("#image3").prop("files")[0]);
           
        }if($('input[name="image4"]').prop('files') != undefined ){
            form_data.append('image4', $("#image4").prop("files")[0]);
           
        }      

        $.ajax({
            url: "{{ URL::to('/document-tab')}}",
            type: "POST",
            data: form_data,
            enctype: 'multipart/form-data',
            processData: false,  // tell jQuery not to process the data
            contentType: false,   // tell jQuery not to set contentType
            success: function(data){
                console.log(data);  
                $('#record_id').val(data);             
                
            }
        })
    }
})


$("#connectData4").click(function(){
   
   if($("#section").val() == ''){
       $("#section_error").html("Section must be required!");
       $("#section").focus();
       return false;
   }else if($("#block").val() == ''){
       $("#section_error").html("Block must be required!");
       $("#block").focus();
       return false;
   }else if($("#lot").val() == ''){
       $("#section_error").html("Lot must be required!");
       $("#lot").focus();
       return false;
   }else{
       
       const xCsrfToken = "{{ csrf_token() }}";
       $.ajaxSetup({
           headers: {
               'X-CSRF-TOKEN': xCsrfToken
           }
       });
       var form_data = new FormData(); 
       form_data.append('section', $("#section").val());
       form_data.append('block', $("#block").val());
       form_data.append('lot', $("#lot").val());
       form_data.append('unit', $("#unit").val());
       form_data.append('town', $("#town").val());
       console.log(form_data);
       $.ajax({
           url: "{{ URL::to('/legal-description')}}",
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


$("#connectData5").click(function(){
   if($('#payment1').is(":checked") == true ){
      var amt =$('#payment1').val();
   }else if($('#payment2').is(":checked") == true){
    var amt =$('#payment2').val();
   }else if($('#payment3').is(":checked") == true){
    var amt =$('#payment3').val();
   }else if(amt == undefined){
        $("#radiobutton").html("Please Select a Amount!");
        $("#radiobutton").focus();
        return false;
    }
       console.log(amt);
    
       $.ajax({
           url: "{{ URL::to('/pay')}}",
           type: "GET",
           data: {
               "amount" : amt
           },
           success: function(data){
               $('#div_makepayment').html(data);
               
               
           }
       })
   
})







    $("#submit").click(function(){
        if($("#name").val() == ''){
        $("#state_error").html("State Name must be required!");
        $("#state_error").focus();
        return false;
    }else if($("#county").val() == ''){
        $("#county_error").html("Country Name must be required!");
        $("#county_error").focus();
        return false;
    }else if($("#document_type").val() == ''){
        $("#doc_error").html("Document type must be required!");
        $("#document_type").focus();
        return false;
    }else if($('input[name="fav_language"]').val() == ''){
        $("#radiobutton_error").html("Please Select a Option!");
        $("#radiobutton").focus();
        return false;
    }else{
                const xCsrfToken = "{{ csrf_token() }}";
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': xCsrfToken
                }
            });
            var form_data = new FormData(); 
            form_data.append('form_status', 5);
            form_data.append('state_name', $("#name").val());
            form_data.append('county', $("#county").val());
            form_data.append('document_type', $("#document_type").val());
            form_data.append('', 4);

            $.ajax({
            url: "{{ URL::to('/payment-option')}}",
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
    });

   
    
    
    $("#addrow").click(function () {
       delrowpos = $("#deleteposition").val();
        const presentCount = parseInt($("#imagerowcount").val());
       // alert(presentCount);
          if( presentCount <= 4){  
              if(delrowpos == '') {       
                markup = '<div class="row" id="deleterow'+ presentCount +'"><div class="col-md-7 mb-3"><label for="formFile" class="form-label">Upload Supporting Documents eg: PCOR,Tax Declarations etc :</label><input type="text" class="form-control" id="image_title'+ presentCount +'" name="image_title'+presentCount+'" placeholder="Document Title"></div><div class="col-md-3"><label for="formFile" class="form-label">Document</label><input class="form-control" type="file" id="image'+presentCount+'" name="image'+presentCount+'"></div><div class="col-md-2"><button class="btn btn-danger " style="float: left;margin-top: 34px;"  onclick="deleteRow('+ presentCount +')"><i class="fa fa-trash-o" aria-hidden="true"></i></button></div></div>' ;
                tableBody = $("#multipleimage");
                tableBody.append(markup);
                $("#imagerowcount").val(presentCount + 1)              
                $("#radiobutton_error").html(" ");
                $("#radiobutton_error").focus();
              }else if(delrowpos == 2 && document.getElementById("image2") == null){
                markup = '<div class="row" id="deleterow2"><div class="col-md-7 mb-3"><label for="formFile" class="form-label">Upload Supporting Documents eg: PCOR,Tax Declarations etc :</label><input type="text" class="form-control" id="image_title2" name="image_title2" placeholder="Document Title"></div><div class="col-md-3"><label for="formFile" class="form-label">Document</label><input class="form-control" type="file" id="image2" name="image2"></div><div class="col-md-2"><button class="btn btn-danger " style="float: left;margin-top: 34px;"  onclick="deleteRow(2)"><i class="fa fa-trash-o" aria-hidden="true"></i></button></div></div>' ;
                tableBody = $("#multipleimage");
                tableBody.append(markup);
                $("#imagerowcount").val(presentCount + 1)              
                $("#radiobutton_error").html(" ");
                $("#radiobutton_error").focus();
              }else if(delrowpos == 3 && document.getElementById("image3") == null){
                markup = '<div class="row" id="deleterow3"><div class="col-md-7 mb-3"><label for="formFile" class="form-label">Upload Supporting Documents eg: PCOR,Tax Declarations etc :</label><input type="text" class="form-control" id="image_title3" name="image_title3" placeholder="Document Title"></div><div class="col-md-3"><label for="formFile" class="form-label">Document</label><input class="form-control" type="file" id="image3" name="image3"></div><div class="col-md-2"><button class="btn btn-danger " style="float: left;margin-top: 34px;"  onclick="deleteRow(3)"><i class="fa fa-trash-o" aria-hidden="true"></i></button></div></div>' ;
                tableBody = $("#multipleimage");
                tableBody.append(markup);
                $("#imagerowcount").val(presentCount + 1)              
                $("#radiobutton_error").html(" ");
                $("#radiobutton_error").focus();
              }else{
                markup = '<div class="row" id="deleterow'+ presentCount +'"><div class="col-md-7 mb-3"><label for="formFile" class="form-label">Upload Supporting Documents eg: PCOR,Tax Declarations etc :</label><input type="text" class="form-control" id="image_title'+ presentCount +'" name="image_title'+presentCount+'" placeholder="Document Title"></div><div class="col-md-3"><label for="formFile" class="form-label">Document</label><input class="form-control" type="file" id="image'+presentCount+'" name="image'+presentCount+'"></div><div class="col-md-2"><button class="btn btn-danger " style="float: left;margin-top: 34px;"  onclick="deleteRow('+ presentCount +')"><i class="fa fa-trash-o" aria-hidden="true"></i></button></div></div>' ;
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


})


function loadcountryName(){
    var data =$('#name').val();
            $.ajax({
            type: "GET",
            url: "/get-county",
            data: {
                state_name: data
            },
            success: function(response) {
               $("#county").html(response);
              // $("#imagerowcount").val(presentCount - 1) 
            }
        });

}


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

function checknewyork(){
    if($('#name').val() == "New York"){
     //   $('#div_legal').show();
    }else{
      //  $('#div_legal').hide();
    }
        
}
</script>