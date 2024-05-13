<?php
    class DatabaseConnection{
        private static $db_server = "localhost";
        private static $db_user = "root";
        private static $db_pass = "";
        private static $db_name = "bookstoreweb";

        public static function getInstance() {
            try {
                $conn = new mysqli(DatabaseConnection::$db_server, DatabaseConnection::$db_user, DatabaseConnection::$db_pass, DatabaseConnection::$db_name);
                if ($conn->connect_error) {
                    throw new Exception("Connection failed: " . $conn->connect_error);
                    die("Connection failed: " . $conn->connect_error);
                }
                return $conn;
            } catch (Exception $e) {
                echo "Error: " . $e;
            }
            return null;
        }

        public static function closeConnection($conn) {
            $conn->close();
        }
    }

?>