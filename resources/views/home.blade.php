@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="list-group">
                @foreach($messages->messages as $message)
                    <div class="list-group-item">
                        <h4 class="list-group-item-heading">
                            @if(property_exists($message, 'user'))
                                {{ $message->user }}
                            @else
                                {{ $message->username }}
                            @endif
                        </h4>
                        <p class="list-group-item-text">{{ $message->text }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
