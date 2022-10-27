<x-countrywide.header title="Record | CountryWide Process" />
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
            <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4>{{$title}} List
                           
                        </h4>
                    </div>
                    <div class="card-body">
                        <!-- @foreach($errors -> all() as $errvalue)
                        <span style="color:red">{{ $errvalue }}</span>
                        @endforeach -->

                        <div style="color:green; padding-left:50px ">{{ Session::get('successmsg') }}</div>
                        <div style="color:red; padding-left:50px ">{{ Session::get('errmsg') }}</div>
                        <table id="customers2" class="table datatable">
                            <thead>
                                <tr>
                                    <th width="5%">ID</th>
                                    <th >City</th> 
                                    <th>county</th>  
                                    <th >Recording Type</th>
                                    <th>Payment Amount</th>
                                    <th >Transaction ID</th>
                                    <th >Payment Status</th>
                                    <th  width="20%" >Document</th>    
                                    <th>Action</th>
                                    <th>Export to PDF</th>
                                    <!-- <th>Document Download</th> -->
                                   
                                </tr>
                                <tbody>
                                @foreach($recording as $item)
                               
                                <tr>
                                    <td style="color: black;">{{ $loop -> index + 1 }}</td>
                                    <td style="color: black;">{{ $item -> state_name }}</span></td>
                                    <td style="color: black;">{{ $item -> county }}</span></td>
                                    <td style="color: black;">{{ $item->document_type }}</td>
                                    <td style="color: black;">{{ $item->payment_amt?$item->payment_amt:"-" }}</td>
                                    <td style="color: black;">{{ $item->invoice_no?$item->invoice_no:"-" }}</td>
                                    <td style="color: black;"><span
                                            class="badge {{ $item -> payment_status == 1?'badge-success':'badge-danger' }} m-b-5">{{ $item -> payment_status == 1?'paid':'unpaid' }}</span></td>
                                    <td style="color: black;"><div class="img">
                                    <a href="{{ asset($item->image1) }}"  class="border d-inline-block fs-6 fw-bolder p-2 rounded-3 shadow text-center text-black" target="_blank" download><i class="fa fa-file-pdf-o fs-2 text-danger" ></i></a>
                                          @if($item ->image2 == '')
																	    {{ " " }}
											@else
                                            <a href="{{ asset($item->image2) }}" class="border d-inline-block fs-6 fw-bolder p-2 rounded-3 shadow text-center text-black" target="_blank" download><i class="fa fa-file-pdf-o fs-2 text-danger" ></i></a>
									       @endif  
                                           @if($item ->image3 == '')
																	    {{ " " }}
											@else
                                                    <a href="{{ asset($item->image3) }}" class="border d-inline-block fs-6 fw-bolder p-2 rounded-3 shadow text-center text-black" target="_blank" download><i class="fa fa-file-pdf-o fs-2 text-danger" ></i></a>
									       @endif
                                            
                                           @if($item ->image4 == '')
																	    {{ " " }}
											@else
                                                    <a href="{{ asset($item->image4) }}" class="border d-inline-block fs-6 fw-bolder p-2 rounded-3 shadow text-center text-black" target="_blank" download><i class="fa fa-file-pdf-o fs-2 text-danger" ></i></a>
									       @endif
                                        </span>
                                    </div> </td>
                                   
                                    <td style="color: black;"><a
                                            href="{{ URL('admin/recording/view/'.$item -> id) }}"><i
                                                class="fa fa-eye" aria-hidden="true"></i></a>
                                    </td>

                                    
                                   <td><a href="{{ URL('admin/generate-pdf/'.$item->id) }}"><i class="fa fa-download" aria-hidden="true"></i></a></td>
                                   <!-- <td style="color: black;"><a
                                            href="{{ URL('admin/recording-download/'.$item -> id) }}"><i
                                                class="fa fa-download" aria-hidden="true"></i></a>
                                    </td> -->
                                </tr>
                                @endforeach
                            </tbody>
                            </thead>
                            <tbody>
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!--row closed-->
    </div>
</div>



<x-countrywide.footer />

