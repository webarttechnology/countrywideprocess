<x-countrywide.header title="Agent | CountryWide Process" />
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
                            <a href="{{ URL('admin/agents/add') }}" 
                                class="btn btn-primary m-b-5 m-t-5 pull-right"><i class="fa fa-plus"
                                    aria-hidden="true"></i></a>
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
                                    <th width="15%">Country</th> 
                                    <th width="15%">Name</th>                              
                                    <th width="20%">Email</th>
                                    <th width="20%">Company/ Business Name </th>
                                    <th width="20%">Address1</th>
                                    <th width="20%">State</th>
                                    <th width="20%">Phone</th>
                                    <th width="20%">Years of Experience</th>
                                    <th width="20%">Status</th>
                                    <th width="5%">Action</th>
                                </tr>
                                <tbody>
                                @foreach($agent as $item)
                                <tr>
                                    <td style="color: black;">{{ $loop -> index + 1 }}</td>
                                    <td style="color: black;">{{ $item -> country_id }}</span></td>
                                    <td style="color: black;">{{ $item -> fname ." ". $item ->lname   }}</span></td>
                                    <td style="color: black;">{{ $item -> email_id }}</span></td>
                                    <td style="color: black;">{{ $item -> company }}</span></td>
                                    <td style="color: black;">{{ $item -> address1 }}</span></td>
                                    <td style="color: black;">{{ $item -> state }}</span></td>
                                    <td style="color: black;">{{ $item -> mobile_no }}</span></td>
                                    <td style="color: black;">{{ $item -> yoe." Year" }}</span></td>
                                    <td> <span
                                            class="badge {{ $item -> is_active?'badge-success':'badge-danger' }} m-b-5">{{ $item -> is_active?'Active':'Inactive' }}</span>
                                    </td>

                                    <td style="color: black;"><a
                                            href="{{ URL('admin/agents/update/'.$item -> id) }}"><i
                                                class="fa fa-pencil-square" aria-hidden="true"></i></a> | <a
                                            href="{{ URL('admin/agents/delete/'.$item -> id) }}"
                                            onclick="return confirm('Do you really want to delete this data?')"><i
                                                class="fa fa-trash-o" aria-hidden="true"></i></a>
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

    function getSubCategary(){
            var data =$('#categary_id').val();
            $.ajax({
            type: "GET",
            url: "/author/product/getSubCategary",
            data: {
                categary_id: data
            },
            success: function(response) {
               $("#subcategary_id").html(response);
                
            }
        });
    }



   function valid() {
            if ($("#categary_id").val() == '') {
                $("#errmsg").html("Please Enter A Categary");
                //$("#email").css("border-color", "red");
                return false;
            }else if ($("#subcategary_id").val() == '') {
                $("#errmsg").html("Please Enter A Sub Categary Name");
                //$("#email").css("border-color", "red");
                return false;
            }else if ($("#price").val() == '') {
                $("#errmsg").html("Please Enter Product Price");
                //$("#email").css("border-color", "red");
                return false;
            }else if ($("#tittle").val() == '') {
                $("#errmsg").html("Please Enter A Tittle");
                //$("#email").css("border-color", "red");
                return false;
            } else if ($("#description").val() == '') {
                $("#errmsg").html("Please Enter A Descriptuon");
                //$("#email").css("border-color", "red");
                return false;
            }else if ($("#is_active").val() == '') {
                $("#errmsg").html("Please Select a Status");
                //$("#email").css("border-color", "red");
                return false;
            } 
            else if ($("#image").val() == '') {
                $("#errmsg").html("Please Upload a Picture");
                //$("#email").css("border-color", "red");
                return false;
            }else{
                // var form = $('#form')[0];
                // console.log(form);
                // var data = new FormData(form);
               
                $.ajax({
                    url: "author/product/add",
                    enctype: 'multipart/form-data',
                    type: "POST",
                    data:{
                        categary_id: $('#categary_id').val(),
                        subcategary_id: $('#subcategary_id').val(),
                        price: $('#price').val(),
                        discount_price: $('#discount_price').val(),
                        tittle: $('#tittle').val(),
                        description: $('#description').val(),
                        is_active: $('#is_active').val(),
                    },
                    processData: false, // Importent
                    contentType: false, // Importent
                    cache: false,
                    timeout: 60000000,
                    success: function(response){
                        if(response == 1){
                            console.log(response);
                        }
                    }

                });
            }
        }
</script>
<x-countrywide.footer />

