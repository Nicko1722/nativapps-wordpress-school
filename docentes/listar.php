<?php

function nativapps_listar_docentes() {
    ?>
    <link type="text/css" href="<?php echo WP_PLUGIN_URL; ?>/nativapps/style.css" rel="stylesheet" />
    <div class="wrap">
        <h2>Lista de docentes</h2>

        <div class="tablenav top">
            <div class="alignleft actions">
                <a href="<?php echo admin_url('admin.php?page=nativapps_crear_docente'); ?>">
                    Crear docente
                </a>
            </div>
            <br class="clear">
        </div>
        <?php
        global $wpdb;
        $table_name = $wpdb->prefix . "nativapps_docente";

        $rows = $wpdb->get_results("SELECT id, nombres, apellidos, genero, identificacion from $table_name");
        ?>
        <table class='wp-list-table widefat fixed striped posts'>
            <tr>
                <th class="manage-column ss-list-width">Id</th>
                <th class="manage-column ss-list-width">Nombres</th>
                <th class="manage-column ss-list-width">Apellidos</th>
                <th class="manage-column ss-list-width">Genero</th>
                <th class="manage-column ss-list-width">Identificación</th>
                <th>&nbsp;</th>
            </tr>
            <?php foreach ($rows as $row) { ?>
                <tr>
                    <td class="manage-column ss-list-width"><?php echo $row->id; ?></td>
                    <td class="manage-column ss-list-width"><?php echo $row->nombres; ?></td>
                    <td class="manage-column ss-list-width"><?php echo $row->apellidos; ?></td>
                    <td class="manage-column ss-list-width"><?php echo $row->genero; ?></td>
                    <td class="manage-column ss-list-width"><?php echo $row->identificacion; ?></td>
                    <td>
                        <a href="<?php echo admin_url('admin.php?page=nativapps_actualizar_docente&id=' . $row->id); ?>">
                            Modificar
                        </a>
                    </td>
                </tr>
            <?php } ?>
        </table>
    </div>
    <?php
}