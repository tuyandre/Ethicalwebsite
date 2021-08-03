@extends('shared.master')

@section('title','MemberDetail')
@section('css')
    <link href="{{asset('/dashboard/assets/extra-libs/datatables.net-bs4/css/dataTables.bootstrap4.css')}}" rel="stylesheet">
    <link href="{{asset('/dashboard/css/dataTables.checkboxes.css')}}" rel="stylesheet">
    <link href="{{asset('/dashboard/css/datatables.min.css')}}" rel="stylesheet">
    <link r type="text/css"
          href="{{asset('/dashboard/assets/extra-libs/datatables.net-bs4/css/responsive.dataTables.min.css')}}" rel="stylesheet">
@endsection
@section('items','Member Detail ')
@section('content')
    <div class="row">
        <div class="col-md-12 col-lg-12 col-sm-12">
            <div class="card material-card">
                <h5 class="card-title text-uppercase p-3 bg-info text-white mb-0">
                    Member Detail
                </h5>

                <div class="p-3">
                    <?php
                    $photo=$member->photo;

                    ?>
                        <div class="row">
                            <!-- Column -->
                            <div class="col-lg-4 col-xlg-3 col-md-5">
                                <div class="card">
                                    <div class="card-body">
                                        <center class="mt-4">

                                            @if(empty($photo))
                                                <img src="{{ asset('dashboard/assets/images/users/1.jpg')}}" class="rounded-circle" width="150" />
                                            @else
                                                <img src="{{ asset('uploads/profiles/'.$photo)}}" class="rounded-circle" width="150" />

                                            @endif
                                            <h4 class="card-title mt-2">{{ $member->username }}</h4>
                                            <h6 class="card-subtitle">{{ $member->first_name }} {{ $member->last_name }}</h6>

                                        </center>
                                    </div>
                                    <div>
                                        <hr> </div>
                                    <div class="card-body"> <small class="text-muted">Email address </small>
                                        <h6><a href="{{ $member->email }}" class="__cf_email__" data-cfemail="1f777e71717e7870697a6d5f78727e7673317c7072">{{ $member->email }}</a></h6>
                                        <small class="text-muted pt-4 db">Phone</small>
                                        <h6>{{ $member->telephone }}</h6>
                                        <small class="text-muted pt-4 db">Address</small>
                                        <h6>{{ $member->address }}-{{ $member->city }} -{{ $member->state }}- {{ $member->country }}</h6>

                                        {{--<small class="text-muted pt-4 db">Social Profile</small>--}}
                                        {{--<br/>--}}
                                        {{--<button class="btn btn-circle btn-secondary"><i class="fab fa-facebook-f"></i></button>--}}
                                        {{--<button class="btn btn-circle btn-secondary"><i class="fab fa-twitter"></i></button>--}}
                                        {{--<button class="btn btn-circle btn-secondary"><i class="fab fa-youtube"></i></button>--}}
                                    </div>
                                </div>
                            </div>
                            <!-- Column -->
                            <!-- Column -->
                            <div class="col-lg-8 col-xlg-9 col-md-7">
                                <div class="card">
                                    <!-- Tabs -->
                                    <ul class="nav nav-pills custom-pills" id="pills-tab" role="tablist">

                                        <li class="nav-item">
                                            <a class="nav-link active" id="pills-setting-tab" data-toggle="pill" href="#previous-month" role="tab" aria-controls="pills-setting" aria-selected="false">Member Information</a>
                                        </li>
                                    </ul>
                                    <!-- Tabs -->
                                    <div class="tab-content" id="pills-tabContent">
                                        <div class="tab-pane fade show active" id="previous-month" role="tabpanel" aria-labelledby="pills-setting-tab">


                                            <div class="row">
                                            <div class="col-md-12 col-xs-12">
                                                <div class="white-box">
                                                    <ul class="nav nav-tabs tabs customtab">

                                                        <li class="tab">
                                                            <a href="#profile" data-toggle="tab"> <span class="visible-xs"><i class="fa fa-user"></i></span> <span class="hidden-xs">Member Information</span> </a>
                                                        </li>
                                                    </ul>
                                                    <div class="tab-content">
                                                        <div class="tab-pane active" id="profile">
                                                            <div class="row">
                                                                <div class="col-md-3 col-xs-6 b-r"> <strong>Full Name</strong>
                                                                    <br>
                                                                    <p class="text-muted">{{ $member->first_name }} {{ $member->last_name }}</p>
                                                                </div>
                                                                <div class="col-md-2 col-xs-6 b-r"> <strong>Mobile</strong>
                                                                    <br>
                                                                    <p class="text-muted">{{ $member->telephone }}</p>
                                                                </div>
                                                                <div class="col-md-3 col-xs-6 b-r"> <strong>Email</strong>
                                                                    <br>
                                                                    <p class="text-muted">{{ $member->email }}</p>
                                                                </div>

                                                                <div class="col-md-2 col-xs-6 b-r"> <strong>Date of Birth</strong>
                                                                    <br>
                                                                    <p class="text-muted">{{ $member->date }}</p>
                                                                </div>
                                                                <div class="col-md-2 col-xs-6 b-r"> <strong>Gender</strong>
                                                                    <br>
                                                                    <p class="text-muted">{{ $member->gender }}</p>
                                                                </div>
                                                                <div class="col-md-2 col-xs-6 b-r"> <strong>Status</strong>
                                                                    <br>
                                                                    @if($member->confirmed===1)
                                                                    <p class="text-muted bg-success">Activated</p>
                                                                        @else
                                                                        <p class="text-muted bg-warning">Not Activated</p>
                                                                    @endif
                                                                </div>
                                                                <div class="col-md-3 col-xs-6"> <strong>Location</strong>
                                                                    <br>
                                                                    <p class="text-muted">{{ $member->address }}-{{ $member->city }} -{{ $member->state }}- {{ $member->country }}</p>
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
                            <!-- Column -->
                        </div>

                </div>
            </div>
        </div>
    </div>

@endsection
@section('scripts')

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
    <script src="{{asset('/dashboard/assets/extra-libs/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('/dashboard/assets/extra-libs/datatables.net-bs4/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('/dashboard/dist/js/pages/datatable/datatable-basic.init.js')}}"></script>
    <script src="{{asset('/dashboard/js/dataTables.checkboxes.min.js')}}"></script>
    <script src="{{asset('/dashboard/js/dataTables.checkboxes.js')}}"></script>
    <script src="{{asset('/dashboard/js/dataTables.min.js')}}"></script>
@endsection
