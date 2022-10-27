<x-header-component /> 
 <section class="minbody">
     <div class="agentspg">
         <div class="pgmincontent pt-4">
             <div class="container">
                 <div class="row justify-content-end">
                     <div class="col-md-12">
                         <div class="cmpnycontentbox wow bounceInDown" data-wow-delay=".6s">
                             <h1 class="d-inline-block display-5 fw-bold mt-3 py-2 mb-3 ">Document</h1>
                            
                            <div id="errmsg" style="color:red; padding-left:5px ">{{ Session::get('errmsg') }}</div>
                            <div id="successmsg" style="color:green; padding-left:5px ">{{ Session::get('successmsg') }}</div>
                            <form class="form-horizontal" enctype="multipart/form-data"  action="{{ url('add-document') }}" method='POST' autocomplete="off" >
                                <input type="hidden" name="packageId" id="packageId" value="{{ $packageId }}"/>
                            @csrf
                                 <div class="row">
                                      <div class="col-md-4 mb-3">
                                        <lable>Consideration Amount</lable>
                                        <input type="number" class="form-control"  name="consideration" id="consideration" value="0.00"/>
                                        <span class="text-danger"></span>
                                    </div>
                                    
                                     <div class="col-md-4 mb-3">
                                        <lable>Mortgage Consideration</lable>
                                        <input type="number" class="form-control"  name="mortgageConsideration" id="mortgageConsideration" value="0.00"/>
                                        <span class="text-danger"></span>
                                    </div>
                                    
                                     <div class="col-md-4 mb-3">
                                        <lable>Taxable Percent</lable>
                                        <input type="number" class="form-control"  name="taxablePercent" id="taxablePercent" value="0.00"/>
                                        <span class="text-danger"></span>
                                    </div>
                                    
                                      <div class="col-md-6 mb-3">
                                        <lable>Document Title</lable>
                                        <input type="text" class="form-control"  name="name[]" id="name1"/>
                                        <span class="text-danger"></span>
                                    </div>
                                    
                                    <div class="col-md-6 mb-3">
                                        <lable>Document</lable>
                                        <input type="file" class="form-control"  name="document[]" id="document1"/>
                                        <span class="text-danger"></span>
                                    </div>

                                     <div class="col-md-6 mb-3">
                                        <lable>Document Title</lable>
                                        <input type="text" class="form-control"  name="name[]" id="name2"/>
                                        <span class="text-danger"></span>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <lable>Document 2</lable>
                                        <input type="file" class="form-control"  name="document[]" id="document2"/>
                                        <span class="text-danger"></span>
                                    </div>
                                    
                                       <div class="col-md-6 mb-3">
                                        <lable>Document Title</lable>
                                        <input type="text" class="form-control"  name="name[]" id="name3"/>
                                        <span class="text-danger"></span>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <lable>Document 3</lable>
                                        <input type="file" class="form-control"  name="document[]" id="document3"/>
                                        <span class="text-danger"></span>
                                    </div>
                                 </div> 
                                 <input type="submit" class="btn btn-primary" value="Submit">
                             </form>
                            
                         </div>
                     </div>
                 </div>
             </div>
         </div>
         
     </div>
 </section>
 <x-footer-component />