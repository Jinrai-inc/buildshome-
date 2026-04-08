/**
 * 物件フィルター制御
 * Gallery thumbnail switching on property detail
 */
(function () {
  // Thumbnail gallery switching
  var thumbs = document.querySelectorAll('.property-detail__thumb');
  var mainImg = document.getElementById('gallery-main-img');

  if (thumbs.length && mainImg) {
    for (var i = 0; i < thumbs.length; i++) {
      thumbs[i].addEventListener('click', function () {
        var src = this.getAttribute('data-src');
        if (src) {
          mainImg.src = src;
        }
        // Update active state
        for (var j = 0; j < thumbs.length; j++) {
          thumbs[j].classList.remove('is-active');
        }
        this.classList.add('is-active');
      });
    }
  }
})();
