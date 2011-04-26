<?php


/**
 * @author gabriel
 * Faz as requisições POST com a libCurl
 *
 */
class Conect  {
	
	/**
	 * Email usado para criar a conta no tumblr
	 * @var String
	 */
	private $email;
	
	/**
	 * Senha para autenticação
	 * @var String
	 */
	private $senha;

	/**
	 * Construtor da classe
	 * @param String $email
	 * @param String $senha
	 */
	function Conect($email,$senha) {
		
		$this->email = $email;
		$this->senha = $senha;
		
	}
}


?>