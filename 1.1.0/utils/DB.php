<?php

/**
 * Class DB
 *
 * Singleton database connection class using PDO.
 * Provides methods for running SQL queries and accessing database records.
 *
 * @version 1.1.0
 * @since 1.0.0
 *
 * Changelog:
 * - 1.1.0
 *   - methods now support prepared statements, reducing the risk of SQL injection.
 *   - added error handling for the database connection.
 *   - re-organized code structure to improve readability.
 */

class DB
{
    private $pdo;

    private static $instance = null;

    /**
     * DB constructor.
     *
     * Initializes a PDO connection using environment variables for configuration.
     * If environment variables are not set, defaults are used.
     *
     * @throws \Exception If there is a database connection error.
     */
    private function __construct()
    {
        // if ran in web-server environment, use environment variables for database configuration
        $dsn = getenv('DB_DSN') ?: 'mysql:dbname=phptest;host=127.0.0.1';
        $user = getenv('DB_USER') ?: 'root';
        $password = getenv('DB_PASS') ?: 'pass';

        try {
            $this->pdo = new \PDO($dsn, $user, $password);
            $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        } catch (\PDOException $e) {
            throw new \Exception("Database connection error: " . $e->getMessage());
        }
    }

    /**
     * Retrieves the singleton instance of the DB class.
     *
     * @return self The singleton instance of the DB class.
     */
    public static function getInstance()
    {
        if (null === self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    /**
     * Executes a SELECT query and returns the result set as an associative array.
     *
     * @param string $sql The SQL SELECT statement to execute.
     * @param array $params Optional parameters to bind to the SQL statement.
     *
     * @return array The result set as an associative array.
     */
    public function select($sql, $params = [])
    {
        $sth = $this->pdo->prepare($sql);
        $sth->execute($params);
        return $sth->fetchAll(\PDO::FETCH_ASSOC);
    }

    /**
     * Executes an SQL statement (INSERT, UPDATE, DELETE) and returns the number of affected rows.
     *
     * @param string $sql The SQL statement to execute.
     * @param array $params Optional parameters to bind to the SQL statement.
     *
     * @return int The number of rows affected by the executed statement.
     */
    public function exec($sql, $params = [])
    {
        $sth = $this->pdo->prepare($sql);
        $sth->execute($params);
        return $sth->rowCount();
    }

    /**
     * Retrieves the ID of the last inserted row.
     *
     * @return int The ID of the last inserted row.
     */
    public function lastInsertId()
    {
        return $this->pdo->lastInsertId();
    }
}
