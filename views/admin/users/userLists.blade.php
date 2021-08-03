@extends('shared.master') @section('title','MemberList') 
@section('css')

<link href="{{asset('/dashboard/plugins/datatable/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{asset('/dashboard/plugins/datatable/responsivebootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{asset('/dashboard/plugins/datatable/fileexport/buttons.bootstrap4.min.css')}}" rel="stylesheet" />

@endsection
@section('items','Member List ') 
 
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
									<button type="button" class="btn btn-white btn-icon-text my-2 mr-2">
									  <i class="fe fe-download mr-2"></i> Import
									</button>
									<button type="button" class="btn btn-white btn-icon-text my-2 mr-2">
									  <i class="fe fe-filter mr-2"></i> Filter
									</button>
									<button type="button" href="#"class="btn btn-primary my-2 btn-icon-text">
									  <i class="fe fe-download-cloud mr-2"></i> Download Report
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
														<th class="wd-lg-8p"><span>First Name</span></th>
														<th class="wd-lg-20p"><span>Last Name</span></th>
														<th class="wd-lg-20p"><span>Email</span></th>
														<th class="wd-lg-20p"><span>Telophone</span></th>
														<th class="wd-lg-20p"><span>Date</span></th>
														<th class="wd-lg-20p"><span>Status</span></th>
														<th class="wd-lg-20p">Action</th>
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
			<input type="hidden" value="{{ Session::token() }}" id="token">
@endsection
@section('js')
    <script>
    var defaultUrl = "{{ route('members.getMembers') }}";
    var table;
    var manageTable = $("#manageTable");
    function myFunc() {
        table = manageTable.DataTable({
            ajax: {
                url: defaultUrl,
                dataSrc: 'members'
            },
            buttons: [{
                extend: 'excelHtml5',
                title: 'Excel',
                text:'Export to excel'
                //Columns to export
                //exportOptions: {
                //     columns: [0, 1, 2, 3,4,5,6]
                // }
            }
            ],
            columns: [

                {data: 'first_name'},
                {data: 'last_name'},
                {data: 'email'},
                {data: 'telephone'},
                {data: 'date'},
                {data: 'confirmed',
                    render: function (data, type, row) {
                        if(row.confirmed==1){
                            return "<span class='label text-success d-flex'><span class='dot-label bg-success mr-1'></span>Actived</span>";
                        }else {
                            return "<span class='label text-warning d-flex'><span class='dot-label bg-warning mr-1'></span>Pending</span>";
                        }

                    }},
                {
                    data: 'id',
                    render: function (data, type, row) {
                        if(row.confirmed==1){
                            return"<a  href='/Administration/member/detail/" + row.id + "' class='btn btn-info btn-sm btn-flat js-detail' data-id='" + data +
                                "' > <i class='fa fa-eye'></i> View</a>" +
                                "<button class='btn btn-danger btn-sm btn-flat js-delete ' data-id='" + data +
                                "' data-url='/Administration/member/delete/" + row.id + "'> <i class='fa fa-trash'></i>Delete</button>";
                        }else {
                            return "<button class='btn btn-sm btn-primary js-confirm' data-id='" + data +
                                "' data-url='/Administration/member/confirm/" + row.id + "'><i class='fa fa-check'></i> Confirm</button>" +
                                "<a  href='/Administration/member/detail/" + row.id + "' class='btn btn-sm btn-info js-detail' data-id='" + data +
                                "' > <i class='fa fa-eye'></i> View</a>" +
                                "<button class='btn btn-danger btn-sm btn-flat js-delete ' data-id='" + data +
                                "' data-url='/Administration/member/delete/" + row.id + "'> <i class='fa fa-trash'></i> Delete</button>";
                        }

                    }
                }
            ]
        });
    }


    $(document).ready(function () {

//initialize data table
        myFunc();
        manageTable.on('click', '.js-confirm', function () {
            var button = $(this);
            bootbox.confirm("Are you sure you want to Confirm this member?", function (result) {
                if (result) {
                    $.ajax({
                        url: button.attr('data-url'),
                        method: 'PUT',
                        data: {_token: $('#token').val()},
                        success: function (data) {
                            console.log(data);
                            if(data.result=="ok"){
                                var tr = button.parents("tr");
                                bootbox.alert({
                                    title: "success",
                                    message: "<i class='fa fa-success'></i>" +
                                        " User Confirmed successful"
                                });
                            }else{
                                var tr = button.parents("tr");
                                bootbox.alert({
                                    title: "warning",
                                    message: "<i class='fa fa-warning'></i>" +
                                        " User Not Confirmed successful Because message not sent"
                                });
                            }

                            table.rows(tr).remove().draw(false);
                            table.destroy();
                            myFunc();
                        }, error: function () {
                            bootbox.alert({
                                title: "Error",
                                message: "<i class='fa fa-warning'></i>" +
                                " user not Confirmed please try again"
                            });
                        }
                    });

                }
            })
        });


        manageTable.on('click', '.js-delete', function () {
            var button = $(this);
            bootbox.confirm("Are you sure you want to Delete this member?", function (result) {
                if (result) {
                    $.ajax({
                        url: button.attr('data-url'),
                        method: 'delete',
                        data: {_token: $('#token').val()},
                        success: function (data) {
                            console.log(data);
//                            var tr = button.parents("tr");
                            bootbox.alert({
                                title: "success",
                                message: "<i class='fa fa-warning'></i>" +
                                " User Delete successful"
                            });
                           table.rows(tr).remove().draw(false);
                            table.destroy();
                            myFunc();
                        }, error: function () {
                            bootbox.alert({
                                title: "Error",
                                message: "<i class='fa fa-warning'></i>" +
                                " user not Delete please try again"
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
