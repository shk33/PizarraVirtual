<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Editar plan: <?php echo $plan->nombre ?>
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
  
    <div class="col-lg-12">
      <h4><b>Tarea Perteneciente: </b><?php echo $plan->tarea->nombre ?></h4>
      <?php 
        echo form_open('plan/update', array('class' => 'form-horizontal'));
        echo form_hidden('id', $plan->id); 
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
                'value'       => $plan->nombre
              );
              echo form_input($config); 
            ?>
          </div>
        </div>
        <div class="form-group">
          <label for="inputMateriales" class="control-label col-xs-1">Materiales</label>
          <div class="col-xs-5">
            <?php 
              $config = array(
                'name'        => 'materiales',
                'type'        => 'text',
                'class'       => 'form-control',
                'id'          => 'inputMateriales',
                'placeholder' => 'Materiales',
                'value'       => $plan->materiales
              );
              echo form_textarea($config); 
            ?>
          </div>
        </div>
        <div class="form-group">
          <label for="input-ruta-carpeta" class="control-label col-xs-1">Ruta Carpeta</label>
          <div class="col-xs-5">
            <?php 
              $config = array(
                'name'        => 'ruta_carpeta',
                'type'        => 'text',
                'class'       => 'form-control',
                'id'          => 'input-ruta-carpeta',
                'placeholder' => 'Ruta de la carpeta a almacenar archivos',
                'value'       => $plan->ruta_carpeta
              );
              echo form_input($config); 
            ?>
          </div>
        </div>
        <div class="form-group">
          <div class="col-xs-offset-4 col-xs-1">
            <button type="submit" class="btn btn-primary btn-md">Actualizar</button>
          </div>
          <?php echo form_close(); ?>
          <div class="col-xs-1">
            <a href='<?php echo base_url()."tarea/edit/".$plan->tarea->id ?>'>
              <button type="button" class="btn btn-danger btn-md">Cancelar</button>
            </a>
          </div>
        </div>
    </div>
</div>