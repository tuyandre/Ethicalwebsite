@extends('shared.master') @section('title','Full Profile') @section('items','Profile ') @section('content')
<div class="main-content side-content pt-0">
	<div class="container-fluid">
		<div class="inner-body">
			<!-- Page Header -->
			<div class="page-header">
				<div>
					<h2 class="main-content-title tx-24 mg-b-5">Profile</h2>
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="#">Pages</a>
						</li>
						<li class="breadcrumb-item active" aria-current="page">Profile</li>
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
			<div class="row square">
				<div class="col-lg-12 col-md-12">
					<div class="card custom-card">
						<div class="card-body">
							<div class="panel profile-cover">
								<div class="profile-cover__img">
									<img src="{{asset('assets/img/users/1.jpg')}}" alt="img" />
									<h3 class="h3">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</h3>
								</div>
								<div class="btn-profile">
									<button class="btn btn-rounded btn-danger">	<i class="fa fa-plus"></i>
										<span>Follow</span>
									</button>
									<button class="btn btn-rounded btn-success">	<i class="fa fa-comment"></i>
										<span>Message</span>
									</button>
								</div>
								<div class="profile-cover__action bg-img"></div>
								<div class="profile-cover__info">
									<ul class="nav">
										<li><strong>26</strong>Projects</li>
										<li><strong>33</strong>Followers</li>
										<li><strong>136</strong>Following</li>
									</ul>
								</div>
							</div>
							<div class="profile-tab tab-menu-heading">
								<nav class="nav main-nav-line p-3 tabs-menu profile-nav-line bg-gray-100">	<a class="nav-link  active" data-toggle="tab" href="#about">About</a>
									<a class="nav-link" data-toggle="tab" href="#edit">Edit Profile</a>
								</nav>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- End Row -->
			<!-- Row -->
			<div class="row row-sm">
				<div class="col-lg-12 col-md-12">
					<div class="card custom-card main-content-body-profile">
						<div class="tab-content">
							<div class="main-content-body tab-pane p-4 border-top-0 active" id="about">
								<div class="card-body p-0 border p-0 rounded-10">
									<div class="border-top"></div>
									<div class="p-4">
										<label class="main-content-label tx-13 mg-b-20">Contact</label>
										<div class="d-sm-flex">
											<div class="mg-sm-r-20 mg-b-10">
												<div class="main-profile-contact-list">
													<div class="media">
														<div class="media-icon bg-primary-transparent text-primary"> <i class="icon ion-md-phone-portrait"></i> 
														</div>
														<div class="media-body"> <span>Mobile</span>
															<div>{{ Auth::user()->telephone }}</div>
														</div>
													</div>
												</div>
											</div>
											<div class="">
												<div class="main-profile-contact-list">
													<div class="media">
														<div class="media-icon bg-info-transparent text-info"> <i class="icon ion-md-locate"></i> 
														</div>
														<div class="media-body"> <span>Current Address</span>
															<div>{{ Auth::user()->address }}</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="border-top"></div>
									<div class="p-4">
										<label class="main-content-label tx-13 mg-b-20">Social</label>
										<div class="d-md-flex">
											<div class="mg-md-r-20 mg-b-10">
												<div class="main-profile-social-list">
													<div class="media">
														<div class="media-icon bg-primary-transparent text-primary"> <i class="icon ion-logo-github"></i> 
														</div>
														<div class="media-body"> <span>Github</span>  <a href="#">github.com/spruko</a> 
														</div>
													</div>
												</div>
											</div>
											<div class="mg-md-r-20 mg-b-10">
												<div class="main-profile-social-list">
													<div class="media">
														<div class="media-icon bg-success-transparent text-success"> <i class="icon ion-logo-twitter"></i> 
														</div>
														<div class="media-body"> <span>Twitter</span>  <a href="#">twitter.com/spruko.me</a> 
														</div>
													</div>
												</div>
											</div>
											<div class="mg-md-r-20 mg-b-10">
												<div class="main-profile-social-list">
													<div class="media">
														<div class="media-icon bg-info-transparent text-info"> <i class="icon ion-logo-linkedin"></i> 
														</div>
														<div class="media-body"> <span>Linkedin</span>  <a href="#">linkedin.com/in/spruko</a> 
														</div>
													</div>
												</div>
											</div>
											<div class="mg-md-r-20 mg-b-10">
												<div class="main-profile-social-list">
													<div class="media">
														<div class="media-icon bg-danger-transparent text-danger"> <i class="icon ion-md-link"></i> 
														</div>
														<div class="media-body"> <span>My Portfolio</span>  <a href="#">spruko.com/</a> 
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="main-content-body tab-pane p-4 border-top-0" id="edit">
								<div class="card-body border">
									<div class="mb-4 main-content-label">Personal Information</div>
									<form class="form-horizontal" id="infoForm" method="post" action="{{ route('profiles.updateInfo') }}">@csrf
										<div id="add-messages"></div>
										<div class="mb-4 main-content-label">Name</div>
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
													<input type="date" class="form-control" placeholder="Birthdate" value="{{ Auth::user()->date }}" required name="date">
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
										<div class="mb-4 main-content-label">About Yourself</div>
										<div class="form-group ">
											<div class="row row-sm">
												<div class="col-md-3">
													<label class="form-label">Biographical Info</label>
												</div>
												<div class="col-md-9">
													<textarea class="form-control" name="example-textarea-input" rows="4" placeholder="">pleasure rationally encounter but because pursue consequences that are extremely painful.occur in which toil and pain can procure him some great pleasure..</textarea>
												</div>
											</div>
										</div>
										<div class="mb-4 main-content-label">Email Preferences</div>
										<div class="form-group mb-0">
											<div class="row row-sm">
												<div class="col-md-3">
													<label class="form-label">Verified User</label>
												</div>
												<div class="col-md-9">
													<div class="custom-controls-stacked">
														<label class="ckbox mg-b-10-f">
															<input checked="" type="checkbox"><span> Accept to receive post or page notification emails</span>
														</label>
														<label class="ckbox">
															<input checked="" type="checkbox"><span> Accept to receive email sent to multiple recipients</span>
														</label>
													</div>
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
</script>@endsection