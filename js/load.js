$("document").ready(function(){
	$("#loadNow").click(function(){
		var num=this.id;

		$("#loadHere").load('data.php?page='+num);
	});
});