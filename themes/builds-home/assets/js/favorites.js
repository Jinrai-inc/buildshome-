/**
 * お気に入り機能（localStorage）
 */
(function () {
  var STORAGE_KEY = 'bh_favorites';

  function getFavorites() {
    try {
      return JSON.parse(localStorage.getItem(STORAGE_KEY)) || [];
    } catch (e) {
      return [];
    }
  }

  function saveFavorites(favs) {
    localStorage.setItem(STORAGE_KEY, JSON.stringify(favs));
  }

  function toggleFavorite(id) {
    var favs = getFavorites();
    var index = favs.indexOf(id);
    if (index === -1) {
      favs.push(id);
    } else {
      favs.splice(index, 1);
    }
    saveFavorites(favs);
    return index === -1; // true if added
  }

  function isFavorite(id) {
    return getFavorites().indexOf(id) !== -1;
  }

  function updateUI() {
    var buttons = document.querySelectorAll('.property-card__fav');
    for (var i = 0; i < buttons.length; i++) {
      var btn = buttons[i];
      var id = btn.getAttribute('data-property-id');
      if (id && isFavorite(id)) {
        btn.classList.add('is-fav');
      } else {
        btn.classList.remove('is-fav');
      }
    }
  }

  // Bind click events
  document.addEventListener('click', function (e) {
    var btn = e.target.closest('.property-card__fav');
    if (!btn) return;
    e.preventDefault();
    e.stopPropagation();

    var id = btn.getAttribute('data-property-id');
    if (!id) return;

    var added = toggleFavorite(id);
    if (added) {
      btn.classList.add('is-fav');
    } else {
      btn.classList.remove('is-fav');
    }
  });

  // Favorites only filter
  var filterBtn = document.getElementById('filter-favorites-only');
  if (filterBtn) {
    var isFiltering = false;

    filterBtn.addEventListener('click', function () {
      isFiltering = !isFiltering;
      var favs = getFavorites();
      var cards = document.querySelectorAll('.property-card');

      for (var i = 0; i < cards.length; i++) {
        var card = cards[i];
        var cardId = card.getAttribute('data-property-id');
        if (isFiltering) {
          card.style.display = favs.indexOf(cardId) !== -1 ? '' : 'none';
        } else {
          card.style.display = '';
        }
      }

      filterBtn.classList.toggle('is-active', isFiltering);
    });
  }

  // Init
  updateUI();
})();
