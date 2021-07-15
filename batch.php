
<?php

$filepath = "newresume.zip";
$handle = fopen($filepath, "r");
$contents = fread($handle, filesize($filepath));
fclose($handle);

//encode to base64
$base64str = base64_encode($contents);

$payload = array(
    "ZipAsBase64String" => "$base64str",

);

$url = "http://149.28.197.77/api/v1/cvparser/batch";

$curl = curl_init();

curl_setopt($curl, CURLOPT_POST, 1);
curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($payload));

curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

$headers = array(

    "username" => "mark-abbot",
    "api-token" => "ab8a7ff7-6659-4a44-b7d9-064612d825fa",
);

curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

$result = curl_exec($curl);
curl_close($curl);

echo $result;
