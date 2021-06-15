let cartItems = localStorage.getItem('productsInCart');
cartItems = JSON.parse(cartItems);
let productsContainer = document.querySelector('.cart-container');
let cartCost = localStorage.getItem('totalCost');
if(cartItems && productsContainer) {
	productsContainer.innerHTML = '';
	Object.values(cartItems).map(item => {
    productsContainer.innerHTML += `
    <p>${item.name}<span class="price">${item.price}€</span></p>
    `});
    productsContainer.innerHTML += `
    <hr>
    <p>Total <span class="price" style="color: black"><b name="total-price">${cartCost}€</b></span></p>
    `
}