/*
* Add Listeners to buttons verificar
*/
$("#btn-verify-1").click(function(){
	$ruta    = $('#valida_ecuacion_ruta');
  	$pizarra = $('#pizarra_local');
  	$('#myModal').modal('show');

	$.ajax({
		url: $ruta.val(),
		type: 'POST',
		data:{
			ecuaciones: $pizarra.val(),
		}
	})
	.done(function(data) {
		// console.log(data);
		render_errors(data);
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
	$('#myModal').modal('show');

	$.ajax({
		url: $ruta.val(),
		type: 'POST',
		data:{
			ecuaciones: $pizarra.val(),
		}
	})
	.done(function(data) {
		// console.log(data);
		render_errors(data);
	})
	.fail(function() {
		//console.log("error");
	})
	.always(function() {
		//console.log("complete");
	});
});

function render_errors(data){

	$tbodyErrors = $('#errors');
	$tbodyErrors.empty(); //First Eliminate all nodes of the table

	html1 = "<tr><td>";
	html3 = "</td><td>";
	html5 = "</td><td>"
	html7 = "</td></tr>";

	if (data.length < 1 ) {
		$tbodyErrors.append("<h4>No se encontraron errores. Recuerda que el analizador no es 100% fiable.</h4>");
	}else{

		for (i =0; i<data.length; i++) {
			html2 = data[i].ecuacion;
			html4 = data[i].error.ErrorNombre;
			html6 = data[i].error.ErrorDescripcion;

			allHtml = html1 + html2 + html3 + html4 + html5 + html6 + html7; 

			$tbodyErrors.append(allHtml);
		}
	}
	

	//Showing the tab with results
	$('#myTab a[href="#results"]').tab('show');
	//Hidding Loading screen
	$('#myModal').modal('hide');
}
