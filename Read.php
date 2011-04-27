<?php


/**
 * @author gabriel
 * Realiza a leitura de blogs
 *
 */
class Read extends Conect
{
	/**
	 * O blog a ser lido
	 * @var String
	 */
	private $blog;

	/**
	 * Funcao da API a ser usada
	 * @var String
	 */
	private $function;

	/**
	 * Define se será uma leitura autenticada ou nao
	 * @var Boolean
	 */
	private $authenticated;
	
	/**
	 * Registro inicial a ser buscado
	 * @var Integer
	 */
	private $start;

	/**
	 * Número de regidtros a ser buscado
	 * @var unknown_type
	 */
	private $num;
	
	/**
	 * Array com os campos a serem enviados vis POST
	 * @var Array()
	 */
	private $fields;
	/**
	 * @param String $blog
	 * @param String $function
	 */
	function Read($blog,$function)
	{
		parent::Conect();
		$this->blog = $blog;
		$this->function = $function;

		if (in_array($this->function, array('dashboard','likes','read-authenticated'))) {
			$this->setPost(true);
			$this->authenticated = true;
			if ($this->function === 'read-authenticated') {
				$function = 'read';
			}

			if ($this->function === 'dashboard') {
				$this->blog = 'www';
			}

			
		}
		$this->setURL($this->blog.".tumblr.com/api/".$function);
	}

	function credenciais($email,$senha) {
		$this->setEmail($email);
		$this->setSenha($senha);
	}
	
	
	function exec(){
		if ($this->authenticated) {
			$this->setPostFields($this->fields);
			return simplexml_load_string(parent::exec());			
		}
		else {
			
			return simplexml_load_file($this->getUrl()."?".http_build_query($this->fields));
		}
	}
	
	function setField($field, $value) {
		$this->fields[$field] = $value;
	}
	
}


?>