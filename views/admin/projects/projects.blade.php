@extends('shared.master')

@section('title','Project')
@section('css')
<link href="{{asset('/dashboard/plugins/datatable/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{asset('/dashboard/plugins/datatable/responsivebootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{asset('/dashboard/plugins/datatable/fileexport/buttons.bootstrap4.min.css')}}" rel="stylesheet" />


@endsection
@section('items','Project')
@section('content')
    <!-- multi-column ordering -->
	
	<div class="main-content side-content pt-0">
				<div class="container-fluid">
					<div class="inner-body">

		
						<!-- Page Header -->
						<div class="page-header">
							<div>
								<h2 class="main-content-title tx-24 mg-b-5">Projects</h2>
								
							</div>
							<div class="d-flex">
								<div class="justify-content-center">
									<button type="button" class="btn btn-white btn-icon-text my-2 mr-2">
									  <i class="fe fe-download mr-2"></i> Import
									</button>
									<button type="button" class="btn btn-white btn-icon-text my-2 mr-2">
									  <i class="fe fe-filter mr-2"></i> Filter
									</button>
									<button type="button" class="btn btn-primary my-2 btn-icon-text add_project">
									  <i class="fe fe-download-cloud mr-2"></i> Add Project
									</button>
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
													<th>Category</th>
													<th>Subcategory</th>
													<th>Name</th>
													<th>Number</th>
													<th>Client</th>
													<th>Objective</th>
													<th>Cost</th>
													<th>Size</th>
													<th>Action</th>
												</tr>
												</thead>
												<tbody>

												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- End Row -->


					</div>
				</div>
			</div>


    <!-- complex headers -->
    {{--add modal--}}
	@include('shared.modals.addproject')

    {{--edit modal for subcategory--}}
    
    <input type="hidden" value="{{ Session::token() }}" id="token">
@endsection
@section('js')
    <script>

        //select subcategory depend on category
        $('#add-category').change(function () {

            var $cat = $("#add-category option:selected").val();
            $.ajax({
                    url: '/Administration/category/subcategory',
                    type: 'Get',
                    dataType: 'json',
                    data: {

                        "category": $cat
                    },
                    success: function (data) {
                        $('#add-subcategory').html('');

                        var option = "";
                        option+='<option>Select project subcategory</option>';
                        $.each(data, function (index, value) {

                            option+='<option value="'+value.id+'">'+value.name+'</option>';
                        });

                        $('#add-subcategory').html(option);
                    }
                }
            );
        });
        //select subcategory depend on category on edit part

        $('#edit-category').change(function () {

            var $cat = $("#edit-category option:selected").val();
            $.ajax({
                    url: '/Administration/category/subcategory',
                    type: 'Get',
                    dataType: 'json',
                    data: {

                        "category": $cat
                    },
                    success: function (data) {
                        $('#edit-subcategory').html('');

                        var option = "";
                        option+='<option>Select project subcategory</option>';
                        $.each(data, function (index, value) {

                            option+='<option value="'+value.id+'">'+value.name+'</option>';
                        });

                        $('#edit-subcategory').html(option);
                    }
                }
            );
        });
//        /end for selecting

        var defaultUrl = "{{ route('projects.getProjects') }}";
        var table;
        var manageTable = $("#manageTable");
        function myFunc() {
            table = manageTable.DataTable({
                ajax: {
                    url: defaultUrl,
                    dataSrc: 'projects'
                },
                columns: [

                    {data: 'subcategory.category.name'},
                    {data: 'subcategory.name'},
                    {data: 'name'},
                    {data: 'code'},
                    {data: 'client'},
                    {data: 'objective'},
                    {data: 'cost'},
                    {data: 'size'},
                    {
                        data: 'id',
                        render: function (data, type, row) {
                            return "<button class='btn btn-primary btn-sm btn-flat js-edit' data-url='/Administration/project/project/show/" + row.id + "' data-id='" + row.id + "'> " +
                                "<i class='fa fa-edit'></i>Edit</button>" +
                                "<a class='btn btn-info btn-sm btn-flat js-detail' data-id='" + data +
                                "' href='/Administration/project/project/detail/" + row.id + "' > <i class='fa fa-eye'></i> View</a>"+
                                "<button class='btn btn-danger btn-sm btn-flat js-delete ' data-id='" + data +
                                "' data-url='/Administration/project/project/delete/" + row.id + "'> <i class='fa fa-trash'></i>Delete</button>";
                        }
                    }
                ]
            });
        }


        $(document).ready(function () {
            $(".add_project").click(function () {
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

                    if (data.project == "ok") {
                        btn.button('reset');
                        form[0].reset();
                        // reload the table
                        table.destroy();
                        myFunc();
                        $('#add-messages').html('<div class="alert alert-success flat">' +
                            '<button type="button" class="close" data-dismiss="alert">&times;</button>' +
                            '<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> Project  successfully saved. </div>');

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
                        $("#edit-category").val(response.project.subcategory.category_id);
                        $("#edit-name").val(response.project.name);
                        $("#edit-cost").val(response.project.cost);
                        $("#edit-size").val(response.project.size);
                        $("#edit-client").val(response.project.client);
                        $("#edit-code").val(response.project.code);
                        $("#edit-objective").val(response.project.objective);
                        $("#edit-subcategory").val(response.project.subcategory_id);

                        // add hidden id
                        $('#id').val(response.project.id);
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
                                    '<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> Project  successfully updated. </div>');

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

            //Delete
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
                                    " Record  deleted successively"
                                });
                            }, error: function () {
                                bootbox.alert({
                                    title: "Error",
                                    message: "<i class='fa fa-warning'></i>" +
                                    " Record not deleted please try again"
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
		<script src="{{asset('/dashboard/js/table-data.js')}}"></script>
@endsection
