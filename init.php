<?php
/*
Plugin Name: Nativapps School
Description: Prueba tecnica nativapps nicoolas escorcia
Version: 1
Author: Nicolas Escorcia
Author URI: https://github.com/Nicko1722
*/
//menu items
add_action('admin_menu', 'nativapps_set_menu');
function nativapps_set_menu()
{

    // Menu principal
    add_menu_page('Nativapps School', //page title
        'Nativapps School', //menu title
        'manage_options', //capabilities
        'show_nativapps_index', //menu slug
        'show_nativapps_index' //function
    );

    /** CURSOS **/
    // Lista de cursos
    add_submenu_page('show_nativapps_index', //parent slug
        'Lista de cursos', //page title
        'Lista de cursos', //menu title
        'manage_options', //capability
        'nativapps_listar_cursos', //menu slug
        'nativapps_listar_cursos'
    );

    // Crear curso
    add_submenu_page('nativapps_listar_cursos', //parent slug
        'Crear curso', //page title
        null, //menu title
        'manage_options', //capability
        'nativapps_crear_curso', //menu slug
        'nativapps_crear_curso'
    );

    // Actualizar Curso
    add_submenu_page('nativapps_listar_cursos', //parent slug
        'Modificar Curso', //page title
        null, //menu title
        'manage_options', //capability
        'nativapps_actualizar_curso', //menu slug
        'nativapps_actualizar_curso'
    );

    /** DOCENTES **/

    // Lista de docentes
    add_submenu_page('show_nativapps_index', //parent slug
        'Lista de docentes', //page title
        'Lista de docentes', //menu title
        'manage_options', //capability
        'nativapps_listar_docentes', //menu slug
        'nativapps_listar_docentes'
    );

    // Crear Docente
    add_submenu_page('nativapps_listar_docentes', //parent slug
        'Crear Docente', //page title
        null, //menu title
        'manage_options', //capability
        'nativapps_crear_docente', //menu slug
        'nativapps_crear_docente'
    );

    // Actualizar Docente
    add_submenu_page('nativapps_listar_docentes', //parent slug
        'Modificar Docente', //page title
        null, //menu title
        'manage_options', //capability
        'nativapps_actualizar_docente', //menu slug
        'nativapps_actualizar_docente'
    );


    /** ESTUDIANTES **/

    // Lista de estudiantes
    add_submenu_page('show_nativapps_index', //parent slug
        'Lista de estudiantes', //page title
        'Lista de estudiantes', //menu title
        'manage_options', //capability
        'nativapps_listar_estudiantes', //menu slug
        'nativapps_listar_estudiantes'
    );

    // Crear estudiante
    add_submenu_page('nativapps_listar_estudiantes', //parent slug
        'Crear estudiante', //page title
        null, //menu title
        'manage_options', //capability
        'nativapps_crear_estudiante', //menu slug
        'nativapps_crear_estudiante'
    );

    // Actualizar estudiante
    add_submenu_page('nativapps_listar_estudiantes', //parent slug
        'Modificar estudiante', //page title
        null, //menu title
        'manage_options', //capability
        'nativapps_actualizar_estudiante', //menu slug
        'nativapps_actualizar_estudiante'
    );



}

define('ROOTDIR', plugin_dir_path(__FILE__));


require_once(ROOTDIR . 'index.php');


require_once(ROOTDIR . 'cursos/listar.php');
require_once(ROOTDIR . 'cursos/crear.php');
require_once(ROOTDIR . 'cursos/actualizar.php');


require_once(ROOTDIR . 'docentes/listar.php');
require_once(ROOTDIR . 'docentes/crear.php');
require_once(ROOTDIR . 'docentes/actualizar.php');


require_once(ROOTDIR . 'estudiantes/listar.php');
require_once(ROOTDIR . 'estudiantes/crear.php');
require_once(ROOTDIR . 'estudiantes/actualizar.php');



