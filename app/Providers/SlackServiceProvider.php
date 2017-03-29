<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class SlackServiceProvider extends ServiceProvider
{
    private $token;

    public function __construct()
    {
        $this->token = 'xoxp-7201027952-7201415569-160055534401-c780219c04f8e4b92b621a069c7c087b';
    }

    public function getChannels()
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, 'https://slack.com/api/channels.list?token='.$this->token.'&pretty=1');
        curl_setopt($curl, CURLOPT_COOKIESESSION, true);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

        $data = curl_exec($curl);
        curl_close($curl);

        $channels = json_decode($data);

        return $channels;
    }

    public function getChannelMessages($channel, $nb_message)
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, 'https://slack.com/api/channels.history?token='.$this->token.'&channel='.$channel.'&count='.$nb_message.'&pretty=1');
        curl_setopt($curl, CURLOPT_COOKIESESSION, true);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

        $data = curl_exec($curl);
        curl_close($curl);

        $channels = json_decode($data);

        return $channels;
    }

    public function sendMessage($message, $channel, $username, $emoji)
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, 'https://slack.com/api/chat.postMessage?token='.$this->token.'&pretty=1&username='.urlencode($username).'&text='.urlencode($message).'&icon_emoji=:'.$emoji.':&channel='.$channel);
        curl_setopt($curl, CURLOPT_COOKIESESSION, true);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

        $return = curl_exec($curl);
        curl_close($curl);

        return json_decode($return);
    }

    public function getEmojis()
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, 'https://slack.com/api/emoji.list?token='.$this->token.'&pretty=1');
        curl_setopt($curl, CURLOPT_COOKIESESSION, true);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

        $data = curl_exec($curl);
        curl_close($curl);

        $emojis = json_decode($data);
        return $emojis;
    }
}
