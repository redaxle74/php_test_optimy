<?php

/**
 * Class CommentManager
 *
 * Handles all news comments.
 *
 * @version 1.1.0
 * @since 1.0.0
 *
 * Changelog:
 * - 1.1.0
 *   - the DB instance is now an injectable dependency.
 *   - the addCommentForNews method now uses a prepared statement to prevent SQL injection.
 *   - each method now has comments describing its functionality.
 *   - added $newsId parameter to the listComments method; filters the query to 
 *     fetch comments for a single news article only
 */

require_once(ROOT . '/utils/DB.php');
require_once(ROOT . '/classes/Comment.php');

class CommentManager
{
    private $db;

    public function __construct($db = null)
    {
        $this->db = $db ?: DB::getInstance();
    }

    /**
     * List all comments for a news article
     * @param int $newsId
     * @return array Array of Comment objects
     */
    public function listComments($newsId)
    {
        $rows = $this->db->select("SELECT * FROM `comment` WHERE `news_id` = ?", [$newsId]);
        $comments = [];
        foreach ($rows as $row) {
            $comment = new Comment();
            $comments[] = $comment->setId($row['id'])
                ->setBody($row['body'])
                ->setCreatedAt($row['created_at'])
                ->setNewsId($row['news_id']);
        }
        return $comments;
    }

    /**
     * Add a new comment for a specific news article
     * @param string $body
     * @param int $newsId
     * @return int The ID of the newly inserted comment
     */
    public function addCommentForNews($body, $newsId)
    {
        $sql = "INSERT INTO `comment` (`body`, `created_at`, `news_id`) VALUES (?, ?, ?)";
        $this->db->exec($sql, [$body, date('Y-m-d'), $newsId]);
        return $this->db->lastInsertId();
    }

    /**
     * Delete a comment by its ID
     * @param int $commentId
     * @return int The number of affected rows (should be 1 if successful, 0 if not found)
     */
    public function deleteComment($commentId)
    {
        $sql = "DELETE FROM `comment` WHERE `id` = ?";
        return $this->db->exec($sql, [$commentId]);
    }
}
