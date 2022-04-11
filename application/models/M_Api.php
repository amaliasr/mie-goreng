<?php


defined('BASEPATH') or exit('No direct script access allowed');

class M_Api extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        //Do your magic here
        $this->curl = curl_init();
    }
    public function getMLAccountData($userid, $zoneid)
    {
        $postField = json_encode(
            [
                'voucherPricePoint.id' => 4153,
                'voucherPricePoint.price' => 8360.0,
                'voucherPricePoint.variablePrice' => 0,
                'email' => 'test@gmail.com',
                'user.userId' => $userid,
                'user.zoneId' => $zoneid,
                'voucherTypeName' => "MOBILE_LEGENDS",
                "shopLang" => "id_ID",
                "checkoutId" => "b8c547c1-4868-4558-9bff-778c0c1340ed",
                "anonymousId" => "7c86ae49-8a1e-4407-9b7e-1b317202d999"
            ]
        );
        curl_setopt_array($this->curl, [
            CURLOPT_URL => "https://order.codashop.com/id/initPayment.action",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_HTTPHEADER => array('Content-Type:application/json', 'charset=UTF-8'),
            CURLOPT_POSTFIELDS => $postField
        ]);
        $response = curl_exec($this->curl);
        $err = curl_error($this->curl);
        curl_close($this->curl);
        if ($err) {
            return "cURL Error #:" . $err;
        } else {
            return json_decode($response, true);
        }
    }
}

/* End of file M_Api.php */
