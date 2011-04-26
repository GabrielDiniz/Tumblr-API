<?php


/**
 * @author gabriel
 * Faz as requisições POST com a libCurl
 *
 */
class Conect  
{

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
	 * URL da requisição
	 * @var unknown_type
	 */
	private $url;
	
	/**
	 * Handler para usar a libCurl
	 * @var CurlHandler
	 */
	private $ch;

	/**
	 * Resultado da requisição
	 * @var String
	 */
	private $result;
	
	/**
	 * Construtor da classe
	 * @param String $email
	 * @param String $senha
	 */
	function Conect($email,$senha,$url=false) 
	{
		$this->email = $email;
		$this->senha = $senha;
		$this->initCurl($url);
		
	}

	/**
	 * Define as configurações padrão pra $ch 
	 */
	function initCurl($url = false) 
	{
		$this->ch = curl_init($url);
		$this->setReturnTransfer();
		$this->setPost();
	}

	/**
	 * Define se o retorno da requisicao sera exibido ou não 
	 * @param Boolean $value
	 */
	function setReturnTransfer($value = true) 
	{
		curl_setopt($this->ch, CURLOPT_RETURNTRANSFER, $value);
	}
	
	/**
	 * Define se será uma requisição POST ou não
	 * @param Boolean $value
	 */
	function setPost($value = true) 
	{
		curl_setopt($this->ch, CURLOPT_POST, $value);
	}
	
	/**
	 * Define os campos a serem enviados numa requisição POST
	 * @param Array() $fields
	 */
	function setPostFields($fields) 
	{
		curl_setopt($this->ch, CURLOPT_POSTFIELDS, $fields);
	}
	
	function setURL($url)
	{
		curl_setopt($this->ch, CURLOPT_URL, $url);
	}
	/**
	 * Executa e retorna o resultado da requisicao
	 * @return String
	 */
	function exec() 
	{
		$this->result = curl_exec($this->ch);
		return $this->result;
	}
	
	/**
	 * Obtém o codigo de retorno da requisição 
	 */
	function infoHttpCode() 
	{
		return curl_getinfo($this->ch, CURLINFO_HTTP_CODE);
	}
}


?>