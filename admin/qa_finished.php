<?php
//Section Parameters
$sectionParams = array(
    'tittle'      => 'QA - Terminar Visita',
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
        require_once '../class/views/qa/finished/qa_finished.php';
        break;
}

require_once 'footer.php';
