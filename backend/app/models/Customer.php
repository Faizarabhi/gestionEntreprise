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
                    return $this->db->execute() ? $data : false;
                } catch (PDOException $e) {
                    return $e->getMessage();
                }
            }
            public function update_customer($data)
            {

                $this->db->query("UPDATE customer SET name	 = :name	, tel	 = :tel	, email =:email, password = :password , photo = :photo, type = :type  WHERE id= :id");
                $this->db->bind(':id', $data['id']);
                $this->db->bind(':name', $data['name']);
                $this->db->bind(':tel', $data['tel']);
                $this->db->bind(':email', $data['email']);
                $this->db->bind(':password', $data['password']);
                $this->db->bind(':photo', $data['photo']);
                $this->db->bind(':type', $data['type']);


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
                // http://localhost/filrouge/backend/public/CustomerController/delete_customer
                $this->db->query('DELETE  FROM customer WHERE id = :id');
                $this->db->bind(":id", $id);
                try {
                    // die($id);
                    return $this->db->execute();
                } catch (PDOException $e) {
                    die($e->getMessage());
                    return $e->getMessage();
                }
            }
        }
