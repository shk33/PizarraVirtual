<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Editar tarea <?php echo $tarea->nombre ?>
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
        <div class="bs-example">
            <!-- <form class="form-horizontal"> -->
            <?php 
                echo form_open("tarea/update/", array('class' => 'form-horizontal'));
                echo form_hidden('id', "$tarea->id"); 
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
                              'value'       => "$tarea->nombre"                            );
                            echo form_input($config); 
                        ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputDescripcion" class="control-label col-xs-1">Descripcion</label>
                    <div class="col-xs-5">
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
                    <div class="col-xs-offset-4 col-xs-1">
                        <button type="submit" class="btn btn-primary btn-md">Actualizar</button>
                    </div>
                    <?php echo form_close(); ?>
                    <div class="col-xs-1">
                        <a href="<?php echo base_url(); ?>tarea">
                            <button type="button" class="btn btn-danger btn-md">Cancelar</button>
                        </a>
                    </div>
                </div>
            <!-- </form> -->
        </div>

    </div>
</div>