<?php
namespace src\controllers;

use \core\Controller;

class AtmsController extends Controller {

    public function index() {
        $this->render('atms' , ['title_page' => 'Atms']);
    }

}