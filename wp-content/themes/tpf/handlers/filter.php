<?php
require_once __DIR__ . '/../../../../wp-load.php';

header( 'Content-Type: application/json' );

$input = file_get_contents('php://input');

$data = json_decode($input, true);

$countries = $data['countries'] ?? [];
$genres = $data['genres'] ?? [];
$priceFrom = isset($data['priceFrom']) ? floatval($data['priceFrom']) : null;
$priceTo = isset($data['priceTo']) ? floatval($data['priceTo']) : null;
$orderby = $data['orderby'] ?? 'price';
$order = $data['order'] ?? 'asc';

$tax_query = ['relation' => 'AND'];

if (!empty($countries)) {
    $tax_query[] = [
        'taxonomy' => 'country',
        'field' => 'slug',
        'terms' => $countries,
        'operator' => 'IN',
    ];
}

if (!empty($genres)) {
    $tax_query[] = [
        'taxonomy' => 'genre',
        'field' => 'slug',
        'terms' => $genres,
        'operator' => 'IN',
    ];
}

$meta_query = [];

if ($priceFrom !== null) {
    $meta_query[] = [
        'key'     => 'price',
        'value'   => $priceFrom,
        'type'    => 'NUMERIC',
        'compare' => '>=',
    ];
}

if ($priceTo !== null) {
    $meta_query[] = [
        'key'     => 'price',
        'value'   => $priceTo,
        'type'    => 'NUMERIC',
        'compare' => '<=',
    ];
}

if (count($meta_query) > 1) {
    $meta_query['relation'] = 'AND';
}

$args = [
  'post_type' => 'films',
  'tax_query' => $tax_query,
  'meta_key' => $orderby == 'price' ? 'price' : 'date',
  'orderby' => 'meta_value',
  'order' => $order,
];

if (!empty($meta_query)) {
    $args['meta_query'] = $meta_query;
}

$films = get_posts($args);

$films_data = [];

foreach ($films as $film) {
    $id = $film->ID;

  $countries_terms = get_the_terms($id, 'country');
  $countries_list = [];
  foreach ($countries_terms as $term) {
    $countries_list[] = $term->name;
  }

  $genres_terms = get_the_terms($id, 'genre');
  $genres_list = [];
  foreach ($genres_terms as $term) {
    $genres_list[] = $term->name;
  }

  $films_data[] = [
      'id' => $id,
      'title' => get_the_title($id),
      'excerpt' => get_the_excerpt($id),
      'thumbnail' => get_the_post_thumbnail_url($id),
      'price' => get_field('price', $id),
      'date' => get_field('date', $id),
      'countries' => $countries_list,
      'genres' => $genres_list,
  ];
}

echo json_encode($films_data);
exit;
