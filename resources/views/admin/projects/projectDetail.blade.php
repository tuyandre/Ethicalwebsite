@extends('shared.master')

@section('title','Project Detail')
@section('css')
		<!-- Internal DataTables css-->
		<link href="{{asset('/dashboard/plugins/datatable/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
		<link href="{{asset('/dashboard/plugins/datatable/responsivebootstrap4.min.css')}}" rel="stylesheet" />
		<link href="{{asset('/dashboard/plugins/datatable/fileexport/buttons.bootstrap4.min.css')}}" rel="stylesheet" />
        @endsection
@section('items','Project Detail')
@section('content')
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



    <input type="hidden" value="/Administration/project/detail/getFile/{{ $project}}" id="url-data">

@endsection
@section('scripts')
    <script>
        var table;
        var manageTable = $("#manageTable");
        var defaultUrl = $('#url-data').val();
        console.log(defaultUrl);
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

//initialize data table
           myFunc();
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
    <script type="text/javascript">
        $('.toast').toast('show');
    </script>
@endsection
