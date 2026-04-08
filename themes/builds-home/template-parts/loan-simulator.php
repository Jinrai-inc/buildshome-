<?php
/**
 * ローンシミュレーター HTML
 */

$default_price = '';
if (is_singular('property')) {
    $price_num = get_field('property_price_number', get_the_ID());
    if ($price_num) {
        $default_price = $price_num;
    }
}
?>

<div class="loan-simulator" id="loan-simulator">
  <div class="loan-simulator__grid">
    <div class="loan-simulator__inputs">
      <div class="loan-simulator__field">
        <label for="loan-price">物件価格（万円）</label>
        <input type="number" id="loan-price" value="<?php echo esc_attr($default_price ?: '3000'); ?>" min="0" step="10">
      </div>
      <div class="loan-simulator__field">
        <label for="loan-down">頭金（万円）</label>
        <input type="number" id="loan-down" value="0" min="0" step="10">
      </div>
      <div class="loan-simulator__field">
        <label for="loan-rate">金利（年%）</label>
        <input type="number" id="loan-rate" value="1.5" min="0" max="20" step="0.1">
      </div>
      <div class="loan-simulator__field">
        <label for="loan-years">返済期間（年）</label>
        <input type="number" id="loan-years" value="35" min="1" max="50" step="1">
      </div>
      <button type="button" class="btn btn--primary loan-simulator__calc" id="loan-calc-btn">計算する</button>
    </div>

    <div class="loan-simulator__result" id="loan-result">
      <div class="loan-simulator__result-card">
        <div class="loan-simulator__result-item">
          <span class="loan-simulator__result-label">毎月の返済額</span>
          <span class="loan-simulator__result-value" id="loan-monthly">--</span>
        </div>
        <div class="loan-simulator__result-item">
          <span class="loan-simulator__result-label">総返済額</span>
          <span class="loan-simulator__result-value loan-simulator__result-value--sub" id="loan-total">--</span>
        </div>
        <div class="loan-simulator__result-item">
          <span class="loan-simulator__result-label">利息合計</span>
          <span class="loan-simulator__result-value loan-simulator__result-value--sub" id="loan-interest">--</span>
        </div>
      </div>
      <p class="loan-simulator__note">※ 概算です。実際の返済額は金融機関により異なります。</p>
    </div>
  </div>
</div>
