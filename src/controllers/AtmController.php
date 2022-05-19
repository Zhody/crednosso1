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

    public function editAction($args){
        print_r($_POST);die();
        if(!isset($args)){
            $this->redirect('/atm', ['error'=>'Precisamos de um ID para continuar.']);
        }

        $id_atm = filter_input(INPUT_POST, 'id_atm');
        $name_atm = filter_input(INPUT_POST, 'name_atm');
        $shortened_atm = filter_input(INPUT_POST, 'shortened_atm');
        $id_treasury = filter_input(INPUT_POST, 'id_treasury');
        $status_atm = filter_input(INPUT_POST, 'status_atm');
        $cass_A = filter_input(INPUT_POST, 'cass_A');
        $cass_B = filter_input(INPUT_POST, 'cass_B');
        $cass_C = filter_input(INPUT_POST, 'cass_C');
        $cass_D = filter_input(INPUT_POST, 'cass_D');

        if($id_atm && $name_atm && $shortened_atm &&
            $id_treasury && $status_atm && $cass_A &&
            $cass_B && $cass_C && $cass_D){
                Atm::update()->set('id_atm', $id_atm)
                ->set('id_treasury', $id_treasury)
                ->set('name_atm', $name_atm)
                ->set('shortened_name_atm', $shortened_atm)
                ->set('cass_A', $cass_A)->set('cass_B', $cass_B)
                ->set('cass_C', $cass_C)->set('cass_D', $cass_D)
                ->set('status', $status_atm)->where('id_atm', $args['id'])
                ->execute();;
        }
        $this->redirect('/atm/edit/'.$args['id']);

    }


    public function enable($args){
        if(!isset($args)){
            $this->redirect('/atm', ['error'=>'Precisamos de um ID para continuar']);
        }

        Atm::update()->set('status', 'Y')->where('id_atm', $args['id'])->execute();

        $this->redirect('/atm', ['success'=>'Ativado com sucesso.']);
    }

    public function disable($args){
        if(!isset($args)){
            $this->redirect('/atm', ['error'=>'Precisamos de um ID para continuar']);
        }

        Atm::update()->set('status', 'N')->where('id_atm', $args['id'])->execute();

        $this->redirect('/atm', ['success'=>'Desativado com sucesso.']);
    }

}