<?php
include('../send_mail.php');
function nativapps_crear_curso() {
    $codigo = $_POST["codigo"];
    $nombre = $_POST["nombre"];
    $observaciones = $_POST["observaciones"];
    //insert
    if (isset($_POST['insert'])) {
        global $wpdb;
        $table_name = $wpdb->prefix . "nativapps_curso";

        $wpdb->insert(
                $table_name, //table
                array('codigo' => $codigo, 'nombre' => $nombre, 'observaciones' => $observaciones), //data
                array('%s', '%s') //data format			
        );
        $message = "Curso Creado!";

        wp_mail(
            "paula.aragon@nativapps.co",
            "Nuevo Curso Creado!",
            "Nombre del curso : $nombre,  codigo del curso : $codigo,  observaciones $observaciones"
        );
    }
    ?>
    <link type="text/css" href="<?php echo WP_PLUGIN_URL; ?>/nativapps/style.css" rel="stylesheet" />
    <div class="wrap">
        <h2>Crear nuevo curso</h2>
        <?php if (isset($message)): ?><div class="updated"><p><?php echo $message; ?></p></div><?php endif; ?>
        <form method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
            <p>Ingrese los datos del curso</p>
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
            <input type='submit' name="insert" value='Guardar Curso' class='button'>
        </form>
    </div>
    <?php
}