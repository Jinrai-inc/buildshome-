/**
 * ローンシミュレーション計算（元利均等返済）
 */
(function () {
  function formatNumber(num) {
    return num.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',');
  }

  function calculate() {
    var priceEl = document.getElementById('loan-price');
    var downEl = document.getElementById('loan-down');
    var rateEl = document.getElementById('loan-rate');
    var yearsEl = document.getElementById('loan-years');
    var monthlyEl = document.getElementById('loan-monthly');
    var totalEl = document.getElementById('loan-total');
    var interestEl = document.getElementById('loan-interest');

    if (!priceEl || !monthlyEl) return;

    var price = parseFloat(priceEl.value) || 0;
    var down = parseFloat(downEl.value) || 0;
    var rate = parseFloat(rateEl.value) || 0;
    var years = parseInt(yearsEl.value) || 0;

    var principal = (price - down) * 10000; // 万円→円
    if (principal <= 0 || years <= 0) {
      monthlyEl.textContent = '--';
      totalEl.textContent = '--';
      interestEl.textContent = '--';
      return;
    }

    var months = years * 12;

    if (rate === 0) {
      // 金利0%の場合
      var monthly = principal / months;
      monthlyEl.textContent = formatNumber(Math.round(monthly)) + '円';
      totalEl.textContent = formatNumber(Math.round(principal)) + '円';
      interestEl.textContent = '0円';
      return;
    }

    var monthlyRate = rate / 100 / 12;
    var pow = Math.pow(1 + monthlyRate, months);
    var monthly = principal * monthlyRate * pow / (pow - 1);
    var total = monthly * months;
    var interest = total - principal;

    monthlyEl.textContent = formatNumber(Math.round(monthly)) + '円';
    totalEl.textContent = formatNumber(Math.round(total)) + '円';
    interestEl.textContent = formatNumber(Math.round(interest)) + '円';
  }

  // Calc button
  var calcBtn = document.getElementById('loan-calc-btn');
  if (calcBtn) {
    calcBtn.addEventListener('click', calculate);
  }

  // Auto-calculate on page load if values exist
  if (document.getElementById('loan-price')) {
    calculate();
  }

  // Loan toggle on property detail
  var toggleBtn = document.getElementById('loan-toggle');
  var toggleBody = document.getElementById('loan-toggle-body');
  if (toggleBtn && toggleBody) {
    toggleBtn.addEventListener('click', function () {
      var isHidden = toggleBody.style.display === 'none';
      toggleBody.style.display = isHidden ? 'block' : 'none';
      toggleBtn.textContent = isHidden ? 'ローンシミュレーションを閉じる' : 'ローンシミュレーションを開く';
      if (isHidden) {
        calculate();
      }
    });
  }
})();
