<?php

require_once "../app/models/Career.php";

class CareerController {

    public function index() {

        $career = new Career();
        $data = $career->getAllCareers();

        require "../app/views/career/list.php";
    }

    public function detail($id) {

        $career = new Career();
        $data = $career->getCareerById($id);

        require "../app/views/career/detail.php";
    }
}