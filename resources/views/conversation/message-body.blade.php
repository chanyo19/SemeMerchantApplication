@extends('layouts.common1')

@section('links')
    <style>


        .container {
            border: 2px solid #dedede;
            background-color: #f1f1f1;
            border-radius: 5px;
            padding: 10px;
            margin: 10px 0;
        }

        .darker {
            border-color: #ccc;
            background-color: #ddd;
        }

        .container::after {
            content: "";
            clear: both;
            display: table;
        }

        .container img {
            float: left;
            max-width: 60px;
            width: 100%;
            margin-right: 20px;
            border-radius: 50%;
        }

        .container img.right {
            float: right;
            margin-left: 20px;
            margin-right:0;
        }

        .time-right {
            float: right;
            color: #aaa;
        }

        .time-left {
            float: left;
            color: #999;
        }
    </style>
@endsection
@section('content')

    <div class="container-fluid">
        <h2>Chat Messages Conversation ID - #{{$c_id}}</h2>
        @if($messages)
            @foreach($messages as $message)
                @if($message->type==="c")
                    <div class="container">
                        <img src="http://files.kollabora.com/sites/default/files/styles/250x250-square/public/14455/files/144_profileround.png?itok=iA_fRGQ9" alt="Avatar" style="width:100%;">
                        <p>{{$message->message}}</p>
                        <span class="time-right">{{$message->created_at->diffForHumans()}}</span>
                    </div>

                @else
                    <div class="container darker">
                        <img src="http://files.kollabora.com/sites/default/files/styles/250x250-square/public/14455/files/144_profileround.png?itok=iA_fRGQ9" alt="Avatar" class="right" style="width:100%;">
                        <p>{{$message->message}}</p>
                        <span class="time-right">{{$message->created_at->diffForHumans()}}</span>
                    </div>
                @endif


            @endforeach
        @endif
        <form action="{{url('/merchant/send-message')}}" method="post">
            @csrf
            <div class="container">
                <input type="hidden" name="conversation_id" value="{{$c_id}}">
                <input type="text" name="message" placeholder="Enter new message"> &nbsp;&nbsp;&nbsp;<button value="SEND" type="submit">SEND</button>
            </div>
        </form>
    </div>


@stop