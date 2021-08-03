@extends('shared.master')

@section('css')
<link href="{{asset('/dashboard/plugins/datatable/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{asset('/dashboard/plugins/datatable/responsivebootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{asset('/dashboard/plugins/datatable/fileexport/buttons.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet"/>

@endsection	

 @section('title','MemberList') @section('items','Member List ') @section('content')
<div class="main-content side-content pt-0">
	<div class="container-fluid">
		<div class="inner-body">
			<!-- Page Header -->
			<div class="page-header">
				<div>
					<h2 class="main-content-title tx-24 mg-b-5">Admin</h2>
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="#">Member List</a>
						</li>
						<li class="breadcrumb-item active" aria-current="page">Assign Survey</li>
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
			<!-- End Row -->
			<!-- Row -->
			<div class="row row-sm">
				<div class="col-lg-12 col-md-12">
					<div class="card custom-card main-content-body-profile">
						<div class="tab-content">
							<div class="main-content-body tab-pane p-4 border-top-0 active">
								<div class="card-body border" data-select2-id="12">{{ csrf_field() }}
									<form id="send-form" action="{{route('survey.sendSurveySMS')}}" method="POST">{{ csrf_field() }}
                                    <div id="add-messages"></div>
										<table data-parsley-validate id="surveyMemberTable" class="table table-striped table-bordered display" cellspacing="0" width="100%">
											<thead>
												<tr>
													<th></th>
													<th>First Name</th>
													<th>Last Name</th>
													<th>Email</th>
													<th>Telephone</th>
													<th>Gender</th>
													<th>Age</th>
												</tr>
											</thead>
										</table>
                                        <hr>
										<div class="form-group " data-select2-id="10">
											<div class="row" data-select2-id="9">
												<div class="col-md-3">
													<label class="form-label">Survey to Assign</label>
												</div>
												<div class="col-md-9" data-select2-id="8">
													<select required name="survey" id="add-survey" class="form-control">
														<option value="">Select Survey</option>
														<?php $surveys=\App\Models\Survey::where( 'status',true)->get(); ?>
                                                         @foreach($surveys as $survey)
														<option value="{{ $survey->id }}">{{ $survey->name }}</option>
                                                        @endforeach
                                                        </select> 
                                                        <span class="text-danger" id="esurvey" style="color: red"></span>
												</div>
											</div>
										</div>
										{{--<div class="form-group ">
											<div class="row row-sm">
												<div class="col-md-3 col">
													<label class="form-label">Notification Method</label>
												</div>
												<div class="col-md-9 col">
													<label class="ckbox mg-b-10-f">
														<input type="checkbox" value="email"><span>Email</span>
													</label>
													<label class="ckbox mg-b-10-f">
														<input value="sms" type="checkbox"><span>SMS</span>
												</label>
													
												</div>
											</div>
										</div>--}}
										<div class="form-group ">
											<div class="row row-sm">
												<div class="col-md-3"></div>
												<div class="col-md-9">
                                                <div id="add-messages"></div>
													<div class="mt-3">
                                                    <input style="float: right" type="submit" class="btn btn-primary mr-1" id="btnSave" data-loading-text="Loading..." value="Assign Survey"/>
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
        var defaultUrl = "{{ route('survey.getMemberSurvey') }}";
        var table;
        var manageTable = $("#surveyMemberTable");
        function myFunc() {
            table = manageTable.DataTable({
                    ajax: {
                        url: defaultUrl,
                        dataSrc: 'members'
                    },
                    columns: [
                        {data: 'id'},
                        {data: 'first_name'},
                        {data: 'last_name'},
                        {data: 'email'},
                        {data: 'telephone'},
                        {data: 'gender'},
                        {data: 'date',
                            render: function (data, type, row) {
                                var today=new Date();
                                var dt2=new Date(row.date)
                                var diffYear =(today.getTime() - dt2.getTime()) / 1000;
                                diffYear /= (60 * 60 * 24);
                                var age=Math.abs(Math.round(diffYear/365.25));

                                return age;

                            }
                        }],

                    columnDefs: [
                        {
                            orderable: false,
                            className: 'select-checkbox',
                            targets:   0,
                            width: '1%',
                            render: function (data, type, full, meta){
                                return '<input type="checkbox" name="user_id">';
                            }
                        }, {
                            "targets": [1],
                            "visible": false,
                            "searchable": false
                        }
                    ],
                    select: {
                        style: 'multi',
                        selector: 'td:first-child'
                    },
                    order: [[1, 'asc']]
                }
            );
        }
        $(document).ready(function() {
            myFunc();

            // Handle form submission event
            $('#send-form').on('submit', function(e){
                e.preventDefault();
                var form =  $(this);

//                var rows_selected = table.column(0).checkboxes.selected();
                var rows_selected = table.rows('.selected').data();
                // Iterate over all selected checkboxes
//                var myUsers=[];
//                let formData = new FormData(this);
                $.each(rows_selected, function(index, rowId){
                    console.log(rowId.id);
                    $(form).append(
                        $('<input>')
                            .attr('type', 'hidden')
                            .attr('name', 'users[]')
                            .val(rowId.id)
                    );
                });
//                console.log(myUsers);


//                formData.append("user", myUsers);
                var btn = $('#btnSave');
                btn.button('loading');
                $.ajax({
                    url: form.attr('action'),
                    method: form.attr('method'),
                    data: form.serialize()
                }).done(function (data) {
                    console.log(data);
                    table.destroy();
                    myFunc();

                    if (data.survey == "ok") {
                        btn.button('reset');
                        form[0].reset();
                        $('#add-messages').html('<div class="alert alert-success flat">' +
                            '<button type="button" class="close" data-dismiss="alert">&times;</button>' +
                            '<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> Survey Assigned  successfully . </div>');

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
    		<script src="{{asset('/dashboard/plugins/datatable/jquery.dataTables.min.js')}}"></script>
		<script src="{{asset('/dashboard/plugins/datatable/dataTables.bootstrap4.min.js')}}"></script>
		<script src="{{asset('/dashboard/plugins/datatable/dataTables.responsive.min.js')}}"></script>
		<script src="{{asset('/dashboard/plugins/datatable/fileexport/dataTables.buttons.min.js')}}"></script>
		<script src="{{asset('/dashboard/plugins/datatable/fileexport/buttons.bootstrap4.min.js')}}"></script>
		<script src="{{asset('/dashboard/plugins/datatable/fileexport/jszip.min.js')}}"></script>
		<script src="{{asset('/dashboard/plugins/datatable/fileexport/pdfmake.min.js')}}"></script>
		<script src="{{asset('/dashboard/plugins/datatable/fileexport/vfs_fonts.js')}}"></script>
		<script src="{{asset('/dashboard/plugins/datatable/fileexport/buttons.html5.min.js')}}"></script>
		<script src="{{asset('/dashboard/plugins/datatable/fileexport/buttons.print.min.js')}}"></script>
		<script src="{{asset('/dashboard/plugins/datatable/fileexport/buttons.colVis.min.js')}}"></script>
		<script src="{{asset('/dashboard/js/table-data.js')}}"></script>
        <script src="{{asset('/dashboard/js/dataTables.checkboxes.min.js')}}"></script>
    <script src="{{asset('/dashboard/js/dataTables.checkboxes.min.js')}}"></script>
        @endsection