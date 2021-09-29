<?php
/**
 *
 */

class Conexion
{
	static public function conectar(){
		// $link = new PDO("mysql:host=127.0.0.1;dbname=cartas","forge","fgIg28u3smG0TXCUU5nd");
		$link = new PDO("mysql:host=localhost;dbname=cartas","root","martin07081988");
		$link->exec("set names utf8");
		$link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		return $link;
	}

}