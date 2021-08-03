@extends('shared.master') 
@section('title','Survey') 
@section('css')
<link href="{{asset('/dashboard/plugins/datatable/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{asset('/dashboard/plugins/datatable/responsivebootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{asset('/dashboard/plugins/datatable/fileexport/buttons.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
@endsection 
@section('items','Survey ') 
@section('content')
<div class="main-content side-content pt-0">
	<div class="container-fluid">
		<div class="inner-body">
			<!-- Page Header -->
			<div class="page-header">
				<div>
					<h2 class="main-content-title tx-24 mg-b-5">List of Members</h2>
				</div>
				<div class="d-flex">
					<div class="justify-content-center">
						<button type="button" class="btn btn-white btn-icon-text my-2 mr-2"> <i class="fe fe-download mr-2"></i> Import</button>
						<button type="button" class="btn btn-white btn-icon-text my-2 mr-2"> <i class="fe fe-filter mr-2"></i> Filter</button>
						<button type="button" href="#" class="btn btn-primary add_survey my-2 btn-icon-text"> <i class="fe fe-download-cloud mr-2"></i> Add Survey</button>
					</div>
				</div>
			</div>
			<!-- End Page Header -->
			<!-- Row -->
			<div class="row row-sm">
				<div class="col-lg-12">
					<div class="card custom-card overflow-hidden">
						<div class="card-body">
							<div class="table-responsive">
								<table id="manageTable" class="display responsive nowrap" width="100%">
									<thead>
										<tr>
											<th class="wd-lg-8p"><span>Title</span>
											</th>
											<th class="wd-lg-20p"><span>Objective</span>
											</th>
											<th class="wd-lg-20p"><span>link</span>
											</th>
											<th class="wd-lg-20p"><span>Start Date</span>
											</th>
											<th class="wd-lg-20p"><span>End Date</span>
											</th>
											<th class="wd-lg-20p"><span>Status</span>
											</th>
											<th class="wd-lg-20p">Action</th>
										</tr>
									</thead>
									<tbody></tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
			<input type="hidden" value="{{ Session::token() }}" id="token">
			<!-- End Row -->{{--add modal--}}
			<div class="modal " id="addModal" tabindex="-1" role="dialog" aria-labelledby="Survey">
				<div class="modal-dialog modal-lg" role="document">
					<div class="modal-content">
						<div class="modal-header d-flex align-items-center">
							<h4 class="modal-title" id="exampleModalLabel1">Add New Survey</h4>
							<button type="button" class="close ml-auto" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
							</button>
						</div>
						<form data-parsley-validate class="form-horizontal" method="POST" action="{{ route('survey.saveSurvey')}}" id="frmSave">{{ csrf_field() }}
							<div class="modal-body">
								<div id="add-messages"></div>
								<div class="form-group row">
									<label for="recipient-name" class="control-label col-sm-3">Name</label>
									<label class="col-sm-1 control-label">:</label>
									<div class="col-sm-8">
										<input type="text" class="form-control" id="name" name="name" required autofocus> <span class="text-danger" id="tname" style="color: red"></span>
									</div>
								</div>
								<div class="form-group row">
									<label for="objective" class="control-label col-sm-3">Objective</label>
									<label class="col-sm-1 control-label">:</label>
									<div class="col-sm-8">
										<textarea type="text" rows="2" class="form-control" id="objective" name="objective" required autofocus></textarea> <span class="text-danger" id="tobj" style="color: red"></span>
									</div>
								</div>
								<div class="form-group row">
									<label for="link" class="control-label col-sm-3">Link</label>
									<label class="col-sm-1 control-label">:</label>
									<div class="col-sm-8">
										<input type="text" class="form-control" id="link" name="link" required autofocus> <span class="text-danger" id="tlink" style="color: red"></span>
									</div>
								</div>
								<div class="form-group row">
									<label for="start_date" class="control-label col-sm-3">Start Date</label>
									<label class="col-sm-1 control-label">:</label>
									<div class="col-sm-8">
										<input type="date" class="form-control" id="start_date" name="start_date" required autofocus> <span class="text-danger" id="tstart" style="color: red"></span>
									</div>
								</div>
								<div class="form-group row">
									<label for="end_date" class="control-label col-sm-3">End Date</label>
									<label class="col-sm-1 control-label">:</label>
									<div class="col-sm-8">
										<input type="date" class="form-control" id="end_date" name="end_date" required autofocus> <span class="text-danger" id="tend" style="color: red"></span>
									</div>
								</div>
							</div>
							<div id="add-messages"></div>
							<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
								<input type="submit" class="btn btn-primary" id="btnSave" data-loading-text="Loading..." value="Save Survey" />
							</div>
						</form>
					</div>
				</div>
			</div>{{--/add modal--}} {{--edit modal for subcategory--}}
			<div class="modal" id="editModal" tabindex="-1" role="dialog" aria-labelledby="Survey">
				<div class="modal-dialog modal-lg" role="document">
					<div class="modal-content">
						<div class="modal-header d-flex align-items-center">
							<h4 class="modal-title" id="exampleModalLabel1">Edit Survey</h4>
							<button type="button" class="close ml-auto" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
							</button>
						</div>
						<form class="form-horizontal" action="{{ route('survey.updateSurvey')}}" id="editForm">
                        {{ csrf_field() }}
							<div class="modal-body">
								<div id="edit-messages"></div>
								<div class="modal-loading" style="width:50px; margin:auto;padding-top:50px; padding-bottom:50px;"> <i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i>
									<span class="sr-only">Loading...</span>
								</div>
								<div class="edit-result">
									<div class="form-group row">
										<label for="edit-name" class="control-label col-sm-3">Name</label>
										<label class="col-sm-1 control-label">:</label>
										<div class="col-sm-8">
											<input type="text" class="form-control" id="edit-name" name="name" required autofocus> <span class="text-danger" id="ename" style="color: red"></span>
										</div>
									</div>
									<div class="form-group row">
										<label for="edit-objective" class="control-label col-sm-3">Objective</label>
										<label class="col-sm-1 control-label">:</label>
										<div class="col-sm-8">
											<textarea type="text" rows="2" class="form-control" id="edit-objective" name="objective" required></textarea> <span class="text-danger" id="edit-objec" style="color: red"></span>
										</div>
									</div>
									<div class="form-group row">
										<label for="edit-link" class="control-label col-sm-3">Link</label>
										<label class="col-sm-1 control-label">:</label>
										<div class="col-sm-8">
											<input type="text" class="form-control" id="edit-link" name="link" required> <span class="text-danger" id="elink" style="color: red"></span>
										</div>
									</div>
									<div class="form-group row">
										<label for="edit-start" class="control-label col-sm-3">Start Date</label>
										<label class="col-sm-1 control-label">:</label>
										<div class="col-sm-8">
											<input type="date" class="form-control" id="edit-start" name="start_date" required></input> <span class="text-danger" id="estart" style="color: red"></span>
										</div>
									</div>
									<div class="form-group row">
										<label for="edit-end" class="control-label col-sm-3">End Date</label>
										<label class="col-sm-1 control-label">:</label>
										<div class="col-sm-8">
											<input type="date" class="form-control" id="edit-end" name="end_date" required> <span class="text-danger" id="eend" style="color: red"></span>
										</div>
									</div>
								</div>
								<div class="modal-footer editFooter">
									<input type="hidden" name="id" id="id" />
									<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
									<button type="submit" class="btn btn-success" id="editBtn" data-loading-text="Loading..."> <i class="glyphicon glyphicon-ok-sign"></i>
										Save Changes</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<input type="hidden" value="{{ Session::token() }}" id="token"
>@endsection @section('js')
<script>
	var defaultUrl = "{{ route('survey.getSurvey') }}";
	    var table;
	    var manageTable = $("#manageTable");
	    function myFunc() {
	        table = manageTable.DataTable({
	            ajax: {
	                url: defaultUrl,
	                dataSrc: 'surveys'
	            },
	            columns: [
	
	                {data: 'name'},
	                {data: 'objective'},
	                {data: 'link',
	                    render: function (data, type, row) {
	                        if(row.status==1){
	                            return "<a href='"+row.link+"' target='_blank'> "+row.link+"</a>";
	                        }else {
	                            return "<a href='"+row.link+"' target='_blank' style='pointer-events: none;cursor: default;'> "+row.link+"</a>";
	                        }
	
	                    }
	                },
	                {data: 'start_date'},
	                {data: 'end_date'},
	                {data: 'status',
	                    render: function (data, type, row) {
	                        if(row.status==1){
	                            return "<span class='bg-success'> Active</span>";
	                        }else {
	                            return "<span class='bg-warning'>Closed</span>";
	                        }
	
	                    }},
	                {
	                    data: 'id',
	                    render: function (data, type, row) {
	                        if(row.status==1){
	                            return"<button class='btn btn-warning btn-sm btn-flat js-close' data-id='" + data +
	                                "' data-url='/Administration/survey/close/" + row.id + "'> <i class='fas fa-low-vision'></i>Close</button>" +
	                                "<button class='btn btn-primary btn-sm btn-flat js-edit' data-id='" + data +
	                                "' data-url='/Administration/survey/show/" + row.id + "'> <i class='fa fa-edit'></i>Edit</button>"+
	                                "<a  href='/Administration/survey/detail/" + row.id + "' class='btn btn-info btn-sm btn-flat js-detail' data-id='" + data +
	                                "' > <i class='fa fa-eye'></i>View</a>" +
	                                "<button class='btn btn-danger btn-sm btn-flat js-delete ' data-id='" + data +
	                                "' data-url='/Administration/survey/delete/" + row.id + "'> <i class='fa fa-trash'></i>Delete</button>";
	                        }else {
	                            return "<button class='btn btn-success btn-sm btn-flat js-activate' data-id='" + data +
	                                "' data-url='/Administration/survey/activate/" + row.id + "'> <i class='fa fa-check'></i>Activate</button>" +
	                                "<button class='btn btn-primary btn-sm btn-flat js-edit' data-id='" + data +
	                                "' data-url='/Administration/survey/show/" + row.id + "'> <i class='fa fa-edit'></i>Edit</button>"+
	                                "<a  href='/Administration/survey/detail/" + row.id + "' class='btn btn-info btn-sm btn-flat js-detail' data-id='" + data +
	                                "' > <i class='fa fa-eye'></i>View</a>" +
	                                "<button class='btn btn-danger btn-sm btn-flat js-delete ' data-id='" + data +
	                                "' data-url='/Administration/survey/delete/" + row.id + "'> <i class='fa fa-trash'></i>Delete</button>";
	                        }
	
	                    }
	                }
	            ]
	        });
	    }
	
	
	    $(document).ready(function () {
	        $(".add_survey").click(function () {
	            $("#addModal").modal({
	                backdrop: 'static',
	                keyboard: false
	            });
	        });
	
	//initialize data table
	        myFunc();
	
	        $('#frmSave').submit(function (e) {
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
	
	                if (data.survey == "ok") {
	                    btn.button('reset');
	                    form[0].reset();
	                    // reload the table
	                    table.destroy();
	                    myFunc();
	                    $('#add-messages').html('<div class="alert alert-success flat">' +
	                        '<button type="button" class="close" data-dismiss="alert">&times;</button>' +
	                        '<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> Survey  successfully saved. </div>');
	
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
	        //Edit and update
	        manageTable.on('click', '.js-edit', function () {
	            $('#editModal').modal('show');
	            var footer = $('.editFooter');
	            $('.modal-loading').show();
	            $('.edit-result').hide();
	            footer.hide();
	            var url = $(this).attr('data-url');
	            var id = $(this).attr('data-id');
	            console.log(url);
	            $.ajax({
	                url: url,
	                type: 'GET',
	                data: {id: id},
	                dataType: 'json',
	                success: function (response) {
	                    console.log(response);
	                    // modal loading
	                    $('.modal-loading').hide();
	                    // modal result
	                    $('.edit-result').show();
	                    // modal footer
	                    footer.show();
	                    // setting values returned
	                    $("#edit-name").val(response.survey.name);
	                    $("#edit-link").val(response.survey.link);
	                    $("#edit-objective").val(response.survey.objective);
	                    $("#edit-start").val(response.survey.start_date);
	                    $("#edit-end").val(response.survey.end_date);
	
	                    // add hidden id
	                    $('#id').val(response.survey.id);
	                    // update - form
	                    $('#editForm').unbind('submit').bind('submit', function (e) {
	                        e.preventDefault();
	                        var form = $(this);
	                        form.parsley().validate();
	                        if (!form.parsley().isValid()) {
	                            return false;
	                        }
	                        // edit btn
	                        $('#editBtn').button('loading');
	
	                        $.ajax({
	                            url: form.attr('action'),
	                            type: 'PUT',
	                            data: form.serialize()
	                        }).done(function (response) {
	                            // submit btn
	                            $('#editBtn').button('reset');
	//                                form[0].reset();
	                            // reload the table
	                            table.destroy();
	                            myFunc();
	                            // remove the error text
	                            $(".text-danger").remove();
	                            // remove the form error
	                            $('#edit-messages').html('<div class="alert alert-success">' +
	                                '<button type="button" class="close" data-dismiss="alert">&times;</button>' +
	                                '<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> Survey  successfully updated. </div>');
	
	                            $(".alert-success").delay(500).show(10, function () {
	                                $(this).delay(3000).hide(10, function () {
	                                    $(this).remove();
	                                });
	                            }); // /.alert
	                        }).fail(function (response) {
	                            console.log(response);
	                            $('#editBtn').button('reset');
	                            var errors = "";
	                            errors+="<b>"+response.responseJSON.message+"</b>";
	                            var data=response.responseJSON.errors;
	
	                            $.each(data,function (i, value) {
	                                console.log(value);
	                                if (i=='name'){
	                                    $('#ename').html(value[0])
	                                }
	                                $.each(value,function (j, values) {
	                                    errors += '<p>' + values + '</p>';
	                                });
	                            });
	                            $('#edit-messages').html('<div class="alert alert-danger flat">' +
	                                '<button type="button" class="close" data-dismiss="alert">&times;</button>' +
	                                '<strong><i class="glyphicon glyphicon-glyphicon-remove"></i></strong><b>oops:</b>'+errors+'</div>');
	
	                            $(".alert-success").delay(500).show(10, function () {
	                                $(this).delay(3000).hide(10, function () {
	                                    $(this).remove();
	                                });
	                            });
	                        });	 // /ajax
	
	                        return false;
	                    }); // /update - form
	
	                } // /success
	            }); // ajax function
	        });
	
	        //close Survey
	        manageTable.on('click', '.js-close', function () {
	            var button = $(this);
	            bootbox.confirm("Are you sure you want to close this survey?", function (result) {
	                if (result) {
	                    $.ajax({
	                        url: button.attr('data-url'),
	                        method: 'put',
	                        data: {_token: $('#token').val()},
	                        success: function () {
	//                            var tr = button.parents("tr");
	//                            table.rows(tr).remove().draw(false);
	                            table.destroy();
	                            myFunc();
	                            bootbox.alert({
	                                message: "<i class='fa fa-success'></i>" +
	                                " Survey Closed successively"
	                            });
	                        }, error: function () {
	                            bootbox.alert({
	                                title: "Error",
	                                message: "<i class='fa fa-warning'></i>" +
	                                " Survey not closed please try again"
	                            });
	                        }
	                    });
	
	                }
	            })
	        });
	//        /activate Survey
	        manageTable.on('click', '.js-activate', function () {
	            var button = $(this);
	            bootbox.confirm("Are you sure you want to activate this survey?", function (result) {
	                if (result) {
	                    $.ajax({
	                        url: button.attr('data-url'),
	                        method: 'put',
	                        data: {_token: $('#token').val()},
	                        success: function () {
	//                            var tr = button.parents("tr");
	//                            table.rows(tr).remove().draw(false);
	                            table.destroy();
	                            myFunc();
	                            bootbox.alert({
	                                message: "<i class='fa fa-success'></i>" +
	                                " Survey activated successively"
	                            });
	                        }, error: function () {
	                            bootbox.alert({
	                                title: "Error",
	                                message: "<i class='fa fa-warning'></i>" +
	                                " Survey not activated please try again"
	                            });
	                        }
	                    });
	
	                }
	            })
	        });
	
	//        delete survey
	        manageTable.on('click', '.js-delete', function () {
	            var button = $(this);
	            bootbox.confirm("Are you sure you want to delete this record?", function (result) {
	                if (result) {
	                    $.ajax({
	                        url: button.attr('data-url'),
	                        method: 'DELETE',
	                        data: {_token: $('#token').val()},
	                        success: function () {
	                            var tr = button.parents("tr");
	                            table.rows(tr).remove().draw(false);
	                            bootbox.alert({
	                                message: "<i class='fa fa-success'></i>" +
	                                " Survey deleted successively"
	                            });
	                        }, error: function () {
	                            bootbox.alert({
	                                title: "Error",
	                                message: "<i class='fa fa-warning'></i>" +
	                                " Survey not deleted please try again"
	                            });
	                        }
	                    });
	
	                }
	            })
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
<script src="{{asset('/dashboard/js/table-data.js')}}"></script>@endsection