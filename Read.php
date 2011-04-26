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
	
	

	function Read($email = false, $senha = false, $url = false)
	{
		parent::Conect($email, $senha, $url);
	}

}


?>