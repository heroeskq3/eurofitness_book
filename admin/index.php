<?php
header("Refresh:120");

//Section Parameters
$sectionParams = array(
    'tittle'      => 'Bienvenido!',
    'description' => '',
    'homedir'     => '../',
    'restrict'    => true,
    'navbar'      => true,
    'sidebar'     => true,
    'searchbar'   => false,
    'style'       => true,
    'debug'       => false,
);
require_once 'header.php';

switch ($action) {
    default:
        require_once '../class/views/dashboard/dashboard.php';
        break;
}

require_once 'footer.php';
