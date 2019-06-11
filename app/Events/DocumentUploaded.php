<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class DocumentUploaded implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public $user;
    public $data;
    public $time;
    public function __construct($user,$data,$time)
    {
        $this->user=$user;
       $this->data=$data;
       $this->time=$time;
        //
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new Channel('uploaded');
    }
    public function broadcastAs()
    {
        return 'DocUploaded';
    }

    public function broadcastWith(){

            return [

                'name'=>$this->user->name,
                'title'=>$this->data,
                'time'=>$this->time
            ];
    }


}
