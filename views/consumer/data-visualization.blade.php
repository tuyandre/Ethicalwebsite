<!doctype html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
	<meta charset="utf-8">
	<title>Data Visualization | Ethical Research Solutions</title>
	<link rel="shortcut icon" href="{{asset('/images/favicon.ico')}}">
	<meta name="description" content="Our interactive dashboard delivers key insights, enabling you to dig deeper into your own data including the ability to communicate directly with your consumers. ">
	<script src="{{asset('/assets/hs/hsstatic/jquery-libs/static-1.1/jquery/jquery-1.7.1.js')}}"></script>
	<script>
		hsjQuery=window['jQuery'];
	</script>
	<meta property="og:description" content="Our interactive dashboard delivers key insights, enabling you to dig deeper into your own data including the ability to communicate directly with your consumers. ">
	<meta property="og:title" content="Data Visualization | Ethical Research Solutions">
	<meta name="twitter:description" content="Our interactive dashboard delivers key insights, enabling you to dig deeper into your own data including the ability to communicate directly with your consumers. ">
	<meta name="twitter:title" content="Data Visualization | Ethical Research Solutions">
	<style>
		a.cta_button{-moz-box-sizing:content-box !important;-webkit-box-sizing:content-box !important;box-sizing:content-box !important;vertical-align:middle}.hs-breadcrumb-menu{list-style-type:none;margin:0px 0px 0px 0px;padding:0px 0px 0px 0px}.hs-breadcrumb-menu-item{float:left;padding:10px 0px 10px 10px}.hs-breadcrumb-menu-divider:before{content:'›';padding-left:10px}.hs-featured-image-link{border:0}.hs-featured-image{float:right;margin:0 0 20px 20px;max-width:50%}@media (max-width: 568px){.hs-featured-image{float:none;margin:0;width:100%;max-width:100%}}.hs-screen-reader-text{clip:rect(1px, 1px, 1px, 1px);height:1px;overflow:hidden;position:absolute !important;width:1px}
	</style>
	<link rel="stylesheet" href="{{asset('/assets/hs-fs/hub/2851660/hub_generated/template_assets/41460985920/1613019980709/Ethical_assets/css/layout.min.css')}}">
	<link rel="stylesheet" href="{{asset('/assets/hs-fs/hub/2851660/hub_generated/template_assets/41460856901/1614052511334/Ethical_assets/css/main.min.css')}}">
	<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=DM+Sans:400,500,700&amp;display=swap">
	<link rel="stylesheet" href="{{asset('/assets/hs-fs/hub/2851660/hub_generated/template_assets/41462098612/1613475141066/Ethical_assets/css/theme-overrides.min.css')}}">
	<link rel="stylesheet" href="{{asset('/assets/hs-fs/hub/2851660/hub_generated/module_assets/41462098608/1613737366839/module_41462098608_menu-section.min.css')}}">
	<link rel="stylesheet" href="{{asset('/assets/hs/hsstatic/cos-LanguageSwitcher/static-1.11/sass/LanguageSwitcher.css')}}">
	<link rel="stylesheet" href="{{asset('/assets/hs-fs/hub/2851660/hub_generated/module_assets/41460985916/1613739063568/module_41460985916_Banner.min.css')}}">
	<link rel="stylesheet" href="{{asset('/assets/hs-fs/hub/2851660/hub_generated/module_assets/41512709220/1613472382565/module_41512709220_Consumer_Research.min.css')}}">
	<link rel="stylesheet" href="{{asset('/assets/hs-fs/hub/2851660/hub_generated/module_assets/41512706848/1613555171237/module_41512706848_Consumer_Data.min.css')}}">
	<link rel="stylesheet" href="{{asset('/assets/hs-fs/hub/2851660/hub_generated/module_assets/41471930513/1613124907650/module_41471930513_Button_type2.min.css')}}">
	<link rel="stylesheet" href="{{asset('/assets/hs-fs/hub/2851660/hub_generated/module_assets/41471038869/1613646500004/module_41471038869_Cases_studies.min.css')}}">
	<link rel="stylesheet" href="{{asset('/assets/hs-fs/hub/2851660/hub_generated/module_assets/41512709667/1613731105700/module_41512709667_Accordion.min.css')}}">
	<link rel="stylesheet" href="{{asset('/assets/hs-fs/hub/2851660/hub_generated/module_assets/41462328234/1613475170222/module_41462328234_Footer_Get_in_touch.min.css')}}">
	<link rel="stylesheet" href="{{asset('/assets/hs-fs/hub/2851660/hub_generated/module_assets/41462374737/1613627253989/module_41462374737_Footer_Social_Icons.min.css')}}">
	<style id="hs_editor_style" type="text/css">
		#hs_cos_wrapper_dnd_area-module-1{display:block !important;padding-left:100px !important}#hs_cos_wrapper_dnd_area-module-6{display:block !important;padding-bottom:70px !important}#hs_cos_wrapper_widget_1613110649455{display:block !important;margin-bottom:70px !important}.DND_banner-row-0-force-full-width-section>.row-fluid{max-width:none !important}.dnd_area-row-0-force-full-width-section>.row-fluid{max-width:none !important}.dnd_area-row-3-background-color{background-color:rgba(248, 249, 250, 1) !important}.dnd_area-row-5-background-color{background-color:rgba(248, 249, 250, 1) !important}@media (min-width:768px){.dnd_area-row-1-vertical-alignment>.row-fluid{display:-ms-flexbox !important;-ms-flex-direction:row;display:flex !important;flex-direction:row}.cell_1613110031399-vertical-alignment{display:-ms-flexbox !important;-ms-flex-direction:column !important;-ms-flex-pack:start !important;display:flex !important;flex-direction:column !important;justify-content:flex-start !important}.cell_1613110031399-vertical-alignment>div{flex-shrink:0 !important}.cell_1613110031399-row-0-vertical-alignment>.row-fluid{display:-ms-flexbox !important;-ms-flex-direction:row;display:flex !important;flex-direction:row}.dnd_area-module-1-vertical-alignment{display:-ms-flexbox !important;-ms-flex-direction:column !important;-ms-flex-pack:center !important;display:flex !important;flex-direction:column !important;justify-content:center !important}.dnd_area-module-1-vertical-alignment>div{flex-shrink:0 !important}.dnd_area-column-2-vertical-alignment{display:-ms-flexbox !important;-ms-flex-direction:column !important;-ms-flex-pack:start !important;display:flex !important;flex-direction:column !important;justify-content:flex-start !important}.dnd_area-column-2-vertical-alignment>div{flex-shrink:0 !important}}.dnd_area-row-0-padding{padding-top:0px !important;padding-bottom:0px !important}.dnd_area-row-1-padding{padding-bottom:0px !important}.dnd_area-row-5-padding{padding-bottom:150px !important}.cell_16131099350812-padding{padding-left:0px !important;padding-right:0px !important}.dnd_area-column-2-padding{padding-left:0px !important;padding-right:0px !important}@media (max-width: 991px){.dnd_area-row-1-padding{padding-top:70px !important}.dnd_area-row-2-padding{padding-top:70px !important;padding-bottom:70px !important}.dnd_area-row-3-padding{padding-top:50px !important;padding-bottom:50px !important}.dnd_area-row-4-padding{padding-top:50px !important;padding-bottom:50px !important}.dnd_area-row-5-padding{padding-bottom:70px !important}.dnd_area-module-1-padding>#hs_cos_wrapper_dnd_area-module-1{padding-top:50px !important;padding-left:0px !important}.dnd_area-module-6-padding>#hs_cos_wrapper_dnd_area-module-6{padding-bottom:50px !important}.widget_1613110649455-margin>#hs_cos_wrapper_widget_1613110649455{margin-bottom:50px !important}.widget_1613110649455-padding>#hs_cos_wrapper_widget_1613110649455{padding-bottom:0px !important}}
	</style>
	<link rel="preconnect" href="https://fonts.gstatic.com/">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=DM+Sans:regular&amp;display=swap">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta property="og:url" content="{{url('/consumer-research/dashboard')}}">
	<meta name="generator" content="HubSpot">
</head>

<body>
	<div class="body-wrapper hs-content-id-41522366791 hs-site-page page ">@include('layouts.partials.header')
		<div class="banner-section">
			<div class="container-fluid banner-area">
				<div class="row-fluid-wrapper">
					<div class="row-fluid">
						<div class="span12 widget-span widget-type-cell " style="" data-widget-type="cell" data-x="0" data-w="12">
							<div class="row-fluid-wrapper row-depth-1 row-number-1 dnd-section DND_banner-row-0-force-full-width-section">
								<div class="row-fluid ">
									<div class="span12 widget-span widget-type-custom_widget dnd-module" style="" data-widget-type="custom_widget" data-x="0" data-w="12">
										<div id="hs_cos_wrapper_DND_banner-module-1" class="hs_cos_wrapper hs_cos_wrapper_widget hs_cos_wrapper_type_module" style="" data-hs-cos-general-type="widget" data-hs-cos-type="module">
											<div class="banner-wrapper without-banner-image ">
												<div class="banner" style="background-color: rgba(248, 249, 250,1.0);">
													<div class="page-center">
														<div class="custom-row">
															<div class="custom-col-7">
																<h1 style="text-align: center;">{{__('datavisual.text_1')}}<br><strong>{{__('datavisual.text_2')}}</strong></h1>
																<div class="btn-container"> <a data-popup="modal" class="hs-button" href="#book-a-demo">{{__('datavisual.text_3')}}</a>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
											@include('layouts.partials.book-demo')
										</div>
									</div>
								</div>
								<style>
									.banner-wrapper .page-center{padding-top:4.375rem;padding-bottom:4.375rem}@media (max-width: 991px){.banner-wrapper .page-center{padding-top:3.125rem;padding-bottom:3.125rem}}
								</style>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	</div>
	</div>
	<main class="body-container-wrapper website-layout ">
		<div class="container-fluid body-container body-container__website">
			<div class="row-fluid-wrapper">
				<div class="row-fluid">
					<div class="span12 widget-span widget-type-cell " style="" data-widget-type="cell" data-x="0" data-w="12">
						<div class="row-fluid-wrapper row-depth-1 row-number-1 dnd_area-row-0-force-full-width-section dnd-section dnd_area-row-0-padding">
							<div class="row-fluid ">
								<div class="span12 widget-span widget-type-cell cell_16131099350812-padding dnd-column" style="" data-widget-type="cell" data-x="0" data-w="12">
									<div class="row-fluid-wrapper row-depth-1 row-number-2 dnd-row">
										<div class="row-fluid ">
											<div class="span12 widget-span widget-type-custom_widget dnd-module" style="" data-widget-type="custom_widget" data-x="0" data-w="12">
												<div id="hs_cos_wrapper_widget_1613109934553" class="hs_cos_wrapper hs_cos_wrapper_widget hs_cos_wrapper_type_module" style="" data-hs-cos-general-type="widget" data-hs-cos-type="module">
													<div class="custom-consumer-research-group three-column">
														<div class="page-center">
															<div class="custom-consumer-research-wrap">
																<div class="custom-consumer-research-item">
																	<h1>9.2/10</h1>
																	<p>{{__('datavisual.text_4')}}</p>
																</div>
																<div class="custom-consumer-research-item">
																	<h1>Top 3</h1>
																	<p>{{__('datavisual.text_5')}}</p>
																</div>
																<div class="custom-consumer-research-item">
																	<h1>+1.6K</h1>
																	<p>{{__('datavisual.text_6')}}</p>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="row-fluid-wrapper row-depth-1 row-number-3 dnd_area-row-1-padding dnd_area-row-1-vertical-alignment dnd-section">
							<div class="row-fluid ">
								<div class="span5 widget-span widget-type-cell dnd_area-column-2-padding dnd-column dnd_area-column-2-vertical-alignment" style="" data-widget-type="cell" data-x="0" data-w="5">
									<div class="row-fluid-wrapper row-depth-1 row-number-4 dnd-row">
										<div class="row-fluid ">
											<div class="span12 widget-span widget-type-custom_widget dnd-module" style="" data-widget-type="custom_widget" data-x="0" data-w="12">
												<div id="hs_cos_wrapper_dnd_area-module-3" class="hs_cos_wrapper hs_cos_wrapper_widget hs_cos_wrapper_type_module widget-type-rich_text" style="" data-hs-cos-general-type="widget" data-hs-cos-type="module"><span id="hs_cos_wrapper_dnd_area-module-3_" class="hs_cos_wrapper hs_cos_wrapper_widget hs_cos_wrapper_type_rich_text" style="" data-hs-cos-general-type="widget" data-hs-cos-type="rich_text"><h3>{{__('datavisual.text_7')}}</h3><p style="margin: 0;">{{__('datavisual.text_8')}}</p></span>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="span7 widget-span widget-type-cell cell_1613110031399-vertical-alignment dnd-column" style="" data-widget-type="cell" data-x="5" data-w="7">
									<div class="row-fluid-wrapper row-depth-1 row-number-5 dnd-row cell_1613110031399-row-0-vertical-alignment">
										<div class="row-fluid ">
											<div class="span12 widget-span widget-type-custom_widget dnd_area-module-1-vertical-alignment dnd_area-module-1-padding dnd-module" style="" data-widget-type="custom_widget" data-x="0" data-w="12">
												<div id="hs_cos_wrapper_dnd_area-module-1" class="hs_cos_wrapper hs_cos_wrapper_widget hs_cos_wrapper_type_module widget-type-linked_image" style="" data-hs-cos-general-type="widget" data-hs-cos-type="module"> <span id="hs_cos_wrapper_dnd_area-module-1_" class="hs_cos_wrapper hs_cos_wrapper_widget hs_cos_wrapper_type_linked_image" style="" data-hs-cos-general-type="widget" data-hs-cos-type="linked_image"><img src="{{asset('/assets/hubfs/Ethical_assets/Images/dashboard-insights-c737cec76f0f7ff5b34bc4b7258b8a333885ec59e62a7faa7339372b087753f6.png')}}" class="hs-image-widget " style="max-width: 100%; height: auto;" alt="No more flat, boring consumer reports" title="No more flat, boring consumer reports"></span>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="row-fluid-wrapper row-depth-1 row-number-6 dnd_area-row-2-padding dnd-section">
							<div class="row-fluid ">
								<div class="span12 widget-span widget-type-cell dnd-column" style="" data-widget-type="cell" data-x="0" data-w="12">
									<div class="row-fluid-wrapper row-depth-1 row-number-7 dnd-row">
										<div class="row-fluid ">
											<div class="span12 widget-span widget-type-custom_widget dnd-module" style="" data-widget-type="custom_widget" data-x="0" data-w="12">
												<div id="hs_cos_wrapper_widget_1613110219692" class="hs_cos_wrapper hs_cos_wrapper_widget hs_cos_wrapper_type_module" style="" data-hs-cos-general-type="widget" data-hs-cos-type="module">
													<div class="custom-consumer-data-group">
														<div class="custom-consumer-data-top">
															<h3>{{__('datavisual.text_9')}}</h3>
														</div>
														<div class="custom-consumer-data-wrap">
															<div class="custom-consumer-data-item">
																<div class="custom-icon"> <i class="material-icons">check_circle_outline</i>
																</div>
																<div class="custom-content">
																	<p><strong>{{__('datavisual.text_10')}} </strong>{{__('datavisual.text_11')}}</p>
																</div>
															</div>
															<div class="custom-consumer-data-item">
																<div class="custom-icon"> <i class="material-icons">check_circle_outline</i>
																</div>
																<div class="custom-content">
																	<p><strong>{{__('datavisual.text_13')}}</strong> {{__('datavisual.text_12')}}</p>
																</div>
															</div>
															<div class="custom-consumer-data-item">
																<div class="custom-icon"> <i class="material-icons">check_circle_outline</i>
																</div>
																<div class="custom-content">
																	<p><strong>{{__('datavisual.text_41')}}</strong> {{__('datavisual.text_42')}}</p>
																</div>
															</div>
															<div class="custom-consumer-data-item">
																<div class="custom-icon"> <i class="material-icons">check_circle_outline</i>
																</div>
																<div class="custom-content">
																	<p><strong>{{__('datavisual.text_15')}} </strong> {{__('datavisual.text_16')}}</p>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="row-fluid-wrapper row-depth-1 row-number-8 dnd-section dnd_area-row-3-padding dnd_area-row-3-background-color">
							<div class="row-fluid ">
								<div class="span12 widget-span widget-type-cell dnd-column" style="" data-widget-type="cell" data-x="0" data-w="12">
									<div class="row-fluid-wrapper row-depth-1 row-number-9 dnd-row">
										<div class="row-fluid ">
											<div class="span12 widget-span widget-type-custom_widget dnd_area-module-6-padding dnd-module" style="" data-widget-type="custom_widget" data-x="0" data-w="12">
												<div id="hs_cos_wrapper_dnd_area-module-6" class="hs_cos_wrapper hs_cos_wrapper_widget hs_cos_wrapper_type_module widget-type-rich_text" style="" data-hs-cos-general-type="widget" data-hs-cos-type="module"><span id="hs_cos_wrapper_dnd_area-module-6_" class="hs_cos_wrapper hs_cos_wrapper_widget hs_cos_wrapper_type_rich_text" style="" data-hs-cos-general-type="widget" data-hs-cos-type="rich_text"><h6 style="margin: 0px; text-align: center;">{{__('datavisual.text_17')}}</h6></span>
												</div>
											</div>
										</div>
									</div>
									<div class="row-fluid-wrapper row-depth-1 row-number-3 dnd-row">
										<div class="row-fluid ">
											<div class="span12 widget-span widget-type-custom_widget dnd-module" style="" data-widget-type="custom_widget" data-x="0" data-w="12">
												<div id="hs_cos_wrapper_widget_1613471317961" class="hs_cos_wrapper hs_cos_wrapper_widget hs_cos_wrapper_type_module" style="" data-hs-cos-general-type="widget" data-hs-cos-type="module">
													<div class="btn-md-wrapper">
														<div class="btn-container center" style="padding-top:px; padding-bottom:px;"> <a data-popup="modal" class="hs-button" href="#book-a-demowidget_1613471317961">{{__('datavisual.text_18')}}</a>
														</div>
													</div>@include('layouts.partials.book-demomodalwidget')</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="row-fluid-wrapper row-depth-1 row-number-12 dnd-section dnd_area-row-5-padding dnd_area-row-5-background-color">
							<div class="row-fluid ">
								<div class="span12 widget-span widget-type-cell dnd-column" style="" data-widget-type="cell" data-x="0" data-w="12">
									<div class="row-fluid-wrapper row-depth-1 row-number-13 dnd-row">
										<div class="row-fluid ">
											<div class="span12 widget-span widget-type-custom_widget widget_1613110649455-padding dnd-module widget_1613110649455-margin" style="" data-widget-type="custom_widget" data-x="0" data-w="12">
												<div id="hs_cos_wrapper_widget_1613110649455" class="hs_cos_wrapper hs_cos_wrapper_widget hs_cos_wrapper_type_module widget-type-rich_text" style="" data-hs-cos-general-type="widget" data-hs-cos-type="module"><span id="hs_cos_wrapper_widget_1613110649455_" class="hs_cos_wrapper hs_cos_wrapper_widget hs_cos_wrapper_type_rich_text" style="" data-hs-cos-general-type="widget" data-hs-cos-type="rich_text"><h2 style="margin: 0px; text-align: center;">{{__('datavisual.text_19')}}</h2></span>
												</div>
											</div>
										</div>
									</div>
									<div class="row-fluid-wrapper row-depth-1 row-number-14 dnd-row">
										<div class="row-fluid ">
											<div class="span12 widget-span widget-type-custom_widget dnd-module" style="" data-widget-type="custom_widget" data-x="0" data-w="12">
												<div id="hs_cos_wrapper_widget_1613110569538" class="hs_cos_wrapper hs_cos_wrapper_widget hs_cos_wrapper_type_module" style="" data-hs-cos-general-type="widget" data-hs-cos-type="module">
													<div class="accordion-md-wrapper collapse">
														<div id="" class="accordion-item how-are-my-results-presented- close">
															<div class="accordion-heading">
																<h3 class="accordion-title"><span>{{__('datavisual.text_20')}}</span></h3>
															</div>
															<div class="accordion-body">
																<div class="accordion-body-inner">
																	<p>{{__('datavisual.text_21')}}</p>
																</div>
															</div>
														</div>
														<div id="" class="accordion-item can-i-share-my-results-with-my-organization--how- close">
															<div class="accordion-heading">
																<h3 class="accordion-title"><span>{{__('datavisual.text_22')}}</span></h3>
															</div>
															<div class="accordion-body">
																<div class="accordion-body-inner">
																	<p>{{__('datavisual.text_23')}}</p>
																</div>
															</div>
														</div>
														<div id="" class="accordion-item what-type-of-information-is-presented-on-the-dashboard- close">
															<div class="accordion-heading">
																<h3 class="accordion-title"><span>{{__('datavisual.text_24')}}</span></h3>
															</div>
															<div class="accordion-body">
																<div class="accordion-body-inner">
																	<p>{{__('datavisual.text_25')}}</p>
																</div>
															</div>
														</div>
														<div id="" class="accordion-item can-i-run-multiple-studies-over-time- close">
															<div class="accordion-heading">
																<h3 class="accordion-title"><span>{{__('datavisual.text_26')}}</span></h3>
															</div>
															<div class="accordion-body">
																<div class="accordion-body-inner">
																	<p>{{__('datavisual.text_27')}}</p>
																</div>
															</div>
														</div>
														<div id="" class="accordion-item how-do-you-address-biases-related-to-the-use-of-social-networks- close">
															<div class="accordion-heading">
																<h3 class="accordion-title"><span>{{__('datavisual.text_28')}}</span></h3>
															</div>
															<div class="accordion-body">
																<div class="accordion-body-inner">
																	<p>{{__('datavisual.text_29')}}</p>
																	<ol>
																		<li><strong>{{__('datavisual.text_30')}}</strong> {{__('datavisual.text_31')}}</li>
																		<li><strong>{{__('datavisual.text_32')}}</strong> {{__('datavisual.text_33')}}</li>
																		<li><strong>{{__('datavisual.text_34')}}</strong> {{__('datavisual.text_35')}}</li>
																		<li><strong>{{__('datavisual.text_36')}}</strong> {{__('datavisual.text_37')}}</li>
																	</ol>
																	<br>
																	<p>{{__('datavisual.text_38')}}
																		<br>
																		<br>{{__('datavisual.text_39')}}
																		<br>
																		<br>{{__('datavisual.text_40')}}</p>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</main>
	<div data-global-resource-path="Ethical_assets/templates/partials/footer.html">@include('layouts.partials.footer')</div>
	</div>
	<script>
		(function(){window.addEventListener('load',function(){setTimeout(function(){var xhr=new XMLHttpRequest();xhr.open('POST.html','/_hcms/perf',true);xhr.setRequestHeader("Content-type","application/json");xhr.onreadystatechange=function(){};var connection=navigator.connection||navigator.mozConnection||navigator.webkitConnection;function populateNetworkInfo(name,connection,info){if(name in connection){info[name]=connection[name];}} var networkInfo={};if(connection){['type','effectiveType','downlink','rtt'].forEach(function(name){populateNetworkInfo(name,connection,networkInfo);});} var perfData={url:location.href,portal:2851660,content:41522366791,group:-1,connection:networkInfo,timing:performance.timing};xhr.send(JSON.stringify(perfData));},3000);});})();
	</script>
	<script src="{{asset('/assets/hs-fs/hub/2851660/hub_generated/template_assets/41472263584/1613044489573/Ethical_assets/js/slick.min.js')}}"></script>
	<script src="{{asset('/assets/hs-fs/hub/2851660/hub_generated/template_assets/41460491108/1614052816253/Ethical_assets/js/main.min.js')}}"></script>
	<script>
		if(typeof hsVars!=='undefined'){hsVars['language']='en';}
	</script>
	<script src="{{asset('/assets/hs/hsstatic/cos-i18n/static-1.27/bundles/project.js')}}"></script>
	<script src="{{asset('/assets/hs-fs/hub/2851660/hub_generated/module_assets/41462098608/1613737366697/module_41462098608_menu-section.min.js')}}"></script>
	<!--[if lte IE 8]> <script charset="utf-8" src="https://js.hsforms.net/forms/v2-legacy.js"></script> <![endif]-->
	<script src="{{asset('/assets/_hcms/forms/v2.js')}}"></script>
	<script>
		var options={formsBaseUrl:'/_hcms/forms/',portalId:'2851660',formId:'0573c9db-1390-46ca-b354-dd5db518bc59',formInstanceId:'8727',pageId:'41522366791',pageName:"Dashboard | Ethical Research Solutions",css:'',target:'#hs_form_target_my_form',contentType:"standard-page",formData:{cssClass:'hs-form stacked hs-custom-form'}};options.getExtraMetaDataBeforeSubmit=function(){var metadata={};if(hbspt.targetedContentMetadata){var count=hbspt.targetedContentMetadata.length;var targetedContentData=[];for(var i=0;i<count;i++){var tc=hbspt.targetedContentMetadata[i];if(tc.length!==3){continue;} targetedContentData.push({definitionId:tc[0],criterionId:tc[1],smartTypeId:tc[2]});} metadata["targetedContentMetadata"]=JSON.stringify(targetedContentData);} return metadata;};hbspt.forms.create(options);
	</script>
	<script>
		var options={formsBaseUrl:'/_hcms/forms/',portalId:'2851660',formId:'bd670cd3-8ec5-4b96-ab4f-f6a1d362bc54',formInstanceId:'4081',pageId:'41522366791',pageName:"Dashboard | Ethical Research Solutions",inlineMessage:"<p style="text-align:center;"><strong>Thank you! You are one step closer to connect with consumers.</strong></p>n<p style="text-align:center;">One of our research experts will contact you shortly.</p>n<p>&nbsp;</p>",rawInlineMessage:"<p style="text-align:center;"><strong>Thank you! You are one step closer to connect with consumers.</strong></p>n<p style="text-align:center;">One of our research experts will contact you shortly.</p>n<p>&nbsp;</p>",hsFormKey:"7cbc4ae882391da7da885e6d69bed9ff",css:'',target:'#hs_form_target_form_732108789',contentType:"standard-page",formData:{cssClass:'hs-form stacked hs-custom-form'}};options.getExtraMetaDataBeforeSubmit=function(){var metadata={};if(hbspt.targetedContentMetadata){var count=hbspt.targetedContentMetadata.length;var targetedContentData=[];for(var i=0;i<count;i++){var tc=hbspt.targetedContentMetadata[i];if(tc.length!==3){continue;} targetedContentData.push({definitionId:tc[0],criterionId:tc[1],smartTypeId:tc[2]});} metadata["targetedContentMetadata"]=JSON.stringify(targetedContentData);} return metadata;};hbspt.forms.create(options);
	</script>
	<script>
		var options={formsBaseUrl:'/_hcms/forms/',portalId:'2851660',formId:'bd670cd3-8ec5-4b96-ab4f-f6a1d362bc54',formInstanceId:'8445',pageId:'41522366791',pageName:"Dashboard | Ethical Research Solutions",inlineMessage:"<p style="text-align:center;"><strong>Thank you! You are one step closer to connect with consumers.</strong></p>n<p style="text-align:center;">One of our research experts will contact you shortly.</p>n<p>&nbsp;</p>",rawInlineMessage:"<p style="text-align:center;"><strong>Thank you! You are one step closer to connect with consumers.</strong></p>n<p style="text-align:center;">One of our research experts will contact you shortly.</p>n<p>&nbsp;</p>",hsFormKey:"fd068592c561b725203922f0309f632c",css:'',target:'#hs_form_target_form_682684572',contentType:"standard-page",formData:{cssClass:'hs-form stacked hs-custom-form'}};options.getExtraMetaDataBeforeSubmit=function(){var metadata={};if(hbspt.targetedContentMetadata){var count=hbspt.targetedContentMetadata.length;var targetedContentData=[];for(var i=0;i<count;i++){var tc=hbspt.targetedContentMetadata[i];if(tc.length!==3){continue;} targetedContentData.push({definitionId:tc[0],criterionId:tc[1],smartTypeId:tc[2]});} metadata["targetedContentMetadata"]=JSON.stringify(targetedContentData);} return metadata;};hbspt.forms.create(options);
	</script>
	<script src="{{asset('/assets/hs-fs/hub/2851660/hub_generated/module_assets/41512709667/1613731105634/module_41512709667_Accordion.min.js')}}"></script>
	<script src="{{asset('/assets/hs/hsstatic/keyboard-accessible-menu-flyouts/static-1.17/bundles/project.js')}}"></script>
	<script type="text/javascript">
		var _hsq=_hsq||[];_hsq.push(["setContentType","standard-page"]);_hsq.push(["setCanonicalUrl","https://www.ethicalresearchsolution.com/consumer-research/data-visualization"]);_hsq.push(["setPageId","41522366791"]);_hsq.push(["setContentMetadata",{"contentPageId":41522366791,"legacyPageId":"41522366791","contentFolderId":null,"contentGroupId":null,"abTestId":null,"languageVariantId":41522366791,"languageCode":"en",}]);
	</script>
	<script type="text/javascript" id="hs-script-loader" async defer src="{{asset('/assets/hs/scriptloader/2851660.js')}}"></script>
	<script type="text/javascript">
		var hsVars={ticks:1616076409095,page_id:41522366791,content_group_id:0,portal_id:2851660,app_hs_base_url:"https://app.hubspot.com",cp_hs_base_url:"https://cp.hubspot.com",language:"en",analytics_page_type:"standard-page",category_id:1,folder_id:0,is_hubspot_user:false}
	</script>
	<script defer src="{{asset('/assets/hs/hsstatic/HubspotToolsMenu/static-1.99/js/index.js')}}"></script>
	<noscript>
		<iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TFFH38K" height="0" width="0" style="display:none;visibility:hidden"></iframe>
	</noscript>
</body>

</html>