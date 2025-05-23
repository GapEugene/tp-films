<?php

add_action( 'wp_enqueue_scripts', 'enqueue_assets' );

function enqueue_assets() {
  wp_enqueue_script('script', get_template_directory_uri() . '/script.js');
}
