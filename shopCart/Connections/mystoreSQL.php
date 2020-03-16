<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_mystoreSQL = "127.0.0.1";
$database_mystoreSQL = "mystore";
$username_mystoreSQL = "root";
$password_mystoreSQL = "";
$mystoreSQL = mysql_pconnect($hostname_mystoreSQL, $username_mystoreSQL, $password_mystoreSQL) or trigger_error(mysql_error(),E_USER_ERROR); 
mysql_query("set names big5");
?>