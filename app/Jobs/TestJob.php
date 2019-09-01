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

class TestJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $this->basic_email();

    }
    public function basic_email() {
        $data = array('name'=>"Shashila heshan");
       try{
           Mail::send('mail.mail', $data, function($message) {
               $message->to(' a08fc27b67-9093ae@inbox.mailtrap.io', 'Tutorials Point')->subject
               ('Laravel Basic Testing Mail');
               $message->from('xyz@gmail.com','shashila heshan');
           });
           Log::info("Basic Email Sent. Check your inbox.");
       }catch (\Exception $exception){
           Log::error('failed '.$exception);
       }

    }
}
