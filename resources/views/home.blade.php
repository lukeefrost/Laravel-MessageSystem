@extends('layouts.app')

@section('content')
    @if (count($messages) > 0)
      <ul class="list-group">
        @foreach($messages as $messages)
        <li class="list-group-item"><strong>From: {{ $message->userFrom->name }}, {{ $message->userFrom->email }}</strong> | Subject: {{ $message->subject }}</li>
        @endforeach
      </ul>
    @else
    No Messages!
    @endif
@endsection
