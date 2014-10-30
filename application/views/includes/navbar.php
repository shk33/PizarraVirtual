
 <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo base_url(); ?>">
                    Pizarra Virtual
                </a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $this->session->userdata('userType'); ?><b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="<?php echo base_url('login/close'); ?>"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li class="active">
                        <a href="<?php echo base_url(); ?>sitio/admin"><i class="fa fa-fw fa-home"></i> Estadísticas</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>tutor"><i class="fa fa-fw fa-user"></i> Tutores</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>alumno"><i class="fa fa-fw fa-graduation-cap"></i> Alumnos</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>tarea"><i class="fa fa-fw fa-pencil"></i> Tareas</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>plan"><i class="fa fa-fw fa-file-text-o"></i> Planes</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>grupo"><i class="fa fa-fw fa-users"></i> Grupos</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>pizarra_privada"><i class="fa fa-fw fa-slideshare"></i> Pizarras Privadas</a>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-arrows-v"></i> Dropdown <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo" class="collapse">
                            <li>
                                <a href="#">Dropdown Item</a>
                            </li>
                            <li>
                                <a href="#">Dropdown Item</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>