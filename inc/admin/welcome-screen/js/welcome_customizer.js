jQuery(document).ready(function() {
    var pixova_aboutpage = pixovaLiteWelcomeScreenCustomizerObject.aboutpage;
    var pixova_nr_actions_required = pixovaLiteWelcomeScreenCustomizerObject.nr_actions_required;

    /* Number of required actions */
    if ((typeof pixova_aboutpage !== 'undefined') && (typeof pixova_nr_actions_required !== 'undefined') && (pixova_nr_actions_required != '0')) {
        jQuery('#accordion-section-themes .accordion-section-title').append('<a href="' + pixova_aboutpage + '"><span class="high-star-actions-count">' + pixova_nr_actions_required + '</span></a>');
    }


});
