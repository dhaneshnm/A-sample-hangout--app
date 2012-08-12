/*$(document).ready(function() {
		$('#Next').click(function()
			{
				alert("Hail John Resig...The god of all javascripters");
				loader();


				});
		});



function loader()
		{
			var xhr = new XMLHttpRequest();
			alert("http://goodwin.drexel.edu/isensor/index.html")
			xhr.open("GET", "http://goodwin.drexel.edu/isensor/apps/games/game4/pages/GetQuestion.php?qnumber=1&&day=1", true);
			xhr.onreadystatechange = function(){
 			 if ( xhr.readyState == 4 ) {
    					if ( xhr.status == 200 ) {
      						$("#txtanswer")[0].value =  xhr.responseText;
    						} else {
      							$("#txtanswer")[0].value = "ERROR"+xhr.status;
    							}
  						}
			};
			xhr.send();
					
			


	
		}*/
//http://www.fbloggs.com/sandbox/jsonp.php?callback=?

$(document).ready(function() {
 $("#Next").click(function() {
	var surl =  "http://goodwin.drexel.edu/isensor/apps/games/game4/pages/GetQuestion.php?qnumber=1&&day=1&&callback=?";
	
	$.getJSON(surl,  function(rtndata) {
		var data =eval(rtndata);
		alert(data.message);
		
    });
 });
});