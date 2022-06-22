<?php

class facture
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }
    public function create($data)
    {
        $this->db->query("INSERT INTO `facteur`( `customer_id`) VALUES (:customer_id)");
        $this->db->bind(':customer_id', $data['customer_id']);
        try {
            return $this->db->execute() ? $data : false;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function lastId()
    {

        return $this->db->lastInsertedId("facteur");
    }
    public function getAllfacture()
    {
        $this->db->query('SELECT facteur.*,customer.name FROM `facteur` INNER JOIN customer ON customer.id = facteur.customer_id ORDER BY date_creation DESC	');
        try {
            return $this->db->resultSet();
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
    public function getfactures()
    {
        $date = date('Y-m-d');

        $this->db->query('SELECT COUNT(id) as Num FROM `facteur` WHERE date_creation = :date');
        $this->db->bind(':date', $date);
        try {
            return $this->db->resultSet();
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
    
}
