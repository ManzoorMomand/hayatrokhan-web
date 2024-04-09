(function ($) {

	"use strict";

	$(".scroll-top").hide();

	// Scroll event to show/hide scroll-top button
	$(window).on("scroll", function () {
		if ($(this).scrollTop() > 300) {
			$(".scroll-top").fadeIn();
		} else {
			$(".scroll-top").fadeOut();
		}
	});

	// Scroll-top button click event
	$(".scroll-top").on("click", function () {
		$("html, body").animate({
			scrollTop: 0,
		}, 700);
	});

	// Document ready function for initializing select2
	$(document).ready(function () {
		// Make sure select2 is included in your project
		// and the .select2 class is applied to the correct elements
		$('.select2').select2({
			theme: "bootstrap"
		});
	});

	// Initialize WOW.js for animations
	new WOW().init();

	// Magnific Popup for video buttons
	$('.video-button').magnificPopup({
		type: 'iframe',
		gallery: {
			enabled: true
		}
	});

	// Magnific Popup for images
	$('.magnific').magnificPopup({
		type: 'image',
		gallery: {
			enabled: true
		}
	});

	// AcmeTicker for news ticker
	$('.my-news-ticker').AcmeTicker({
		type: 'typewriter',
		direction: 'right',
		speed: 50,
		controls: {
			prev: $('.acme-news-ticker-prev'),
			toggle: $('.acme-news-ticker-pause'),
			next: $('.acme-news-ticker-next')
		}
	});

	// Owl Carousel for related posts
	$('.related-post-carousel').owlCarousel({
		loop: false,
		autoplay: true,
		autoplayHoverPause: true,
		autoplaySpeed: 1500,
		smartSpeed: 1500,
		margin: 30,
		mouseDrag: true,
		nav: true,
		dots: true,
		navText: ["<i class='fas fa-angle-left'></i>", "<i class='fas fa-angle-right'></i>"],
		responsive: {
			0: {
				items: 1
			},
			600: {
				items: 1
			},
			768: {
				items: 1
			},
			992: {
				items: 2
			}
		}
	});

	// Owl Carousel for video carousel
	$('.video-carousel').owlCarousel({
		loop: false,
		autoplay: true,
		autoplayHoverPause: true,
		autoplaySpeed: 1500,
		smartSpeed: 1500,
		margin: 30,
		mouseDrag: true,
		nav: true,
		dots: true,
		navText: ["<i class='fas fa-angle-left'></i>", "<i class='fas fa-angle-right'></i>"],
		responsive: {
			0: {
				items: 1
			},
			600: {
				items: 2
			},
			768: {
				items: 3
			},
			992: {
				items: 4
			}
		}
	});

})(jQuery);
