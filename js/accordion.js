/**
 * File accordion.js.
 *
 * Handles toggling accordions and expanding/collapsing content.
 */
 ( function() {
	const accordions = document.querySelectorAll( '.site-accordion' );

	accordions.forEach( accordion => {
		const toggle = accordion.querySelector( '.site-accordion__toggle' );

		toggle.addEventListener( 'click', function() {
			// accordions.forEach( item => {
			// 	if ( accordion != item ) {
			// 		item.classList.remove('site-accordion--expanded');
			// 	}
			// });

			accordion.classList.toggle( 'site-accordion--expanded' );
			if ( accordion.classList.contains( 'site-accordion--expanded' ) ) {
				this.innerText = 'Read Less';
			} else {
				this.innerText = 'Read More';
			}
		});
	});
}() );