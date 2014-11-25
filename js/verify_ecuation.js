/*
* Share the content of the Pizarra Local to the Pizarra Remota
*/
$("#btn-verify-1").click(function(){
	var pizarra_local  = $('#pizarra_local');
  	var pizarra_id     = $('#pizarra_id');
	$.ajax({
		url: pizarra_local.attr("data-ajax"),
		type: 'POST',
		data:{
			id:      pizarra_id.val(),
			content: pizarra_local.val()
		}
	})
	.done(function(data) {
	
	
	})
	.fail(function() {
		//console.log("error");
	})
	.always(function() {
		//console.log("complete");
	});
});