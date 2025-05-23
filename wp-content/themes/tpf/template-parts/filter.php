<?php
$countries = get_terms( [ 'taxonomy' => 'country' ] );
$genres = get_terms( [ 'taxonomy' => 'genre' ] );
?>

<div class="border-bottom p-3 mb-3 bg-light">
  <div class="row">

    <div class="col-12 mb-3">
      <p class="h6">Filter</p>
    </div>

    <div class="col-4 d-flex flex-wrap">
      <p class="w-100">Price</p>
      <input class="form-control w-50 filter-price-from" type="number" placeholder="from">
      <input class="form-control w-50 filter-price-to" type="number" placeholder="to">
    </div>

    <div class="col-4 d-flex flex-column">
      <p>Country</p>
      <div class="d-flex flex-wrap my-auto">
        <?php foreach ($countries as $country) : ?>
          <div class="form-check me-3">
            <input
              class="form-check-input filter-country"
              type="checkbox"
              value="<?php echo $country->slug; ?>"
              id="<?php echo $country->slug . $country->term_id; ?>"
            >
            <label class="form-check-label" for="<?php echo $country->slug . $country->term_id; ?>">
              <?php echo $country->name; ?>
            </label>
          </div>
        <?php endforeach; ?>
      </div>
    </div>

    <div class="col-4 d-flex flex-column">
      <p>Genre</p>
      <div class="d-flex flex-wrap my-auto">
        <?php foreach ($genres as $genre) : ?>
          <div class="form-check me-3">
            <input class="form-check-input filter-genre" type="checkbox" value="<?php echo $genre->slug; ?>" id="<?php echo $genre->slug . $genre->term_id; ?>">
            <label class="form-check-label" for="<?php echo $genre->slug . $genre->term_id; ?>">
              <?php echo $genre->name; ?>
            </label>
          </div>
        <?php endforeach; ?>
      </div>
    </div>

  </div>
</div>
