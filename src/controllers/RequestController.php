<?php
namespace src\controllers;

use \core\Controller;
use \src\models\Batch;
use \src\models\Treasury;
use \src\models\Request;
use \src\models\Shipping;
use \src\models\Request_status as RequestStatus;
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
            $status = RequestStatus::select()->where('id', $request['id_status'])->execute();
            $requests[$key]['batch'] = $batch[0]['batch'];
            $requests[$key]['name_origin'] = $shOrigin[0]['name_shipping'];
            $requests[$key]['name_destiny'] = (isset($shDestiny[0]['name_shipping'])) ? $shDestiny[0]['name_shipping'] : null;
            $requests[$key]['name_status'] = $status[0]['name'];
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
            'order_types' => $order_types,  
        ]);
    } 

    public function addAction(){
        
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

        if($operation_type && $id_origin && $date_request && $order_request 
         && $qt_10 && $qt_20 && $qt_50 && $qt_100)
        {
            
            $arrayValues = [
                '10' => ($qt_10) ? $qt_10 : 0,
                '20' =>  ($qt_20) ? $qt_20 : 0,
                '50' => ($qt_50) ? $qt_50 : 0,
                '100' => ($qt_100) ? $qt_100 : 0
            ];
            $value_total = Request::gerateValueTotal($arrayValues);
        
            $batch = Batch::select()->where('date_batch', $date_request)->execute();    
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
            
           /* if($id_destiny == 0){
                $treasury = Treasury::select()->where('id_shipping', $id_origin)->execute();
                if(count($treasury) == 0){
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
                    $v_10 = $treasury[0]['a_10'] + $qt_10;
                    $v_20 = $treasury[0]['b_20'] + $qt_20;
                    $v_50 = $treasury[0]['c_50'] + $qt_50;
                    $v_100 = $treasury[0]['d_100'] + $qt_100;
                    $balance = $treasury[0]['balance'] + $value_total;
                    Treasury::update()->set('a_10', $v_10)
                    ->set('b_20', $v_20)->set('c_50', $v_50)
                    ->set('d_100', $v_100)->set('balance', $value_total)
                    ->where('id_shipping', $id_origin)->execute();
                }   
            }else{
        
                $treasuryDestiny = Treasury::select()->where('id_shipping', $id_destiny)->execute();
                $treasuryOrigin = Treasury::select()->where('id_shipping', $id_origin)->execute();
                if(count($treasuryDestiny) == 0){
       
                    Treasury::insert([
                        'id_shipping'=>$id_destiny,
                        'a_10'=>$qt_10,
                        'b_20'=>$qt_20,
                        'c_50'=>$qt_50,
                        'd_100'=>$qt_100,
                        'balance'=>$value_total,
                        'status'=> 'Y'
                    ])->execute();
                    $v_10_origin = $treasuryOrigin[0]['a_10'] - $qt_10;
                    $v_20_origin = $treasuryOrigin[0]['b_20'] - $qt_20;
                    $v_50_origin = $treasuryOrigin[0]['c_50'] - $qt_50;
                    $v_100_origin = $treasuryOrigin[0]['d_100'] - $qt_100;

                    Treasury::update()->set('a_10', $v_10_origin)
                    ->set('b_20', $v_20_origin)->set('c_50', $v_50_origin)
                    ->set('c_100', $v_100_origin)->where('id_shipping', $id_origin)->execute();
                }else{
                    $v_10 = $treasuryDestiny[0]['a_10'] + $qt_10;
                    $v_20 = $treasuryDestiny[0]['b_20'] + $qt_20;
                    $v_50 = $treasuryDestiny[0]['c_50'] + $qt_50;
                    $v_100 = $treasuryDestiny[0]['d_100'] + $qt_100;
                    $balance = $treasuryDestiny[0]['balance'] + $value_total;

                    $v_10_sub = $treasuryOrigin[0]['a_10'] - $qt_10;
                    $v_20_sub = $treasuryOrigin[0]['b_20'] - $qt_20;
                    $v_50_sub = $treasuryOrigin[0]['c_50'] - $qt_50;
                    $v_100_sub = $treasuryOrigin[0]['d_100'] - $qt_100;
                    $balance_sub = $treasuryOrigin[0]['balance'] - $value_total;
                    Treasury::update()->set('a_10', $v_10)
                    ->set('b_20', $v_20)->set('c_50', $v_50)
                    ->set('d_100', $v_100)->set('balance', $balance)
                    ->where('id_shipping', $id_destiny)->execute();
                    Treasury::update()->set('a_10', $v_10_sub)
                    ->set('b_20', $v_20_sub)->set('c_50', $v_50_sub)
                    ->set('d_100', $v_100_sub)->set('balance', $balance_sub)
                    ->where('id_shipping', $id_origin)->execute();
                } 
            }*/    
                
            $this->redirect('/request/add', ['success'=>'Adicionado o Pedido.']);
        }
        $this->redirect('/request/add', ['error'=>'Houve algum erro na inclusão, favor tentar novamente']);
    }

    public function search(){
        $this->render('/request/request_search', [
            'title_page' => 'Pesquisa pedidos'
        ]);
    }

    public function searchAction(){
       // print_r($_POST);die();
        $date_initial = filter_input(INPUT_POST, 'date_initial');
        $date_final = filter_input(INPUT_POST, 'date_final');

        if($date_final == ''){
            $requests = Request::select()->where('date_request', $date_initial)->execute();
            if(count($requests) == 0){
                $requests = null;
            }
        }else{
            $requests = Request::select()
            ->where('date_request', '>=', $date_initial)
            ->where('date_request', '<=', $date_final)->execute();
            if(count($requests) == 0){
                $requests = null;
            }
        }
        $this->render('/request/request_search', [
            'title_page' => 'Pesquisa pedidos',
            'requests' => $requests,
            'date_initial' => $date_initial,
            'date_final' => $date_final,
        ]);
    }

    public function searchAjaxAction(){
       // print_r($_POST);die();
        $elements_checked = filter_input(INPUT_POST, 'checados');
        $date_initial = filter_input(INPUT_POST, 'date_initial');
        $date_final = filter_input(INPUT_POST, 'date_final');
        if($elements_checked !== ""){
            $elements_checked = explode(',', $elements_checked);
            foreach($elements_checked as  $check){
                $request = Request::select()->where("id", $check)->execute();
                if($request[0]['id_status'] == 1){
                    if($request[0]['id_destiny'] == 0){
                        $treasury = Treasury::select()->where("id_shipping", $request[0]['id_origin'])->execute();
                        if(count($treasury) > 0){
                            $valueTreasury = [
                                '10' => $treasury[0]['a_10'],
                                '20' => $treasury[0]['b_20'],
                                '50' => $treasury[0]['c_50'],
                                '100' => $treasury[0]['d_100'],
                            ];
                            $valueRequest = [
                                '10' => $request[0]['qt_10'],
                                '20' => $request[0]['qt_20'],
                                '50' => $request[0]['qt_50'],
                                '100' => $request[0]['qt_100'],
                            ];
                            $valueFinal = Request::generateValueForCassete('adc', $valueTreasury, $valueRequest);
                            $balance = Request::gerateValueTotal($valueFinal);
                            Treasury::update()->set("a_10", $valueFinal['10'])
                            ->set("b_20", $valueFinal['20'])->set("c_50", $valueFinal['50'])
                            ->set("d_100", $valueFinal['100'])->set("balance", $balance)
                            ->where('id_shipping', $request[0]['id_origin'])->execute();
                        }
                    }else{
                        $treasuryDestiny = Treasury::select()->where("id_shipping", $request[0]['id_destiny'])->execute();
                        $treasuryOrigin = Treasury::select()->where("id_shipping", $request[0]['id_origin'])->execute();
                        
                        if(count($treasuryDestiny) == 0){
                            Treasury::insert([
                                "id_shipping"=>$request[0]['id_destiny']
                            ])->execute();
                        }
                        $treasuryDestiny = Treasury::select()->where("id_shipping", $request[0]['id_destiny'])->execute();
                        $valueTreasury = [
                                '10' => $treasuryDestiny[0]['a_10'],
                                '20' => $treasuryDestiny[0]['b_20'],
                                '50' => $treasuryDestiny[0]['c_50'],
                                '100' => $treasuryDestiny[0]['d_100'],
                        ];
                        $valueRequest = [
                                '10' => $request[0]['qt_10'],
                                '20' => $request[0]['qt_20'],
                                '50' => $request[0]['qt_50'],
                                '100' => $request[0]['qt_100'],
                        ];
                        $valueFinal = Request::generateValueForCassete('adc', $valueTreasury, $valueRequest);
                        $balance = Request::gerateValueTotal($valueFinal);
                        Treasury::update()->set("a_10", $valueFinal['10'])
                        ->set("b_20", $valueFinal['20'])->set("c_50", $valueFinal['50'])
                        ->set("d_100", $valueFinal['100'])->set("balance", $balance)
                        ->where("id_shipping", $request[0]['id_destiny'])->execute();

                        $valueOrigin = [
                                '10' => $treasuryOrigin[0]['a_10'],
                                '20' => $treasuryOrigin[0]['b_20'],
                                '50' => $treasuryOrigin[0]['c_50'],
                                '100' => $treasuryOrigin[0]['d_100'],
                        ];

                        $valueFinal = Request::generateValueForCassete('sub', $valueOrigin, $valueRequest);
                        $balance = Request::gerateValueTotal($valueFinal);
                        Treasury::update()->set("a_10", $valueFinal['10'])
                        ->set("b_20", $valueFinal['20'])->set("c_50", $valueFinal['50'])
                        ->set("d_100", $valueFinal['100'])->set("balance", $balance)
                        ->where("id_shipping", $request[0]['id_origin'])->execute();
                    }
                    Request::update()->set('id_status', 2)
                    ->set('confirmed_value', $request[0]['value_total'])->where("id", $check)->execute();
                }
            }
        }
        if($date_final == ''){
            $requests = Request::select()->where('date_request', $date_initial)->execute();
            if(count($requests) == 0){
                $requests = null;
            }
        }else{
            $requests = Request::select()
            ->where('date_request', '>=', $date_initial)
            ->where('date_request', '<=', $date_final)->execute();
            if(count($requests) == 0){
                $requests = null;
            }
        }

       // echo "Acabou";
         $this->render('/request/request_view', [
            'title_page' => 'Pesquisa pedidos',
            'requests' => $requests,
            'date_initial' => $date_initial,
            'date_final' => $date_final,
         ]);
    }

    public function partialAction(){
       // print_r($_POST);die();
        $elements_checked = filter_input(INPUT_POST, 'checados');
        $date_initial = filter_input(INPUT_POST, 'date_initial');
        $date_final = filter_input(INPUT_POST, 'date_final');
        $values = filter_input(INPUT_POST, 'values');
        $new_values = explode('&', $values);

        $valueRequest = Request::generateValuesPartials($new_values);
         if($elements_checked !== ""){
            $elements_checked = explode(',', $elements_checked);
            foreach($elements_checked as  $check){
                $request = Request::select()->where("id", $check)->execute();
                if($request[0]['id_status'] == 1){
                    if($request[0]['id_destiny'] == 0){
                        $treasury = Treasury::select()
                        ->where("id_shipping", $request[0]['id_origin'])->execute();
                        if(count($treasury) > 0){
                            $valueTreasury = [
                                '10' => $treasury[0]['a_10'],
                                '20' => $treasury[0]['b_20'],
                                '50' => $treasury[0]['c_50'],
                                '100' => $treasury[0]['d_100'],   
                            ];
                            $valueFinal = Request::generateValueForCassete('adc', $valueTreasury, $valueRequest);
                            $balance = Request::gerateValueTotal($valueFinal);
                            Treasury::update()->set("a_10", $valueFinal['10'])
                            ->set("b_20", $valueFinal['20'])->set("c_50", $valueFinal['50'])
                            ->set("d_100", $valueFinal['100'])->set("balance", $balance)
                            ->where('id_shipping', $request[0]['id_origin'])->execute();
                        } else { // VERIFICAÇÃO SE A TRANSPORTADORA JA EXISTE
                             $treasuryDestiny = Treasury::select()->where("id_shipping", $request[0]['id_destiny'])->execute();
                            $treasuryOrigin = Treasury::select()->where("id_shipping", $request[0]['id_origin'])->execute();
                        
                            if(count($treasuryDestiny) == 0){
                                Treasury::insert([
                                    "id_shipping"=>$request[0]['id_destiny']
                                ])->execute();
                            }
                            $treasuryDestiny = Treasury::select()->where("id_shipping", $request[0]['id_destiny'])->execute();
                            $valueTreasury = [
                                '10' => $treasuryDestiny[0]['a_10'],
                                '20' => $treasuryDestiny[0]['b_20'],
                                '50' => $treasuryDestiny[0]['c_50'],
                                '100' => $treasuryDestiny[0]['d_100'],
                            ];

                            $valueFinal = Request::generateValueForCassete('adc', $valueTreasury, $valueRequest);
                            $balance = Request::gerateValueTotal($valueFinal);
                            Treasury::update()->set("a_10", $valueFinal['10'])
                            ->set("b_20", $valueFinal['20'])->set("c_50", $valueFinal['50'])
                            ->set("d_100", $valueFinal['100'])->set("balance", $balance)
                            ->where("id_shipping", $request[0]['id_destiny'])->execute();

                            $valueOrigin = [
                                '10' => $treasuryOrigin[0]['a_10'],
                                '20' => $treasuryOrigin[0]['b_20'],
                                '50' => $treasuryOrigin[0]['c_50'],
                                '100' => $treasuryOrigin[0]['d_100'],
                            ];

                            $valueFinal = Request::generateValueForCassete('sub', $valueOrigin, $valueRequest);
                            $balance = Request::gerateValueTotal($valueFinal);
                            Treasury::update()->set("a_10", $valueFinal['10'])
                            ->set("b_20", $valueFinal['20'])->set("c_50", $valueFinal['50'])
                            ->set("d_100", $valueFinal['100'])->set("balance", $balance)
                            ->where("id_shipping", $request[0]['id_origin'])->execute();

                        }// FIM DA VERIFICAÇÃO SE A TRANSPORTADORA EXISTE

                        $balance_final = Request::gerateValueTotal($valueRequest);
                        Request::update()->set('id_status', 2)->set('qt_10', $valueRequest['10'])
                        ->set('qt_20', $valueRequest['20'])->set('qt_50', $valueRequest['50'])
                        ->set('qt_100', $valueRequest['100'])
                    ->set('confirmed_value', $balance_final)->set('change_in_confirmation', 'Y')
                    ->where("id", $check)->execute();
                    } // FIM DA VERIF SE EXISTE DESTINO
                } // FIM DA VERIF. DO REQUEST STATUS
            }   
         }// FIM DA VERIFICAÇÃO SE SE EXISTE ITENS CHECADOS
         if($date_final == ''){
            $requests = Request::select()->where('date_request', $date_initial)->execute();
            if(count($requests) == 0){
                $requests = null;
            }
        }else{
            $requests = Request::select()
            ->where('date_request', '>=', $date_initial)
            ->where('date_request', '<=', $date_final)->execute();
            if(count($requests) == 0){
                $requests = null;
            }
        }

       // echo "Acabou";
         $this->render('/request/request_view', [
            'title_page' => 'Pesquisa pedidos',
            'requests' => $requests,
            'date_initial' => $date_initial,
            'date_final' => $date_final,
         ]);
    }

    public function view($args){
        if(!isset($args['id']) && $args['id'] == null){
            $this->render('/request',['error'=>'Precisamos de um ID para continuar']);
        }
        $request = Request::select()->where('id', $args['id'])->execute();
        if(count($request) == 0){
            $request = null;
        }else{
            $operationTypes = OperationType::select()->where('active', 'Y')->execute();
            if(count($operationTypes) == 0){
                $operationTypes = null;
            }
            $shippings = Shipping::select()->where('active', 'Y')->execute();
            if(count($shippings) == 0){
                $shippings = 0;
            }

            $orderTypes = OrderType::select()->where('active', 'Y')->execute();
            if(count($orderTypes) == 0){
                $order_types = null;
            }
        }

        $this->render('/request/request_view', [
            'title_page'=>'Vizualização Pedido',
            'request' => $request,
            'operation_types' => $operationTypes,
            'shippings' => $shippings,
            'order_types' => $orderTypes
        ]);
    }

    public function editAction($args){
        
    }

}