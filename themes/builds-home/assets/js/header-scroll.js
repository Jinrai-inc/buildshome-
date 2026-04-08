/**
 * ヘッダースクロール制御
 */
(function () {
  var header = document.getElementById('site-header');
  if (!header) return;

  var scrollThreshold = 60;

  function onScroll() {
    if (window.scrollY > scrollThreshold) {
      header.classList.add('is-scrolled');
    } else {
      header.classList.remove('is-scrolled');
    }
  }

  window.addEventListener('scroll', onScroll, { passive: true });
  onScroll();
})();
