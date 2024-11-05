<?php

/**
 * index.php
 *
 * @version 1.1.0
 * @since 1.0.0
 * 
 * Changelog:
 * - 1.1.0
 *   - use htmlspecialchars in outputs to allow for special characters and html tags; and, sanitize data
 *   - re-organized flow for better code readability and maintainability
 */

define('ROOT', __DIR__);
require_once(ROOT . '/utils/NewsManager.php');
require_once(ROOT . '/utils/CommentManager.php');

// Initialize managers with dependency injection
$newsManager = new NewsManager();
$commentManager = new CommentManager();

// Display news and related comments
foreach ($newsManager->listNews() as $news) {
    echo "############ NEWS " . htmlspecialchars($news->getTitle()) . " ############ \n";
    echo htmlspecialchars($news->getBody()) . "\n";

    // Display comments associated with each news article
    foreach ($commentManager->listComments($news->getId()) as $comment) {
        echo "Comment " . $comment->getId() . " : " . htmlspecialchars($comment->getBody()) . "\n";
    }
}
