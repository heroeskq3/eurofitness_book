<?php
function class_qaScheduleList($date)
{
	$mysql_query    = "SELECT a.DateSet AS Date ,b.State AS Zone ,b.FullName AS Customer ,COUNT(1) AS Qnty FROM qa_appointments a INNER JOIN qa_customers b ON b.Id = a.CustomersId WHERE a.DateSet = '$date' GROUP BY a.DateSet, b.State, b.Id";
    $mysql_database = CONFIG_MYSQLDB;
    $mysql_conn     = conn_mysql();
    $mysql_debug    = 0;
    $mysql_results  = class_mysql($mysql_query, $mysql_database, $mysql_conn, $mysql_debug);

    $results = $mysql_results;

    return $results;
}
