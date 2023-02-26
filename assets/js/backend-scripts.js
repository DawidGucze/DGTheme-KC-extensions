jQuery( document ).ready( function() {

	var tab = jQuery( '.kc-views-dgtkce_slider .section-label' ),
		qty = tab.length,
	    text = jQuery( tab ).text();

	function replaceTabText() {

		for ( var i = 0; i < qty; i++ ) {

			jQuery( tab ).eq( i ).text( jQuery( tab ).eq( i ).text().replace( 'New Slide', 'Slide ' + ( i + 1 ) ) );
			jQuery( tab ).eq( i ).text( jQuery( tab ).eq( i ).text().replace( 'New dgtkce_slide', 'Slide ' + ( i + 1 ) ) );

		}

	}

	replaceTabText();

	jQuery( '.kc-views-dgtkce_slider .add-section' ).click( function() {
		setTimeout( function() {
			var clicked_tab = jQuery( '.kc-views-dgtkce_slider .section-label' ),
				clicked_qty = clicked_tab.length;

			for ( var i = 0; i < clicked_qty; i++ ) {

				jQuery( clicked_tab ).eq( i ).text( jQuery( clicked_tab ).eq( i ).text().replace( 'New Slide', 'Slide ' + ( i + 1 ) ) );
				jQuery( clicked_tab ).eq( i ).text( jQuery( clicked_tab ).eq( i ).text().replace( 'New dgtkce_slide', 'Slide ' + ( i + 1 ) ) );

			}
		}, 100 );
	});

jQuery( document ).on('mouseover', '.kc-views-dgtkce_slider .kc-add-elements-inner', function() {
	setTimeout( function() {
		jQuery('.kc-adding-elements .kc-components-categories .dgtheme').attr('style', 'display: none');
		jQuery('.kc-adding-elements .kc-element-item[data-name="dgtkce_title"]').attr('style', 'display: block !important');
		jQuery('.kc-adding-elements .kc-element-item[data-name="dgtkce_description"]').attr('style', 'display: block !important');
		jQuery('.kc-adding-elements .kc-element-item[data-name="dgtkce_button"]').attr('style', 'display: block !important');
	}, 500 );
});
jQuery( document ).on('click', '.kc-views-dgtkce_slider .kc-vs-control .add', function() {
	jQuery('.kc-adding-elements .kc-components-categories .dgtheme').attr('style', 'display: none');
	jQuery('.kc-adding-elements .kc-element-item[data-name="dgtkce_title"]').attr('style', 'display: block !important');
	jQuery('.kc-adding-elements .kc-element-item[data-name="dgtkce_description"]').attr('style', 'display: block !important');
	jQuery('.kc-adding-elements .kc-element-item[data-name="dgtkce_button"]').attr('style', 'display: block !important');
});

});