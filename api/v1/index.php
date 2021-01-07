<?php

header('Content-Type: application/json; charset=utf-8'); //Esta dizendo para o navegador que será usado o json

require_once 'classes/Estoque.php'; //Importando a classe Estoque

class Rest //Classe Rest
{
	public static function open($requisicao) //Método open
	{
		$url = explode('/', $requisicao['url']); //Essa linha de código, quebra em vários pedaços, a requisição do tipo GET que é passada na URL. O corte da string da requisição é feito sempre que aparaece o "/"		

		$classe = ucfirst($url[0]); //Está pegando o primeiro pedaço da string e jogando dentro da variável $classe| a função ucfirst() deixa a primeira letra maiúscula
		array_shift($url); //Está removendo o valor da primeiro posição do vetor $url

		$metodo = $url[0]; //Está pegando o primeiro pedaço da string e jogando dentro da variável $metodo
		array_shift($url); //Está removendo o valor da primeiro posição do vetor $url

		$parametros = array(); //Está criando uma nova variavél e colocando uma variavél dentro dela
		$parametros = $url; //Está passando os parâmetros da $url para a variavel

		try { //Vai tentar executar os comando abaixo
			if (class_exists($classe)) { //Se a classe existe
				if (method_exists($classe, $metodo)) { //Se existe o metodo dentro classe Mãe
					$retorno = call_user_func_array(array(new $classe, $metodo), $parametros); //Criando o objeto chamdo de classe, para que possa ser usado o metódo e os parâmetros e que no final sejam introduzidos na variavel retorno
	
					return json_encode(array('status' => 'Sucesso', 'message' => $retorno)); //Se der certo vai mretornar os dados corretamente
				}else{
					return json_encode(array('status' => 'error', 'message' => 'O método não existe')); //Senão existir a API vai mandar um array com mensagens de erros
				}
			} else {
				return json_encode(array('status' => 'error', 'message' => 'A classe não existe')); //Senão existir a API vai mandar um array com mensagens de erros
			}
		} catch (\Throwable $e) { //Se der algum erro, a mensagem irá para a variável $e apara que depois ela possa ser usada
			return json_encode(array('status' => 'error', $e->getMessage())); //Vai pegar a mensagem de error e retorna-la

			echo "Deu erro";
		}
		
		
	}

}


if (isset($_REQUEST)) { //Se houver requisição
	
	 echo Rest::open($_REQUEST); //Chama o método open() da classe Rest criada logo acima
} 



























































/*
header('Content-Type: application/json; charset=utf-8');

require_once 'classes/Estoque.php';

class Rest
{
	public static function open($requisicao)
	{
		$url = explode('/', $requisicao['url']);
		
		$classe = ucfirst($url[0]);
		array_shift($url);

		$metodo = $url[0];
		array_shift($url);

		$parametros = array();
		$parametros = $url;

		try {
			if (class_exists($classe)) {
				if (method_exists($classe, $metodo)) {
					$retorno = call_user_func_array(array(new $classe, $metodo), $parametros);

					return json_encode(array('status' => 'sucesso', 'dados' => $retorno));
				} else {
					return json_encode(array('status' => 'erro', 'dados' => 'Método inexistente!'));
				}
			} else {
				return json_encode(array('status' => 'erro', 'dados' => 'Classe inexistente!'));
			}	
		} catch (Exception $e) {
			return json_encode(array('status' => 'erro', 'dados' => $e->getMessage()));
		}
		
	}
}


if (isset($_REQUEST)) {
	echo Rest::open($_REQUEST);
}
*/