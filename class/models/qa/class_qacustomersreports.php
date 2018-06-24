<?php
function class_qaCustomersReports($ReportType)
{
    if($ReportType){
    	$mysql_query    = "SELECT a.$ReportType AS Description, COUNT(1) AS Qnty FROM qa_customers a GROUP BY $ReportType";
    }else{
    	$mysql_query    = "SELECT a.* FROM qa_customers a";
    }
 
    $mysql_database = CONFIG_MYSQLDB;
    $mysql_conn     = conn_mysql();
    $mysql_debug    = 0;
    $mysql_results  = class_mysql($mysql_query, $mysql_database, $mysql_conn, $mysql_debug);

    $results = $mysql_results;

    return $results;
}
