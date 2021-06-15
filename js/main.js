let carts = document.querySelectorAll('.cta-add');
currentBeer = location.pathname.split('/').slice(-1)[0];

let products = [
	{
		name: "Ambrée",
		tag: "ambree",
		price: 2.50,
		inCart: 0,
		id: 1
	},
	{
		name: "Toast Pale",
		tag: "toastpale",
		price: 2.50,
		inCart: 0,
		id: 3
	},
	{
		name: "Blanche",
		tag: "blanche",
		price: 2.50,
		inCart: 0,
		id: 4
	},
	{
		name: "Blonde",
		tag: "blonde",
		price: 2.50,
		inCart: 0,
		id: 2
	}
];

let product;

for(let i = 0; i < products.length; i++) {
	let name = products[i].tag + '.php';
	if(name.toUpperCase() === currentBeer.toUpperCase()) {
		product = products[i];
	}
}

for(let i = 0; i < carts.length; i++) {
	carts[i].addEventListener('click', () => {
		cartLength(product);
		totalCost(product);
	});
}

function loadCartLength() {
	let productSize = localStorage.getItem('cartLength');

	if(productSize) {
		document.querySelector('.cart p').textContent = productSize;
	}
}

function setItems(product) {
	let cartItems = localStorage.getItem('productsInCart');
	cartItems = JSON.parse(cartItems);

	if(cartItems != null) {
		if(cartItems[product.tag] == undefined) {
			cartItems = {
				...cartItems,
				[product.tag]: product
			};
		}
		cartItems[product.tag].inCart += 1;
	}else{
		product.inCart = 1;
		cartItems = {
			[product.tag]: product
		};
	}
	localStorage.setItem('productsInCart', JSON.stringify(cartItems));
}

function cartLength(product) {
	console.log("Le produit selectionné est ", product);
	let productSize = localStorage.getItem('cartLength');
	productSize = parseInt(productSize);
	
	if(productSize) {
		localStorage.setItem('cartLength', productSize + 1);
		document.querySelector('.cart p').textContent = productSize + 1;
	}else{
		localStorage.setItem('cartLength', 1);
		document.querySelector('.cart p').textContent = 1;
	}
	setItems(product);

}

function totalCost(product) {
	let cartCost = localStorage.getItem('totalCost');
	if(cartCost != null) {
		cartCost = parseFloat(cartCost);
		localStorage.setItem('totalCost', cartCost + product.price);
	}else{
		localStorage.setItem('totalCost', product.price);
	}
}

function displayCart() {
	let cartItems = localStorage.getItem('productsInCart');
	cartItems = JSON.parse(cartItems);
	let productsContainer = document.querySelector('.products');
	let pc = document.querySelector('.products-container');
	let cartCost = localStorage.getItem('totalCost');
	if(cartItems && productsContainer) {
		productsContainer.innerHTML = '';
		Object.values(cartItems).map(item => {
			productsContainer.innerHTML += `
			<div class="product">
				<ion-icon name="close-circle"></ion-icon>
				<img src="./img/biere.png">
				<span>${item.name}</span>
				<div class="price">${item.price}0€</div>
				<div class="quantity">
					<ion-icon name="caret-back-circle"></ion-icon>
					<span>${item.inCart}</span>
					<ion-icon name="caret-forward-circle"></ion-icon>
				</div>
				<div class="total">
					${item.inCart * item.price}€
				</div>
			</div>
			`;
		});

		pc.innerHTML += `
			<div class="basketTotalContainer">
				<h4 class="basketTotalTitle">
					Total du panier
				</h4>
				<h4 class="basketTotal">
					${cartCost}€
				</h4>
			</div>
			<div class="reglementContainer">
				<form action="./payment-gateway.php" method="post">
					<button type="submit" name="cart-btn">Passer la commande</button>
					<textarea name="total-price">${cartCost}</textarea>
				</form>
			</div>
		`;
	}
}

displayCart();
loadCartLength();