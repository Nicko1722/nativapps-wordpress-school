<?php

function nativapps_listar_cursos() {
    ?>
    <link type="text/css" href="<?php echo WP_PLUGIN_URL; ?>/nativapps/style.css" rel="stylesheet" />
    <div class="wrap">
        <h2>Lista de cursos</h2>

        <div class="tablenav top">
            <div class="alignleft actions">
                <a href="<?php echo admin_url('admin.php?page=nativapps_crear_curso'); ?>">
                    Crear curso
                </a>
            </div>
            <br class="clear">
        </div>
        <?php
        global $wpdb;
        $table_name = $wpdb->prefix . "nativapps_curso";

        $rows = $wpdb->get_results("SELECT id, codigo, nombre, observaciones from $table_name");
        ?>
        <table class='wp-list-table widefat fixed striped posts'>
            <tr>
                <th class="manage-column ss-list-width">Id</th>
                <th class="manage-column ss-list-width">Codigo</th>
                <th class="manage-column ss-list-width">Nombre</th>
                <th class="manage-column ss-list-width">Observaciones</th>
                <th>&nbsp;</th>
            </tr>
            <?php foreach ($rows as $row) { ?>
                <tr>
                    <td class="manage-column ss-list-width"><?php echo $row->id; ?></td>
                    <td class="manage-column ss-list-width"><?php echo $row->codigo; ?></td>
                    <td class="manage-column ss-list-width"><?php echo $row->nombre; ?></td>
                    <td class="manage-column ss-list-width"><?php echo $row->observaciones; ?></td>
                    <td>
                        <a href="<?php echo admin_url('admin.php?page=nativapps_actualizar_curso&id=' . $row->id); ?>">
                            Modificar
                        </a>
                    </td>
                </tr>
            <?php } ?>
        </table>
    </div>
    <?php
}