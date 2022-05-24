<?php 
namespace models\entities;

use models\ModelException;

class Sender{
	private $id;
	private $name;
	private $messages;

	public function getId(){
		return $this->id;
	}

	public function getName(){
		return $this->name;
	}

	private function __construct(int $id, string $name){
		if($id <= 0){
			throw new ModelException("Id must be bigger then 0!");
		}else{
			$this->id = $id;
		}

		if($name == ""){
			throw new ModelException("Contents cannot be empty!");
		}
		else{
			$this->name = $name;
		}

		$message = array();
	}

	public static function make(int $id, string $name){
		return new Sender($id, $name);
	}

	public function addMessage(Message $message){
		$this->messages[] = $message;
	}

	public function countNumberOfMessages(){
		return count($this->messages);
	}

	public function getMessageByIndex(int $x){
		return $this->messages[$x];
	}
}
