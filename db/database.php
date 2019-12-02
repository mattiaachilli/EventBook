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
            $stmt = $this->db->prepare("SELECT Username FROM utenti WHERE (Username = ? OR Email = ?) AND Password = ?");
            $stmt->bind_param("sss", $username_email, $username_email, $password_encrypt);
            $stmt->execute();
            $result = $stmt->get_result();

            return $result->fetch_all(MYSQLI_ASSOC);
        }

        public function changePassword($username, $password) {
            $password_encrypt = md5($password);
            $stmt = $this->db->prepare("UPDATE utenti 
                                        SET Password = ? 
                                        WHERE Username = ?");
            $stmt->bind_param("ss", $password_encrypt, $username);
            $stmt->execute();
        }

        public function getCategories() {
            $stmt = $this->db->prepare("SELECT Nome
                                        FROM categorie");
            $stmt->execute();
            $result = $stmt->get_result();

            return $result->fetch_all(MYSQLI_ASSOC);
        }

        public function getLocations() {
            $stmt = $this->db->prepare("SELECT *
                                        FROM location");
            $stmt->execute();
            $result = $stmt->get_result();

            return $result->fetch_all(MYSQLI_ASSOC);
        }
    }
?>