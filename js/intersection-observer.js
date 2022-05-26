const elements = document.querySelectorAll('.fade-in');

const options = {
	root: null,
	threshold: 1
};

const observer = new IntersectionObserver(function(entries, observer) {
	entries.forEach(entry => {
		if(!entry.isIntersecting) {
			return;
		}
		entry.target.classList.toggle('show');
		observer.unobserve(entry.target);
	})
}, options);

elements.forEach(element => {
	observer.observe(element);
});

