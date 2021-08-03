@extends('shared.master') 
@section('title','Full Profile') 
@section('items','Profile ') @section('content')
<!-- Main Content-->
<div class="main-content side-content pt-0">
	<div class="container-fluid">
		<div class="inner-body">
			<!-- Page Header -->
			<div class="page-header">
				<div>
					<h2 class="main-content-title tx-24 mg-b-5">UserList</h2>
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="#">User</a>
						</li>
						<li class="breadcrumb-item active" aria-current="page">Details</li>
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
									<div class="media-list">
										<div class="media">
											<div class="media-body">
												<div>
													<label>Full Name</label> <span class="tx-medium">{{ $member->first_name }} {{ $member->last_name }}</span>
												</div>
											</div>
										</div>
										<div class="media">
											<div class="media-body">
												<div>
													<label>Mobile</label> <span class="tx-medium">{{ $member->telephone }}</span>
												</div>
											</div>
										</div>
										<div class="media">
											<div class="media-body">
												<div>
													<label>Email</label> <span class="tx-medium">{{ $member->email }}</span>
												</div>
											</div>
										</div>
										<div class="media">
											<div class="media-body">
												<div>
													<label>Date of Birth</label> <span class="tx-large">{{ $member->date }}</span>
												</div>
											</div>
										</div>
										<div class="media">
											<div class="media-body">
												<div>
													<label>Gender</label> <span class="tx-medium">{{ $member->gender }}</span>
												</div>
											</div>
										</div>
										<div class="media">
											<div class="media-body">
												<div>
													<label>Status</label>@if($member->confirmed===1) <span class="label text-success d-flex"><span class="dot-label bg-success mr-1"></span>Active</span>@else <span class="label text-warning d-flex"><span class="dot-label bg-warning mr-1"></span>Pending</span>@endif</div>
											</div>
										</div>
										<div class="media mb-0">
											<div class="media-body">
												<div>
													<label>Location</label> <span class="tx-medium">{{ $member->address }}-{{ $member->city }} -{{ $member->state }}- {{ $member->country }}</span>
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
			<!-- End Row -->
		</div>
	</div>
</div>
<!-- End Main Content-->@endsection @section('js')
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
<script src="{{asset('assets/js/form-elements.js')}}"></script>@endsection