class Order {
    orderDetails;
    user;
    paymentMethod;
  
    constructor() {
      this.orderDetails = [];
    }
  
    get total() {
      return (this.subTotal + this.shipping) * (1 + this.getPaymentCost());
    }
  
    get subTotal() {
      return this.orderDetails.map((x) => x.total).reduce((a, v) => (a += v), 0);
    }
  
    get shipping() {
      return (
        this.orderDetails.map((x) => x.quantity).reduce((a, v) => (a += v), 0) * 2
      );
    }
  
    getPaymentCost() {
      switch (this.paymentMethod?.toLowerCase()) {
        case "paypal":
          return 0;
        case "check":
          return 0.01;
        case "bank-transfer":
          return 0.02;
        default:
          return 0;
      }
    }
  
    addProductById(id) {
      let orderDetail = this.orderDetails.find((x) => x.product.id === id);
      if (orderDetail) {
        orderDetail.increaseQuantity(1);
      }
      return orderDetail;
    }
  
    addProduct(product) {
      let orderDetail = this.addProductById(product.id);
      if (!orderDetail) {
        const ids = this.orderDetails.map((x) => x.id);
        const maxId = Math.max(...(ids.length > 0 ? ids : [0]));
        orderDetail = new OrderDetail(product);
        orderDetail.id = maxId + 1;
        this.orderDetails.push(orderDetail);
      }
    }
  
    deleteProduct(id) {
      let orderDetail = this.orderDetails.find((x) => x.product.id == id);
      if (orderDetail) {
        if (orderDetail.quantity == 1) this.removeDetail(orderDetail.id);
        else {
          orderDetail.decreaseQuantity(1);
        }
      }
    }
  
    removeDetail(id) {
      const index = this.orderDetails.findIndex((x) => x.id === id);
      this.orderDetails.splice(index, 1);
    }
  
    render() {
      this.renderTotal();
      this.renderTable();
    }
  
    renderTotal() {
      document.getElementById("total").innerHTML = this.total;
      document.getElementById("sub-total").innerHTML = this.subTotal;
      document.getElementById("shipping").innerHTML = this.shipping;
    }
  
    renderTable() {
      document.getElementById("products").innerHTML = "";
      this.orderDetails.forEach((x) => {
        document.getElementById("products").innerHTML += x.getHtmlRow();
      });
    }
  
    saveChanges() {
      const products = [];
      this.orderDetails.forEach((d) => {
        for (let i = 0; i < d.quantity; i++) {
          products.push(d.product);
        }
      });
      localStorage.setItem("products", JSON.stringify(products));
    }
  }
  
  class OrderDetail {
    id;
    product;
    quantity;
    price;
  
    get total() {
      return this.price * this.quantity;
    }
  
    constructor(product) {
      this.product = product;
      this.quantity = 1;
      this.price = product.price;
    }
  
    increaseQuantity(q) {
      this.quantity += q;
    }
  
    decreaseQuantity(q) {
      if (this.quantity > q) this.quantity -= q;
    }
  
    getHtmlRow() {
      return `  <div class="d-flex justify-content-between">
      <p>${this.product.name}</p>
      <p>${this.product.price * this.quantity}</p>
  </div>`;
    }
  }
  
  class Product {
    id;
    name;
    image;
    price;
    constructor(product) {
      this.id = product.id;
      this.name = product.name;
      this.image = product.image;
      this.price = product.price;
    }
    
  }
  
  class User {
    firstName;
    lastName;
    address;
  
    constructor(user) {
      this.firstName = user.firstName;
      this.lastName = user.lastName;
      this.address = user.address;
    }
  }
  
  let order = new Order();
  const products = JSON.parse(localStorage.getItem("products") ?? "[]");
  products.forEach((x) => {
    order.addProduct(new Product(x));
  });

  const sendToApi = async function () {
    const orderdetial = order.orderDetails.map((x)=>{
      return{product_id: `${x.product.id}`, price: x.price, qty: x.quantity};
    })
    const data = {
      "sub_total_price": order.subTotal,
    "shipping": order.shipping,
    "total_price": order.total,
    "user_id": "6346ac23bb862e01fe4b6535",
    "order_date": "16-12-2022",
    "order_details": orderdetial,
    "shipping_info": {
        "first_name": "Ohoud",
        "last_name": "Ahmed",
        "email": "example@gmail.com",
        "mobile_number": "+123456789",
        "address1": "123 street",
        "address2": "123 street",
        "country": "UAE",
        "city": "Dubai",
        "state": "Dubai",
        "zip_code": "123"
    }
    };
    console.log(JSON.stringify(data));
    const featured = await fetch("http://localhost:3000/api/orders", {method: 'POST', body:JSON.stringify(data), headers:{'Accept': 'application/json', 'Content-Type': 'application/json','x-access-token':'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1c2VyX2lkIjoiNjM0NmFjMjNiYjg2MmUwMWZlNGI2NTM1IiwiZW1haWwiOiJyYW15bWlicmFoaW1AeWFob28uY29tIiwiaWF0IjoxNjcwNjcxNTI2LCJleHAiOjE2NzA2Nzg3MjZ9.Phw1TTXN7aQ8dR2q3JnCZggpq9LP4Ru2wiXByuw3Kuo'}});
     console.log(featured);
  }

  order.render();