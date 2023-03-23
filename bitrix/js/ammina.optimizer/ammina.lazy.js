const observer = new IntersectionObserver((entries, observer) => {
	entries.forEach(entry => {
		if (entry.isIntersecting) {
			entry.target.src = entry.target.dataset.src;
			observer.unobserve(entry.target);
			entry.target.removeAttribute('data-src');
			entry.target.classList.remove('ammina-lazy');
			entry.target.classList.remove('ammina-lazy-img-src');
		}
	})
}, {threshold: '#PERSENT_DISPLAY_IMAGE#'});
const observerSrcSet = new IntersectionObserver((entries, observer) => {
	entries.forEach(entry => {
		if (entry.isIntersecting) {
			entry.target.srcset = entry.target.dataset.srcset;
			observer.unobserve(entry.target);
			entry.target.removeAttribute('data-srcset');
			entry.target.classList.remove('ammina-lazy');
			entry.target.classList.remove('ammina-lazy-srcset');
		}
	})
}, {threshold: '#PERSENT_DISPLAY_IMAGE#'});
const observerBg = new IntersectionObserver((entries, observer) => {
	entries.forEach(entry => {
		if (entry.isIntersecting) {
			entry.target.style.backgroundImage = "url('" + entry.target.dataset.backgroundImage + "')";
			observer.unobserve(entry.target);
			entry.target.removeAttribute('data-background-image');
			entry.target.classList.remove('ammina-lazy');
			entry.target.classList.remove('ammina-lazy-style');
		}
	})
}, {threshold: '#PERSENT_DISPLAY_IMAGE#'});
const observerIFrame = new IntersectionObserver((entries, observer) => {
	entries.forEach(entry => {
		if (entry.isIntersecting) {
			entry.target.src = entry.target.dataset.src;
			observer.unobserve(entry.target);
			entry.target.removeAttribute('data-src');
			entry.target.classList.remove('ammina-lazy');
			entry.target.classList.remove('ammina-lazy-iframe');
		}
	})
}, {threshold: '#PERSENT_DISPLAY_IFRAME#'});

function initAmminaLazy() {
	document.querySelectorAll('.ammina-lazy-img-src').forEach(el => {
		if (!el.classList.contains('ammina-lazsos-img-src')) {
			el.classList.add('ammina-lazsos-img-src');
			observer.observe(el);
		}
	});
	document.querySelectorAll('.ammina-lazy-srcset').forEach(el => {
		if (!el.classList.contains('ammina-lazsos-srcset')) {
			el.classList.add('ammina-lazsos-srcset');
			observerSrcSet.observe(el);
		}
	});
	document.querySelectorAll('.ammina-lazy-style').forEach(el => {
		if (!el.classList.contains('ammina-lazsos-style')) {
			el.classList.add('ammina-lazsos-style');
			observerBg.observe(el);
		}
	});
	document.querySelectorAll('.ammina-lazy-iframe').forEach(el => {
		if (!el.classList.contains('ammina-lazsos-iframe')) {
			el.classList.add('ammina-lazsos-iframe');
			observerIFrame.observe(el);
		}
	});
}

window.onload = () => {
	initAmminaLazy();
}