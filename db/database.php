<?php
    class Database{
        private $db;

        public function __construct($servername, $username, $password, $dbname) {
            $this->db = new mysqli($servername, $username, $password, $dbname);
            if($this->db->connect_error){
                die("Connesione fallita al db");
            }
        }
    }
?>