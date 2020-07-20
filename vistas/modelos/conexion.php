<?php

class Conexion{

	public function conectar(){

		$link = new PDO("mysql:host=167.172.159.41;dbname=kardex",
			            "root",
			            "12345678");

		$link->exec("set names utf8");

		return $link;

	}

}