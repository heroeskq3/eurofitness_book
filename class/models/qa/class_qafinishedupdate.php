<?php
function class_qaFinishedUpdate($AppointmentsId, $Details, $Status)
{
    $mysql_query    = "UPDATE qa_appointments SET Details = '$Details', Status = '$Status' WHERE Id = $AppointmentsId";
    $mysql_database = CONFIG_MYSQLDB;
    $mysql_conn     = conn_mysql();
    $mysql_debug    = 0;
    $mysql_results  = class_mysql($mysql_query, $mysql_database, $mysql_conn, $mysql_debug);

    $results = $mysql_results;

    return $results;
}
