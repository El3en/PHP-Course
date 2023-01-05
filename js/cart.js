"use strict";
let products = [];

const addProduct = function () {
  const productName = document.getElementById("product-name").value;
  const price = document.getElementById("price").value;
  const quantity = document.getElementById("quantity").value;

  if (!validateInputs(productName, price, quantity)) {
    alert("Invalid Inputs");
    return;
  }
  const prodcut = {
    productName: productName,
    price: price,
    quantity: quantity,
    getTotal: function () {
      return this.price * this.quantity;
    },
  };
  products.push(prodcut);

  display();
};

const display = function () {
  displayProducts();
  displaySubTotal();
  displayShipping();
  displayTotal();
};

const displayProducts = function () {
  document.getElementById("products").innerHTML = "";
  products.forEach((p, i) => {
    document.getElementById("products").innerHTML += ` <tr>
    <td class="align-middle">
      <img src="img/${p.productName}.jpg" alt="" style="width: 50px" />
      ${p.productName}
    </td>
    <td class="align-middle">AED ${p.price}</td>
    <td class="align-middle">
      <div
        class="input-group quantity mx-auto"
        style="width: 100px"
      >
        <div class="input-group-btn">
          <button class="btn btn-sm btn-primary btn-minus" onclick="decQuantity(${i})">
            <i class="fa fa-minus"></i>
          </button>
        </div>
        <input
          type="text"
          class="form-control form-control-sm bg-secondary border-0 text-center"
          value="${p.quantity}"
        />
        <div class="input-group-btn">
          <button class="btn btn-sm btn-primary btn-plus" onclick="incQuantity(${i})">
            <i class="fa fa-plus"></i>
          </button>
        </div>
      </div>
    </td>
    <td class="align-middle">AED ${p.getTotal()}</td>
    <td class="align-middle">
      <button class="btn btn-sm btn-danger" onclick="remove(${i})">
        <i class="fa fa-times"></i>
      </button>
    </td>
  </tr>`;
  });
};

const displaySubTotal = function () {
  document.getElementById("sub-total").innerHTML = `AED ${calculateSubTotal()}`;
};

const displayShipping = function () {
  let shipping = calculateShipping();
  document.getElementById("shipping").innerHTML = `AED ${shipping}`;
};

const calculateSubTotal = function () {
  let total = 0;
  //   for (let i = 0; i < products.length; i++) {
  //     total += products[i].total;
  //   }
  //continue
  //break
  products.forEach((p) => {
    total += p.getTotal();
  });
  return total;
};

const displayTotal = function () {
  let total = calculateSubTotal() + calculateShipping();
  document.getElementById("total").innerHTML = `AED ${total}`;
};

const calculateShipping = function () {
  return Math.round(calculateSubTotal() * 0.1);
};

const validateInputs = function (productName, price, quantity) {
  return true;
};

const decQuantity = function (i) {
  if (products[i].quantity > 1) {
    products[i].quantity -= 1;
    display();
  }
};

const incQuantity = function (i) {
  products[i].quantity = Number(products[i].quantity) + 1;
  display();
};

const remove = function (i) {
  if (confirm("Are you sure?")) {
    products.splice(i, 1);
    display();
  }
};