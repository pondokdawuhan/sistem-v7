<?php

namespace App\Traits;

trait WablasImageTrait
{
    public static function send($phone, $caption)
    {
      
      $token = env('SECURITY_TOKEN_WABLAS');
      $filename = $_FILES['gambar']['tmp_name'];
      $handle = fopen($filename, "r");
      $file = fread($handle, filesize($filename));

      $params = [
          'phone' => $phone,
          'caption' => $caption,
          'file' => base64_encode($file),
          'data' => json_encode($_FILES['gambar'])
      ];

      $curl = curl_init();
      curl_setopt($curl, CURLOPT_HTTPHEADER, [ "Authorization: $token" ] );
      curl_setopt($curl, CURLOPT_URL, env('DOMAIN_SERVER_WABLAS_IMAGE'));
      curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($params));
      curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
      curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
      $result = curl_exec($curl);
      // curl_exec($curl);
      curl_close($curl);

      echo "<pre>";
      print_r($result);


    }
}
