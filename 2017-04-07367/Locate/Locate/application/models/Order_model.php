<?php
/**
 * Created by PhpStorm.
 * User: erickjustin
 * Date: 30/11/2018
 * Time: 19:50
 */


class Order_model extends CI_Model{


    public function create_order($data){
         // create a unique order id
         // and add it to the array
        $data["order_id"] = md5(substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 10));
        // create a database query
        $query = $this->db->insert("orders",$data);
        if ($query == true){
            $res['code'] = 200;
            $res['response'] = json_decode($this->initiate_selcom_payment($data));
            $response = json_encode($res);
            return $response;
        } else {
            $res['code'] = 300;
            $res['msg'] = "something went wrong";
            $response = json_encode($res);
            return $response;
        }
        }

        // function to prepare all
    // data variables for server
        public function initiate_selcom_payment($data){
         $url =  "https://api.selcommobile.com/v1/paymentCreate";
         $selcomData["order_id"] = $data["order_id"];
         $selcomData["amount"] = $data["amount"];
         $selcomData["currency"] = "TZS";
         $selcomData["payer_remarks"] = "Initiating Payment for Item Rental";
         $selcomData["merchant_remarks"] = "Rental payment";
         $selcomData['payer_email'] = "ericknyaluke@gmail.com";
        $selcomData["payer_phone"] = "255783262616";

         $api_key = "selcom";
         $api_secret = "ffd4fac7-4f7d-4223-8c51-709f2d56442e";
         $timestamp = gmdate("Y-m-d H:i:s");
         $api_digest = $this->getDigest($timestamp, $api_key, $api_secret);
         $request_string = json_encode($selcomData);

         return $response_string = $this->postRequest($url, $request_string, $api_key, $api_digest, $timestamp);
         }

         // curl function to selcom server
    function postRequest($url, $request, $api_key, $api_digest, $timestamp)
    { $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_SSLVERSION,1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $request);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            "Content-type: application/json", "api_key: $api_key",
            "digest: $api_digest", "request_timestamp: $timestamp"
        ));
        $response = curl_exec($ch); curl_close($ch);
        return $response; }

   // digest function
    //encrypts api  for security purpose
    function getDigest($timestamp, $api_key, $api_secret) {
        return md5($timestamp . $api_secret) . sha1(sha1($timestamp . $api_key . $api_secret, true)); }










}