"use strict";
// Open close dropdown on click
$("li.dropdown").click(function () {
	if ($(this).hasClass("open")) {
		$(this).find(".dropdown-menu").slideUp("fast");
		$(this).removeClass("open");
	} else {
		$(this).find(".dropdown-menu").slideDown("fast");
		$(this).toggleClass("open");
	}
});
// Close dropdown on mouseleave
$("li.dropdown").mouseleave(function () {
	$(this).find(".dropdown-menu").slideUp("fast");
	$(this).removeClass("open");
});
// Navbar toggle
$(".navbar-toggle").click(function () {
	$(".navbar-collapse").toggleClass("collapse").slideToggle("fast");
});
// Navbar colors

// Font colors
$("#font-colors > .btn").click(function () {
	if ($(this).is("#white")) {
		$(".navbar .fa, .link, a").css("color", "white");
		$(".icon-bar").css("background", "white");
	} else if ($(this).is("#black")) {
		$(".navbar .fa, .link, a").css("color", "black");
		$(".icon-bar").css("background", "black");
	}
});
// edges
$("#edges > .btn").click(function () {
	if ($(this).is("#rounded")) {
		$(".navbar, .form-control").css("border-radius", "8px");
		if ($(window).width() > 768) {
			$(".dropdown-menu").css({
				"border-bottom-right-radius": "8px",
				"border-bottom-left-radius": "8px"
			});
		}
	} else if ($(this).is("#square")) {
		$(".navbar, .form-control").css("border-radius", "0");
		$(".dropdown-menu").css({
			"border-bottom-right-radius": "0",
			"border-bottom-left-radius": "0"
		});
	}
});
