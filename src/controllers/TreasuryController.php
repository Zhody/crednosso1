<?php
namespace src\controllers;

use \core\Controller;
use \src\models\Treasury;
use \src\models\Shipping;

class TreasuryController extends Controller {

    public function index() {
        $treasurys = Treasury::select()->execute();
        if(count($treasurys) == 0){
            $treasurys = null;
        }
        foreach($treasurys as $key => $treasury){
            $sh = Shipping::select()->where('id_shipping', $treasury['id_shipping'])->execute();
            $treasurys[$key]['name_shipping'] = $sh[0]['name_shipping']; 
        }
       $this->render('treasury' , [
            'title_page' => 'Saldo de tesourarias',
            'treasurys' => $treasurys
        ]);
    }

    public function add($args){
         if(!isset($args)){
            $this->redirect('/treasury', ['error'=>'Precisamos de um ID para continuar']);
        }
        $treasury = Treasury::select()->where('id', $args['id'])->execute();
        if(count($treasury) == 0){
            Treasury::insert([
                "id_shipping" => $args['id'],
                "a_10" => 0,
                "b_20" => 0,
                "c_50" => 0,
                "d_100" => 0,
                "balance" => 0
            ])->execute();
        }
        $treasury = Treasury::select()->where('id', $args['id'])->execute();
        $shipping = Shipping::select()->where('id_shipping', $args['id'])->execute();
        $treasury[0]['name_shipping'] = $shipping[0]['name_shipping'];
        $this->render('/treasury/treasury_add' , [
            'title_page' => 'Adicionar Saldo',
            'treasury' => $treasury
        ]);
    }

    public function addAction($args){
        if(!isset($args)){
            $this->redirect('/treasury', ['error'=>'Precisamos de um ID para continuar!']);
        }
        
        $value_new_10 = filter_input(INPUT_POST, 'value_new_10');
        $value_new_20 = filter_input(INPUT_POST, 'value_new_20');
        $value_new_50 = filter_input(INPUT_POST, 'value_new_50');
        $value_new_100 = filter_input(INPUT_POST, 'value_new_100');
        $type_move = filter_input(INPUT_POST, 'type_move');

        $treasury = Treasury::select()->where('id_shipping', $args['id'])->execute();
        $new_balance = ($value_new_10*10)+($value_new_20*20)+($value_new_50*50)+($value_new_100*100);

        switch($type_move){
            case 'adc':
                $value_new_10 = $value_new_10 + $treasury[0]['a_10'];
                $value_new_20 = $value_new_20 + $treasury[0]['b_20'];
                $value_new_50 = $value_new_50 + $treasury[0]['c_50'];
                $value_new_100 = $value_new_100 + $treasury[0]['d_100'];
                $balance = $treasury[0]['balance'] + $new_balance;
            break;
            case 'sub':
                $value_new_10 = $treasury[0]['a_10'] - $value_new_10;
                $value_new_20 = $treasury[0]['b_20'] - $value_new_20;
                $value_new_50 = $treasury[0]['c_50'] - $value_new_50;
                $value_new_100 = $treasury[0]['d_100'] - $value_new_100;
                $balance = $treasury[0]['balance'] - $new_balance;
            break;
        }

        Treasury::update()->set('a_10', $value_new_10)
            ->set('b_20', $value_new_20)->set('c_50', $value_new_50)
            ->set('d_100', $value_new_100)->set('balance', $balance)
            ->where('id_shipping', $args['id'])->execute();

        $this->redirect('/treasury/add/'.$args['id'], ['success'=>'Saldo adicionado!']);

    }


}