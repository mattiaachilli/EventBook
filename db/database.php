<?php
    class Database{
        private $db;

        public function __construct($servername, $username, $password, $dbname) {
            $this->db = new mysqli($servername, $username, $password, $dbname);
            if($this->db->connect_error){
                die("Connesione fallita al db");
            }
        }

        public function checkLogin($username_email, $password) {
            $password_encrypt = md5($password);
            echo $password_encrypt;
            $stmt = $this->db->prepare("SELECT Username FROM utenti WHERE Username = ? OR Email = ? AND Password = ?");
            $stmt->bind_param("sss", $username_email, $username_email, $password_encrypt);
            $stmt->execute();
            $result = $stmt->get_result();

            return $result->fetch_all(MYSQLI_ASSOC);
        }
    }
?>