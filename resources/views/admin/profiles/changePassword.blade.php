@extends('shared.master')

@section('title','ChangePassword')
@section('items','Profile Change Password')
@section('content')

<div class="page main-signin-wrapper">
			<!-- Row -->
			<div class="row signpages text-center">
				<div class="col-md-12">
					<div class="card">
						<div class="row row-sm">
							<div class="col-lg-6 col-xl-5 d-none d-lg-block text-center bg-primary details">
								<div class="mt-4 pt-5 p-2 pos-absolute">
									<img src="assets/img/brand/logo-light.png" class="header-brand-img mb-4" alt="logo">
									<div class="clearfix"></div>
									<?php
										$photo=Auth::user()->photo;

										?>
										@if(empty($photo))
										<img class="ht-100 mb-0" alt="user" src="{{asset('/dashboard/img/svgs/user.svg')}}">
										@else
											<img class="ht-100 mb-0" alt="user" src="{{asset('/dashboard/img/svgs/user.svg')}}">
										@endif
									<h5 class="mt-4 text-white">Reset Your Password</h5>
									{{--<span class="tx-white-6 tx-13 mb-5 mt-xl-0">Signup to create, discover and connect with the global community</span>--}}
								</div>
							</div>
							<div class="col-lg-6 col-xl-7 col-xs-12 col-sm-12 login_form ">
								<div class="container-fluid">
									<div class="row row-sm">
										<div class="card-body mt-2 mb-2">
											<img src="assets/img/brand/logo.png" class=" d-lg-none header-brand-img text-left float-left mb-4" alt="logo">
											<div class="clearfix"></div>
											<h5 class="text-left mb-2">Reset Your Password</h5>
											<form method="POST" action="{{ route('profiles.updatePassword') }}" id="passwordForm">
												@csrf
												<div class="form-group text-left">
													<label for="oldp">Old Password</label>
													<input type="password" class="form-control @error('old_password') is-invalid @enderror" id="oldp" placeholder="Enter your Old Password">
													 @error('old_password')
                                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                                    @enderror
												</div>
												<div class="form-group text-left">
													<label for="newp">New Password</label>
													<input type="password" class="form-control @error('password') is-invalid @enderror" id="newp" placeholder="Enter your password">
													@error('password')
                                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                                    @enderror
												</div>
												<div class="form-group text-left">
													<label>Confirm Password</label>
													<input type="password" class="form-control @error('confirm_password') is-invalid @enderror" id="confirm" placeholder="Confirm password">
													@error('confirm_password')
                                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                                    @enderror
												</div>
												<button type="submit" class="btn ripple btn-main-primary btn-block" id="btnSave">Update Password</button>
											</form>
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
		<!-- End Page -->

@endsection
@section('js')
<script>
    $(document).ready(function () {

        $('#passwordForm').submit(function (e) {
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

                if (data.password == "ok") {
                    btn.button('reset');
                    form[0].reset();
                    // reload the table

                    $('#add-messages').html('<div class="alert alert-success flat">' +
                        '<button type="button" class="close" data-dismiss="alert">&times;</button>' +
                        '<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> Password successfully Changed. </div>');

                    $(".alert-success").delay(500).show(10, function () {
                        $(this).delay(3000).hide(10, function () {
                            $(this).remove();
                        });
                    });
                }else {
                    btn.button('reset');
                    $('#add-messages').html('<div class="alert alert-warning flat">' +
                        '<button type="button" class="close" data-dismiss="alert">&times;</button>' +
                        '<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> Invalid Previous Password. </div>');

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
                    if (i == 'name') {
                        $('#tname').html(value[0])
                    }
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

@endsection
