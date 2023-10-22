let coffeeCount = {
	CAPPUCCINO: 0,
	ESSPRESSO: 0,
	'CAFFE LATTE': 0,
	CORTADO: 0,
};
document.addEventListener('DOMContentLoaded', function () {
	let modal = document.querySelector('#modal');
	coffeeCount = JSON.parse(sessionStorage.getItem('coffeeCount'));

	let goUp = document.querySelector('.goUp');

	window.addEventListener('scroll', function () {
		if (window.scrollTop !== 0) {
			goUp.style.display = 'block';
		}
		if (window.pageYOffset === 0 || window.scrollTop === 0) {
			goUp.style.display = 'none';
		}
	});
	const items = document.querySelectorAll('.product');
	items.forEach((item, i) => {
		item.addEventListener('click', function () {
			let nested = item.querySelector('.itemName');
			let added = nested.innerText;
			coffeeCount[added] += 1;
			modal.style.display = 'block';
			sessionStorage.setItem('coffeeCount', JSON.stringify(coffeeCount));
			setTimeout(() => {
				modal.style.display = 'none';
			}, 500);
		});
	});
});
