<?php

namespace Sms;

class Smscountry {

    public function sendOTP(){

        $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_URL => "http://2factor.in/API/V1/d7f4dc49-b1ec-11ea-9fa5-0200cd936042/ADDON_SERVICES/SEND/TSMS",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "POST",
          CURLOPT_POSTFIELDS => "{\"From\": \"MACHLI\",\"To\": \"".$this->to."\", \"TemplateName\": \"OTP VERIFICATION\", \"VAR1\":\"".$this->text."\"}",
        ));
        
        $response = curl_exec($curl);
        $err = curl_error($curl);
        
        curl_close($curl);
        
        // if ($err) {
        //   echo "cURL Error #:" . $err;
        // } else {
        //   echo $response;
        // }
    }
    public function send() {


        $curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "http://2factor.in/API/V1/d7f4dc49-b1ec-11ea-9fa5-0200cd936042/ADDON_SERVICES/SEND/TSMS",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  
    CURLOPT_POSTFIELDS => "{\"From\": \"MACHLI\",\"To\": \"".$this->to."\",  \"Msg\":\"".$this->text."\"}",
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);



    }

}
