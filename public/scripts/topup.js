document.addEventListener('DOMContentLoaded', function () {
	const btns = document.querySelectorAll('.form__radio');
	let opcje = document.forms['payment']['payment-method'];
	const cardDetails = document.querySelector('.cardDetails');
	let wybor = opcje[0].value;
	console.log(wybor);

	function changeView() {
		if (wybor === 'card') {
			cardDetails.style.display = 'block';
		} else {
			cardDetails.style.display = 'none';
		}
	}

	function check() {
		for (var i = 0; i < opcje.length; i++) {
			if (opcje[i].checked) {
				wybor = opcje[i].value;
				break;
			}
		}
		console.log(wybor);
		changeView();
	}

	btns.forEach((btn) => btn.addEventListener('click', check));
});
