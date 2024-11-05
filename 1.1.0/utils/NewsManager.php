<?php

/**
 * Class NewsManager
 *
 * Handles all news articles.
 *
 * @version 1.1.0
 * @since 1.0.0
 *
 * Changelog:
 * - 1.1.0
 *   - the DB instance is now an injectable dependency.
 *   - the addCommentForNews method now uses a prepared statement to prevent SQL injection.
 *   - each method now has comments describing its functionality.
 */

require_once(ROOT . '/utils/DB.php');
require_once(ROOT . '/classes/News.php');

class NewsManager
{
    private $db;

    public function __construct($db = null)
    {
        // Dependency Injection: Allow injecting a DB instance, default to singleton if not provided
        $this->db = $db ?: DB::getInstance();
    }

    /**
     * List all news
     * @return array Array of News objects
     */
    public function listNews()
    {
        $rows = $this->db->select('SELECT * FROM `news`');
        $newsList = [];
        foreach ($rows as $row) {
            $news = new News();
            $newsList[] = $news->setId($row['id'])
                ->setTitle($row['title'])
                ->setBody($row['body'])
                ->setCreatedAt($row['created_at']);
        }
        return $newsList;
    }

    /**
     * Add a new news article
     * @param string $title
     * @param string $body
     * @return int The ID of the newly inserted news
     */
    public function addNews($title, $body)
    {
        $sql = "INSERT INTO `news` (`title`, `body`, `created_at`) VALUES (?, ?, ?)";
        $this->db->exec($sql, [$title, $body, date('Y-m-d')]);
        return $this->db->lastInsertId();
    }

    /**
     * Delete a news article by its ID
     * @param int $newsId
     * @return int The number of affected rows (should be 1 if successful, 0 if not found)
     */
    public function deleteNews($newsId)
    {
        $sql = "DELETE FROM `news` WHERE `id` = ?";
        return $this->db->exec($sql, [$newsId]);
    }
}
