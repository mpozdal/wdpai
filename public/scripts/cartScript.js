const products = [
	{
		imgSrc: './public/assets/c2.png',
		itemName: 'CAPPUCCINO',
		itemDesc: 'Lorem ipsum dolor sit amet, consectetur',
		strength: 2,
		itemPrice: '12.99 zł',
		id: 'cappuccino',
	},
	{
		imgSrc: './public/assets/c3.png',
		itemName: 'ESSPRESSO',
		itemDesc: 'Lorem ipsum dolor sit amet, consectetur',
		strength: 5,
		itemPrice: '6.99 zł',
		id: 'esspresso',
	},
	{
		imgSrc: './public/assets/c1.png',
		itemName: 'CAFFE LATTE',
		itemDesc: 'Lorem ipsum dolor sit amet, consectetur',
		strength: 3,
		itemPrice: '9.99 zł',
		id: 'caffe_latte',
	},
	{
		imgSrc: './public/assets/c3.png',
		itemName: 'CORTADO',
		itemDesc: 'Lorem ipsum dolor sit amet, consectetur',
		strength: 4,
		itemPrice: '7.99 zł',
		id: 'cortado',
	},
];
function totalPrice(cart) {
	let summary = document.querySelector('.totalPrice');

	let suma = 0;
	cart.forEach((item) => {
		let price = parseFloat(
			item['price'].replace(' zł', '').replace(',', '.')
		);
		suma += price * item['qty'];
	});

	summary.innerHTML = suma.toFixed(2) + 'zł';
	return suma.toFixed(2);
}
function updateCoffeeCount(cart, coffeeCount) {
	
	for (let i = 0; i < cart.length; i++) {
		[(coffeeCount[cart[i].name] = cart[i].qty)];
	}

	sessionStorage.setItem('coffeeCount', JSON.stringify(coffeeCount));
}
function getCartItems(coffeeCount) {
	let cart = [];
	for (let i = 0; i < Object.keys(coffeeCount).length; i++) {
		if (coffeeCount[Object.keys(coffeeCount)[i]] > 0) {
			let temp = products.find(function (obj) {
				return obj.itemName === Object.keys(coffeeCount)[i];
			});
			let item = {
				name: Object.keys(coffeeCount)[i],
				src: temp.imgSrc,
				price: temp.itemPrice,
				qty: coffeeCount[Object.keys(coffeeCount)[i]],
				id: temp.id,
			};
			cart.push(item);
		}
	}
	return cart;
}

document.addEventListener('DOMContentLoaded', function () {
	let view = document.querySelector('article');
	let checkoutMobile = document.querySelector('.mobileCheckout');
	let coffeeCount = JSON.parse(sessionStorage.getItem('coffeeCount'));
	let cart = getCartItems(coffeeCount);
	let suma = totalPrice(cart);
	let checkoutBtn = document.querySelector('.checkoutButton');
	let checkoutBtn2 = document.querySelector('.checkoutButton2');
	if (cart.length === 0) {
		checkoutBtn.disabled = true;
		checkoutBtn2.disabled = true;
		checkoutMobile.style.display = 'none';
	} else {
		checkoutMobile.style.display = 'block';
	}

	let cartImg = document.querySelector('.emptyContainer');

	let summary = document.querySelector('.totalPrice');
	summary.innerHTML = suma + 'zł';
	for (let i = 0; i < cart.length; i++) {
		cartImg.style.display = 'none';
		const cartItem = document.createElement('span');
		cartItem.classList.add('cartItem');
		cartItem.id = cart[i].id;

		const img = document.createElement('img');
		img.src = cart[i].src;
		img.width = '60';
		cartItem.appendChild(img);

		const plus = document.createElement('span');
		plus.innerHTML = ' +';
		plus.classList.add('edit', 'plus');
		plus.id = cart[i].id + 'plus';

		const minus = document.createElement('span');
		minus.innerHTML = '- ';
		minus.classList.add('edit', 'minus');
		minus.id = cart[i].id + 'minus';

		const qty = document.createElement('span');
		qty.id = cart[i].id + 'qty';
		qty.innerHTML = cart[i].qty;

		const qtyContainer = document.createElement('span');
		qtyContainer.classList.add('qty');

		qtyContainer.appendChild(minus);
		qtyContainer.appendChild(qty);
		qtyContainer.appendChild(plus);

		cartItem.appendChild(qtyContainer);

		const name = document.createElement('span');
		name.classList.add('name');
		name.textContent = cart[i].name;
		cartItem.appendChild(name);

		const price = document.createElement('span');
		price.classList.add('price');
		price.textContent = cart[i].price;
		cartItem.appendChild(price);

		const removeIcon = document.createElement('i');
		removeIcon.classList.add('fa-solid', 'fa-xmark');
		removeIcon.id = cart[i].id + 'icon';
		cartItem.appendChild(removeIcon);

		view.appendChild(cartItem);
	}

	const summaryMobile = document.createElement('div');
	const summaryMobile2 = document.createElement('div');
	const summaryMobile3 = document.createElement('div');
	summaryMobile2.innerHTML = 'TOTAL';
	summaryMobile3.innerHTML = totalPrice(cart) + ' zł';
	summaryMobile.classList.add('summaryMobile');
	summaryMobile.appendChild(summaryMobile2);
	summaryMobile.appendChild(summaryMobile3);
	view.append(summaryMobile);
	const items = document.querySelectorAll('.fa-xmark');
	const minusBtns = document.querySelectorAll('.minus');
	const plusBtns = document.querySelectorAll('.plus');

	items.forEach((item) => {
		item.addEventListener('click', function () {
			let index = cart.findIndex(function (obj) {
				return obj.id === item.id.replace('icon', '');
			});
			console.log(index);
			cart[index].qty = 0;
			totalPrice(cart);
			summaryMobile3.innerHTML = totalPrice(cart) + ' zł';
			updateCoffeeCount(cart, coffeeCount);

			let itemToDelete = document.querySelector(
				'#' + item.id.replace('icon', '')
			);
			itemToDelete.parentNode.removeChild(itemToDelete);
			console.log(cart);
			if (cart.length === 0) {
				cartImg.style.display = 'block';
				checkoutBtn.disabled = true;
			}
		});
	});
	minusBtns.forEach((minusBtn) => {
		minusBtn.addEventListener('click', function () {
			let temp = cart.findIndex(function (obj) {
				return obj.id === minusBtn.id.replace('minus', '');
			});
			if (cart[temp].qty === 1) {
				return;
			}
			cart[temp].qty--;
			let qtyEdit = document.querySelector(
				'#' + minusBtn.id.replace('minus', 'qty')
			);
			qtyEdit.innerHTML = cart[temp].qty;
			totalPrice(cart);
			summaryMobile3.innerHTML = totalPrice(cart) + ' zł';
			updateCoffeeCount(cart, coffeeCount);
		});
	});
	plusBtns.forEach((plusBtn) => {
		plusBtn.addEventListener('click', function () {
			let temp = cart.findIndex(function (obj) {
				return obj.id === plusBtn.id.replace('plus', '');
			});
			cart[temp].qty++;
			let qtyEdit = document.querySelector(
				'#' + plusBtn.id.replace('plus', 'qty')
			);
			qtyEdit.innerHTML = cart[temp].qty;
			updateCoffeeCount(cart, coffeeCount);
			summaryMobile3.innerHTML = totalPrice(cart) + ' zł';
			totalPrice(cart);
		});
	});
});
