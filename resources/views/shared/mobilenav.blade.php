<!-- BEGIN: Mobile Menu -->
	<div class="mobile-menu md:hidden">
		<div class="mobile-menu-bar">
			<a href="index.html" class="flex mr-auto">
				<img alt="Midone Tailwind HTML Admin Template" class="w-6" src="{{ asset('images/logo.svg') }}" />
			</a>
			<a href="javascript:;" id="mobile-menu-toggler"> <i data-feather="bar-chart-2" class="w-8 h-8 text-white transform -rotate-90"></i>
			</a>
		</div>
		<div class="side-nav__devider my-6"></div>
		<ul class="border-t border-theme-24 py-5 hidden">
		@role('admin')
			<li>
				<a href="/home" class="menu">
					<div class="menu__icon"><i data-feather="home"></i>
					</div>
					<div class="menu__title">Dashboard</div>
				</a>
			</li>
			
			
			<li>
				<a href="{{ route('members.index') }}" class="menu">
					<div class="menu__icon"><i data-feather="user"></i>
					</div>
					<div class="menu__title">Users</div>
				</a>
			</li>

			<li>
				<a href="javascript:;" class="menu">
					<div class="menu__icon"><i data-feather="check-circle"></i>
					</div>
					<div class="menu__title">Surveys<i data-feather="chevron-down" class="menu__sub-icon"></i>
					</div>
				</a>
				<ul class="">
					<li>
						<a href="{{ route('survey.index') }}" class="menu">
							<div class="menu__icon"><i data-feather="hard-drive"></i>
							</div>
							<div class="menu__title">Surveys</div>
						</a>
					</li>
					<li>
						<a href="{{ route('survey.sendSurvey') }}" class="menu">
							<div class="menu__icon"><i data-feather="send"></i>
							</div>
							<div class="menu__title">Send Surveys</div>
						</a>
					</li>
				</ul>
			</li>

			<li>
				<a href="javascript:;" class="menu">
					<div class="menu__icon"><i data-feather="book"></i>
					</div>
					<div class="menu__title">Projects<i data-feather="chevron-down" class="menu__sub-icon"></i>
					</div>
				</a>
				<ul class="">
					<li>
						<a href="{{ route('projects.category') }}" class="menu">
							<div class="menu__icon"><i data-feather="list"></i>
							</div>
							<div class="menu__title">Project Categories</div>
						</a>
					</li>
					<li>
						<a href="{{ route('projects.subcategory') }}" class="menu">
							<div class="menu__icon"><i data-feather="list"></i>
							</div>
							<div class="menu__title">Project Subcategories</div>
						</a>
					</li>
					
					<li>
						<a href="{{ route('projects.files') }}" class="menu">
							<div class="menu__icon"><i data-feather="paperclip"></i>
							</div>
							<div class="menu__title">Project Files</div>
						</a>
					</li>
				</ul>
			</li>
			<li>
				<a href="javascript:;" class="menu">
					<div class="menu__icon"><i data-feather="edit"></i>
					</div>
					<div class="menu__title">Messages<i data-feather="chevron-down" class="menu__sub-icon"></i>
					</div>
				</a>
				<ul class="">
					<li>
						<a href="side-menu-light-users-layout-1.html" class="menu">
							<div class="menu__icon"><i data-feather="edit-2"></i>
							</div>
							<div class="menu__title">New Message</div>
						</a>
					</li>
					<li>
						<a href="side-menu-light-users-layout-2.html" class="menu">
							<div class="menu__icon"><i data-feather="send"></i>
							</div>
							<div class="menu__title">Sent Message</div>
						</a>
					</li>
					
				</ul>
			</li>
			<li>
				<a href="javascript:;" class="menu">
					<div class="menu__icon"><i data-feather="mail"></i>
					</div>
					<div class="menu__title">Contact Us <i data-feather="chevron-down" class="menu__sub-icon"></i>
					</div>
				</a>
				<ul class="">
					<li>
						<a href="side-menu-light-profile-overview-1.html" class="menu">
							<div class="menu__icon"><i data-feather="activity"></i>
							</div>
							<div class="menu__title">Contact Us</div>
						</a>
					</li>
					<li>
						<a href="side-menu-light-profile-overview-2.html" class="menu">
							<div class="menu__icon"><i data-feather="activity"></i>
							</div>
							<div class="menu__title">Request a Call Back</div>
						</a>
					</li>
					
				</ul>
			</li>
			@endrole
            @role('member')
			<li>
				<a href="{{ route('survey.memberSurvey') }}" class="menu">
					<div class="menu__icon"><i data-feather="check-circle"></i>
					</div>
					<div class="menu__title">Surveys</div>
				</a>
			</li>
			<li>
				<a href="{{ route('chats.member.received') }}" class="menu">
					<div class="menu__icon"><i data-feather="inbox"></i>
					</div>
					<div class="menu__title">Received Messages</div>
				</a>
			</li>
			
		
		@endrole
			
			
		</ul>
	</div>
	<!-- END: Mobile Menu -->