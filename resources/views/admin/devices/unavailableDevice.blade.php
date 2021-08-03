@extends('shared.master')

@section('css')
		<!-- Internal DataTables css-->
		<link href="{{asset('/dashboard/plugins/datatable/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
		<link href="{{asset('/dashboard/plugins/datatable/responsivebootstrap4.min.css')}}" rel="stylesheet" />
		<link href="{{asset('/dashboard/plugins/datatable/fileexport/buttons.bootstrap4.min.css')}}" rel="stylesheet" />
        @endsection

@section('content')	
@section('items','Devices')
@section('title','Unavailable Devices')
<!-- Page Header -->
						<div class="page-header">
							<div>
								<h2 class="main-content-title tx-24 mg-b-5">Dashboard</h2>
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
									<button type="button" class="btn btn-primary my-2 btn-icon-text">
									  <i class="fe fe-download-cloud mr-2"></i> Download Report
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
					<table class="table" id="DeviceListTable">
                            <thead>
                            <tr>
                                <th class="wd-20p">Device Name</th>
                                <th class="wd-20p">Device Brand</th>
                                <th class="wd-20p">Device Model</th>
                                <th class="wd-20p">Device S/N</th>
                                <th class="wd-25p">Status</th>
                                <th class="wd-25p">Member</th>
                                <th class="wd-20p">Action</th>
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

    <input type="hidden" value="{{ Session::token() }}" id="token">
    @endsection
    @section('scripts')
<script>
        var defaultUrl = "{{ route('admin.devices.getUnavailableDevices') }}";
        var table;
        var manageTable = $("#DeviceListTable");
        function myFunc() {
            table = manageTable.DataTable({
                ajax: {
                    url: defaultUrl,
                    dataSrc: 'devices'
                },
                columns: [
                    {data: 'device_name'},
                    {data: 'device_brand'},
                    {data: 'device_model'},
                    {data: 'device_serialNo'},
                    {data: 'status',
                        render: function (data, type, row) {
                            if(row.status==1){
                                return "<span class='bg-success'> Available</span>";
                            }else {
                                return "<span class='bg-warning'>Not  Available</span>";
                            }

                        }},
                    {data: 'member_id',
                        render: function (data, type, row) {

                            if (data !=null){
                                return "<span>"+row.member.first_name+"</span>";
                            }else{
                                return "";
                            }
                        }

                    },
                    {
                        data: 'status',
                        render: function (data, type, row) {
                            return"<a  href='/Administration/member/detail/" + row.id + "' class='btn btn-info btn-sm btn-flat js-detail' data-id='" + data +
                                "' > <i class='fa fa-eye'></i>View</a>" +
                                "<button class='btn btn-danger btn-sm btn-flat js-delete ' data-id='" + data +
                                "' data-url='/Administration/member/delete/" + row.id + "'> <i class='fa fa-trash'></i>Delete</button>";

                        }
                    }
                ]
            });
        }


        $(document).ready(function () {
            $("#add_device").click(function () {
                $("#addDevice").modal({
                    backdrop: 'static',
                    keyboard: false
                });
            });
            //initialize data table
            myFunc();

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