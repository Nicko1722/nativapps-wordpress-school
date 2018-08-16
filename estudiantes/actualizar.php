<?php

function nativapps_actualizar_estudiante() {
    global $wpdb;
    $table_name = $wpdb->prefix . "nativapps_estudiante";
    $id = $_GET["id"];
    $nombres = $_POST["nombres"];
    $apellidos = $_POST["apellidos"];
    $genero = $_POST["genero"];
    $identificacion = $_POST["identificacion"];
    //update
    if (isset($_POST['update'])) {
        $wpdb->update(
            $table_name, //table
            array('nombres' => $nombres, 'apellidos' => $apellidos, 'identificacion' => $identificacion, 'genero' => $genero), //data
            array('id' => $id), //where
            array('%s'), //data format
            array('%s') //where format
        );
    }
    //delete
    else if (isset($_POST['delete'])) {
        $wpdb->query($wpdb->prepare("DELETE FROM $table_name WHERE id = %s", $id));
    } else {//selecting value to update	
        $estudiantes = $wpdb->get_results(
                $wpdb->prepare(
                        "SELECT id, nombres, apellidos, genero, identificacion from $table_name where id=%s", $id
                )
        );
        foreach ($estudiantes as $d) {
            $nombres = $d->nombres;
            $apellidos = $d->apellidos;
            $genero = $d->genero;
            $identificacion = $d->identificacion;
        }
    }
    ?>
    <link type="text/css" href="<?php echo WP_PLUGIN_URL; ?>/nativapps/style.css" rel="stylesheet" />
    <div class="wrap">
        <h2>Modificar estudiante</h2>

        <?php if ($_POST['delete']) { ?>
            <div class="updated"><p>estudiante Eliminado</p></div>
            <a href="<?php echo admin_url('admin.php?page=nativapps_listar_estudiantes') ?>">&laquo; Volver a la lista de estudiantes</a>

        <?php } else if ($_POST['update']) { ?>
            <div class="updated"><p>estudiante Actualizado</p></div>
            <a href="<?php echo admin_url('admin.php?page=nativapps_listar_estudiantes') ?>">&laquo; Volver a la lista de estudiantes</a>

        <?php } else { ?>
            <form method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
                <table class='wp-list-table widefat fixed'>
                    <tr>
                        <th class="ss-th-width">Identificación</th>
                        <td>
                            <input type="text" name="identificacion" value="<?php echo $identificacion; ?>" class="ss-field-width" />
                        </td>
                    </tr>
                    <tr>
                        <th class="ss-th-width">Nombres</th>
                        <td>
                            <input type="text" name="nombres" value="<?php echo $nombres; ?>" class="ss-field-width" />
                        </td>
                    </tr>
                    <tr>
                        <th class="ss-th-width">Apellidos</th>
                        <td>
                            <input type="text" name="apellidos" value="<?php echo $apellidos; ?>" class="ss-field-width" />
                        </td>
                    </tr>
                    <tr>
                        <th class="ss-th-width">Genero</th>
                        <td>
                            <select name="genero" id="">
                                <option <?php if ($genero == "M" ) echo 'selected' ; ?> value="M">Masculino</option>
                                <option <?php if ($genero == "F" ) echo 'selected' ; ?> value="F">Femenino</option>
                            </select>
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