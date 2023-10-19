const products = [
	{
		imgSrc: './public/assets/c2.png',
		itemName: 'CAPPUCCINO',
		itemDesc: 'Lorem ipsum dolor sit amet, consectetur',
		strength: 2,
		itemPrice: '12.99 zł',
	},
	{
		imgSrc: './public/assets/c3.png',
		itemName: 'ESSPRESSO',
		itemDesc: 'Lorem ipsum dolor sit amet, consectetur',
		strength: 5,
		itemPrice: '6.99 zł',
	},
	{
		imgSrc: './public/assets/c1.png',
		itemName: 'CAFFE LATTE',
		itemDesc: 'Lorem ipsum dolor sit amet, consectetur',
		strength: 3,
		itemPrice: '9.99 zł',
	},
	{
		imgSrc: './public/assets/c3.png',
		itemName: 'CORTADO',
		itemDesc: 'Lorem ipsum dolor sit amet, consectetur',
		strength: 4,
		itemPrice: '7.99 zł',
	},
];

document.addEventListener('DOMContentLoaded', function () {
	let mainProducts = document.querySelector('#mainProducts');

	products.forEach((product) => {
		const productElement = document.createElement('div');
		productElement.classList.add('product');

		productElement.innerHTML = `
		  <div class="imgContainer">
			<img src="${product.imgSrc}" class="itemImg" alt="${product.itemName}" />
		  </div>
		  <div class="desc">
			<span class="itemName">${product.itemName}</span>
			<span class="itemDesc">${product.itemDesc}</span>
		  </div>
		  <div class="details">
			<div class="strength">
			  ${'<i class="fa-solid fa-circle"></i> '.repeat(product.strength)}
			  ${'<i class="fa-regular fa-circle"></i> '.repeat(5 - product.strength)}
			</div>
			<div class="itemPrice">
			  ${product.itemPrice}
			</div>
		  </div>
		`;

		mainProducts.appendChild(productElement);
	});
	let cart,
		oldCart = [];
	const items = document.querySelectorAll('.product');
	if (sessionStorage.length > 0) {
		oldCart = JSON.parse(sessionStorage.getItem('cart'));
		cart = new Cart(oldCart);
		cart.getCart();
	} else {
		cart = new Cart();
	}
	items.forEach((item, i) => {
		item.addEventListener('click', function () {
			cart.addItem(products[i]);
			console.log('click');
		});
	});
});

class Cart {
	constructor(items = []) {
		this.items = [...items];
	}

	getCart() {
		return this.items;
	}

	addItem(item) {
		this.items.push(item);
		sessionStorage.setItem('cart', JSON.stringify(this.items));
	}
	deleteItem(index) {
		if (index >= 0 && index < this.produkty.length) {
			this.produkty.splice(index, 1);
		}
	}
}
