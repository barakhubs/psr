<?php

namespace App\Console\Commands;

use App\SMS\SendSMS;
use Illuminate\Console\Command;

class SendOneDayBefore extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:oneDayReminder';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sending sms one day before the scheduled date';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $reminder=new SendSMS();
        $reminder->sendOneDayRemainder();
    }
}
