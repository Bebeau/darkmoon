var ajaxurl = meta_image.ajaxurl;

var init = {
	onReady: function() {
		init.imageUploader();
		init.ordering();
		init.removeItem();
	},
	imageUploader: function() {
		var meta_image_frame;
     	// Runs when the image button is clicked.
	    jQuery('.upload-image').click(function(e){

	    	// Prevents the default action from occuring.
	        e.preventDefault();
	        var button = jQuery(this);
	        var id = jQuery(this).parent().attr("data-post");
	        var type = jQuery(this).parent().attr("data-type");
	        var key = jQuery('.photoWrap').children().length;

	        // Sets up the media library frame
	        meta_image_frame = wp.media.frames.meta_image_frame = wp.media({
	            title: meta_image.title,
	            button: { text:  meta_image.button },
	            library: { type: 'image, video' },
	            multiple: false
	        });

	        // Opens the media library frame.
	        meta_image_frame.open();

	        // Runs when an image is selected.
	        meta_image_frame.on('select', function(){

	            // Grabs the attachment selection and creates a JSON representation of the model.
	            var media_attachment = meta_image_frame.state().get('selection').first().toJSON();

            	jQuery('div[data-type="'+type+'"] .photoWrap').append('<li class="photo ui-state-default" data-order="'+key+'"><img src="'+media_attachment.url+'" alt="" /><span class="button button-remove remove-photo">X</span></li>' );
            	init.saveImage(id, type, media_attachment.url);

	            // Opens the media library frame.
	        	meta_image_frame.close();

	        });

	    });
	},
	saveImage: function(id, type, url) {
        jQuery.ajax({
            url: ajaxurl,
            type: "GET",
            data: {
            	postID: id,
            	type: type,
                fieldVal: url,
                action: 'setImage'
            },
            dataType: 'html',
            success : function() {
            	init.removeItem();
            },
            error : function(jqXHR, textStatus, errorThrown) {
                window.alert(jqXHR + " :: " + textStatus + " :: " + errorThrown);
            }
        }); 
    },
    removeItem: function(postID, key, type) {
		jQuery.ajax({
	        url: ajaxurl,
	        type: "GET",
	        data: {
	            action: 'removeItem',
	            postID: postID,
	            type: type,
	            key: key
	        },
	        dataType: 'html',
	        error : function(jqXHR, textStatus, errorThrown) {
	            window.alert(jqXHR + " :: " + textStatus + " :: " + errorThrown);
	        }
	    });
	    jQuery(".button-remove").click(function(e){
            e.preventDefault();
            var postID = jQuery(this).parent().parent().attr("data-post");
            var type = jQuery(this).parent().parent().attr("data-type");
            var key = jQuery(this).parent().attr("data-key");

            jQuery(this).parent().remove();
            init.removeItem(postID, key, type);
            init.imageUploader();
        });
	},
    saveOrder: function(order, type, postID) {
        jQuery.ajax({
            url: ajaxurl,
            type: "GET",
            data: {
            	order : order,
            	type: type,
            	postID: postID,
                action: 'setOrder'
            },
            dataType: 'JSON'
        });
    },
    ordering: function() {
    	jQuery( ".sortable" ).sortable({
			placeholder: "ui-state-highlight",
			// Do callback function on jquery ui drop
			update: function( event, ui ) {
				var postID = jQuery(this).attr("data-post");
				var type = jQuery(this).attr("data-type");

				var order = [];
				jQuery('div[data-type="'+type+'"] .sortable li').each(function() {
					order.push(jQuery(this).attr("data-order"));
				});

				init.saveOrder(order, type, postID);
			}
		});
		jQuery( ".sortable" ).disableSelection();
    },
};

jQuery(document).ready(function() {
	init.onReady();
});