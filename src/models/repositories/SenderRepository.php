<?php 
namespace models\repositories;

use PDO;
use models\entities\Sender;
use models\entities\Message;
use models\ModelException;

class SenderRepository extends Repository{

	public function __construct(PDO $pdo){
		parent::__construct($pdo);
	}

	public function getSenderById(int $id){
		try{
			$sql = "SELECT sender.name, message.id, message.contents FROM sender, message
					WHERE sender.id = message.sender_id and sender.id=?";
			$statement = $this->pdo->prepare($sql);
			$statement->bindParam(1, $id, PDO::PARAM_INT);
			$statement->execute();
			$result = $statement->fetchAll(PDO::FETCH_ASSOC);
			if(count($result) !== 0){
				$sender = Sender::make($id, $result[0]["name"]);
				foreach($result as $line){
					$sender->addMessage(Message::make($line["id"], $line["contents"]));
				}
				return $sender;
			}else{
				return null;
			}
		}catch(PDOException $ex){
			throw new ModelException("Error with PDO!");
			return null;
		}
	}
}
