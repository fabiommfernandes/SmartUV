<?php
class PraiasObject
{

		public $id;
		public $nome_praia;
	
	public function __construct($id, $nome_praia) {
		$this->id = $id;
		$this->nome_praia = $nome_praia;
    }
}

?>