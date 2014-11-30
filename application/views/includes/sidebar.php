<!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
<div class="collapse navbar-collapse navbar-ex1-collapse">
    <ul class="nav navbar-nav side-nav">
        <?php $permition_level = $this->session->userdata('permitionLevel'); ?>
        <?php if ($permition_level >= 3): ?>
            <li>
                <a href="<?php echo base_url(); ?>sitio/admin"><i class="fa fa-fw fa-home"></i> <b>Estadísticas</b></a>
            </li>
            <li>
                <a href="<?php echo base_url(); ?>tutor"><i class="fa fa-fw fa-user"></i> <b>Tutores </b> </a>
            </li>
        <?php endif ?>
        <?php if ($permition_level >= 2): ?>
            <li>
                <a href="<?php echo base_url(); ?>alumno"><i class="fa fa-fw fa-graduation-cap"></i> <b>Alumnos </b> </a>
            </li>
            <li>
                <a href="<?php echo base_url(); ?>tarea"><i class="fa fa-fw fa-pencil"></i> <b>Tareas </b> </a>
            </li>
            <li>
                <a href="<?php echo base_url(); ?>plan"><i class="fa fa-fw fa-file-text-o"></i> <b>Planes </b> </a>
            </li>
            <li>
                <a href="<?php echo base_url(); ?>grupo"><i class="fa fa-fw fa-users"></i> <b>Grupos </b> </a>
            </li>
            <li>
                <a href="<?php echo base_url(); ?>pizarra_general"><i class="fa fa-fw fa-slideshare"></i> <b>Pizarra General </b> </a>
            </li>
            <li>
                <a href="<?php echo base_url(); ?>pizarra_privada"><i class="fa fa-fw fa-slideshare"></i> <b>Pizarras Privadas </b> </a>
            </li>
            <li>
                <a href="<?php echo base_url(); ?>registro_error"><i class="fa fa-fw fa-line-chart"></i> <b>Registros </b> </a>
            </li>
        <?php endif ?>
        <?php if ($permition_level == 1): ?>
        <li>
            <a href="<?php echo base_url(); ?>pizarra_general"><i class="fa fa-fw fa-slideshare"></i> <b>Pizarra General </b> </a>
        </li>
        <li>
            <?php  ?>
            <a href="<?php echo base_url(); ?>pizarra_privada/show_pizarra_to_alumno"><i class="fa fa-fw fa-slideshare"></i>  <b>Pizarras Privadas</b></a>
        </li>
        <?php endif ?>
    </ul>
</div>