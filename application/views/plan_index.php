<!-- Page Heading -->
<div class="row">
    <div class="col-lg-2">
        <h1 class="page-header">
            Planes
        </h1>
    </div>
    <div class="col-lg-10">
        <h1 class="page-header">
            <a href="<?php echo base_url(); ?>plan/create">
                <button type="button" class="btn btn-success btn-md">
                    Crear Nuevo Plan
               </button>
            </a>
        </h1>
    </div>
</div>
<!-- /.row -->

<?php if ($status != ""): ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="alert alert-info alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <i class="fa fa-info-circle"></i>  
                <?php if ($status == "save_success"): ?>
                    Se ha registrado existósamente el nuevo plan
                <?php endif ?>
                <?php if ($status == "update_success"): ?>
                    Se ha actualizado existósamente el plan                                  
                <?php endif ?>
                <?php if ($status == "delete_success"): ?>
                    Se ha eliminado existósamente el plan                                 
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
                    <i class="fa fa-file-text-o"></i>Planes<span class="space"></span>
                    <button class="btn btn-info btn-filter"><span class="glyphicon glyphicon-search"></span> Buscar</button>
                </h3>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-striped">
                        <thead>
                            <tr class="filters">
                                <th><input type="text" class="form-control" placeholder="Nombre" disabled></th>
                                <th><input type="text" class="form-control" placeholder="Descripción" disabled></th>
                                <th><input type="text" class="form-control" placeholder="Tarea Perteneciente" disabled></th>
                                <th>Gestionar Archivos</th>
                                <th>Editar</th>
                                <th>Eliminar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (isset($planes)): ?>
                                <?php foreach ($planes as $plan): ?>
                                    <tr>
                                    <td><?php echo $plan->nombre; ?></td>
                                    <td><?php echo $plan->materiales; ?></td>
                                    <td><?php echo $plan->tarea->nombre; ?></td>
                                    <td>
                                        <a href='<?php echo base_url()."plan/edit/$plan->id"; ?>'>
                                            <button class="btn btn-primary btn-md">Gestionar Archivos</button>
                                        </a>
                                    </td>
                                    <td>
                                        <a href='<?php echo base_url()."plan/edit/$plan->id"; ?>'>
                                            <button class="btn btn-primary btn-md">Editar</button>
                                        </a>
                                    </td>
                                    <td>
                                        <button class="btn btn-danger btn-md show-modal-confirm" data-toggle="modal" data-id='<?php echo $plan->id; ?>'>
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
        <h4>¿Está seguro que desea eliminar este registro?</h4>
      </div>
      <div class="modal-footer">
        <a href='<?php echo base_url()."plan/destroy/$plan->id"; ?>' id="delete_ref">
            <button type="button" class="btn btn-danger" id="btn-delete">Eliminar</button>
        </a> 
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>

<!-- Table filters logic -->
<script src="<?php echo base_url(); ?>js/table-filter.js"></script>

<!-- Confirm delete logic -->
<script src="<?php echo base_url(); ?>js/confirm-delete.js"></script>
