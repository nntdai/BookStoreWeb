<?php
    class ConnectDatabase {
        private static $db_server = "localhost";
        private static $db_user = "root";
        private static $db_pass = "";
        private static $db_name = "bookstoreweb";

        private static function getConnection() {
            try {
                $conn = new mysqli(ConnectDatabase::$db_server, ConnectDatabase::$db_user, ConnectDatabase::$db_pass, ConnectDatabase::$db_name);
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

        public static function query($sql) {
            try {
                $conn = ConnectDatabase::getConnection();
                $query = $conn->query($sql);
                $conn->close();
                return $query;
            } catch (Exception $e) {
                echo "Error: " . $e;
            }
            return False;
        }
    }

?>