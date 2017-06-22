<?php 

/*
Template Name: Homepage
*/

get_header(); ?>

<div id="home">

	<section id="CTA" class="clearfix">
		<video autoplay loop class="full">
			<source src="<?php echo bloginfo('template_directory'); ?>/assets/videos/homepage.mp4" type="video/mp4">
			<source src="<?php echo bloginfo('template_directory'); ?>/assets/videos/homepage.webm" type="video/webm">
			<source src="<?php echo bloginfo('template_directory'); ?>/assets/videos/homepage.ogg" type="video/ogg">
		</video>
		<div class="container">
			<div class="row">
				<div class="call col-md-6 col-md-offset-3">
					<section class="call-copy">
						<h1>Live <br /> Better <br /> L<i class="fa fa-gear fa-spin"></i>nger.</h1>
						<p>Find out what can be done about your health to live better longer.</p>
					</section>
					<section class="call-button">
						<button class="btn btn-primary btn-block btn-lg">Take A <span class="free">FREE</span> Online Health Assessment!</button>
					</section>
				</div>
			</div>
		</div>
	</section>

	<section id="philosophy">
		<div class="row">
			<div class="col-md-6">
				<img src="<?php echo bloginfo('template_directory');?>/assets/images/" alt="" />
			</div>
			<div class="container">
				<div class="col-md-6">
					<h2>Philosophy</h2>
					<p>At Reverse Aging Centre we bring together some of the world’s foremost physicians, with specialties ranging from Stem Cell and Regenerative therapies to cutting-edge Anti-Aging treatments. We share a commitment to providing you with the very best in proven medicine.</p>
					<button class="btn btn-primary btn-block">Learn More</button>
				</div>
			</div>
		</div>
	</section>

	<section id="services">
		<div class="pattern"></div>
		<div class="container">
			<div class="row">
				<div class="col-md-6 service-copy">
					<h2>Treatments</h2>
					<p>Stem cell treatments have applications in everything from orthopedics to cosmetics. Whether you want to live pain-free or look your best, we offer treatments that can help you achieve your goal.</p>
					<button class="btn btn-primary btn-block">Learn More</button>
				</div>
				<div class="col-md-6">
					<div class="row">
						<div class="col-md-4">
							<h6>SC</h6>
							<p>Stem Cell</p>
						</div>
						<div class="col-md-4">
							<h6>HR</h6>
							<p>Hormone Rebalancing</p>
						</div>
						<div class="col-md-4">
							<h6>CT</h6>
							<p>Cosmetic Treatments</p>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4">
							<h6>WM</h6>
							<p>Weight Management</p>
						</div>
						<div class="col-md-4">
							<h6>MS</h6>
							<p>Medical Staff</p>
						</div>
						<div class="col-md-4">
							<h6>LI</h6>
							<p>Lifestyle Interviews</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</services>

	<section id="assessment">
	</section>

</div>

<?php get_footer(); ?>