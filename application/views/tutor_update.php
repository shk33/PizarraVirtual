<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Editar tutor: <?php echo "$tutor->apellido $tutor->nombre" ?>
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
            <?php 
                echo form_open("tutor/update/", array('class' => 'form-horizontal'));
                echo form_hidden('id', "$tutor->id"); 
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
                              'value'       => "$tutor->nombre"                            );
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
                              'value'       => "$tutor->apellido"
                            );
                            echo form_input($config); 
                        ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputSeccion" class="control-label col-xs-1">Sección</label>
                    <div class="col-xs-5">
                        <?php 
                            $config = array(
                              'name'        => 'seccion',
                              'type'        => 'text',
                              'class'       => 'form-control',
                              'id'          => 'inputSeccion',
                              'placeholder' => 'seccion',
                              'value'       => "$tutor->seccion"
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
                              'value'       => "$tutor->correo"
                            );
                            echo form_input($config); 
                        ?>
                    </div>
                </div>
                <hr>
                <div class="form-group">
                    <label for="checkNewPassword" class="control-label col-xs-1">
                      ¿Cambiar contraseña?
                    </label>
                    <div class="col-xs-1">
                        <?php 
                            $config = array(
                              'name'        => 'checkNuevaContrasena',
                              'id'          => 'checkNewPassword',
                              'value'      => true,
                              'active'      => true,
                            );
                            echo form_checkbox($config); 
                        ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputContrasena" class="control-label col-xs-1">Nueva Contraseña</label>
                    <div class="col-xs-5">
                        <?php 
                            $config = array(
                              'name'        => 'contrasena',
                              'type'        => 'password',
                              'class'       => 'form-control',
                              'id'          => 'inputContrasena',
                              'disabled'    =>  'disabled',
                              'placeholder' => 'Nueva Contraseña'
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
                              'disabled'    =>  'disabled',
                              'placeholder' => 'Confirmar Nueva Contraseña'
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
                        <a href="<?php echo base_url(); ?>tutor">
                            <button type="button" class="btn btn-danger btn-md">Cancelar</button>
                        </a>
                    </div>
                </div>
            <!-- </form> -->
    </div>
</div>

<!-- Disable/Eneable Passwords Fields -->
<script src="<?php echo base_url(); ?>assets/js/change_password.js"></script>