@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <form method="POST" action="{{ route('slack-send-message') }}">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="emojiSlack">Emojis</label>
                        <div class="radio">
                            @foreach($slack_emojis->emoji as $key => $value)
                                @if(strstr ( $value, 'alias') == false)
                                    <label>
                                        <input type="radio" name="emojiSlack" value="{{ $key }}"> <img src="{{ $value }}" alt="{{ $key }}" width="32px" height="32px">
                                    </label>
                                @endif
                            @endforeach
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="usernameSlack">Nom d'utilisateur</label>
                        <input type="text" name="usernameSlack" id="usernameSlack" value="{{ old('usernameSlack') }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="channelSlack">Channel Slack</label>
                        <select class="form-control" id="channelSlack" name="channelSlack">
                            @foreach($slack_channels->channels as $channel)
                                <option value="{{ $channel->id }}" {{ old('channelSlack') == $channel->id ? 'selected' : '' }}>{{ $channel->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="messageSlack">Message</label>
                        <textarea class="form-control" rows="3" id="messageSlack" name="messageSlack">{{ old('messageSlack') }}</textarea>
                    </div>
                    <button type="submit" class="btn btn-default">Envoyer le message</button>
                </form>
            </div>
        </div>
    </div>
@endsection