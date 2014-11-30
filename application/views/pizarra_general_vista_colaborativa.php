<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            <?php echo $pizarra->nombre ?>
        </h1>
    </div>
</div>
<!-- /.row -->
<div class="row">
  <div class="col-lg-12">

    <!-- Panel de Pizarra general local starts here -->
    <div class="col-lg-6">
      <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">
              <i class="fa fa-2x fa-fw fa-slideshare"></i>
              Pizarra Local  <span class="space"></span>
              <button class="btn btn-primary btn-md">
                <span class="glyphicon glyphicon-search"></span> Verificar
              </button>
              <button type="button" id="btn-share" class="btn btn-success btn-md">
                <i class="fa fa-fw fa-share-alt"></i> Compartir
              </button>
            </h3>
          </div>
          <div class="panel-body">
            <!-- <input type="hidden" id="pizarra_id" name="pizarra_id" value="<?php echo $pizarra->id ?>" /> -->
            <div class="form-group">
                <label for="inputNombre" class="control-label col-xs-offset-1 col-xs-4">Pizarra Virtual</label>
                <div class="col-xs-offset-1 col-xs-10">
                    <?php 
                        $config = array(
                          'name'        => 'pizarra_contenido',
                          'class'       => 'form-control',
                          'id'          => 'pizarra_local',
                          'placeholder' => 'Escribe las ecuaciones aquí',
                          'data-ajax'   => base_url()."pizarra_general/update_content",
                          'value'       => $pizarra->contenido
                        );
                        echo form_textarea($config);
                    ?>
                </div>
            </div>
            <div class="form-group">
              <div class="col-xs-offset-6 col-xs-3">
              </div>
            </div>
          </div>
      </div>
    </div>
    <!-- Panel de Pizarra general local ends  here -->

    <!-- Panel de Pizarra general  remota starts  here -->
    <div class="col-lg-6">
      <div class="panel panel-default">
          <div class="panel-heading">
              <h3 class="panel-title">
                <i class="fa fa-2x fa-fw fa-cloud"></i>
                Pizarra Compartida <span class="space"></span>
                <button class="btn btn-primary btn-md">
                  <span class="glyphicon glyphicon-search"></span> Verificar
                </button>
              </h3>
          </div>
          <div class="panel-body">
            <div class="form-group">
              <label for="inputNombre" class="control-label col-xs-offset-1 col-xs-4">Pizarra Virtual</label>
              <div class="col-xs-offset-1 col-xs-10">
                  <?php 
                      $config = array(
                        'name'        => 'pizarra_compartida',
                        'class'       => 'form-control',
                        'id'          => 'pizarra_compartida',
                        'placeholder' => 'Escribe las ecuaciones aquí',
                        'disabled'    => 'true',
                        'data-ajax'   => base_url()."pizarra_general/get_new_content",
                        'value'       => $pizarra->contenido
                      );
                      echo form_textarea($config);
                  ?>
              </div>
            </div>
          </div>
              <!-- End Panel body -->
        </div>
          <!-- End Panel Default -->
    </div>
    <!-- End Col lg 6 -->
    <!-- Panel de Pizarra general  remota ends  here -->
     
  </div>
</div>

<!-- Table filters logic -->
<script src="<?php echo base_url(); ?>assets/js/update-pizarra-content.js"></script>

<!-- Custom Pizarra Virtual CSS -->
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/pizarra.css">