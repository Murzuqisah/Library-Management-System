<?php
session_start();

class Database {
    private $host = "localhost";
    private $user = "root";
    private $password = "";
    private $database = "library-system";
    
    public function getConnection() {
        $conn = new mysqli($this->host, $this->user, $this->password, $this->database);
        if ($conn->connect_error) {
            die("Error failed to connect to MySQL: " . $conn->connect_error);
        } else {
            return $conn;
        }
    }
}

// Usage example
$dbInstance = new Database();
$conn = $dbInstance->getConnection();

// You can use $conn to execute queries and interact with the database
// For example: $result = $conn->query("SELECT * FROM your_table;");
?>
