<?php
    class db {
        public $servername = "localhost";
        public $username = "root";
        public $password = "";
        public $db = "tuklasbatangas";
        public $result;
        public $conn;
        
        public function Connect(){
            $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->db);
            if ($this->conn->connect_error) {
                die("Connection failed: " . $this->conn->connect_error);
            } 
        }
        
        public function Close(){
            $this->conn->close();
        }
        
        public function Query($sql){
            $this->result = $this->conn->query($sql);
            if (!$this->result) {
                die(sprintf("Error: %s", $this->conn->error));
            }
        }
        
        public function Escape($string){
            $escape = $this->conn->real_escape_string($string);
            return $escape;
        }
    }
?>