<?php
$connect2 = mysql_connect("localhost", "root", "1234");
$database1 = "db1"; // destination database
mysql_select_db($database1, $connect2);
set_time_limit(0);

$database = 'db2'; //original database
$connect = mysql_connect("localhost", "root", "1234");

mysql_select_db($database, $connect);

$tables = mysql_query("SHOW TABLES FROM $database");

while ($line = mysql_fetch_row($tables)) {
    $tab = $line[0];
    mysql_query("DROP TABLE IF EXISTS $database1.$tab");
    mysql_query("CREATE TABLE $database1.$tab LIKE $database.$tab") or die(mysql_error());

    mysql_query("INSERT INTO db1.csvv SELECT * FROM db2.csv");

}
?>
