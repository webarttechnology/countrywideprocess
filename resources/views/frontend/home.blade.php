<x-header-component />
<section class="minbody">
        <div class="bodysecbg" style=""></div>
        <div class="bodysec" style="">
            <div class="pgmincontent">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-6 text-center text-white">
                            <h1 class="border-bottom border-top d-inline-block display-5 fw-bold mt-4 py-3 mb-4 wow bounceInDown" data-wow-delay=".6s">Countrywide Process</h1>
                            <p class="fs-5 mt-0 mb-4 wow fadeInUp" data-wow-delay="1s">We strive to help you thrive by providing convenient and affordable, digital legal services.</p>
                            <ul class="mt-4 wow fadeInUp" data-wow-delay="1.5s">
                                <li><a href="{{ URL::to('services') }}">Services</a></li>
                                <li><a href="{{ URL::to('company') }}">Company</a></li>
                                <li><a href="{{ URL::to('services/'.$efile->slug_value) }}">E-Filing</a></li>
                                <li><a href="{{ URL::to('new-order') }}">Countrywide Document eRecording</a></li>
                                <li><a href="{{ URL::to('calculator') }}">Pricing</a></li>
                                <li><a href="{{ URL::to('testimonials') }}">Testimonials</a></li>
                                <li><a href="{{ URL::to('agent') }}">Agents</a></li>
                                <li><a href="{{ URL::to('blog') }}">Blog</a></li>
                                @if(Session::get('loginstatusforCustomer') == true)
                                    <li><a href="{{ URL::to('erecording-service') }}">eRecord For Me</a></li>
                                @endif
                                <li><a href="{{ URL::to('contact-us') }}">Contact</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- <div class="lplogo"><img src="images/logo_bright.png" /></div> -->
            <div class="nextpgbtn"><a href="{{ URL::to('services') }}"></a></div>
        </div>

    </section>

<x-footer-component />