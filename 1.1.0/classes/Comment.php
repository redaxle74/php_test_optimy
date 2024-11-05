<?php

/**
 * Class Comment
 *
 * Represents a comment entity associated with a news article.
 *
 * @version 1.1.0
 * @since 1.0.0
 *
 * Changelog:
 * - 1.1.0
 *   - added descriptions per attribute
 *   - added descriptions per method
 */

class Comment
{
	/**
	 * @var int $id The ID of the comment.
	 * @var string $body The content of the comment.
	 * @var string $createdAt The creation date and time of the comment.
	 * @var int $newsId The ID of the news article associated with the comment.
	 */
	protected $id;
	protected $body;
	protected $createdAt;
	protected $newsId;

	/**
	 * Sets the ID of the comment.
	 *
	 * @param int $id The ID of the comment.
	 * @return $this
	 */
	public function setId($id)
	{
		$this->id = $id;
		return $this;
	}

	/**
	 * Gets the ID of the comment.
	 *
	 * @return int The ID of the comment.
	 */
	public function getId()
	{
		return $this->id;
	}

	/**
	 * Sets the body/content of the comment.
	 *
	 * @param string $body The content of the comment.
	 * @return $this
	 */
	public function setBody($body)
	{
		$this->body = $body;
		return $this;
	}

	/**
	 * Gets the body/content of the comment.
	 *
	 * @return string The content of the comment.
	 */
	public function getBody()
	{
		return $this->body;
	}

	/**
	 * Sets the creation date and time of the comment.
	 *
	 * @param string $createdAt The creation date and time of the comment.
	 * @return $this
	 */
	public function setCreatedAt($createdAt)
	{
		$this->createdAt = $createdAt;
		return $this;
	}

	/**
	 * Gets the creation date and time of the comment.
	 *
	 * @return string The creation date and time of the comment.
	 */
	public function getCreatedAt()
	{
		return $this->createdAt;
	}

	/**
	 * Gets the ID of the news article associated with the comment.
	 *
	 * @return int The ID of the associated news article.
	 */
	public function getNewsId()
	{
		return $this->newsId;
	}

	/**
	 * Sets the ID of the news article associated with the comment.
	 *
	 * @param int $newsId The ID of the associated news article.
	 * @return $this
	 */
	public function setNewsId($newsId)
	{
		$this->newsId = $newsId;
		return $this;
	}
}
