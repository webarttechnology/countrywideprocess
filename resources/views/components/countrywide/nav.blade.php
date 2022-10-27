 <!--aside open-->
 <aside class="app-sidebar">
					<div class="app-sidebar__user">
						<div class="dropdown user-pro-body text-center">
							<div class="nav-link pl-1 pr-1 leading-none ">
								<img src="{{ asset('uploads/SmallLogo1.png') }}" alt="user-img" class="avatar-xl rounded-circle mb-1 mCS_img_loaded">
								<span class="pulse bg-success" aria-hidden="true"></span>
							</div>
							<div class="user-info">
								<h6 class=" mb-1 text-dark">{{ Session::get('name')}}</h6>
								<span class="text-muted app-sidebar__user-name text-sm">{{ Session::get('email')}}</span>
							</div>
						</div>
					</div>
					<ul class="side-menu">
						<li class="slide">
							<a class="side-menu__item"  href="{{ URL::to('admin/dashboard') }}"><i class="side-menu__icon fa fa-laptop"></i><span class="side-menu__label">Dashboard</span><span class="badge badge-orange nav-badge"></span></a>
							<ul class="slide-menu">
								<!-- <li><a class="slide-item" href="index.html"><span>Sales Dashboard </span></a></li> -->
							</ul>
						</li>

						<li class="slide">
							<a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fa fa-cogs"></i><span class="side-menu__label">Master Menu</span><i class="angle fa fa-angle-right"></i></a>
							<ul class="slide-menu">
								<li><a href="{{ URL::to('admin/services-master') }}" class="slide-item">Service</a></li>
							    <!-- <li><a href="{{ URL::to('author/blog') }}" class="slide-item">Blog</a></li> -->
							</ul>
						</li>

						<li class="slide">
							<a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fa fa-cogs"></i><span class="side-menu__label">Users</span><i class="angle fa fa-angle-right"></i></a>
							<ul class="slide-menu">
								<li><a href="{{ URL::to('admin/users/1') }}" class="slide-item">Party Without Attorney</a></li>
							    <li><a href="{{ URL::to('admin/users/2') }}" class="slide-item">Sole Practitioner</a></li>
								<li><a href="{{ URL::to('admin/users/3') }}" class="slide-item">Law Firm</a></li>
							</ul>
						</li>


						

						<li class="slide">
							<a class="side-menu__item"  href="{{ URL::to('admin/company') }}"><i class="side-menu__icon fa fa-cube"></i><span class="side-menu__label">Company</span><span class="badge badge-orange nav-badge"></span></a>
							<ul class="slide-menu">
							</ul>
						</li>

						<!-- <li class="slide">
							<a class="side-menu__item"  href="{{ URL::to('admin/e-filing') }}"><i class="side-menu__icon fa fa-cube"></i><span class="side-menu__label">E-Filing</span><span class="badge badge-orange nav-badge"></span></a>
							<ul class="slide-menu">
							</ul>
						</li> -->

						<li class="slide">
							<a class="side-menu__item"  href="{{ URL::to('admin/testimonials') }}"><i class="side-menu__icon fa fa-cube"></i><span class="side-menu__label">Testimonials</span><span class="badge badge-orange nav-badge"></span></a>
							<ul class="slide-menu">
							</ul>
						</li>

					

						<li class="slide">
							<a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fa fa-cogs"></i><span class="side-menu__label">Calculator</span><i class="angle fa fa-angle-right"></i></a>
							<ul class="slide-menu">
								<li><a href="{{ URL::to('admin/price') }}" class="slide-item">Price</a></li>
								<li><a href="{{ URL::to('admin/price-item') }}" class="slide-item">Price item</a></li>
								<li><a href="{{ URL::to('admin/price-zone') }}" class="slide-item">Price Zone</a></li>
								<li><a href="{{ URL::to('admin/price-level') }}" class="slide-item">Price Level</a></li>
							</ul>
						</li>



						<li class="slide">
							<a class="side-menu__item"  href="{{ URL::to('admin/agents') }}"><i class="side-menu__icon fa fa-users"></i><span class="side-menu__label">Agents</span><span class="badge badge-orange nav-badge"></span></a>
							<ul class="slide-menu">
							</ul>
						</li>

						<li class="slide">
							<a class="side-menu__item"  href="{{ URL::to('admin/blog') }}"><i class="side-menu__icon fa fa-cube"></i><span class="side-menu__label">Blog</span><span class="badge badge-orange nav-badge"></span></a>
							<ul class="slide-menu">
							</ul>
						</li>

						<li class="slide">
							<a class="side-menu__item"  href="{{ URL::to('admin/recording') }}"><i class="side-menu__icon fa fa-cube"></i><span class="side-menu__label">Recording</span><span class="badge badge-orange nav-badge"></span></a>
							<ul class="slide-menu">
							</ul>
						</li>

						<!-- <li class="slide">
							<a class="side-menu__item"  href="{{ URL::to('admin/contact') }}"><i class="side-menu__icon fa fa-cube"></i><span class="side-menu__label">Contact</span><span class="badge badge-orange nav-badge"></span></a>
							<ul class="slide-menu">
							</ul>
						</li> -->


						<!-- <li class="slide is-expanded">
                            <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fa fa-cogs"></i><span class="side-menu__label">Master
                                    Menu</span><i class="angle fa fa-angle-right"></i></a>
                            <ul class="slide-menu">
                                <li>
                                    <a class="side-menu__item" href="{{ URL::to('admin/user-privilege') }}"><span class="side-menu__label">User Privilege</span></a>
                                </li>
                            </ul>
                        </li> -->

						<!-- <li class="slide">
							<a class="side-menu__item"  href="{{ URL::to('admin/company') }}"><i class="side-menu__icon fa fa-cube"></i><span class="side-menu__label">Company</span><span class="badge badge-orange nav-badge"></span></a>
							<ul class="slide-menu">
							</ul>
						</li> -->

						<!-- <li class="slide">
							<a class="side-menu__item"  href="{{ URL::to('admin/company/about-us') }}"><i class="side-menu__icon fa fa-cube"></i><span class="side-menu__label">About Us</span><span class="badge badge-orange nav-badge"></span></a>
							<ul class="slide-menu">
							</ul>
						</li> -->
<!-- 
						<li class="slide">
							<a class="side-menu__item"  href="{{ URL::to('admin/change-password') }}"><i class="side-menu__icon fa fa-cogs"></i><span class="side-menu__label">Change Password</span><span class="badge badge-orange nav-badge"></span></a>
							<ul class="slide-menu">
							</ul>
						</li> -->
						
					</ul>
				
 </aside>
				<!--aside closed open-->