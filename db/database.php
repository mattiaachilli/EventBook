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
            if(strlen($password) < 32){
                $password = md5($password);
            }
            $stmt = $this->db->prepare("SELECT Username, Organizzatore
                                        FROM utenti 
                                        WHERE (Username = ? OR Email = ?) 
                                        AND Password = ?");
            $stmt->bind_param("sss", $username_email, $username_email, $password);
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
        
        public function checkRegistration($username, $email){
            $stmnt = $this->db->prepare("SELECT username, email FROM utenti WHERE username = ? OR Email = ?");
            $stmnt->bind_param("ss", $username, $email);
            $stmnt->execute();
            $result = $stmnt->get_result();

            return $result->fetch_all(MYSQLI_ASSOC);
        }

        public function registerUser($username, $email, $nome, $cognome, $password, $checkbox){
            if(strlen($password) < 32){
                $password = md5($password);
            }
            $stmnt = $this->db->prepare("INSERT INTO utenti(Username, Email, Nome, Cognome, Password, Organizzatore) VALUES(?,?,?,?,?,?)");
            $stmnt->bind_param("sssssi", $username, $email, $nome, $cognome, $password, $checkbox);
            $stmnt->execute();
        }

        public function insertCategory($category){
            $stmt = $this->db->prepare("INSERT INTO categorie(Nome) VALUE (?)");
            $stmt->bind_param("s", $category);
            $stmt->execute();
        }

        public function getEvents(){
            $stmt = $this->db->prepare("SELECT Username, Nome_evento, IDevento FROM eventi, utenti WHERE Username = Username_organizzatore AND (Active = 0 AND Deleted = 0)");
            $stmt->execute();
            $result = $stmt->get_result();
            return $result->fetch_all(MYSQLI_ASSOC);
        }

        public function checkMailExists($email) {
            $stmnt = $this->db->prepare("SELECT *
                                         FROM utenti 
                                         WHERE Email = ?");
            $stmnt->bind_param("s", $email);
            $stmnt->execute();
            $result = $stmnt->get_result();
            return $result->fetch_all(MYSQLI_ASSOC);
        }

        public function getLocationCapacity($nome, $nazione, $città) {
            $stmt = $this->db->prepare("SELECT Capienza
                                        FROM location
                                        WHERE Nome = ? AND Nazione = ? AND Città = ?");
            $stmt->bind_param("sss", $nome, $nazione, $città);
            $stmt->execute();
            $result = $stmt->get_result();

            return $result->fetch_all(MYSQLI_ASSOC);
        }

        public function insertNewEvent($nome, $data, $desc, $immagine, 
                                       $prezzo, $n_biglietti, $categoria, $nomeLocation, $nazioneLocation, $cittàLocation){
            $usernameOrg = $_SESSION["user"][0];
            $active = 0;
            $stmt = $this->db->prepare("INSERT INTO eventi(Data, Nome_evento, Nome_location, Nazione_location, Città_location, 
                                        Biglietti_disponibili, Categoria, Immagine, Descrizione, Prezzo, Username_organizzatore, Active) 
                                        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("sssssisssisi", $data, $nome, $nomeLocation, $nazioneLocation, $cittàLocation, $n_biglietti, 
                                             $categoria, $immagine, $desc, $prezzo, $usernameOrg, $active);
            $stmt->execute();
        }

        public function checkExistingEvent($data, $nazione, $città, $location) {
            $stmt = $this->db->prepare("SELECT *
                                        FROM eventi
                                        WHERE Data = ? AND Nazione_location = ? AND Città_location = ? AND Nome_location = ?");
            $stmt->bind_param("ssss", $data, $nazione, $città, $location);
            $stmt->execute();
            $result = $stmt->get_result();

            return $result->fetch_all(MYSQLI_ASSOC);
        }

        public function updateEvents($id, $decision){
            $query = "UPDATE eventi ";
            if($decision == 1){
                $query.= "SET Active = 1 ";
            } else {
                $query.= "SET Deleted = 1 ";
            }
            $query.="WHERE IDevento = ?";
            $stmt = $this->db->prepare($query);
            $stmt->bind_param("i", $id);
            $stmt->execute();
        }
        
        public function getAllEvents() {
            $stmt = $this->db->prepare("SELECT *
                                        FROM eventi
                                        WHERE active = 1");
            $stmt->execute();
            $result = $stmt->get_result();

            return $result->fetch_all(MYSQLI_ASSOC);
        }

        public function getEvent($id) {
            $stmt = $this->db->prepare("SELECT *
                                        FROM eventi E, location L
                                        WHERE IDevento = ? AND E.Nome_location = L.Nome 
                                                           AND E.Nazione_location = L.Nazione
                                                           AND E.Città_location = L.Città");
            $stmt->bind_param("s", $id);
            $stmt->execute();
            $result = $stmt->get_result();

            return $result->fetch_all(MYSQLI_ASSOC);
        }
    }
?>