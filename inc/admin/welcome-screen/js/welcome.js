jQuery(document).ready(function() {

	/* If there are required actions, add an icon with the number of required actions in the About Pixova page -> Actions required tab */
    var pixova_nr_actions_required = pixovaLiteWelcomeScreenObject.nr_actions_required;

    if ( (typeof pixova_nr_actions_required !== 'undefined') && (pixova_nr_actions_required != '0') ) {
        jQuery('li.high-star-w-red-tab a').append('<span class="high-star-actions-count">' + pixova_nr_actions_required + '</span>');
    }

    /* Dismiss required actions */
    jQuery(".pixova-dismiss-required-action").click(function(){

        var id= jQuery(this).attr('id');
        console.log(id);
        jQuery.ajax({
            type       : "GET",
            data       : { action: 'pixova_lite_dismiss_required_action',dismiss_id : id },
            dataType   : "html",
            url        : pixovaLiteWelcomeScreenObject.ajaxurl,
            beforeSend : function(data,settings){
				jQuery('.high-star-tab-pane#actions_required h1').append('<div id="temp_load" style="text-align:center"><img src="' + pixovaLiteWelcomeScreenObject.template_directory + '/inc/admin/welcome-screen/img/ajax-loader.gif" /></div>');
            },
            success    : function(data){
				jQuery("#temp_load").remove(); /* Remove loading gif */
                jQuery('#'+ data).parent().remove(); /* Remove required action box */

                var pixova_lite_actions_count = jQuery('.high-star-actions-count').text(); /* Decrease or remove the counter for required actions */
                if( typeof pixova_lite_actions_count !== 'undefined' ) {
                    if( pixova_lite_actions_count == '1' ) {
                        jQuery('.high-star-actions-count').remove();
                        jQuery('.high-star-tab-pane#actions_required').append('<p>' + pixovaLiteWelcomeScreenObject.no_required_actions_text + '</p>');
                    }
                    else {
                        jQuery('.high-star-actions-count').text(parseInt(pixova_lite_actions_count) - 1);
                    }
                }
            },
            error     : function(jqXHR, textStatus, errorThrown) {
                console.log(jqXHR + " :: " + textStatus + " :: " + errorThrown);
            }
        });
    });

	/* Tabs in welcome page */
	function pixova_welcome_page_tabs(event) {
		jQuery(event).parent().addClass("active");
        jQuery(event).parent().siblings().removeClass("active");
        var tab = jQuery(event).attr("href");
        jQuery(".high-star-tab-pane").not(tab).css("display", "none");
        jQuery(tab).fadeIn();
	}

	var pixova_actions_anchor = location.hash;

	if( (typeof pixova_actions_anchor !== 'undefined') && (pixova_actions_anchor != '') ) {
		pixova_welcome_page_tabs('a[href="'+ pixova_actions_anchor +'"]');
	}

    jQuery(".high-star-nav-tabs a").click(function(event) {
        event.preventDefault();
		pixova_welcome_page_tabs(this);
    });

		/* Tab Content height matches admin menu height for scrolling purpouses */
	 $tab = jQuery('.high-star-tab-content > div');
	 $admin_menu_height = jQuery('#adminmenu').height();
	 if( (typeof $tab !== 'undefined') && (typeof $admin_menu_height !== 'undefined') )
	 {
		 $newheight = $admin_menu_height - 180;
		 $tab.css('min-height',$newheight);
	 }

});
