<!-- Page Heading -->
<div class="row">
    <div class="col-lg-2">
        <h1 class="page-header">
            Grupos
        </h1>
    </div>
</div>
<!-- /.row -->

<div class="row">
    <div class="col-lg-12">
        <div class="alert alert-info alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <i class="fa fa-info-circle"></i> <b>Un grupo se crea únicamente al crear un Plan.</b>  
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
                    Se ha actualizado existósamente el grupo                                  
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
                    <i class="fa fa-users user-fw"></i>Grupos<span class="space"></span>
                    <button class="btn btn-info btn-filter"><span class="glyphicon glyphicon-search"></span> Buscar</button>
                </h3>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-striped">
                        <thead>
                            <tr class="filters">
                                <th><input type="text" class="form-control" placeholder="Nombre" disabled></th>
                                <th><input type="text" class="form-control" placeholder="Observaciones" disabled></th>
                                <th><input type="text" class="form-control" placeholder="Plan" disabled></th>
                                <th><input type="text" class="form-control" placeholder="Tutor" disabled></th>
                                <th>Gestionar Alumos</th>
                                <th>Editar</th>
                                <th>Eliminar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (isset($grupos)): ?>
                                <?php foreach ($grupos as $grupo): ?>
                                    <tr>
                                    <td><?php echo $grupo->nombre; ?></td>
                                    <td><?php echo $grupo->observaciones; ?></td>
                                    <?php $plan = $grupo->plan ?>
                                    <td><?php echo $plan->nombre; ?></td>
                                    <?php $tutor = $plan->tarea->tutor; ?>
                                    <td><?php echo "$tutor->nombre $tutor->apellido"; ?></td>
                                    <td>
                                        <a href='<?php echo base_url()."grupo/edit/$grupo->id"; ?>'>
                                            <button class="btn btn-primary btn-md">Gestionar Alumnos</button>
                                        </a>
                                    </td>
                                    <td>
                                        <a href='<?php echo base_url()."grupo/edit/$grupo->id"; ?>'>
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
        <h4>Para eliminar un grupo es necesario eliminar el plan al cual pertenece.</h4>
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
