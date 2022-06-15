        <?php
        class Customer
        {
            private $db;

            public function __construct()
            {
                $this->db = new Database;
                
            }
            public function check_customer($data)
            {
                
                $this->db->query("SELECT * FROM customer WHERE   email = :email");
                $this->db->bind(':email', $data['email']);
                // $this->db->bind(':password', $data['password']);

                $row = $this->db->single();
                $hashed_password = $row->password;
                if (password_verify($data['password'], $hashed_password)) {
                    return $row;
                } else {
                    return false;
                }
                try {
                    return $this->db->single();
                } catch (PDOException $e) {
                    return $e->getMessage();
                }
            }
            public function getAll_customer()
            {
                $this->db->query('SELECT * FROM customer  ');
                try {
                    return $this->db->resultSet();
                } catch (PDOException $e) {
                    return $e->getMessage();
                }
            }
            public function get_customer($data)
            {   
                // var_dump($data);
                // print_r($id);
                // http://localhost/filrouge/backend/public/CustomerController/get_customer
                $this->db->query('SELECT * FROM customer  WHERE id = :id');
                $this->db->bind(':id', $data['id']);

                try {
                    return $this->db->single();
                } catch (PDOException $e) {
                    return $e->getMessage();
                }
            }
            public function get_customerDate(){
                // $current = $this->db->query("SELECT DATE(NOW())");
                // $date = $this->db->query("SELECT CURDATE()");
                $date = date('Y-m-d');
                // die($date);
                
                
                $this->db->query('SELECT COUNT(id) AS aa FROM `customer` WHERE date_creation = :date');
                $this->db->bind(':date',$date);

                try{
                    return $this->db->resultSet();
                    
                }
                catch(PDOException $e){
                    return $e->getMessage();
                }
            }
            public function add_customer($data)
            {
                $this->db->query("INSERT INTO `customer`(`name`, `tel`, `email`, `password`, `photo`, `metier`) VALUES (:name,:tel,:email,:password,:photo,:metier)");
                $this->db->bind(':name', $data['name']);
                $this->db->bind(':tel', $data['tel']);
                $this->db->bind(':email', $data['email']);
                $this->db->bind(':password', $data['password']);
                $this->db->bind(':photo', $data['photo']);
                $this->db->bind(':metier', $data['metier']);
                try {
                    return $this->db->execute() ? $data : false;
                } catch (PDOException $e) {
                    return $e->getMessage();
                }
            }
            public function update_customer($data)
            {

                $this->db->query("UPDATE customer SET name	 = :name	, tel	 = :tel	, email =:email, password = :password , photo = :photo, metier = :metier  WHERE id= :id");
                $this->db->bind(':id', $data['id']);
                $this->db->bind(':name', $data['name']);
                $this->db->bind(':tel', $data['tel']);
                $this->db->bind(':email', $data['email']);
                $this->db->bind(':password', $data['password']);
                $this->db->bind(':photo', $data['photo']);
                $this->db->bind(':metier', $data['metier']);


                try {
                    // var_dump($data);
                    return $this->db->execute();
                } catch (PDOException $e) {
                    // die($e->getMessage());
                    return $e->getMessage();
                }
            }

            public function delete_customer($data)
            {

                // die($data);
                // print_r($data);
                // die($id);
                $id = $data['id'];
                
                $this->db->query('DELETE  FROM customer WHERE id = :id');
                $this->db->bind(":id", $id);
                try {
                    
                    return $this->db->execute();
                } catch (PDOException $e) {
                    die($e->getMessage());
                    return $e->getMessage();
                }
            }
            public function getCustomerById($id)
            {
                return $this->get_customer(["id" => $id]);
            }
        }
