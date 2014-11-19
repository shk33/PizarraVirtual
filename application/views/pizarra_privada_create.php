<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Crear nuevo tutor
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
            <?php echo form_open('tutor/store', array('class' => 'form-horizontal')); ?>
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
                    <label for="inputApellido" class="control-label col-xs-1">Apellido</label>
                    <div class="col-xs-5">
                        <?php 
                            $config = array(
                              'name'        => 'apellido',
                              'type'        => 'text',
                              'class'       => 'form-control',
                              'id'          => 'inputApellido',
                              'placeholder' => 'Apellido',
                              'value'       => set_value('apellido')
                            );
                            echo form_input($config); 
                        ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputSeccion" class="control-label col-xs-1">Seccion</label>
                    <div class="col-xs-5">
                        <?php 
                            $config = array(
                              'name'        => 'seccion',
                              'type'        => 'text',
                              'class'       => 'form-control',
                              'id'          => 'inputSeccion',
                              'placeholder' => 'Seccion',
                              'value'       => set_value('seccion')
                            );
                            echo form_input($config); 
                        ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputCorreo" class="control-label col-xs-1">Correo</label>
                    <div class="col-xs-5">
                        <?php 
                            $config = array(
                              'name'        => 'correo',
                              'type'        => 'email',
                              'class'       => 'form-control',
                              'id'          => 'inputCorreo',
                              'placeholder' => 'Correo',
                              'value'       => set_value('correo')
                            );
                            echo form_input($config); 
                        ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputContrasena" class="control-label col-xs-1">Contraseña</label>
                    <div class="col-xs-5">
                        <?php 
                            $config = array(
                              'name'        => 'contrasena',
                              'type'        => 'password',
                              'class'       => 'form-control',
                              'id'          => 'inputContrasena',
                              'placeholder' => 'Contraseña'
                            );
                            echo form_input($config); 
                        ?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-offset-4 col-xs-1">
                        <button type="submit" class="btn btn-primary btn-md">Crear</button>
                    </div>
                    <?php echo form_close(); ?>
                    <div class="col-xs-1">
                        <a href="<?php echo base_url(); ?>tutor">
                            <button type="button" class="btn btn-danger btn-md">Cancelar</button>
                        </a>
                    </div>
                </div>
            <!-- </form> -->
        </div>

    </div>
</div>