#!/bin/php
<?php
// Coded By t.me/ItsHesamHoseini - t.me/LinuxTV_ir

if (version_compare(PHP_VERSION, '8.0.0', '<')) {
    // Display a message and exit
    echo "This script requires PHP version 8.0.0 or higher. You are running version " . PHP_VERSION . ".";
    exit;
}
try {
    $ch = curl_init();
} catch (Exception $e) {
    echo "I Think PHP-cURL Not installed on your system!". PHP_EOL;
}
// -----------------------------
// Disable display errors and logs!
ini_set('display_errors', 0);
error_reporting(0);
// -----------------------------
// require Zone!
require_once("../src/hamster.php");
// -----------------------------
/*
 * You can put your token manual in $token variable!
 */
$token='';
// -----------------------------
/*
 * You can put your token :
 * root@itshesamhoseini:~/hamster$ ./example.php
 * OR
 * root@itshesamhoseini:~/hamster$ php example.php
 * GET https://YOUR_DOMAIN/hamster/example.php?token=YOUR_TOKEN
 * POST https://YOUR_DOMAIN/hamster/example.php Payload : {'token'=>YOUR_TOKEN}
 */
if(isset($argv[1]))
{
    $token=$argv[1];
}
elseif(isset($_GET['token'])){
    $token=$_GET['token'];
}
elseif(isset($_POST['token'])){
    $token=$_GET['token'];
}
// -----------------------------
$miner=new Hamster($token);
$miner->get_daily_coins();//get daily coin!
$miner->AutomaticMiner();// Enjoy! run this code on your personal system or server

