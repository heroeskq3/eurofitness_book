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
?>
<?php
require_once 'filter_qacustomers.php';
require_once 'reports_qacustomers.php';

require_once 'footer.php';