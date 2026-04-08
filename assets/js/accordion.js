/**
 * Instagram投稿カード アコーディオン開閉
 */
(function () {
  document.addEventListener('click', function (e) {
    var btn = e.target.closest('.ig-grid__expand');
    if (!btn) return;

    var card = btn.closest('.ig-grid__card');
    if (!card) return;

    var preview = card.querySelector('.ig-grid__preview');
    var isExpanded = card.classList.contains('is-expanded');

    if (isExpanded) {
      // 閉じる: 現在の高さから固定値へ
      var currentHeight = preview.scrollHeight;
      preview.style.height = currentHeight + 'px';
      preview.offsetHeight; // force reflow
      preview.style.height = '';
      card.classList.remove('is-expanded');
    } else {
      // 開く: 固定値から auto へ
      var fullHeight = preview.scrollHeight;
      card.classList.add('is-expanded');
      preview.style.height = fullHeight + 'px';
      preview.addEventListener('transitionend', function handler() {
        if (card.classList.contains('is-expanded')) {
          preview.style.height = 'auto';
        }
        preview.removeEventListener('transitionend', handler);
      });
    }
  });

  // Instagram embed.js のレンダリング完了後にiframeの幅を修正
  window.addEventListener('load', function () {
    if (typeof instgrm !== 'undefined' && instgrm.Embeds) {
      instgrm.Embeds.process();
    }

    // iframe幅を強制リサイズ
    setTimeout(function () {
      var frames = document.querySelectorAll('.ig-grid__embed-wrap iframe');
      for (var i = 0; i < frames.length; i++) {
        frames[i].style.width = '100%';
        frames[i].style.maxWidth = '100%';
        frames[i].style.minWidth = '0';
      }
    }, 2000);
  });
})();
