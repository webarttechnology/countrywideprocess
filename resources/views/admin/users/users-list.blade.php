<x-countrywide.header title="Users| CountryWide Proccess" />
<x-countrywide.nav />

<div class="app-content">
    <div class="section">
        <!--page-header open-->
        <div class="page-header">
            <h4 class="page-title">{{$title}} List</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#" class="text-light-color">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{$title}} List</li>
            </ol>
        </div>
        <!--page-header closed-->
        <!--row open-->

        <div class="row">
							<div class="col-md-12">
								<div class="card">
									<div class="card-header">
                                    @if($accesrole == 1) 
                                        <h4>Party Without Attorney List</h4>
                                    @endif
                                    @if($accesrole == 2)
                                        <h4>Sole Practitioner</h4>
                                    @endif
                                    @if($accesrole == 3)
                                        <h4>Low Firm</h4>
                                    @endif
									</div>
									<div class="card-body">
										<div class="table-responsive">
											<table id="example" class=" table table-striped table-bordered border-t0 text-nowrap w-100" >

												<thead>
													<tr>
                                                    <th width="5%">ID</th>
                                                        @if($accesrole == 1  )
                                                            <th width="15%">Name</th> 
                                                            <th width="15%">Business Name</th> 
                                                        @endif
                                                        @if($accesrole == 2)
                                                        <th width="15%">Name</th> 
                                                        @endif
                                                        @if($accesrole == 3)
                                                        <th width="15%">Company Name</th> 
                                                        @endif
                                                        <th width="15%">Email</th>                    
                                                        <th width="20%">Mobile</th>
                                                        <th width="20%">Address Type</th>
                                                        <th width="20%">Address</th>
                                                        @if($accesrole == 2)
                                                        <th width="20%">Bar ID</th>
                                                        @endif
                                                        <th width="5%">Action</th>
													</tr>
												</thead>
												<tbody>
                                                @foreach($user as $item)
                                                    <tr>
                                                        <td style="color: black;">{{ $loop -> index + 1 }}</td>
                                                        @if($accesrole == 1)   
                                                            <td style="color: black;">{{ $item->areyou == 1?$item -> fname." ".$item->mname." ".$item->lname:"-" }}</span></td>
                                                            <td style="color: black;">{{ $item->areyou == 2?$item ->businesNameforwithoutatoney:"-"  }}</span></td>
                                                        @endif
                                                        @if($accesrole == 2 )
                                                            <td style="color: black;">{{ $item -> fname." ".$item->mname." ".$item->lname }}</span></td>
                                                        @endif
                                                        @if($accesrole == 3 )
                                                            <td style="color: black;">{{ $item -> company }}</span></td>
                                                        @endif
                                                        <td style="color: black;">{{ $item -> email_id }}</span></td>
                                                        <td style="color: black;">{{ $item -> mobile_no }}</span></td>
                                                        <td style="color: black;">{{ $item -> address_type }}</span></td>
                                                        <td style="color: black;">{{ $item -> address_atoney }}</span></td>
                                                        @if($accesrole == 2)
                                                            <td style="color: black;">{{ $item -> bar_id?$item -> bar_id:"-" }}</span></td>
                                                        @endif
                                                        <td style="color: black;"><a
                                                                href="{{ URL('admin/users/update/'.$item -> id) }}"><i
                                                                    class="fa fa-pencil-square" aria-hidden="true"></i></a> | <a
                                                                href="{{ URL('admin/users/delete/'.$item -> id) }}"
                                                                onclick="return confirm('Do you really want to delete this data?')"><i
                                                                    class="fa fa-trash-o" aria-hidden="true"></i></a>
                                                        </td>
                                                    </tr>
                                                @endforeach
													
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
						</div>

        <!--row closed-->
    </div>
</div>




<x-countrywide.footer />