<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Editar grupo: <?php echo $grupo->nombre ?>
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
        <div class="bs-example">
            <!-- <form class="form-horizontal"> -->
            <?php 
                echo form_open("grupo/update/", array('class' => 'form-horizontal'));
                echo form_hidden('id', "$grupo->id"); 
            ?>
                <div class="form-group">
                    <label for="inputNombre" class="control-label col-xs-1">Nombre</label>
                    <div class="col-xs-5">
                        <?php 
                            $config = array(
                              'name'        => 'nombre',
                              'type'        => 'text',
                              'class'       => 'form-control',
                              'id'          => 'inputNombre',
                              'placeholder' => 'Nombre',
                              'value'       => "$grupo->nombre"                            );
                            echo form_input($config); 
                        ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputObservaciones" class="control-label col-xs-1">Observación</label>
                    <div class="col-xs-5">
                        <?php 
                            $config = array(
                              'name'        => 'observaciones',
                              'class'       => 'form-control',
                              'id'          => 'inputObservaciones',
                              'placeholder' => 'Observaciones',
                              'value'       => "$grupo->observaciones"
                            );
                            echo form_textarea($config); 
                        ?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-offset-4 col-xs-1">
                        <button type="submit" class="btn btn-primary btn-md">Actualizar</button>
                    </div>
                    <?php echo form_close(); ?>
                    <div class="col-xs-1">
                        <a href="<?php echo base_url(); ?>grupo">
                            <button type="button" class="btn btn-danger btn-md">Cancelar</button>
                        </a>
                    </div>
                </div>
            <!-- </form> -->
        </div>
    </div>

  <!-- Table with Alumnos del Grupo -->
  <div class="col-lg-6">
    <div class="panel panel-default filterable">
        <div class="panel-heading">
            <h3 class="panel-title">
              <!-- I know this is a terrible way to add horizontal space -->
              Alumnos del grupo <span class="space"></span>
              <button class="btn btn-info btn-filter">
                <span class="glyphicon glyphicon-filter"></span>Filtrar Resultados
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
                          <th>Eliminar</th>
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
                                <button type="submit" class="btn btn-danger btn-md">Eliminar</button>
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

<!-- Table filters logic -->
<script src="<?php echo base_url(); ?>js/table-filter.js"></script>

<!-- Confirm delete logic -->   
