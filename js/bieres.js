let products = [
	{
		name: "Ambrée",
		tag: "ambree",
		price: 2.50
	},
	{
		name: "Toast Pale",
		tag: "toast-pale",
		price: 2.50
	},
	{
		name: "Blanche",
		tag: "blanche",
		price: 2.50
	},
	{
		name: "Blonde",
		tag: "blonde",
		price: 2.50
	}
];

let productsContainer = document.querySelector('.cards');

for(let i = 0; i < products.length; i++) {
	productsContainer.innerHTML += `
		<div class="card">
			<a href="./bieres/${products[i].tag}.php">
				<img src="./img/biere.png" alt="" class="card-image">
			</a>
			<div class="card-content">
				<p>
					${products[i].name}
				</p>
				<p>
					${products[i].price}€
				</p>
			</div>
			<div class="card-info">
				<p>En stock !</p>
			</div>
		</div>
	`;
}