
/**
 * Upsell notice for theme
 */


( function( $ ) {

	if ('undefined' !== typeof prefixL10n) {


		var upsellLink = $('<a class="upsell-link"></a>')
				.attr('href', prefixL10n.prefixUpsellURL)
				.attr('target', '_blank')
				.text(prefixL10n.prefixUpsellLabel)
			;

		var documentatLink = $('<a class="doc-link"></a>')
				.attr('href', prefixL10n.prefixDocURL)
				.attr('target', '_blank')
				.text(prefixL10n.prefixDocLabel)
			;

		var supportLink = $('<a class="review-link"></a>')
				.attr('href', prefixL10n.prefixSupportURL)
				.attr('target', '_blank')
				.text(prefixL10n.prefixSupportLabel)
			;


		$('#customize-theme-controls > ul').prepend('<li class="accordion-section upsell-links">');

		// $('.upsell-links').prepend( documentatLink );
		// $('.upsell-links').prepend( supportLink );
		// $('.upsell-links').prepend( upsellLink );
		$('.preview-notice').append( upsellLink );

	}

}) ( jQuery );
