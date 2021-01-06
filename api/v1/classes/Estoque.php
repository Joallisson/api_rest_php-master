<?php

class Estoque{ //CRIANDO A CLASSE

	public static function mostrar() //CRIANDO O MÉTODO
	{
		$con = new PDO('mysql: host=localhost, dbname=estoque', 'root', ''); //CRIANDO A CONEXÃO COM O DB

		$sql = "SELECT * FROM estoque ORDER BY id ASC"; //CRIANDO UM SCRIPM SQL E JOGANDO DENTRO DA VARIÁVEL
		$sql = $con->prepare($sql); //PREPARANDO O SCRIPT SQL E PARA JOGAR NA VARIÁVEL
		$sql->execute(); // EXECUTANDO O SCRIPT DA CONSULTA

		$resultados = array(); //CRIANDO UM ARRAY

		while ($row = $sql->fetch(PDO::FETCH_ASSOC)) { //ENQUANTO HOUVER RETORNO DE DADOS | fetch(): Retorna uma unica row da consulta E O PDO::FETCH_ASSOC SERVE PARA RETORNA SOMENTE 1 CAMPO NO RETORNO PARA A VARIÁVEL
			$resultados[] = $row; //A VARIÁVEL $resultados  IRÁ RECEBER O RETORNO DOS DADOS DA VARIÁVEL $row
		}

		if (!$resultados) { //SENÃO TIVER RESULTADOS
			throw new Exception("Nenhum produto no estoque!"); //EXIBE UMA MENSAGEM DE ERRO
		}

		return $resultados; //RETORNO DE DADOS
	}
}




















































/*
	class Estoque
	{
		public function mostrar()
		{
			$con = new PDO('mysql: host=locahost; dbname=estoque;','root','');

			$sql = "SELECT * FROM produtos ORDER BY id ASC";
			$sql = $con->prepare($sql);
			$sql->execute();

			$resultados = array();

			while($row = $sql->fetch(PDO::FETCH_ASSOC)) {
				$resultados[] = $row;
			}

			if (!$resultados) {
				throw new Exception("Nenhum pruduto no estoque!");
			}
			
			return $resultados;
		}
	}
	*/