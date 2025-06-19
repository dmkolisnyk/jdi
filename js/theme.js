document.getElementById('contact-form').addEventListener('submit', function (e) {
    const turnstileResponse = document.querySelector('input[name="cf-turnstile-response"]').value;
        if (!turnstileResponse) {
            e.preventDefault();
            alert('Please complete the captcha verification.');
    }
});

const swiper = new Swiper(".reviews-carousel", {
    slidesPerView: 3,
	pagination: {
        el: ".swiper-pagination",
        clickable: true,
    },
	breakpoints: {
		320: {
			slidesPerView: 1,
		},
		1024: {
			slidesPerView: 3,
			spaceBetween: 32,
		}
	}
});
