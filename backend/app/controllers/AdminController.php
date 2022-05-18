<?php

    class AdminController extends Controller {
        public function __construct()
        {
            $this->AdminModel = $this->model('Admin');
        }

        public function login ()
        {
            $name = $_POST['name'];
            $password = $_POST['password'];

            $this->AdminModel->selectUser($name, $password);
        }

        public function getUser()
        {
            $data = $this->AdminModel->selectUser();
            echo json_encode($data);
            // $this->view('Admin/user', $data);
        }
    }