<?php

$link = "https://api.lifx.com/v1beta1/lights/all/power";
$authToken = "xxxxxxxxxxxxxxxxx";

$state = htmlspecialchars($_GET["state"]);

$data = array("state" => $state);
$ch = curl_init($link);

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
curl_setopt($ch, CURLOPT_POSTFIELDS,http_build_query($data));

$headers = array('Authorization: Bearer ' . $authToken);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$response = curl_exec($ch);

echo "<html><title>testing</title><body><pre>" . $state . var_export($response);
