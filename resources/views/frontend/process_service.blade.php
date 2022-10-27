<x-header-component />
<section class="minbody">
<div class="pricingpg progresspg">
<!--  <div class="cmpnyimage wow fadeInDown" data-wow-delay=".10s"><img src="images/contact-us-banner.jpg"></div> -->
<div class="pgmincontent pt-0">
<div class="priceimage wow fadeInDown" data-wow-delay=".10s"><img src="{{ asset('/design/images/pricing-img.jpg')}}"></div>
<div class="container-fluid">
<div class="row justify-content-end">
<div class="col-md-12 col-lg-8">
    <div class="contentbox pb-5 px-3 wow bounceInDown" data-wow-delay=".6s">
        
    <div class="row calculetorbox">
            <div class="col-md-12">
                <div class="row">
                    
                </div>
            </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-wizard">
                <div class="steps">
                    <ul>
                        <li>Order Info</li>
                        <li>Case Info</li>
                        <li>Case Participants</li>
                        <li>Documents</li>
                        <li>Serve Info</li>
                        <li>Order Details</li>
                    </ul>
                </div>
                <div class="myContainer">
                    <div class="form-container animated border shadow p-4">
                        <form action="#" method="post" id="hockey">
                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <label class="d-inline-block">Select number of Party(s) to Serve:</label>
                                     <div class="dropdown-form d-inline-block">
                                          <select name="hockeyList" onchange="showHide(this)">
                                                  <option>Select</option>
                                                  @for($i =1; $i <=15; $i++)
                                                  <option value="{{ $i }}">{{ $i }}</option>
                                                  @endfor
                                           </select>
                                      </div>
                                      <label class="d-inline-block"> (for more than 15 Party(s), please place multiple orders)</label>
                                </div>
                                <div class="dropdown-options">
                                    <div class="show-hide" id="rangers">
                                          <table>
                                                    <tr>
                                                        <th width="33%" class="sky-txt">Party(s) To Serve*</th>
                                                        <th width="33%" class="sky-txt">Capacity*</th>
                                                        <th width="33%" class="sky-txt">Registered Agent</th>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" class="form-control" id="" ></td>
                                                        <td><select class="form-select">
                                                        <option value="">Select...</option> 
                                                        <option value="Association or Partnership">Association or Partnership</option>
                                                        <option value="Authorized Person">Authorized Person</option>
                                                        <option value="Business Organization, Form Unknown">Business Organization, Form Unknown</option>
                                                        <option value="Corporation">Corporation</option>
                                                        <option value="Defunct Corporation">Defunct Corporation</option>
                                                        <option value="Estate">Estate</option>
                                                        <option value="Fictitious">Fictitious</option>
                                                        <option value="Individual">Individual</option>
                                                        <option value="Joint Stock Company/Association">Joint Stock Company/Association</option>
                                                        <option value="Minor">Minor</option>
                                                        <option value="Occupant Prejudgment Claim">Occupant Prejudgment Claim</option>
                                                        <option value="Public Entity">Public Entity</option>
                                                        <option value="Sole Proprietorship">Sole Proprietorship</option>
                                                        <option value="Trust">Trust</option>
                                                        </select></td>
                                                        <td>
                                                            <input type="text" class="form-control" id="">
                                                        </td>
                                                    </tr>                                               
                                                </table>
                                    </div>
                                    <div class="show-hide" id="islanders">
                                           <table>
                                                    <tr>
                                                        <th width="33%" class="sky-txt">Party(s) To Serve*</th>
                                                        <th width="33%" class="sky-txt">Capacity*</th>
                                                        <th width="33%" class="sky-txt">Registered Agent</th>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" class="form-control" id="" ></td>
                                                        <td><select class="form-select">
                                                        <option value="">Select...</option> 
                                                        <option value="Association or Partnership">Association or Partnership</option>
                                                        <option value="Authorized Person">Authorized Person</option>
                                                        <option value="Business Organization, Form Unknown">Business Organization, Form Unknown</option>
                                                        <option value="Corporation">Corporation</option>
                                                        <option value="Defunct Corporation">Defunct Corporation</option>
                                                        <option value="Estate">Estate</option>
                                                        <option value="Fictitious">Fictitious</option>
                                                        <option value="Individual">Individual</option>
                                                        <option value="Joint Stock Company/Association">Joint Stock Company/Association</option>
                                                        <option value="Minor">Minor</option>
                                                        <option value="Occupant Prejudgment Claim">Occupant Prejudgment Claim</option>
                                                        <option value="Public Entity">Public Entity</option>
                                                        <option value="Sole Proprietorship">Sole Proprietorship</option>
                                                        <option value="Trust">Trust</option>
                                                        </select></td>
                                                        <td>
                                                            <input type="text" class="form-control" id="">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" class="form-control" id="" ></td>
                                                        <td><select class="form-select">
                                                        <option value="">Select...</option> 
                                                        <option value="Association or Partnership">Association or Partnership</option>
                                                        <option value="Authorized Person">Authorized Person</option>
                                                        <option value="Business Organization, Form Unknown">Business Organization, Form Unknown</option>
                                                        <option value="Corporation">Corporation</option>
                                                        <option value="Defunct Corporation">Defunct Corporation</option>
                                                        <option value="Estate">Estate</option>
                                                        <option value="Fictitious">Fictitious</option>
                                                        <option value="Individual">Individual</option>
                                                        <option value="Joint Stock Company/Association">Joint Stock Company/Association</option>
                                                        <option value="Minor">Minor</option>
                                                        <option value="Occupant Prejudgment Claim">Occupant Prejudgment Claim</option>
                                                        <option value="Public Entity">Public Entity</option>
                                                        <option value="Sole Proprietorship">Sole Proprietorship</option>
                                                        <option value="Trust">Trust</option>
                                                        </select></td>
                                                        <td>
                                                            <input type="text" class="form-control" id="">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="3">
                                                           <div class="form-check">
                                                             <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                                               <label class="form-check-label" for="flexCheckDefault">
                                                               Check to serve all parties with the same documents.
                                                               </label>
                                                          </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="3">
                                                            <div class="form-check">
                                                             <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                                               <label class="form-check-label" for="flexCheckDefault">
                                                               Check to serve all parties at the same address.
                                                               </label>
                                                          </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="3">
                                                            <div class="form-check">
                                                             <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                                               <label class="form-check-label" for="flexCheckDefault">
                                                               Check to advance witness fees to all parties.
                                                               </label>
                                                          </div>
                                                        </td>
                                                    </tr>
                                           </table>
                                    </div>
                                    <div class="show-hide" id="penguins">
                                          <table>
                                                    <tr>
                                                        <th width="33%" class="sky-txt">Party(s) To Serve*</th>
                                                        <th width="33%" class="sky-txt">Capacity*</th>
                                                        <th width="33%" class="sky-txt">Registered Agent</th>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" class="form-control" id="" ></td>
                                                        <td><select class="form-select">
                                                        <option value="">Select...</option> 
                                                        <option value="Association or Partnership">Association or Partnership</option>
                                                        <option value="Authorized Person">Authorized Person</option>
                                                        <option value="Business Organization, Form Unknown">Business Organization, Form Unknown</option>
                                                        <option value="Corporation">Corporation</option>
                                                        <option value="Defunct Corporation">Defunct Corporation</option>
                                                        <option value="Estate">Estate</option>
                                                        <option value="Fictitious">Fictitious</option>
                                                        <option value="Individual">Individual</option>
                                                        <option value="Joint Stock Company/Association">Joint Stock Company/Association</option>
                                                        <option value="Minor">Minor</option>
                                                        <option value="Occupant Prejudgment Claim">Occupant Prejudgment Claim</option>
                                                        <option value="Public Entity">Public Entity</option>
                                                        <option value="Sole Proprietorship">Sole Proprietorship</option>
                                                        <option value="Trust">Trust</option>
                                                        </select></td>
                                                        <td>
                                                            <input type="text" class="form-control" id="">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" class="form-control" id="" ></td>
                                                        <td><select class="form-select">
                                                        <option value="">Select...</option> 
                                                        <option value="Association or Partnership">Association or Partnership</option>
                                                        <option value="Authorized Person">Authorized Person</option>
                                                        <option value="Business Organization, Form Unknown">Business Organization, Form Unknown</option>
                                                        <option value="Corporation">Corporation</option>
                                                        <option value="Defunct Corporation">Defunct Corporation</option>
                                                        <option value="Estate">Estate</option>
                                                        <option value="Fictitious">Fictitious</option>
                                                        <option value="Individual">Individual</option>
                                                        <option value="Joint Stock Company/Association">Joint Stock Company/Association</option>
                                                        <option value="Minor">Minor</option>
                                                        <option value="Occupant Prejudgment Claim">Occupant Prejudgment Claim</option>
                                                        <option value="Public Entity">Public Entity</option>
                                                        <option value="Sole Proprietorship">Sole Proprietorship</option>
                                                        <option value="Trust">Trust</option>
                                                        </select></td>
                                                        <td>
                                                            <input type="text" class="form-control" id="">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" class="form-control" id="" ></td>
                                                        <td><select class="form-select">
                                                        <option value="">Select...</option> 
                                                        <option value="Association or Partnership">Association or Partnership</option>
                                                        <option value="Authorized Person">Authorized Person</option>
                                                        <option value="Business Organization, Form Unknown">Business Organization, Form Unknown</option>
                                                        <option value="Corporation">Corporation</option>
                                                        <option value="Defunct Corporation">Defunct Corporation</option>
                                                        <option value="Estate">Estate</option>
                                                        <option value="Fictitious">Fictitious</option>
                                                        <option value="Individual">Individual</option>
                                                        <option value="Joint Stock Company/Association">Joint Stock Company/Association</option>
                                                        <option value="Minor">Minor</option>
                                                        <option value="Occupant Prejudgment Claim">Occupant Prejudgment Claim</option>
                                                        <option value="Public Entity">Public Entity</option>
                                                        <option value="Sole Proprietorship">Sole Proprietorship</option>
                                                        <option value="Trust">Trust</option>
                                                        </select></td>
                                                        <td>
                                                            <input type="text" class="form-control" id="">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="3">
                                                           <div class="form-check">
                                                             <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                                               <label class="form-check-label" for="flexCheckDefault">
                                                               Check to serve all parties with the same documents.
                                                               </label>
                                                          </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="3">
                                                            <div class="form-check">
                                                             <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                                               <label class="form-check-label" for="flexCheckDefault">
                                                               Check to serve all parties at the same address.
                                                               </label>
                                                          </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="3">
                                                            <div class="form-check">
                                                             <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                                               <label class="form-check-label" for="flexCheckDefault">
                                                               Check to advance witness fees to all parties.
                                                               </label>
                                                          </div>
                                                        </td>
                                                    </tr>
                                           </table>
                                    </div>
                                </div>


                                    <div class="col-md-5">
                                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Party(s) To Serve*">
                                    </div>
                                    <div class="col-md-3">
                                        <select  class="form-select">
                                            <option value="">-- Capacity --</option>
                                            
                                            <option value="Association or Partnership">Association or Partnership</option>
                                            <option value="Authorized Person">Authorized Person</option>
                                            <option value="Business Organization, Form Unknown">Business Organization, Form Unknown</option>
                                            <option value="Corporation">Corporation</option>
                                            <option value="Defunct Corporation">Defunct Corporation</option>
                                            <option value="Estate">Estate</option>
                                            <option value="Fictitious">Fictitious</option>
                                            <option value="Individual">Individual</option>
                                            <option value="Joint Stock Company/Association">Joint Stock Company/Association</option>
                                            <option value="Minor">Minor</option>
                                            <option value="Occupant Prejudgment Claim">Occupant Prejudgment Claim</option>
                                            <option value="Public Entity">Public Entity</option>
                                            <option value="Sole Proprietorship">Sole Proprietorship</option>
                                            <option value="Trust">Trust</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Registered Agent">
                                    </div>
                                    
                                    
                            </div>
                                
                           
                            <div class="row mb-3">
                                 <div class="col-md-6 position-relative">
                                    <a href="#" class="vrfy-cd" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo"><i class="fa fa-check" aria-hidden="true"></i></a>
                                    <input type="text" class="form-control" id="party_address" placeholder="Address*">
                                 </div>
                                 <div class="col-md-6">
                                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Business Name">
                                </div>
                             </div>
                            
                            <div class="row mb-3 mt-4">
                                <div class="col-md-6">
                                    <label>Time Zone</label>
                                    <select  class="form-select">
                                        <option value="0">-- Select Time Zone --</option><option value="22">Eastern Standard Time</option><option value="16">Central Standard Time</option><option value="13">Mountain Standard Time</option><option value="10">Pacific Standard Time</option><option value="6">Alaskan Standard Time</option><option value="4">Hawaiian Standard Time</option>
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>Hearing Date Time</label>
                                    <input type="date" class="form-control" id="exampleInputEmail1" placeholder="Hearing Date">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>Advance Witness Fees :</label>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                                        <label class="form-check-label" for="inlineRadio1">Yes</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                                        <label class="form-check-label" for="inlineRadio2">No</label>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>Proof : </label>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="inlineRadioProof" id="inlineRadio1" value="option1">
                                        <label class="form-check-label" for="inlineRadio1">File <span style="font-size: 11px; color: #000;">(Additional fee will apply)</span></label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="inlineRadioProof" id="inlineRadio2" value="option2">
                                        <label class="form-check-label" for="inlineRadio2">Notarize</label>
                                    </div>
                                    
                                </div>
                                
                                
                                <div class="col-md-12">
                                    <label class="form-label">Special Instructions</label>
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                </div>
                                
                            </div>
                            
                            <div class="form-group text-center mar-b-0">
                                <input type="button" value="NEXT" class="btn btn-primary next text-white">
                            </div>
                        </form>
                    </div>
                    <div class="form-container animated border shadow p-4">                     
                        <form>
                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <label class="form-label">Case Number:</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter your Cash Number for Serve">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault">
                                            Check here if you do not have a Case Number.
                                        </label>
                                    </div>
                                </div>
                                
                                <div class="col-md-12">
                                    <label class="form-label">Jurisdiction:</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter your Cash Number for Serve">
                                </div>
                                <div class="col-md-12">
                                    <div class="row">
                                     <h3 style="font-size:14px;">Proof of Service Information</h3>
                                     <div class="col-md-6">
                                         <select class="form-select selectpicker">
                                            <option selected="" value="">Attorney of Record:</option>
                                            <option value="">New</option>            
                                            <option value="2">Joseph Trenk</option>
                                            <option value="3">Melissa Fattore</option>
                                          </select>
                                     </div>
                                     <div class="col-md-6">
                                          <table class="table table-borderless">
                                                <tr>
                                                    <th width="40%">Firm Name:</th>
                                                    <th width="60%">Law Office of Joseph Trenk</th>
                                                </tr>
                                                <tr>
                                                    <td>Address:</td>
                                                    <td>7136 Haskell Ave Ste 126</td>
                                                </tr>
                                                <tr>
                                                    <td>City/State/Zip:</td>
                                                    <td>Van Nuys CA 91406</td>
                                                </tr>
                                                <tr>
                                                    <td>Phone:</td>
                                                    <td>(818) 786-5227</td>
                                                </tr>
                                           </table>
                                     </div>
                                    </div>
                                </div>
                            </div>
                               <div class="form-group text-center mar-b-0">
                                <input type="button" value="BACK" class="btn btn-dark back text-white">
                                <input type="button" value="NEXT" class="btn btn-primary next text-white">
                            </div>
                        </form>
                    </div>
                    <div class="form-container animated border shadow p-4">
                        <form action="#" method="post" id="hockey">
                            <div class="row mb-3">                             
                                <div class="col-md-7 text-right mb-3">
                                      <label>Click to add Party(s) if not listed below:</label>
                                </div>
                                <div class="col-md-5 mb-3">
                                      <button type="button" class="btn add-party" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Add Party(s)</button>
                                </div>

                                <table class="table table-borderless primary-blue">
                                       <tr>
                                           <th width="25%" class="text-center">Lead Client</th>
                                           <th width="35%" class="text-center">Name</th>
                                           <th width="25%" class="text-center">Role</th>
                                           <th width="15%" class="text-center"></th>
                                       </tr>
                                       <tr>
                                           <td class="text-center">
                                                <input class="form-check-input" type="checkbox" value="" checked>
                                           </td>
                                           <td class="text-center">Raju Chakraborty Sr.</td>
                                           <td class="text-center">Claimant</td>
                                           <td class="text-center">
                                                <i class="fa fa-pencil-square-o d-inline-block" aria-hidden="true"></i>
                                                <i class="fa fa-close red d-inline-block ms-2"></i>
                                           </td>
                                       </tr>
                                </table>
                                
                                <div class="form-group text-center mar-b-0">
                                    <input type="button" value="BACK" class="btn btn-dark back text-white">
                                    <input type="button" value="NEXT" class="btn btn-primary next text-white">
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="form-container animated border shadow p-4">
                        <form>
                            <div class="row">
                                <div class="col-md-12 text-center mb-3">
                                      <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1" checked>
                                            <label class="form-check-label" for="inlineRadio1">Upload </label>
                                      </div>
                                      <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                                            <label class="form-check-label" for="inlineRadio2">Fax</label>
                                      </div>
                                      <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                                            <label class="form-check-label" for="inlineRadio2">Existing Documents</label>
                                      </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                     <div class="docu-line"></div>
                                </div>
                                <div class="col-md-4 text-end">
                                      <label>Type the Document Title using:</label>
                                </div>
                                <div class="col-md-4 text-start">
                                      <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                                            <label class="form-check-label" for="inlineRadio2">Starts with</label>
                                      </div>
                                      <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2" checked>
                                            <label class="form-check-label" for="inlineRadio2">Contains </label>
                                      </div>
                                </div>
                                <div class="col-md-4 text-center"><a href="#" data-bs-toggle="modal" data-bs-target="#documentsmodal" data-bs-whatever="@fat">Court defined Document Titles</a></div>
                                <div class="col-md-3 text-end pt-2">
                                    <label for="formFile" class="form-label">Document Title:</label>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" id="exampleInputEmail1">
                                </div>
                                <div class="col-md-3">
                                      <div class="attach file btn btn-lg btn-primary">
                                            Attach file
                                           <input type="file" class="attach-fld" name="file"/>
                                      </div>
                                </div>
                            </div>
                            <div class="form-group text-center mar-b-0 mt-3">
                                <input type="button" value="BACK" class="btn btn-dark back">
                                <input type="button" value="NEXT" class="btn btn-primary next">
                            </div>
                        </form>
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
</script>
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&libraries=places&key=AIzaSyDl_EQ4ljsTVMSrmqDJLfXO0933maf-c3s"></script>
<script>
    $(document).ready(function(){
        var autocomplete;
        autocomplete = new google.maps.places.Autocomplete((document.getElementById('party_address')), {
        types: ['geocode'],
        componentRestrictions: {
        country: "USA"
        }
        });  
        google.maps.event.addListener(autocomplete, 'place_changed', function () {
        var near_place = autocomplete.getPlace();
        });
    })
</script>