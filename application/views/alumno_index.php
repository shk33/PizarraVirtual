<!-- Page Heading -->
<div class="row">
    <div class="col-lg-2">
        <h1 class="page-header">
            Alumnos
        </h1>
    </div>
    <?php if ($this->session->userdata('permitionLevel') >= 3): ?>
        <div class="col-lg-10">
            <h1 class="page-header">
                <a href="<?php echo base_url(); ?>alumno/create">
                    <button type="button" class="btn btn-success btn-md">
                        Crear Nuevo Alumno
                   </button>
                </a>
            </h1>
        </div>
    <?php endif ?>
</div>
<!-- /.row -->

<?php if ($status != ""): ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="alert alert-info alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <i class="fa fa-info-circle"></i>  
                <?php if ($status == "save_success"): ?>
                    Se ha registrado existósamente el nuevo alumno
                <?php endif ?>
                <?php if ($status == "update_success"): ?>
                    Se ha actualizado existósamente el alumno                                    
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
                    <i class="fa fa-graduation-cap user-fw"></i>Alumnos<span class="space"></span>
                    <button class="btn btn-info btn-filter"><span class="glyphicon glyphicon-search"></span> Buscar</button>
                </h3>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-striped">
                        <thead>
                            <tr class="filters">
                                <th><input type="text" class="form-control" placeholder="Nombre" disabled></th>
                                <th><input type="text" class="form-control" placeholder="Apellidos" disabled></th>
                                <th><input type="text" class="form-control" placeholder="Matricula" disabled></th>
                                <th><input type="text" class="form-control" placeholder="Correo" disabled></th>
                                <th><input type="text" class="form-control" placeholder="Grupo" disabled></th>
                                <?php if ($this->session->userdata('permitionLevel') >= 3): ?>
                                <th>Editar</th>
                                <th>Eliminar</th>
                                <?php endif ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (isset($alumnos)): ?>
                                <?php foreach ($alumnos as $alumno): ?>
                                    <tr>
                                    <td><?php echo $alumno->nombre; ?></td>
                                    <td><?php echo $alumno->apellido; ?></td>
                                    <td><?php echo $alumno->matricula; ?></td>
                                    <td><?php echo $alumno->correo; ?></td>
                                    <?php if (isset($alumno->grupo->nombre)): ?>
                                        <td><?php echo $alumno->grupo->nombre; ?></td>
                                    <?php else: ?>
                                        <td>Sin Grupo</td>
                                    <?php endif ?>
                                    <?php if ($this->session->userdata('permitionLevel') >= 3): ?>
                                    <td>
                                        <a href='<?php echo base_url()."alumno/edit/$alumno->id"; ?>'>
                                            <button class="btn btn-primary btn-md">Editar</button>
                                        </a>
                                    </td>
                                    <td>
                                        <button class="btn btn-danger btn-md show-modal-confirm" data-toggle="modal"
                                         data-url='<?php echo base_url()."alumno/destroy/$alumno->id"; ?>'>                                          Eliminar
                                        </button>
                                    </td>
                                    <?php endif ?>
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
        <a href='<?php echo base_url()."alumno/destroy/$alumno->id"; ?>' id="delete_ref">
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
