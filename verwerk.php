<?php
namespace OEF1;

require_once 'src/autoload.php';

use PDO;
use models\repositories\SenderRepository;

$user = "dbtest";
$password = "Test123";
$database = "examenwa2019";
$ip = "10.0.30.15";
$port = 3306;
$pdo = null;
try {
    $pdo = $pdo = new PDO("mysql:host={$ip}:{$port};dbname={$database}", $user, $password);
    $pdo->setAttribute(
        PDO::ATTR_ERRMODE,
        PDO::ERRMODE_EXCEPTION
    );
    $senderRepository=new SenderRepository($pdo);
    $result = $senderRepository->getSenderById($_GET['senderid']);
    if($result !== null){
        print "Sender met name {$result->getName()} heeft {$result->countNumberOfMessages()} berichten:";
        for($x=0; $x < $result->countNumberOfMessages(); $x++){
            print "</br>";
            print $result->getMessageByIndex($x)->getContents();
        }
    }else{
        print "111 niet gevonden!";
    }
}catch(Exception $ex){

}