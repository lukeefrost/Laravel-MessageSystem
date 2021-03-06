@extends('layouts.app')

@section('content')
    @if (count($messages) > 0)
        <ul class="list-group">
          @foreach($messages as $messages)
          <li class="list-group-item"><strong>From: {{ $message->userTo->name }}, {{ $message->userTo->email }}</strong> | Subject: {{ $message->subject }}
            @if ($message->read)
            <span class="badge badge-success float-right">Read</span>
            @endif
          </li>
          @endforeach
        </ul>
    @else
      No Messages!
    @endif

@endsection
