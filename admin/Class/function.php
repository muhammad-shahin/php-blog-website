<?php
class BlogSiteAdmin
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

    // admin login
    public function admin_login($data)
    {
        $admin_email = $data['admin_email'];
        $admin_pass = md5($data['admin_pass']);

        // Using prepared statements to prevent SQL injection
        $query = "SELECT * FROM admin_info WHERE admin_email=? AND  admin_pass=?";

        // method to prepare the statement
        $stmt = mysqli_prepare($this->connection, $query);
        mysqli_stmt_bind_param($stmt, "ss", $admin_email, $admin_pass);

        if (mysqli_stmt_execute($stmt)) {
            $admin_info = mysqli_stmt_get_result($stmt);
            $admin_data = mysqli_fetch_assoc($admin_info);

            if ($admin_data) {
                // valid login, set session variables and return true
                session_start();
                $_SESSION['adminID'] = $admin_data['id'];
                $_SESSION['admin_name'] = $admin_data['admin_name'];
                return true;
            } else {
                // invalid login, return false
                return "Invalid Login Credentials";
            }
        } else {
            // statement execution failed, return false
            return "Login Error! Check SQL Codes!";
        }
    }

    public function admin_logout()
    {
        unset($_SESSION['adminID']);
        unset($_SESSION['adminName']);

        header("location: index.php");
    }

    // add new category
    public function add_cat($data)
    {
        $cat_name = $data['cat_name'];
        $cat_desc = $data['cat_desc'];

        // using prepared statements to prevent SQL injection
        $query = "INSERT INTO category (cat_name, cat_desc) VALUES (?, ?)";

        // method to prepare the statement
        $stmt = mysqli_prepare($this->connection, $query);
        mysqli_stmt_bind_param($stmt, "ss", $cat_name, $cat_desc);

        if (mysqli_stmt_execute($stmt)) {
            return "New Category Added Successfully";
        } else {
            return "Failed To Add New Category" . mysqli_error($this->connection);
        }
    }

    public function all_category()
    {
        // get all category from category table
        $query = "SELECT * FROM category";
        $result = mysqli_query($this->connection, $query);
        if (!$result) {
            die("Query failed: " . mysqli_error($this->connection));
        }
    
        // fetch the result as an associative array
        $categories = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $categories;
    }
}
