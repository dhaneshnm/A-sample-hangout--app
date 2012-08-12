<?php
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
       echo $table;

?>
