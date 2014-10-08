<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Editar alumno <?php echo "$alumno->apellido $alumno->nombre" ?>
        </h1>
    </div>
</div>
<!-- /.row -->

<div class="row">
    <div class="col-lg-12">
        <div class="bs-example">
            <!-- <form class="form-horizontal"> -->
            <?php 
                echo form_open("alumno/update/", array('class' => 'form-horizontal'));
                echo form_hidden('id', "$alumno->id"); 
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
                              'value'       => "$alumno->nombre"
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
                              'value'       => "$alumno->apellido" 
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
                              'value'       => "$alumno->matricula"


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
                              'value'       => "$alumno->correo"
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
                    <div class="col-xs-offset-4 col-xs-2">
                        <button type="submit" class="btn btn-primary btn-lg">Actualizar</button>
                    </div>
                    <?php echo form_close(); ?>
                    <div class="col-xs-1">
                        <a href="<?php echo base_url(); ?>alumno">
                            <button type="button" class="btn btn-danger btn-lg">Cancelar</button>
                        </a>
                    </div>
                </div>
            <!-- </form> -->
        </div>

    </div>
</div>