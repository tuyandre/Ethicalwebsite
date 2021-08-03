@extends('shared.master') 
@section('title','ChangePassword') 
@section('css')
<link href="{{asset('/dashboard/assets/extra-libs/datatables.net-bs4/css/dataTables.bootstrap4.css')}}" rel="stylesheet">
<link r type="text/css" href="{{asset('/dashboard/assets/extra-libs/datatables.net-bs4/css/responsive.dataTables.min.css')}}" rel="stylesheet">@endsection @section('items','Profile Change Password') @section('content')
<!-- Main Content-->
<div class="main-content side-content pt-0">
	<div class="container-fluid">
		<div class="inner-body">
			<!-- Page Header -->
			<div class="page-header">
				<div>
					<h2 class="main-content-title tx-24 mg-b-5">Update Password</h2>
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="#">Profile</a>
						</li>
						<li class="breadcrumb-item active" aria-current="page">Change Password</li>
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
				<div class="col-xl-8 col-lg-12 col-md-12">
					<div class="card custom-card">
						<div class="card-body">
							<div>
								<h6 class="main-content-label mb-1">Change Password</h6>
							</div>
							<form class="form-horizontal" method="POST" action="{{ route('profiles.updatePassword') }}" id="passwordForm">
                            @csrf
								<div class="box-body">
									<div id="add-messages"></div>
									<div class="form-group row">
										<label for="oldp" class="col-sm-4 control-label">Old Password</label>
										<div class="col-sm-8">
											<input type="password" class="form-control @error('old_password') is-invalid @enderror" id="oldp" placeholder="Old Password" name="old_password" required>@error('old_password') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
											@enderror</div>
									</div>
									<div class="form-group row">
										<label for="newp" class="col-sm-4 control-label">New Password</label>
										<div class="col-sm-8">
											<input type="password" class="form-control @error('password') is-invalid @enderror" id="newp" placeholder="New Password" name="password" required>@error('password') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
											@enderror</div>
									</div>
									<div class="form-group row">
										<label for="confirm" class="col-sm-4 control-label">Confirm Password</label>
										<div class="col-sm-8">
											<input type="password" class="form-control @error('confirm_password') is-invalid @enderror" id="confirm" placeholder="confirm Password" name="confirm_password" required>@error('confirm_password') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
											@enderror</div>
									</div>
								</div>
								<!-- /.box-body -->
								<div class="box-footer">
									<button type="submit" class="btn btn-warning">Cancel</button>
									<input type="submit" class="btn btn-primary mr-1" id="btnSave" style="float: right"></input>
								</div>
								<!-- /.box-footer -->
							</form>
						</div>
					</div>
				</div>
			</div>
			<!-- End Row -->
			<!-- Row -->
			<!-- End Row-->
		</div>
	</div>
</div>
<!-- End Main Content-->@endsection @section('js')
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
<script src="{{asset('assets/js/form-validation.js')}}"></script>@endsection