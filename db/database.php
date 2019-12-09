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

        public function getCategories($param = "") {
            $query = "SELECT Nome FROM categorie";
            if($param !== ""){
                $query.= " WHERE Nome = ?";
                $stmt = $this->db->prepare($query);
                $stmt->bind_param("s", $param);
            } else {
                $stmt = $this->db->prepare($query);
            }
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
            $stmnt = $this->db->prepare("SELECT username, email FROM utenti WHERE (Username = ? OR Email = ?) AND Active = 1");
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
            $stmt = $this->db->prepare("SELECT Username, Nome_evento, IDevento FROM eventi e, utenti u WHERE Username = Username_organizzatore AND (e.Active = 0 AND Deleted = 0)");
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
        
        public function getNextOrPrevEvents($currentID = 0, $nextOrPrev = 0) {
            $eventsPerPage = 4;
            if ($nextOrPrev == 0) {
                $stmt = $this->db->prepare("SELECT *
                                            FROM eventi
                                            WHERE active = 1
                                            AND IDevento > ?
                                            ORDER BY IDevento ASC
                                            LIMIT ?");
            } else {
                $stmt = $this->db->prepare("SELECT *
                                            FROM eventi
                                            WHERE active = 1
                                            AND IDevento < ?
                                            ORDER BY IDevento DESC
                                            LIMIT ?");
            }
            
            $stmt->bind_param("ii", $currentID, $eventsPerPage);
            $stmt->execute();
            $result = $stmt->get_result();

            return $result->fetch_all(MYSQLI_ASSOC);
        }

        public function modifyUser($username, $email, $password = ""){
            $query = "UPDATE utenti SET Username = ?, Email = ?";
            if($password !== ""){
                if (strlen($password) < 32) {
                    $password = md5($password);
                }
                $query.= ", Password = ?";
            }
            $query .= " WHERE Username = ?";
            $stmt = $this->db->prepare($query);
            if($password !== ""){
                $stmt->bind_param("ssss", $username, $email, $password, $_SESSION["user"][0]);
            } else {
                $stmt->bind_param("sss", $username, $email, $_SESSION["user"][0]);
            }
            $stmt->execute();
        }

        public function getEvent($id) {
            $stmt = $this->db->prepare("SELECT *
                                        FROM eventi E, location L
                                        WHERE IDevento = ? AND E.Nome_location = L.Nome 
                                                           AND E.Nazione_location = L.Nazione
                                                           AND E.Città_location = L.Città");
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $result = $stmt->get_result();

            return $result->fetch_all(MYSQLI_ASSOC);
        }

        public function getMaxEventID() {
            $stmt = $this->db->prepare("SELECT IDevento
                                        FROM eventi 
                                        WHERE active = 1 AND Deleted = 0
                                        ORDER BY IDevento DESC
                                        LIMIT 1");
            $stmt->execute();
            $result = $stmt->get_result();

            return $result->fetch_all(MYSQLI_ASSOC);
        }

        public function getMinEventID() {
            $stmt = $this->db->prepare("SELECT IDevento
                                        FROM eventi 
                                        WHERE active = 1 AND Deleted = 0
                                        ORDER BY IDevento ASC
                                        LIMIT 1");
            $stmt->execute();
            $result = $stmt->get_result();

            return $result->fetch_all(MYSQLI_ASSOC);
        }

        public function getUser(){
            $stmt = $this->db->prepare("SELECT Username, Email, Password FROM utenti WHERE Username = ? AND Active = 1");
            $stmt->bind_param("s", $_SESSION["user"][0]);
            $stmt->execute();
            $result = $stmt->get_result();

            return $result->fetch_all(MYSQLI_ASSOC);
        }
        
        public function getTicketsAvailable($id) {
            $stmt = $this->db->prepare("SELECT Biglietti_disponibili
                                FROM eventi e
                                where e.IDevento = ?");
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $result = $stmt->get_result();

            return $result->fetch_all(MYSQLI_ASSOC);
        }

        public function getPublishiedEvents($organizer) {
            $stmt = $this->db->prepare("SELECT *
                                        FROM eventi 
                                        where Username_organizzatore = ?");
            $stmt->bind_param("s", $organizer);
            $stmt->execute();
            $result = $stmt->get_result();

            return $result->fetch_all(MYSQLI_ASSOC);
        }
        
        public function updateUser($i){
            $stmt = $this->db->prepare("UPDATE utenti SET Active = ? WHERE Username = ?");
            $stmt->bind_param("is", $i, $_SESSION["user"][0]);
            $stmt->execute();
        }

        public function searchingEvent($str){
            $query = "SELECT * FROM eventi WHERE Nome_evento LIKE '%$str%' OR Descrizione LIKE '%$str%'";
            $stmt = $this->db->prepare("SELECT * FROM eventi 
                                                 WHERE Nome_evento 
                                                 LIKE '%$str%' OR Descrizione LIKE '%$str%'");
            $stmt->execute();
            $result = $stmt->get_result();
            
            return $result->fetch_all(MYSQLI_ASSOC);
        }

        public function deleteEvent($id) {
            $imgToDelete = $this->getEvent($id);
            unlink($imgToDelete[0]["Immagine"]); 
            $stmt = $this->db->prepare("DELETE FROM eventi WHERE IDevento = ?");
            $stmt->bind_param("i", $id);
            $stmt->execute();
        }
    }
?>