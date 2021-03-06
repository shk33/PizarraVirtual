<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Crear nuevo plan
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
            echo form_open('plan/store', array('class' => 'form-horizontal'));
           ?>
            <div class="form-group">
                <label for="input-tarea-id" class="control-label col-xs-1">Tarea perteneciente</label>
                <div class="col-xs-5">
                    <?php 
                        $config = "class='form-control' id='input-tarea-id'";
                        echo form_dropdown("tarea_id",$select_tarea,$tarea_id,$config);
                    ?>
                </div>
              </div>
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
                  <label for="inputMateriales" class="control-label col-xs-1">Materiales</label>
                  <div class="col-xs-5">
                      <?php 
                          $config = array(
                            'name'        => 'materiales',
                            'type'        => 'text',
                            'class'       => 'form-control',
                            'id'          => 'inputMateriales',
                            'placeholder' => 'Materiales',
                            'value'       => set_value('materiales')
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
                    <?php 
                      if ($tarea_id) {
                        $cancel_route = base_url()."tarea/edit/$tarea_id";
                      }else{
                        $cancel_route = base_url()."plan";
                      }
                    ?>
                      <a href='<?php echo $cancel_route ?>'>
                          <button type="button" class="btn btn-danger btn-md">Cancelar</button>
                      </a>
                  </div>
              </div>
        </div>
    </div>
</div>