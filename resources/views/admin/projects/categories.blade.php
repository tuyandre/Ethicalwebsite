@extends('shared.master')

@section('css')
		<!-- Internal DataTables css-->
		<link href="{{asset('/dashboard/plugins/datatable/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
		<link href="{{asset('/dashboard/plugins/datatable/responsivebootstrap4.min.css')}}" rel="stylesheet" />
		<link href="{{asset('/dashboard/plugins/datatable/fileexport/buttons.bootstrap4.min.css')}}" rel="stylesheet" />
        @endsection
@section('title','Category list')
@section('items','Projects')
@section('content')
<div class="page-header">
	<div>
		<h2 class="main-content-title tx-24 mg-b-5">Projects</h2>
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="#">@yield('items')</a>
			</li>
			<li class="breadcrumb-item active" aria-current="page">@yield('title')</li>
		</ol>
	</div>
	<div class="d-flex">
		<div class="justify-content-center">	<button class="btn btn-primary my-2 btn-icon-text add_category" data-target="#add_category" data-toggle="modal"><i class="fe fe-plus mr-2"></i>Add Category</button>
		</div>
	</div>
</div>
<!-- End Page Header -->
</div>
<!-- Row -->
<div class="row row-sm">
	<div class="col-lg-12">
		<div class="card custom-card">
			<div class="card-body">
				
				<div class="table-responsive table-hover">
					<table class="table" id="manageTable"class="table table-striped table-bordered "
                               style="width:90%;margin-left: 5%">
						<thead>
                            <tr>
                                <th>Name</th>
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
    <!-- complex headers -->
	
	<div class="modal" id="addModal" tabindex="-1" role="dialog" aria-labelledby="Project Category">
        <div class="modal-dialog" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title">Add Category</h6>
                    <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <div id="add-messages"></div>
                    <form data-parsley-validate class="form-horizontal" method="POST" action="{{ route('projects.saveCategories')}}" id="frmSave">
                        {{ csrf_field() }}
                        <div class="">
                            <div class="row row-sm form-group">
                                <div class="col-lg-12">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                Name:
                                            </div>
                                        </div>

                                        <input type="text" class="form-control" id="name" name="name" required autofocus>
                            <span class="text-danger" id="tname" style="color: red"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn ripple btn-primary" id="btnSave">Save Category</button>
                            <button class="btn ripple btn-secondary" data-dismiss="modal"  type="button">Close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal" id="addModal" tabindex="-1" role="dialog" aria-labelledby="Project Category">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header d-flex align-items-center">
                    <h4 class="modal-title" id="exampleModalLabel1">Add New Category</h4>
                    <button type="button" class="close ml-auto" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <form data-parsley-validate class="form-horizontal" method="POST" action="{{ route('projects.saveCategories')}}" id="frmSave">
                    {{ csrf_field() }}
                <div class="modal-body">
                    <div id="add-messages"></div>
                        <div class="form-group">
                            <label for="recipient-name" class="control-label">Name:</label>
                            <input type="text" class="form-control" id="addname" name="name" required autofocus>
                            <span class="text-danger" id="tname" style="color: red"></span>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-primary" id="btnSave" value="Save Category"/>
                </div>
                </form>
            </div>
        </div>
    </div>

{{--edit modal for subcategory--}}
    <div class="modal" id="editModal" tabindex="-1" role="dialog" aria-labelledby="Project Category">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header d-flex align-items-center">
                    <h4 class="modal-title" id="exampleModalLabel1">Edit Category</h4>
                    <button type="button" class="close ml-auto" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <form  class="form-horizontal"  action="{{ route('projects.updateCategories')}}" id="editForm">
                    {{ csrf_field() }}
                    <div class="modal-body">

                        <div id="edit-messages"></div>

                        <div class="modal-loading"
                             style="width:50px; margin:auto;padding-top:50px; padding-bottom:50px;">
                            <i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i>
                            <span class="sr-only">Loading...</span>

                        </div>

                        <div class="edit-result">
                            <div class="form-group">
                                <label for="recipient-name" class="control-label">Name:</label>
                                <input type="text" class="form-control" id="edit-name" placeholder="Category name" name="name" autocomplete="off" required>
                                <span class="text-danger" id="ename" style="color: red"></span>
                            </div>
                        </div>
                    <div class="modal-footer editFooter">

                        <input type="hidden" name="id" id="id"/>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn ripple btn-primary" id="editBtn"
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
        var defaultUrl = "{{ route('projects.getCategories') }}";
        var table;
        var manageTable = $("#manageTable");
        function myFunc() {
            table = manageTable.DataTable({
                ajax: {
                    url: defaultUrl,
                    dataSrc: 'categories'
                },
                columns: [

                    {data: 'name'},
                    {
                        data: 'id',
                        render: function (data, type, row) {
                            return "<button class='btn btn-primary btn-sm btn-flat js-edit' data-url='/Administration/project/categories/show/" + row.id + "' data-id='" + row.id + "'> " +
                                "<i class='fa fa-edit'></i>Edit</button>" +
                                "<button class='btn btn-danger btn-sm btn-flat js-delete ' data-id='" + data +
                                "' data-url='/Administration/project/categories/delete/" + row.id + "'> <i class='fa fa-trash'></i>Delete</button>";
                        }
                    }
                ]
            });
        }


        $(document).ready(function () {
            $(".add_category").click(function(){
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

                    if (data.category=="ok"){
                        btn.button('reset');
                        form[0].reset();
                        // reload the table
                        table.destroy();
                        myFunc();
                        $('#add-messages').html('<div class="alert alert-success flat">' +
                            '<button type="button" class="close" data-dismiss="alert">&times;</button>' +
                            '<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> Project Category successfully saved. </div>');

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
                    option+=response.responseJSON.message;
                    var data=response.responseJSON.errors;
                    $.each(data,function (i, value) {
                        console.log(value);
                        if (i=='name'){
                            $('#tname').html(value[0])
                        }
                        $.each(value,function (j, values) {
                            option += '<p>' + values + '</p>';
                        });
                    });
                    $('#add-messages').html('<div class="alert alert-danger flat">' +
                        '<button type="button" class="close" data-dismiss="alert">&times;</button>' +
                        '<strong><i class="glyphicon glyphicon-remove"></i></strong><b>oops:</b>'+option+'</div>');

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
                        $("#edit-name").val(response.category.name);

                        // add hidden id
                        $('#id').val(response.category.id);
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
                                    '<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> Project Category successfully updated. </div>');

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

