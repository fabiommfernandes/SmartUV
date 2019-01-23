<?php
class SensorObject
{

		public $id;
		public $nome_sensor;
	
	public function __construct($id, $nome_sensor) {
		$this->id = $id;
		$this->nome_sensor = $nome_sensor;
    }
}

?>