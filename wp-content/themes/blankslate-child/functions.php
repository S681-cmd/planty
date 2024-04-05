<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

// BEGIN ENQUEUE PARENT ACTION
// AUTO GENERATED - Do not modify or remove comment markers above or below:

if ( !function_exists( 'chld_thm_cfg_locale_css' ) ):
    function chld_thm_cfg_locale_css( $uri ){
        if ( empty( $uri ) && is_rtl() && file_exists( get_template_directory() . '/rtl.css' ) )
            $uri = get_template_directory_uri() . '/rtl.css';
        return $uri;
    }
endif;
add_filter( 'locale_stylesheet_uri', 'chld_thm_cfg_locale_css' );

if ( !function_exists( 'chld_thm_cfg_parent_css' ) ):
    function chld_thm_cfg_parent_css() {
        wp_enqueue_style( 'chld_thm_cfg_parent', trailingslashit( get_template_directory_uri() ) . 'style.css', array(  ) );
    }
endif;
add_action( 'wp_enqueue_scripts', 'chld_thm_cfg_parent_css', 10 );

// Fonction pour ajouter le lien "Admin" dans le menu à la deuxième place
function custom_menu_link($items, $args) {
    // Vérifie si l'utilisateur est connecté
    if (is_user_logged_in()) {
        // Crée le lien vers la page d'administration
        $admin_link = '<li><a href="' . admin_url() . '">Admin</a></li>';

        // Divise les éléments du menu en un tableau
        $menu_items = explode('</li>', $items);

        // Insère le lien "Admin" à la deuxième position dans le tableau
        array_splice($menu_items, 1, 0, $admin_link);

        // Réassemble les éléments du menu en une chaîne
        $items = implode('</li>', $menu_items);
    }
    return $items;
}
add_filter('wp_nav_menu_items', 'custom_menu_link', 10, 2);

// END ENQUEUE PARENT ACTION
