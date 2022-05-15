<?php

    class Admin {

        private $db;

        public function __construct()
        {
            $this->db = new Database;
        }

        public function insertAll()
        {
            $this->db->query("INSERT INTO TABLE (name, password, age) VALUES (:name, :password, :age)");

            // Bind Values
            $this->db->bind(':name', $_POST['name']);
            $this->db->bind(':password', $_POST['password']);
            $this->db->bind(':age', $_POST['age']);

            return $this->db->execute();
        }
        
        public function insert()
        {
            $this->db->query("INSERT INTO TABLE (name, password, age) VALUES (:name, :password, :age)");

            // Bind Values
            $this->db->bind(':name', $_POST['name']);
            $this->db->bind(':password', $_POST['password']);
            $this->db->bind(':age', $_POST['age']);

            return $this->db->single();
        }

        
        
    }