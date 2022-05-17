<?php
namespace src\controllers;

use \core\Controller;
use \src\models\Contestation;

class ContestationController extends Controller {

    public function index() {
        $contestations = Contestation::select()->execute();

        if(count($contestations) === 0){
            $contestations = null;
        }

        $this->render('contestation' , [
            'title_page' => 'Contestações',
            'contestations' => $contestations
        ]);
    }

    public function add(){
        $this->render('/contestation/contestation_add', [
            'title_page'=>'Adicionar Contestação'
        ]);
    }

    public function addAction(){
        if($_FILES['files_contestation']['name'][0] !== ''){
            $type_archive = filter_input(INPUT_POST, 'type_archive');
            foreach($_FILES as $imagens){
                print_r($imagens['name']);
            }
        }
        
        //print_r($_POST);
        die();
        $num_contestation = filter_input(INPUT_POST, 'num_contestation');
        $name_contestation = filter_input(INPUT_POST, 'name_contestation');
        $card_contestation = filter_input(INPUT_POST, 'card_contestation');
        $date_contestation = filter_input(INPUT_POST, 'date_contestation');
        if($num_contestation && $name_contestation 
        && $card_contestation && $date_contestation){
            Contestation::insert([
                "name" => $name_contestation,
                "card" => $card_contestation,
                "num_contest_system" => $num_contestation,
                "date" => $date_contestation
            ])->execute();
        }

        if($_FILES['files_contestation']['name'][0] !== ''){
            $type_archive = filter_input(INPUT_POST, 'type_archive');
            foreach($_FILES['files_contestation'] as $imagens){
                echo $imagens;
            }
        }
    }

    public function disable($args){
         if($args['id']){
            Contestation::update()
            ->set('active', 'N')
            ->where('id', $args['id'])->execute();
        }
        $this->redirect('/contestation');
    }

    public function enable($args){
         if($args['id']){
            Contestation::update()
            ->set('active', 'Y')
            ->where('id', $args['id'])->execute();
        }
        $this->redirect('/contestation');
    }

}