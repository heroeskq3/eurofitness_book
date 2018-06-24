<?php
function class_qaClassesUpdate($Id, $Name, $Period, $Status)
{
    $mysql_query    = "UPDATE qa_classes SET Name = '$Name', Period = '$Period', Status = '$Status' WHERE Id = $Id";
    $mysql_database = CONFIG_MYSQLDB;
    $mysql_conn     = conn_mysql();
    $mysql_debug    = 0;
    $mysql_results  = class_mysql($mysql_query, $mysql_database, $mysql_conn, $mysql_debug);

    $results = $mysql_results;

    return $results;
}
