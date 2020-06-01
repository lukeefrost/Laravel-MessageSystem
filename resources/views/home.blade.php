@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Inbox</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if (count($messages) > 0)
                    <ul class="list-group">

                      @foreach($messages as $messages)
                        <li class="list-group-item"><strong>From: {{ $message->userFrom->name }}, {{ $message->userFrom->email }}</strong> | Subject: {{ $message->subject }}</li>
                      @endforeach
                    </ul>
                    @else
                      No Messages!
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
