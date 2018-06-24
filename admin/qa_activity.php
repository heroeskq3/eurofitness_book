<?php
//Section Parameters
$sectionParams = array(
    'tittle'      => 'QA - Actividades',
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
        require_once '../class/views/qa/activity/qa_activitylist.php';
        break;
    case 'check':
        require_once '../class/views/qa/activity/qa_activitycheck.php';
        break;
}

require_once 'footer.php';
