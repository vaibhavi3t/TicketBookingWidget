<?php
// open database connection
$linkID = @ mysql_connect("localhost", "root", "1234") or die("Could not connect to MySQL server");
@ mysql_select_db("tktbooking") or die("Could not select database");
		
?>