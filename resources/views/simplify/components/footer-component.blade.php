
    <div id="mySidenav" class="sidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()"><i class="fa fa-times"></i></a>

        <ul>
            <li class="clearfix">
                <div class="rmenuimg float-start"><a href="{{ URL::to('services') }}"><img src="{{ asset('/design/images/services-menu-img.jpg') }}"></a></div>
                <div class="rmenucontent float-end">
                    <h6><a href="{{ URL::to('services') }}">Services</a></h6>
                    <ul>
                      
                            <li><a href="{{ URL::to('services/') }}">Service</a></li>
                        

                    </ul>
                </div> 
            </li>
            <li class="clearfix">
                 <div class="rmenuimg float-start"><a href="{{ URL::to('company') }}"><img src="{{ asset('design/images/company-menu-img.jpg')}}"></a></div>
                <div class="rmenucontent float-end">
                    <h6><a href="{{ URL::to('company') }}">Company</a></h6>
                    <ul>
                        <li><a href="{{ URL::to('company') }}">Our Mission</a></li>
                    </ul>
                </div> 
            </li>
            <li class="clearfix">
                <div class="rmenuimg float-start"><a href="{{ URL::to('services/efillings-and-eservices') }}"><img src="{{ asset('design/images/e-fill-menu-img.jpg')}}"></a></div>
                <div class="rmenucontent float-end">
                    <h6><a href="{{ URL::to('services') }}">E-Filing</a></h6>
                    <ul>
                        <li><a href="{{ URL::to('services') }}">E-Mail</a></li>
                        <li><a href="{{ URL::to('services') }}">E-Filing Portal</a></li>
                        <li><a href="{{ URL::to('services') }}">Client-oriented Features</a></li>
                        <li><a href="{{ URL::to('pricing') }}">E-Filing Price</a></li>
                    </ul>
                </div> 
            </li>
            <li class="clearfix">
                <div class="rmenuimg float-start"><a href="{{ URL::to('calculator') }}"><img src="{{ asset('design/images/procing-menu-img.jpg') }}"></a></div>
                <div class="rmenucontent float-end">
                    <h6><a href="{{ URL::to('calculator') }}">Pricing</a></h6>
                    <!-- <ul>
                        <li><a href="#">Efilling and Eservices</a></li>
                    </ul> -->
                </div>
            </li>
            <li class="clearfix">
                <div class="rmenuimg float-start"><a href="{{ URL::to('testimonials') }}"><img src="{{ asset('design/images/testimo-menu-img.jpg') }}"></a></div>
                <div class="rmenucontent float-end">
                    <h6><a href="{{ URL::to('testimonials') }}">Testimonials</a></h6>
                    <!-- <ul>
                        <li><a href="#">Efilling and Eservices</a></li>
                    </ul> -->
                </div>
            </li>
            <li class="clearfix">
                <div class="rmenuimg float-start"><a href="{{ URL::to('agent') }}"><img src="{{ asset('design/images/agents-menu-img.jpg') }}"></a></div>
                <div class="rmenucontent float-end">
                    <h6><a href="{{ URL::to('agent') }}">Agents</a></h6>
                    <!-- <ul>
                        <li><a href="#">Efilling and Eservices</a></li>
                    </ul> -->
                </div>
            </li>
            <li class="clearfix">
                <div class="rmenuimg float-start"><a href="{{ URL::to('blog') }}"><img src="{{ asset('design/images/blog-menu-img.jpg') }}"></a></div>
                <div class="rmenucontent float-end">
                    <h6><a href="{{ URL::to('blog') }}">Blog</a></h6>
                    <ul>
                      
                        <li><a href="{{ URL::to('blog')  }}">Blog</a></li>
                    
                    </ul>
                </div>
            </li>
            <li class="clearfix">
                <div class="rmenuimg float-start"><a href="{{ URL::to('contact-us') }}"><img src="{{ asset('design/images/contact-menu-img.jpg') }}"></a></div>
                <div class="rmenucontent float-end">
                    <h6><a href="{{ URL::to('contact-us') }}">Contact</a></h6>
                    <ul>
                        <li><a href="{{ URL::to('contact-us') }}">Company Information</a></li>
                        <li><a href="{{ URL::to('contact-us') }}">Request Quote Now</a></li>
                    </ul>
                </div>
            </li>
        </ul>
    </div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

<script src="{{ asset('design/select2/dist/js/select2.min.js') }}" type="text/javascript"> </script>



<script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>
<script>
wow = new WOW(  
                      {  
                      boxClass:     'wow',                        // default  
                      animateClass: 'animated',         // default  
                      offset:       0,                                // default  
                      mobile:       true,                       // default  
                      live:         true                           // default  
                    }  
                    )  
                    wow.init();  
</script>  

<script type="text/javascript">
    function openNav() {
      document.getElementById("mySidenav").style.width = "400px";
    }
    function closeNav() {
      document.getElementById("mySidenav").style.width = "0";
    }
</script>

<script type="text/javascript">
$(function() {
  $("#coupon_question").on("click",function() {
    $(".answer").toggle(this.checked);
  });
});
</script>
<script>
        $(document).ready(function(){
            
            // Initialize select2
            $("#selService").select2();

            // Read selected option
            $('#but_read').click(function(){
                var username = $('#selService option:selected').text();
                var userid = $('#selService').val();
           
                $('#result').html("id : " + userid + ", name : " + username);
            });
        });

        $(document).ready(function(){
            
            // Initialize select2
            $("#selItem").select2();

            // Read selected option
            $('#but_read').click(function(){
                var username = $('#selItem option:selected').text();
                var userid = $('#selItem').val();
           
                $('#result').html("id : " + userid + ", name : " + username);
            });
        });

        $(document).ready(function(){
            
            // Initialize select2
            $("#selCourt").select2();

            // Read selected option
            $('#but_read').click(function(){
                var username = $('#selCourt option:selected').text();
                var userid = $('#selCourt').val();
           
                $('#result').html("id : " + userid + ", name : " + username);
            });
        });

        $(document).ready(function(){
            
            // Initialize select2
            $("#seljobsize").select2();

            // Read selected option
            $('#but_read').click(function(){
                var username = $('#seljobsize option:selected').text();
                var userid = $('#seljobsize').val();
           
                $('#result').html("id : " + userid + ", name : " + username);
            });
        });

       
        </script>

        
    </body>
</html>