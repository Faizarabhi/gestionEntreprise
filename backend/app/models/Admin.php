<?php
    class Admin {
        private $db;

        public function __construct()
        {
            $this->db = new Database();
        }

        public function selectUser()
        {
            $this->db->query("SELECT * FROM user");
            $this->db->single();
        }
        
        public function insertUser($name, $password)
        {
            $this->db->query("INSERT INTO user (name, password) VALUES (:name, :password)");

            // Bind Values
            $this->db->bind(':name', $name);
            $this->db->bind(':password', $password);

            return $this->db->execute();

        }
        

    }