<?php

namespace App\SMS;

use AfricasTalking\SDK\AfricasTalking;
use App\Models\Client;
use App\Models\SentSms;
use Carbon\Carbon;

class SendSMS
{

    public function sendAtSix(){
        $AT       = new AfricasTalking(env('SMS_USERNAME'), env('SMS_API_KEY'));

        // Get one of the services
        $sms      = $AT->sms();

        // get all upcoming appoints on the same date
        $appointments = Client::whereDate('return_visit_date', Carbon::today())->get();

        foreach ($appointments as $appointment) {
            // send sms
            $send = $sms->send([
                    'to'      => '+256'.$appointment->telephone_number,
                    'message' => "Hello ".$appointment->given_name. ", \n This is a remainder that you have an appointment at " .$appointment->hiv_clinic_no. " on ".$appointment->return_visit_date ."\n We are looking forward to seeing you \n\n".
                                "Mi ngoni ".$appointment->given_name. ", Ma mi enga oti ta mivu mi ni ba le an\'draa " .$appointment->hiv_clinic_no. " aro jo\'a risi o\'mba o\'du " .$appointment->return_visit_date
                ]);

            if($send) {
                $sms_sent = SentSms::where('client', $appointment->hiv_clinic_no)->where('sms_last_sent_date', null)->first();
                // store in the sent sms table
                if($sms_sent !== null) {
                    $sms_sent->update([
                        'sms_last_sent_date' => $appointment->return_visit_date,
                        'sms_send_date' => Carbon::now()
                    ]);
                } else{
                    SentSms::create([
                        'client' => $appointment->hiv_clinic_no,
                        'sms_send_date' => Carbon::now()
                    ]);
                }
            }
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
            $sms->send([
                'to'      => '+256'.$appointment->telephone_number,
                'message' => "Hello ".$appointment->given_name. ", \n This is a remainder that you have an appointment at " .$appointment->hiv_clinic_no. " on ".$appointment->return_visit_date ."\n We are looking forward to seeing you \n\n".
                             "Mi ngoni ".$appointment->given_name. ", Ma mi enga oti ta mivu mi ni ba le an\'draa " .$appointment->hiv_clinic_no. " aro jo\'a risi o\'mba o\'du " .$appointment->return_visit_date
            ]);

        }
    }
}
