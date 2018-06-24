<?php
function class_qaCustomersContext($date, $period, $max)
{
    if ($date) {
        $date1      = date("Y-m-d", strtotime($date)); //Customer Last Date
        $date2      = date("Y-m-d"); //today
        $datediff   = class_diffDate($date1, $date2);
        $max_period = $period;
        $max_danger = $max;
        $context    = null;

        //determine visit
        if (date("W", strtotime($date1)) == date("W", strtotime($date2))) {
            $status  = CONTEXT_PRIMARY;
            $context = 'primary';
        } elseif ($date1 > $date2) {
            $status  = CONTEXT_INFO;
            $context = 'info';
        } else {
            //cuando un cliente tiene una visita asiganada y se encuntra dentro del periodo max
            if ($max_period > $datediff) {
                $status  = CONTEXT_SUCCESS;
                $context = 'success';
            }

            //cuando un cliente ha pasado el periodo max despues de su ultima fecha de visita
            if ($max_period < $datediff) {
                $status  = CONTEXT_WARNING;
                $context = 'warning';
            }

            //cuando un cliente ha sobrepasado el periodo max despues de su ultima fecha de visita
            if ($max_danger < $datediff) {
                $status  = CONTEXT_DANGER;
                $context = 'danger';
            }

            if ($max_period == 0) {
                $status  = CONTEXT_SUCCESS;
                $context = 'success';
            }
        }
    }

    $results = array('status' => $status, 'context' => $context);

    $results = class_array($results, 0);

    return $results;
}
