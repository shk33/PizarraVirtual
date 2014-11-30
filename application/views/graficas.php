	<link rel="stylesheet" href="//code.jquery.com/ui/1.11.1/themes/smoothness/jquery-ui.css">
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script src="//code.jquery.com/ui/1.11.1/jquery-ui.js"></script> 
	<script src="<?php echo base_url()?>assets/js/jquery.jqplot.js"></script>
	<script src="<?php echo base_url()?>assets/js/jqplot.canvasTextRenderer.js"></script>
	<script src="<?php echo base_url()?>assets/js/jqplot.canvasAxisLabelRenderer.min.js"></script>
	<script src="<?php echo base_url()?>assets/js/jqplot.barRenderer.js"></script>
	<script type="text/javascript" src="assets/js/jqplot.categoryAxisRenderer.min.js"></script>
	<script type="text/javascript" src="assets/js/jqplot.pointLabels.min.js"></script>

	
	<center>
		<h1>
		<font face="Georgia, Times New Roman, Times, serif">Graficas, para iniciar seleccione una metrica</font></h1>
		<br>
		<form>
			<select id="select_metrica" onchange="crear_grafica(this.value)">
			<option value="0" disabled="disabled" selected="selected">(Seleccionar)</option>
			<option value="1">Sin uso del entorno virtual colaborativo</option>
			<option value="2">Con uso del entorno virtual colaborativo</option>
		</select><br>
		<div id="grafica_barra" style="height:640px; width:420px"></div>
		</form>

	</center>
	<script type="text/javascript">
	function crear_grafica(numero_metrica){
		//Primero obtener los primedios
		$.ajax({
			type: "post",
			url: "<?php echo base_url();?>control_graficas/obtener_promedios",
			data: {num_metrica: numero_metrica},
			success: function (response){
				var resultado = JSON.parse(response);
				
				var prom_error = resultado['prom_errores'];
				var prom_tipos = resultado['prom_tipos'];
				
				var data = [[ ['Errores', prom_error], ['Tipos de Erorres', prom_tipos] ]];
					$('#grafica_barra').empty();	
				  var plot3 = $.jqplot('grafica_barra', data, {
				    title: 'Promedio de Errores y tipos de errores',
				    series:[{renderer:$.jqplot.BarRenderer}],
				    axesDefaults: {
				        tickRenderer: $.jqplot.CanvasAxisTickRenderer,
				        tickOptions: {
				          angle: -30
				        }
				    },
				    axes: {
				      xaxis: {
				        renderer: $.jqplot.CategoryAxisRenderer,
				        tickOptions: {
				          labelPosition: 'middle'
				        }
				      },
				      yaxis: {
				        autoscale:true,
				        tickRenderer: $.jqplot.CanvasAxisTickRenderer,
				        tickOptions: {
				          labelPosition: 'start'
				        }
				      }
				    }
				  });
			},
			error: function(){
				alert("Ocurrio un error inesperado");
			}
		});
	}
	</script>
