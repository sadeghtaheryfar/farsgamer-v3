// Toggling side menu in mobile screen
(() => {
	const berger = document.querySelector('#burger');
	const sidebar = document.querySelector('#sidebar');
	if (!berger && !sidebar) return;
	berger.addEventListener('click', () => {
		document.body.classList.toggle('overflow-hidden');
		document.body.classList.toggle('menu-is-open');
	});
})();

// ---

// ## Sliders

const sliderBaseConfig = {
	speed: 1000,
	loop: true,
	spaceBetween: 16,
	grabCursor: true,
}

const sliderAutoplayConfig = {
	autoplay: {
		delay: 500000,
		disableOnInteraction: false,
	}
}

const sliderPaginationConfig = {
	pagination: {
		el: '.swiper-pagination',
		clickable: true,
	}
}

const sliderNavigationConfig = {
	navigation: {
		nextEl: '.swiper-button-next',
		prevEl: '.swiper-button-prev',
	}
}

	// Basic image slider
	; (() => {
		window.addEventListener('load', () => {
			const sliders = document.querySelectorAll('.basic-image-slider')
			if (!sliders) return

			sliders.forEach(slider => {
				new Swiper('.basic-image-slider', {
					...sliderBaseConfig,
					...sliderAutoplayConfig,
					...sliderPaginationConfig,
				})
			})
		})
	})();

// Basic product slider
; (() => {
	window.addEventListener('load', () => {
		const sliders = document.querySelectorAll('.basic-product-slider')
		if (!sliders) return

		sliders.forEach(slider => {
			new Swiper('.basic-product-slider', {
				...sliderBaseConfig,
				...sliderAutoplayConfig,
				...sliderPaginationConfig,
				...sliderNavigationConfig,
				slidesPerView: 2,
				breakpoints: {
					768: { slidesPerView: 3 },
					1280: { slidesPerView: 5 },
					1536: { slidesPerView: 5 },
				},
			})
		})
	})
})();

// Giftcard Product slider
; (() => {
	window.addEventListener('load', () => {
		const sliders = document.querySelectorAll('.giftcard-product-slider')
		if (!sliders) return

		sliders.forEach(slider => {
			new Swiper('.giftcard-product-slider', {
				...sliderBaseConfig,
				...sliderAutoplayConfig,
				...sliderPaginationConfig,
				slidesPerView: 2,
				breakpoints: {
					487: { slidesPerView: 3 },
					640: { slidesPerView: 4 },
					894: { slidesPerView: 5 },
					1024: { slidesPerView: 6 },
					1536: { slidesPerView: 8 },
				},
			})
		})
	})
})();

// Review slider
; (() => {
	window.addEventListener('load', () => {
		const sliders = document.querySelectorAll('.review-slider')
		if (!sliders) return

		sliders.forEach(slider => {
			new Swiper('.review-slider', {
				...sliderBaseConfig,
				...sliderAutoplayConfig,
				...sliderPaginationConfig,
				breakpoints: {
					768: { slidesPerView: 2 },
					1280: { slidesPerView: 3 },
					1536: { slidesPerView: 4 },
				},
			})
		})
	})
})();
;
(() => {
    new Plyr('#lottery');
})();
// Post slider
; (() => {
	window.addEventListener('load', () => {
		const sliders = document.querySelectorAll('.post-slider')
		if (!sliders) return

		sliders.forEach(slider => {
			new Swiper('.post-slider', {
				...sliderBaseConfig,
				...sliderAutoplayConfig,
				...sliderPaginationConfig,
				slidesPerView: 2,
				breakpoints: {
					// 768:  { slidesPerView: 2 },
					1280: { slidesPerView: 3 },
					1536: { slidesPerView: 4 },
				},
			})
		})
	})
})();

// Stop slider autoplay if:
// - slides < 2
// - slides < 2
; (() => {
	window.addEventListener('load', () => {
		const sliders = document.querySelectorAll('.swiper-container')
		if (sliders) {
			sliders.forEach(slider => {
				const pagination = slider.querySelector('.swiper-pagination')
				const paginationBullets = slider.querySelectorAll('.swiper-pagination-bullet')
				if (paginationBullets.length < 2 && slider?.swiper?.autoplay) {
					slider.swiper.autoplay.stop()
					pagination.classList.add('hidden')
				}
			})
		}
	})
})();

// ## END Sliders

/*
  It's not possible to stlye the select field (<select></select>),
	so this functions will create a new select field as a normal tags (like div ul li) and that it will be possible to customize it.
  This functions will not tate any params.
  Selecting every field with with class of "select-field".
	Select tag we available in this element.
*/
const selectField = () => {
	// The element that wraps the select tag.
	const containers = document.querySelectorAll('.select-field');
	if (!containers) return;
	// If we need to use more that 1 select field in a page. So we can access all select fields.
	for (
		let container_index = 0;
		container_index < containers.length;
		container_index++
	) {
		// The single element, the select tag wrapper.
		const selectField = containers[container_index];

		const selectFieldIcon = selectField.querySelector('.select-field__icon');
		selectFieldIcon.remove();

		// The select tag itself.
		let selectTag = selectField.querySelector('select');

		// Making it hidden because we don't need it anymore in the client-side.
		selectTag.style.display = 'none';

		// Get the select tag currently selected option.
		const selectTag__selectedOptionText =
			selectTag.options[selectTag.selectedIndex].text;

		// For each Select field, create a element as a select tag but in div tag.
		const selectBox = document.createElement('div');
		selectBox.classList.add('select-box');

		// Head
		const selectBoxHead = document.createElement('div');
		selectBoxHead.classList.add('select-box__head');

		// Head content
		const selectBoxHeadContent = document.createElement('div');
		selectBoxHeadContent.classList.add('select-box__head-content');

		// Head content
		const selectBoxHeadContentTitleIconWrapper = document.createElement('div');
		selectBoxHeadContentTitleIconWrapper.classList.add(
			'flex',
			'gap-2',
			'items-center',
			'max-w-48',
			'overflow-hidden'
		);

		const selectBoxTitle =
			containers[container_index].querySelector('.select-box__title');
		selectBoxTitle.remove();

		const selectBoxAngle = document.createElement('i');
		selectBoxAngle.classList.add('icon-angle-down');

		selectBoxHeadContentTitleIconWrapper.appendChild(selectFieldIcon);
		selectBoxHeadContentTitleIconWrapper.appendChild(selectBoxTitle);

		selectBoxHeadContent.appendChild(selectBoxHeadContentTitleIconWrapper);
		selectBoxHeadContent.appendChild(selectBoxAngle);

		selectBoxHead.appendChild(selectBoxHeadContent);

		selectBox.appendChild(selectBoxHead);
		selectField.appendChild(selectBox);
		selectBox.addEventListener('click', () => {
			selectBox.classList.toggle('open');
		});

		const closeIt = e => {
			if (selectBox.classList.contains('open')) {
				if (!selectBox.contains(e.target)) {
					selectBox.classList.remove('open');
				}
			}
		};

		window.addEventListener('click', e => closeIt(e));
		window.addEventListener('scroll', e => closeIt(e));

		const selectBox__optionsList = document.createElement('ul');
		selectBox__optionsList.classList.add('select-box__options-list');

		// selectBox__optionsList.style.position = "fixed"
		// selectBox__optionsList.style.top = `${selectBoxHead.getBoundingClientRect().top + selectBoxHead.getBoundingClientRect().height}px`;
		// // selectBox__optionsList.style.right = `${selectBoxHead.getBoundingClientRect().right}px`;
		// selectBox__optionsList.style.width = `${selectBoxHead.getBoundingClientRect().width}px`;

		// Looping select tag options
		for (
			let selectTag_index = 0;
			selectTag_index < selectTag.length;
			selectTag_index++
		) {
			const selectTag_option = selectTag[selectTag_index];
			const selectBox_option = document.createElement('li');
			selectBox_option.innerText = selectTag_option.textContent;
			selectBox_option.setAttribute(
				'value',
				selectTag_option.getAttribute('value')
			);
			selectBox_option.classList.add('select-box__option');

			selectBox__optionsList.appendChild(selectBox_option);

			selectBox_option.addEventListener('click', () => {
				// // remove prev active classes.
				// let prevactiveclasses = selectBox__optionsList.querySelectorAll(".select-box__option");
				// for (
				// 	let prevI = 0;
				// 	prevI < prevactiveclasses.length;
				// 	prevI++
				// ) {
				// 	prevactiveclasses[prevI].classList.remove('text-primary')
				// }

				selectTag.value = selectBox_option.getAttribute('value');
				// selectBox_option.classList.toggle('text-primary');
				selectBoxTitle.innerText = selectBox_option.textContent;
				// console.log(selectTag.value);
				// console.log(selectBoxTitle.innerText);
			});
		}

		selectBox.appendChild(selectBox__optionsList);
	}
};

selectField();

// ---

/*
  a component for input type password
  toggle password visibility
*/

// (_=>{
//   const passwordFields = document.querySelectorAll(".password-field")
//   if (passwordFields) {
//     passwordFields.forEach(field => {
//       const input = field.querySelector("input")
//       const toggle = field.querySelector(".password-field__toggle")
//       toggle.classList.add("icon-eye-slash")

//       toggle.addEventListener("click", _=>{
//         input.setAttribute("type", input.getAttribute("type") === "password" ? "text" : "password")
//         if (toggle.classList.contains("icon-eye-slash")) {
//           toggle.classList.add("icon-eye")
//           toggle.classList.remove("icon-eye-slash")
//         } else {
//           toggle.classList.add("icon-eye-slash")
//           toggle.classList.remove("icon-eye")
//         }
//       })
//     })
//   }
// })();

// ---

// radio button handler.
; (() => {
	const radioboxList = document.querySelectorAll('.radiobox');
	if (!radioboxList) return;
	radioboxList.forEach(box => {
		const input = box.querySelector("input[type='radio']");
		input.addEventListener('click', () => {
			radioboxList.forEach(_box => _box.classList.remove('radiobox--active'));
			if (input.checked) box.classList.add('radiobox--active');
		});
	});
})();

// ---

// single product page - account category section handler.
; (() => {
	const form = document.querySelector('#spp-purchase-form');
	if (!form) return;
	const fieldsWrapper = document.querySelector(
		'#spp-purchase-form__field-wrapper'
	);
	const fields = document.querySelectorAll('.account-category-btn__field');
	fields.forEach(field => {
		field.addEventListener('click', () => {
			fieldsWrapper.classList.remove('hidden');
		});
	});
})();

// ---

; (() => {
	const posttypeContent = document.querySelector('.posttype-content');
	if (posttypeContent) easyTab(posttypeContent);
})();

// ---

// comments reply button and form handler.
; (() => {
	const commentBoxArray = document.querySelectorAll('.comment--reply');
	if (!commentBoxArray) return;
	commentBoxArray.forEach(commentBox => {
		const addReplyBtn = commentBox.querySelector(
			'.comment__content .comment__reply-btn'
		);
		const commentForm = commentBox.querySelector(
			'.comment__content .comment__form'
		);
		if (addReplyBtn && commentForm) {
			commentForm.classList.add('hidden');
			addReplyBtn.addEventListener('click', () => {
				commentForm.classList.toggle('hidden');
			});
		}
	});
})();

// ---

; (() => {
	const items = document.querySelectorAll('.order-details__item');
	if (!items) return;
	items.forEach(item => {
		const toggle = item.querySelector('.order-details__item__toggle-content');
		const toggleIcon = item.querySelector('i');
		const extraContent = item.querySelector(
			'.order-details__item__extra-content'
		);
		toggleIcon.classList.add('leading-0')
		extraContent.classList.add('hidden');
		toggle.addEventListener('click', () => {
			extraContent.classList.toggle('hidden');
			toggleIcon.classList.toggle('flip-rotate-y')
		});
	});
})();

// ---

; (() => {
	const dashboardComments = document.querySelector('.dashboard-comments');
	if (dashboardComments) easyTab(dashboardComments);
})();

// ---

// product grid box. // add (...) if title length is more that x.
; (() => {
	const titleArray = document.querySelectorAll('.js-truncate-product-title');
	if (!titleArray) return;
	const truncate = (source, size) => {
		return source.length > size
			? source.slice(0, size - 1) +
			"<span class='text-gray-400 font-light'>…</span>"
			: source;
	};
	titleArray.forEach(title => {
		title.innerHTML = truncate(title.textContent, 45);
	});
})();

// ---

const swiperImageGallery = (
	big_thumb_container_class,
	small_thumbs_container_class
) => {
	if (
		!document.querySelector(big_thumb_container_class) &&
		!document.querySelector(small_thumbs_container_class)
	)
		return;
	new Swiper(big_thumb_container_class, {
		spaceBetween: 8,
		slidesPerView: 1,
		loopedSlides: 3,
		thumbs: {
			swiper: new Swiper(small_thumbs_container_class, {
				spaceBetween: 16,
				slidesPerView: 3,

				// freeMode: true,
				// watchSlidesVisibility: true,
				// watchSlidesProgress: true,

				loopedSlides: 3,
				breakpoints: {
					576: {
						direction: 'vertical',
						// centeredSlides: true,
						// slidesPerView: 3,
						// slidesPerColumn: 1,

						// slidesPerGroup: 1,

						// slidesPerView: 3,
						// slidesPerColumn: 1,
						// slidesPerColumnFill: 'row',
						// noSwiping: false,
					},
				},
			}),
		},
	});
};

window.addEventListener('load', () => {
	swiperImageGallery(
		'.single-product-image-gallery .single-product-image-gallery__big-image',
		'.single-product-image-gallery .single-product-image-gallery__thumb-images'
	);
});

// ---

// TP Alert
// resizing the elements based on the taken height by alert.
; (() => {
	window.addEventListener('load', () => {
		const alert = document.querySelector('.tp-alert');
		const header = document.querySelector('#header');
		const sidebar = document.querySelector('#sidebar');
		const main = document.querySelector('#main');

		if (!alert || !header || !sidebar || !main) return;

		const alert__close = alert.querySelector('.tp-alert__action');
		const alert_style_height = alert.clientHeight + 'px';
		const main_style_paddingTop = getComputedStyle(main).paddingTop;
		const sidebar_style_top = getComputedStyle(sidebar).top;
		const sidebar_style_height = getComputedStyle(sidebar).height;

		header.style.top = alert_style_height;
		main.style.paddingTop = `calc(${main_style_paddingTop} + ${alert_style_height})`;
		sidebar.style.top = `calc(${sidebar_style_top} + ${alert_style_height})`;
		sidebar.style.height = `calc(${sidebar_style_height} - ${alert_style_height})`;

		alert__close.addEventListener('click', () => {
			header.removeAttribute('style');
			sidebar.removeAttribute('style');
			main.removeAttribute('style');
		});
	})
})();

// ---

// customer review
// all comments height get equal based on the higher height.
; (() => {
	window.addEventListener('load', () => {
		const swiperContainer = document.querySelector('.review-slider');
		if (!swiperContainer) return;
		const commentArray = swiperContainer.querySelectorAll('.comment');
		let commentHigherHeight = 0;
		commentArray.forEach(comment => {
			if (comment.clientHeight > commentHigherHeight)
				commentHigherHeight = comment.clientHeight;
		});
		commentArray.forEach(
			comment => (comment.style.height = `${commentHigherHeight}px`)
		);
	});
})();

// ---

; (() => {
	const field = document.querySelector('.purchase-form-quantity__field');
	const plus = document.querySelector('.purchase-form-quantity__plus');
	const negative = document.querySelector('.purchase-form-quantity__negative');

	if (field && plus && negative) {
		plus.addEventListener('click', () => {
			field.value = parseInt(field.value) + 1;
		});
		negative.addEventListener('click', () => {
			if (parseInt(field.value) > 1) {
				field.value = parseInt(field.value) - 1;
			}
		});
	}
})();




// Header announcements menu
; (() => {
	const toggleBtn = document.querySelector('.announcements__toggle-btn')
	const closeBtn = document.querySelector('.announcements__close-btn')
	const menu = document.querySelector('.announcements__menu');
	if (!toggleBtn || !closeBtn || !menu) return;
	easyTab(menu);

	toggleBtn.addEventListener('click', () => menu.classList.toggle('hidden'))
	closeBtn.addEventListener('click', () => menu.classList.add('hidden'))

	window.addEventListener('click', event => {

		if (!menu.contains(event.target) && !toggleBtn.contains(event.target)) {
			menu.classList.add('hidden')
		}
	})
})();


// whyus video player
; (() => {
	new Plyr('#whyus');
})();


// Dashboard orders table
; (() => {
	window.addEventListener('load', () => {
		const headCodeCell = document.querySelector('.do__item-cell__code')
		const headDateCell = document.querySelector('.do__item-cell__date')
		const headPriceCell = document.querySelector('.do__item-cell__price')
		// const headStatusCell = document.querySelector('.do__item-cell__status')
		// const headDeliveredCell = document.querySelector('.do__item-cell__delivered')
		const headButtonsCell = document.querySelector('.do__item-cell__buttons')

		const itemCodeCells = document.querySelectorAll('.do__item-cell__code');
		const itemDateCells = document.querySelectorAll('.do__item-cell__date');
		const itemPriceCells = document.querySelectorAll('.do__item-cell__price');
		// const itemStatusCells = document.querySelectorAll('.do__item-cell__status');
		// const itemDeliveredCells = document.querySelectorAll('.do__item-cell__delivered');
		const itemButtonsCells = document.querySelectorAll('.do__item-cell__buttons');

		if (
			!headCodeCell ||
			!headDateCell ||
			!headPriceCell ||
			// !headStatusCell ||
			// !headDeliveredCell ||
			!headButtonsCell ||
			!itemCodeCells ||
			!itemDateCells ||
			!itemPriceCells ||
			// !itemStatusCells ||
			// !itemDeliveredCells ||
			!itemButtonsCells
		) { return }

		const findLargestIndexFromAnArray = array => {
			let largest = array[0];
			for (let i = 0; i <= largest; i++) {
				if (array[i] > largest) {
					largest = array[i];
				}
			}
			return largest;
		}

		const getAndSetLargestWidth = (cells, headCell) => {
			let widths = [];
			cells.forEach(cell => {
				widths.push(cell.offsetWidth);
			});
			largestWidth = findLargestIndexFromAnArray(widths);
			cells.forEach(cell => cell.style.minWidth = largestWidth + 16 + 'px');
			headCell.style.minWidth = largestWidth + 16 + 'px';
		}

		getAndSetLargestWidth(itemCodeCells, headCodeCell)
		getAndSetLargestWidth(itemDateCells, headDateCell)
		getAndSetLargestWidth(itemPriceCells, headPriceCell)
		// getAndSetLargestWidth(itemStatusCells, headStatusCell)
		// getAndSetLargestWidth(itemDeliveredCells, headDeliveredCell)
		getAndSetLargestWidth(itemButtonsCells, headButtonsCell)
	})
})();

const menu_item = document.querySelector('.nav-menu-item');
if (menu_item) {
	let lists = document.querySelectorAll(".base-category");
	let tabButton = document.querySelectorAll(".base-category .category div");
	let contents = document.querySelectorAll(".sub_category");
	let sub_categories = document.getElementById('sub-categories');
	let menu = document.querySelector('.menu');
	let hmenu = document.querySelector('.hidden_menu');
	if (lists[0] || lists[1]){
		lists[0].onclick = e => {
			const id = e.target.dataset.id;
			let response_id = document.querySelectorAll(".base-category .sub_category");


			if (include(e.target.classList, 'active_link')) {
				tabButton.forEach(btn => {
					btn.classList.remove("active_link");
					contents.forEach(content => {
						content.classList.remove("active_category");
					});
				});
			} else {
				if (id) {
					tabButton.forEach(btn => {
						btn.classList.remove("active_link");
					});
					e.target.classList.add("active_link");

					contents.forEach(content => {
						content.classList.remove("active_category");
					});
					const element = document.getElementById(id);
					element.classList.add("active_category");
					response_id.forEach(element => {
						element.style = "height:0";
						if (element.getAttribute('data-response-id') == id) {
							element.classList.add("active_category");
							setTimeout(function () {
								element.style = `height:auto`;
							}, 0);
						}
					});

				}
			}
		}
		lists[1].onmouseover = e => {
			let tabButton = document.querySelectorAll(".hidden_menu .base-category .category div");
			let contents = document.querySelectorAll(".hidden_menu .sub_category");

			const id = e.target.dataset.id;
			let response_id = document.querySelectorAll(".hidden_menu .base-category .sub_category");

			if (id) {
				tabButton.forEach(btn => {
					btn.classList.remove("active_link");
				});
				if (e.target.tagName == 'DIV')
					e.target.classList.add("active_link");

				contents.forEach(content => {
					content.classList.remove("active_category");
				});
				const element = document.getElementById(`c${id}`);
				element.classList.add("active_category");
				response_id.forEach(element => {
					element.style = "height:0";
					if (element.getAttribute('data-response-id') == id) {
						element.classList.add("active_category");
						setTimeout(function () {
							element.style = `height:auto`;
						}, 100);
					}
				});

			}
		}
	}



	menu_item.addEventListener('mouseover', function () {

		if (window.innerWidth > 1024) {
			hmenu.style = 'opacity : 1;display:block ';
		}
	});

	menu_item.addEventListener('click', function () {
		if (window.innerWidth < 1024) {
			// menu.style = 'opacity : 1 ; z-index : 1';
			if (include(menu.classList, 'r_menu_height')) {
				menu.classList.remove('r_menu_height');
			} else {
				menu.classList.add('r_menu_height');
			}
		}
	});

	if (hmenu){
		hmenu.addEventListener('mouseleave', function () {
			if (window.innerWidth > 1024) {
				hmenu.style = 'opacity : 0 ; display:none';
			}

		});
	}
}
function include(arr, obj) {
	for (var i = 0; i < arr.length; i++) {
		if (arr[i] == obj) return true;
	}
}

