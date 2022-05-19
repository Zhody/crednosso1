<?php
namespace src\controllers;

use \core\Controller;
use \src\models\Image;
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
        //print_r($_FILES);die();
        $num_contestation = filter_input(INPUT_POST, 'num_contestation');
        $name_contestation = filter_input(INPUT_POST, 'name_contestation');
        $card_contestation = filter_input(INPUT_POST, 'card_contestation');
        $date_contestation = filter_input(INPUT_POST, 'date_contestation');
        $type_contestation = filter_input(INPUT_POST, 'type_contestation');


        if($num_contestation && $name_contestation && $card_contestation && $date_contestation && $type_contestation ){

            if(count(Contestation::select()
                ->where('num_contest_system', $num_contestation
                )->execute()) > 0){
                    $this->redirect('/contestation/add', ['error'=>'Já existe contestação com esse numero!']);
            }

            Contestation::insert([
                "name" => $name_contestation,
                "card" => $card_contestation,
                "num_contest_system" => $num_contestation,
                "date" => $date_contestation,
                "type" => $type_contestation
            ])->execute();
            
            $id = Contestation::select('id')->where('num_contest_system', $num_contestation)->execute();
           // print_r($id[0]['id']);die();

            if(count($_FILES['files_contestation']['name']) > 0){
                $path = 'archives';
                $dirname = Image::generateName($id[0]['id']);
                
                $path = Image::generateDiretory($path, $dirname, 1);

                if(!is_dir($path)){
                    mkdir($path, 0777, true);
                }

                $up = Image::uploadImage($_FILES, $path);
                if(Image::verifyErrosUpload($up)){
                    foreach($up as $key => $u){
                        Image::insert([
                            'path'=>$dirname,
                            'id_contestation'=>$id[0]['id'],
                            'path_image'=> $u['name'],
                            'hash' => $u['hash']
                        ])->execute();
                    }
                }
                $this->redirect('/contestation', ['success'=>'Contestação cadastrada.']);
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