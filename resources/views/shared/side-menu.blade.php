<div class="main-sidebar main-sidebar-sticky side-menu">
				<div class="sidemenu-logo">
					<a class="main-logo" href="{{route('home')}}">
						<img src="{{asset('/dashboard/img/brand/logo-light.png')}}" class="header-brand-img desktop-logo" alt="logo">
						<img src="{{asset('/dashboard/img/brand/icon-light.png')}}" class="header-brand-img icon-logo" alt="logo">
						<img src="{{asset('/dashboard/img/brand/logo.png')}}" class="header-brand-img desktop-logo theme-logo" alt="logo">
						<img src="{{asset('/dashboard/img/brand/icon.png')}}" class="header-brand-img icon-logo theme-logo" alt="logo">
					</a>
				</div>
				<div class="main-sidebar-body">
					<ul class="nav">
                        <li class="nav-header"><span class="nav-label">Dashboard</span></li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('home')}}"><span class="shape1"></span><span class="shape2"></span><i class="ti-home sidemenu-icon"></i><span class="sidemenu-label">Dashboard</span></a>
                        </li>
					@role('admin')

						<li class="nav-item">
							<a class="nav-link with-sub" href="#"><span class="shape1"></span><span class="shape2"></span><i class="fe fe-users sidemenu-icon"></i><span class="sidemenu-label">Users</span><i class="angle fe fe-chevron-right"></i></a>
							<ul class="nav-sub">
								<li class="nav-sub-item">
									<a class="nav-sub-link" href="{{ route('members.index') }}">User List</a>
								</li>
							</ul>
						</li>
						<li class="nav-item">
							<a class="nav-link with-sub" href="#"><span class="shape1"></span><span class="shape2"></span><i class="ti-check-box sidemenu-icon"></i><span class="sidemenu-label">Surveys</span><i class="angle fe fe-chevron-right"></i></a>
							<ul class="nav-sub">
								<li class="nav-sub-item">
									<a class="nav-sub-link" href="{{ route('survey.index') }}">Surveys</a>
								</li>
								<li class="nav-sub-item">
									<a class="nav-sub-link" href="{{ route('survey.sendSurvey') }}">Assign Surveys</a>
								</li>
							</ul>
						</li>
						<li class="nav-item">
							<a class="nav-link with-sub" href="#"><span class="shape1"></span><span class="shape2"></span><i class="ti-tablet sidemenu-icon"></i><span class="sidemenu-label">Devices</span><i class="angle fe fe-chevron-right"></i></a>
							<ul class="nav-sub">
								<li class="nav-sub-item">
									<a class="nav-sub-link" href="{{ route('admin.devices.all')}}">All Devices</a>
								</li>
								<li class="nav-sub-item">
									<a class="nav-sub-link" href="{{ route('admin.devices.available_device')}}">Available Devices</a>
								</li>
								<li class="nav-sub-item">
									<a class="nav-sub-link" href="{{ route('admin.devices.unavailable_device')}}">Unavailable Devices</a>
								</li>
								<li class="nav-sub-item">
									<a class="nav-sub-link" href="{{ route('admin.devices.historical')}}">Device History</a>
								</li>

							</ul>
						</li>
						<li class="nav-header"><span class="nav-label">Projects</span></li>
						<li class="nav-item">
							<a class="nav-link with-sub" href="#"><span class="shape1"></span><span class="shape2"></span><i class="ti-folder sidemenu-icon"></i><span class="sidemenu-label">Projects</span><i class="angle fe fe-chevron-right"></i></a>
							<ul class="nav-sub">
								<li class="nav-sub-item">
									<a class="nav-sub-link" href="{{ route('projects.projects') }}">Projects</a>
								</li>
								<li class="nav-sub-item">
									<a class="nav-sub-link" href="{{ route('projects.category') }}">Categories</a>
								</li>
								<li class="nav-sub-item">
									<a class="nav-sub-link" href="{{ route('projects.subcategory') }}">Sub-categories</a>
								</li>
								
								<li class="nav-sub-item">
									<a class="nav-sub-link" href="{{ route('projects.files') }}">Project Files</a>
								</li>
							
							</ul>
						</li>
						@endrole
                        @role('employee')




                        @endrole
						@role('member')
						<li class="nav-item">
							<a class="nav-link with-sub" href="#suvey"><span class="shape1"></span><span class="shape2"></span><i class="ti-bar-chart-alt sidemenu-icon"></i><span class="sidemenu-label">Surveys</span><span class="badge badge-danger side-badge">5</span></a>
							<ul class="nav-sub">
								<li class="nav-sub-item">
									<a class="nav-sub-link" href="{{ route('survey.memberSurvey') }}">Surveys</a>
								</li>
								
							</ul>
						</li>
						@endrole
						{{--<li class="nav-header"><span class="nav-label">Other Pages</span></li>
						<li class="nav-item">
							<a class="nav-link with-sub" href="#"><span class="shape1"></span><span class="shape2"></span><i class="ti-shield sidemenu-icon"></i><span class="sidemenu-label">Surveys</span><i class="angle fe fe-chevron-right"></i></a>
							<ul class="nav-sub">
								<li class="nav-sub-item">
									<a class="nav-sub-link" href="{{ route('survey') }}">Border</a>
								</li>
								<li class="nav-sub-item">
									<a class="nav-sub-link" href="display.html">Display</a>
								</li>
								<li class="nav-sub-item">
									<a class="nav-sub-link" href="flex.html">Flex</a>
								</li>
								<li class="nav-sub-item">
									<a class="nav-sub-link" href="height.html">Height</a>
								</li>
								<li class="nav-sub-item">
									<a class="nav-sub-link" href="margin.html">Margin</a>
								</li>
								<li class="nav-sub-item">
									<a class="nav-sub-link" href="padding.html">Padding</a>
								</li>
								<li class="nav-sub-item">
									<a class="nav-sub-link" href="position.html">Position</a>
								</li>
								<li class="nav-sub-item">
									<a class="nav-sub-link" href="width.html">Width</a>
								</li>
								<li class="nav-sub-item">
									<a class="nav-sub-link" href="extras.html">Extras</a>
								</li>
							</ul>
						</li>
						<li class="nav-item">
							<a class="nav-link with-sub" href="#"><span class="shape1"></span><span class="shape2"></span><i class="ti-lock sidemenu-icon"></i><span class="sidemenu-label">Custom Pages</span><i class="angle fe fe-chevron-right"></i></a>
							<ul class="nav-sub">
								<li class="nav-sub-item">
									<a class="nav-sub-link" href="signin.html">Sign In</a>
								</li>
								<li class="nav-sub-item">
									<a class="nav-sub-link" href="signup.html">Sign Up</a>
								</li>
								<li class="nav-sub-item">
									<a class="nav-sub-link" href="forgot.html">Forgot Password</a>
								</li>
								<li class="nav-sub-item">
									<a class="nav-sub-link" href="reset.html">Reset Password</a>
								</li>
								<li class="nav-sub-item">
									<a class="nav-sub-link" href="lockscreen.html">Lockscreen</a>
								</li>
								<li class="nav-sub-item">
									<a class="nav-sub-link" href="underconstruction.html">UnderConstruction</a>
								</li>
								<li class="nav-sub-item">
									<a class="nav-sub-link" href="error404.html">404 Error</a>
								</li>
								<li class="nav-sub-item">
									<a class="nav-sub-link" href="error500.html">500 Error</a>
								</li>
							</ul>
						</li>--}}
					</ul>
				</div>
			</div>
