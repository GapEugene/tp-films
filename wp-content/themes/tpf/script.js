document.addEventListener('DOMContentLoaded', () => {
  // 1. FILTER
  const filmsListing = document.querySelector('.films-listing');

  const filterState = {
    countries: [],
    genres: [],
    priceFrom: null,
    priceTo: null,
    orderBy: 'price',
    order: 'asc',
  };

  const countryCheckboxes = document.querySelectorAll('.filter-country');
  const genreCheckboxes = document.querySelectorAll('.filter-genre');
  const priceFrom = document.querySelector('.filter-price-from');
  const priceTo = document.querySelector('.filter-price-to');

  const checkboxFilterHandler = (checkboxes, arrayName) => {
    checkboxes.forEach((checkbox) => {
      checkbox.addEventListener('change', () => {
        const array = filterState[arrayName];
        const isChecked = checkbox.checked;
        const value = checkbox.value;

        if (isChecked) {
          if (!array.includes(value)) {
            array.push(value);
          }
        } else {
          const index = array.indexOf(value);

          if (index > -1) {
            array.splice(index, 1);
          }
        }

        getFiltered(filterState);
      });
    });
  };

  const priceInputHandler = () => {
    const from = parseFloat(priceFrom.value);
    const to = parseFloat(priceTo.value);

    filterState.priceFrom = !isNaN(from) ? from : null;
    filterState.priceTo = !isNaN(to) ? to : null;

    getFiltered(filterState);
  }

  priceFrom.addEventListener('input', priceInputHandler);
  priceTo.addEventListener('input', priceInputHandler);

  const getFiltered = (filterState) => {
    fetch('./../wp-content/themes/tpf/handlers/filter.php', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
      },
      body: JSON.stringify(filterState),
    })
    .then((response) => response.json())
    .then((data) => {
      console.log(data);
      if (data.length > 0) {
        renderFilms(data);
      } else {
        filmsListing.innerHTML = '<p class="h4">Films not found</p>';
      }
    })
    .catch((error) => {
      console.error(error);
    });
  };

  const renderFilms = (films) => {
    const html = films.map((film) => {
      const countries = film.countries.map((country) => (
        `<span class="badge text-bg-secondary">${country}</span>`
      )).join(' ');

      const genres = film.genres.map((genre) => (
        `<span class="badge text-bg-secondary">${genre}</span>`
      )).join(' ');

      return `
        <div class="col-4 d-flex flex-column">

          <div class="mb-3">
            <p class="h4 mb-0">
              <span>${film.title}</span>
              <span class="text-secondary">(${film.date})</span>
            </p>
          </div>

          <div class="mb-1">
            <span>Country:</span>
            ${countries}
          </div>

          <div class="mb-3">
          <span>Genre:</span>
            ${genres}
          </div>

          <div class="mb-3">
            <p class="mb-0">${film.excerpt}</p>
          </div>

          <div class="mb-3 mt-auto">
            <img class="w-100" src="${film.thumbnail}" alt="">
          </div>

          <div>
            <button class="btn btn-dark btn-lg w-100">Add to cart - <strong>$${film.price}</strong></button>
          </div>

        </div>
      `;
    }).join('');

    filmsListing.innerHTML = html;
  }


  checkboxFilterHandler(countryCheckboxes, 'countries');
  checkboxFilterHandler(genreCheckboxes, 'genres');

  // 2. SORT
  const sortPriceAsc = document.querySelector('.sort-price-asc');
  const sortPriceDesc = document.querySelector('.sort-price-desc');
  const sortDateAsc = document.querySelector('.sort-date-asc');
  const sortDateDesc = document.querySelector('.sort-date-desc');

  sortPriceAsc.addEventListener('click', (event) => {
    event.preventDefault();
    filterState.orderby = 'price';
    filterState.order = 'asc';
    getFiltered(filterState);
  });

  sortPriceDesc.addEventListener('click', (event) => {
    event.preventDefault();
    filterState.orderby = 'price';
    filterState.order = 'desc';
    getFiltered(filterState);
  });

  sortDateAsc.addEventListener('click', (event) => {
    event.preventDefault();
    filterState.orderby = 'date';
    filterState.order = 'asc';
    getFiltered(filterState);
  });

  sortDateDesc.addEventListener('click', (event) => {
    event.preventDefault();
    filterState.orderby = 'date';
    filterState.order = 'desc';
    getFiltered(filterState);
  });


  // 3. ADD TO CART
  const cartCounter = document.querySelector('.cart-counter');
  const addToCartTriggers = document.querySelectorAll('.add-to-cart');

  addToCartTriggers.forEach((addToCartTrigger) => {
    addToCartTrigger.addEventListener('click', (event) => {
      event.preventDefault();

      const productId = addToCartTrigger.getAttribute('data-product-id');

      addToCart(productId);
    });
  });

  const addToCart = (productId) => {
    fetch('./../wp-content/themes/tpf/handlers/add_to_cart.php', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
      },
      body: JSON.stringify({ productId: productId }),
    })
    .then((response) => response.json())
    .then((data) => {
      updateCartCounter(data);
    })
    .catch((error) => console.error(error));
  };

  const updateCartCounter = (count) => {
    cartCounter.innerText = count;
  }
});
