<?php

namespace App\Helpers;

class WhatsAppHelper
{
    public static function sendNotification($phoneNumber, $message)
    {
        $apiUrl = env('WHATSAPP_API_URL');
        $token = env('WHATSAPP_API_TOKEN');

        $data = [
            'target' => $phoneNumber,
            'message' => $message,
            'countryCode' => '62',
        ];

        $headers = [
            'Authorization: ' . $token,
        ];

        return self::sendRequest($apiUrl, 'POST', $data, $headers);
    }

    private static function sendRequest($url, $method, $data = [], $headers = [])
    {
        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => $method,
            CURLOPT_POSTFIELDS => $data,
            CURLOPT_HTTPHEADER => $headers,
        ]);

        $response = curl_exec($curl);

        curl_close($curl);

        return $response;
    }
}