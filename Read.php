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
	 * funcao da API a ser usada
	 * @var String
	 */
	private $function;

	/**
	 * Define se será uma leitura autenticada ou nao
	 * @var Boolean
	 */
	private $authenticated;

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

			$this->setURL($this->blog.".tumblr.com/api/".$function);
		}
	}

}


?>