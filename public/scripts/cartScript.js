document.addEventListener('DOMContentLoaded', function () {
	let view = document.querySelector('article');
	let cart = JSON.parse(sessionStorage.getItem('cart'));

	let zliczoneElementy = {};
	let ceny = {};

	cart.forEach(function (obiekt) {
		let name = obiekt.name;
		let klucz = name;
		let klucz2 = obiekt.price;

		if (zliczoneElementy[klucz]) {
			zliczoneElementy[klucz]++;
		} else {
			zliczoneElementy[klucz] = 1;
		}
		if (ceny[klucz]) {
			ceny[klucz] = klucz2;
		} else {
			ceny[klucz] = klucz2;
		}
	});
	console.log(ceny);

	for (let i = 0; i < Object.keys(zliczoneElementy).length; i++) {
		const cartItem = document.createElement('span');
		cartItem.classList.add('cartItem');
		cartItem.id = Object.keys(zliczoneElementy)[i].replace(' ', '');

		const img = document.createElement('img');
		img.src = '/public/assets/kawa1.png';
		img.width = '40';
		cartItem.appendChild(img);

		const qty = document.createElement('span');

		qty.classList.add('name');
		qty.id = Object.keys(zliczoneElementy)[i].replace(' ', '');

		qty.textContent = Object.values(zliczoneElementy)[i];

		cartItem.appendChild(qty);

		const name = document.createElement('span');
		name.classList.add('name');
		name.textContent = Object.keys(zliczoneElementy)[i];
		cartItem.appendChild(name);

		const price = document.createElement('span');
		price.classList.add('price');
		price.textContent = ceny[Object.keys(zliczoneElementy)[i]] + ' zł';
		cartItem.appendChild(price);

		const removeIcon = document.createElement('i');
		removeIcon.classList.add('fa-solid', 'fa-xmark');
		removeIcon.id = Object.keys(zliczoneElementy)[i].replace(' ', '');
		cartItem.appendChild(removeIcon);

		view.appendChild(cartItem);
	}

	const items = document.querySelectorAll('.fa-xmark');

	items.forEach((item) => {
		item.addEventListener('click', function () {
			console.log(cart);
			cart = cart.filter(function (obiekt) {
				console.log(obiekt);
				return obiekt.name.replace(' ', '') !== item.id;
			});
			console.log(cart);
			sessionStorage.setItem('cart', JSON.stringify(cart));
			let itemToDelete = document.querySelector('#' + item.id);
			itemToDelete.parentNode.removeChild(itemToDelete);
		});
	});
});
