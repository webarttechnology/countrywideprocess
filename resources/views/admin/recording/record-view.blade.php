<x-countrywide.header title="eRecording | CountrywideProcess" />
<x-countrywide.nav />
<div class="wave -three"></div>
<div class="app-content">
				<section class="section">


                        <!--page-header open-->
						<div class="page-header">
							<h4 class="page-title">Assisted eRecording</h4>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="{{ url('admin/recording') }}" class="text-light-color">eRecording</a></li>
								<li class="breadcrumb-item active" aria-current="page">Assisted eRecording Details</li>
							</ol>
						</div>
						<!--page-header closed-->

                        <!--row open-->
						
						<!--row closed-->

                        <!--row open-->
                        <div class="row profile-card">
							

							<div class="col-lg-12 col-md-12 col-sm-12">
								<div class="card">
									<div class="card-header">
										<h4>Basic Details</h4>
									</div>
									<div class="card-body">
										<p><b>State :</b> {{ $recording->state_name }}</p>
										<p><b>County :</b> {{ $recording->county }}</p>
										<p><b>Document Type :</b> {{ $recording->document_type }}</p>
										<p><b>Payment Status :</b>  <span class="badge badge-{{$recording->payment_status == 1?'success':'danger'}} m-b-5">{{$recording->payment_status == 1?"Paid":"Unpaid"}}</p>
										@if($recording->payment_status == 1)
										<p><b>Payment Amount :</b> {{ $recording->payment_amt }}</p>
										@endif
									</div>
								</div>
                              </div>
                              <div class="col-lg-6 col-md-12 col-sm-12">
								<div class="card">
									<div class="card-header">
										<h4>Grantor Information</h4>
									</div>
									<div class="card-body">
                                    <p><b>Suffix :</b> {{ $recording->suffix }}</p>
                                    @if($recording ->inlineRadio2 == "true")
										<p><b>Organization Name :</b> {{ $recording->organization_name }}</p>
										<p><b>Authorized Agent Name:</b> {{ $recording->authorized_agent_name }}</p>
                                    @endif
                                        <p><b>First Name :</b> {{ $recording->first_name }}</p>
										<p><b>Last Name :</b> {{ $recording->last_name }}</p>
									</div>
                                    
								</div>
                               </div>

							   @if($recording->state_name == "New York")

							   <div class="col-lg-6 col-md-12 col-sm-12">
								<div class="card">
									<div class="card-header">
										<h4>Legal Descriptions</h4>
									</div>
									<div class="card-body">
                                    <p><b>Section :</b> {{ $recording->section }}</p>
										<p><b>Block :</b> {{ $recording->block }}</p>
										<p><b>Lot:</b> {{ $recording->lot }}</p>
                                  
                                        <p><b>Unit :</b> {{ $recording->unit }}</p>
										<p><b>Town :</b> {{ $recording->town }}</p>
									</div>
                                    
								</div>
                               </div>
							   @endif

                               <div class="col-lg-6 col-md-12 col-sm-12">
								<div class="card">
									<div class="card-header">
										<h4>Grantee Information</h4>
									</div>
									<div class="card-body">
                                    <p><b>Suffix :</b> {{ $recording->suffix }}</p>
                                    @if($recording ->grantee_inlineRadio2 == "true")
										<p><b>Organization Name :</b> {{ $recording->grantee_organization_name }}</p>
										<p><b>Authorized Agent Name:</b> {{ $recording->grantee_authorized_agent_name }}</p>
                                    @endif
                                        <p><b>First Name :</b> {{ $recording->grantee_first_name }}</p>
										<p><b>Last Name :</b> {{ $recording->grantee_last_name }}</p>
									</div>
                                    
								</div>
                               </div>

                               <div class="col-lg-5 col-md-12 col-sm-12">
								<div class="card">
									<div class="card-header">
										<h4>Property Taxation Info</h4>
									</div>
									<div class="card-body">
                                    <p><b>Transfer Tax Exempt :</b> {{ $recording->transfer_tax_exempt1 == "true"?"Yes":"No" }}</p>
                                    <p><b>Consideration Amount in  :</b> ${{ $recording->consideration_amount }}</p>
                                   
										<p><b>Party Count :</b> {{ $recording->party_count }}</p>
										<p><b>Transfer Tax($):</b> {{ $recording->transfer_tax }}</p>
                                  
                                        <p><b>Title Count :</b> {{ $recording->title_count }}</p>
                                 
										<p><b>SB2 Fee Exempt :</b>{{ $recording ->sb2 == "true"?"True":"False"}} </p>
                                     
									</div>
                                    
								</div>
                               </div>
                               <div class="col-lg-7 col-md-12 col-sm-12">
								<div class="card">
									<div class="card-header">
										<h4>Recently Connected</h4>
									</div>
									<div class="card-body pt-3 pb-3">
										<div class="memberblock mb-0">
											<div class="row ">
												<div class="col-lg-2 pl-1 pr-1 m-t-5 m-b-5">
													<a href="{{ asset($recording->image1) }}" class="member text-center " target="_blank" download> <img src="{{ asset('design\images\document.png') }}" alt="" class="mb-2">
														<div class="memmbername fs-16"><i class="fa fa-download mr-2"></i>  Document1 </div>
													</a>
												</div>
                                                @if($recording ->image2 == '')
																	    {{ " " }}
											    @else
												<div class="col-lg-2 pl-1 pr-1 m-t-5 m-b-5">
													<a href="{{ asset($recording->image2) }}" class="member text-center" target="_blank" download> <img src="{{ asset('design\images\document.png') }}" alt="" class="mb-2">
														<div class="memmbername fs-16"><i class="fa fa-download mr-2"></i>Document2</div>
													</a>
												</div>
                                                @endif
                                                @if($recording ->image3 == '')
																	    {{ " " }}
											    @else
                                                    <div class="col-lg-2 pl-1 pr-1 m-t-5 m-b-5">
                                                        <a href="{{ asset($recording->image3) }}" class="member text-center" target="_blank" download><img src="{{ asset('design\images\document.png') }}" alt="" class="mb-2">
                                                            <div class="memmbername fs-16"><i class="fa fa-download mr-2"></i>Document3</div>
                                                        </a>
                                                    </div>
                                                @endif

											
                                            @if($recording ->image4 == '')
																	    {{ " " }}
											    @else
												<div class="col-lg-2 pl-1 pr-1 mb-0 m-t-5 m-b-5">
                                               
													<a href="{{ asset($recording->image4) }}" class="member text-center" target="_blank" download> <img src="{{ asset('design\images\document.png') }}" alt="" class="mb-2">
														<div class="memmbername fs-16"><i class="fa fa-download mr-2"></i> Document4</div>
													</a>
											   </div>
                                            @endif
										</div>
									</div>
								</div>
							</div>
						</div>
				</section>
			</div>



<x-countrywide.footer />

