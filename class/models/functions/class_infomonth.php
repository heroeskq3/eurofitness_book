<?php function class_infoMonth($i)
{
	$results = null;
	switch ($i) {
	    case 01:
	        $results = LANG_JANUARY;
	        break;
	    case 02:
	        $results = LANG_FEBRUARY;
	        break;
	    case 03:
	        $results = LANG_MARCH;
	        break;
	    case 04:
	        $results = LANG_APRIL;
	        break;
	    case 05:
	        $results = LANG_MAY;
	        break;
	    case 06:
	        $results = LANG_JUNE;
	        break;
	    case 07:
	        $results = LANG_JULY;
	        break;
	    case 08:
	        $results = LANG_AUGUST;
	        break;
	    case 09:
	        $results = LANG_SEPTEMBER;
	        break;
	    case 10:
	        $results = LANG_OCTOBER;
	        break;
	    case 11:
	        $results = LANG_NOVEMBER;
	        break;
	    case 12:
	        $results = LANG_DECEMBER;
	        break;
	}
return $results;
}
