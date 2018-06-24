<?php
function class_zonesList($ZonesId)
{
    if ($ZonesId == 'all') {
        $mysql_query = "SELECT z.* FROM admin_zones z";
    } elseif ($ZonesId) {
        $mysql_query = "SELECT z.* FROM admin_zones z WHERE z.ZonesId = $ZonesId";
    } else {
        $mysql_query = "SELECT z.* FROM admin_zones z WHERE z.ZonesId = 0";
    }
    $mysql_database = CONFIG_MYSQLDB;
    $mysql_conn     = conn_mysql();
    $mysql_debug    = 0;
    $mysql_results  = class_mysql($mysql_query, $mysql_database, $mysql_conn, $mysql_debug);

    $results = $mysql_results;

    return $results;
}
