<?php function class_infoDay($i)
{
	$results = null;
	switch ($i) {
	    case 'Monday':
	        $results = LANG_MONDAY;
	        break;
	    case 'Tuesday':
	        $results = LANG_TUESDAY;
	        break;
	    case 'Wednesday':
	        $results = LANG_WEDNESDAY;
	        break;
	    case 'Thursday':
	        $results = LANG_THURSDAY;
	        break;
	    case 'Friday':
	        $results = LANG_FRIDAY;
	        break;
	    case 'Saturday':
	        $results = LANG_SATURDAY;
	        break;
	    case 'Sunday':
	        $results = LANG_SUNDAY;
	        break;
	}
return $results;
}
