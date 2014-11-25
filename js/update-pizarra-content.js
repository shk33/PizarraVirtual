/*
* Updates automatically the content of the Pizarra Remota every 5 seconds
*/
setInterval(function(){
  var pizarra_compartida  = $('#pizarra_compartida');
  var pizarra_id          = $('#pizarra_id');

	$.ajax({
		url: pizarra_compartida.attr("data-ajax"),
		type: 'GET',
		data:{
			id: pizarra_id.val(),
		}
	})
	.done(function(data) {
		pizarra_compartida.val(data.new_content);
	})
	.fail(function() {
		//console.log("error");
	})
	.always(function() {
		//console.log("complete");
	});
},1000);

/*
* Share the content of the Pizarra Local to the Pizarra Remota
*/
$("#btn-share").click(function(){
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