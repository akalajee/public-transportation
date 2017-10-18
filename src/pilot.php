<?php

/**
 * this is the main file
 * to run the application
 * it simply creates the transportationUtility
 * loads the data, and runs the script
 *
 * @version  $Revision: 1.0 $
 * @access   public
 */
ini_set('display_errors', 'On');

require_once 'transportationUtility.php';

$boarding_cards_param = require_once '../data.php';

$transportation_utlity = new transportationUtility();
echo $transportation_utlity->boarding_api($boarding_cards_param);
