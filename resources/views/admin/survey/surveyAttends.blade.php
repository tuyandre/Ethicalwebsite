@extends('shared.master')

@section('title','Survey Attends')
@section('css')
    <link href="{{asset('/dashboard/assets/extra-libs/datatables.net-bs4/css/dataTables.bootstrap4.css')}}" rel="stylesheet">
    <link r type="text/css"
          href="{{asset('/dashboard/assets/extra-libs/datatables.net-bs4/css/responsive.dataTables.min.css')}}" rel="stylesheet">
@endsection
@section('items','Survey Attends ')
@section('content')
    <div class="row">
        <div class="col-md-12 col-lg-12 col-sm-12">
            <div class="card material-card">

                <h5 class="card-title text-uppercase p-3 bg-info text-white mb-0">
                    Surveys Attendance List for <strong class="bg-success" style="color: darkgreen">{{$survey->name}}</strong> Survey

                </h5>


                <div class="p-3">

                    <div class="table-responsive">
                        <table id="manageTable" class="table table-striped table-bordered "
                               style="width:100%;">
                            <thead>
                            <tr>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Email</th>
                                <th>telephone</th>
                                <th>Accessed Date</th>
                                <th>Status</th>
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
    <input type="hidden" value="/Administration/survey/getDetail/{{ $survey->id }}" id="data-url">
@endsection
@section('js')
<script>

    var defaultUrl = $("#data-url").val();
    var table;
    var manageTable = $("#manageTable");
    function myFunc() {
        table = manageTable.DataTable({
            ajax: {
                url: defaultUrl,
                dataSrc: 'surveys'
            },
            columns: [

                {data: 'user.first_name'},
                {data: 'user.last_name'},
                {data: 'user.email'},
                {data: 'user.telephone'},
                {data: 'date'},
                {data: 'status',
                    render: function (data, type, row) {
                        if(row.status==1){
                            return "<span class='bg-success'> Accessed</span>";
                        }else {
                            return "<span class='bg-warning'>Not Accessed</span>";
                        }

                    }},
                {
                    data: 'id',
                    render: function (data, type, row) {
                            return"<button class='btn btn-warning btn-sm btn-flat js-close' data-id='" + data +
                                "' data-url='/Administration/survey/close/" + row.id + "'> <i class='fas fa-low-vision'></i>Remove</button>" ;


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
<script src="{{asset('/dashboard/assets/extra-libs/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('/dashboard/assets/extra-libs/datatables.net-bs4/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('/dashboard/dist/js/pages/datatable/datatable-basic.init.js')}}"></script>
<script src="{{asset('/dashboard/js/dataTables.min.js')}}"></script>
@endsection
