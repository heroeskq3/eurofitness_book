<?php
//Section Parameters
$sectionParams = array(
    'tittle'      => 'QA - Transferencias de Clientes',
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

//methods
switch ($action) {

    default:
        require_once '../class/views/qa/transfers/qa_transfersadd.php';
        break;
}

require_once 'footer.php';
