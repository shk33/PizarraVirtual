<!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
<div class="collapse navbar-collapse navbar-ex1-collapse">
    <ul class="nav navbar-nav side-nav">
        <?php $permition_level = $this->session->userdata('permitionLevel'); ?>
        <?php if ($permition_level >= 3): ?>
            <li>
                <a href="<?php echo base_url(); ?>sitio/admin"><i class="fa fa-fw fa-home"></i> Estadísticas</a>
            </li>
            <li>
                <a href="<?php echo base_url(); ?>tutor"><i class="fa fa-fw fa-user"></i> Tutores</a>
            </li>
        <?php endif ?>
        <?php if ($permition_level >= 2): ?>
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
        <?php endif ?>
        <?php if ($permition_level >= 1): ?>
        <li>
            <a href="<?php echo base_url(); ?>pizarra_privada"><i class="fa fa-fw fa-slideshare"></i> Pizarras Privadas</a>
        </li>
        <?php endif ?>
    </ul>
</div>