<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller
{

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     *        http://example.com/index.php/welcome
     *    - or -
     *        http://example.com/index.php/welcome/index
     *    - or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    public function index()
    {
        $this->load->view('index');
    }


    public function testing()
    {

        $url = base_url() . "api";
        $bigData['code'] = 106;
        $bigData["category_id"] = "a985d6772db22235fb25240e4f745784";
        $data['region_id'] = "f479adc446fa07088f9b67ee7cc3627b";
        $data["region_name"] = "Dar es salaam";
        $data['item_name'] = "Germany Rotary";
        $data['user_id'] = "57a6a735766f85704e6ba931bc0c4e93";
        $bigData['data'] = $data;

        $content = json_encode($bigData);

        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER,
            array("Content-type: application/json"));
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, '{"code":"111","data":{"item_id":"d3413f698fdc5e32ca5f90a097cf691c","user_id":"57a6a735766f85704e6ba931bc0c4e93","amount":2500,"currency":"TZS"}}');

        $json_response = curl_exec($curl);

        $status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        curl_close($curl);
        echo $json_response;

    }


    public function ussd()
    {

        $text = $this->input->post("text");

        if ($text == "") {
            // This is the first request. Note how we start the response with CON
            $response = "CON Karibu Locate Chagua Lugha \n";
            $response .= "1. Kiswahili" . "\n";
            $response .= "2. Kingereza(English)";

        } else if ($text == "1") {
            // pull available locations from the server
            $data = json_decode($this->data_model->get_all_locations(), true);
            $locations = $data['locations'];
            // Business logic for first level response
            $response = "CON Chagua Mkoa \n";
            // loop the location array to get all locations

            foreach ($locations as $index => $location) {
                //  var_dump($location);

                $response .= $index + 1 . ". " . $location['location_name'] . "\n";


            }


        } else if ($text == "2") {
            // Business logic for first level response
            // This is a terminal request. Note how we start the response with END
            // pull available locations from the server
            $data = json_decode($this->data_model->get_all_locations(), true);
            $locations = $data['locations'];
            // Business logic for first level response
            $response = "CON Choose Location \n";
            // loop the location array to get all locations

            foreach ($locations as $index => $location) {
                //  var_dump($location);

                $response .= $index + 1 . ". " . $location['location_name'] . "\n";


            }

        } else if ($text == "1*1") {
            // This is a second level response where the user selected 1 in the first instance

            //get a list of categorrie

            // This is a terminal request. Note how we start the response with END
            $response = "CON Chagua Huduma \n";
            $response .= "1. Tractors \n";
            $response .= "2. Maduka ya Mbegu \n";
            $response .= "3. Usafarishaji \n";
            $response .= "4. Machine";

        }

// Echo the response back to the API
        header('Content-type: text/plain');
        echo $response;


    }


    public function initiate_selcom_payment()
    {
        $url = "https://paypoint.selcommobile.com/v1/paymentCreate";
        $selcomData["order_id"] = "3453212134WSW";
        $selcomData["amount"] = 3600;
        $selcomData["currency"] = "TZS";
        $selcomData["payer_remarks"] = "payment now";
        $selcomData["merchant_remarks"] = "None";
        $selcomData['payer_email'] = "ericknyaluke@gmail.com";
        $selcomData["payer_phone"] = "255783262616";

        $api_key = "selcom";
        $api_secret = "ffd4fac7-4f7d-4223-8c51-709f2d56442e";
        $timestamp = gmdate("Y-m-d H:i:s");
        $api_digest = $this->getDigest($timestamp, $api_key, $api_secret);
        $request_string = json_encode($selcomData);
        //echo  $response_string = $this->postRequest($url, $request_string, $api_key, $api_digest, $timestamp);
        echo $api_digest;
    }

    // curl function to selcom server
    function postRequest($url, $request, $api_key, $api_digest, $timestamp)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_SSLVERSION, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $request);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            "Content-type: application/json", "api_key: $api_key",
            "digest: $api_digest", "request_timestamp: $timestamp"
        ));
        $response = curl_exec($ch);
        curl_close($ch);
        return $response;
    }

    // digest function
    //encrypts api  for security purpose
    function getDigest($timestamp, $api_key, $api_secret)
    {
        return md5($timestamp . $api_secret) . sha1(sha1($timestamp . $api_key . $api_secret, true));
    }


    public function fastclass()
    {
        $url = "http://www.fastclasstz.com/FastClassV1/fastclass/api";
        $api_key = "selcom";
         $api_secret = "ffd4fac7-4f7d-4223-8c51-709f2d56442e";
         $timestamp = gmdate("Y-m-d H:i:s");
         $request["code"] = 137;
         $data['first_name']= "Avatar";
         $data['middle_name']="Justin";
         $data['last_name']="NA";
         $data['email']="qwerty";
         $data['password']="123456";
         $request['data'] = $data;



        $request_string = json_encode($request);
        //echo  $response_string = $this->postRequest($url, $request_string, $api_key, $api_digest, $timestamp);

        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER,
            array("Content-type: application/json"));
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $request_string);

        $json_response = curl_exec($curl);

        $status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        curl_close($curl);
        echo $json_response;

    }


public function firebase()


{

    $server_key = "AAAAtDSCZOc:APA91bFU8QAw9LvITQduFMu_n4-GC4r3TvrVWRo4aqA_o7LQt9EIB1CgnVqbYdHrTUTuq4RVaxp7Yq7x25L_wGpGzlDnyEExGI5WnpH7dl5p6BXQMPqQsrITleadP9ksrepkxqn261KD";
    $headers = array(
        'Content-Type:application/json; UTF-8',
        'Authorization:key='.$server_key
    );
    $url = "https://fcm.googleapis.com/v1/projects/fastclass-a15b5/messages:send HTTP/1.1";

    $fields["token"] = "cplSfU4yTe4:APA91bFR4KGuHnCJpTpEqhL8-HmTtU7ccc4Nz9gvpt3BQZmngQOfGNXylMEDzFOfoqPOXbNOryuMRUpnYxghoM8BRcDGGI9ZcAQ071qjyzc6Wz1Koq2Masxg-dNm8X4EN5oKSrh4ZVnm";
     $message["message"]  = "Hello FastClass";
    $message["title"] = "Testing FastClass";
    $fields["data"] = $message;

 // fastclass-a15b5


//var_dump(json_encode($fields));


    $request_string = json_encode($fields);
    //echo  $response_string = $this->postRequest($url, $request_string, $api_key, $api_digest, $timestamp);

    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_HEADER, false);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_HTTPHEADER,
        $headers);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, "{\"registration_ids\":[\"ABC\"]}");
  //var_dump($request_string);

   $json_response = curl_exec($curl);
   // var_dump($json_response);

    $status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
    curl_close($curl);
    var_dump($status);
    echo $json_response;

}


public function firebase2(){

    define('API_ACCESS_KEY','AAAAtDSCZOc:APA91bHv5TSa5BTec7Cces9_KZuhvDUgBrw6uh9PxCsu9VU-bHnQZxfFbWa1GSGI522pOi_faLWdn9jbMmw-atYh9215fS9Xx88OCBZIkIGfoAeMomElpFOgPCm3d0tbCxteJJRmMyZI');
    $url = 'https://fcm.googleapis.com/fcm/send';

// prepare the message
    $fields["to"] = "dy79Ph9kq80:APA91bGNySu3SRZCfMSIhvTxtf3xQtxdrOta6COG2YCCn2dypS3CU_vbkAIqSdegGpIk1wZhJRReiD4YjM4qD3rYMqd3xfOvK22RCm5RXoUmdS_0bvfaI-_hyFpeeHUXdZcuSHs0BwQR";
   // $fields["to"] = "fKZ18DobUz4:APA91bE-ISYP5aF3q947LlvVGszMBj1uyLLFrUhVDRAQ7QQXizvs00vbp3l12mjUjWb3CwlX-P26kRWufMXaex4LgbnTY2qmgsBINuYR62PQZVvpDYXusg-TuXde-wSKxJKTRpOEdkt5";
    $message["message"]  = "Hello FastClass";
    $message["title"] = "Testing FastClass";
    $fields["data"] = $message;
    $headers = array(
        'Authorization: key='.API_ACCESS_KEY,
        'Content-Type: application/json'
    );
    $ch = curl_init();
    curl_setopt( $ch,CURLOPT_URL,$url);
    curl_setopt( $ch,CURLOPT_POST,true);
    curl_setopt( $ch,CURLOPT_HTTPHEADER,$headers);
    curl_setopt( $ch,CURLOPT_RETURNTRANSFER,true);
    curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER,false);
    curl_setopt( $ch,CURLOPT_POSTFIELDS,json_encode($fields));
    $result = curl_exec($ch);
    curl_close($ch);
    echo $result;
}
}

