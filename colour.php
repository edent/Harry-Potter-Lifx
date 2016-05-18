<?php

$link = "https://api.lifx.com/v1/lights/all/state";
$authToken = "";

$colour = htmlspecialchars($_GET["colour"]);
if ($colour == "rainbow") {
   for ($i = 1; $i <= 20; $i++) {
      $colour = "#" . dechex(rand(0x000000, 0xFFFFFF));
      $data = array("color" => $colour, "duration" => "0.2");
      $ch = curl_init($link);

      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
      curl_setopt($ch, CURLOPT_POSTFIELDS,http_build_query($data));

      $headers = array('Authorization: Bearer ' . $authToken);
      curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

      $response = curl_exec($ch);
   }
}
else {
   $data = array("color" => $colour, "duration" => "0.5");
   $ch = curl_init($link);

   curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
   curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
   curl_setopt($ch, CURLOPT_POSTFIELDS,http_build_query($data));

   $headers = array('Authorization: Bearer ' . $authToken);
   curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

   $response = curl_exec($ch);
}
