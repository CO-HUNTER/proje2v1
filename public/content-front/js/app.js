const App = (function () {
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
    textField.innerText = `${totalPrice.toFixed(2)}`;
    return totalPrice;
  };

  /**
   * 
   * Ajax http request
   * 
   * @param {Object} param0 
   * @param {Object} param1 
   * @returns {string}
   */
  const prAjax = ({ method, url, data }, { csrf }) => {
    return new Promise((resolve, reject) => {
      const xhr = new XMLHttpRequest();

      xhr.open(method, url)
      xhr.setRequestHeader("Content-type", "application/json");
      xhr.setRequestHeader("X-CSRF-TOKEN", csrf)

      xhr.onload = () => {
        if (xhr.readyState === 4 && xhr.status === 200) {
          resolve(xhr.responseText);
        }
      }

      xhr.onerror = (err) => reject(err);
      method === 'POST' ? xhr.send(JSON.stringify(data)) : xhr.send();
    });
  }

  getTotal(".table tbody");

  //--- Event listeners
  let requestField = document.querySelector(".table tbody");
  let receivedMoney = document.querySelector(".received-money");
  let gapField = document.querySelector(".gap");
  let barcode = document.querySelector(".product-barcode");
  let csrf = document.querySelector(".form input[name='_token']").value;
  let finishedBtn = document.querySelector(".finished-buy");
  let html = "";

  function rcMoney() {
    let total = getTotal(".table tbody");
    let gap;
    if (parseFloat(receivedMoney.value) > total.toFixed(2)) {
      gap = (receivedMoney.value - total.toFixed(2)).toFixed(2);
      gapField.innerText = `${gap}₺`;
    } else {
      gapField.innerText = "";
    }
  }

  function increaseFunction({ target }) {
    let quantity = parseFloat(target.closest("tr").querySelector(".table_quantity").innerText);
    quantity++;
    target.closest("tr").querySelector(".table_quantity").innerText = quantity;
    getTotal(".table tbody");
    rcMoney();
  }

  function decreaseFunction({ target }) {
    let quantity = parseFloat(target.closest("tr").querySelector(".table_quantity").innerText);
    quantity > 0 ? quantity-- : null;
    target.closest("tr").querySelector(".table_quantity").innerText = quantity;
    getTotal(".table tbody");
    rcMoney();
  }

  function deleteRow({ target }) {
    target.closest("tr").remove();
    getTotal(".table tbody");
    rcMoney();
  }

  receivedMoney.addEventListener("input", rcMoney);

  barcode.addEventListener("input", async ({ target }) => {
    if (target.value.length === 13) {
      let value = target.value;

      const response = await prAjax({
        method: "POST",
        url: "http://127.0.0.1:8000/barcode",
        data: { value }
      }, { csrf });
      if (response == "null") {
        tori.notification("Bu ürün kayıtlı değil", {
          type: "error",
          duration: 5000
        });
        target.value = "";
      } else {
        const { barcode, price, product_name, product_id } = await JSON.parse(response);

        target.value = "";

        html = `
        <tr>
          <td>${product_name}</td>
          <td><span class='barcode'>${barcode}</span></td>
          <td class="table_price">${price}</td>
          <td class="table_quantity">1</td>
          <td class="hidden">${product_id}</td>
          <td>
            <i onclick="App.increaseFunction(event)" class="uil uil-plus"></i>
            <i onclick="App.decreaseFunction(event)" class="uil uil-minus"></i>
            <i onclick="App.deleteRow(event)" class="uil uil-trash"></i>
          </td>
      </tr>`;

        let columnLength = requestField.children.length;
        let a;
        let control = true;
        document.querySelectorAll(".barcode").forEach(item => {
          a += item.innerHTML;
        })
        if (columnLength > 0) {
          document.querySelectorAll(".barcode").forEach(item => {
            if (barcode === item.innerHTML) {
              let a = parseFloat(item.closest("tr").querySelector(".table_quantity").innerHTML);
              a++;
              item.closest("tr").querySelector(".table_quantity").innerHTML = a;
              control = false;
            } else if (a.indexOf(barcode) == -1 && control) {
              requestField.innerHTML += html;
              control = false;
            }
          })
        } else {
          requestField.innerHTML += html;
        }

        getTotal(".table tbody");
        rcMoney();
      }
    } else if (target.value.length === 8) {
      let value = target.value;

      const response = await prAjax({
        method: "POST",
        url: "http://127.0.0.1:8000/barcode",
        data: { value }
      }, { csrf });
      if (response == "null") {


      } else {
        const { barcode, price, product_name, product_id } = await JSON.parse(response);

        target.value = "";

        html = `
        <tr>
          <td>${product_name}</td>
          <td><span class='barcode'>${barcode}</span></td>
          <td class="table_price">${price}</td>
          <td class="table_quantity">1</td>
          <td class="hidden">${product_id}</td>
          <td>
            <i onclick="App.increaseFunction(event)" class="uil uil-plus"></i>
            <i onclick="App.decreaseFunction(event)" class="uil uil-minus"></i>
            <i onclick="App.deleteRow(event)" class="uil uil-trash"></i>
          </td>
      </tr>`;

        let columnLength = requestField.children.length;
        let a;
        let control = true;
        document.querySelectorAll(".barcode").forEach(item => {
          a += item.innerHTML;
        })
        if (columnLength > 0) {
          document.querySelectorAll(".barcode").forEach(item => {
            if (barcode === item.innerHTML) {
              let a = parseFloat(item.closest("tr").querySelector(".table_quantity").innerHTML);
              a++;
              item.closest("tr").querySelector(".table_quantity").innerHTML = a;
              control = false;
            } else if (a.indexOf(barcode) == -1 && control) {
              requestField.innerHTML += html;
              control = false;
            }
          })
        } else {
          requestField.innerHTML += html;
        }

        getTotal(".table tbody");
        rcMoney();
      }
    }
  });

  let id = [];
  let quantity = [];
  let totalAmount;
  finishedBtn.addEventListener("click", async () => {
    [...requestField.children].forEach(item => {
      id.push(item.querySelector(".hidden").innerText);
      quantity.push(item.querySelector(".table_quantity").innerText);
      totalAmount = document.querySelector(".total_price").innerText;
    });


    const response = await prAjax({
      method: "POST",
      url: "http://127.0.0.1:8000/finishHim",
      data: { id, quantity, totalAmount }
    }, { csrf });

    if (response == "başarılı") {
      requestField.innerHTML = "";
      receivedMoney.value = "";
      gapField.innerHTML = "";
      getTotal(".table tbody")
      id = [];
      quantity = [];
      totalAmount
    }
  });

  return {
    increaseFunction,
    decreaseFunction,
    deleteRow
  }
})();
