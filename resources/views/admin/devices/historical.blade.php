@extends('shared.master')

@section('items','Devices')
@section('title','History')
@section('css')
    <!-- Internal DataTables css-->
    <link href="{{asset('dashboard/plugins/datatable/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
    <link href="{{asset('dashboard/plugins/datatable/responsivebootstrap4.min.css')}}" rel="stylesheet" />
    <link href="{{asset('dashboard/plugins/datatable/fileexport/buttons.bootstrap4.min.css')}}" rel="stylesheet" />
@endsection
@section('content')
<div class="page-header">
	<div>
		<h2 class="main-content-title tx-24 mg-b-5">Dashboard</h2>
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="#">@yield('items')</a>
			</li>
			<li class="breadcrumb-item active" aria-current="page">@yield('title')</li>
		</ol>
	</div>
	<div class="d-flex">
		<div class="justify-content-center">	<a class="btn btn-primary my-2 btn-icon-text" data-target="#addmodel" data-toggle="modal" href="#"><i class="fe fe-plus mr-2"></i>Add New Device</a>
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
					<table class="table" id="DeviceListTable">
						<thead>
							<tr>
                                <th class="wd-20p">Device Name</th>
{{--                                <th class="wd-20p">Device Brand</th>--}}
                                <th class="wd-15p">Device Model</th>
                                <th class="wd-20p">Device S/N</th>
                                <th class="wd-25p">Member</th>
                                <th class="wd-20p">Received Date</th>
                                <th class="wd-20p">Returned Date</th>
{{--                            <th class="wd-20p">Action</th>--}}
                            </tr>
						</thead>
						<tbody></tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="modal" id="addmodel">
	<div class="modal-dialog" role="document">
		<div class="modal-content modal-content-demo">
			<div class="modal-header">
				<h6 class="modal-title">Add users</h6>
				<button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="https://laravel.spruko.com/spruha/ltr/form-validation" data-parsley-validate="">
					<div class="">
						<div class="form-group">
							<label class="">Name</label>
							<input class="form-control" required="" type="text">
						</div>
						<div class="form-group">
							<label class="">Email</label>
							<div class="pos-relative">
								<input class="form-control pd-r-80" required="" type="email">
							</div>
						</div>
						<div class="form-group">
							<label class="">Date</label>
							<div class="pos-relative">
								<input class="edit-item-date form-control" data-toggle="datepicker" placeholder="MM/DD/YYYY" name="editdueDate" id="edit_due_date">
							</div>
						</div>
					</div>
			</div>
			<div class="modal-footer">
				<button class="btn ripple btn-primary">Save changes</button>
				<button class="btn ripple btn-secondary" data-dismiss="modal" type="button">Close</button>
			</div>
			</form>
		</div>
	</div>
</div>
<!-- End Basic modal -->
<input type="hidden" value="{{ Session::token() }}" id="token">
@endsection
@section('scripts')
    <script>
        var defaultUrl = "{{ route('admin.devices.getHistorical') }}";
        var table;
        var manageTable = $("#DeviceListTable");
        function myFunc() {
            table = manageTable.DataTable({
                ajax: {
                    url: defaultUrl,
                    dataSrc: 'devices'
                },
                columns: [
                    {data: 'device.device_name'},
                    {data: 'device.device_model'},
                    {data: 'device.device_serialNo'},
                    {data: 'member_id',
                        render: function (data, type, row) {

                            if (data !=null){
                                return "<span>"+row.member.first_name+" "+row.member.last_name+"</span>";
                            }else{
                                return "";
                            }
                        }
                    },
                    {data: 'received_date'},
                    {data: 'returned_date'}
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
    <script src="{{asset('dashboard/plugins/datatable/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('dashboard/plugins/datatable/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('dashboard/plugins/datatable/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('dashboard/plugins/datatable/fileexport/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('dashboard/plugins/datatable/fileexport/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{asset('dashboard/plugins/datatable/fileexport/jszip.min.js')}}"></script>
    <script src="{{asset('dashboard/plugins/datatable/fileexport/pdfmake.min.js')}}"></script>
    <script src="{{asset('dashboard/plugins/datatable/fileexport/vfs_fonts.js')}}"></script>
    <script src="{{asset('dashboard/plugins/datatable/fileexport/buttons.html5.min.js')}}"></script>
    <script src="{{asset('dashboard/plugins/datatable/fileexport/buttons.print.min.js')}}"></script>
    <script src="{{asset('dashboard/plugins/datatable/fileexport/buttons.colVis.min.js')}}"></script>
    <script src="{{asset('dashboard/js/table-data.js')}}"></script>
	<script src="{{asset('dashboard/plugins/model-datepicker/js/datepicker.js')}}"></script>
        <script src="{{asset('dashboard/plugins/model-datepicker/js/main.js')}}"></script>

		<!-- Modal js-->
		<script src="{{asset('dashboard/js/modal.js')}}"></script>
@endsection

