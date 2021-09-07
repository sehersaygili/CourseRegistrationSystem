<?php
	$host = "localhost";
	$db_name = "course_reg";
	$db_user = "root";
	$db_passwd = "toor";

	try {
		$db=new PDO("mysql:host=$host;dbname=$db_name;charset=utf8",$db_user,$db_passwd);
	}

	catch (PDOExpception $e) {
		echo $e->getMessage();
	}
?>
