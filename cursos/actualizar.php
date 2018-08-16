<?php

function nativapps_actualizar_curso() {
    global $wpdb;
    $table_name = $wpdb->prefix . "nativapps_curso";
    $id = $_GET["id"];
    $codigo = $_POST["codigo"];
    $nombre = $_POST["nombre"];
    $observaciones = $_POST["observaciones"];
    //update
    if (isset($_POST['update'])) {
        $wpdb->update(
            $table_name, //table
            array('codigo' => $codigo, 'nombre' => $nombre, 'observaciones' => $observaciones), //data
            array('id' => $id), //where
            array('%s'), //data format
            array('%s') //where format
        );
    }
    //delete
    else if (isset($_POST['delete'])) {
        $wpdb->query($wpdb->prepare("DELETE FROM $table_name WHERE id = %s", $id));
    } else {//selecting value to update	
        $cursos = $wpdb->get_results(
                $wpdb->prepare(
                        "SELECT id,codigo,nombre,observaciones from $table_name where id=%s", $id
                )
        );
        foreach ($cursos as $c) {
            $nombre = $c->nombre;
            $observaciones = $c->observaciones;
            $codigo = $c-> codigo;
        }
    }
    ?>
    <link type="text/css" href="<?php echo WP_PLUGIN_URL; ?>/nativapps/style.css" rel="stylesheet" />
    <div class="wrap">
        <h2>Modificar Curso</h2>

        <?php if ($_POST['delete']) { ?>
            <div class="updated"><p>Curso Eliminado</p></div>
            <a href="<?php echo admin_url('admin.php?page=nativapps_listar_cursos') ?>">&laquo; Volver a la lista de cursos</a>

        <?php } else if ($_POST['update']) { ?>
            <div class="updated"><p>Curso Actualizado</p></div>
            <a href="<?php echo admin_url('admin.php?page=nativapps_listar_cursos') ?>">&laquo; Volver a la lista de cursos</a>

        <?php } else { ?>
            <form method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
                <table class='wp-list-table widefat fixed'>
                    <tr>
                        <th class="ss-th-width">Codigo</th>
                        <td>
                            <input type="text" name="codigo" value="<?php echo $codigo; ?>" class="ss-field-width" />
                        </td>
                    </tr>
                    <tr>
                        <th class="ss-th-width">Nombre</th>
                        <td>
                            <input type="text" name="nombre" value="<?php echo $nombre; ?>" class="ss-field-width" />
                        </td>
                    </tr>
                    <tr>
                        <th class="ss-th-width">Observaciones</th>
                        <td>
                            <input type="text" name="observaciones" value="<?php echo $observaciones; ?>" class="ss-field-width" />
                        </td>
                    </tr>
                </table>
                <input type='submit' name="update" value='Guardar' class='button'> &nbsp;&nbsp;
                <input type='submit' name="delete" value='Eliminar' class='button' onclick="return confirm('&iquest;Est&aacute;s seguro de borrar este elemento?')">
            </form>
        <?php } ?>

    </div>
    <?php
}