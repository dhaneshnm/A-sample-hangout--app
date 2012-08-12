<HTML>
<head>
<script type="text/javascript" src="//www.google.com/jsapi"></script>
<script type="text/javascript">google.load("jquery", "1.4.1");</script>
<script src="//hangoutsapi.talkgadget.google.com/hangouts/api/hangout.js?v=0.2"></script>
<script type="text/javascript">
	$(document).ready(function()
	{
               loadQuestiontable();
		 
		 $("#submitquestion").click(function()
			{
				submitQuestion();
	
			});
		$("#setQuestion").click(function()
			{
				setHangoutlink();
	
			});

             
	});

	function submitQuestion()
		{
 			var url2 = "Submitquestion.php?question='whatsup?'&&answer='sky'&&day=4";
			alert("...submitting..please wait...");
			var question = $("#txtnewquestion").val();
			var answer = $("#txtanswer").val();
			var day    = $("#day").val();
			var qnumber = $("#qnumber").val();		 
			var data ="Submitquestion.php?question="+question+"&&answer="+answer+"&&day="+day+"&&qnumber="+qnumber ;                     
			 var xmlhttp=new XMLHttpRequest();
			 xmlhttp.open("POST",data,true);
			 xmlhttp.send();
			loadQuestiontable();
		}


		function loadQuestiontable()
			{
				$("#questiondiv").load("Allquestions.php");
			}

		function setHangoutlink()
		{
		  var day =$("#day2").val();
		  var qnumber =$("#qoption").val();			
		  var xmlhttp=new XMLHttpRequest();
		  var url = "loadQuestion.php?day="+day+"&&qnumber="+qnumber ;		
		  xmlhttp.open("GET",url,false);
		  xmlhttp.send(null);
		  var question  = xmlhttp.responseText;
		  question ="<question>"+question+"</question>";
                var leader = $("#txt_teamLeader").val();
		  var leader= "<tl>"+leader+"</tl>";
		  var time= $('#time_option').val() ;
		  time= "<time>"+time+"</time>";
		  var url ="https://hangoutsapi.talkgadget.google.com/hangouts?gid=26120030141&&gd= "+question+leader+time;
                $("#hangoutbutton").attr('href',url);
		  $("#hangoutbutton").attr('title','Play the game');	
		   alert("The question is set..please click on Hangout button to play");
               
		}
             	var counterID = 0;
		var count = 5;
		var TimerRunning = false;
          function downcounter()
		{
			TimerRunning=true;
			counterID = TimerID=self.setTimeout("downcounter()",1000);
			 var Minutes = count/60 ;
				var seconds = count%60;
			$("#timelabel").text(Minutes + ":"+seconds);
			count --;	
                    if(count < 0)
			{
                        stop();
                     }
		}

		function stop()
		{
			if(TimerRunning)
			{	 
				clearTimeout(counterID);
				alert("Time is up");
			}
		}

     			
</script>
<style type="text/css">
.center
{
margin-left:auto;
margin-right:auto;
width:70%;
height:100%;
background-color:#444;
border-width:3px;
border-style:solid;
border-color:#333;
}


.Right
{
position:absolute;
right:0px;
width:70%;
height:100%;
background-color:#444;
border-width:3px;
border-style:solid;
border-color:#333;
}


.Left
{
position:absolute;
left:0px;
width:29.5%;
height:100%;
background-color:#444;
border-width:3px;
border-style:solid;
border-color:#333;
}

.body
{

background-color:#222;
}

.datespan
{

font-size:9;
}



.messagediv
{

background-color:#999;
border-style:solid;
border-width:5px;
border-color:#777;
}

.noticediv
{

background-color:#333;
border-style:solid;
border-width:5px;
border-color:#777;
height:100%;
overflow:scroll;
}


.label
{

background-color:#555;
border-style:solid;
border-width:3px;
border-color:#666;
}
.table
{

background-color:#555;
border-style:none;
border-width:1px;
border-color:#666;
}
.td
{
background-color:#555;
border-style:none;
border-width:1px;
border-color:#666;

}

</style>

</head>
<body class="body">
<div id="center" class ="center">
<div id="Qustionwrapper"  class ="Right">
<div id="questionwrapper">
<div id="answer">
<label id ="lbl_newquestion" class='label' >Type in the new Question below</label><br/>
<textarea id="txtnewquestion" rows="4" cols="50"> 
</textarea>
<br/>
<label id ="lbl_answer" class='label' >Type in theanswer for the question</label><br/>
<textarea id="txtanswer" rows="4" cols="50"> 
</textarea>
<br/>
<label id ="lbl_day" class='label' >Day the question will appear on the game</label>
<select id="day">
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="4">5</option>
</select>
<br/>

<label id ="lbl_Qnumber" class='label' >The Question number for the day</label>
<input type="text" id ="qnumber"/>
</div>
<div id="submit">
<Button id="submitquestion">Submit the  New Question</Button>
</div>
<div id="lbl_question" class='label'>Table of Questions</div>
<div class = "messagediv" id="questiondiv">
</div>
</div>

</div>
<div class ="Left">
<div id="notice">
<div id="lbl_question" class='label'>Choose day</div>
<select id="day2">
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="4">5</option>
</select>
<br/>
<div id="lbl_question" class='label'>Choose Question number</div>
<select id="qoption">
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
<option value="6">6</option>
<option value="7">7</option>
</select>
<br/>
<div id="lbl_question" class='label'>Type in the  Teamleader Name</div>
<input type="text"  id="txt_teamLeader" /><br/>
<div id="lbl_question" class='label'>Choose the time limit for the question</div>
<select id="time_option">
<option value="5">5</option>
<option value="6">6</option>
<option value="7">7</option>
<option value="8">8</option>
<option value="9">9</option>
<option value="10">10</option>
</select><br/>
<button id="setQuestion">Set Parameters for game session</button>
<div id="lbl_question" class='label'>Play the Game</div>
<div id="messages" class="noticediv">
<a  id ="hangoutbutton" >
  	<img src="https://ssl.gstatic.com/s2/oz/images/stars/hangout/1/gplus-hangout-60x230-normal.png"    alt="Start a Hangout"    style="border:0;width:230px;height:60px;"/>	
</a>  
</div>
</div>
</div>
</div>

</body>

<div id="daysq"></div>
</HTML>