<?php
/**
 * Plugin Name: tmntzpizza
 * Author: tmntzpizza
 * Description: tmntzpizza
 */
use tmntzpizza\Plugin;
require __DIR__ . '/vendor-tmntzpizza/autoload.php';

$tmntzpizza = new Plugin();
// DOC WP PLUGININ activation "hook" : https://developer.wordpress.org/reference/functions/register_activation_hook/
register_activation_hook(
   __FILE__,
   [$tmntzpizza, 'activate'],
);
register_deactivation_hook(
   __FILE__,
   [$tmntzpizza, 'deactivate'],
);