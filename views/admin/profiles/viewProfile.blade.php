@extends('shared.master')
@section('title','Full Profile')
@section('css')
<link href="{{asset('/dashboard/assets/extra-libs/datatables.net-bs4/css/dataTables.bootstrap4.css')}}" rel="stylesheet">
<link r type="text/css" href="{{asset('/dashboard/assets/extra-libs/datatables.net-bs4/css/responsive.dataTables.min.css')}}" rel="stylesheet">@endsection @section('items','Profile ') @section('content')
<!-- Main Content-->
<div class="main-content side-content pt-0">
	<div class="container-fluid">
		<div class="inner-body">
			<!-- Page Header -->
			<div class="page-header">
				<div>
					<h2 class="main-content-title tx-24 mg-b-5">Contacts</h2>
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="#">Apps</a>
						</li>
						<li class="breadcrumb-item active" aria-current="page">Contacts</li>
					</ol>
				</div>
				<div class="d-flex">
					<div class="justify-content-center">
						<button type="button" class="btn btn-white btn-icon-text my-2 mr-2"> <i class="fe fe-download mr-2"></i> Import</button>
						<button type="button" class="btn btn-white btn-icon-text my-2 mr-2"> <i class="fe fe-filter mr-2"></i> Filter</button>
						<button type="button" class="btn btn-primary my-2 btn-icon-text"> <i class="fe fe-download-cloud mr-2"></i> Download Report</button>
					</div>
				</div>
			</div>
			<!-- End Page Header -->
			<!-- Row -->
			<div class="row row-sm">
				<div class="col-sm-12 col-md-5 col-xl-4">
					<div class="card custom-card overflow-hidden">
						<div class="">
							<div class="main-content-app main-content-contacts pt-0">
								<div class="card main-content-left main-content-left-contacts">
									<div class="tab-menu-heading">
										<div class="tabs-menu1 ">
											<!-- Tabs -->
											<ul class="nav panel-tabs main-nav-line main-nav-line-chat d-flex pl-3 ">
												<li><a href="#all-contact" class="nav-link active mr-3" data-toggle="tab">Profile</a>
												</li>
											</ul>
										</div>
									</div>
									<div class="panel-body tabs-menu-body p-0">
										<div class="card">
											<div class="card-body">
												<?php $photo=Auth::user()->photo; ?> @if(empty($photo))	<span class="main-img-user"><img alt="avatar" src="{{ asset('images/user.svg') }}"></span>
												@else	<span class="main-img-user"><img alt="avatar" src="{{ asset('uploads/profiles/'.$photo)}}"></span>
												@endif
												<h4 class="card-title mt-2">{{ Auth::user()->username }}</h4>
												<h6 class="card-subtitle">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</h6>
											</div>
											<div>
												<hr>
											</div>
											<div class="card-body"> <small class="text-muted">Email address </small>
												<h6><a href="{{ Auth::user()->email }}" class="__cf_email__" data-cfemail="1f777e71717e7870697a6d5f78727e7673317c7072">{{ Auth::user()->email }}</a></h6>
												<small class="text-muted pt-4 db">Phone</small>
												<h6>{{ Auth::user()->telephone }}</h6>
												<small class="text-muted pt-4 db">Address</small>
												<h6>{{ Auth::user()->address }}-{{ Auth::user()->city }} -{{ Auth::user()->state }}- {{ Auth::user()->country }}</h6>
												{{--<small class="text-muted pt-4 db">Social Profile</small>--}} {{--
												<br/>--}} {{--
												<button class="btn btn-circle btn-secondary"><i class="fab fa-facebook-f"></i>
												</button>--}} {{--
												<button class="btn btn-circle btn-secondary"><i class="fab fa-twitter"></i>
												</button>--}} {{--
												<button class="btn btn-circle btn-secondary"><i class="fab fa-youtube"></i>
												</button>--}}</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-sm-12 col-md-7 col-xl-8">
					<div class="card custom-card">
						<div class="">
							<div class="main-content-body main-content-body-contacts">
								<div class="main-contact-info-body">
									<form class="form-horizontal" id="infoForm" method="post" action="{{ route('profiles.updateInfo') }}">@csrf
										<div id="add-messages"></div>
										<div class="mb-4 main-content-label">Info</div>
										<div class="form-group ">
											<div class="row row-sm">
												<div class="col-md-3">
													<label class="form-label">User Name</label>
												</div>
												<div class="col-md-9">
													<input type="text" class="form-control" placeholder="User Name" value="{{ Auth::user()->username }}" name="username" id="username">
												</div>
											</div>
										</div>
										<div class="form-group ">
											<div class="row row-sm">
												<div class="col-md-3">
													<label class="form-label">First Name</label>
												</div>
												<div class="col-md-9">
													<input type="text" class="form-control" placeholder="First Name" name="first_name" value="{{ Auth::user()->first_name }}">
												</div>
											</div>
										</div>
										<div class="form-group ">
											<div class="row row-sm">
												<div class="col-md-3">
													<label class="form-label">last Name</label>
												</div>
												<div class="col-md-9">
													<input type="text" class="form-control" placeholder="Last Name" value="{{ Auth::user()->last_name }}" name="last_name">
												</div>
											</div>
										</div>
										<div class="mb-4 main-content-label">Contact Info</div>
										<div class="form-group ">
											<div class="row row-sm">
												<div class="col-md-3">
													<label class="form-label">Email<i>(required)</i>
													</label>
												</div>
												<div class="col-md-9">
													<input type="email" class="form-control" placeholder="Email" value="{{ Auth::user()->email }}" required name="email">
												</div>
											</div>
										</div>
										<div class="form-group ">
											<div class="row row-sm">
												<div class="col-md-3">
													<label class="form-label">Phone</label>
												</div>
												<div class="col-md-9">
													<input type="text" class="form-control" placeholder="phone number" value="{{ Auth::user()->telephone }}" required name="telephone">
												</div>
											</div>
										</div>
										<div class="form-group ">
											<div class="row row-sm">
												<div class="col-md-3">
													<label class="form-label">Birth Date</label>
												</div>
												<div class="col-md-9">
																<input type="date" class="form-control fc-datepicker" placeholder="MM/DD/YYYY"  value="{{ Auth::user()->date }}" required name="date">
															</div>
											</div>
										</div>
										<div class="form-group ">
											<div class="row row-sm">
												<div class="col-md-3">
													<label class="form-label">Address</label>
												</div>
												<div class="col-md-9">
													<input type="text" class="form-control" placeholder="Address" value="{{ Auth::user()->address }}" name="address" id="address">
												</div>
											</div>
										</div>
										<div class="form-group ">
											<div class="row row-sm">
												<div class="col-md-3">
													<label class="form-label">Country</label>
												</div>
												<div class="col-md-9">
													<select class="form-control form-control-line" required name="country">
														<option value="{{ Auth::user()->country }}">{{ Auth::user()->country }}</option>
													</select>
												</div>
											</div>
										</div>
										<div class="form-group ">
											<div class="row row-sm">
												<div class="col-md-3">
													<label class="form-label">State</label>
												</div>
												<div class="col-md-9">
													<input type="text" class="form-control" placeholder="State/Province" value="{{ Auth::user()->state }}" name="state" id="state" required name="telephone">
												</div>
											</div>
										</div>
										<div class="form-group mb-0">
											<div class="row row-sm">
												<div class="col-md-9">
													<div class="mt-3">
														<input type="submit" class="btn btn-primary mr-1" id="btnSave" value="Update Profile" />
													</div>
												</div>
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- End Row -->
		</div>
	</div>
</div>
<!-- End Main Content-->
@endsection 
@section('js')

<script>
	$(document).ready(function () {
	
	            $('#infoForm').submit(function (e) {
	                e.preventDefault();
	                var form = $(this);
	                var btn = $('#btnSave');
	                btn.button('loading');
	                $.ajax({
	                    url: form.attr('action'),
	                    method: form.attr('method'),
	                    data: form.serialize()
	                }).done(function (data) {
	                    console.log(data);
	
	                    if (data.info == "ok") {
	                        btn.button('reset');
	                        form[0].reset();
	                        // reload the table
	
	                        $('#add-messages').html('<div class="alert alert-success flat">' +
	                            '<button type="button" class="close" data-dismiss="alert">&times;</button>' +
	                            '<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> Info successfully Updated. </div>');
	
	                        $(".alert-success").delay(500).show(10, function () {
	                            $(this).delay(3000).hide(10, function () {
	                                $(this).remove();
	                            });
	                        });
	                    }
	                }).fail(function (response) {
	                    console.log(response.responseJSON);
	
	                    btn.button('reset');
	//                    showing errors validation on pages
	
	                    var option = "";
	                    option += response.responseJSON.message;
	                    var data = response.responseJSON.errors;
	                    $.each(data, function (i, value) {
	                        console.log(value);
	                        $.each(value, function (j, values) {
	                            option += '<p>' + values + '</p>';
	                        });
	                    });
	                    $('#add-messages').html('<div class="alert alert-danger flat">' +
	                        '<button type="button" class="close" data-dismiss="alert">&times;</button>' +
	                        '<strong><i class="glyphicon glyphicon-remove"></i></strong><b>oops:</b>' + option + '</div>');
	
	                    $(".alert-success").delay(500).show(10, function () {
	                        $(this).delay(3000).hide(10, function () {
	                            $(this).remove();
	                        });
	                    });
	
	                    //alert("Internal server error");
	                });
	                return false;
	            });
	
	        });
</script>
<script src="{{asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js')}}"></script>

		<!-- Internal Jquery.maskedinput js-->
		<script src="{{asset('assets/plugins/jquery.maskedinput/jquery.maskedinput.js')}}"></script>

		<!-- Internal Specturm-colorpicker js-->
		<script src="{{asset('assets/plugins/spectrum-colorpicker/spectrum.js')}}"></script>

		<!-- Internal Ion-rangeslider js-->
        <script src="{{asset('assets/plugins/ion-rangeslider/js/ion.rangeSlider.min.js')}}"></script>

		<!-- Internal Form-elements js-->
		<script src="{{asset('assets/js/form-elements.js')}}"></script>
@endsection