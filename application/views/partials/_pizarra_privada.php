<!-- Panel de Pizarra Privada local starts here -->
<div class="tab-pane fade in active" id="home">
  <div class="col-lg-6">
    <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">
            <i class="fa fa-2x fa-fw fa-slideshare"></i>
            Pizarra Local  <span class="space"></span>
            <button id="btn-verify-1" class="btn btn-primary btn-md">
              <span class="glyphicon glyphicon-search"></span> Verificar
            </button>
            <button type="button" id="btn-share" class="btn btn-success btn-md">
              <i class="fa fa-fw fa-share-alt"></i> Compartir
            </button>
          </h3>
        </div>
        <div class="panel-body">
          <input type="hidden" id="pizarra_id" name="pizarra_id" value="<?php echo $pizarra->id ?>" />
          <div class="form-group">
              <label for="inputNombre" class="control-label col-xs-offset-1 col-xs-4">Pizarra Virtual</label>
              <div class="col-xs-offset-1 col-xs-10">
                  <?php 
                      $config = array(
                        'name'        => 'pizarra_contenido',
                        'class'       => 'form-control',
                        'id'          => 'pizarra_local',
                        'placeholder' => 'Escribe las ecuaciones aquí',
                        'data-ajax'   => base_url()."pizarra_privada/update_content",
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
  <!-- Panel de Pizarra Privada local ends  here -->

  <!-- Panel de Pizarra Privada  remota starts  here -->
  <div class="col-lg-6">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">
              <i class="fa fa-2x fa-fw fa-cloud"></i>
              Pizarra Compartida <span class="space"></span>
              <button id="btn-verify-2" class="btn btn-primary btn-md">
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
                      'data-ajax'   => base_url()."pizarra_privada/get_new_content",
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
  <!-- Panel de Pizarra Privada  remota ends  here -->
</div>