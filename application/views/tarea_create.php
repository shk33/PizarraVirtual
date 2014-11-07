<!-- Page Heading -->
<div class="row">
  <div class="col-lg-12">
    <h1 class="page-header">
      Crear nueva tarea
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
    <?php echo form_open('tarea/store', array('class' => 'form-horizontal')); ?>
      
      <?php if ($is_admin): //Is an admin ?>
      <div class="form-group">
        <label for="input-tutor-id" class="control-label col-xs-1">Tutor</label>
        <div class="col-xs-5">
          <?php 
            $config = "class='form-control' id='input-tutor-id'";
            echo form_dropdown("tutor_id",$select_tutor,$tutor_id,$config);
          ?>
        </div>
      </div>
      <?php else: //This else assumes is a Tutor?>

      <?php endif ?>
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
              'value'       => set_value('nombre')
            );
            echo form_input($config); 
          ?>
        </div>
      </div>
      <div class="form-group">
        <label for="inputDescripcion" class="control-label col-xs-1">Descripción</label>
        <div class="col-xs-5">
          <?php 
            $config = array(
              'name'        => 'descripcion',
              'type'        => 'text',
              'class'       => 'form-control',
              'id'          => 'inputDescripcion',
              'placeholder' => 'Descripción',
              'value'       => set_value('descripcion')
            );
            echo form_textarea($config); 
          ?>
        </div>
      </div>
      <div class="form-group">
        <div class="col-xs-offset-4 col-xs-1">
            <button type="submit" class="btn btn-primary btn-md">Crear</button>
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