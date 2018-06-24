<?php
function class_qaCustomersAdd($CategoryId, $UsersId, $ClassesId, $FullName, $Phone, $Phone2, $Contact, $Mobile, $Email, $Country, $State, $City, $Address, $Status)
{
    $mysql_query    = "INSERT INTO qa_customers (CategoryId, UsersId, ClassesId, FullName, Phone, Phone2, Contact, Mobile, Email, Country, State, City, Address, `Status`) VALUES('$CategoryId', '$UsersId', '$ClassesId', '$FullName', '$Phone', '$Phone2', '$Contact', '$Mobile', '$Email', '$Country', '$State', '$City', '$Address','$Status')";
    $mysql_database = CONFIG_MYSQLDB;
    $mysql_conn     = conn_mysql();
    $mysql_debug    = 0;
    $mysql_results  = class_mysql($mysql_query, $mysql_database, $mysql_conn, $mysql_debug);

    $results = $mysql_results;

    return $results;
}
