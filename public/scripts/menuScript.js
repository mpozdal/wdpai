document.addEventListener('DOMContentLoaded', function () {
	let hamburger = document.querySelector('.bars');
	let menu = document.querySelector('.menu');

	hamburger.addEventListener('click', function () {
		console.log(menu.className);
		if (menu.className === 'menu') {
			menu.className += ' menuClicked';
			hamburger.style.color = 'white';
		} else {
			menu.className = 'menu';
			hamburger.style.color = '#765F4E';
		}
	});
});
