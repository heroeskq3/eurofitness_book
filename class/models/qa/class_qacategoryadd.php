<?php
function class_qaCategoryAdd($Name, $Status)
{
    $mysql_query    = "INSERT INTO qa_category (Name, `Status`) VALUES('$Name', '$Status')";
    $mysql_database = CONFIG_MYSQLDB;
    $mysql_conn     = conn_mysql();
    $mysql_debug    = 0;
    $mysql_results  = class_mysql($mysql_query, $mysql_database, $mysql_conn, $mysql_debug);

    $results = $mysql_results;

    return $results;
}
