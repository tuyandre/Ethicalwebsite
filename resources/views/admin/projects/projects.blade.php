@extends('shared.master')

@section('css')
		<!-- Internal DataTables css-->
		<link href="{{asset('/dashboard/plugins/datatable/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
		<link href="{{asset('/dashboard/plugins/datatable/responsivebootstrap4.min.css')}}" rel="stylesheet" />
		<link href="{{asset('/dashboard/plugins/datatable/fileexport/buttons.bootstrap4.min.css')}}" rel="stylesheet" />
        @endsection

@section('content')	
@section('items','Projects')
@section('title','Project Done')
<!-- Page Header -->
						<div class="page-header">
							<div>
								<h2 class="main-content-title tx-24 mg-b-5">Projects</h2>
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="#">@yield('items')</a></li>
									<li class="breadcrumb-item active" aria-current="page">@yield('title')</li>
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
									<button type="button" class="btn btn-primary my-2 btn-icon-text add_project">
									  <i class="fe fe-download-cloud mr-2"></i> Add Project
									</button>
								</div>
							</div>
						</div>
						<!-- End Page Header -->
</div>
<div class="row row-sm">
	<div class="col-lg-12">
		<div class="card custom-card overflow-hidden">
			<div class="card-body">
				<div class="table-responsive">
					<table id="manageTable" class="table table-striped table-bordered "
                               style="width:100%">
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
<!-- complex headers -->
    {{--add modal--}}
    <div class="modal " id="addModal" tabindex="-1" role="dialog" aria-labelledby="Project Category">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header d-flex align-items-center">
                    <h4 class="modal-title" id="exampleModalLabel1">Add New Subcategory</h4>
                    <button type="button" class="close ml-auto" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <form data-parsley-validate class="form-horizontal" method="POST" action="{{ route('projects.saveProject')}}" id="frmSave">
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <div id="add-messages"></div>
                        <div class="form-group row">
                            <label for="recipient-name" class="control-label col-sm-3">Project category</label>
                            <label class="col-sm-1 control-label">:</label>
                            <div class="col-sm-8">
                                <select required  name="category" id="add-category" class="form-control">
                                    <option value="">Select Project Category</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger" id="tcat" style="color: red"></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="recipient-name" class="control-label col-sm-3">Project Subcategory</label>
                            <label class="col-sm-1 control-label">:</label>
                            <div class="col-sm-8">
                                <select required  name="subcategory" id="add-subcategory" class="form-control">
                                    <option value="">Select Project Subcategory</option>
                                    @foreach($subcategories as $subcategory)
                                        <option value="{{ $subcategory->id }}">{{ $subcategory->name }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger" id="tsubcat" style="color: red"></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="recipient-name" class="control-label col-sm-3">Name</label>
                            <label class="col-sm-1 control-label">:</label>
                            <div class="col-sm-8">
                            <input type="text" class="form-control" id="name" name="name" required autofocus>
                            <span class="text-danger" id="tname" style="color: red"></span>
                        </div>
                        </div>
                        <div class="form-group row">
                            <label for="code" class="control-label col-sm-3">Number</label>
                            <label class="col-sm-1 control-label">:</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="code" name="code" required autofocus>
                                <span class="text-danger" id="tcode" style="color: red"></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="client" class="control-label col-sm-3">Client</label>
                            <label class="col-sm-1 control-label">:</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="client" name="client" required autofocus>
                                <span class="text-danger" id="tclient" style="color: red"></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="objective" class="control-label col-sm-3">Objective</label>
                            <label class="col-sm-1 control-label">:</label>
                            <div class="col-sm-8">
                                <textarea  type="text" rows="2" class="form-control" id="objective" name="objective" required autofocus></textarea>
                                <span class="text-danger" id="tobj" style="color: red"></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="cost" class="control-label col-sm-3">Cost</label>
                            <label class="col-sm-1 control-label">:</label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" id="cost" name="cost" required autofocus>
                                <span class="text-danger" id="tcost" style="color: red"></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="size" class="control-label col-sm-3">Size</label>
                            <label class="col-sm-1 control-label">:</label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" id="size" name="size" required autofocus>
                                <span class="text-danger" id="tsize" style="color: red"></span>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <input type="submit" class="btn btn-primary" id="btnSave" value="Save Project"/>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{--/add modal--}}

    {{--edit modal for subcategory--}}
    <div class="modal" id="editModal" tabindex="-1" role="dialog" aria-labelledby="Project Category">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header d-flex align-items-center">
                    <h4 class="modal-title" id="exampleModalLabel1">Edit Project</h4>
                    <button type="button" class="close ml-auto" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <form  class="form-horizontal"  action="{{ route('projects.updateProject')}}" id="editForm">
                    {{ csrf_field() }}
                    <div class="modal-body">

                        <div id="edit-messages"></div>

                        <div class="modal-loading"
                             style="width:50px; margin:auto;padding-top:50px; padding-bottom:50px;">
                            <i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i>
                            <span class="sr-only">Loading...</span>

                        </div>

                        <div class="edit-result">
                            <div class="form-group row">
                                <label for="edit-category" class="control-label col-sm-3">Project category</label>
                                <label class="col-sm-1 control-label">:</label>
                                <div class="col-sm-8">
                                <select required  name="category" id="edit-category" class="form-control">
                                    <option value="">select Project Category</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger" id="ecat" style="color: red"></span>
                            </div>
                            </div>
                            <div class="form-group row">
                                <label for="edit-subcategory" class="control-label col-sm-3">Project Subcategory</label>
                                <label class="col-sm-1 control-label">:</label>
                                <div class="col-sm-8">
                                    <select required  name="subcategory" id="edit-subcategory" class="form-control">
                                        <option value="">Select Project Subcategory</option>
                                        @foreach($subcategories as $subcategory)
                                            <option value="{{ $subcategory->id }}">{{ $subcategory->name }}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger" id="esubcat" style="color: red"></span>
                                </div>
                            </div>

                                <div class="form-group row">
                                    <label for="edit-name" class="control-label col-sm-3">Name</label>
                                    <label class="col-sm-1 control-label">:</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="edit-name" name="name" required autofocus>
                                        <span class="text-danger" id="ename" style="color: red"></span>
                                    </div>
                                </div>
                            <div class="form-group row">
                                <label for="edit-code" class="control-label col-sm-3">Number</label>
                                <label class="col-sm-1 control-label">:</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="edit-code" name="code" required autofocus>
                                    <span class="text-danger" id="ecode" style="color: red"></span>
                                </div>
                            </div>
                                <div class="form-group row">
                                    <label for="edit-client" class="control-label col-sm-3">Client</label>
                                    <label class="col-sm-1 control-label">:</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="edit-client" name="client" required autofocus>
                                        <span class="text-danger" id="eclient" style="color: red"></span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="edit-objective" class="control-label col-sm-3">Objective</label>
                                    <label class="col-sm-1 control-label">:</label>
                                    <div class="col-sm-8">
                                        <textarea  type="text" rows="2" class="form-control" id="edit-objective" name="objective" required autofocus></textarea>
                                        <span class="text-danger" id="edobj" style="color: red"></span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="edit-cost" class="control-label col-sm-3">Cost</label>
                                    <label class="col-sm-1 control-label">:</label>
                                    <div class="col-sm-8">
                                        <input type="number" class="form-control" id="edit-cost" name="cost" required autofocus>
                                        <span class="text-danger" id="ecost" style="color: red"></span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="edit-size" class="control-label col-sm-3">Size</label>
                                    <label class="col-sm-1 control-label">:</label>
                                    <div class="col-sm-8">
                                        <input type="number" class="form-control" id="edit-size" name="size" required autofocus>
                                        <span class="text-danger" id="esize" style="color: red"></span>
                                    </div>
                                </div>
                        </div>
                        <div class="modal-footer editFooter">

                            <input type="hidden" name="id" id="id"/>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success" id="editBtn"
                                    data-loading-text="Loading...">
                                <i class="glyphicon glyphicon-ok-sign"></i>
                                Save Changes
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <input type="hidden" value="{{ Session::token() }}" id="token">
    @endsection
    @section('scripts')
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
				<!-- Internal Data Table js -->
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
