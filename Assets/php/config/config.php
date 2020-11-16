<?php
// Other settings
    session_start();

    // Connect to the database
    class Database {
        private $host = "localhost";
        private $db_name = "npproject";
        private $usern = "root";
        private $password = "";
        public $conn;

        public function dbConnection() {
            $this->conn = null;
            try {
                $this->conn = new PDO(
                    "mysql:host=" . $this->host . ";dbname=" . $this->db_name,
                    $this->usern,
                    $this->password);
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }
            catch(PDOException $exception) {
                echo "Connection error: " . $exception->getMessage();
            }
            return $this->conn;
        }
    }

    // Functions for managing users
    class USER {
        private $conn;

        public function __construct() {
            $database = new Database();
            $db = $database->dbConnection();
            $this->conn = $db;
        }

        public function runQuery($sql) {
            $stmt = $this->conn->prepare($sql);
            return $stmt;
        }

        public function register($uname, $umail, $upass) {
            try {
                $new_password = password_hash($upass, PASSWORD_DEFAULT);
                $stmt = $this->conn->prepare("INSERT INTO users(username,email,password) VALUES(:uname, :umail, :upass)");
                $stmt->bindparam(":uname", $uname);
                $stmt->bindparam(":umail", $umail);
                $stmt->bindparam(":upass", $new_password);
                $stmt->execute();
                return $stmt;
            }
            catch(PDOException $e) {
                echo $e->getMessage();
            }
        }

        public function doLogin($uname,$umail,$upass) {
            try {
                $stmt = $this->conn->prepare("SELECT id, username, email, password FROM users WHERE username=:uname OR email=:umail ");
                $stmt->execute(array(':uname'=>$uname, ':umail'=>$umail));
                $userRow = $stmt->fetch(PDO::FETCH_ASSOC);
                if($stmt->rowCount() == 1) {
                    if(password_verify($upass, $userRow['password'])) {
                        $_SESSION['user_session'] = $userRow['username'];
                        return true;
                    }
                    else {
                        return false;
                    }
                }
            }
            catch(PDOException $e) {
                echo $e->getMessage();
            }
        }

        public function is_loggedin() {
            if(isset($_SESSION['user_session'])) {
                return true;
            }
        }

        public function redirect($url) {
            header("Location: $url");
            exit;
        }

        public function doLogout() {
            unset($_SESSION['user_session']);
            return true;
        }
    }


