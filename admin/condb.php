<?php
session_start();
$hostname_surachet = "localhost";
$database_surachet = "surache1_64r2g2";
$username_surachet = "surache1_64r2g2";
$password_surachet = "cd5678";
$surachet = mysql_pconnect($hostname_surachet, $username_surachet, $password_surachet) or trigger_error(mysql_error(),E_USER_ERROR);
mysql_select_db($database_surachet, $surachet);


?>