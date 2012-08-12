var leader = "Dhanesh Neelamana";
var gamemaster = "Shuyan Mary Ho";


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

    

});


function loadQuestion(question)
			{
       			$("#questiondiv")[0].innerHTML =question;				
				//$("#questiondiv").load("http://goodwin.drexel.edu/isensor/apps/games/game4/pages/Allquestions.php");
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
  
   if(getParticipantName() != leader )
   {     
      var bodyhtml  =    gapi.hangout.data.getValue("bodyhtml");
      if(bodyhtml)
      {
        $('body')[0].innerHTML =  bodyhtml; 
          $("#submitMessage").hide();
	   $("#answer").hide();
      }  
   }
   else
  {
    


   }
 

 
});



gapi.hangout.onApiReady.add(function(eventObj) 
{
  var appData = gadgets.views.getParams()['appData'];
 
	 loadQuestion(appData);
	
 	
  var participantname  = getParticipantName();  
  if(participantname != leader)
		{
		   $("#answer").hide();
		   $("#submitMessage").hide();	 
                 loadQuestion(appData);

	          if(appData)
			{	
  		     		initiateQuestion(appData);
		 
			}
		}
		else
		{
                
			 loadQuestion(appData);

		}

      
									
     			gapi.hangout.av.setMicrophoneMute(true);
			gapi.hangout.av.setCameraMute(true);
});



  function getParticipantName()
  {
       var id = gapi.hangout.getParticipantId();
  	var participant = gapi.hangout.getParticipantById(id);
       return  participant.person.displayName;
	
   }

