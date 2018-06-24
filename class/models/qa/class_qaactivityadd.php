<?php
function class_qaActivityAdd($UsersId, $Table, $Reference, $Description, $Details, $Status)
{
    $mysql_query    = "INSERT INTO qa_activity (UsersId, `Table`, Reference, Description, Details, `Status`) VALUES('$UsersId', '$Table', '$Reference', '$Description', '$Details', '$Status')";
    $mysql_database = CONFIG_MYSQLDB;
    $mysql_conn     = conn_mysql();
    $mysql_debug    = 0;
    $mysql_results  = class_mysql($mysql_query, $mysql_database, $mysql_conn, $mysql_debug);

    $results = $mysql_results;

    return $results;
}
