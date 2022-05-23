<?php
class Rendez
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }
    public function addRendez($data)
     {
        //  	id	name	date_rdv	sujet	creneau	id_client	
        $this->db->query('INSERT INTO rdv (id_client, date_rdv, sujet,creneau) VALUES(:id_client, :date_rdv, :sujet, :creneau)');

        //Bind values

        $this->db->bind(':date_rdv', $data['date_rdv']);
        $this->db->bind(':sujet', $data['sujet']);
        $this->db->bind(':id_client', $data['id_client']);
        $this->db->bind(':creneau', $data['creneau']);


        //Execute function
        try {
            $this->db->execute();
            return $data = true;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
    public function getRendez()
    {
            $this->db->query('SELECT rdv.*,client.* FROM rdv 
            INNER JOIN client ON  client.id = rdv.id_client ');
        // $this->db->query('SELECT * FROM rdv');
        try {
            return $this->db->resultSet();
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
    public function Check_Rendez($data){

                $this->db->query('SELECT creneau FROM rdv where date_rdv = :date_rdv');
                $this->db->bind(':date_rdv',$data);
                return $this->db->resultass();

    }
    public function updateRndv($data){
        $this->db->query('UPDATE rdv SET date_rdv=:Date,sujet=:Topic,creneau=:time WHERE id_rdv=:id_rdv');

        $this->db->bind(':Date', $data['Date']);
        $this->db->bind(':Topic', $data['Topic']);
        $this->db->bind(':time', $data['time']);
        $this->db->bind(':id_rdv', $data['id_rdv']);

        try{
            return $this->db->execute();
        }catch(PDOException $e){
            return $e->getMessage();
        }
    }
    public function delet_rendev($data){
        $this->db->query('DELETE  FROM rdv WHERE id_rdv = :id');
        $this->db->bind(":id", $data);
        try {
            return $this->db->execute();
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
}
