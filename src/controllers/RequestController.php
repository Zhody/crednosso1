<?php
namespace src\controllers;

use \core\Controller;
use \src\models\Batch;
use \src\models\Request;
use \src\models\Shipping;
use \src\models\Order_type as OrderType;
use \src\models\Operation_type as OperationType;

class RequestController extends Controller {

    public function index() {
        $requests = Request::select()->execute();
        if(count($requests) == 0){
            $requests = null;
        }
       
        foreach($requests as $key => $request){
            $batch = Batch::select()->where('id', $request['id_batch'])->execute();
            $shOrigin = Shipping::select()->where('id_shipping', $request['id_origin'])->execute();
            $shDestiny = Shipping::select()->where('id_shipping', $request['id_destiny'])->execute();
            $requests[$key]['batch'] = $batch[0]['batch'];
            $requests[$key]['name_origin'] = $shOrigin[0]['name_shipping'];
            $requests[$key]['name_destiny'] = (isset($shDestiny[0]['name_shipping'])) ? $shDestiny[0]['name_shipping'] : null;
        }
        
        $this->render('request' , [
            'title_page' => 'Pedidos',
            'requests' => $requests
        ]);
    }

    public function add(){
        $operationTypes = OperationType::select()->where('active', 'Y')->execute();
        if(count($operationTypes) == 0){
            $operationTypes = null;
        }
        $shippings = Shipping::select()->where('active', 'Y')->execute();
        if(count($shippings) == 0){
            $shippings = null;
        }

        $order_types = OrderType::select()->where('active', 'Y')->execute();
        if(count($order_types) == 0){
            $order_types = null;
        }
        $this->render('/request/request_add', [
            'title_page' => 'Adicionar pedido',
            'operation_types' => $operationTypes,
            'shippings' => $shippings,
            'order_types' => $order_types
        ]);
    } 

    public function addAction(){
        echo 'Faltando implementar a funçao';die();
    }

}