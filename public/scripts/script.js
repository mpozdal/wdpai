const coffees = [
	{
		name: 'Coffee 1',
		desc: '',
		price: '10,00',
		img: '/public/assets/kawa1.png',
		id: 'Coffe1',
	},
	{
		name: 'Coffee 2',
		desc: '',
		price: '15,00',
		img: '/public/assets/kawa1.png',
		id: 'Coffee2',
	},
	{
		name: 'Coffee 3',
		desc: '',
		price: '11,00',
		img: '/public/assets/kawa1.png',
		id: 'Coffee3',
	},
	{
		name: 'Coffee 4',
		desc: '',
		price: '11,00',
		img: '/public/assets/kawa1.png',
		id: 'Coffee3',
	},
	{
		name: 'Coffee 5',
		desc: '',
		price: '11,00',
		img: '/public/assets/kawa1.png',
		id: 'Coffee3',
	},
];
document.addEventListener('scroll', function () {
	let body = document.querySelector('#home');
	body.scrollLeft += 200;
});
document.addEventListener('DOMContentLoaded', function () {
	let mainProducts = document.querySelector('#mainProducts');

	for (let i = 0; i < coffees.length; i++) {
		let divElement = document.createElement('div');
		divElement.classList.add('item');
		divElement.id = coffees[i].id;
		let imgElement = document.createElement('img');
		imgElement.classList.add('imgItem');
		imgElement.src = coffees[i].img;

		let spanElement = document.createElement('span');

		let priceParagraf = document.createElement('p');
		priceParagraf.classList.add('price');

		priceParagraf.textContent = coffees[i].price + ' zł';

		let textParagraf = document.createElement('p');
		textParagraf.classList.add('desc');
		textParagraf.textContent = coffees[i].name;

		spanElement.appendChild(priceParagraf);
		spanElement.appendChild(textParagraf);

		divElement.appendChild(imgElement);
		divElement.appendChild(spanElement);

		mainProducts.appendChild(divElement);
	}
	let cart,
		oldCart = [];
	const items = document.querySelectorAll('.item');
	if (sessionStorage.length > 0) {
		oldCart = JSON.parse(sessionStorage.getItem('cart'));
		cart = new Cart(oldCart);
		cart.getCart();
	} else {
		cart = new Cart();
	}
	items.forEach((item, i) => {
		item.addEventListener('click', function () {
			console.log(`Kliknięto produkt o ID: ${item.id}`);
			cart.addItem(coffees[i]);
			console.log('abcd');
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
