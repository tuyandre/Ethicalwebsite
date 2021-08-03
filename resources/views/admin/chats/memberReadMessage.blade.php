@extends('shared.master')

@section('title','Contact Us')
@section('css')
    <link href="{{asset('/dashboard/assets/extra-libs/datatables.net-bs4/css/dataTables.bootstrap4.css')}}" rel="stylesheet">
    <link r type="text/css"
          href="{{asset('/dashboard/assets/extra-libs/datatables.net-bs4/css/responsive.dataTables.min.css')}}" rel="stylesheet">
@endsection
@section('items',' Read Message')
@section('content')
    <div class="row">

        <div class="col-md-12 col-lg-8">
            <div class="card material-card">
                <h5 class="card-title text-uppercase p-3 bg-info text-white mb-0">
                    Message
                </h5>
                <div class="card-body">
                    <div class="chat-box scrollable" >
                        <!--chat Row -->
                        <ul class="chat-list">
                            <!--chat Row -->
                            <li class="chat-item">
                                <div class="chat-img">
                                    <?php
                                    $photo=$chats['sender']->photo;

                                    ?>
                                    @if(empty($photo))
                                        <i class="ti-user"></i>
                                    @else
                                        <img src="{{ asset('uploads/profiles/'.$photo)}}" alt="user">
                                    @endif
                                </div>
                                <div class="chat-content">
                                    <div class="box bg-light-success">
                                        <?php
                                        $date=\Carbon\Carbon::now();
                                        ?>
                                        <h5 class="font-medium">{{$chats['sender']->first_name}} {{$chats['sender']->last_name}}</h5>
                                        <p class="font-light mb-0">{{$chats['chats']->contents}}</p>
                                        <div class="chat-time">{{$date->diffForHumans($chats['chats']->send_date)}}</div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('js')


    <script src="{{asset('/dashboard/assets/extra-libs/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('/dashboard/assets/extra-libs/datatables.net-bs4/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('/dashboard/dist/js/pages/datatable/datatable-basic.init.js')}}"></script>
    <script type="text/javascript">
        $('.toast').toast('show');
    </script>
@endsection
