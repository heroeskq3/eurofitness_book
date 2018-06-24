<?php
function class_qaTransfersUpdate($CustomersId, $UsersId, $Status)
{
    $mysql_query    = "UPDATE qa_customers SET UsersId = '$UsersId', Status = '$Status' WHERE Id = $CustomersId";
    $mysql_database = CONFIG_MYSQLDB;
    $mysql_conn     = conn_mysql();
    $mysql_debug    = 0;
    $mysql_results  = class_mysql($mysql_query, $mysql_database, $mysql_conn, $mysql_debug);

    $results = $mysql_results;

    return $results;
}
