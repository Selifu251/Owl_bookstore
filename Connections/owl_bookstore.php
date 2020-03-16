<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_owl_bookstore = "127.0.0.1";
$database_owl_bookstore = "owl_bookstore";
$username_owl_bookstore = "obuser";
$password_owl_bookstore = "123";
$owl_bookstore = mysql_pconnect($hostname_owl_bookstore, $username_owl_bookstore, $password_owl_bookstore) or trigger_error(mysql_error(),E_USER_ERROR); 
mysql_query("set names utf8");
?>