<?php

// Add admin styles for portfolios
add_action( 'admin_enqueue_scripts', 'load_admin' );
function load_admin() {
    wp_enqueue_style( 'admin-styles', get_template_directory_uri() . '/assets/css/admin.css', false, '', 'all' );
    // Registers and enqueues the required javascript.
    wp_register_script( 'admin-js', get_template_directory_uri() . '/assets/js/admin.js', array( 'jquery' ) );
    wp_localize_script( 'admin-js', 'meta_image',
        array(
            'title' => 'Choose or Upload Image',
            'button' => 'Select Image',
            'ajaxurl' => admin_url( 'admin-ajax.php' )
        )
    );
    wp_enqueue_script( 'admin-js' );
    wp_enqueue_media();
}

add_action('admin_init','darkmoon_photo_init');
function darkmoon_photo_init() {
    if(isset($_GET['action']) && $_GET['action'] === "edit") {
        // Add custom meta boxes to display photo management
        $post_id = $_GET['post'] ? $_GET['post'] : $_POST['post_ID'];
        $page = get_page_by_title('Photos');
        $page_id = strval($page->ID);
        // checks for post/page ID
        if ($post_id === $page_id) {
            remove_post_type_support( 'page', 'editor');
            add_action( 'add_meta_boxes', 'photos_meta_box', 1 );
            function photos_meta_box($post) {
                add_meta_box(
                    'event', 
                    'Event', 
                    'events',
                    'page', 
                    'normal', 
                    'low'
                );
                add_meta_box(
                    'lifestyle', 
                    'Lifestyle', 
                    'lifestyle',
                    'page', 
                    'normal', 
                    'low'
                );
                add_meta_box(
                    'portrait', 
                    'Portrait', 
                    'portrait',
                    'page', 
                    'normal', 
                    'low'
                );
                add_meta_box(
                    'scenery', 
                    'Scenery', 
                    'scenery',
                    'page', 
                    'normal', 
                    'low'
                );
            }
            function events($post) {
                // Use nonce for verification
                wp_nonce_field( 'photos', 'photos_noncename' );

                $event_photos = get_post_meta($post->ID,'events',true);

                update_post_meta( $post->ID, 'events', '');

                echo '<div data-post="'.$post->ID.'" data-type="events">';
                    echo '<p>Use the button below to upload photos. Drag and drop photos to change the order.</p>';
                    echo '<a href="#" class="button upload-image upload-photo">Upload Photos</a>';
                    if ( !empty($event_photos) ) {
                        echo '<ul class="photoWrap sortable" data-post="'.$post->ID.'" data-type="events">';
                            foreach( $event_photos as $key => $photo ) { ?>
                                <li class="photo ui-state-default" data-key="<?php echo $key; ?>" data-order="<?php echo $photo; ?>">
                                    <img src="<?php echo $photo; ?>" alt="" />
                                    <span class="button button-remove remove-photo">X</span>
                                </li>
                            <?php }
                        echo '</ul>';
                    } else {
                        echo '<ul class="photoWrap sortable" data-post="'.$post->ID.'" data-type="events"></ul>';
                    }
                echo '</div>';
            }
            function lifestyle($post) {
                // Use nonce for verification
                wp_nonce_field( 'photos', 'photos_noncename' );

                $lifestyle_photos = get_post_meta($post->ID,'lifestyle',true);

                echo '<div data-post="'.$post->ID.'" data-type="lifestyle">';
                    echo '<p>Use the button below to upload photos. Drag and drop photos to change the order.</p>';
                    echo '<a href="#" class="button upload-image upload-photo">Upload Photos</a>';
                    if ( !empty($lifestyle_photos) ) {
                        echo '<ul class="photoWrap sortable" data-post="'.$post->ID.'" data-type="lifestyle">';
                            foreach( $lifestyle_photos as $key => $photo ) { ?>
                                <li class="photo ui-state-default" data-key="<?php echo $key; ?>" data-order="<?php echo $photo; ?>">
                                    <img src="<?php echo $photo; ?>" alt="" />
                                    <span class="button button-remove remove-photo">X</span>
                                </li>
                            <?php }
                        echo '</ul>';
                    } else {
                        echo '<ul class="photoWrap sortable" data-post="'.$post->ID.'" data-type="lifestyle"></ul>';
                    }
                echo '</div>';
            }
            function portrait($post) {
                // Use nonce for verification
                wp_nonce_field( 'photos', 'photos_noncename' );

                $portrait_photos = get_post_meta($post->ID,'portrait',true);

                echo '<div data-post="'.$post->ID.'" data-type="portrait">';
                    echo '<p>Use the button below to upload photos. Drag and drop photos to change the order.</p>';
                    echo '<a href="#" class="button upload-image upload-photo">Upload Photos</a>';
                    if ( !empty($portrait_photos) ) {
                        echo '<ul class="photoWrap sortable" data-post="'.$post->ID.'" data-type="portrait">';
                            foreach( $portrait_photos as $key => $photo ) { ?>
                                <li class="photo ui-state-default" data-key="<?php echo $key; ?>" data-order="<?php echo $photo; ?>">
                                    <img src="<?php echo $photo; ?>" alt="" />
                                    <span class="button button-remove remove-photo">X</span>
                                </li>
                            <?php }
                        echo '</ul>';
                    } else {
                        echo '<ul class="photoWrap sortable" data-post="'.$post->ID.'" data-type="portrait"></ul>';
                    }
                echo '</div>';
            }
            function scenery($post) {
                // Use nonce for verification
                wp_nonce_field( 'photos', 'photos_noncename' );

                $scenery_photos = get_post_meta($post->ID,'scenery',true);

                echo '<div data-post="'.$post->ID.'" data-type="scenery">';
                    echo '<p>Use the button below to upload photos. Drag and drop photos to change the order.</p>';
                    echo '<a href="#" class="button upload-image upload-photo">Upload Photos</a>';
                    if ( !empty($scenery_photos) ) {
                        echo '<ul class="photoWrap sortable" data-post="'.$post->ID.'" data-type="scenery">';
                            foreach( $scenery_photos as $key => $photo ) { ?>
                                <li class="photo ui-state-default" data-key="<?php echo $key; ?>" data-order="<?php echo $photo; ?>">
                                    <img src="<?php echo $photo; ?>" alt="" />
                                    <span class="button button-remove remove-photo">X</span>
                                </li>
                            <?php }
                        echo '</ul>';
                    } else {
                        echo '<ul class="photoWrap sortable" data-post="'.$post->ID.'" data-type="scenery"></ul>';
                    }
                echo '</div>';
            }
        }
    }
}
// ajax response to save download track
add_action('wp_ajax_setImage', 'setCustomImage');
add_action('wp_ajax_nopriv_setImage', 'setCustomImage');
function setCustomImage($post_id) {
    // get response variables
    $postID = (isset($_GET['postID'])) ? $_GET['postID'] : 0;
    $imageURL = (isset($_GET['fieldVal'])) ? $_GET['fieldVal'] : 0;
    $type = (isset($_GET['type'])) ? $_GET['type'] : 0;
    // get saved photos
    $photos = get_post_meta($postID, $type, true);
    // save photos
    if(!empty($imageURL)) {
        // if( $type === "events" || $type === "lifestyle" || $type === "portrait" || $type === "scenery" ) {
               
        // } else {
        //     update_post_meta( $postID, $type, $imageURL);
        // }
        if(!empty($photos)) {
            $image[] = $imageURL;
            $photos = array_merge($photos, $image);
            update_post_meta( $postID, $type, $photos);
        } else {
            $new[] = $imageURL;
            update_post_meta( $postID, $type, $new);
        }
    }
}
// ajax response to save download track
add_action('wp_ajax_removeItem', 'removeItem');
add_action('wp_ajax_nopriv_removeItem', 'removeItem');
function removeItem() {
    $postID = (isset($_GET['postID'])) ? $_GET['postID'] : 0;
    $key = (isset($_GET['key'])) ? $_GET['key'] : 0;
    $type = (isset($_GET['type'])) ? $_GET['type'] : 0;

    if(!empty($key) & $key !== "0") {
        $array = get_post_meta($postID, $type, true );
        unset($array[$key]);
        update_post_meta($postID, $type, $array);
    }
}
// ajax response to save order
add_action('wp_ajax_setOrder', 'setOrder');
add_action('wp_ajax_nopriv_setOrder', 'setOrder');
function setOrder() {
    $order = str_replace( array( '[', ']','"' ),'', $_GET['order'] );
    $postID = (isset($_GET['postID'])) ? $_GET['postID'] : 0;
    $type = (isset($_GET['type'])) ? $_GET['type'] : 0;
    update_post_meta($postID, $type, $order );
}
// ajax response to save order
add_action('wp_ajax_photoTab', 'photoTab');
add_action('wp_ajax_nopriv_photoTab', 'photoTab');
function photoTab() {
    $postID = (isset($_GET['postID'])) ? $_GET['postID'] : 0;
    $type = (isset($_GET['type'])) ? $_GET['type'] : 0;
    
    $photos = get_post_meta($postID,$type,true);
    if(!empty($photos)) {
        foreach($photos as $photo) {
            echo '<img class="m-item" src="'.$photo.'" alt="" />';
        }
    }
}