let coffeeCount = {
	CAPPUCCINO: 0,
	ESSPRESSO: 0,
	'CAFFE LATTE': 0,
	CORTADO: 0,
};
document.addEventListener('DOMContentLoaded', function () {
	let modal = document.querySelector('#modal');
	if (sessionStorage.length > 0) {
		coffeeCount = JSON.parse(sessionStorage.getItem('coffeeCount'));
	}

	let goUp = document.querySelector('.goUp');

	window.addEventListener('scroll', function () {
		if (window.scrollTop !== 0) {
			goUp.style.display = 'block';
		}
		if (window.pageYOffset === 0 || window.scrollTop === 0) {
			goUp.style.display = 'none';
		}
	});

	const addBtn = document.querySelectorAll('.menuButton');

	function addToBasket() {
		let name = this.querySelector('.itemName').innerText;
		name = name.replace(' ', '_');
		modal.style.display = 'block';
		fetch(`/add/${name}`)
			.then((response) => {
				console.log(response);
			})
			.finally(() => {
				modal.style.display = 'none';
			});
	}

	addBtn.forEach((button) => button.addEventListener('click', addToBasket));
});
