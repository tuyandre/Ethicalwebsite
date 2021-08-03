@extends('shared.master')

@section('title','Application Detail')
@section('css')
    <link href="{{asset('/dashboard/assets/extra-libs/datatables.net-bs4/css/dataTables.bootstrap4.css')}}" rel="stylesheet">
    <link r type="text/css"
          href="{{asset('/dashboard/assets/extra-libs/datatables.net-bs4/css/responsive.dataTables.min.css')}}" rel="stylesheet">
@endsection
@section('items','Application Detail ')
@section('content')



    <div class="row">

        <!-- Column -->
        <div class="col-lg-8 col-xlg-8 col-md-8 ">
            <div class="card">
                <!-- Tabs -->
                <ul class="nav nav-pills custom-pills" id="pills-tab" role="tablist">

                    <li class="nav-item">
                        <a class="nav-link active" id="pills-setting-tab" data-toggle="pill" href="#previous-month" role="tab" aria-controls="pills-setting" aria-selected="false">Application Detail</a>
                    </li>
                </ul>
                <!-- Tabs -->
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="previous-month" role="tabpanel" aria-labelledby="pills-setting-tab">
                        <div class="card-body">

                                <div class="row">
                                    <div class="form-group col-6">
                                        <small class="text-muted">Applicant Name </small>
                                        <div class="col-md-12">
                                            <span>{{$applicant->name}}</span>
                                        </div>
                                    </div>
                                    <div class="form-group col-6">
                                        <small class="text-muted">Applicant Email </small>
                                        <div class="col-md-12">
                                            <span>{{$applicant->email}}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-12">
                                        <small class="text-muted">Applicant Motivation </small>
                                        <div class="col-md-12">
                                            <span>{{$applicant->contents}}</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-12">
                                   </div>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Column -->
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
