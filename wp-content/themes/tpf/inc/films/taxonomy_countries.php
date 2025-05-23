<?php
register_taxonomy( 'country', [ 'films' ], [
  'labels' => [
    'name' => 'Countries',
    'singular_name' => 'Country',
    'search_items' => 'Search countries',
    'all_items' => 'All countries',
    'parent_item' => 'Parent country',
    'parent_item_colon' => 'Parent country:',
    'edit_item' => 'Edit country',
    'update_item' => 'Update country',
    'add_new_item' => 'Add New country',
    'new_item_name' => 'New country Name',
    'menu_name' => 'Countries',
  ],
  'show_ui' => true,
  'show_admin_column' => true,
  'query_var' => true,
  'rewrite' => [ 'slug' => 'country' ],
] );
