/*
* Add Listeners to buttons verificar
*/
$("#btn-verify-1").click(function(){
	$ruta    = $('#valida_ecuacion_ruta');
  	$pizarra = $('#pizarra_local');
	$.ajax({
		url: $ruta.val(),
		type: 'POST',
		data:{
			ecuaciones: $pizarra.val(),
		}
	})
	.done(function(data) {
		console.log(data);
	})
	.fail(function() {
		//console.log("error");
	})
	.always(function() {
		//console.log("complete");
	});
});

$("#btn-verify-2").click(function(){
	$ruta    = $('#valida_ecuacion_ruta');
  	$pizarra = $('#pizarra_compartida');
	$.ajax({
		url: $ruta.val(),
		type: 'POST',
		data:{
			ecuaciones: $pizarra.val(),
		}
	})
	.done(function(data) {
		console.log(data);
	})
	.fail(function() {
		//console.log("error");
	})
	.always(function() {
		//console.log("complete");
	});
});