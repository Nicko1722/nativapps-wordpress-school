<?php

function nativapps_crear_estudiante() {
    $nombres = $_POST["nombres"];
    $apellidos = $_POST["apellidos"];
    $genero = $_POST["genero"];
    $identificacion = $_POST["identificacion"];
    //insert
    if (isset($_POST['insert'])) {
        global $wpdb;
        $table_name = $wpdb->prefix . "nativapps_estudiante";

        $wpdb->insert(
                $table_name, //table
                array('identificacion' => $identificacion, 'nombres' => $nombres, 'apellidos' => $apellidos, 'genero' => $genero), //data
                array('%s', '%s') //data format			
        );
        $message = "Estudiante Creado!";
        wp_mail(
            "paula.aragon@nativapps.co",
            "Nuevo Docente Creado",
            "Nombre completo : <strong>$nombres $apellidos</strong>, identificacion : $identificacion, genero : $genero"
        );
    }
    ?>
    <link type="text/css" href="<?php echo WP_PLUGIN_URL; ?>/nativapps/style.css" rel="stylesheet" />
    <div class="wrap">
        <h2>Crear nuevo estudiante</h2>
        <?php if (isset($message)): ?><div class="updated"><p><?php echo $message; ?></p></div><?php endif; ?>
        <form method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
            <p>Ingrese los datos del estudiante</p>
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
            <input type='submit' name="insert" value='Guardar estudiante' class='button'>
        </form>
    </div>
    <?php
}