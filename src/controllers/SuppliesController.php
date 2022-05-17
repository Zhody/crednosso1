<?php
namespace src\controllers;

use \core\Controller;

class SuppliesController extends Controller {

    public function index() {
        $this->render('supplies' , ['title_page' => 'Abastecimentos']);
    }

}