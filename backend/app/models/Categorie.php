<?php 
class Categorie {
    private $db;
    public function __construct()
    {
        $this->db = new Database;
    }
    public function  getAll_categorie(){
        $this->db->query("SELECT * FROM categorie ");
        try{
            return $this->db->resultSet();
        }
        catch(PDOException $e){
            return $e->getMessage();
        }
    }
}