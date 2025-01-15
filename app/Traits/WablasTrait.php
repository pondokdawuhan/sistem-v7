<?php

namespace App\Traits;

use Illuminate\Http\Request;

trait WablasTrait
{
    public static function sendText(array $data)
    {
        $curl = curl_init();
        $token = env('SECURITY_TOKEN_WABLAS');
        $secret_key = env('SECURITY_SECRET_WABLAS');
        $random = true;
        $payload = [
            "data" => $data
        ];
        curl_setopt(
            $curl,
            CURLOPT_HTTPHEADER,
            array(
                "Authorization: $token.$secret_key",
                "Content-Type: application/json"
            )
        );
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($payload));
        curl_setopt($curl, CURLOPT_URL,  env('DOMAIN_SERVER_WABLAS') . 'send-message');
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);

        // $result = curl_exec($curl);
        curl_exec($curl);
        curl_close($curl);
        // echo "<pre>";
        // print_r($result);
    }

    public static function report($date, $page = 1, $perPage = 500) {
      
      $curl = curl_init();
      $token = env('SECURITY_TOKEN_WABLAS');
      $secret_key = env('SECURITY_SECRET_WABLAS');
      $date = $date;
      $perPage = $perPage;
      $page = $page;

      curl_setopt($curl, CURLOPT_HTTPHEADER,
          array(
              "Authorization: $token.$secret_key",
          )
      );
      curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($curl, CURLOPT_URL,  env('DOMAIN_SERVER_WABLAS_v1') . "report/message?page=" . $page . '&perPage=' . $perPage . '&date=' . $date );
      curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
      curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);

      $result = curl_exec($curl);
      curl_close($curl);
      return json_decode($result, true);
    }
}
