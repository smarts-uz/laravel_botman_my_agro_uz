<?php

namespace App\Services\Notify;
use Illuminate\Http\Request;
use Pusher\Pusher;

class Notify {
    public function notify($message='hello investmentnovel')
    {
        $options = array(
                        'cluster' => env('PUSHER_APP_CLUSTER'),
                        'encrypted' => true
                        );
        $pusher = new Pusher(
                            env('PUSHER_APP_KEY'),
                            env('PUSHER_APP_SECRET'),
                            env('PUSHER_APP_ID'),
                            $options
                        );

        $data['message'] = $message;
        $pusher->trigger('notify-channel', 'App\\Events\\Notify', $data);

    }
}
