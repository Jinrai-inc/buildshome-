/**
 * SP ハンバーガーメニュー
 */
(function () {
  var hamburger = document.getElementById('hamburger');
  var mobileMenu = document.getElementById('mobile-menu');
  if (!hamburger || !mobileMenu) return;

  hamburger.addEventListener('click', function () {
    var isActive = hamburger.classList.toggle('is-active');
    mobileMenu.classList.toggle('is-active');
    hamburger.setAttribute('aria-expanded', isActive);
    mobileMenu.setAttribute('aria-hidden', !isActive);
    document.body.style.overflow = isActive ? 'hidden' : '';
  });

  // Close on link click
  var links = mobileMenu.querySelectorAll('a');
  for (var i = 0; i < links.length; i++) {
    links[i].addEventListener('click', function () {
      hamburger.classList.remove('is-active');
      mobileMenu.classList.remove('is-active');
      hamburger.setAttribute('aria-expanded', 'false');
      mobileMenu.setAttribute('aria-hidden', 'true');
      document.body.style.overflow = '';
    });
  }
})();
