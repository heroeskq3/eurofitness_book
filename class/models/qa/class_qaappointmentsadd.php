<?php
function class_qaAppointmentsAdd($UsersId, $CustomersId, $DateSet, $TimeSet, $Details, $Status)
{
    $mysql_query    = "INSERT INTO qa_appointments (UsersId, CustomersId, DateSet, TimeSet, Details, `Status`) VALUES('$UsersId', '$CustomersId', '$DateSet', '$TimeSet', '$Details', '$Status')";
    $mysql_database = CONFIG_MYSQLDB;
    $mysql_conn     = conn_mysql();
    $mysql_debug    = 0;
    $mysql_results  = class_mysql($mysql_query, $mysql_database, $mysql_conn, $mysql_debug);

    $results = $mysql_results;

    return $results;
}
