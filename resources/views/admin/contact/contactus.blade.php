@extends('shared.master')

@section('title','Contact Us')
@section('css')
    <link href="{{asset('/dashboard/assets/extra-libs/datatables.net-bs4/css/dataTables.bootstrap4.css')}}" rel="stylesheet">
    <link r type="text/css"
          href="{{asset('/dashboard/assets/extra-libs/datatables.net-bs4/css/responsive.dataTables.min.css')}}" rel="stylesheet">
@endsection
@section('items','Contact Us')
@section('content')

    <div class="row">
        <div class="col-md-12 col-lg-12 col-sm-12">
            <div class="card material-card">
                <h5 class="card-title text-uppercase p-3 bg-info text-white mb-0">
                    Contact Us Messages
                </h5>

                <div class="p-3">

                    <table id="manageTable" class="table table-striped table-bordered "
                           style="width:100%;">
                        <thead>
                        <tr>
                            <th>Category Name</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
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
    <input type="hidden" value="{{ Session::token() }}" id="token">
@endsection
@section('js')
    <script>

        var table;
        var manageTable = $("#manageTable");
        var defaultUrl = "{{ route('contact.getContactus') }}";
        function myFunc() {
            table = manageTable.DataTable({
                ajax: {
                    url: defaultUrl,
                    dataSrc: 'contacts'
                },
                "columns": [
                    {data: 'subcategory.name'},
                    {data: 'name'},
                    {data: 'email'},
                    {data: 'phone'},
                    {data:'status',

                        render:function (data, type, row) {
                        if(row.status==true){
                            return "<span class='bg-success'> readed</span>";
                        }else {
                            return "<span class='bg-warning'>Unreaded</span>";
                        }
                        }
                    },
                    {
                        data: 'id',
                        render: function (data, type, row) {
                            return "<a class='btn btn-info btn-sm btn-flat js-read' data-id='" + data +
                                "' href='/Administration/contact/contactus/readMessage/" + row.id + "'> <i class='fa fa-eye'></i> Read</a>"+
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


    <script src="{{asset('/dashboard/assets/extra-libs/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('/dashboard/assets/extra-libs/datatables.net-bs4/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('/dashboard/dist/js/pages/datatable/datatable-basic.init.js')}}"></script>
    <script type="text/javascript">
        $('.toast').toast('show');
    </script>
@endsection
