<?php
namespace src\controllers;

use \core\Controller;
use \src\models\Atm;
use \src\models\Shipping;

class AtmController extends Controller {

    public function index() {

        $atms = Atm::select()->execute();
        if(count($atms) == 0){
            $atms = null;
        }
        foreach($atms as $key => $atm){
            $sh = Shipping::select()->where('id_shipping', $atm['id_treasury'])->execute();
            $atms[$key]['name_shipping'] = $sh[0]['name_shipping'];
        }
        $this->render('atm' , [
            'title_page' => 'Atms',
            'atms' => $atms
        ]);
    }

}