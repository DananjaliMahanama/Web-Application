let cart = [];

function addToCart(id, name, price) {
  const item = cart.find(product => product.id === id);
  if (item) {
    item.qty += 1;
  } else {
    cart.push({ id, name, price, qty: 1 });
  }
  updateCartUI();
}

function removeFromCart(id) {
  cart = cart.filter(product => product.id !== id);
  updateCartUI();
}

function updateCartUI() {
  const cartItems = document.getElementById('cart-items');
  const cartCount = document.getElementById('cart-count');
  const totalElement = document.getElementById('total');

  cartItems.innerHTML = '';
  let total = 0;
  let count = 0;

  cart.forEach(item => {
    total += item.price * item.qty;
    count += item.qty;

    const li = document.createElement('li');
    li.innerHTML = `${item.name} (x${item.qty}) - $${(item.price * item.qty).toFixed(2)} 
      <button onclick="removeFromCart(${item.id})">Remove</button>`;
    cartItems.appendChild(li);
  });

  totalElement.textContent = total.toFixed(2);
  cartCount.textContent = count;
}

function checkout() {
  if (cart.length === 0) {
    alert("Your cart is empty!");
  } else {
    alert("Thank you for your purchase!");
    cart = [];
    updateCartUI();
  }
}

