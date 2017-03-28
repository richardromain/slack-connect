<?php

namespace App\Http\Controllers;

use App\Providers\SlackServiceProvider;
use Illuminate\Http\Request;

class SlackController extends Controller
{
    public function formSendMessage()
    {
        $slack = new SlackServiceProvider();
        $slack_channels = $slack->getChannels();
        $slack_emojis = $slack->getEmojis();

        return view('slack.send-message', compact('slack_channels', 'slack_emojis'));
    }

    public function sendMessage(Request $request)
    {
        $slack = new SlackServiceProvider();
        $send_message = $slack->sendMessage($request->input('messageSlack'), $request->input('channelSlack'), $request->input('usernameSlack'), $request->input('emojiSlack'));
        if ($send_message->ok) {
            flash('Votre message a bien été envoyé', 'success');
            return redirect()->route('form-slack-send-message');
        }
        flash('Votre message n\'a pas pu être envoyé', 'danger');
        return redirect()->back()->withInput($request->input());
    }
}