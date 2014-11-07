<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Editar tarea: <?php echo $tarea->nombre ?>
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
          <h3 class="panel-title space_heading">Datos Generales</h3>
      </div>
      <?php 
          echo form_open("tarea/update/", array('class' => 'form-horizontal'));
          echo form_hidden('id', "$tarea->id"); 
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
                    'value'       => "$tarea->nombre"
                    );
                  echo form_input($config); 
              ?>
          </div>
      </div>
      <div class="form-group">
          <label for="inputDescripcion" class="control-label col-xs-offset-1 col-xs-2">&nbsp;&nbsp;Descripcion</label>
          <div class="col-xs-offset-1 col-xs-10">
              <?php 
                  $config = array(
                    'name'        => 'descripcion',
                    'type'        => 'text',
                    'class'       => 'form-control',
                    'id'          => 'inputDescripcion',
                    'placeholder' => 'Descripcion',
                    'value'       => "$tarea->descripcion"
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
              <a href="<?php echo base_url(); ?>tarea">
                <button type="button" class="btn btn-danger btn-md">Cancelar</button>
              </a>
          </div>
      </div>
    </div>
  </div>  
  <!-- Table with Planes de la tarea -->
  <div class="col-lg-6">
    <div class="panel panel-default filterable">
        <div class="panel-heading">
            <h3 class="panel-title">
              <!-- I know this is a terrible way to add horizontal space -->
              Planes de la tarea <span class="space"></span>
              <a href="<?php echo base_url(); ?>plan/create/<?php echo $tarea->id; ?>">
                <button type="button" class="btn btn-success btn-md">
                  Nuevo plan
                 </button>
              </a> 
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
                          <th>Editar</th>
                          <th>Eliminar</th>
                        </tr>
                    </thead>
                    <tbody>
                      <?php if (isset($tarea->planes)): ?>
                          <?php foreach ($tarea->planes as $plan): ?>
                              <tr>
                              <td><?php echo $plan->nombre; ?></td>
                              <td>
                                  <a href='<?php echo base_url()."plan/edit/$plan->id"; ?>'>
                                      <button class="btn btn-primary btn-md">Editar</button>
                                  </a>
                              </td>
                              <td>
                                <button class="btn btn-danger btn-md show-modal-confirm" data-toggle="modal"
                                   data-url='<?php echo base_url()."plan/destroy/$plan->id"; ?>'>
                                    Eliminar
                                  </button>
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

<!-- Delete Confirmation Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h3 class="modal-title" id="myModalLabel">Eliminar Registro <i class="fa fa-warning"></i></h3>
      </div>
      <div class="modal-body">
        <h4>¿Está seguro que desea eliminar este registro?</h4>
      </div>
      <div class="modal-footer">
        <a href='<?php echo base_url()."tarea/destroy/$tarea->id"; ?>' id="delete_ref">
            <button type="button" class="btn btn-danger" id="btn-delete">Eliminar</button>
        </a> 
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>

<!-- Table filters logic -->
<script src="<?php echo base_url(); ?>js/table-filter.js"></script>

<!-- Confirm delete logic -->
<script src="<?php echo base_url(); ?>js/confirm-delete.js"></script>
