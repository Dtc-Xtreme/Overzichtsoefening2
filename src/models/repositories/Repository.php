<?php 
namespace models\repositories;

use PDO;

class Repository{
	protected PDO $pdo;

	public function __construct(PDO $pdo){
		$this->pdo = $pdo;
		$this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	}
}
?>