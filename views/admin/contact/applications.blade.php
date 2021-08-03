@extends('shared.master')

@section('title','Applications')
@section('css')
    <link href="{{asset('/dashboard/assets/extra-libs/datatables.net-bs4/css/dataTables.bootstrap4.css')}}" rel="stylesheet">
    <link r type="text/css"
          href="{{asset('/dashboard/assets/extra-libs/datatables.net-bs4/css/responsive.dataTables.min.css')}}" rel="stylesheet">
@endsection
@section('items','Application')
@section('content')

    <!-- multi-column ordering -->
    <div class="row">
        <div class="col-12">
            <div class="material-card card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <h4 class="card-title">Opportunities Application</h4></div>
                        <div class="col-md-8">
                            <h6 class="card-subtitle" style="float: right;">
{{--                                <button class="btn btn-info btn-flat btn-sm add_project" >--}}
{{--                                    <i class="fa fa-plus"></i>Add Project</button>--}}
                            </h6>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table id="manageTable" class="table table-striped table-bordered "
                               style="width:100%">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Sex</th>
                                <th>Post</th>
                                <th>Contents</th>
                                <th>Date</th>
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



    <input type="hidden" value="{{ Session::token() }}" id="token">
@endsection
@section('js')
    <script>
        var defaultUrl = "{{ route('application.getApplication') }}";
        var table;
        var manageTable = $("#manageTable");
        function myFunc() {
            table = manageTable.DataTable({
                ajax: {
                    url: defaultUrl,
                    dataSrc: 'applications'
                },
                columns: [

                    {data: 'name'},
                    {data: 'email'},
                    {data: 'sex'},
                    {data: 'post'},
                    {data: 'contents'},
                    {data: 'date'},
                    {
                        data: 'id',
                        render: function (data, type, row) {
                            return "<a class='btn btn-info btn-sm btn-flat js-read' data-id='" + data +
                                "' href='/Administration/application/file/read/" + row.id + "' target='_blank'> <i class='fa fa-file'></i> Read</a>" +
                                "<a class='btn btn-info btn-sm btn-flat js-detail' data-id='" + data +
                                "' href='/Administration/application/applied/readApplication/" + row.id + "' > <i class='fa fa-eye'></i> View</a>"+
                                "<button class='btn btn-danger btn-sm btn-flat js-delete ' data-id='" + data +
                                "' data-url='/Administration/application/applied/delete/" + row.id + "'> <i class='fa fa-trash'></i>Delete</button>";
                        }
                    }
                ]
            });
        }

        $(document).ready(function () {

//initialize data table
            myFunc();
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



    <script src="{{asset('/dashboard/assets/extra-libs/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('/dashboard/assets/extra-libs/datatables.net-bs4/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('/dashboard/dist/js/pages/datatable/datatable-basic.init.js')}}"></script>
@endsection

