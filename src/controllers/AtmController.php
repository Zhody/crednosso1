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

    public function edit($args){
        if(!isset($args)){
            $this->redirect('/atm', ['error'=>'Precisamos de um ID para continuar.']);
        }

        $atm = Atm::select()->where('id_atm', $args['id'])->execute();
        if(count($atm) == 0){
            $atm = null;
        }
        $shippings = Shipping::select()->where('active', 'Y')->execute();
        $this->render('/atm/atm_edit' , [
            'title_page' => 'Atms',
            'atm' => $atm,
            'shippings' => $shippings
        ]);
    
    }

}