(function App() {
  /**
   * Toplam tutar belirleme
   *
   * @param {String} tableName
   * @returns {Number}
   */
  const getTotal = (tableName) => {
    let totalPrice = 0;
    let textField = document.querySelector(".total_price");
    document.querySelectorAll(`${tableName} tr`).forEach((item) => {
      let value1 = parseFloat(item.querySelector(".table_price").innerText);
      let value2 = parseFloat(item.querySelector(".table_quantity").innerText);
      totalPrice += [value1, value2].reduce((total, item) => total * item, 1);
    });
    textField.innerText = `${totalPrice.toFixed(2)}₺`;
    return totalPrice;
  };

  getTotal(".table tbody");


  //--- Event listeners
  let increaseBtns = document.querySelectorAll(".table tbody i.uil-plus");
  let decreaseBtns = document.querySelectorAll(".table tbody i.uil-minus");
  let receivedMoney = document.querySelector(".received-money");
  let gapField = document.querySelector(".gap");

  for (const btn of increaseBtns) {
    btn.addEventListener("click", ({ target }) => {
      let quantity = parseFloat(target.closest("tr").querySelector(".table_quantity").innerText);
      quantity++;
      target.closest("tr").querySelector(".table_quantity").innerText = quantity;
      getTotal(".table tbody");
    });
  }

  for (const btn of decreaseBtns) {
    btn.addEventListener("click", ({ target }) => {
      let quantity = parseFloat(target.closest("tr").querySelector(".table_quantity").innerText);
      quantity > 0 ? quantity-- : null;
      target.closest("tr").querySelector(".table_quantity").innerText = quantity;
      getTotal(".table tbody");
    });
  }

  receivedMoney.addEventListener("input", ({target}) => {
    let total = getTotal(".table tbody");
    let gap;
    if(parseFloat(target.value) > total.toFixed(2)) {
      gap = (target.value - total.toFixed(2)).toFixed(2);
      gapField.innerText = `${gap}₺`;
    } else {
      gapField.innerText = "";
    }
  });

})();
