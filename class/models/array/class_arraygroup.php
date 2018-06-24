<?php
function class_arrayGroup($array, $array_key)
{
    $results = null;
    if ($array && $array_key) {
        $resume = $array_key;

        if ($resume) {
            $array_count = array();
            foreach ($array as $key => $row) {
                $array_count[] = htmlspecialchars($row[$resume]);
            }

            $array_count = array_count_values($array_count);

            $array_resume = array();
            foreach ($array_count as $key => $row) {
                $row_percentage = round(($row / count($array)) * 100, 2);
                $array_resume[] = array($array_key => $key, 'Cantidad' => $row, 'Porcentaje' => $row_percentage . '%');
            }

            $debug   = 0;
            $results = class_array($array_resume, $debug);

        } else {
            $results = $array;
        }
    }

    return $results;
}
