@extends('shared.master')

@section('title','New Message')
@section('css')
    <link href="{{asset('/dashboard/assets/extra-libs/datatables.net-bs4/css/dataTables.bootstrap4.css')}}" rel="stylesheet">
    <link href="{{asset('/dashboard/css/dataTables.checkboxes.css')}}" rel="stylesheet">
    <link href="{{asset('/dashboard/css/datatables.min.css')}}" rel="stylesheet">
    <link r type="text/css" href="{{asset('/dashboard/assets/extra-libs/datatables.net-bs4/css/responsive.dataTables.min.css')}}" rel="stylesheet">
@endsection
@section('items','New  Message')
@section('content')
    <div class="row">
        <div class="col-md-12 col-lg-12 col-sm-12">
            <div class="card material-card">
                <h5 class="card-title text-uppercase p-3 bg-info text-white mb-0">
                    Member List & New Message
                </h5>

                <div class="p-3">

                    <div class="add-messages"></div>
                    <form  id="send-form" action="{{route('chats.admin.store')}}" method="POST" >

                        {{ csrf_field() }}
                        <table data-parsley-validate id="memberTable" class="table table-striped table-bordered display" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th></th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Email</th>
                                <th>Telephone</th>
                                <th>Address</th>
                                <th>Gender</th>
                                <th>Age</th>
                            </tr>
                            </thead>

                        </table>

                        <hr>
                        <div class="form-group row ">
                            <label for="edit-subcategory" class="control-label col-sm-2">Write Message</label>
                            <label class="col-sm-1 control-label">:</label>
                            <div class="col-sm-9">
                                <textarea id="content" placeholder="Type message" name="content" rows="5" class="form-control border-1px"></textarea>
                                <span class="text-danger" id="econtent" style="color: red"></span>
                            </div>
                        </div>
                        <hr>

                        <div class="form-group row ">
                            <div class="col-sm-12">
                                <div class="add-messages"></div>
                            </div>
                        </div>
                        <div class="form-group row ">
                            <div class="col-sm-6">
                                <input style="float: right" type="submit" class="btn btn-info" id=btnSave"
                                       data-loading-text="Loading..." value="Send Message"/>

                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>





@endsection
@section('js')
    <script>
        var defaultUrl = "{{ route('survey.getMemberSurvey') }}";
        var table;
        var manageTable = $("#memberTable");
        function myFunc() {
            table = manageTable.DataTable({
                    ajax: {
                        url: defaultUrl,
                        dataSrc: 'members'
                    },
                    columns: [
                        {data: 'id'},
                        {data: 'first_name'},
                        {data: 'last_name'},
                        {data: 'email'},
                        {data: 'telephone'},
                        {data: 'address'},
                        {data: 'gender'},
                        {data: 'date',
                            render: function (data, type, row) {
                            var today=new Date();
                            var dt2=new Date(row.date)
                                var diffYear =(today.getTime() - dt2.getTime()) / 1000;
                                diffYear /= (60 * 60 * 24);
                                var age=Math.abs(Math.round(diffYear/365.25));

                                    return age;

                            }
                        }],

                    columnDefs: [
                        {
                            orderable: false,
                            className: 'select-checkbox',
                            targets:   0,
                            width: '1%',
                            render: function (data, type, full, meta){
                                return '<input type="checkbox" name="user_id">';
                            }
                        }, {
                            "targets": [1],
                            "visible": false,
                            "searchable": false
                        }
                    ],
                    select: {
                        style: 'multi',
                        selector: 'td:first-child'
                    },
                    order: [[1, 'asc']]
                }
            );
        }
        $(document).ready(function() {
            myFunc();
            // Handle form submission event
            $('#send-form').on('submit', function(e){
                e.preventDefault();
                var form =  $(this);

//                var rows_selected = table.column(0).checkboxes.selected();
                var rows_selected = table.rows('.selected').data();
                // Iterate over all selected checkboxes
//                var myUsers=[];
//                let formData = new FormData(this);
                $.each(rows_selected, function(index, rowId){
                    // console.log(rowId.id);
                    $(form).append(
                        $('<input>')
                            .attr('type', 'hidden')
                            .attr('name', 'users[]')
                            .val(rowId.id)
                    );
                });
//                console.log(myUsers);


//                formData.append("user", myUsers);
                var btn = $('#btnSave');
                btn.button('loading');
                $.ajax({
                    url: form.attr('action'),
                    method: form.attr('method'),
                    data: form.serialize()
                }).done(function (data) {
                    console.log(data);
                    table.destroy();
                    myFunc();

                    if (data.chat == "ok") {
                        btn.button('reset');
                        form[0].reset();
                        $('.add-messages').html('<div class="alert alert-success flat">' +
                            '<button type="button" class="close" data-dismiss="alert">&times;</button>' +
                            '<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> Message Sent  successfully . </div>');

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
                    $('.add-messages').html('<div class="alert alert-danger flat">' +
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

        });
    </script>

    <script src="{{asset('/dashboard/assets/extra-libs/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('/dashboard/assets/extra-libs/datatables.net-bs4/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('/dashboard/dist/js/pages/datatable/datatable-basic.init.js')}}"></script>
    <script src="{{asset('/dashboard/js/dataTables.checkboxes.min.js')}}"></script>
    <script src="{{asset('/dashboard/js/dataTables.checkboxes.min.js')}}"></script>
    <script src="{{asset('/dashboard/js/dataTables.min.js')}}"></script>
@endsection
