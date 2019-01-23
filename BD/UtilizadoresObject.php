<?php
class UtilizadoresObject
{

		public $id;
		public $nome_utilizador;
	
	public function __construct($id, $nome_utilizador) {
		$this->id = $id;
		$this->nome_utilizador = $nome_utilizador;
    }
}

?>