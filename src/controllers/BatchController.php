<?php
namespace src\controllers;

use \core\Controller;
use \src\models\Batch;
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

}