<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Countrywide Process</title>
        <link rel="stylesheet" href="{{ asset('design/css/animate.css') }}" type="text/css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
        <link rel="stylesheet" href="{{ asset('design/css/icofont.css') }}" type="text/css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="{{ asset('design/select2/dist/css/select2.min.css') }}" rel='stylesheet' type='text/css'>

        <link rel="stylesheet" href="{{ asset('design/css/style.css') }}" type="text/css">

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        
        <script>(function(w,d,t,r,u){var f,n,i;w[u]=w[u]||[],f=function(){var o={ti:"149000981"};o.q=w[u],w[u]=new UET(o),w[u].push("pageLoad")},n=d.createElement(t),n.src=r,n.async=1,n.onload=n.onreadystatechange=function(){var s=this.readyState;s&&s!=="loaded"&&s!=="complete"||(f(),n.onload=n.onreadystatechange=null)},i=d.getElementsByTagName(t)[0],i.parentNode.insertBefore(n,i)})(window,document,"script","//bat.bing.com/bat.js","uetq");</script>

    </head>
    <body>

    <section class="tpnavbar">
        <div class="container-fluid">
            <div class="row">
                <div class="col-6 col-md-3">
                    <span style="font-size:26px;cursor:pointer" onclick="openNav()">&#9776;</span>
                </div>
                <div class="col-md-6 text-center d-none d-md-block">
                    <div class="logoicon d-inline-block me-2"><a href="{{ URL::to('/') }}"><img src="{{ asset('design/images/logo-icon-white.png') }}" height="30"></a></div>
                    <div class="cmenu d-inline-block">
                        <ul>
                            <li><a href="{{ URL::to('/') }}"><i class="icofont-ui-home"></i></a></li>
                            <li><a href="{{ URL::to('services') }}">1</a>
                            <div class="hoverbox">
                                <h6><a href="{{ URL::to('services') }}">Services</a></h6>
                                <a href="{{ URL::to('services') }}"><img src="{{ asset('design/images/services-menu-img.jpg') }}"></a>
                            </div>
                            </li>
                            <li><a href="{{ URL::to('company') }}">2</a>
                            <div class="hoverbox">
                                <h6><a href="{{ URL::to('company') }}">Company</a></h6>
                                <a href="{{ URL::to('company') }}"><img src="{{ asset('design/images/company-menu-img.jpg') }}"> </a>
                            </div>
                            </li><li><a href="{{ URL::to('services/'.$efile ->slug_value) }}">3</a>
                            <div class="hoverbox">
                                <h6><a href="{{ URL::to('services/'.$efile ->slug_value) }}">E-Filing</a></h6>
                                <a href="{{ URL::to('services/'.$efile ->slug_value) }}"><img src="{{ asset('design/images/e-fill-menu-img.jpg') }}"></a>
                            </div>
                            </li><li><a href="{{ URL::to('calculator') }}">4</a>
                            <div class="hoverbox">
                                <h6><a href="{{ URL::to('calculator') }}">Pricing</a></h6>
                                <a href="{{ URL::to('calculator') }}"><img src="{{ asset('design/images/procing-menu-img.jpg') }}"></a>
                            </div>
                            </li><li><a href="{{ URL::to('testimonials') }}">5</a>
                            <div class="hoverbox">
                                <h6><a href="{{ URL::to('testimonials') }}">Testimonials</a></h6>
                                <a href="{{ URL::to('testimonials') }}"><img src="{{ asset('design/images/testimo-menu-img.jpg') }}"></a>
                            </div>
                            </li><li><a href="{{ URL::to('agent') }}">6</a>
                            <div class="hoverbox">
                                <h6><a href="{{ URL::to('agent') }}">Agents</a></h6>
                                <a href="{{ URL::to('agent') }}"><img src="{{ asset('design/images/agents-menu-img.jpg') }}"></a>
                            </div>
                            </li><li><a href="{{ URL::to('blog') }}">7</a>
                            <div class="hoverbox">
                                <h6><a href="{{ URL::to('blog') }}">Blog</a></h6>
                                <a href="{{ URL::to('blog') }}"><img src="{{ asset('design/images/blog-menu-img.jpg') }}"></a>
                            </div>
                            </li><li><a href="{{ URL::to('contact-us') }}">8</a>
                            <div class="hoverbox">
                                <h6><a href="{{ URL::to('contact-us') }}">Contact Us</a></h6>
                                <a href="{{ URL::to('contact-us') }}"><img src="{{ asset('design/images/contact-menu-img.jpg') }}"></a>
                            </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-6 col-md-3 text-end">
                    @if(Session::get('loginstatusforCustomer') != true)
                        <a href="{{ URL::to('register') }}" class="registrbtn">Register</a>
                    @endif
                    @if(Session::get('loginstatusforCustomer') == true)
                       <a href="{{ URL::to('logout') }}" class="registrbtn">Logout</a>
                    @else
                        <a href="{{ URL::to('login') }}" class="registrbtn">Login</a>
                    @endif
                </div>
            </div>
        </div>
    </section>