<?php
//Section Parameters
$sectionParams = array(
    'tittle'      => 'Cronograma Semanal de Visitas',
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
        require_once '../class/views/reports/qa/qa_schedule.php';
        break;
}

require_once 'footer.php';
