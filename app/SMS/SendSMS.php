<?php

namespace App\SMS;

use AfricasTalking\SDK\AfricasTalking;
use App\Models\Client;
use App\Models\SentSms;
use Carbon\Carbon;

class SendSMS
{

    public function sendAtSix(){
        $AT       = new AfricasTalking('smsReminder', '4fa1c3a90deccdc104524a8833bde2a7ffc4dff82736fdcbe28cb8a861fad1d4');

        // Get one of the services
        $sms      = $AT->sms();

        // get all upcoming appoints on the same date
        $appointments = Client::whereDate('return_visit_date', Carbon::today())->get();

        foreach ($appointments as $appointment) {
            // send sms
            $send = $sms->send([
                    'to'      => '+256'.$appointment->telephone_number,
                    'message' => "Hello ".$appointment->given_name. ", \n This is a remainder that you have an appointment at " .$appointment->hiv_clinic_no. " today on ".$appointment->return_visit_date ."\n We are looking forward to seeing you \n\n".
                                "Mi ngoni ".$appointment->given_name. ", Ma mi enga oti ta mivu mi ni ba le an'draa " .$appointment->hiv_clinic_no. " aro jo'a risi andru o'mba o'du " .$appointment->return_visit_date
                ]);
        }

    }

    public function sendOneDayRemainder (){
        $AT       = new AfricasTalking(env('SMS_USERNAME'), env('SMS_API_KEY'));

        // Get one of the services
        $sms      = $AT->sms();

        // get all upcoming

        $appointments = Client::whereDate('return_visit_date', Carbon::now()->addDay())->get();

        foreach ($appointments as $appointment) {
            // send sms
            $send = $sms->send([
                'to'      => '+256'.$appointment->telephone_number,
                'message' => "Hello ".$appointment->given_name. ", \n This is a remainder that you have an appointment at " .$appointment->hiv_clinic_no. " tomorrow on ".$appointment->return_visit_date ."\n We are looking forward to seeing you \n\n".
                            "Mi ngoni ".$appointment->given_name. ", Ma mi enga oti ta mivu mi ni ba le an'draa " .$appointment->hiv_clinic_no. " aro jo'a risi drusi o'mba o'du " .$appointment->return_visit_date
            ]);

        }
    }
}
