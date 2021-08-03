@extends('shared.master')

@section('title','Home')
@section('title','Sent Message')
@section('css')

@endsection
@section('content')
    <div class="row">
        <div class="col-md-12 col-lg-12 col-sm-12">
            <div class="card material-card">
                <h5 class="card-title text-uppercase p-3 bg-info text-white mb-0">
                   OutBox(Sent) Message
                </h5>

                <div class="p-3">

                            <ul class="list-style-none chat-list">
                                <div class="row">

                                    @if(is_array($chats))
                                        @foreach ($chats as $chat)
                                            <div class="col-md-6">
                                                <li class="mb-3">
                                                    <a href="{{route('chats.admin.read',$chat->receiver_id)}}">
                                                        <div class="d-flex align-items-center">
                                                            <?php
                                                            $photo=$chat->receiver->photo;

                                                            ?>
                                                                @if(empty($photo))
                                                                    <img src="{{ asset('dashboard/assets/images/users/1.jpg')}}" class="rounded-circle" width="40">
                                                                @else
                                                                    <img src="{{ asset('uploads/profiles/'.$photo)}}" class="rounded-circle" width="40">
                                                                @endif
{{--                                                            <img src="assets/images/users/1.jpg" class="rounded-circle" width="40">--}}
                                                            <div class="ml-3">
                                                                <h5 class="mb-0 text-dark">{{$chat->receiver->first_name}}  {{ $chat->receiver->last_name}}</h5>
                                                                <small class="text-success">{{$chat->receiver->email}}</small>
                                                            </div>
                                                            <div class="ml-auto chat-icon ">
                                                                <button type="button" class="btn btn-success btn-circle btn-circle text-white">
                                                                    {{$chat->amount}}
                                                                </button>
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
