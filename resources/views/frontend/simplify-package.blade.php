<x-dheader-component />
		<div class="page-wrapper">
			<div class="page-content">
				<div class="row row-cols-1 row-cols-lg-4 row-cols-xl-4 dashboard">
					<!-- <div class="col">
						<div class="card radius-10">
							<div class="card-body">
								<div class="d-flex align-items-center">
									<div class="widgets-icons"><i class="bi bi-arrow-right-circle-fill"></i>
									</div>
									<div class=" ms-auto">
										<h4 class="my-1">Place an Order</h4>
									</div>
								</div>
							</div>
						</div>
					</div> -->
					<!-- <div class="col">
						<div class="card radius-10">
							<div class="card-body">
								<div class="d-flex align-items-center">
									<div class="widgets-icons"><i class="bi bi-file-earmark"></i>
									</div>
									<div class=" ms-auto">
										 <p class="mb-0">459</p>
										<h4 class="my-1">Manage Cases (2823)</h4>
									</div>
								</div>
							</div>
						</div>
					</div> -->
					<!-- <div class="col">
						<div class="card radius-10">
							<div class="card-body">
								<div class="d-flex align-items-center">
									<div class="widgets-icons"><i class="bi bi-list-ul"></i>
									</div>
									<div class="ms-auto">
										 <p class="mb-0">500</p> 
										<h4 class="my-1">Pending Orders (397)</h4>
									</div>
								</div>
							</div>
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
                		<h4 class="d-inline-block">Recent Orders ({{ count($packagedata) }})</h4> 
						<!-- <a href="#" class="d-inline-block">View Pending Orders</a> -->
                		<div class="card radius-10">
							<div class="card-body">
								<div class="table-responsive">
									<table class="table align-middle mb-0"> <!-- id="example" -->
										<thead class="table-dark">
											<tr>
												<th>Package</th>
												<th>Recipient</th>
												<th>Docs</th>
                                                <th>Status 1</th>
                                                <th>Status Date</th>
                                                <th>Actions</th>
											</tr>
										</thead>
										<tbody>
                                            @foreach($packagedata as $item)
											<tr>
                                               
												<td><a href="{{ url('viewer-package/'.$item->packageStatus->alternatePackageName) }}">{{ $item->packageStatus->name }}</a></td>
												<td>{{ $item-> packageStatus -> recipientName }}</td>
												<td>{{ count($item->packageStatus->documents) }}</td>
                                                <td><button type="button" class="btn btn-warning">{{ $item->packageStatus->status }}</button></td>
                                                <td>{{ $item->packageStatus->statusDate }}</td>
                                                <td>    <p>
                                                            <a href="{{ url('viewer-package/'.$item->packageStatus->alternatePackageName) }}">
                                                                <span class="glyphicon glyphicon-eye-open"></span>
                                                            </a>
                                                        </p>
                                                </td>
											</tr>
                                            @endforeach
										</tbody>
									</table>
								</div>
							</div>
						</div>
                	</div>
                	<!-- <div class="col-md-6">
                		<h4 class="d-inline-block">Recent Cases (2823)</h4> <a href="#" class="d-inline-block">Manage Cases</a>
                		<div class="card radius-10">
							<div class="card-body">
								<div class="table-responsive">
									<table class="table align-middle mb-0">  id="example" 
										<thead class="table-dark">
											<tr>
												<th>Order</th>
												<th>Details</th>
												<th>Status</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td>Lorem ipsum</td>
												<td>Alex Lima</td>
												<td>Active</td>
											</tr>
											<tr>
												<td>Lorem ipsum</td>
												<td>Alex Lima</td>
												<td>Active</td>
											</tr>
											<tr>
												<td>Lorem ipsum</td>
												<td>Alex Lima</td>
												<td>Active</td>
											</tr>
											<tr>
												<td>Lorem ipsum</td>
												<td>Alex Lima</td>
												<td>Active</td>
											</tr>
											<tr>
												<td>Lorem ipsum</td>
												<td>Alex Lima</td>
												<td>Active</td>
											</tr>
											<tr>
												<td>Lorem ipsum</td>
												<td>Alex Lima</td>
												<td>Active</td>
											</tr>
											<tr>
												<td>Lorem ipsum</td>
												<td>Alex Lima</td>
												<td>Active</td>
											</tr>
											<tr>
												<td>Lorem ipsum</td>
												<td>Alex Lima</td>
												<td>Active</td>
											</tr>
											<tr>
												<td>Lorem ipsum</td>
												<td>Alex Lima</td>
												<td>Active</td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
						</div>
                	</div> -->
                </div>
            </div>
                
                <!--end sohom's part-->
<x-dfooter-component />