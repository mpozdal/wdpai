document.addEventListener('DOMContentLoaded', function () {
	const order = document.querySelectorAll('.order');

	function orderClick() {
		console.log(this);
	}

	order.forEach((button) => button.addEventListener('click', orderClick));
});
