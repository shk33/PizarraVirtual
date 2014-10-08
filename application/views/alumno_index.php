<!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-2">
                        <h1 class="page-header">
                            Alumnos
                        </h1>
                    </div>
                    <div class="col-lg-10">
                        <h1 class="page-header">
                            <a href="<?php echo base_url(); ?>alumno/create">
                                <button type="button" class="btn btn-success btn-md">
                                    Crear Nuevo Alumno
                               </button>
                            </a>
                        </h1>
                    </div>
                </div>
                <!-- /.row -->

                <?php if ($success): ?>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="alert alert-info alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <i class="fa fa-info-circle"></i>  Se ha registrado existósamente el nuevo alumno
                            </div>
                        </div>
                    </div>
                <?php endif ?>
                
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-graduation-cap fa-fw"></i>Alumnos</h3>
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover table-striped">
                                        <thead>
                                            <tr>
                                                <th>Nombre</th>
                                                <th>Apellidos</th>
                                                <th>Matricula</th>
                                                <th>Correo</th>
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
                                                    </tr>
                                                <?php endforeach ?>
                                            <?php endif ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>