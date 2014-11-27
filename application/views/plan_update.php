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
  
    <div class="col-lg-6">
      <div class="panel panel-default">

        <div class="panel-heading">
            <h3 class="panel-title space_heading">Datos Generales</h3>
        </div>

        <?php 
          echo form_open('plan/update', array('class' => 'form-horizontal'));
          echo form_hidden('id', $plan->id); 
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
                  'value'       => $plan->nombre
                );
                echo form_input($config); 
              ?>
            </div>
          </div>
          <div class="form-group">
            <label for="inputMateriales" class="control-label col-xs-offset-1 col-xs-2">Materiales</label>
            <div class="col-xs-offset-1 col-xs-10">
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
            <div class="col-xs-offset-6 col-xs-3">
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

<!-- Table with Files del Plan -->
  <div class="col-lg-6">
    <div class="panel panel-default filterable">
        <div class="panel-heading">
            <h3 class="panel-title">
              <!-- I know this is a terrible way to add horizontal space -->
              Archivos <span class="space"></span>
              <button type="button" class="btn btn-success btn-md show-modal-upload">
                Subir Archivo
               </button>
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
                          <th>Descargar</th>
                          <th>Eliminar</th>
                        </tr>
                    </thead>
                    <tbody>
                      <?php if (isset($archivos)): ?>
                          <?php foreach ($archivos as $archivo): ?>
                              <tr>
                                <?php $nombre = substr($archivo->nombre , -40)  ?>
                                <td><?php echo $nombre ?></td>
                                <td>
                                    <a href='<?php echo base_url()."archivo/download/$archivo->id" ?>'>
                                        <button class="btn btn-primary btn-md">Descargar</button>
                                    </a>
                                </td>
                                <td>
                                  <button class="btn btn-danger btn-md show-modal-confirm" data-toggle="modal"
                                     data-url='<?php echo base_url()."archivo/destroy/$archivo->id/$plan->id"; ?>'>
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
        <a href='' id="delete_ref">
            <button type="button" class="btn btn-danger" id="btn-delete">Eliminar</button>
        </a> 
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>

<!-- Upload File Modal -->
<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h3 class="modal-title" id="myModalLabel">Subir Archivo <i class="fa fa-cloud-upload"></i></h3>
      </div>
      <div class="modal-body">
        <?php echo form_open_multipart('archivo/upload');?>
          <?php echo form_hidden('plan_id', $plan->id);  ?>
          <input type="file" name="userfile" size="20" />
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary btn-md">Subir</button>
        </form>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>

<!-- Table filters logic -->
<script src="<?php echo base_url(); ?>js/table-filter.js"></script>

<!-- Confirm delete logic -->
<script src="<?php echo base_url(); ?>js/confirm-delete.js"></script>

<!-- Upload logic -->
<script src="<?php echo base_url(); ?>js/upload.js"></script>