<?php

namespace App\Console\Commands;

use App\SMS\SendSMS;
use Illuminate\Console\Command;

class SendDaily extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:reminder';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send daily reminders for clients with appointments on that day';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $reminder=new SendSMS();
        $reminder->sendAtSix();
    }
}
