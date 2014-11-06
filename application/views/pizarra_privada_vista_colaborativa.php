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
  <div class="board" style="margin-top: -35px;">
    <div class="board-inner">
      <ul class="nav nav-tabs" id="myTab">
      <div class="liner"></div>

      <li class="active">
        <a href="#home" data-toggle="tab" title="Pizarras">
          <span class="round-tabs one">
            <i class="fa fa-fw fa-slideshare"></i>
          </span> 
        </a>
      </li>

      <li>
        <a href="#profile" data-toggle="tab" title="Chat colaborativo">
          <span class="round-tabs two">
            <i class="fa fa-fw fa-wechat"></i>
          </span> 
        </a>
      </li>

      <li>
        <a href="#messages" data-toggle="tab" title="Verificar ecuaciones">
          <span class="round-tabs three">
            <i class="fa fa-fw fa-check-square-o"></i>
          </span>
        </a>
      </li>

      <li>
        <a href="#settings" data-toggle="tab" title="Archivos">
          <span class="round-tabs four">
            <i class="fa fa-fw fa-cloud-download"></i>
          </span> 
        </a>
      </li>

      <li>
        <a href="#doner" data-toggle="tab" title="Métricas">
          <span class="round-tabs five">
            <i class="fa fa-fw fa-bar-chart"></i>
          </span>
        </a>
      </li>
       
    </ul>
  </div>

    <div class="tab-content">
      <div class="tab-pane fade in active" id="home">
        <!-- Panel de Pizarra Privada local starts here -->
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
      <div class="tab-pane fade" id="profile">

        <h3 class="head text-center">Create a Bootsnipp<sup>™</sup> Profile</h3>
        <p class="narrow text-center">
          Lorem ipsum dolor sit amet, his ea mollis fabellas principes. Quo mazim facilis tincidunt ut, utinam saperet facilisi an vim.
        </p>
                
        <p class="text-center">
          <a href="" class="btn btn-success btn-outline-rounded green"> create your profile <span style="margin-left:10px;" class="glyphicon glyphicon-send"></span></a>
        </p>
                
      </div>
      <div class="tab-pane fade" id="messages">

        <h3 class="head text-center">Bootsnipp goodies</h3>
        <p class="narrow text-center">
          Lorem ipsum dolor sit amet, his ea mollis fabellas principes. Quo mazim facilis tincidunt ut, utinam saperet facilisi an vim.
        </p>
          
        <p class="text-center">
          <a href="" class="btn btn-success btn-outline-rounded green"> start using bootsnipp <span style="margin-left:10px;" class="glyphicon glyphicon-send"></span></a>
        </p>

      </div>
      <div class="tab-pane fade" id="settings">

        <h3 class="head text-center">Drop comments!</h3>
        <p class="narrow text-center">
            Lorem ipsum dolor sit amet, his ea mollis fabellas principes. Quo mazim facilis tincidunt ut, utinam saperet facilisi an vim.
        </p>
          
        <p class="text-center">
          <a href="" class="btn btn-success btn-outline-rounded green"> start using bootsnipp <span style="margin-left:10px;" class="glyphicon glyphicon-send"></span></a>
        </p>

      </div>
      <div class="tab-pane fade" id="doner">

        <div class="text-center">
          <i class="img-intro icon-checkmark-circle"></i>
        </div>
        <h3 class="head text-center">thanks for staying tuned! <span style="color:#f48260;">♥</span> Bootstrap</h3>
        <p class="narrow text-center">
          Lorem ipsum dolor sit amet, his ea mollis fabellas principes. Quo mazim facilis tincidunt ut, utinam saperet facilisi an vim.
        </p>

      </div>
      <div class="clearfix"></div>
    </div>
  </div>
  <!-- end board -->
  </div>
  <!-- end col lg 12 -->
</div>

<!-- Table filters logic -->
<script src="<?php echo base_url(); ?>js/update-pizarra-content.js"></script>

<!-- Custom Pizarra Virtual CSS -->
<link rel="stylesheet" href="<?php echo base_url(); ?>css/pizarra.css">