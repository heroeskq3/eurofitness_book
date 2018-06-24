<?php
//SYSTEM
$namespace = 'mysql';
require_once PATH_MODELS . $namespace . '/class_mysql.php';
require_once PATH_MODELS . $namespace . '/class_conn.php';

$namespace = 'login';
require_once PATH_MODELS . $namespace . '/class_login.php';

$namespace = 'token';
require_once PATH_MODELS . $namespace . '/class_token.php';

$namespace = 'functions';
require_once PATH_MODELS . $namespace . '/class_sumavalor.php';
require_once PATH_MODELS . $namespace . '/class_statusInfo.php';
require_once PATH_MODELS . $namespace . '/class_infosino.php';
require_once PATH_MODELS . $namespace . '/class_statusIcon.php';
require_once PATH_MODELS . $namespace . '/class_statusperiod.php';
require_once PATH_MODELS . $namespace . '/class_infomonth.php';
require_once PATH_MODELS . $namespace . '/class_infoday.php';
require_once PATH_MODELS . $namespace . '/class_diffdate.php';

//SCRIPTS
$namespace = 'scripts';
require_once PATH_MODELS . $namespace . '/class_scripts.php';

//TEMPLATE
$namespace = 'contents';
require_once PATH_MODELS . $namespace . '/class_contentarea.php';

$namespace = 'modals';
require_once PATH_MODELS . $namespace . '/class_modals.php';

$namespace = 'api';
require_once PATH_MODELS . $namespace . '/class_api.php';

$namespace = 'array';
require_once PATH_MODELS . $namespace . '/class_array.php';
require_once PATH_MODELS . $namespace . '/class_arrayfilter.php';
require_once PATH_MODELS . $namespace . '/class_arraylimit.php';
require_once PATH_MODELS . $namespace . '/class_arrayrandom.php';
require_once PATH_MODELS . $namespace . '/class_arraysort.php';
require_once PATH_MODELS . $namespace . '/class_arraygroup.php';

//CONFIG
$namespace = 'lang';
require_once PATH_MODELS . $namespace . '/class_lang.php';

//SITES
$namespace = 'sites';
require_once PATH_MODELS . $namespace . '/class_sitesinfo.php';
require_once PATH_MODELS . $namespace . '/class_siteslist.php';
require_once PATH_MODELS . $namespace . '/class_sitesadd.php';
require_once PATH_MODELS . $namespace . '/class_sitesdelete.php';
require_once PATH_MODELS . $namespace . '/class_sitesupdate.php';

//USERS
$namespace = 'users';
require_once PATH_MODELS . $namespace . '/class_usersinfo.php';
require_once PATH_MODELS . $namespace . '/class_userslist.php';
require_once PATH_MODELS . $namespace . '/class_usersadd.php';
require_once PATH_MODELS . $namespace . '/class_usersdelete.php';
require_once PATH_MODELS . $namespace . '/class_usersupdate.php';
require_once PATH_MODELS . $namespace . '/class_userspasswordupdate.php';

//USERSTYPE
$namespace = 'userstype';
require_once PATH_MODELS . $namespace . '/class_userstypeinfo.php';
require_once PATH_MODELS . $namespace . '/class_userstypeadd.php';
require_once PATH_MODELS . $namespace . '/class_userstypeupdate.php';
require_once PATH_MODELS . $namespace . '/class_userstypedelete.php';
require_once PATH_MODELS . $namespace . '/class_userstypelist.php';

//USERSDETAILS
$namespace = 'usersdetails';
require_once PATH_MODELS . $namespace . '/class_usersdetailsadd.php';
require_once PATH_MODELS . $namespace . '/class_usersdetailsupdate.php';
require_once PATH_MODELS . $namespace . '/class_usersdetailsdelete.php';
require_once PATH_MODELS . $namespace . '/class_usersdetailsinfo.php';
require_once PATH_MODELS . $namespace . '/class_usersdetailslist.php';

//COUNTRY
$namespace = 'country';
require_once PATH_MODELS . $namespace . '/class_countrylist.php';
require_once PATH_MODELS . $namespace . '/class_statelist.php';

//MENUASSIDE
$namespace = 'asside';
require_once PATH_MODELS . $namespace . '/class_assidemenulist.php';
require_once PATH_MODELS . $namespace . '/class_assidesubmenulist.php';
require_once PATH_MODELS . $namespace . '/class_assideprivilegeslist.php';

//DEBUGGER
$namespace = 'debug';
require_once PATH_MODELS . $namespace . '/class_debug.php';
require_once PATH_MODELS . $namespace . '/class_phperror.php';

//UPLOADFILES
$namespace = 'upload';
require_once PATH_MODELS . $namespace . '/class_filesupload.php';

//FORMS
$namespace = 'forms';
require_once PATH_MODELS . $namespace . '/class_formgenerator.php';
require_once PATH_MODELS . $namespace . '/class_formgenerator2.php';
require_once PATH_MODELS . $namespace . '/class_formsurvey.php';
require_once PATH_MODELS . $namespace . '/class_forminput.php';
require_once PATH_MODELS . $namespace . '/class_formscripts.php';
require_once PATH_MODELS . $namespace . '/class_formbuttons.php';
require_once PATH_MODELS . $namespace . '/class_formbuttonstype.php';

//TABLES
$namespace = 'tables';
require_once PATH_MODELS . $namespace . '/class_tablegenerator.php';
require_once PATH_MODELS . $namespace . '/class_tablegenerator3.php';
require_once PATH_MODELS . $namespace . '/class_tablepager.php';
require_once PATH_MODELS . $namespace . '/class_tablemain.php';
require_once PATH_MODELS . $namespace . '/class_tablechilds.php';
require_once PATH_MODELS . $namespace . '/class_tablescripts.php';
require_once PATH_MODELS . $namespace . '/class_datatable.php';
require_once PATH_MODELS . $namespace . '/class_tablemenulist.php';
require_once PATH_MODELS . $namespace . '/class_tablesubmenulist.php';
require_once PATH_MODELS . $namespace . '/class_tableuserslist.php';
require_once PATH_MODELS . $namespace . '/class_tableuserstypelist.php';

//MENU
$namespace = 'menu';
require_once PATH_MODELS . $namespace . '/class_menulist.php';
require_once PATH_MODELS . $namespace . '/class_menuinfo.php';
require_once PATH_MODELS . $namespace . '/class_menuadd.php';
require_once PATH_MODELS . $namespace . '/class_menudelete.php';
require_once PATH_MODELS . $namespace . '/class_menuupdate.php';
require_once PATH_MODELS . $namespace . '/class_submenulist.php';
require_once PATH_MODELS . $namespace . '/class_iconslist.php';

//PRIVILEGES
$namespace = 'privileges';
require_once PATH_MODELS . $namespace . '/class_privilegesinfo.php';
require_once PATH_MODELS . $namespace . '/class_privilegeslist.php';
require_once PATH_MODELS . $namespace . '/class_privilegesadd.php';
require_once PATH_MODELS . $namespace . '/class_privilegesupdate.php';
require_once PATH_MODELS . $namespace . '/class_privilegesdelete.php';

//WELL
$namespace = 'well';
require_once PATH_MODELS . $namespace . '/class_wellgenerator.php';

//reports
$namespace = 'reports';
require_once PATH_MODELS . $namespace . '/class_reportssearchbar.php';
require_once PATH_MODELS . $namespace . '/class_reportsfilterbar.php';
require_once PATH_MODELS . $namespace . '/class_reportsgenerator.php';
require_once PATH_MODELS . $namespace . '/class_reportsgenerator2.php';
require_once PATH_MODELS . $namespace . '/class_reportstable.php';
require_once PATH_MODELS . $namespace . '/class_reportsresume.php';
require_once PATH_MODELS . $namespace . '/class_reportsquery.php';
require_once PATH_MODELS . $namespace . '/class_reportsstatus.php';
require_once PATH_MODELS . $namespace . '/class_reportssearch.php';
require_once PATH_MODELS . $namespace . '/class_reportsorder.php';
require_once PATH_MODELS . $namespace . '/class_reportslimit.php';

//site
$namespace = 'survey/site/';
require_once PATH_MODELS . $namespace . 'class_headersteps.php';
require_once PATH_MODELS . $namespace . 'class_survey.php';

//qacustomers
$namespace = 'qa';
require_once PATH_MODELS . $namespace . '/class_qacustomersinfo.php';
require_once PATH_MODELS . $namespace . '/class_qacustomerslist.php';
require_once PATH_MODELS . $namespace . '/class_qacustomersadd.php';
require_once PATH_MODELS . $namespace . '/class_qacustomersupdate.php';
require_once PATH_MODELS . $namespace . '/class_qacustomersdelete.php';
require_once PATH_MODELS . $namespace . '/class_qacustomerslastvisit.php';
require_once PATH_MODELS . $namespace . '/class_qacustomerscontext.php';

//qaclasses
require_once PATH_MODELS . $namespace . '/class_qaclassesinfo.php';
require_once PATH_MODELS . $namespace . '/class_qaclasseslist.php';
require_once PATH_MODELS . $namespace . '/class_qaclassesadd.php';
require_once PATH_MODELS . $namespace . '/class_qaclassesupdate.php';
require_once PATH_MODELS . $namespace . '/class_qaclassesdelete.php';

//qaappointments
require_once PATH_MODELS . $namespace . '/class_qaappointmentsinfo.php';
require_once PATH_MODELS . $namespace . '/class_qaappointmentslist.php';
require_once PATH_MODELS . $namespace . '/class_qaappointmentsadd.php';
require_once PATH_MODELS . $namespace . '/class_qaappointmentsupdate.php';
require_once PATH_MODELS . $namespace . '/class_qaappointmentsdelete.php';
require_once PATH_MODELS . $namespace . '/class_qaappointmentsstatus.php';

//qaschedule
require_once PATH_MODELS . $namespace . '/class_qaschedulelist.php';

//qacategory
require_once PATH_MODELS . $namespace . '/class_qacategoryinfo.php';
require_once PATH_MODELS . $namespace . '/class_qacategorylist.php';
require_once PATH_MODELS . $namespace . '/class_qacategoryadd.php';
require_once PATH_MODELS . $namespace . '/class_qacategoryupdate.php';
require_once PATH_MODELS . $namespace . '/class_qacategorydelete.php';

//qaactivity
require_once PATH_MODELS . $namespace . '/class_qaactivityadd.php';
require_once PATH_MODELS . $namespace . '/class_qaactivityupdate.php';
require_once PATH_MODELS . $namespace . '/class_qaactivitylist.php';
require_once PATH_MODELS . $namespace . '/class_qaactivitypending.php';

//qatransfers
require_once PATH_MODELS . $namespace . '/class_qatransfersupdate.php';

//qafinished
require_once PATH_MODELS . $namespace . '/class_qafinishedupdate.php';

//reports
require_once PATH_MODELS . $namespace . '/class_qacustomersreports.php';

//zones
$namespace = 'zones/';
require_once PATH_MODELS . $namespace . 'class_zonesinfo.php';
require_once PATH_MODELS . $namespace . 'class_zoneslist.php';
require_once PATH_MODELS . $namespace . 'class_zonesadd.php';
require_once PATH_MODELS . $namespace . 'class_zonesupdate.php';
require_once PATH_MODELS . $namespace . 'class_zonesdelete.php';
