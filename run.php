<?php

include 'API.php';

$api = new API;
$api->result();
// echo 'Please input number of participants (0 - 8): ' . PHP_EOL;
// $numberParticipants = readline();

// function typeRest() {
//     $typeRestArray = ["education", "recreational", "social", "diy", "charity", "cooking", "relaxation", "music", "busywork"];
//     echo 'Please input type of rest ("education", "recreational", "social", "diy", "charity", "cooking", "relaxation", "music", "busywork"): ' . PHP_EOL;
//     $typeRest = readline();
//     if (in_array($typeRest, $typeRestArray)) {
//         return $typeRest;
//     }

//     typeRest();
// }
// typeRest();

// echo 'Please input method of sending the message ("file", "console"): ' . PHP_EOL;
// $method = readline();

// $contents = file_get_contents('http://www.boredapi.com/api/activity?participants=' . $numberParticipants . '&type=' . typeRest());
// $json = json_decode($contents);
// $result = '';

// foreach ($json as $key => $value) {
//     if ($key !== 'error') {
//         $result .= $key . ': ' . $value . PHP_EOL;
//     } else {
//         $result .= $value;
//     }    
// }

// $dir = 'files';
// if (!is_dir($dir)) {
//     mkdir($dir);
// }
// $file = $dir . DIRECTORY_SEPARATOR . 'result-' . time() . '.txt';
// file_put_contents($file, $result);

// echo $result;
