<?php
namespace src\models;
use \core\Model;

class Request extends Model {

    public static function gerateValueTotal($arrayValues){
        $value_total = 0;
        foreach($arrayValues as $key => $value){
            $value_total = $value_total + ($value * $key);
        }
        return $value_total;
    }

    public static function generateValueForCassete($operator, $valuesTreasury, $valuesRequest){
        $return = [];
        switch($operator){
            case 'adc':
                foreach($valuesTreasury as $key => $value){
                    $return[$key] = $value +  $valuesRequest[$key]; 
                }       
            break;
            case 'sub':
                foreach($valuesTreasury as $key => $value){
                    $return[$key] = $value -  $valuesRequest[$key]; 
                }
            break;
        }
        return $return;
    }
}