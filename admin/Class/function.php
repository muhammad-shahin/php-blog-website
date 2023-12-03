<?php
class CrudApp
{
    private $connection;
    public function __construct()
    {
        // we need four things to connect with my sql database
        /**
         * 1. database hostname
         * 2. database username
         * 3. database password
         * 4. database name
         */

        $dbhost = 'localhost';
        $dbuser = 'root';
        $dbpass = "";
        $dbname = 'blog_website';

        $this->connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

        if (!$this->connection) {
            die("Database Connection Error!!");
        }
    }
}
