<?php
 include_once 'Read.php';

/**
 * @author gabriel
 *
 *
 */
class Post  {
	
	/**
	 * ID do Post
	 * @var Integer
	 */
	private $postId;
	
	/**
	 * Blog que postou
	 * @var String
	 */
	private $blog;
	
	/**
	 * Tipo de post 
	 * @var String
	 */
	private $type;

	/**
	 * Identificador da API
	 * @var String
	 */
	private $generator;

	/**
	 * Data da postagem
	 * @var String
	 */
	private $date;

	/**
	 * @var Integer
	 */
	private $private;

	/**
	 * @var String
	 */
	private $tags;

	/**
	 * @var String
	 */
	private $format;

	/**
	 * Outros Blogs da mesma conta
	 * @var String
	 */
	private $group;

	/**
	 * @var String
	 */
	private $slug;

	/**
	 * @var String
	 */
	private $state;

	/**
	 * @var String
	 */
	private $sendToTwitter;

	/**
	 * @param String $email
	 * @param String $senha
	 * @param String $url
	 */
	function Post($postId = false,$blog = false)
	{
		if ($postId) {
			$post = new Read($blog,'read');
			$post->setField('id', $postId);
			$post = $post->exec()->posts->post;
			$this->postId = $postId;
			$this->blog = $blog;
			$this->date = (string)$post->attributes()->date;
			$this->format = (string)$post->attributes()->format;
			$this->generator = (string)$post->attributes()->generator;
			$this->group = (string)$post->attributes()->group;
			$this->private = (string)$post->attributes()->private;
			$this->sendToTwitter = (string)$post->attributes()->{'send-to-twitter'};
			$this->slug = (string)$post->attributes()->slug;
			$this->state = (string)$post->attributes()->state;
			$this->type = (string)$post->attributes()->type;
			foreach ($post->tag as $value) {
				$this->tags[] = (string)$value;
			}
			return $post;
		}
	}
	
	function setType($type)
	{
		$this->type = $type;
	}
	
	function getType()
	{
		return $this->type;
	}
	
	function setGenerator($generator)
	{
		$this->generator = $generator;
	}
	
	function getGenerator()
	{
		return $this->generator;
	}

	function setDate($date)
	{
		$this->date = $date;
	}

	function getDate()
	{
		return $this->date;
	}
	
	function setPrivate($private)
	{
		$this->private = $private;
	}
	
	function getPrivate()
	{
		return $this->private;
	}

	function setTags($tags)
	{
		$this->tags = $tags;
	}
	
	function getTags()
	{
		return $this->tags;
	}
	
	function setFormat($format)
	{
		$this->format = $format;
	}
	
	function getFormat()
	{
		return $this->format;
	}

	function setGroup($group)
	{
		$this->group = $group;
	}
	
	function getGroup()
	{
		return $this->group;
	}
	
	function setSlug($slug)
	{
		$this->slug = $slug;
	}
	
	function getSlug()
	{
		return $this->slug;
	}
	
	function setState($state)
	{
		$this->state = $state;
	}
	
	function getState()
	{
		return $this->state;
	}
	
	function setSendToTwitter($sendToTwitter)
	{
		$this->sendToTwitter = $sendToTwitter;
	}	
	
}
?>