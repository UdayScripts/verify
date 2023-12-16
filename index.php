<?php
error_reporting(0);

$mid = $_GET['mid'];
$id = $_GET['id'];
$url = "https://securegw.paytm.in/merchant-status/getTxnStatus";

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$headers = 'content-type: application/x-www-form-urlencoded; charset=UTF-8';
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

$data = "JsonData=%7B%22MID%22%3A%22$mid%22%2C%22ORDERID%22%3A%22$id%22%7D";
curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

// for debug only!
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

$resp = curl_exec($curl);
curl_close($curl);

// Echo the entire JSON response
echo $resp;
?>
