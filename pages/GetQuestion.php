<?php
header("content-type: application/json"); 
	$server = "localhost:3306";
	$username ="isensor";
	$password ="r3t1nAsc@|v";
	$day = $_GET["day"];
	$qnumber = $_GET["qnumber"];
	$con=mysql_connect($server, $username, $password);
	mysql_select_db("isensor_data",$con);
	$query = "SELECT * FROM `Coopetition_Puzzle_table` where Day = ".$day." and Qnumber =".$qnumber.";";
	$result = mysql_query($query,$con);
	$table ="";
	$table =$table."<table border='1'>
	<tr>	
	<th>Question</th>	
	</tr>";

	while($row = mysql_fetch_array($result))
  	{
  	$table =$table."<tr>";  	
  	$table =$table."<td>" . $row['Question'] . "</td>";  	
  	$table =$table."</tr>";
  	}
	$table =$table."</table>";
	mysql_close($con);
       //echo $table;

	// Create a generic object.
	// Assign it the properties of id (optional - id of target HTML element, from URL)
	// and 'message' - the feedback message we want the user to see.
	if (isset($_GET['id'])) $rtnjsonobj->id = $_GET['qnumber'];
	$rtnjsonobj->message = $table;

	// Wrap and write a JSON-formatted object with a function call, using the supplied value of parm 'callback' in the URL:
	echo $_GET['callback']. '('. json_encode($rtnjsonobj) . ')';    

?>