<?php
register_taxonomy( 'genre', [ 'films' ], [
  'labels' => [
    'name' => 'Genres',
    'singular_name' => 'Genre',
    'search_items' => 'Search genres',
    'all_items' => 'All genres',
    'parent_item' => 'Parent genre',
    'parent_item_colon' => 'Parent genre:',
    'edit_item' => 'Edit genre',
    'update_item' => 'Update genre',
    'add_new_item' => 'Add New genre',
    'new_item_name' => 'New genre Name',
    'menu_name' => 'Genres',
  ],
  'hierarchical' => false,
  'show_ui' => true,
  'show_admin_column' => true,
  'query_var' => true,
  'rewrite' => [ 'slug' => 'genre' ],
] );
