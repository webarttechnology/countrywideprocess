<div class="row justify-content-center">
                                    <div class="col-md-7">
                                        <div class="checkprice mt-5">
                                            <div class="text-center">
                                                <h2 class="fw-bold text-black text-capitalize mb-3">Show price list</h2>
                                                <label class="d-inline-block fs-5">Do you want to see the price list?</label>
                                                <div class="mb-5 form-check d-inline-block ms-2">
                                                    <input type="checkbox" class="form-check-input coupon_question" id="coupon_question" value="1">
                                                    <label class="form-check-label fs-5" for="coupon_question">Yes</label>
                                                </div>
                                            </div>
                                            <div id="errmsg" style="color:red; padding-left:50px ">{{ Session::get('errmsg') }}</div>
                                            <div class="answer">
                                                <form action="{{ URL::to('/customer') }} " method='POST' onsubmit=" return valid();" >
                                                @csrf
                                                    <div class="mb-3">
                                                        <label for="" class="form-label">Full Name</label>
                                                        <input type="text" name="name" id="name" class="form-control" >
                                                        @if ($errors->has('name'))
                                                                <span class="text-danger">{{ $errors->first('name') }}</span>
                                                        @endif
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="exampleInputEmail1" class="form-label">Email Address</label>
                                                        <input type="email" class="form-control" id="email_id" name="email_id" aria-describedby="emailHelp">
                                                        @if ($errors->has('email_id'))
                                                                <span class="text-danger">{{ $errors->first('email_id') }}</span>
                                                        @endif
                                                    </div>
                                                    
                                                    <input type="submit" class="btn btn-primary d-block fs-5 fw-bold h-auto py-2 text-uppercase w-100" value="Submit">
                                                </form>
                                            </div>
                                        </div>
                                    </div>
</div>

<script>

function valid() {
            if ($("#name").val() == '') {
                $("#errmsg").html("Please enter Name!!");
                //$("#email").css("border-color", "red");
                return false;
            } else if ($("#email_id").val() == '') {
                $("#errmsg").html("Please Enter Email_id!! ");
                //$("#email").css("border-color", "red");
                return false;
            }
    }

</script>