@extends('shared.master')

@section('title','Survey')
@section('css')
    <link href="{{asset('/dashboard/assets/extra-libs/datatables.net-bs4/css/dataTables.bootstrap4.css')}}" rel="stylesheet">
    <link r type="text/css"
          href="{{asset('/dashboard/assets/extra-libs/datatables.net-bs4/css/responsive.dataTables.min.css')}}" rel="stylesheet">
@endsection
@section('items','Survey ')
@section('content')

    <div class="row">
        <div class="col-md-12 col-lg-12 col-sm-12">
            <div class="card material-card">

                <h5 class="card-title text-uppercase p-3 bg-info text-white mb-0">
                    Surveys List
                    {{--<button class="btn btn-success btn-flat btn-sm add_survey" style="float: right">--}}
                    {{--<i class="fa fa-plus"></i>Add Survey</button>--}}
                </h5>


                <div class="p-3">

                    <div class="table-responsive">
                        <table id="manageTable" class="table table-striped table-bordered "
                               style="width:100%;">
                            <thead>
                            <tr>
                                <th>Title</th>
                                <th>Objective</th>
                                <th>Status</th>
                                <th>link</th>
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
@endsection
@section('js')
    <script>

        var defaultUrl = "{{ route('survey.getUserSurvey') }}";
        var table;
        var manageTable = $("#manageTable");
        function myFunc() {
            table = manageTable.DataTable({
                ajax: {
                    url: defaultUrl,
                    dataSrc: 'surveys'
                },
                columns: [

                    {data: 'survey.name'},
                    {data: 'survey.objective'},
                    {data: 'status',
                        render: function (data, type, row) {
                            if(row.status==1){
                                return "<span class='bg-success'> Accessed</span>";
                            }else {
                                return "<span class='bg-info'>New </span>";
                            }

                        }},
                    {data: 'id',
                    render: function (data, type, row) {
                        if(row.survey.status==1){
                            return "<button class='btn btn-outline-info btn-sm btn-flat js-load' data-id='" + row.id +
                                "' data-url='/member/visit/survey'> <i class='fas fa-globe'></i>Visit Survey</button>" ;
                        }else {
                            return "<button class='btn btn-info btn-sm btn-flat js-load' disabled data-id='" + row.id +
                                "' data-url='/member/visit/survey'> <i class='fas fa-globe'></i>Visit Survey </button>" +"<span class='bg-warning'>(Survey Closed)</span>";
                        }

            }},
                ]
            });
        }


        $(document).ready(function () {


//initialize data table
            myFunc();
            delete survey
            manageTable.on('click', '.js-load', function () {
                var button = $(this);
                $.ajax({
                    url: button.attr('data-url'),
                    method: 'get',
                    data: {id: button.attr('data-id')},
                    success: function (response) {
                        console.log(response);
                        if (response.survey=="ok"){
                            table.destroy();
                            myFunc();
                            window.open(response.link);
                        }else {
                            bootbox.alert({
                                message: "<i class='fa fa-warning'></i>" +
                                    " Survey Not Found"
                            });
                        }
                    }, error: function () {
                        bootbox.alert({
                            message: "<i class='fa fa-warning'></i>" +
                                " Survey Not Found"
                        });
                    }
                });


            });
        });
    </script>


    <script src="{{asset('/dashboard/assets/extra-libs/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('/dashboard/assets/extra-libs/datatables.net-bs4/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('/dashboard/dist/js/pages/datatable/datatable-basic.init.js')}}"></script>
    <script src="{{asset('/dashboard/js/dataTables.min.js')}}"></script>
@endsection
