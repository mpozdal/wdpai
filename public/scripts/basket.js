document.addEventListener('DOMContentLoaded', function () {
	const minusBtn = document.querySelectorAll('.minus');
	const plusBtn = document.querySelectorAll('.plus');
	const deleteBtn = document.querySelectorAll('.delete');

	const totalHidden = document.querySelector('.hiddenTotal');
	const totalHidden2 = document.querySelector('.hiddenTotal2');
	const total = document.querySelector('.totalPrice');
	const total2 = document.querySelector('.totalPrice2');

	function calculateTotal() {
		let article = document.querySelector('article');
		let arr = Array.from(article.childNodes);
		let sum = 0;
		arr.forEach((elem) => {
			sum +=
				parseFloat(elem.querySelector('.price').childNodes[0].data) *
				parseFloat(elem.querySelector('.qty').childNodes[0].data);
		});
		total.innerHTML = sum.toFixed(2) + ' zł';
		total2.innerHTML = sum.toFixed(2) + ' zł';
		totalHidden.value = sum.toFixed(2);
		totalHidden2.value = sum.toFixed(2);
	}

	function minusQty() {
		const qty_btn = this;
		const qty = qty_btn.parentElement;
		const container = qty_btn.parentElement.parentElement;

		const id = container.getAttribute('id');
		const ilosc = qty.querySelector('.qty').innerHTML;
		if (ilosc > 1) {
			fetch(`/minusQty/${id}`)
				.then(function () {
					qty.querySelector('.qty').innerHTML =
						parseInt(qty.querySelector('.qty').innerHTML) - 1;
				})
				.finally(() => {
					calculateTotal();
				});
		}
	}
	function addQty() {
		const qty_btn = this;
		const qty = qty_btn.parentElement;
		const container = qty_btn.parentElement.parentElement;
		const id = container.getAttribute('id');
		const ilosc = qty.querySelector('.qty').innerHTML;
		if (ilosc < 10) {
			fetch(`/plusQty/${id}`)
				.then(function () {
					qty.querySelector('.qty').innerHTML =
						parseInt(qty.querySelector('.qty').innerHTML) + 1;
				})
				.finally(() => {
					calculateTotal();
				});
		}
	}

	function handleDelete() {
		const id = this.parentElement.getAttribute('id');
		const toRemove = this.parentElement;
		console.log(id);
		fetch(`/deleteItem/${id}`)
			.then((response) => {})
			.finally(() => {
				toRemove.remove();
				calculateTotal();
			});
	}

	minusBtn.forEach((button) => button.addEventListener('click', minusQty));
	plusBtn.forEach((button) => button.addEventListener('click', addQty));
	deleteBtn.forEach((button) =>
		button.addEventListener('click', handleDelete)
	);

	calculateTotal();
});
