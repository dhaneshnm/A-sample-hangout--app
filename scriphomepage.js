var leader = "Dhanesh Neelamana";
var gamemaster = "Turing Dil";
var counterID = 0;
var count = 0;
var TimerRunning = false;
var day =1;
var qnumber =1;
$(document).ready(function() {

 $('#answerbutton').click(function()
	{		
              var answer=$("#txtanswer")[0].value.trim();
		alert("Submiting please wait..");
		
            
	});



$('#messagebutton').click(function()
	{		
		var text = $("#messages")[0].innerHTML;
              var message =$("#newmessage")[0].value.trim();		
		var date = new Date();
              text ="<div class='messagediv'><br/><b>"+message+"</b><br/><span class='datespan'>"+ date.toString()+"</span></div>"+text;
          	$("#messages")[0].innerHTML = text;				
		var bodyhtml = $('body')[0].innerHTML;		
		initiateScores(bodyhtml);
		
	});



     $("#Next").click(function() {
	var surl =  "http://goodwin.drexel.edu/isensor/apps/games/game4/pages/GetQuestion.php?qnumber="+qnumber+"&&day="+day+"&&callback=?";
		qnumber++;
              if(qnumber> 7)
		{
			qnumber =0;
		}
	       $.getJSON(surl,  function(rtndata) {
		var data =eval(rtndata);
		loadQuestion(rtndata.message);
		
       });
    });

	


});

function loadQuestion(question)
			{
       			$("#questiondiv")[0].innerHTML =question;				
				//$("#questiondiv").load("http://goodwin.drexel.edu/isensor/apps/games/game4/pages/Allquestions.php");
                            count = 1*60;
				 callCounter();
	
			}




function UpdateSharedState(adds,removes)
{
   if (typeof adds == "undefined") {
	adds = {};
	}
  if (typeof removes == "undefined") {
	removes =[];
	}
	try
	{
	gapi.hangout.data.submitDelta(adds, removes);
	}
	catch(e){
 	//catch and just suppress error
	$("#txtanswer")[0].value = e;
	}
	
  
}

//to intiate scores to zero
function initiateScores(bodyhtml)
{
  var adds= {}; 
  adds['bodyhtml'] =bodyhtml;	
  UpdateSharedState(adds,null);	
}

//to intiate question
function initiateQuestion(question)
{
  var adds= {}; 
  adds['question'] =question;	
  UpdateSharedState(adds,null);	
}



gapi.hangout.data.onStateChanged.add(function(eventObj)
{
  
       
      var bodyhtml  =    gapi.hangout.data.getValue("bodyhtml");
      if(bodyhtml)
      {
        $('body')[0].innerHTML =  bodyhtml; 
       if(getParticipantName() != leader)
	{      
        $("#answer").hide();
		$("#submitMessage").hide();
        $("#Next").hide();
	}
      
      }  
   
  
 
});



gapi.hangout.onApiReady.add(function(eventObj) 
{
  	var appData = gadgets.views.getParams()['appData']; 	 
	 setinitialParameters(appData);  	 
  	//setIntitailAcess(); 
		("#Next").click();
	          if(appData)
			{	
  		     		initiateQuestion(match[0]);
		              downcounter();
			}					
     			gapi.hangout.av.setMicrophoneMute(true);
			gapi.hangout.av.setCameraMute(true);
});


//to set access rights on load
function setIntitailAcess()
	{
		var participantname  = getParticipantName(); 
		 if(participantname != leader)
		{
		   	$("#answer").hide();
                  	$("#submitMessage").hide();
			$("#Next").hide();	
		}
            
		   
                 
	}

//to get participant name
  function getParticipantName()
  {
       var id = gapi.hangout.getParticipantId();
  	var participant = gapi.hangout.getParticipantById(id);
       return  participant.person.displayName;
	
   }

  //to set question on load
  function setinitialParameters(appData)
	{
		var pat =/<question>[\S\s]*?<\/question>/g;
	 	var match = appData.match(pat);
	
		var leaderpat =/<tl>[\S\s]*?<\/tl>/g;
		var timepat =/<time>[\S\s]*?<\/time>/g;
		var leadermatch =appData.match(leaderpat);
       	var timematch=appData.match(timepat);
		leader  = leadermatch[0].replace(/(<\/?[^>]+>)/gi, '');
		count =   timematch[0].replace(/(<\/?[^>]+>)/gi, '');
       	var test =  timematch[0].replace(/(<\/?[^>]+>)/gi, '');
       	alert(test);
		count = parseInt(count)*60;
		alert(count);
		alert(match[0]);
		loadQuestion(match[0]);
	}





//Timer module,a down counter 
function callCounter()
   {
     	clearTimeout(counterID);
	downcounter()

   }

		
          function downcounter()
		{
			TimerRunning=true;
			counterID = TimerID=self.setTimeout("downcounter()",1000);
			 var Minutes = parseInt(count/60) ;
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
				("#Next").click();

			}

		}


