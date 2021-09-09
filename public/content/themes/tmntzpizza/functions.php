<?php
require __DIR__ . '/includes/theme-config.php';
require __DIR__ . '/includes/load-assets.php';


// Redirect logged users to home page :
add_filter("login_redirect", "gkp_subscriber_login_redirect", 10, 3);
function gkp_subscriber_login_redirect($redirect_to, $request, $user) {
  if(is_array($user->roles))
      if(in_array('administrator', $user->roles)) return site_url('/wp-admin/');
  return home_url();
}
// modify excerpt length :
function tmntzpizza_get_the_excerpt($excerpt){
    // modification du nombre de caractère montrés dans le résumé :
    return substr($excerpt, 0, 40) . ' ... ';
};
add_filter('get_the_excerpt', 'tmntzpizza_get_the_excerpt');

