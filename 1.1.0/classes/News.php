<?php

/**
 * Class News
 *
 * Represents a news article entity.
 *
 * @version 1.1.0
 * @since 1.0.0
 *
 * Changelog:
 * - 1.1.0
 *   - added descriptions per attribute
 *   - added descriptions per method
 */

class News
{
	/**
	 * @var int $id The ID of the news article.
	 * @var string $title The title of the news article.
	 * @var string $body The content/body of the news article.
	 * @var string $createdAt The creation date and time of the news article.
	 */
	protected $id;
	protected $title;
	protected $body;
	protected $createdAt;

	/**
	 * Sets the ID of the news article.
	 *
	 * @param int $id The ID of the news article.
	 * @return $this
	 */
	public function setId($id)
	{
		$this->id = $id;
		return $this;
	}

	/**
	 * Gets the ID of the news article.
	 *
	 * @return int The ID of the news article.
	 */
	public function getId()
	{
		return $this->id;
	}

	/**
	 * Sets the title of the news article.
	 *
	 * @param string $title The title of the news article.
	 * @return $this
	 */
	public function setTitle($title)
	{
		$this->title = $title;
		return $this;
	}

	/**
	 * Gets the title of the news article.
	 *
	 * @return string The title of the news article.
	 */
	public function getTitle()
	{
		return $this->title;
	}

	/**
	 * Sets the body/content of the news article.
	 *
	 * @param string $body The content of the news article.
	 * @return $this
	 */
	public function setBody($body)
	{
		$this->body = $body;
		return $this;
	}

	/**
	 * Gets the body/content of the news article.
	 *
	 * @return string The content of the news article.
	 */
	public function getBody()
	{
		return $this->body;
	}

	/**
	 * Sets the creation date and time of the news article.
	 *
	 * @param string $createdAt The creation date and time of the news article.
	 * @return $this
	 */
	public function setCreatedAt($createdAt)
	{
		$this->createdAt = $createdAt;
		return $this;
	}

	/**
	 * Gets the creation date and time of the news article.
	 *
	 * @return string The creation date and time of the news article.
	 */
	public function getCreatedAt()
	{
		return $this->createdAt;
	}
}
