<!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-2">
                        <h1 class="page-header">
                            Tareas
                        </h1>
                    </div>
                    <div class="col-lg-10">
                        <h1 class="page-header">
                            <a href="<?php echo base_url(); ?>tarea/create">
                                <button type="button" class="btn btn-success btn-md">
                                    Crear Nuevo Tarea
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
                                    Se ha registrado existósamente la nueva tarea
                                <?php endif ?>
                                <?php if ($status == "update_success"): ?>
                                    Se ha actualizado existósamente la tarea                                  
                                <?php endif ?><?php if ($status == "delete_success"): ?>
                                    Se ha eliminado existósamente la tarea                                  
                                <?php endif ?>
                            </div>
                        </div>
                    </div>
                <?php endif ?>
                
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-pencil fa-fw"></i>Alumnos</h3>
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover table-striped">
                                        <thead>
                                            <tr>
                                                <th>Nombre</th>
                                                <th>Descripción</th>
                                                <th>Editar</th>
                                                <th>Eliminar</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if (isset($tareas)): ?>
                                                <?php foreach ($tareas as $tarea): ?>
                                                    <tr>
                                                    <td><?php echo $tarea->nombre; ?></td>
                                                    <td><?php echo $tarea->descripcion; ?></td>
                                                    <td>
                                                        <a href='<?php echo base_url()."tarea/edit/$tarea->id"; ?>'>
                                                            <button class="btn btn-primary btn-md">Editar</button>
                                                        </a>
                                                    </td>
                                                    <td>
                                                        <button class="btn btn-danger btn-md show-modal-confirm" data-toggle="modal" data-id='<?php echo $tarea->id; ?>'>
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
                        <a href='<?php echo base_url()."tarea/destroy/$tarea->id"; ?>' id="delete_ref">
                            <button type="button" class="btn btn-danger" id="btn-delete">Eliminar</button>
                        </a> 
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                      </div>
                    </div>
                  </div>
                </div>

                <script TYPE="text/javascript">
                    $(".show-modal-confirm").click(function(){
                        $('#myModal').modal();
                        id= $(this).attr('data-id');
                        $("#delete_ref").attr('href', '<?php echo base_url()."tarea/destroy/"; ?>'+id);
                    });
                </script>
