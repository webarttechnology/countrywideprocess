<x-dheader-component />
<style>
.infotable th{color:#000;}
</style>
<div class="page-wrapper">
			<div class="page-content">
				<div class="row row-cols-2 row-cols-lg-6 row-cols-xl-4 dashTable">
				<div class="col-md-12">
				<div class="card radius-10">
							<div class="card-body">
								<div class="table-responsive">
					<table class="table align-middle mb-0 infotable">
						<tbody>
							<tr>
								<th width="20%">Package Name</th>
								<td width="30%">{{ $packagedata->packageStatus->name }}</td>
								<th width="20%" >Package Status</th>
								<td><button type="button" class="btn btn-warning">{{ $packagedata->packageStatus->status }}</button></td>
							</tr>
							<tr>
								<th>Recipient</th>
								<td>{{ $packagedata->packageStatus->recipientName." , ".$packagedata->packageStatus->recipientState }}</td>
								<th>Submitter</th>
								<td>CWProcess</td>
							</tr>
							<tr>
								<th>Average Turnaround Time</th>
								<td>Less than 5 minutes - 5 minutes</td>
								<!-- <th>Created By</th>
								<td>@mdo</td> -->
							</tr>
							<tr>
								<!-- <th>Last Modified By</th>
								<td>Mark</td> -->
								
							</tr>
						</tbody>
					</table>
					</div>
					</div>
					</div>
				</div>
                <!-- <div class="form-group row">
                    <label for="staticEmail" class="col-sm-3 col-form-label">Package Name</label>
                    <div class="col-sm-3">
                    <label for="staticEmail" class="col-sm-3 col-form-label">{{ $packagedata->packageStatus->name }}</label>
                    </div>
                </div> -->
					
					
					<!-- <div class="col-lg-12">
						<div class="card radius-10">
							<div class="card-body">
								<div class="d-flex align-items-center">
									<div class="widgets-icons"><i class="bi bi-list-stars"></i>
									</div>
									<div class="ms-auto">
										 <p class="mb-0">500</p> 
										<h4 class="my-1">Closed Orders</h4>
									</div>
								</div>
							</div>
						</div>
					</div> -->
				</div>
				<!--end row-->
                <!--sohom's part-->
                <div class="row dashTable">
                	<div class="col-md-12">
                		<h4 class="d-inline-block">Documents</h4> 
                		<div class="card radius-10">
							<div class="card-body">
								<div class="table-responsive">
									<table class="table align-middle mb-0"> <!-- id="example" -->
										<thead class="table-dark">
											<tr>
												<th width="50%">Name</th>
                                                <th>Amount</th>
												<th>Status</th>
												<!-- <th>Actions</th> -->
											</tr>
										</thead>
										<tbody>
                                            @foreach($docs as $item)
											<tr>
												<td>{{ $item->name ." , " . $item->kindOfInstrument[0] }}</td>
                                                <td>${{ $item->feeInfoEstimated->feeEstimates[0]->amount }}</td>
												<td><button type="button" class="btn btn-warning">{{ $packagedata->packageStatus->status }}</button></td></td>
												<!-- <td><p>
                                                            <a href="{{ url('document-download/'.$item->id) }}"  >
                                                            <i class="bi bi-download"></i>
                                                            </a>
                                                             |
                                                            <a href="{{ url('document-download/'.$item->id) }}">
                                                            <i class="bi bi-file-earmark-pdf"></i>
                                                            </a>
														</p>
                                                        </td> -->
											</tr>
                                            @endforeach
										</tbody>
									</table>
								</div>
							</div>
						</div>
                	</div>
                	
                </div>
            </div>
<x-dfooter-component />