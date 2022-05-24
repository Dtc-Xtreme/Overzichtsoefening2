<?php 
namespace models\entities;

use models\ModelException;

class Message{
	private $id;
	private $contents;

	public function getId(){
		return $this->id;
	}

	public function getContents(){
		return $this->contents;
	}

	function __construct(int $id, string $contents){
		if($id <= 0){
			throw new ModelException("Id must be bigger then 0!");
		}
 		else{
			$this->id = $id;
		}

		if($contents == ""){
			throw new ModelException("Contents cannot be empty!");
		}
 		else{
			$this->contents = $contents;
		}
	}

	public function __toString(){
		return $this->getId() . ": " . $this->getContents();
	}

	public static function make(int $id, string $msg){
		return new Message($id, $msg);
	}
}