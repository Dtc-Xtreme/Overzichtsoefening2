<?php
namespace OEF1;

require_once 'src/autoload.php';

use PDO;
use models\entities\Message;
use models\entities\Sender;
use models\repositories\SenderRepository;

$user = "dbtest";
$password = "Test123";
$database = "examenwa2019";
$ip = "10.0.30.15";
$port = 3306;

try{
    //$message = Message::make(1, "Help mij aub!");
    //$sender = Sender::make(1,"tim");
    //$sender->addMessage($message);
    //print $sender->countNumberOfMessages();
    //print $sender->getMessageByIndex(0)->getContents();
    $pdo = new PDO("mysql:host={$ip}:{$port};dbname={$database}", $user, $password);
    $senderRepo = new SenderRepository($pdo);
    $test = $senderRepo->getSenderById(1);
    print_r($test);
}catch(Exception $ex){
    print $ex->getMessage();
}

?>