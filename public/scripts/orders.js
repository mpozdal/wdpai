document.addEventListener('DOMContentLoaded', function () {
	const cancelBtns = document.querySelectorAll('.cancel');
	const confirmBtns = document.querySelectorAll('.confirm');
	const infoBtns = document.querySelectorAll('.info');
	const backBtn = document.querySelector('#goBack');

	function cancelOrder() {
		const id_order =
			this.parentNode.parentNode.querySelector('.id').innerText;
		let status = this.parentNode.parentNode;
		fetch(`/cancel/${id_order}`).then(function () {
			status.querySelector('.status').innerHTML = 'cancelled';
		});
	}
	function confirmOrder() {
		const id_order =
			this.parentNode.parentNode.querySelector('.id').innerText;

		let status = this.parentNode.parentNode;
		fetch(`/confirm/${id_order}`)
			.then(function () {
				status.querySelector('.status').innerHTML = 'confirmed';
			})
			.then((response) => {
				console.log(response);
			});
	}
	function infoOrder() {
		const id = this.parentNode.parentNode.getAttribute('id');

		fetch(`/order/${id}`).then(() => {
			window.location.href = `/order/${id}`;
		});
	}
	function goBack() {
		window.history.back();
	}

	cancelBtns.forEach((button) =>
		button.addEventListener('click', cancelOrder)
	);
	confirmBtns.forEach((button) =>
		button.addEventListener('click', confirmOrder)
	);
	infoBtns.forEach((button) => button.addEventListener('click', infoOrder));

	backBtn.addEventListener('click', goBack);
});
