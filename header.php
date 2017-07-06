<!DOCTYPE html>

<html <?php language_attributes(); ?> xmlns:og="http://ogp.me/ns#" xmlns:fb="http://www.facebook.com/2008/fbml" itemscope itemtype="http://schema.org/Article">

<head>
	<!-- Basic Page Needs
	================================================== -->
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
	<meta name="google-site-verification" content="" />

	<title><?php wp_title(); ?></title>
	<meta name="keywords" content="" />
	<meta name="author" content="The INiT Group">
	
	<!-- Mobile Specific Metas
  	================================================== -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<link rel="profile" href="https://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

	<!-- Favicons
	================================================== -->
	<link rel="shortcut icon" href="<?php bloginfo('template_directory'); ?>/favicon/favicon.ico">
	<link rel="apple-touch-icon" href="<?php bloginfo('template_directory'); ?>/favicon/apple-touch-icon.png">
	<link rel="apple-touch-icon" sizes="72x72" href="<?php bloginfo('template_directory'); ?>/favicon/apple-touch-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="114x114" href="<?php bloginfo('template_directory'); ?>/favicon/apple-touch-icon-114x114.png">
	
	<!-- Facebook open graph tags -->
	<meta property="og:title" content="<?php the_title(); ?>"/>
	<meta property="og:description" content="<?php
	  if ( function_exists('WPSEO_Meta::get_value()') ) {
	    echo WPSEO_Meta::get_value('metadesc');
	  } else {
	    echo $post->post_excerpt;
	  }
	?>"/>

	<?php if (have_posts()):while(have_posts()):the_post(); endwhile; endif;?>
		<meta property="fb:app_id" content="496408310403833" />
	<?php if (is_single()) { ?>
		<!-- Open Graph -->
		<meta property="og:url" content="<?php the_permalink(); ?>"/>
		<meta property="og:title" content="<?php single_post_title(''); ?>" />
		<meta property="og:description" content="<?php echo strip_tags(get_the_excerpt()); ?>" />
		<meta property="og:type" content="article" />
		<meta property="og:image" content="<?php if (function_exists('wp_get_attachment_thumb_url')) {
			echo wp_get_attachment_image_url(get_post_thumbnail_id($post->ID), 'medium', false );
		} ?>" />
		<!-- Schema.org -->
		<meta itemprop="name" content="<?php single_post_title(''); ?>"> 
		<meta itemprop="description" content="<?php echo strip_tags(get_the_excerpt()); ?>"> 
		<meta itemprop="image" content="<?php if (function_exists('wp_get_attachment_thumb_url')) {
			echo wp_get_attachment_image_url(get_post_thumbnail_id($post->ID), 'medium', false );
		} ?>">
		<!-- Twitter Cards -->
		<meta property="twitter:card" content="summary"> 
		<meta property="twitter:site" content="@darkmoon_ent"> 
		<meta property="twitter:title" content="<?php single_post_title(''); ?>"> 
		<meta property="twitter:description" content="<?php echo strip_tags(get_the_excerpt()); ?>"> 
		<meta property="twitter:creator" content="@darkmoon_ent"> 
		<meta property="twitter:image" content="<?php if (function_exists('wp_get_attachment_thumb_url')) {
			echo wp_get_attachment_image_url(get_post_thumbnail_id($post->ID), 'medium', false );
		} ?>">
		<meta property="twitter:url" content="<?php the_permalink(); ?>" />
		<meta property="twitter:domain" content="<?php echo site_url(); ?>">
	<?php } else { ?>
		<!-- Open Graph -->
		<meta property="og:site_name" content="<?php bloginfo('name'); ?>" />
		<meta property="og:description" content="<?php bloginfo('description'); ?>" />
		<meta property="og:type" content="website" />
		<meta property="og:image" content="<?php echo bloginfo('template_directory'); ?>/assets/images/default_facebook.jpg" />
		<!-- Schema.org -->
		<meta itemprop="name" content="<?php bloginfo('name'); ?>"> 
		<meta itemprop="description" content="<?php bloginfo('description'); ?>"> 
		<meta itemprop="image" content="<?php echo bloginfo('template_directory'); ?>/assets/images/default_google.jpg">
		<!-- Twitter Cards -->
		<meta property="twitter:card" content="summary"> 
		<meta property="twitter:site" content="@darkmoon_ent"> 
		<meta property="twitter:title" content="<?php bloginfo('name'); ?>"> 
		<meta property="twitter:description" content="<?php bloginfo('description'); ?>"> 
		<meta property="twitter:creator" content="@darkmoon_ent"> 
		<meta property="twitter:image" content="<?php echo bloginfo('template_directory'); ?>/assets/images/default_twitter.jpg">
		<meta property="twitter:url" content="<?php the_permalink() ?>" />
		<meta property="twitter:domain" content="<?php echo site_url(); ?>">
	<?php } ?>

	<!-- WP Generated Header
	================================================== --> 
	<?php wp_head(); ?>
    
</head>

<body>

<header>
	<section id="topmenu">
		<article id="name">
			<?php echo bloginfo("name"); ?>
		</article>
		<article id="toggle">
			<button data-view="day" class="active">Day</button>
			<span>/</span>
			<button data-view="night">Night</button>
		</article>
	</section>
	<section id="menu" class="outer">
		<article id="menuButton">
			<span class="M">M</span>
			<span class="E">E</span>
			<span class="N">N</span>
			<span class="U">U</span>
		</article>
		<article id="menuWrap">
			<div class="inner">
				<nav>
					<ul>
						<li data-link="about">About.</li>
					 	<li data-link="video">Video.</li>
					 	<li data-link="photos">Photos.</li>
					</ul>
				</nav>
				<div id="details">
					<?php
						if(!empty(get_option('address'))) {
							echo '<address><i class="fa fa-map-marker"></i>'.get_option('address').'</address>';
						}
						if(!empty(get_option('phone'))) {
							if(wp_is_mobile()) {
								echo '<div id="phone"><i class="fa fa-phone"></i><a href="tel:'.get_option('phone').'">'.get_option('phone').'</a></div>';
							} else {
								echo '<div id="phone"><i class="fa fa-phone"></i>'.get_option('phone').'</div>';
							}
						}
						if(!empty(get_option('admin_email'))) {
							echo '<div id="email"><i class="fa fa-envelope"></i><a href="mailto:'.get_option('admin_email').'">'.get_option('admin_email').'</a></div>';
						}
					?>
				</div>
				<div id="signature">
					Built for you by <a href="https://facebook.com/theinitgroup" target="_BLANK"><img class="svg" src="<?php bloginfo('template_directory');?>/assets/images/init.svg" alt="" /></a>
				</div>
			</div>
		</article>
	</section>
	<section id="social" class="outer">
		<?php get_template_part( 'partials/theme/social', 'links' ); ?>
	</section>
	<section id="legal">
		&copy; 2017 Dark Moon Entertainment, LLC
	</section>
</header>