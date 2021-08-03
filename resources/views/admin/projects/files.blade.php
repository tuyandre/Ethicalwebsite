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
		<div class="justify-content-center">	<button class="btn btn-primary my-2 btn-icon-text add_subcategory" data-target="add_subcategory" data-toggle="modal"><i class="fe fe-plus mr-2"></i>Add Category</button>
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
					<table id="manageTable" class="table table-striped table-bordered "
                               style="width:90%;margin-left: 5%">
                            <thead>
                            <tr>
                                <th>Project Name</th>
                                <th>File Name</th>
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
	
    {{--add modal--}}
    <div class="modal" id="addModal" tabindex="-1" role="dialog" aria-labelledby="Project Category">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header d-flex align-items-center">
                    <h4 class="modal-title" id="exampleModalLabel1">Add New File</h4>
                    <button type="button" class="close ml-auto" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <form data-parsley-validate class="form-horizontal" method="POST" action="{{ route('projects.saveFile')}}" id="frmSave" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <div id="add-messages"></div>
                        <div class="form-group">
                            <label for="project" class="control-label">Project:</label>
                            <select required  name="project" id="add-project" class="form-control">
                                <option value="">Select Project</option>
                                @foreach($projects as $project)
                                    <option value="{{ $project->id }}">{{ $project->name }}</option>
                                @endforeach
                            </select>
                            <span class="text-danger" id="tproject" style="color: red"></span>
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="control-label">Project File:</label>
                            <input type="file" class="form-control" id="file" name="file" required accept=".docx,.pdf,.doc,">
                            <span class="text-danger" id="tfile" style="color: red"></span>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <input type="submit" class="btn btn-primary" id="btnSave" value="Upload File"/>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{--/add modal--}}




    <input type="hidden" value="{{ Session::token() }}" id="token">
@endsection
@section('scripts')
    <script>
        var defaultUrl = "{{ route('projects.getFiles') }}";
        var table;
        var manageTable = $("#manageTable");
        function myFunc() {
            table = manageTable.DataTable({
                ajax: {
                    url: defaultUrl,
                    dataSrc: 'files'
                },
                columns: [

                    {data: 'project.name'},
                    {data: 'name'},
                    {
                        data: 'id',
                        render: function (data, type, row) {
                            return "<a class='btn btn-info btn-sm btn-flat js-read' data-id='" + data +
                            "' href='/Administration/project/file/read/" + row.id + "' target='_blank'> <i class='fa fa-file'></i> Read</a>"+
                                "<button class='btn btn-danger btn-sm btn-flat js-delete ' data-id='" + data +
                                "' data-url='/Administration/project/file/delete/" + row.id + "'> <i class='fa fa-trash'></i>Delete</button>";
                        }
                    }
                ]
            });
        }


        $(document).ready(function () {
            $(".add_subcategory").click(function () {
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
                    data: new FormData(this),
                    dataType: "JSON",
                    contentType: false,
                    cashe: false,
                    processData: false,
                }).done(function (data) {
                    console.log(data);

                    if (data.file=="ok"){
                        btn.button('reset');
                        form[0].reset();
                        // reload the table
                        table.destroy();
                        myFunc();
                        $('#add-messages').html('<div class="alert alert-success flat">' +
                            '<button type="button" class="close" data-dismiss="alert">&times;</button>' +
                            '<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> Project File successfully saved. </div>');

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

