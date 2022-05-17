<?php
namespace src\controllers;

use \core\Controller;
use \src\models\Shipping;

class ShippingController extends Controller {

    public function index() {

        //$shippings = Shipping::select()->where('active', 'Y')->execute();
        $shippings = Shipping::select()->execute();

        if(count($shippings) === 0){
            $shippings = null;
        }

        $this->render('shipping' , [
            'title_page' => 'Transportadoras',
            'shippings' => $shippings
        ]);
    }

    public function add() {
         $this->render('/shipping/shipping_add' , [
            'title_page' => 'Adicionar Transportadora'
        ]);
    }

    public function addAction(){
        $id_shipping = filter_input(INPUT_POST, 'id_shipping');
        $name_shipping = filter_input(INPUT_POST, 'name_shipping');
        $emails_shipping = filter_input(INPUT_POST, 'emails_shipping');
        $active_shipping = filter_input(INPUT_POST, 'active_shipping');

        if($id_shipping && $name_shipping &&
         $emails_shipping && $active_shipping){
             Shipping::insert([
                 "id_shipping" => $id_shipping,
                 "name_shipping" => $name_shipping,
                 "emails_shipping" => $emails_shipping,
                 "active_shipping" => $active_shipping
             ])->execute();

             $this->redirect('/shipping', ["success" => "Transportadora inserida com sucesso!"]);
         }
    }

    public function edit($args) {

        $shipping = Shipping::select()->where('id_shipping', $args['id'])->execute();
        if($shipping === 0){
            $this->redirect('/shipping');
        }
        $this->render('/shipping/shipping_edit', [
             'title_page' => 'Editar Transportadora',
            'shipping'=> $shipping
        ]);
    }

    public function editAction($args){
        $id_shipping = filter_input(INPUT_POST, 'id_shipping');
        $name_shipping = filter_input(INPUT_POST, 'name_shipping');
        $emails_shipping = filter_input(INPUT_POST, 'emails_shipping');
        $active_shipping = filter_input(INPUT_POST, 'active_shipping');

        if($id_shipping && $name_shipping &&
         $emails_shipping && $active_shipping){
            Shipping::update()
            ->set('id_shipping', $id_shipping)
            ->set('name_shipping', $name_shipping)
            ->set('emails', $emails_shipping)
            ->set('active', $active_shipping)
            ->where('id', $args['id'])
            ->execute();

            $this->redirect('/shipping');
         }

         $this->redirect('/shipping/edit/'.$args['id']);
    }

    public function disable($args){
        if($args['id']){
            Shipping::update()
            ->set('active', 'N')
            ->where('id_shipping', $args['id'])->execute();
        }
        $this->redirect('/shipping');
    }

    public function enable($args){
         if($args['id']){
            Shipping::update()
            ->set('active', 'Y')
            ->where('id_shipping', $args['id'])->execute();
        }
        $this->redirect('/shipping');
    }

}