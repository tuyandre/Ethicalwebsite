@extends('shared.master')

@section('css')
		<!-- Internal DataTables css-->
		<link href="{{asset('/dashboard/plugins/datatable/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
		<link href="{{asset('/dashboard/plugins/datatable/responsivebootstrap4.min.css')}}" rel="stylesheet" />
		<link href="{{asset('/dashboard/plugins/datatable/fileexport/buttons.bootstrap4.min.css')}}" rel="stylesheet" />
        @endsection

@section('content')	
@section('items','Members')
@section('title','Users')
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
									<button type="button" class="btn btn-primary my-2 btn-icon-text" id="add_user">
                                        <i class="fe fe-user-plus mr-2"></i> Add New User
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
					<table id="manageTable" class="table" style="width:100%">
						<thead>
							<tr>
								<th class="wd-20p">First Name</th>
								<th class="wd-20p">Last Name</th>
								<th class="wd-20p">Email</th>
								<th class="wd-20p">Telophone</th>
								<th class="wd-10p">District</th>
								<th class="wd-10p">Status</th>
								<th class="wd-10p">Action</th>
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


<div class="modal" id="addUser">
    <div class="modal-dialog" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title">Add users</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <div id="add-messages"></div>
                <form action="{{route('users.saveMember')}}" method="post" data-parsley-validate="" id="frmSave">
                    {{ csrf_field() }}
                    <div class="">
                        <div class="row row-sm form-group">
                            <div class="col-lg-12">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            Position:
                                        </div>
                                    </div>
                                    <?php

                                    $roles=\App\Models\Role::all();
                                    ?>

                                    <select name="role" class="form-control select2">
                                        <option value="">Select Position</option>
                                        {{--                                                @foreach($roles as $role)--}}
                                        {{--                                                <option value="{{$role->id}}">{{$role->display_name}}</option>--}}
                                        {{--                                                @endforeach--}}
                                        <option value="admin">Administrator</option>
                                        <option value="member">Member</option>
                                        <option value="senior">Senior Employer</option>
                                    </select>
                                    {{--                                            <input class="form-control" id="textMask" name="first_name" placeholder="First name" type="text" required>--}}
                                </div>
                            </div>
                        </div>
                        <div class="row row-sm form-group">
                            <div class="col-lg-12">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            First Name:
                                        </div>
                                    </div><input class="form-control" id="textMask" name="first_name" placeholder="First name" type="text" required>
                                </div>
                            </div>
                        </div>
                        <div class="row row-sm form-group">
                            <div class="col-lg-12">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            Last Name:
                                        </div>
                                    </div><input class="form-control" name="last_name" required id="mask" placeholder="Last Name" type="text">
                                </div>
                            </div>
                        </div>
                        <div class="row row-sm form-group">
                            <div class="col-lg-12">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            Email:
                                        </div>
                                    </div><input class="form-control" name="email" required id="emailMask" placeholder="Email" type="email">
                                </div>
                            </div>
                        </div>
                        <div class="row row-sm form-group">
                            <div class="col-lg-12">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            Phone:
                                        </div>
                                    </div><input class="form-control" required name="phone" id="phoneMask" placeholder="phone" type="text">
                                </div>
                            </div>
                        </div>

                        <div class="row row-sm form-group">
                            <div class="col-lg-12">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            Gender:
                                        </div>
                                    </div>
                                    <select name="gender" class="form-control select2" required>
                                        <option value="">Select Gender</option>
                                        <option value="M">Male</option>
                                        <option value="F">Female</option>
                                    </select>
                                 </div>
                            </div>
                        </div>

                        <div class="row row-sm form-group">
                            <div class="col-lg-12">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            Education:
                                        </div>
                                    </div>
                                    <select name="education" class="form-control select2" required>
                                        <option value="">Select Education</option>
                                        <option value="Masters">Masters</option>
                                        <option value="Bachelors">Bachelors</option>
                                        <option value="Advanced A1">Advanced Diploma</option>
                                        <option value="A2">Secondary Certificate</option>
                                    </select>
                                    {{--                                            <input class="form-control" id="textMask" name="first_name" placeholder="First name" type="text" required>--}}
                                </div>
                            </div>
                        </div>

                        <div class="row row-sm form-group">
                            <div class="col-lg-12">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            Fields:
                                        </div>
                                    </div><input class="form-control" required name="fields" id="phoneMask" placeholder="Fields" type="text">
                                </div>
                            </div>
                        </div>
                        <div class="row row-sm form-group">
                            <div class="col-lg-12">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            First District:
                                        </div>
                                    </div><input class="form-control" required name="district1" id="phoneMask" placeholder="First District" type="text">
                                </div>
                            </div>
                        </div>

                        <div class="row row-sm form-group">
                            <div class="col-lg-12">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            Second District:
                                        </div>
                                    </div><input class="form-control"  name="district2" id="district2" placeholder="Second District" type="text">
                                </div>
                            </div>
                        </div>

                        <div class="row row-sm form-group">
                            <div class="col-lg-12">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            Third District:
                                        </div>
                                    </div><input class="form-control" name="district3" id="district3" placeholder="Third District" type="text">
                                </div>
                            </div>
                        </div>

                        <div class="row row-sm form-group">
                            <div class="col-lg-12">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            Password:
                                        </div>
                                    </div>
                                    <input class="form-control" id="passwordMask" placeholder="Password" type="password" required name="password">
                                </div>
                            </div>
                        </div>
                        <div class="row row-sm form-group">
                            <div class="col-lg-12">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            Confirm Password:
                                        </div>
                                    </div><input class="form-control" id="confirm" placeholder="confirm Password" type="password" name="confirm" required>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button class="btn ripple btn-primary" id="btnSave">Save changes</button>
                        <button class="btn ripple btn-secondary" data-dismiss="modal"  type="button">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End Basic modal -->




    <input type="hidden" value="{{ Session::token() }}" id="token">
    @endsection
    @section('scripts')
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
            columns: [

                {data: 'first_name'},
                {data: 'last_name'},
                {data: 'email'},
                {data: 'telephone'},
                {data: 'district1'},
                {data: 'confirmed',
                    render: function (data, type, row) {
                        if(row.confirmed==1){
                            return "<span class='bg-success'> Activated</span>";
                        }else {
                            return "<span class='bg-warning'>Not  Activated</span>";
                        }

                    }},
                {
                    data: 'id',
                    render: function (data, type, row) {
                        if(row.confirmed==1){
                            return"<a  href='/Administration/member/detail/" + row.id + "/show' class='btn btn-info btn-sm btn-flat js-detail' data-id='" + data +
                                "' >View</a>" +
                                "<button class='btn btn-danger btn-sm btn-flat js-delete ' data-id='" + data +
                                "' data-url='/Administration/member/delete/" + row.id + "'>Delete</button>";
                        }else {
                            return "<button class='btn btn-success btn-sm btn-flat js-confirm' data-id='" + data +
                                "' data-url='/Administration/member/confirm/" + row.id + "'>Confirm</button>" +
                                "<a  href='/Administration/member/detail/" + row.id + "/show' class='btn btn-info btn-sm btn-flat js-detail' data-id='" + data +
                                "' > <i class='fa fa-eye'></i>View</a>" +
                                "<button class='btn btn-danger btn-sm btn-flat js-delete ' data-id='" + data +
                                "' data-url='/Administration/member/delete/" + row.id + "'>Delete</button>";
                        }

                    }
                }
            ]
        });
    }


    $(document).ready(function () {
        $("#add_user").click(function(){
            $("#addUser").modal({
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

                if (data.message == "ok") {
                    btn.button('reset');
                    form[0].reset();
                    // reload the table
                    table.destroy();
                    myFunc();
                    $('#add-messages').html('<div class="alert alert-success flat">' +
                        '<button type="button" class="close" data-dismiss="alert">&times;</button>' +
                        '<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> User  successfully Registered. </div>');

                    $(".alert-success").delay(500).show(10, function () {
                        $(this).delay(3000).hide(10, function () {
                            $(this).remove();
                        });
                    });
                    location.reload();
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

