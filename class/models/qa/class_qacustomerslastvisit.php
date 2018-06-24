<?php
function class_qaCustomersLastVisit($CustomersId, $LastVisit)
{
    $mysql_query    = "UPDATE qa_customers SET LastVisit = '$LastVisit' WHERE Id = $CustomersId";
    $mysql_database = CONFIG_MYSQLDB;
    $mysql_conn     = conn_mysql();
    $mysql_debug    = 0;
    $mysql_results  = class_mysql($mysql_query, $mysql_database, $mysql_conn, $mysql_debug);

    $results = $mysql_results;

    return $results;
}
