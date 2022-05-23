<?php
namespace src\controllers;

use \core\Controller;
use \src\models\Batch;
use \src\models\Batch_type as BatchType;
use \src\models\Batch_status as BatchStatus;

class BatchController extends Controller {

    public function index() {

        $baths = Batch::select()->execute();
        if(count($baths) == 0){
            $baths = null;
        }

        foreach($baths as $key => $bath){
            $status = BatchStatus::select()->where('id', $bath['id_type'])->execute();
            $baths[$key]['name_status'] = $status[0]['name'];
        }

        $this->render('batch' , [
            'title_page' => 'Lotes',
            'batchs' => $baths
        ]);
    }

    public function view($args){
       // print_r($args);die();
        if(isset($args['id']) && $args['id'] !== ''){
            $batch = Batch::select()->where('id', $args['id'])->execute();
            if(count($batch) == 0){
                $batch = null;
            }
           // print_r($batch);die();
            $batchStatus = BatchStatus::select()->where('id', $batch[0]['status'])->execute();
            $batchType = BatchType::select()->where('id', $batch[0]['id_type'])->execute();

            $allStatus = BatchStatus::select()->where('status', 'Y')->execute();
            if(count($allStatus) == 0){
                $allStatus = null;
            }

            $batch[0]['name_status'] = $batchStatus[0]['name'];
            $batch[0]['name_type'] = $batchType[0]['name'];
        }
        $this->render('/batch/batch_view', [
            'title_page' => 'Visualização de Lote',
            'batch' => $batch,
            'all_status' => $allStatus
        ]);
    }

}