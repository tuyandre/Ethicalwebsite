@extends('shared.master')


@section('title','Received Message')
@section('items',' Received Message')
@section('css')

@endsection
@section('content')

    <div class="row">
        <div class="col-md-12 col-lg-12 col-sm-12">
            <div class="card material-card">
                <h5 class="card-title text-uppercase p-3 bg-info text-white mb-0">
                    InBox(Received) Message
                </h5>

                <div class="p-3">

                    <ul class="list-style-none chat-list">
                        <div class="row">

                            @if(is_array($chats))
                                @foreach ($chats as $chat)
                                    <div class="col-md-6">
                                        <li class="mb-3">
                                            <a href="{{route('chats.member.read',$chat->id)}}">
                                                <div class="d-flex align-items-center">
                                                    <?php
                                                    $photo=$chat->sender->photo;

                                                    ?>
                                                    @if(empty($photo))
                                                        <img src="{{ asset('dashboard/assets/images/users/1.jpg')}}" class="rounded-circle" width="40">
                                                    @else
                                                        <img src="{{ asset('uploads/profiles/'.$photo)}}" class="rounded-circle" width="40">
                                                    @endif
                                                    {{--                                                            <img src="assets/images/users/1.jpg" class="rounded-circle" width="40">--}}
                                                    <div class="ml-3">
                                                        <h5 class="mb-0 text-dark">{{$chat->sender->first_name}}  {{ $chat->sender->last_name}}</h5>
                                                        <small class="text-success">{{$chat->sender->email}}</small>
                                                    </div>
                                                    <div class="ml-auto chat-icon ">
                                                        @if($chat->status)
                                                        <button type="button" class="btn btn-success btn-circle btn-circle text-white">
                                                            <i class="fa fa-check-circle" aria-hidden="true"></i>
                                                        </button>
                                                        @else
                                                            <button type="button" class="btn btn-info btn-circle btn-circle text-white">
                                                                <i class="fa fa-times-circle" aria-hidden="true"></i>
                                                            </button>
                                                        @endif
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                    </div>
                                @endforeach
                            @endif


                        </div>
                    </ul>


                </div>
            </div>
        </div>
    </div>




@endsection
@section('js')


@endsection
