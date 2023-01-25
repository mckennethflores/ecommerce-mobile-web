<?php

$stop_date = '2009-09-30 20:24:00';
echo 'date before day adding: ' . $stop_date; 
$stop_date = date('Y-m-d H:i:s', strtotime($stop_date . ' +1 day'));
echo 'date after adding 1 day: ' . $stop_date;