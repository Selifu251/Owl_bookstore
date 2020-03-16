<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_webalbumSQL = "127.0.0.1";
$database_webalbumSQL = "webalbum";
$username_webalbumSQL = "admin";
$password_webalbumSQL = "111111";
$webalbumSQL = mysql_pconnect($hostname_webalbumSQL, $username_webalbumSQL, $password_webalbumSQL) or trigger_error(mysql_error(),E_USER_ERROR); 
mysql_query("set names utf8");
?>