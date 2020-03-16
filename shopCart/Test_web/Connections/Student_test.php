<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_Student_test = "127.0.0.1";
$database_Student_test = "students";
$username_Student_test = "admin";
$password_Student_test = "111111";
$Student_test = mysql_pconnect($hostname_Student_test, $username_Student_test, $password_Student_test) or trigger_error(mysql_error(),E_USER_ERROR); 
mysql_query("set names utf8");
?>