<?php
namespace src\models;
use \core\Model;

class Request extends Model {

    public static function gerateValueTotal($arrayValues){
        $value_total = 0;
        foreach($arrayValues as $key => $value){
            $value_total = $value_total + ($value * $key);
        }
        return number_format($value_total, 2);
    }
}