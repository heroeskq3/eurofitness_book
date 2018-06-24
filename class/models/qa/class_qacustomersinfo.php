<?php
function class_qaCustomersInfo($Id)
{
    $mysql_query    = "SELECT p.* FROM qa_customers p WHERE p.Id = '$Id'";
    $mysql_database = CONFIG_MYSQLDB;
    $mysql_conn     = conn_mysql();
    $mysql_debug    = 0;
    $mysql_result   = class_mysql($mysql_query, $mysql_database, $mysql_conn, $mysql_debug);

    $results = $mysql_result;

    return $results;
}
