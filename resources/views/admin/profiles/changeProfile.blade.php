@extends('shared.master')

@section('title','Full Profile')
@section('css')
    <!-- InternalFileupload css-->
		<link href="{{asset('/dashboard/plugins/fileuploads/css/fileupload.css')}}" rel="stylesheet" type="text/css"/>

		<!-- InternalFancy uploader css-->
		<link href="{{asset('/dashboard/plugins/fancyuploder/fancy_fileupload.css')}}" rel="stylesheet" />

		<!-- InternalSumoselect css-->
		<link rel="stylesheet" href="{{asset('/dashboard/plugins/sumoselect/sumoselect.css')}}">

		<!-- Internal TelephoneInput css-->
		<link rel="stylesheet" href="{{asset('/dashboard/plugins/telephoneinput/telephoneinput.css')}}">
@endsection
@section('items','Profile ')
@section('content')
			<!-- Main Content-->
						<!-- Page Header -->
						<div class="page-header">
							<div>
								<h2 class="main-content-title tx-24 mg-b-5">User Profile</h2>
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="#">Profile</a></li>
									<li class="breadcrumb-item active" aria-current="page">Profile Photo</li>
								</ol>
							</div>
							<div class="d-flex">
								<div class="justify-content-center">
									<button type="button" class="btn btn-white btn-icon-text my-2 mr-2">
									  <i class="fe fe-download mr-2"></i> Import
									</button>
									<button type="button" class="btn btn-white btn-icon-text my-2 mr-2">
									  <i class="fe fe-filter mr-2"></i> Filter
									</button>
									<button type="button" class="btn btn-primary my-2 btn-icon-text">
									  <i class="fe fe-download-cloud mr-2"></i> Download Report
									</button>
								</div>
							</div>
						</div>
					</div>
						<div class="row row-sm">
							<div class="col-lg-9 col-md-9">
								<div class="card custom-card">
									<div class="card-body">
									
										<div>
											<h6 class="main-content-label mb-1">Upload Photo</h6>
											
										</div>
										<form class="form-horizontal" method="POST" action="{{ route('profiles.updateProfile') }}" id="profileForm" enctype="multipart/form-data">
										@csrf
										<div id="add-messages"></div>
										<div class="row mb-4">
											<div class="col-sm-12 col-md-4">
												<input type="file" id="input-file-now" class="dropify" data-height="200" name="profile" accept="image/*" />
											</div>
											
											
										</div>
										<div class="white-box">
                                        <input type="submit" style="float: right;bottom: 10px" id="btnSave" class="btn btn-primary" value="Upload Profile" />
                                    </div>
									</form>
									</div>
								</div>
							</div>
						</div>				
			</div>
			<!-- End Main Content-->
@endsection
@section('scripts')
    
    <script>
        $(document).ready(function() {
            // Basic
            $('.dropify').dropify();
            // Translated
            $('.dropify-fr').dropify({
                messages: {
                    default: 'Glissez-déposez un fichier ici ou cliquez',
                    replace: 'Glissez-déposez un fichier ou cliquez pour remplacer',
                    remove: 'Supprimer',
                    error: 'Désolé, le fichier trop volumineux'
                }
            });
            // Used events
            var drEvent = $('#input-file-events').dropify();
            drEvent.on('dropify.beforeClear', function(event, element) {
                return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
            });
            drEvent.on('dropify.afterClear', function(event, element) {
                alert('File deleted');
            });
            drEvent.on('dropify.errors', function(event, element) {
                console.log('Has Errors');
            });
            var drDestroy = $('#input-file-to-destroy').dropify();
            drDestroy = drDestroy.data('dropify')
            $('#toggleDropify').on('click', function(e) {
                e.preventDefault();
                if (drDestroy.isDropified()) {
                    drDestroy.destroy();
                } else {
                    drDestroy.init();
                }
            })



            $('#profileForm').submit(function (e) {
                e.preventDefault();
                var form = $(this);
                var btn = $('#btnSave');
                btn.button('loading');
                $.ajax({
                    url: form.attr('action'),
                    method: form.attr('method'),
                    data: new FormData(this),
                    dataType: "JSON",
                    contentType: false,
                    cashe: false,
                    processData: false,
                }).done(function (data) {
                    console.log(data);

                    if (data.profile == "ok") {
                        btn.button('reset');
                        form[0].reset();
                        // reload the table

                        $('#add-messages').html('<div class="alert alert-success flat">' +
                            '<button type="button" class="close" data-dismiss="alert">&times;</button>' +
                            '<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> Profile successfully Uploaded. </div>');

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
	<!-- Internal Fileuploads js-->
		<script src="{{asset('/dashboard//plugins/fileuploads/js/fileupload.js')}}"></script>
        <script src="{{asset('/dashboard/plugins/fileuploads/js/file-upload.js')}}"></script>

		<!-- InternalFancy uploader js-->
		<script src="{{asset('/dashboard/plugins/fancyuploder/jquery.ui.widget.js')}}"></script>
        <script src="{{asset('/dashboard/plugins/fancyuploder/jquery.fileupload.js')}}"></script>
        <script src="{{asset('/dashboard/plugins/fancyuploder/jquery.iframe-transport.js')}}"></script>
        <script src="{{asset('/dashboard/plugins/fancyuploder/jquery.fancy-fileupload.js')}}"></script>
        <script src="{{asset('/dashboard/plugins/fancyuploder/fancy-uploader.js')}}"></script>
@endsection
