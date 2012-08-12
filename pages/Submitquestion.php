<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
//echo 'Hello ' . htmlspecialchars($_GET["id"]) . '!';
try {


$question = $_GET["question"];
$answer = $_GET["answer"];
$day = $_GET["day"];
$qnumber= $_GET["qnumber"];
    $server = "localhost:3306";
    $username ="isensor";
    $password ="r3t1nAsc@|v";
    $con = mysql_connect($server, $username, $password);	
	$db = mysql_select_db("isensor_data", $con);
	$query = "insert into  Coopetition_Puzzle_table(Question, Answer,Day,Qnumber)  values('".$question."','".$answer."',".$day.",".$qnumber.")";
	echo $query;	
       $result = mysql_query($query);
   	echo "done";
	mysql_close($con);
}
catch (Exception $e) {
    echo 'Caught exception: '.$e->getMessage()."\n";
}
?>
