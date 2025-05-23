<?php
// Template Name: Films
get_header();

$films = get_posts([
  'post_type' => 'films'
]);

$cart = WC()->cart;
?>

<div class="container">

  <p>Films in cart: <span class="cart-counter"><?php echo WC()->cart->get_cart_contents_count(); ?></span></p>

  <?php get_template_part( '/template-parts/filter' ); ?>
  <?php get_template_part( '/template-parts/sort' ); ?>

  <div class="row films-listing">

  <?php
  foreach( $films as $film ) :
  $id = $film->ID;
  $title = $film->post_title;
  $excerpt = get_the_excerpt( $id );
  $thumbnail = get_the_post_thumbnail_url( $id) ;
  $price = get_field( 'price', $id );
  $date = get_field( 'date', $id );
  $countries = get_the_terms( $id, 'country' );
  $genres = get_the_terms( $id, 'genre' );
  $ref = get_field( 'ref', $id );
  ?>

  <div class="col-4 d-flex flex-column">

    <div class="mb-3">
      <p class="h4 mb-0">
        <span><?php echo $title; ?></span>
        <span class="text-secondary">(<?php echo $date; ?>)</span>
      </p>
    </div>

    <div class="mb-1">
      <span>Country:</span>
      <?php foreach($countries as $country) : ?>
      <span class="badge text-bg-secondary"><?php echo $country->name; ?></span>
      <?php endforeach; ?>
    </div>

    <div class="mb-3">
      <span>Genre:</span>
      <?php foreach($genres as $genre) : ?>
      <span class="badge text-bg-secondary"><?php echo $genre->name; ?></span>
      <?php endforeach; ?>
    </div>

    <div class="mb-3">
      <p class="mb-0"><?php echo $excerpt; ?></p>
    </div>

    <div class="mb-3 mt-auto">
      <img class="w-100" src="<?php echo $thumbnail; ?>" alt="">
    </div>

    <div>
      <button class="btn btn-dark btn-lg w-100 add-to-cart" data-product-id="<?php echo $ref; ?>">Add to cart - <strong>$<?php echo $price; ?></strong></button>
    </div>

  </div>

  <?php endforeach; ?>
  
  </div>
</div>

<?php get_footer(); ?>
