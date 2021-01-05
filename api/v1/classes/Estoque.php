<?php





















































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