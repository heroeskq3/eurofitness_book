<?php
function class_qaAppointmentsStatus($array)
{

    $results = array();
    foreach ($array as $key_array => $row_array) {

        switch ($row_array['Status']) {
            case 0:
                $status = 'Desactivada';
                break;
            case 1:
                $status = 'Terminada';
                break;
            case 2:
                $status = 'En Proceso'; //caducada when date > datenow
                break;
            case 3:
                $status = 'Cancelada';
                break;
            default:
                $status = $row_array['Status'];
                break;
        }
        $array_status = array('Status' => $status);
        $results[]    = array_merge($row_array, $array_status);
    }

    $results = class_array($results, 0);
    return $results;
}
