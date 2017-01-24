<?php
/**
 * Created by PhpStorm.
 * User: Alain.PICHONNAT
 * Date: 23.01.2017
 * Time: 15:00
 */

namespace App\Helpers;


class smsApi
{
    public static function sendSms($number, $message)
    {
        $sender = "797826515";
        $apiKeySms = "e3w1i4p4zVmtY4eKP7DodsNaysnsrGep";
        $value = "";
        foreach ($message as $route)
        {
            $value .= $route["firstName"]." ".$route["lastName"]."\n";
        }

        $curl = curl_init("https://api.swisscom.com/v1/messaging/sms/outbound/tel%3A%2B41".$sender."/requests");
        $header = array( "client_id: ".$apiKeySms."", "Accept: application/json; charset=utf-8", "Content-Type: application/json; charset=utf-8" );
        curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
        $curl_post_data = array(
            'outboundSMSMessageRequest' => array(
                'address' => array(
                    0 => 'tel:+41'.$number.'',
                ),
                'senderAddress' => 'tel:+41'.$sender.'',
                'outboundSMSTextMessage' => array(
                    'message' => ''.$value.'',
                ),
            ),
        );

        $json_post_data = json_encode($curl_post_data);

        curl_setopt($curl, CURLOPT_POSTFIELDS, $json_post_data);
        // Makes curl_exec() return a string.
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        // We are sending a POST request.
        curl_setopt($curl, CURLOPT_POST, true);
        // Similar to cmd-line curl's -k option during development
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
        // Ignore host verification for development
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 2);
        // Must be present to get request headers
        curl_setopt($curl, CURLINFO_HEADER_OUT, FALSE);
        // Make the actual call to the Swisscom server to send the SMS token
        $curl_response = curl_exec($curl);
        // Get the response back from the call.
        $curl_info = curl_getinfo($curl);

        $http_response_code = $curl_info['http_code'];

        if(curl_error($curl) || $http_response_code != 200) {
            $return = 'Error ' . $http_response_code . ' ' . curl_error($curl) . ' API server response: ' . $curl_response;
            curl_close($curl);
            return $return;
        }
        else
        {
            curl_close($curl);
            return "ok";
        }
    }
}