<x-header-component />

<section class="minbody">
    <div class="pricingpg progresspg">
    <!--  <div class="cmpnyimage wow fadeInDown" data-wow-delay=".10s"><img src="images/contact-us-banner.jpg"></div> -->
    <div class="pgmincontent pt-0">
        <div class="priceimage wow fadeInDown" data-wow-delay=".10s"><img src="{{ asset('design/images/step-bg.jpg') }}"></div>
        <div class="container-fluid">
            <div class="row justify-content-end">
                <div class="col-md-12 col-lg-8">
                    <div class="contentbox pb-5 px-3 wow bounceInDown" data-wow-delay=".6s">
                        <h5>Customer: 94174 - Law Office of Joseph Trenk</h5>
                        <div class="row calculetorbox">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label>What type of Document are you Recording?</label>
                                        <select  class="form-select" id="recordtype" name="recordtype">
                                            <option selected value="">Select A Option</option>
                                            <option value="Property (DEEDS, Affidavits etc)">Property (DEEDS, Affidavits etc)</option>
                                            <option value="Construction (Liens and releases)">Construction (Liens and releases)</option>
                                            <option value="Court (Abstracts and LIS PENDENS)">Court (Abstracts and LIS PENDENS)</option>
                                            <option value="Other (eg: Power of Attorney)">Other (eg: Power of Attorney)</option>
                                        </select>
                                    </div>
                                    <div class="col-md-12">
                                     <span><b>The first page of the document has to be a TITLE PAGE in order to avoid rejection from the county. Title page varies with each county, Check with your county prior to submitting.</b></span>
                                    </div>
                                   
                                    <div class="col-md-12">
                                        <label>Upload File </label>
                                        <input type="file" class="form-control form-control-lg" id="image" name="image">
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
                                            <li>Grantee Information</li>
                                            <li>Property Taxation Info</li>
                                            <li>Documents Tab</li>
                                            <li>Payment Options</li>
                                        </ul>
                                    </div>
                                    <div class="myContainer">
                                        <div class="form-container animated border shadow p-4">
                          
                                            <span style="color:red" id="errmsg"></span>
                                            <span style="color:green" id="grantorsuccessmsg"></span>
                                            <div class="row mb-3">
                                                <div class="col-md-2"><label>Are You?</label></div>
                                                <div class="col-md-8">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="grantor_recordtype" id="person" value="person" onclick="checkperson()">
                                                        <label class="form-check-label" for="inlineRadio1">Person</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="grantor_recordtype" id="organization" value="organization" onclick="checkorganization()">
                                                        <label class="form-check-label" for="inlineRadio2">Organization</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="">
                                                <h3 id="div_persons" class="form-title fs-6">Personssss</h3>

                                            <div id="">
                                                <h3 id="div_organizations" class="form-title fs-6">Organization</h3>
                                                <div id="div_organization" class="row mb-3">
                                                    <div class="col-md-6 mb-3">
                                                        <input type="text" class="form-control" id="organization_name" name="organization_name" placeholder="Organization name">
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <input type="text" class="form-control" id="organization_author" name="organization_author" placeholder="Authorized Agent name">
                                                    </div>                                                
                                                </div>                                              
                            
                                            </div>

                                                <div class="row mb-3">
                                                    <div class="col-md-2">
                                                        <select  class="form-select">
                                                            <option value="">Select</option>
                                                            <option value="Suffix">Suffix</option>
                                                            <option value="Jr">Jr.</option>
                                                            <option value="Sr">Sr.</option>
                                                            <option value="I">I</option>
                                                            <option value="II">II</option>
                                                            <option value="III">III</option>
                                                            <option value="IV">IV</option>
                                                            <option value="V">V</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <input type="text" class="form-control" id="person_fname" name="person_fname" placeholder="First Name">
                                                    </div>
                                                    <div class="col-md-3">
                                                        <input type="text" class="form-control" id="person_mname" name="person_mname" placeholder="Middle Name">
                                                    </div>
                                                    <div class="col-md-3">
                                                        <input type="text" class="form-control" id="person_lname" name="person_lname" placeholder="Last Name">
                                                    </div>
                                                </div>

                                                <div class="form-group text-center mar-b-0">
                                                    <input type="submit" value="SUBMIT" class="btn btn-primary submit">
                                                    <input type="button" id="grantorNext" value="NEXT" class="btn btn-primary next " disabled>
                                                </div>                                                
                                            </div>                                           
                                        </div>
                                        <div class="form-container animated border shadow p-4">
                            <from id="granteeFrom"  action="{{ URL::to('/lc-step-form-grantee') }}" method='POST'   enctype="multipart form-data">
                                           
                                            <span style="color:red" id="granteerrmsg"></span>
                                          
                                            <div class="row mb-3">
                                                <div class="col-md-2"><label>Are You?</label></div>
                                                <div class="col-md-8">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="grantee_recordtype" id="personforgrantee" value="person" onclick="granteePersoncheck()">
                                                        <label class="form-check-label" for="inlineRadio1">Person</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="grantee_recordtype" id="organizationforgrantee" value="organization" onclick="granteeOrganizationcheck()">
                                                        <label class="form-check-label" for="inlineRadio2">Organization</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <h3 id="div_granteepersons" class="form-title fs-6">Person</h3>
                                            <div class="row mb-3" id="div_granteeperson">
                                                <div class="col-md-2">
                                                    <select  class="form-select">
                                                        <option selected="" value="">Suffix</option>
                                                        <option value="Alameda">Jr.</option>
                                                        <option value="Alpine">Sr.</option>
                                                        <option value="Amador">I</option>
                                                        <option value="Butte">II</option>
                                                        <option value="Butte">III</option>
                                                        <option value="Butte">IV</option>
                                                        <option value="Butte">V</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-4">
                                                    <input type="text" class="form-control" id="granteefname" name="granteefname" placeholder="First Name">
                                                </div>
                                                <div class="col-md-3">
                                                    <input type="text" class="form-control" id="granteeMname" name="granteeMname" placeholder="Middle Name">
                                                </div>
                                                <div class="col-md-3">
                                                    <input type="text" class="form-control" id="granteeLname" name="granteeLname" placeholder="Last Name">
                                                </div>
                                            </div>
                                            <h3 id="div_granteeOrganizations" class="form-title fs-6">Organization</h3>
                                            <div class="row mb-3" id="div_granteeOrganization">
                                                <div class="col-md-6 mb-3">
                                                    <input type="text" class="form-control" id="grantee_organization_name" name="grantee_organization_name" placeholder="Organization name">
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <input type="text" class="form-control" id="grantee_organization_author" name="grantee_organization_author" placeholder="Authorized Agent name">
                                                </div>
                                                <div class="col-md-2">
                                                    <select  class="form-select">
                                                        <option selected="" value="">Suffix</option>
                                                        <option value="Alameda">Jr.</option>
                                                        <option value="Alpine">Sr.</option>
                                                        <option value="Amador">I</option>
                                                        <option value="Butte">II</option>
                                                        <option value="Butte">III</option>
                                                        <option value="Butte">IV</option>
                                                        <option value="Butte">V</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-4">
                                                    <input type="text" class="form-control" id="granteefname" name="granteefname" placeholder="First Name">
                                                </div>
                                                <div class="col-md-3">
                                                    <input type="text" class="form-control" id="granteemname" name="granteemname" placeholder="Middle Name">
                                                </div>
                                                <div class="col-md-3">
                                                    <input type="text" class="form-control" id="granteelname" name="granteelname" placeholder="Last Name">
                                                </div>
                                            </div>
                                            <div class="form-group text-center mar-b-0">
                                                <input type="button" value="BACK" class="btn btn-dark back">
                                                <input type="button" value="SUBMIT" id="granteesubmit" class="btn btn-primary" >        
                                                <input type="button" id="granteeNext" value="NEXT" class="btn btn-primary next" disabled>        
                                            </div>
                           </from>
                                        </div>
                                            <div class="form-container animated border shadow p-4">
                                                <div class="row mb-3">
                                                    <div class="col-md-3"><label>Transfer Tax Exempt?</label></div>
                                                    <div class="col-md-9">
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                                                            <label class="form-check-label" for="inlineRadio1">Yes</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                                                            <label class="form-check-label" for="inlineRadio2">No</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 mt-3">
                                                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Consideration Amount in $">
                                                    </div>
                                                    <div class="col-md-4 mt-3">
                                                        <label>Party Count</label>
                                                        <input type="text" class="form-control" id="exampleInputEmail1" >
                                                    </div>
                                                    <div class="col-md-4 mt-3">
                                                        <label>Transfer Tax($)</label>
                                                        <input type="text" class="form-control" id="exampleInputEmail1" >
                                                    </div>
                                                    <div class="col-md-4 mt-3">
                                                        <label>Title Count</label>
                                                        <input type="text" class="form-control" id="exampleInputEmail1" >
                                                    </div>
                                                    <div class="col-md-12 mt-3">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                                            <label class="form-check-label" for="defaultCheck1">
                                                            SB2 Fee Exempt 
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group text-center mar-b-0">
                                                        <input type="button" value="BACK" class="btn btn-dark back">        
                                                        <input type="button" value="NEXT" class="btn btn-primary next">        
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-container animated border shadow p-4">
                                                <div class="row">
                                                    <div class="col-md-12 mb-3">
                                                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Document Title">
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label for="formFile" class="form-label">Document 1</label>
                                                        <input class="form-control" type="file" id="formFile">
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label for="formFile" class="form-label">Document 2</label>
                                                        <input class="form-control" type="file" id="formFile">
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label for="formFile" class="form-label">Document 3</label>
                                                        <input class="form-control" type="file" id="formFile">
                                                    </div>
                                                </div>
                                                <div class="form-group text-center mar-b-0 mt-3">
                                                    <input type="button" value="BACK" class="btn btn-dark back">        
                                                    <input type="button" value="NEXT" class="btn btn-primary next">        
                                                </div>
                                            </div>
                                            <div class="form-container animated border shadow p-4">
                                                <h3 class="text-center form-title">Payment Option</h3>
                                                <div class="form-group text-center mar-b-0"> 
                                                    <input type="button" value="BACK" class="btn btn-dark back"> 
                                                    <input type="submit" value="SUBMIT" class="btn btn-primary submit">         
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
        </div>
    </div>
</section>
<x-footer-component />


<script type="text/javascript">
 $(document).ready(function(){ 
    $('#person').attr('checked', true);
    $('#div_person').show();
    $('#div_persons').show();
    $('#div_organization').hide();
    $('#div_organizations').hide();

    $('#personforgrantee').attr('checked', true);
    $('#div_granteeperson').show();
    $('#div_granteepersons').show();
    $('#div_granteeOrganization').hide();
    $('#div_granteeOrganizations').hide();
});




var totalSteps = $(".steps li").length;
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






$("#grantorFrom").submit(function(e) {

    e.preventDefault(); // avoid to execute the actual submit of the form.

    var form = $(this);
    
    if($('#person').is(":checked")){
    // alert("person alert ok");
        if($('#personfname').val() == ''){
            $("#errmsg").html("Please Enter Person Fast Name!!").css("color", "red");
            return false;
        }else if($('#personLname').val() == ''){
            $("#errmsg").html("Please Enter Person Last Name!!").css("color", "red");
            return false;
        }

    }else if($('#organization').is(":checked")){
        if($('#organization_name').val() == ''){
            $("#errmsg").html("Please Enter Organigation Name!!").css("color", "red");
            return false;
        }else if($('#organization_author').val() == ''){
            $("#errmsg").html("Please Enter Organigation Author Name!!").css("color", "red");
            return false;
        }else if($('#organizationfname').val() == ''){
            $("#errmsg").html("Please Enter Organigation Fast Name!!").css("color", "red");
            return false;
        }else if($('#organizationLname').val() == ''){
            $("#errmsg").html("Please Enter Organigation Last Name!!").css("color", "red");
            return false;
        }
    } 
        $.ajax({
            type: "POST",
            url: "{{ URL::to('/lc-step-form')}}",
            data: form.serialize(), // serializes the form's elements.
            success: function(data)
            {
            console.log(data);
            if(data == 1){
                $('#grantorNext').prop('disabled',false);
                $("#errmsg").html("SUBMIT Successfull").css("color", "green");
            }
           
            }
        });     

});






$('#granteesubmit').click(function() {
       
 
        if($('#personforgrantee').is(":checked")){
        // alert("person alert ok");
            if($('#granteefname').val() == ''){
                $("#granteerrmsg").html("Please Enter Person Fast Name!!").css("color", "red");
                return false;
            }else if($('#granteeLname').val() == ''){
                $("#granteerrmsg").html("Please Enter Person Last Name!!").css("color", "red");
                return false;
            }else{
                $.ajax({
                type: "GET",
                url: "{{ URL::to('/lc-step-form-grantee')}}",
                data: { 
                       grantee_recordtype:"1",// 1 for person
                       granteefname:$('#granteefname').val(),
                       granteeLname: $('#granteeLname').val(),
                       granteeMname: $('#granteeMname').val()
                }, 
                success: function(data)
                {
                $('#granteeNext').prop('disabled',false);
                $("#granteerrmsg").html("Grantee SUBMIT Successfull").css("color", "green");
                }
            });
            }

        }else if($('#organizationforgrantee').is(":checked") == true){
           
            if($('#grantee_organization_name').val() == ''){
                $("#granteerrmsg").html("Please Enter Organigation Name!!").css("color", "red");
                return false;
            }else if($('#grantee_organization_author').val() == ''){
                $("#granteerrmsg").html("Please Enter Organigation Author Name!!").css("color", "red");
                return false;
            }else if($('#granteefname').val() == ''){
                $("#granteerrmsg").html("Please Enter Organigation Fast Name!!").css("color", "red");
                return false;
            }else if($('#granteelname').val() == ''){
                $("#granteerrmsg").html("Please Enter Organigation Last Name!!").css("color", "red");
                return false;
            }else{
                   
                    $.ajax({
                    type: "GET",
                    url: "{{ URL::to('/lc-step-form-grantee')}}",
                    data: { 
                        grantee_recordtype:"2", // 2 for Organigation
                        grantee_organization_name:$('#grantee_organization_name').val(),
                        grantee_organization_author: $('#grantee_organization_author').val(),
                        granteefname: $('#granteefname').val(),
                        granteemname: $('#granteemname').val(),
                        granteelname: $('#granteelname').val()

                    }, 
                    success: function(data)
                    {
                        console.log(data);
                    $('#granteeNext').prop('disabled',false);
                    $("#granteerrmsg").html("Grantee SUBMIT Successfull").css("color", "green");
                    }
                });
            }
        } 
           



        });




function checkperson(){
    $('#div_person').show();
    $('#div_persons').show();
    $('#div_organization').hide();
    $('#div_organizations').hide();
}


function checkorganization(){
    $('#div_person').hide();
    $('#div_persons').hide();
    $('#div_organization').show();
    $('#div_organizations').show();
}

function granteePersoncheck(){
    $('#div_granteeperson').show();
    $('#div_granteepersons').show();
    $('#div_granteeOrganization').hide();
    $('#div_granteeOrganizations').hide();
}

function granteeOrganizationcheck(){
    $('#div_granteeOrganization').show();
    $('#div_granteeOrganizations').show();
    $('#div_granteeperson').hide();
    $('#div_granteepersons').hide();
}








</script>