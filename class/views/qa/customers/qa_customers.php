<?php
//Section Parameters
$section_tittle      = "Clientes";
$section_description = null;
$section_restrict    = 1;
$section_navbar      = 1;
$section_sidebar     = 1;
$section_searchbar   = 0;
$section_style       = 1;
$section_homedir     = '../';

require_once 'header.php';

switch ($action) {
    default:
        require_once 'qa_customerslist.php';
        break;
    case 'add':
        require_once 'qa_customersadd.php';
        break;
    case 'update':
        require_once 'qa_customersupdate.php';
        break;
    case 'delete':
        require_once 'qa_customersdelete.php';
        break;
    case 'schedule':
        header('Location: qa_appointments.php?action=add&Id=' . $Id);
        break;
}

require_once 'footer.php';
