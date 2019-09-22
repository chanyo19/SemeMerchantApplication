<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Mockery\Exception;

class sendMail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    private $body;
    /**
     * @var string
     */
    private $to;
    private $subject;

    /**
     * Create a new job instance.
     *
     * @param $body
     * @param string $to
     * @param $subject
     */
    public function __construct($body,$subject,$to="admin@spahub.lk")
    {
        //
        $this->body = $body;
        $this->to = $to;
        $this->subject = $subject;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
     $email=$this->to;
      $subject=$this->subject;
        Log::info("Sending mail");
        try{
            Mail::send('mail.mail', ['data'=>$this->body], function($message) use ($email, $subject) {
                $message->to($email)->subject($subject);
            });
            Log::info("Basic Email Sent. Check your inbox.");
        }catch (\Exception $exception){
            Log::error('failed '.$exception);
        }

    }




}
