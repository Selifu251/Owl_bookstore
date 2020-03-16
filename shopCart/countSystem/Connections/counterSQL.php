<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_counterSQL = "127.0.0.1";
$database_counterSQL = "webcounter";
$username_counterSQL = "admin";
$password_counterSQL = "111111";
$counterSQL = mysql_pconnect($hostname_counterSQL, $username_counterSQL, $password_counterSQL) or trigger_error(mysql_error(),E_USER_ERROR); 
mysql_query("set names big5");
?>