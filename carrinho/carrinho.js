var cartItems = [
    { name: 'Dorflex', price: 10.00, quantity: 2, image: 'dorflex.png' },
    { name: 'Doril', price: 24.00, quantity: 1, image: 'doril.png' }
];

function updateCart() {
    var cartList = document.getElementById('cart-items');
    var total = 0;

    
    cartList.innerHTML = '';

    
    cartItems.forEach((item, index) => {
        var listItem = document.createElement('li');
        listItem.innerHTML = `
            <img src="${item.image}" alt="${item.name}">
            <span>${item.name} - R$${item.price.toFixed(2)} x ${item.quantity}</span>
        `;
        cartList.appendChild(listItem);
        total += item.price * item.quantity;
    });

    document.getElementById('total').textContent = total.toFixed(2);
}

updateCart();

document.getElementById('checkout-button').addEventListener('click', function() {
    alert('Compra finalizada!'); 
});


document.getElementById('cancel-button').addEventListener('click', function() {
    alert('Compra cancelada!'); 
});
