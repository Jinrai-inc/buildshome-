/**
 * スムーススクロール
 */
(function () {
  document.addEventListener('click', function (e) {
    var link = e.target.closest('a[href^="#"]');
    if (!link) return;

    var targetId = link.getAttribute('href');
    if (targetId === '#') return;

    var target = document.querySelector(targetId);
    if (!target) return;

    e.preventDefault();
    var headerHeight = document.getElementById('site-header')
      ? document.getElementById('site-header').offsetHeight
      : 0;
    var top = target.getBoundingClientRect().top + window.scrollY - headerHeight;
    window.scrollTo({ top: top, behavior: 'smooth' });
  });
})();
