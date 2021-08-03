@extends('shared.master')

@section('title','Contact Us')
@section('css')
    <link href="{{asset('/dashboard/assets/extra-libs/datatables.net-bs4/css/dataTables.bootstrap4.css')}}" rel="stylesheet">
    <link r type="text/css"
          href="{{asset('/dashboard/assets/extra-libs/datatables.net-bs4/css/responsive.dataTables.min.css')}}" rel="stylesheet">
@endsection
@section('items',' Contact Us Message')
@section('content')
    <div class="row">

        <div class="col-md-12 col-lg-8">
            <div class="card material-card">
                <h5 class="card-title text-uppercase p-3 bg-info text-white mb-0">
                    Message
                </h5>
                <div class="card-body">
                    <div class="chat-box scrollable" style="height:434px;">
                        <!--chat Row -->
                        <ul class="chat-list">
                            <!--chat Row -->
                            @foreach ($chats['chats'] as $chat)
                            <li class="chat-item">
                                <div class="chat-img">
                                    <?php
                                    $photo=$chats['receiver']->photo;

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
                                        <h5 class="font-medium">{{$chats['receiver']->first_name}} {{$chats['receiver']->last_name}}</h5>
                                        <p class="font-light mb-0">{{$chat->contents}}</p>
                                        <div class="chat-time">{{$date->diffForHumans($chat->send_date)}}</div>
                                    </div>
                                </div>
                            </li>
                            @endforeach
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
