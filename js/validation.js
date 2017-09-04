$(function(){

	$("#instid").focusout(function(){

		var instid=$("#instid").val();
		if((instid.length<6 && instid.length>0) || instid.length>20)
		{
			$("#err_instid").html("Should be between 6-20 Characters");
		}
		else if(instid.length>0 && !(instid.startsWith("csdt")))
		{
			$("#err_instid").html("Instructor Id  Should starts with csdt");
		}
		else
		{
			$("#err_instid").html("");
		}

	});

	$("#fname").focusout(function(){

		var fname=$("#fname").val();
		var pat="[a-bA-b]";
		if((fname.length<5 && fname.length>0) || fname.length>20)
		{
			$("#err_fname").html("Should be between 5-20 Characters");
		}
		else if(fname.length!=0 && !fname.match(pat))
		{
			$("#err_fname").html("Name Should contain only Characters");
		}
		else
		{
			$("#err_fname").html("");
		}

	});

	$("#lname").focusout(function(){

		var lname=$("#lname").val();
		var pat="[a-bA-b]";
		
		if((lname.length<5 && lname.length>0) || lname.length>20)
		{
			$("#err_lname").html("Should be between 5-20 Characters");
		}
		else if(lname.length!=0 && !lname.match(pat))
		{
			$("#err_lname").html("Name Should contain only Characters");
		}
		else
		{
			$("#err_lname").html("");
		}

	});

	$("#password").focusout(function(){

		var password=$("#password").val();
		
		if((password.length<6 && password.length>0) || password.length>15)
		{
			$("#err_password").html("Should be between 6-15 Characters");
		}
		else
		{
			$("#err_password").html("");
		}

	});

	$("#password2").focusout(function(){

		var password2=$("#password2").val();
		
		if((password2.length<6 && password2.length>0) || password2.length>15)
		{
			$("#err_password2").html("Should be between 6-15 Characters");
		}
		else if(!($("#password").val()==password2))
		{
			$("#err_password2").html("Password doesn't match");
		}
		else
		{
			$("#err_password2").html("");
		}

	});



});