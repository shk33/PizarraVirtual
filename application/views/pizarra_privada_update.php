<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Editar Pizarra Privada: <?php echo $pizarra_privada->nombre ?>
        </h1>
    </div>
</div>
<!-- /.row -->

<div class="row">
  <?php if (validation_errors() != ""): ?>
    <div class="col-lg-12">
      <div class="alert alert-danger alert-dismissable">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <i class="fa fa-info-circle"></i> Existen errores en el formulario
          <?php echo validation_errors(); ?>
      </div>
    </div>  
  <?php endif ?>
  
    <div class="col-lg-6">
        <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title space_heading">
                Datos Generales
              </h3>
            </div>
            <?php 
                echo form_open("pizarra_privada/update/", array('class' => 'form-horizontal'));
                echo form_hidden('id', "$pizarra_privada->id"); 
            ?>
                <div class="form-group">
                    <label for="inputNombre" class="control-label col-xs-offset-1 col-xs-2">Nombre</label>
                    <div class="col-xs-offset-1 col-xs-10">
                        <?php 
                            $config = array(
                              'name'        => 'nombre',
                              'type'        => 'text',
                              'class'       => 'form-control',
                              'id'          => 'inputNombre',
                              'placeholder' => 'Nombre',
                              'value'       => "$pizarra_privada->nombre"                            );
                            echo form_input($config); 
                        ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputContenido" class="control-label col-xs-offset-1 col-xs-2">Contenido</label>
                    <div class="col-xs-offset-1 col-xs-10">
                        <?php 
                            $config = array(
                              'name'        => 'Contenido',
                              'class'       => 'form-control',
                              'id'          => 'inputContenido',
                              'placeholder' => 'Contenido',
                              'value'       => "$pizarra_privada->contenido"
                            );
                            echo form_textarea($config); 
                        ?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-offset-6 col-xs-3">
                        <button type="submit" class="btn btn-primary btn-md">Actualizar</button>
                    </div>
                    <?php echo form_close(); ?>
                    <div class="col-xs-1">
                        <a href="<?php echo base_url(); ?>pizarra_privada">
                            <button type="button" class="btn btn-danger btn-md">Cancelar</button>
                        </a>
                    </div>
                </div>
            <!-- </form> -->
        </div>
    </div>

  <!-- Table with Archivos del pizarra_privada -->
  <div class="col-lg-6">
    <div class="panel panel-default filterable">
        <div class="panel-heading">
            <h3 class="panel-title">
              <!-- I know this is a terrible way to add horizontal space -->
              Archivos de la pizarra <span class="space"></span>
              <button type="button" class="btn btn-success btn-md" data-toggle="modal" data-target="#myModal">
                Agregar Archivos
              </button>
              <button class="btn btn-info btn-filter">
                <span class="glyphicon glyphicon-search"></span> Buscar
              </button>
            </h3>
        </div>
        <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover table-striped">
                    <thead>
                        <tr class="filters">
                          <th><input type="text" class="form-control" placeholder="Nombre" disabled></th>
                          <th><input type="text" class="form-control" placeholder="Apellido" disabled></th>
                          <th>Remover</th>
                        </tr>
                    </thead>
                    <tbody>
                      <?php if (isset($grupo->alumnos)): ?>
                          <?php foreach ($grupo->alumnos as $alumno): ?>
                              <tr>
                              <td><?php echo $alumno->nombre; ?></td>
                              <td><?php echo $alumno->apellido; ?></td>
                              <td>
                                <?php echo form_open("grupo/remove_alumno"); ?>
                                <?php echo form_hidden("alumno_id",$alumno->id); ?>
                                <?php echo form_hidden("grupo_id",$grupo->id); ?>
                                <button type="submit" class="btn btn-danger btn-md">Remover</button>
                                <?php echo form_close(); ?>
                              </td>
                              </tr>
                          <?php endforeach ?>
                      <?php endif ?>
                    </tbody>
                </table>
              </div>
              <!-- End table responsive -->
            </div>
            <!-- End Panel body -->
        </div>
        <!-- End Panel Default -->
    </div>
    <!-- End Col lg 6 -->    
</div>

<!-- Agregar Alumnos Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h3 class="modal-title" id="myModalLabel">Agregar Alumnos <i class="fa fa-plus-circle"></i></h3>
      </div>
      <div class="modal-body" style="overflow:auto;">
        <h4>Alumnos Disponibles</h4>
        <div class="form-group">
          <?php echo form_open("grupo/add_alumnos"); ?>
              <?php foreach ($not_in_group_alumnos as $ntg_alumno): ?>
                <?php 
                  $data['name'] = "alumno_$ntg_alumno->id"; 
                  $data['id'] = "alumno_$ntg_alumno->id"; 
                  $data['value'] = "$ntg_alumno->id";
                  $data['checked'] = FALSE;
                 ?>
                  <div class="form-group">
                    <div class="col-xs-1">
                      <?php print form_checkbox($data);?>
                    </div>
                    <label for='<?php echo "alumno_$ntg_alumno->id" ?>' class="control-label col-xs-11">
                      <?php echo "$ntg_alumno->apellido $ntg_alumno->nombre" ?>
                    </label>
                  </div>
                
              <?php endforeach ?>
              <?php echo form_hidden('grupo_id', $grupo->id); ?>
          </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-success">Agregar</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        <?php echo form_close(); ?>
      </div>
    </div>
  </div>
</div>

<!-- Table filters logic -->
<script src="<?php echo base_url(); ?>js/table-filter.js"></script>

