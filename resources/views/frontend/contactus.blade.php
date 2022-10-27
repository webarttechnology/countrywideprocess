
<x-header-component />
 
 <section class="minbody">
     <div class="contactpg">
        <!--  <div class="cmpnyimage wow fadeInDown" data-wow-delay=".10s"><img src="images/contact-us-banner.jpg"></div> -->
         <div class="pgmincontent pt-4">
             <div class="container">
                 <div class="row justify-content-between align-items-center">
                     <div class="col-md-6">
                         <div class="contentbox pb-5 wow fadeInUp text-white" data-wow-delay=".6s">

                             <div class="clogo"><img src="{{ asset('/design/images/logo_bright.png') }}" height="80px"></div>
                             <h3 class="d-inline-block mt-3 py-2 mb-3 ">Company Information</h3>

                             <p><b class="fw-bold">Address :</b><?= htmlspecialchars_decode($company[0]->	address) ?></p>
                             <p><b class="fw-bold">Phone :</b> {{ $company[0]->	mobile_no }}</p>
                             <p><b class="fw-bold">Phone :</b> {{ $company[0]->	mobile_no1 }}</p>
                             <p><b class="fw-bold">Fax :</b> {{ $company[0]->fax }}</p>
                             <p><b class="fw-bold">Email :</b>{{ $company[0]->email_id }}</p>
                            

                             
                             
                             
                         </div>
                     </div>
                     <div class="col-md-5">
                         <div class="cformbox bg-white px-5 pb-5 pt-1 wow bounceInDown" data-wow-delay=".6s">
                             <h1 class="d-inline-block display-6 fw-bold mt-3 py-2 mb-3 text-capitalize">request quote now</h1>
                             <p class="fs-5">Easy to get in touch with us,Once you have complete this form.</p>
                             <span id="errmsg" style="color:red;"></span>
                             <span style="color:green;">{{ Session::get('successmsg') }}</span>
                             <form class="form-horizontal"  action="{{ url('contact-us') }}" method='POST' onsubmit=" return valid(); " enctype="multipart/form-data" >
                              @csrf
                             <div class="row">
                                     <div class="col-md-12">
                                         <div class="mb-3">
                                             <label for="exampleInputEmail1" class="form-label">Name <small class="text-danger">*</small></label>
                                             <input type="text" class="form-control" id="name" name="name" aria-describedby="emailHelp" placeholder="Name">
                                         </div>
                                     </div>
                                     <div class="col-md-12">
                                         <div class="mb-3">
                                             <label for="exampleInputEmail1" class="form-label">Email <small class="text-danger">*</small></label>
                                             <input type="email" class="form-control" id="email_id" name="email_id" aria-describedby="emailHelp" placeholder="Email">
                                         </div>
                                     </div>
                                     <div class="col-md-12">
                                         <div class="mb-3">
                                             <label for="exampleInputEmail1" class="form-label">Phone <small class="text-danger">*</small></label>
                                             <input type="text" class="form-control" id="mobile_no" name="mobile_no" aria-describedby="emailHelp" placeholder="Phone">
                                         </div>
                                     </div>
                                     <div class="col-md-12">
                                         <div class="mb-3">
                                             <label for="exampleInputEmail1" class="form-label">Your City </label>
                                             <input type="text" class="form-control" id="city" name="city" aria-describedby="emailHelp" placeholder="City">
                                         </div>
                                     </div>
                                     <div class="col-md-12">
                                         <div class="mb-3">
                                             <label for="exampleInputEmail1" class="form-label">Looking for ?</label>
                                             <select class="form-select" id="service" name="service" aria-label="Default select example">
                                             <option value=""> -- Select Option -- </option>
                                              @foreach($service as $item)
                                              <option value="{{ $item->name }}">{{$item->name }} </option>
                                              @endforeach
                                             </select>
                                         </div>
                                     </div>
                                 </div>
                                 <div class="mb-3">
                                     <label for="exampleFormControlTextarea1" class="form-label">Comment or Message </label>
                                     <textarea class="form-control" id="comment" name="comment" rows="3" placeholder="Comment"></textarea>
                                 </div>
                                 <input type="submit" class="btn btn-primary d-block fs-4 fw-bold py-2 text-uppercase w-100" value="Send Request">
                             </form>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
         
     </div>
 </section>
<div class="content-main-arrow left ng-scope" >
 <a class="content-arrow-trigger" href="{{ URL::to('blog') }}">
     <div class="info-wrapper">
         <div  class="thumb ng-isolate-scope" style="background-image: url(/design/images/blog-menu-img.jpg); background-size: cover; background-repeat: no-repeat; background-position: 57% 48%;"></div>
         <strong>Previous</strong>
         <span class="ng-binding">Blog</span>
     </div>
     <div class="pointer"></div>
 </a>
</div>
<!-- <div class="content-main-arrow right ng-scope">
 <a class="content-arrow-trigger"  href="company.php">
     <div class="info-wrapper">
         <div class="thumb ng-isolate-scope" style="background-image: url(images/e-fill-menu-img.jpg); background-size: cover; background-repeat: no-repeat; background-position: 50% 50%;"></div>
         <strong>Next</strong>
         <span class="ng-binding">E-Filing</span>
     </div>
     <div class="pointer"></div>
 </a>
</div> -->
<x-footer-component />

<script>
    function valid() {
            if ($("#name").val() == '') {
                $("#errmsg").html("Please Select A Country!!");
                $("#name").focus();
                return false;
            } else if ($("#email_id").val() == '') {
                $("#errmsg").html("Please Enter Fast Name!! ");
                $("#email_id").focus();
                return false;
            }else if ($("#mobile_no").val() == '') {
                $("#errmsg").html("Please Enter Last Name!!");
                $("#mobile_no").focus();
                return false;
            }else if ($("#city").val() == '') {
                $("#errmsg").html("Please Enter Email ID!!");
                $("#city").focus();
                return false;
            }else if ($("#service").val() == '') {
                $("#errmsg").html("Please Select a Service!!");
                //$("#email").css("border-color", "red");
                $("#service").focus();
                return false;
            }else if ($("#comment").val() == '') {
                $("#errmsg").html("Please Select a Service!!");
                //$("#email").css("border-color", "red");
                $("#comment").focus();
                return false;
            }
    }
</script>