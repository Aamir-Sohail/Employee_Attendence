<?php
include 'include/auth.php';
$cuser = new auth();
$result = $cuser->select_holiday_to_calender();
$result1 = json_encode($result);    
print_r($result1) ;

?>
