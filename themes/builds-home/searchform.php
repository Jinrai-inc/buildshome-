<form role="search" method="get" class="search-form" action="<?php echo esc_url(home_url('/')); ?>">
  <label class="search-form__label" for="search-input">
    <span class="screen-reader-text">検索:</span>
    <input type="search" id="search-input" class="search-form__input" placeholder="キーワードを入力..." value="<?php echo get_search_query(); ?>" name="s">
  </label>
  <button type="submit" class="search-form__submit" aria-label="検索">
    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="8"/><path d="M21 21l-4.35-4.35"/></svg>
  </button>
</form>
