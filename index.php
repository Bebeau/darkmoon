<?php get_header(); ?>

	<section id="banner" data-parallax='{"y" : 230, "smoothness": 1}'>
		<?php

		echo '<div id="logo"><img class="svg" src="'.get_bloginfo('template_directory').'/assets/images/logo.svg" alt="" /></div>';

		echo '<div id="night">';
			echo '<div id="moon"></div>';
			echo '<div id="particles-js"></div>';
			echo '<div id="earth"></div>';
		echo '</div>';

		echo '<div id="clouds"></div>';

		echo '<div id="day" class="out">';
			echo '<div id="sun"></div>';
			echo '<div id="trees"></div>';
		echo '</div>';

		echo '<div id="bg"></div>';

	echo '</section>';

	echo '<section id="about">';
		$args = array(
		   	'pagename' => 'about'
		);
 
		$query = new WP_Query( $args );
		 
		if ( $query->have_posts() ) {
		    while ( $query->have_posts() ) {
		        $query->the_post();
		        $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID), 'large' ); 
		        if(!empty($image)) {
		        	echo '<article style="background:url('.$image[0].') no-repeat scroll center / cover" data-animation="slideInLeft"></article>';
		        } else {
		        	echo '<article class="default_about" data-animation="slideUp"></article>';
		        }
		 		echo '<article class="copy" data-animation="slideUp">';
		 			echo '<div class="outer">';
			 			echo '<div class="inner">';
					        the_title('<h3>','</h3>');
					    	the_content();
					    echo '</div>';
					echo '</div>';
			    echo '</article>';
		    }
		}
		wp_reset_postdata();

	echo '</section>';

	echo '<section id="video" data-animation="slideUp">';
		echo '<iframe src="https://www.youtube.com/embed/Z2Dt26mGUkY" frameborder="0" allowfullscreen></iframe>';
	echo '</section>';

	echo '<section id="photos">';
		echo '<div class="outer">';
			echo '<div class="inner">';

				echo '<h3 data-animation="slideUp">Photos</h3>';
				$args = array(
				   	'pagename' => 'photos'
				);
		 
				$query = new WP_Query( $args );
				 
				if ( $query->have_posts() ) {
				    while ( $query->have_posts() ) {
				    	$query->the_post();


				    	echo '<div class="mobileShow">';

				    		$events_photos = get_post_meta($post->ID,'events',true);
							if(!empty($event_photos)) {
								foreach($event_photos as $photo) {
									echo '<img class="m-item" src="'.$photo.'" alt="" />';
								}
							}

				    		$lifestyle_photos = get_post_meta($post->ID,'lifestyle',true);
							if(!empty($lifestyle_photos)) {
								foreach($lifestyle_photos as $photo) {
									echo '<img class="m-item" src="'.$photo.'" alt="" />';
								}
							}

							$portrait_photos = get_post_meta($post->ID,'portrait',true);
							if(!empty($portrait_photos)) {
								foreach($portrait_photos as $photo) {
									echo '<img class="m-item" src="'.$photo.'" alt="" />';
								}
							}

							$scenery_photos = get_post_meta($post->ID,'scenery',true);
							if(!empty($scenery_photos)) {
								foreach($scenery_photos as $photo) {
									echo '<img class="m-item" src="'.$photo.'" alt="" />';
								}
							}

						echo '</div>';

						echo '<div class="mobileHide">';

							echo '<ul data-id='.$post->ID.' data-animation="slideUp">';
								echo '<li data-tab="events">Events</li>';
								echo '<li data-tab="lifestyle" class="active">Lifestyle</li>';
								echo '<li data-tab="portrait">Portrait</li>';
								echo '<li data-tab="scenery">Scenery</li>';
							echo '</ul>';
							
							echo '<div class="m-scooch m-fluid" data-animation="slideUp">';

								echo '<div class="arrows m-scooch-controls">';
									echo '<i class="arrow left fa fa-angle-left" data-m-slide="prev"></i>';
									echo '<i class="arrow right fa fa-angle-right" data-m-slide="next"></i>';
								echo '</div>';

								echo '<div class="m-scooch-inner">';

									$lifestyle_photos = get_post_meta($post->ID,'lifestyle',true);
									if(!empty($lifestyle_photos)) {
										foreach($lifestyle_photos as $photo) {
											echo '<img class="m-item" src="'.$photo.'" alt="" />';
										}
									}

								echo '</div>';

							echo '</div>';

						echo '</div>';
					}
				}

				wp_reset_postdata();

			echo '</div>';
		echo '</div>';
	echo '</section>';

get_footer(); ?>