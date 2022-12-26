<?php

namespace App\Console\Commands;

use App\SMS\SendSms;
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
        $reminder=new SendSms();
        $reminder->sendAtSix();
    }
}
