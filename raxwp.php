<?php
/*
Plugin Name: RAX WP
Plugin URI: http://rackspace.com
Description: Sets a cookie to identify an admin user for Rackspace WP scaling
Version: 0.1
Author: Slade Cozart
Author URI: http://github.com/slizadel
License: BSD
*/


// Determine if the user is logged in.
function rax_wp_user_check() {
  if ( is_user_logged_in() && current_user_can( 'manage_options' ) ) {
    // User is logged in and they are an admin.
    setcookie('raxwp', rand());
  }

  else if ( isset( $_COOKIE['raxwp'] ) ) {
    // Destroy the cookie.
    setcookie( 'raxwp', "", time() - 3600 ); // $_COOKIE['raxwp'] );
  }
}

add_action( 'init', 'rax_wp_user_check' );

?>
