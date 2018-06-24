<?php
/*
Filtra un Array
$surveyzoneslist = class_arrayFilter($surveyzoneslist, 'Status', '1', '=');
 */
function class_arrayFilter($array, $field, $value, $condition)
{
    //equal
    if ($condition == '=') {
        $condition_1 = true;
        $condition_2 = false;
        $condition_3 = false;
        $condition_4 = false;
    }
    //mayor igual que
    if ($condition == '>=') {
        $condition_1 = false;
        $condition_2 = false;
        $condition_3 = true;
        $condition_4 = false;

    }

    //special all
    if ($condition == 'all') {
        $condition_1 = true;
        $condition_2 = true;
        $condition_3 = false;
        $condition_4 = false;
    }
    //special all
    if ($condition == 'contains') {
        $condition_1 = false;
        $condition_2 = false;
        $condition_3 = false;
        $condition_4 = true;
    }

    if ($array) {
        $array_filter = array();
        foreach ($array as $row) {



            //Condition 1
            if ($condition_1) {
                if ($row[$field] == $value) {
                    $array_filter[] = $row;
                }
            }

            //Condition 2
            if ($condition_2) {
                if ($row[$field] == 0) {
                    $array_filter[] = $row;
                }
            }
            //Condition 3
            if ($condition_3) {
                if ($row[$field] >= $value) {
                    $array_filter[] = $row;
                }
            }
            //Condition 4
            if ($condition_4) {
                foreach ($row as $key_condition => $row_condition) {
                    if ((@ereg("^" . $value . "", $row[$key_condition]))) {
                        $array_filter[] = $row;
                    }
                }
            }

        }
        $debug = 0;

        $results = class_array($array_filter, $debug);
    } else {
        $results = null;
    }

    return $results;
}
