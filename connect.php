<?php
$hostname="localhost";
$db="calc";
$table_Traf="rates";
$table_Dis="discounts";
$table_Center="orders_center";
$table_Admin="orders_administrator";
$adm="1";
$ps="1";
$username="root";
$pass="";
mysql_connect($hostname,$username,$pass) or die ("Не удалось соединиться: ".mysql_error()); 
mysql_query('SET NAMES utf8');
mysql_select_db($db) or die("Не удалось соединиться: ".mysql_error());  
?>