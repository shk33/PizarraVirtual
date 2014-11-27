	<link rel="stylesheet" href="//code.jquery.com/ui/1.11.1/themes/smoothness/jquery-ui.css">
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script src="//code.jquery.com/ui/1.11.1/jquery-ui.js"></script>  
	<script type="text/javascript" src="<?php echo base_url()?>ckeditor/ckeditor.js"></script>

	<h1>Registro de Resultados</h1>
	<form id="options" action="<?php echo base_url()?>control_graficas" method="POST">
		<br>
		<button type="submit" value="Graficar" id="grafica_button" class="btn btn-primary btn-md">Graficar</button>
	</form>

<br>
	<form id="registro_form">
		<p>Fecha: <input id="datepicker" type="text" name="fecha"/></p>
		<p>Seleccione una metrica</p>
		<select id="select_metrica">
			<option value="0" disabled="disabled" selected="selected">(Seleccionar)</option>
			<option value="1">Sin uso del entorno virtual colaborativo</option>
			<option value="2">Con uso del entorno virtual colaborativo</option>
		</select><br>
		<p>Escribe la ecuación</p>
		<div id="select_ecuacion_placeholder">
			<input type="text" name="ecuation">
		</div>
		<p>Numero de errores encontrados: <input type="number" min="1" max="1000" id="numero_errores"/></p>
		<p>Lista de errores: <textarea id="lista_errores" cols="4" rows="4"></textarea></p>
		<p>Numero de tipos de error encontrados: <input type="number" min="1" max="1000" id="numero_tipos_error"/></p>
		<p>Lista de tipos de error: <textarea id="lista_tipos_error" cols="4" rows="4"></textarea></p>

		<!-- <input type="button" value="Guardar datos" id="submit_data"/> -->
		<button type="button" id="submit_data" class="btn btn-primary btn-md">Guardar Datos</button>
		<form id="options" action="<?php echo base_url()?>control_graficas" method="POST">
			<button type="submit" value="Graficar" id="grafica_button" class="btn btn-primary btn-md">Graficar</button>
		</form>
	</form>

	<script type="text/javascript">
		//Convert value to datepicker
		$('#datepicker').datepicker();
		//Cambiando con ckeditor
		CKEDITOR.replace("lista_errores");
		CKEDITOR.replace("lista_tipos_error");
		CKEDITOR.config.width = 700
		//Generar opciones para las ecuaciones
		crearOpcionEcuaciones();

		//AQUI VA EL CODIGO PARA REGRESAR O SALIR DEL SISTEMA
		$('#back_button').click(function(){
			alert('Regresando pero a la misma pagina');
		});
		$('#grafica_button').click(function(){
			$.ajax({
				type: "post",
				url: '<?php echo base_url();?>control_graficas'
			});
		});
		//Si se han enviado los datos
		$('#submit_data').click(function(){
			var n_errors = $('#numero_errores').val();
			var error_list = CKEDITOR.instances['lista_errores'].getData();
			var n_type_error = $('#numero_tipos_error').val();
			var type_list = CKEDITOR.instances['lista_tipos_error'].getData();
			var date = $('#datepicker').datepicker({ dateFormat: 'dd-mm-yy' }).val();
			var num_ecuation = $('#select_ecuation').val();
			var num_metrica =$('#select_metrica').val();
			$.ajax({
				type: "post",
				url: '<?php echo base_url();?>registro_error/salvar_datos',
				data: {
					fecha: date,
					num_errors: n_errors,
					list_error: error_list,
					num_type_errors: n_type_error,
					list_type_error: type_list,
					ecuation: num_ecuation,
					metric: num_metrica
				},
				success: function (response){
					if (response == 1){
						alert ('Se guardo el registro correctamente');
						emptyAll();
					} else {
						alert ('ocurrio un error al guardar datos con el servidor');
						emptyAll();
					}
				},
				error: function (){
					alert('Faltan campos por completar');
				}
			});

		});

	function emptyAll(){

	}
	function crearOpcionEcuaciones(){
		$.ajax({
			type: "post",
			url: '<?php echo base_url();?>registro_error/obtener_ecuaciones',
			success: function(response){
				var html_code = "";
				var ecuaciones = JSON.parse(response);
				html_code +='<select id="select_ecuation">';
				html_code += '<option value="0" disabled="disabled" selected="selected">(Seleccionar)</option>';
				for (var i=0; i < ecuaciones.length;i++){
					html_code+='<option value="'+ecuaciones[i]['numero']+'">'+ecuaciones[i]['numero']+': '+ecuaciones[i]['cadena']+'</option>';
				}
				html_code += '</select>';
				$('#select_ecuacion_placeholder').html (html_code);
			},
			error: function(){
				alert('Error found');
			}
		});
	}
	</script>
