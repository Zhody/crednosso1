<?php
namespace src\controllers;

use \core\Controller;
use \src\models\Batch;
use \src\models\Treasury;
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
       // print_r($_POST);die();
        $operation_type = filter_input(INPUT_POST, 'operation_type');
        $id_origin = filter_input(INPUT_POST, 'id_origin');
        $id_destiny = filter_input(INPUT_POST, 'id_destiny');
        $date_request = filter_input(INPUT_POST, 'date_request');
        $order_request = filter_input(INPUT_POST, 'order_request');
        $note_request = filter_input(INPUT_POST, 'note_request');
        $qt_10 = filter_input(INPUT_POST, 'qt_10');
        $qt_20 = filter_input(INPUT_POST, 'qt_20');
        $qt_50 = filter_input(INPUT_POST, 'qt_50');
        $qt_100 = filter_input(INPUT_POST, 'qt_100');

        
        die();
        if($operation_type && $id_origin && $date_request && $order_request 
         && $qt_10 && $qt_20 && $qt_50 && $qt_100)
        {
            $arrayValues = [
                '10' => ($qt_10) ? $qt_10 : 0,
                '20' =>  ($qt_20) ? $qt_20 : 0,
                '50' => ($qt_50) ? $qt_50 : 0,
                '100' => ($qt_100) ? $qt_100 : 0
            ];
            $batch = Batch::select()->where('date_batch', $date_request)->execute();
            $value_total = Request::gerateValueTotal($arrayValues);
            if(count($batch) == 0){
                $batchGerate = Batch::generateBatch($id_origin, $id_destiny);
                Batch::insert([
                    'id_type'=>'1',
                    'batch' =>$batchGerate,
                    'date_batch'=>$date_request,
                    'status' => '1'
                ])->execute();

                $batch = Batch::select()->where('batch', $batchGerate)->execute();
            }

            Request::insert([
                'id_batch' => $batch[0]['id'],
                'id_operation_type' => $operation_type,
                'id_origin' => $id_origin,
                'id_order_type' => $order_request,
                'id_destiny' => $id_destiny,
                'date_request' => $date_request,
                'qt_10' => $qt_10,
                'qt_20' => $qt_20,
                'qt_50' => $qt_50,
                'qt_100' => $qt_100,
                'note' => $note_request,
                'active' => 'Y',
                'id_status' => '1',
                'value_total'=> $value_total,
                'confirmed_value'=>'0',
                'change_in_confirmation' => 'N'
            ])->execute();
            
            if($id_destiny == 'null'){
                $treaury = Treasury::select()->where('id_shipping', $id_origin)->execute();
                if(count($treaury) == 0){
                    Treasury::insert([
                        'id_shipping'=>$id_origin,
                        'a_10'=>$qt_10,
                        'b_20'=>$qt_20,
                        'c_50'=>$qt_50,
                        'd_100'=>$qt_100,
                        'balance'=>$value_total,
                        'status'=> 'Y'
                    ])->execute();
                }else{
                    $v_10 = $treaury[0]['a_10'] + $qt_10;
                    $v_20 = $treaury[0]['b_20'] + $qt_20;
                    $v_50 = $treaury[0]['c_50'] + $qt_50;
                    $v_100 = $treaury[0]['d_100'] + $qt_100;
                    $balance = $treaury[0]['balance'] + $value_total;
                    Treasury::update()->set('a_10', $v_10)
                    ->set('b_20', $v_20)->et('c_50', $v_50)
                    ->set('d_100', $v_100)->where('id_shipping', $id_origin)->execute();
                }   
            }else{
                $treaury = Treasury::select()->where('id_shipping', $id_destiny)->execute();
                if(count($treaury) == 0){
                    Treasury::insert([
                        'id_shipping'=>$id_origin,
                        'a_10'=>$qt_10,
                        'b_20'=>$qt_20,
                        'c_50'=>$qt_50,
                        'd_100'=>$qt_100,
                        'balance'=>$value_total,
                        'status'=> 'Y'
                    ])->execute();
                }else{
                    $v_10 = $treaury[0]['a_10'] + $qt_10;
                    $v_20 = $treaury[0]['b_20'] + $qt_20;
                    $v_50 = $treaury[0]['c_50'] + $qt_50;
                    $v_100 = $treaury[0]['d_100'] + $qt_100;
                    $balance = $treaury[0]['balance'] + $value_total;
                    Treasury::update()->set('a_10', $v_10)
                    ->set('b_20', $v_20)->et('c_50', $v_50)
                    ->set('d_100', $v_100)->where('id_shipping', $id_origin)->execute();
                } 
            }    
                
            $this->redirect('/request', ['success'=>'Adicionado o Pedido.']);
        }
        $this->redirect('/request/add', ['error'=>'Houve algum erro na inclusão, favor tentar novamente']);
    }

}