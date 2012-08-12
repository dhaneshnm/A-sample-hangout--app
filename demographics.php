<?php


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Demographic Information</title>
<link rel="stylesheet" type="text/css" href="css/view.css" media="all">
<script type="text/javascript" src="js/view.js"></script>
<script language="JavaScript" src="js/gen_validatorv31.js" type="text/javascript"></script>
</head>
</head>
<body id="main_body" >
	
	<img id="top" src="top.png" alt="">
	<div id="form_container">
	
		<h1><a>Demographic Information</a></h1>
		<form id="myform" class="appnitro"  method="post" action="">
					<div class="form_description">
			<h2>Demographic Information</h2>
			<p>Please provide your details below</p>
		</div>						
			<ul >
		
<li id="li_firstname" >
                <label class="description" for="first_name">First name </label>
                <div>
                        <input id="first_name" name="first_name" class="element text medium" type="text" maxlength="255" value=""/>
                </div>
                </li> 

<li id="li_lastname" >
                <label class="description" for="last_name">Last name </label>
                <div>
                        <input id="last_name" name="last_name" class="element text medium" type="text" maxlength="255" value=""/>
                </div>
                </li>

	
					<li id="li_1" >
		<label class="description" for="element_1">Email Address </label>
		<div>
			<input id="element_1" name="email" class="element text medium" type="text" maxlength="255" value=""/> 
		</div><p class="guidelines" id="guide_1"><small>Please enter your email address here if you want to participate in the contest to win a prize!</small></p> 
		</li>		<li id="li_2" >
		<label class="description" for="element_2">Age
 </label>
		<div>
			<input id="element_2" name="age" class="element text medium" type="text" maxlength="255" value=""/> 
		</div><p class="guidelines" id="guide_2"><small>Enter your age here</small></p> 
              </li>
			
					<li class="buttons">
			    <input type="hidden" name="form_id" value="17437" />
			    
				<input id="saveForm" class="button_text" type="submit" name="submit" value="Submit" />
		</li>

			</ul>
		</form>	
        <script language="JavaScript" type="text/javascript">
 var frmvalidator = new Validator("myform"); 
frmvalidator.addValidation("first_name","req","Please enter your first name");
frmvalidator.addValidation("last_name","req","Please enter your first name");
 frmvalidator.addValidation("email","maxlen=50");
 frmvalidator.addValidation("email","req");
 frmvalidator.addValidation("email","email");
 
 frmvalidator.addValidation("age","maxlen=3");
 frmvalidator.addValidation("age","numeric");
 frmvalidator.addValidation("age","req","Please enter age");
 frmvalidator.addValidation("element_3_gender","selone_radio","Please select gender");
 
 frmvalidator.addValidation("address1","maxlen=50");
 frmvalidator.addValidation("address1","req");
 
 frmvalidator.addValidation("address2","maxlen=50");
 
 frmvalidator.addValidation("city","req");
 frmvalidator.addValidation("pin","req");
 frmvalidator.addValidation("state","req");
 frmvalidator.addValidation("country","req");
 frmvalidator.addValidation("race","selone_radio","Please select Race and Ethinicity");
 frmvalidator.addValidation("education","req");
 frmvalidator.addValidation("occupation","req");
</script>
		<div id="footer">
			Copyrights belong to iSensor - Goodwin College of Professional Studies @ Drexel University
		</div>
	</div>
	<img id="bottom" src="bottom.png" alt="">
	</body>
</html>
