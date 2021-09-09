<?php
function tmntzpizza_initializeTheme(){
    add_theme_support('title-tag');
    // add_post_type_support( 'tmntzpizza', 'thumbnail' );
    add_theme_support( 'post-thumbnails' );
}
add_action(
    'after_setup_theme',
    'tmntzpizza_initializeTheme'
);

function tmntzpizza_setup(){
    add_theme_support('title-tag'); // active le title auto par wp
    add_theme_support('menus'); // créer un menu/nav ?
    
    // pour spécifier un emplacement dans WP :
    register_nav_menus([
        "home-menu" => "home menu"
    ]);
}
/** si on compare avec JS :
 * add_action est un eventListener, en paramètre elle prend l'event, et le handler
 */

// inscrit la function 'trinity_theme_setup'
// pour l'évènement 'after_setup_theme'

// ajoute à l'action 'after_setup_theme'
// la function 'trinity_theme_setup'
add_action( 'after_setup_theme', 'tmntzpizza_setup' );