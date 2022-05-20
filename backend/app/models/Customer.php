<?php
class Customer
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
        // die("hello from customer model");
    }
    public function check_customer($data)
    {
        // die("hello hibaaaaaaaaaaaaaaaaaaaaaa from admin model");

        // print_r($data);
        $this->db->query("SELECT * FROM customer WHERE password = :password and  email = :email");
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':password', $data['password']);
        try {
            return $this->db->single();
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
    public function add_customer($data)
    {
        // die("hello hibaaaaaaaaaaaaaaaaaaaaaa from admin model");

        // print_r($data);
        $this->db->query("INSERT INTO `customer`(`name`, `tel`, `email`, `password`, `photo`, `type`) VALUES (:name,:tel,:email,:password,:photo,:type)");
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':tel', $data['tel']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':password', $data['password']);
        $this->db->bind(':photo', $data['photo']);
        $this->db->bind(':type', $data['type']);
        try {
            return $this->db->single();
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
   
    
}