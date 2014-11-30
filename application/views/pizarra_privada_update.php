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
    </div>script type="text/ng-template" id=""></script>  
  <?php endif ?>
  
    <div class="col-lg-12">
  <?php 
      echo form_open("pizarra_privada/update/", array('class' => 'form-horizontal'));
      echo form_hidden('id', "$pizarra_privada->id"); 
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
                    'value'       => "$pizarra_privada->nombre"                            );
                  echo form_input($config); 
              ?>
          </div>
      </div>
      <div class="form-group">
          <label for="inputContenido" class="control-label col-xs-1">Contenido</label>
          <div class="col-xs-5">
              <?php 
                  $config = array(
                    'name'        => 'contenido',
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
          <div class="col-xs-offset-4 col-xs-1">
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

<!-- Table filters logic -->
<script src="<?php echo base_url(); ?>assets/js/table-filter.js"></script>

