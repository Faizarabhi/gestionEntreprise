<?php
class Admin
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }
    public function checkAdmin($data)
    {
        die("hello from admin model");
        $this->db->query("SELECT * FROM admin WHERE password = :password and  email = :email");
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':password', $data['password']);
        try {
            return $this->db->single();
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
   
    
}