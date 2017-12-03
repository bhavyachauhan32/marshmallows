<?php
	/**********MYSQL Settings****************/
	$host="sql213.epizy.com";
	$db_name="epiz_21161232_virtualrj";
	$user="epiz_21161232";
	$pass="242892";
	/**********MYSQL Settings****************/
	$conn=mysql_connect($host,$user,$pass);
	if($conn)
	{
	$db_selected = mysql_select_db($db_name, $conn);
	if (!$db_selected) {
	    die ('Can\'t use foo : ' . mysql_error());
	}
	}
	else
	{
	    die('Not connected : ' . mysql_error());
	
	}

	
	?>