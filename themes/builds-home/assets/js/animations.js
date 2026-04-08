/**
 * IntersectionObserver によるスクロールアニメーション
 */
(function () {
  if (!('IntersectionObserver' in window)) {
    // Fallback: show all elements
    var els = document.querySelectorAll('.js-fade-up');
    for (var i = 0; i < els.length; i++) {
      els[i].classList.add('is-visible');
    }
    return;
  }

  var observer = new IntersectionObserver(
    function (entries) {
      entries.forEach(function (entry) {
        if (entry.isIntersecting) {
          var el = entry.target;
          var delay = el.getAttribute('data-delay');
          if (delay) {
            el.style.transitionDelay = delay + 's';
          }
          el.classList.add('is-visible');
          observer.unobserve(el);
        }
      });
    },
    {
      threshold: 0.1,
      rootMargin: '0px 0px -40px 0px',
    }
  );

  var targets = document.querySelectorAll('.js-fade-up');
  for (var i = 0; i < targets.length; i++) {
    observer.observe(targets[i]);
  }
})();
