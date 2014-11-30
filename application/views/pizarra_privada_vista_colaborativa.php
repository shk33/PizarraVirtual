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
        <a href="#chat" data-toggle="tab" title="Chat colaborativo">
          <span class="round-tabs two">
            <i class="fa fa-fw fa-wechat"></i>
          </span> 
        </a>
      </li>

      <li>
        <a href="#results" data-toggle="tab" title="Verificar ecuaciones">
          <span class="round-tabs three">
            <i class="fa fa-fw fa-check-square-o"></i>
          </span>
        </a>
      </li>

      <li>
        <a href="#files" data-toggle="tab" title="Archivos">
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

      <?php $this->load->view('partials/_pizarra_privada.php'); ?>

      <?php
        $data['chat']         = $pizarra->grupo->chat;
        $data['last_message'] = $last_message;
        $this->load->view('partials/_pizarra_privada_chat.php', $data); 
      ?>
      
      <?php $this->load->view('partials/_pizarra_privada_results.php'); ?>

      <?php
        $data['archivos'] = $archivos;         
        $this->load->view('partials/_pizarra_privada_files.php', $data); 
      ?>
      

      <div class="tab-pane fade" id="doner">
        <div class="panel panel-default">

          <div class="panel-heading">
              <h3 class="panel-title">
                Proximamente
              </h3>
          </div>
        </div>
      </div> <!-- enddddd tab pane -->

      <div class="clearfix"></div>
    </div>
  </div>
  <!-- end board -->
  </div>
  <!-- end col lg 12 -->
</div>

<!-- Pizarra Privada auto-update-content -->
<script src="<?php echo base_url(); ?>assets/js/update-pizarra-content.js"></script>

<!-- Pizarra Privada Verify Ecuations -->
<script src="<?php echo base_url(); ?>assets/js/verify_ecuation.js"></script>

<!-- Chat logic -->
<script src="<?php echo base_url(); ?>assets/js/chat.js"></script>

<!-- Custom Pizarra Virtual CSS -->
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/pizarra.css">