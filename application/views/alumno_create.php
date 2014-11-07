<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Crear nuevo alumno
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
            <?php echo form_open('alumno/store', array('class' => 'form-horizontal')); ?>
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
                    <label for="inputMatricula" class="control-label col-xs-1">Matricula</label>
                    <div class="col-xs-5">
                        <?php 
                            $config = array(
                              'name'        => 'matricula',
                              'type'        => 'text',
                              'class'       => 'form-control',
                              'id'          => 'inputMatricula',
                              'placeholder' => 'Matricula',
                              'value'       => set_value('matricula')
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
                    <label for="inputContrasena2" class="control-label col-xs-1">Confirmar Contraseña</label>
                    <div class="col-xs-5">
                        <?php 
                            $config = array(
                              'name'        => 'contrasena2',
                              'type'        => 'password',
                              'class'       => 'form-control',
                              'id'          => 'inputContrasena2',
                              'placeholder' => 'Confirmar Contraseña'
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
                        <a href="<?php echo base_url(); ?>alumno">
                            <button type="button" class="btn btn-danger btn-md">Cancelar</button>
                        </a>
                    </div>
                </div>
            <!-- </form> -->
        </div>

    </div>
</div>