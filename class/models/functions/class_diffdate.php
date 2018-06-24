<?php
function class_diffDate($start, $end)
{
    $datetime1 = date_create($start);
    $datetime2 = date_create($end);
    $interval  = date_diff($datetime1, $datetime2);
    return $interval->format('%R%a');
}
