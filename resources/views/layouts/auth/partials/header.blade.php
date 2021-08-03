<body class="has-side-panel side-panel-right fullwidth-page">
<div class="body-overlay"></div>
<div id="side-panel" class="dark layer-overlay overlay-white-8" data-bg-img="{{asset('/images/bg/bg1.jpg')}}">
  <div class="side-panel-wrap">
    <div id="side-panel-trigger-close" class="side-panel-trigger"><a href="#"><i class="icon_close font-30"></i></a></div>
    <div class="side-panel-widget">
      <div class="widget">
        <a href="javascript:void(0)"><img alt="logo" src="{{asset('/images/logo-wide.png')}}"></a>
      </div>
      <div class="widget">
        <h5 class="widget-title">Opening Hours</h5>
        <div class="opening-hours text-left">
          <ul class="list-unstyled">
            <li class="clearfix line-height-1"> <span> Monday - Friday </span>
              <div class="value"> 8.00 - 17.00 </div>
            </li>
            <li class="clearfix line-height-1"> <span> Saturday </span>
              <div class="value"> 9.00 - 15.00 </div>
            </li>
            <li class="clearfix line-height-1"> <span> Sunday </span>
              <div class="value">Closed </div>
            </li>
          </ul>
        </div>
      </div>
      <div class="widget">
        <h5 class="widget-title">Contact Info</h5>
        <ul>
          <li class="font-14 mb-5"><i class="fa fa-phone text-theme-colored"></i> <a href="#" class="text-gray">(+250) 782121650</a> </li>
          <li class="font-14 mb-5"><i class="fa fa-globe text-theme-colored"></i> <a class="text-gray" href="https//ethicalresearchsolution.com">Ethical Research Solutions</a></li>
          <li class="font-14 mb-5"><i class="fa fa-envelope-o text-theme-colored"></i> <a href="#" class="text-gray">info@ethicalresearchsolution.com</a> </li>
        </ul>
      </div>
      <div class="widget">
        <ul class="styled-icons icon-dark icon-theme-colored icon-sm">
          <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
          <li><a href="#"><i class="fa fa-facebook"></i></a></li>
          <li><a href="#"><i class="fa fa-twitter"></i></a></li>
        </ul>
      </div>
      <p>Copyright &copy;2017 </p>
    </div>
  </div>
</div>
<div id="wrapper" class="clearfix">


  </div>

  <!-- Header -->
  <header id="header" class="header modern-header modern-header-theme-colored">
    <div class="header-top bg-theme-colored2 sm-text-center">
      <div class="container">
        <div class="row">
          <div class="col-md-8">
            <div class="widget text-white">
              <i class="fa fa-clock-o text-theme-colored"></i> Opening Hours:  Mon - Tues : 6.00 am - 10.00 pm, Sunday Closed
            </div>
          </div>
          <div class="col-md-4">
            <div class="widget pull-right flip sm-pull-none">
              <ul class="nav navbar-nav list-bordered language-switcher">
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle text-theme-colored" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><img src="{{asset('/images/flags/en.png')}}" alt="En"> ENG <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li><a href="#"><img src="{{asset('images/flags/fr.png')}}" alt="En"> France</a></li>
                    <li><a href="#"><img src="{{asset('/images/flags/de.png')}}" alt="En"> German</a></li>
                    <li><a href="#"><img src="{{asset('/images/flags/it.png')}}" alt="En"> Italy</a></li>
                  </ul>
                </li>
              </ul>
            </div>
            <div class="widget">
              <ul class="list-inline  text-right flip sm-text-center">
                  @guest
                <li class="m-0 pl-10"> <a href="{{url('/survey-panel-member/account-login')}}" class="text-white"><i class="fa fa-user-o mr-5 text-theme-colored"></i> Login /</a> </li>
                <li class="m-0 pl-0 pr-10">
                  <a href="{{url('/survey-panel-member/register')}}" class="text-white"><i class="fa fa-edit mr-5 text-theme-colored"></i>Register</a>
                </li>
                  @else
                      <li class="m-0 pl-10"> <a href="{{url('/home')}}" class="text-white"><i class="fa fa-user-o mr-5 text-theme-colored"></i> Home</a> </li>

                      @endguest
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="header-middle p-0 bg-lightest xs-text-center pb-30">
      <div class="container pt-20 pb-20">
        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-3">
            <a class="menuzord-brand pull-left flip sm-pull-center mb-15" href="{{url('/')}}"><img src="{{asset('/images/logo-wide.png')}}" alt=""></a>
          </div>
          <div class="col-xs-12 col-sm-12 col-md-9">
            <div class="header-widget-contact-info-box">
              <div class="media element contact-info">
                <div class="media-left">
                  <a href="#">
                    <i class="fa fa-envelope text-theme-colored font-icon sm-display-block"></i>
                  </a>
                </div>
                <div class="media-body">
                  <a href="#" class="title">Mail Us Today</a>
                  <h5 class="media-heading subtitle">info@ethicalresearchsolution.com</h5>
                </div>
              </div>
              <div class="media element contact-info">
                <div class="media-left">
                  <a href="#">
                    <i class="fa fa-phone-square text-theme-colored font-icon sm-display-block"></i>
                  </a>
                </div>
                <div class="media-body">
                  <a href="#" class="title">Call us for more details</a>
                  <h5 class="media-heading subtitle">+(250) 782121650</h5>
                </div>
              </div>
              <div class="media element contact-info">
                <div class="media-left">
                  <a href="#">
                    <i class="fa fa-building-o text-theme-colored font-icon sm-display-block"></i>
                  </a>
                </div>
                <div class="media-body">
                  <a href="#" class="title">Company Location</a>
                  <h5 class="media-heading subtitle">KN 01 rd, Muhima</h5>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
   <div class="header-nav">
      <div class="header-nav-wrapper navbar-scrolltofixed">
        <div class="container">
          <nav id="menuzord" class="menuzord blue">
            <div id="side-panel-trigger" class="side-panel-trigger mr-15 ml-15"><a href="#"><i class="fa fa-bars font-24 text-gray"></i></a></div>
            <ul class="menuzord-menu">
              <li><a href="{{url('/')}}">Home</a></li>
                <li><a href="javascript:void(0)">About us</a>
                <div class="megamenu megamenu-bg-img">
                  <div class="megamenu-row">
                    <div class="col3">
                      <h4 class="megamenu-col-title">MEET ETHICAL RESEARCH</h4>
                      <div class="widget">
                        <div class="latest-posts">
                          <article class="post media-post clearfix pb-0 mb-10">

                            <div class="post-right">
                              <h5 class="post-title mt-0 mb-5"><a href="{{url('/about-us/about-us')}}">About us</a></h5>
                            </div>
                          </article>
                          <article class="post media-post clearfix pb-0 mb-10">

                           <div class="post-right">
                              <h5 class="post-title mt-0 mb-5"><a href="{{url('/about-us/carrier')}}">Career Opportunities</a></h5>
                            </div>
                          </article>
                          <article class="post media-post clearfix pb-0 mb-10">

                            <div class="post-right">
                              <h5 class="post-title mt-0 mb-5"><a href="{{url('/about-us/who-we-are')}}">Who We Are</a></h5>
                            </div>
                          </article>
                          <article class="post media-post clearfix pb-0 mb-10">

                            <div class="post-right">
                              <h5 class="post-title mt-0 mb-5"><a href="{{url('/about-us/our-core-values')}}">Our Core Values</a></h5>
                            </div>
                          </article>
                        </div>
                      </div>
                    </div>
                    <div class="col3">
                      <article class="post clearfix">
                        <div class="entry-header">
                          <div class="post-thumb"> <img class="img-responsive" src="{{asset('/images/blog/3.png')}}" alt=""> </div>
                        </div>
                        <div class="entry-content">
						<h5 class="post-title mt-0 mb-5"><a href="{{url('/about-us/carrier')}}">Career Opportunities</a></h5>
                          <p class="">Work with leaders in your field to develop insight, experience and truly add value</p>
                          <a class="btn btn-dark btn-theme-colored" href="{{url('/about-us/carrier')}}">read more..</a> </div>
                      </article>
                    </div>
                    <div class="col3">
                      <article class="post clearfix">
                        <div class="entry-header">
                          <div class="post-thumb"> <img class="img-responsive" src="{{asset('/images/blog/1.jpg')}}" alt=""> </div>
                        </div>
                        <div class="entry-content">
						<h5 class="post-title mt-0 mb-5"><a href="{{url('/about-us/who-we-are')}}">Who we are</a></h5>
                          <p class="">Our expert team knows how to anticipate, collaborate, and innovate.</p>
                          <a class="btn btn-dark btn-theme-colored" href="{{url('/about-us/who-we-are')}}">read more..</a> </div>
                      </article>
                    </div>
                    <div class="col3">
                      <h4 class="megamenu-col-title">Quick Links:</h4>
                      <ul class="list-dashed list-icon">
                        <li><a href="{{url('Privacy')}}">Privacy Policy</a></li>
                        <li><a href="{{url('Disclaimer')}}">Disclaimer</a></li>
                        <li><a href="{{url('Terms-of-Use')}}">Terms of Use</a></li>
                        <li><a href="{{url('copyright')}}">Copyright Notice</a></li>
                      </ul>
                    </div>
                  </div>
                </div>
              </li>
              <li><a href="#">Services</a>
                <ul class="dropdown">
                  <li><a href="{{url('services/social-research')}}">Social Research</a></li>
				  <li><a href="{{url('/services/market-research')}}">Market studies</a></li>
				  <li><a href="{{url('/services/consumer-studies')}}">Consumer studies</a></li>
				  <li><a href="{{url('/services/new-product-test')}}">New product studies</a></li>
				  <li><a href="{{url('/services/branding-studies')}}">Branding studies</a></li>
                </ul>
              </li>
			  <li><a href="#">Research Methods</a>
                <ul class="dropdown">
                  <li><a href="{{url('/research-methods/quantitative-research')}}">Quantitative</a></li>
				  <li><a href="{{url('/research-methods/qualitative-research')}}">Qualitative</a></li>
                </ul>
              </li>



               <li><a href="#">Survey Panel Members</a>
                <ul class="dropdown">
					  <li><a href="{{url('/survey-panel-member/register')}}">Free Registration</a></li>
                      <li><a href="{{url('survey-panel-member/member-terms-and-conditions')}}">Member Terms and Conditions</a></li>
                      <li><a href="{{url('survey-panel-member/reward')}}"> Member Rewards for Completed Surveys</a></li>
                      <li><a href="{{url('survey-panel-member/member-privacy')}}">Member Privacy</a></li>
                      <li><a href="{{url('survey-panel-member/member-faqs')}}">Member FAQs</a></li>
                      <li><a href="{{url('/survey-panel-member/account-login')}}">Survey Member Account Login</a></li>
					            <li><a href="{{url('/survey-panel-member/invite-new-member')}}">Invite New Members</a></li>
                </ul>
              </li>
			  <li><a href="{{url('contact-us')}}">Contact Us</a></li>
            </ul>
          </nav>
        </div>
      </div>
    </div>
  </header>
