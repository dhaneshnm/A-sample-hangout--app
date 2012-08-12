<?php
	$server = "localhost:3306";
	$username ="isensor";
	$password ="r3t1nAsc@|v";
	$con=mysql_connect($server, $username, $password);
	mysql_select_db("isensor_data",$con);
	$query = "SELECT * FROM `Coopetition_Puzzle_table`;";
	$result = mysql_query($query,$con);
	$table ="";
	$table =$table."<table border='1'>
	<tr>
	<th>Id</th>
	<th>Question</th>
	<th>Answer</th>
	<th>Day</th>
	<th>Qnumber</th>
	</tr>";

	while($row = mysql_fetch_array($result))
  	{
  	$table =$table."<tr>";
  	$table =$table."<td>" . $row['Id'] . "</td>";
  	$table =$table."<td>" . $row['Question'] . "</td>";
  	$table =$table."<td>" . $row['Answer'] . "</td>";
  	$table =$table."<td>" . $row['Day'] . "</td>";
	$table =$table."<td>" . $row['Qnumber'] . "</td>";
  	$table =$table."</tr>";
  	}
	$table =$table."</table>";
	mysql_close($con);
       echo $table;

?>
