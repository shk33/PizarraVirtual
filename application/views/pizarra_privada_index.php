<!-- Page Heading -->
<div class="row">
    <div class="col-lg-2">
        <h1 class="page-header">
            Pizarras Privadas
        </h1>
    </div>
</div>
<!-- /.row -->

<div class="row">
    <div class="col-lg-12">
        <div class="alert alert-info alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <i class="fa fa-info-circle"></i> <b>Una Pizarra privada se crea únicamente al crear un Plan.</b>  
        </div>
    </div>
</div>
<?php if ($status != ""): ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="alert alert-info alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <i class="fa fa-info-circle"></i>  
                <?php if ($status == "update_success"): ?>
                    Se ha actualizado existósamente la pizarra                                  
                <?php endif ?>
            </div>
        </div>
    </div>
<?php endif ?>

<!-- /.row -->

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default filterable">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <i class="fa fa-users user-fw"></i>Pizarras Privadas<span class="space"></span>
                    <button class="btn btn-info btn-filter"><span class="glyphicon glyphicon-search"></span> Buscar</button>
                </h3>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-striped">
                        <thead>
                            <tr class="filters">
                                <th><input type="text" class="form-control" placeholder="Nombre" disabled></th>
                                <th><input type="text" class="form-control" placeholder="Contenido" disabled></th>
                                <th><input type="text" class="form-control" placeholder="Grupo" disabled></th>
                                <th><input type="text" class="form-control" placeholder="Plan" disabled></th>
                                <th>Gestionar Archivos</th>
                                <th>Editar</th>
                                <th>Eliminar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (isset($pizarras)): ?>
                                <?php foreach ($pizarras as $pizarra): ?>
                                    <tr>
                                    <?php $grupo = $pizarra->grupo ?>
                                    <?php $plan = $grupo->plan ?>
                                    <td><?php echo $pizarra->nombre; ?></td>
                                    <td><?php echo $pizarra->contenido; ?></td>
                                    <td><?php echo $grupo->nombre; ?></td>
                                    <td><?php echo $plan->nombre; ?></td>
                                    <td>
                                        <a href='<?php echo base_url()."archivo/edit/$grupo->id"; ?>'>
                                            <button class="btn btn-primary btn-md">Gestionar Archivos</button>
                                        </a>
                                    </td>
                                    <td>
                                        <a href='<?php echo base_url()."pizarra_privada/edit/$pizarra->id"; ?>'>
                                            <button class="btn btn-primary btn-md">Editar</button>
                                        </a>
                                    </td>
                                    <td>
                                        <button class="btn btn-danger btn-md show-modal-confirm" data-toggle="modal">
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
    <!-- End Col lg 12 -->
</div>
<!-- End Row -->

<!-- Delete Confirmation Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h3 class="modal-title" id="myModalLabel">Eliminar Registro <i class="fa fa-warning"></i></h3>
      </div>
      <div class="modal-body">
        <h4>Para eliminar una pizarra es necesario eliminar el plan al cual pertenece.</h4>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Aceptar</button>
      </div>
    </div>
  </div>
</div>

<!-- Table filters logic -->
<script src="<?php echo base_url(); ?>js/table-filter.js"></script>

<!-- Confirm delete logic -->
<script src="<?php echo base_url(); ?>js/confirm-delete.js"></script>
