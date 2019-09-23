<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Log;

class SendPushNotification implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    public $users;
    public $title;
    public $body;

    /**
     * Create a new job instance.
     *
     * @param array $users
     * @param $title
     * @param $body
     */
    public function __construct(array $users,$title,$body)
    {
        //
        $this->users = $users;
        $this->title = $title;
        $this->body = $body;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {

        $this->send($this->users,$this->title,$this->body);
    }
    public function send(array  $users,$title,$body){
        $response = $this->sendMessage($users,$title,$body);
        $return["allresponses"] = $response;
        $return = json_encode($return);
        Log::info($return);

    }
    //SEND PUSH NOTIFICATION
    function sendMessage(array $users=[],$title="",$body="")
    {
        $content = array(
            "en" => $title,
            'body'=>$body
        );
        $hashes_array = array();
        array_push($hashes_array, array(
            "id" => "like-button",
            "text" => "Like",
            "icon" => "http://i.imgur.com/N8SN8ZS.png",
            "url" => "http://techzonelk.co"
        ));

        $fields = array(
            'app_id' => "21353309-5e1f-491f-af1b-7c28bfb5eb2e",
            'include_player_ids' => $users,
            'data' => array(
                "body" => $body
            ),
            'contents' => $content,
            'web_buttons' => $hashes_array
        );

        $fields = json_encode($fields);
        print("\nJSON sent:\n");
        print($fields);

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications");
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json; charset=utf-8',
            'Authorization: Basic MTBhYjc1ZmQtOTMyMS00NmJkLWI0ZTktZTczYzc0ZmZiZThh'
        ));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        curl_setopt($ch, CURLOPT_POST, TRUE);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);

        $response = curl_exec($ch);
        curl_close($ch);

        return $response;

    }

}
