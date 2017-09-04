$(document).ready(function(){
	$.datepicker.setDefaults({
		dateFormat : 'yy-mm-dd'
	});


	$(function(){
		$("#from").datepicker();

		$("#dateInput").datepicker();

	});

});

