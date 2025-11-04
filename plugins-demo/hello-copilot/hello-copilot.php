<?php
/**
 * Plugin Name: Hello Copilot
 * Plugin URI: https://github.com/pablodiloreto/mug-demo1
 * Description: Plugin demo creado para la charla de AgentCon Córdoba. Incluye menú de administración y shortcode [hola_copilot].
 * Version: 1.0.0
 * Author: Pablo Di Loreto
 * Author URI: https://github.com/pablodiloreto
 * Text Domain: hello-copilot
 * Domain Path: /languages
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Add admin menu
 */
function hello_copilot_admin_menu() {
    add_menu_page(
        'Hello Copilot',           // Page title
        'Hello Copilot',           // Menu title
        'manage_options',          // Capability
        'hello-copilot',           // Menu slug
        'hello_copilot_admin_page', // Callback function
        'dashicons-smiley',        // Icon
        30                         // Position
    );
}
add_action('admin_menu', 'hello_copilot_admin_menu');

/**
 * Admin page content
 */
function hello_copilot_admin_page() {
    ?>
    <div class="wrap">
        <h1>Hello Copilot</h1>
        <div class="card">
            <h2>¡Bienvenido al Plugin Hello Copilot! 🎉</h2>
            <p><strong>Gracias a AgentCon Córdoba por la invitación a la charla.</strong></p>
            <hr>
            <h3>Cómo usar el shortcode:</h3>
            <p>Para mostrar el mensaje del plugin en cualquier página o entrada, usa el siguiente shortcode:</p>
            <code style="background: #f0f0f0; padding: 10px; display: block; margin: 10px 0;">[hola_copilot]</code>
            <p>También puedes agregar un mensaje personalizado:</p>
            <code style="background: #f0f0f0; padding: 10px; display: block; margin: 10px 0;">[hola_copilot mensaje="Tu mensaje aquí"]</code>
        </div>
        <div class="card" style="margin-top: 20px;">
            <h3>Acerca de este plugin</h3>
            <p>Este plugin fue creado como demostración para AgentCon Córdoba.</p>
            <p><strong>Características:</strong></p>
            <ul style="list-style: disc; margin-left: 20px;">
                <li>Menú de administración personalizado</li>
                <li>Shortcode [hola_copilot] funcional</li>
                <li>Mensajes personalizables</li>
            </ul>
        </div>
    </div>
    <?php
}

/**
 * Register shortcode [hola_copilot]
 */
function hello_copilot_shortcode($atts) {
    // Parse attributes
    $atts = shortcode_atts(
        array(
            'mensaje' => '¡Hola desde GitHub Copilot! 👋',
        ),
        $atts,
        'hola_copilot'
    );
    
    // Return formatted output
    $output = '<div class="hello-copilot-shortcode" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; padding: 20px; border-radius: 10px; text-align: center; margin: 20px 0; box-shadow: 0 4px 6px rgba(0,0,0,0.1);">';
    $output .= '<h3 style="margin-top: 0; color: white;">Hello Copilot</h3>';
    $output .= '<p style="font-size: 18px; margin: 10px 0;">' . esc_html($atts['mensaje']) . '</p>';
    $output .= '<p style="font-size: 14px; opacity: 0.9; margin-bottom: 0;">Gracias AgentCon Córdoba 🎉</p>';
    $output .= '</div>';
    
    return $output;
}
add_shortcode('hola_copilot', 'hello_copilot_shortcode');

/**
 * Add custom CSS for admin page
 */
function hello_copilot_admin_styles() {
    $screen = get_current_screen();
    if ($screen->id === 'toplevel_page_hello-copilot') {
        ?>
        <style>
            .hello-copilot-admin .card {
                max-width: 100%;
                padding: 20px;
            }
            .hello-copilot-admin h2 {
                color: #667eea;
            }
        </style>
        <?php
    }
}
add_action('admin_head', 'hello_copilot_admin_styles');
