<?php

    class AdminController extends Controller {

        public function __construct()
        {
            $this->addModel = $this->model('Add');
        }

        public function insertAdmin()
        {
            $this->addModel->insertAll();
            echo json_encode('Hello World !');
            
        }
    }