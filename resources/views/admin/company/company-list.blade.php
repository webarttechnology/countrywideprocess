<x-countrywide.header title="Company | CountryWide Process" />
<x-countrywide.nav />

<div class="app-content">
    <div class="section">
        <!--page-header open-->
        <div class="page-header">
            <h4 class="page-title">{{$title}} </h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#" class="text-light-color">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{$title}} </li>
            </ol>
        </div>
        <!--page-header closed-->
        <!--row open-->
        <div class="row">
            <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4>{{$title}} 
                            <!-- <a href="{{ URL('/Comapny/add') }}" 
                                class="btn btn-primary m-b-5 m-t-5 pull-right"><i class="fa fa-plus"
                                    aria-hidden="true"></i></a> -->
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
                                    <th width="15%">Our Mission</th>
                                    <th width="15%">Image</th> 
                                    <th width="15%">Logo</th>                       
                                    <th width="5%">Action</th>
                                </tr>
                                <tbody>
                                @foreach($company as $item)
                                <tr>
                                    <td style="color: black;">{{ $loop -> index + 1 }}</td>
                                    <td style="color: black;"><?= htmlspecialchars_decode(Str::limit($item->ourmission_details,300,$end='...')) ?></span></td>
                                    <td style="color: black;"><div class="img">
                                        <img src="{{ asset($item -> image) }}" alt="" height="60px" weidth="40px">
                                    </div></span></td>
                                    <td style="color: black;"><div class="img">
                                        <img src="{{ asset($item -> logo) }}" alt="" height="60px" weidth="40px">
                                    </div></span></td>
                                    <td style="color: black;"><a
                                            href="{{ URL('admin/company/update/'.$item -> id) }}"><i
                                                class="fa fa-pencil-square" aria-hidden="true"></i></a>
                                    </td>
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


<script>

</script>
<x-countrywide.footer />