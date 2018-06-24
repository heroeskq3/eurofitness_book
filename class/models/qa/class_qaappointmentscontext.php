<?php
function class_qaAppointmentsContext($array)
{
    if($array){

        $results = array();
        foreach ($array as $key_array => $row_array) {

                //$array_status = array('estado2' => 'prueba');

                $results[] = array_push($array, 'test');

                //$results[] = $row_array;
        }

    }else{
        $results = $array;
    }
    $results = class_array($results, 0);

    return $results;
}
