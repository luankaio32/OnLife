let cart = [];

function addToCart(productName, price) {
  cart.push({ name: productName, price: price });
  updateCartCount();
}

function updateCartCount() {
  const cartCountElement = document.getElementById('cart-count');
  cartCountElement.textContent = cart.length;
}
