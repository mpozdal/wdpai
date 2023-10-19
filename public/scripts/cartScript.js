function totalPrice(cart) {
	let suma = 0.0;
	cart.forEach((item) => {
		let price = parseFloat(
			item['itemPrice'].replace(' zł', '').replace(',', '.')
		);

		suma += price;
	});
	return suma.toFixed(2);
}

document.addEventListener('DOMContentLoaded', function () {
	let view = document.querySelector('article');
	let cart = JSON.parse(sessionStorage.getItem('cart'));
	let suma = totalPrice(cart);

	let summary = document.querySelector('.totalPrice');
	summary.innerHTML = suma + 'zł';

	for (let i = 0; i < cart.length; i++) {
		const cartItem = document.createElement('span');
		cartItem.classList.add('cartItem');
		cartItem.id = cart[i].itemName.replace(' ', '');

		const img = document.createElement('img');
		img.src = cart[i].imgSrc;
		img.width = '60';
		cartItem.appendChild(img);

		const name = document.createElement('span');
		name.classList.add('name');
		name.textContent = cart[i].itemName;
		cartItem.appendChild(name);

		const price = document.createElement('span');
		price.classList.add('price');
		price.textContent = cart[i].itemPrice;
		cartItem.appendChild(price);

		const removeIcon = document.createElement('i');
		removeIcon.classList.add('fa-solid', 'fa-xmark');
		removeIcon.id = cart[i].itemName.replace(' ', '');
		cartItem.appendChild(removeIcon);

		view.appendChild(cartItem);
	}

	const items = document.querySelectorAll('.fa-xmark');

	items.forEach((item) => {
		item.addEventListener('click', function () {
			console.log(cart);

			cart = cart.filter(function (obiekt) {
				console.log(obiekt);
				return obiekt.itemName.replace(' ', '') !== item.id;
			});
			console.log(cart);
			sessionStorage.setItem('cart', JSON.stringify(cart));
			suma = totalPrice(cart);
			summary.innerHTML = suma + 'zł';
			let itemToDelete = document.querySelector('#' + item.id);
			itemToDelete.parentNode.removeChild(itemToDelete);
		});
	});
});
