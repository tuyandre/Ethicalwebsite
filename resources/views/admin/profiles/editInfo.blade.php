@extends('shared.master')

@section('title','Full Profile')
@section('css')
    <link href="{{asset('/dashboard/assets/extra-libs/datatables.net-bs4/css/dataTables.bootstrap4.css')}}" rel="stylesheet">
    <link r type="text/css"
          href="{{asset('/dashboard/assets/extra-libs/datatables.net-bs4/css/responsive.dataTables.min.css')}}" rel="stylesheet">
@endsection
@section('items','Profile ')
@section('content')
<div class="row">
    <div class="col-lg-8 col-xlg-9 col-md-7">
        <div class="card">
            <!-- Tabs -->
            <ul class="nav nav-pills custom-pills" id="pills-tab" role="tablist">

                <li class="nav-item">
                    <a class="nav-link active" id="pills-setting-tab" data-toggle="pill" href="#previous-month" role="tab" aria-controls="pills-setting" aria-selected="false">Setting</a>
                </li>
            </ul>
            <!-- Tabs -->
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="previous-month" role="tabpanel" aria-labelledby="pills-setting-tab">
                    <div class="card-body">
                        <form class="form-horizontal form-material" id="infoForm" method="post" action="{{ route('profiles.updateInfo') }}">
                            @csrf
                            <div id="add-messages"></div>
                            <div class="row">
                                <div class="form-group col-6">
                                    <label class="col-md-12">First Name</label>
                                    <div class="col-md-12">
                                        <input type="text" placeholder="First Name" name="first_name" value="{{ Auth::user()->first_name }}" class="form-control form-control-line" required>
                                    </div>
                                </div>
                                <div class="form-group col-6">
                                    <label class="col-md-12">Last Name</label>
                                    <div class="col-md-12">
                                        <input type="text" placeholder="Last Name" value="{{ Auth::user()->last_name }}" name="last_name" required class="form-control form-control-line">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-6">
                                    <label for="example-email" class="col-md-12">Email</label>
                                    <div class="col-md-12">
                                        <input type="email" placeholder="Email" class="form-control form-control-line" value="{{ Auth::user()->email }}" name="email" id="example-email" required>
                                    </div>
                                </div>
                                <div class="form-group col-6">
                                    <label class="col-md-12">Phone No</label>
                                    <div class="col-md-12">
                                        <input type="tel" placeholder="078 456 7890" class="form-control form-control-line" value="{{ Auth::user()->telephone }}" required name="telephone">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-6">
                                    <label for="username" class="col-md-12">UserName</label>
                                    <div class="col-md-12">
                                        <input type="text" placeholder="username" class="form-control form-control-line" value="{{ Auth::user()->username }}" name="username" id="username" required>
                                    </div>
                                </div>
                                <div class="form-group col-6">
                                    <label class="col-md-12">Phone No</label>
                                    <div class="col-md-12">
                                        <input type="date" placeholder="date of birth" class="form-control form-control-line" value="{{ Auth::user()->date }}" required name="date">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-6">
                                    <label for="address" class="col-md-12">Address</label>
                                    <div class="col-md-12">
                                        <input type="text" placeholder="Address" class="form-control form-control-line" value="{{ Auth::user()->address }}" name="address" id="address" required>
                                    </div>
                                </div>
                                <div class="form-group col-6">
                                    <label class="col-md-12">City</label>
                                    <div class="col-md-12">
                                        <input type="text" placeholder="City" class="form-control form-control-line" value="{{ Auth::user()->city }}" required name="city">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-6">
                                    <label for="state" class="col-md-12">State</label>
                                    <div class="col-md-12">
                                        <input type="text" placeholder="State" class="form-control form-control-line" value="{{ Auth::user()->state }}" name="state" id="state" required>
                                    </div>
                                </div>
                                <div class="form-group col-6">
                                    <label class="col-md-12">Select Country</label>
                                    <div class="col-md-12">
                                        <select class="form-control form-control-line" required name="country" >
                                            <option value="{{ Auth::user()->country }}">{{ Auth::user()->country }}</option>
                                            <option value="India">India</option>
                                            <option value="Usa">Usa</option>
                                            <option value="Canada">Canada</option>
                                            <option value="Thailand">Thailand</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-12">
                                    <input type="submit" class="btn btn-success" id="btnSave" style="float: right" value="Update Profile"/>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

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

@endsection
