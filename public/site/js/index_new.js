const tabs = document.querySelector(".window-tabs");
const tabButton = document.querySelectorAll(".tab-control li");
const contents = document.querySelectorAll(".slide");

tabs.onclick = e => {
	const id = e.target.dataset.id;
	if (id) {
		tabButton.forEach(btn => {
			btn.classList.remove("active");
		});
		e.target.classList.add("active");

		contents.forEach(content => {
			content.classList.remove("active_slide");
		});
		const element = document.getElementById(id);
		element.classList.add("active_slide");
	}
}



const filter = document.querySelectorAll('.btn-filter');
let filter2 = document.querySelector('.filter');
let search_ad = document.querySelector('.advanced-search');
filter.forEach(element => {
	element.addEventListener('click', function (e) {
		filter_panel.style.display = 'flex';
		if (e.target.id == 'btn-filter') {
			filter2.style.display = 'block';
		} else {
			search_ad.style.display = 'block';
		}
	})
});

const filter_panel = document.querySelector('.filter-panel');
filter_panel.addEventListener('click', function (e) {
	if (e.target.className == 'position-fixed filter-panel') {
		filter_panel.style.display = 'none';
		filter2.style.display = 'none';
		search_ad.style.display = 'none';
	}
});

const close_filter = document.querySelectorAll('.close-filter');
close_filter.forEach(element => {
	element.addEventListener('click', function () {
		filter_panel.style.display = 'none';
		filter2.style.display = 'none';
		search_ad.style.display = 'none';
	});
});


const form_check_input = document.querySelectorAll('.filter-row .form-check-input');
form_check_input.forEach(element => {
	element.addEventListener('click', function () {
		setTimeout(function () {
			filter_panel.style.display = 'none';
			filter2.style.display = 'none';
			search_ad.style.display = 'none';
		}, 700);
	})
});

const apply_filter = document.querySelector('.apply-filter');
apply_filter.addEventListener('click', function () {
	setTimeout(function () {
		filter_panel.style.display = 'none';
		filter2.style.display = 'none';
		search_ad.style.display = 'none';
	}, 500);
});

function priceRange() {
	let percent = document.getElementById('rangeInput').value;

	let max_range = document.getElementById('max-range').value;

	let range_show = document.getElementById('range-show');
	console.log(max_range);

	range_show.value = new Intl.NumberFormat().format(parseInt(max_range) * parseInt(percent) / 100);
}




var dropdown = document.getElementsByClassName("dropdown-btn");
var i;

if (dropdown){
	for (i = 0; i < dropdown.length; i++) {
		dropdown[i].addEventListener("click", function() {
		this.classList.toggle("active_group");
		var dropdownContent = this.nextElementSibling;
		if (dropdownContent.style.display === "block") {
		dropdownContent.style.display = "none";
		} else {
		dropdownContent.style.display = "block";
		}
		});
	}
}



// document.addEventListener('scroll', function () {
// 	var doc = document.documentElement;
// 	var top = (window.pageYOffset || doc.scrollTop) - (doc.clientTop || 0);
// 	let range = document.querySelector('.desk');
// 	if (top > 490 && window.innerWidth > 767) {
// 		console.log(top);
// 		range.classList.add('fixed_range');
// 	} else {

// 		range.classList.remove('fixed_range');
// 	}
// });

