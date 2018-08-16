<?php

function show_nativapps_index() {
    ?>
    <link type="text/css" href="<?php echo WP_PLUGIN_URL; ?>/nativapps/style.css" rel="stylesheet"/>
    <h2>
        Gestion de docentes, estudiantes y cursos
    </h2>

    <a href="<?php echo admin_url('admin.php?page=nativapps_listar_estudiantes') ?>">Estudiantes</a>
    <br>
    <a href="<?php echo admin_url('admin.php?page=nativapps_listar_docentes') ?>">Docentes</a>
    <br>
    <a href="<?php echo admin_url('admin.php?page=nativapps_listar_cursos') ?>">Cursos</a>
    <?php
}

