<?php
function class_reportsStatus($array)
{
    if ($array) {
        $array_key = array_keys(current($array));

        $results = array();
        foreach ($array_key as $key => $row) {

            $results[] = $array_key;
        }
    }
    return $results;
}
