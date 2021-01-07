<?php

	$url = "http://localhost/api_rest_php-master/api/v1"; //PEGANDO A URL RAIZ DA API DA FILIAL

	$classe = "estoque"; //ATRIBUINDO A STRING estoque PARA A VARIAVEL QUE SERÁ CONCATENADA COM A $url
	$metodo = "mostrar"; //ATRIBUINDO A mostrar estoque PARA A VARIAVEL QUE SERÁ CONCATENADA COM A $url E COM $classe
	$montar = $url."/".$classe."/".$metodo; //MONTANDO A URL PARA PEGAR O CONTEÚDO DELA PARA DEPOIS JOGAR TUDO NA PÁGINA DO CLIENTE

	$retorno = file_get_contents($montar); //VAI PEGAR O CONTEÚDO DA PÁGINA COM A URL DENTRO DA VARIÁVEL $montar

	var_dump(json_decode($retorno, 1)); //CONVERTENDO O JSON PARA ARRAY E EXIBINDO NA PÁGINA DE CLIENTE











































/*

	$url = 'http://localhost/api_rest_php-master/api/v1';

	$classe = 'estoque';
	$metodo = 'mostrar';

	$montar = $url.'/'.$classe.'/'.$metodo;

	$retorno = file_get_contents($montar);

	var_dump(json_decode($retorno, 1));
	*/