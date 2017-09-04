$(function(){
	
	$("#instid").focusout(function(){

		var instid=$("#instid").val();
		if((instid.length<6 && instid.length>0) || instid.length>20)
		{
			$("#err_instid").html("Should be between 6-20 Characters");
		}
		else
		{
			$("#err_instid").html("");
		}

	});
});