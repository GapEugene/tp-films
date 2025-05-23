<?php
add_action( 'init', 'register_post_type_films' );

function register_post_type_films() {
  register_post_type( 'films', [
    'labels' => [
      'name' => 'Films',
      'singular_name' => 'Film',
      'add_new' => 'Add new',
			'add_new_item' => 'Add new film',
			'edit_item' => 'Edit film',
			'new_item' => 'New film',
			'view_item' => 'View film',
			'search_items' => 'Search films',
			'not_found' => 'Not found',
			'not_found_in_trash' => 'Not found in trash',
			'menu_name' => 'Films',
    ],
    'public' => true,
    'supports' => [ 'title', 'excerpt', 'thumbnail' ],
    'menu_icon' => 'dashicons-video-alt2',
  ] );
}

