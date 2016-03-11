<?php get_header();  ?>

<section class="home" id="home">
	<div class="wrapper">
		<?php $pageQuery = new WP_Query(array(
				'post_type' => 'page'
		)); ?>
		<?php if( $pageQuery -> have_posts() ) : ?>
			<?php while( $pageQuery -> have_posts() ) : ?>
				<?php $pageQuery -> the_post(); ?>
				<div class="home-content">
					<h1><?php the_field('home_name'); ?></h1>
					<h2><span class="red">//</span> <?php the_field('home_occupation'); ?></h2>
				</div>
			<?php endwhile; ?>
			<?php wp_reset_postdata(); ?>
		<?php endif; ?>
	</div>
</section>

<section class="about" id="about">
	<div class="wrapper">
		<?php if( $pageQuery -> have_posts() ) : ?>
			<?php while( $pageQuery -> have_posts() ) : ?>
				<?php $pageQuery -> the_post(); ?>

					<h1 class="section-title"><?php the_field('about_title'); ?></h1>
					<div class="about-content clearfix">
						<p> <?php the_field('about_description_1') ?></p>
						<?php while( has_sub_field('images') ) : ?>
						<?php $image = get_sub_field('image'); ?>
						<div class="image-wrap">
							
							<img src="<?php echo $image['sizes']['medium']; ?>" alt=""></div>
						</div>
					<?php endwhile; ?>
					</div>

			<?php endwhile; ?>
			<?php wp_reset_postdata(); ?>
		<?php endif; ?>
	</div>
</section>

<section class="skills" id="skills">
	<div class="wrapper">
		<h2 class="intro-tools">Using these tools...</h2>
		<?php if ( $pageQuery -> have_posts() ) : ?>
			<?php while ( $pageQuery -> have_posts() ) : ?>
				<?php $pageQuery -> the_post(); ?>
				<h1 class="section-title"><?php the_field('skill_title'); ?></h1>
				
				<?php the_field('skill_list'); ?> 

			<?php endwhile; ?>
			<?php wp_reset_postdata(); ?>
		<?php endif; ?>
		<h2 class="lead-to-portfolio">I have built... </h2>
		<div class="icon-container"><i class="fa fa-long-arrow-down fa-5x arrow animated infinite bounce"></i></div>
	</div>
</section>

<section class="portfolio" id="portfolio">
	<div class="wrapper">
		<?php if( $pageQuery -> have_posts() ) : ?>
			<?php while( $pageQuery -> have_posts() ) : ?>
				<?php $pageQuery -> the_post(); ?>

					<h1 class="section-title"><?php the_field('portfolio_title'); ?></h1>
			<?php endwhile; ?>
			<?php wp_reset_postdata(); ?>
		<?php endif; ?>
		

		<?php $portfolioQuery = new WP_Query(array(
			'posts_per_page' => 4,
			'post_type' => 'portfolio'
		)); ?>

		<?php if( $portfolioQuery -> have_posts() ) : ?>
			<?php while( $portfolioQuery -> have_posts() ) : ?>
				<?php $portfolioQuery -> the_post(); ?>
					<div class="portfolio-item clearfix">
						<div class="item-desc-wrapper">
							<h2 class="item-title"><?php the_title(); ?></h2>
							<p class="technologies"><span>// </span> <?php the_field('technologies_used'); ?></p>
							<p class="item-desc"><?php the_field('portfolio_item_desc'); ?></p>
							<a href=" <?php echo the_field('portfolio_item_link') ?> ">View Live</a>
						</div>
						<?php while(has_sub_fields('images')) : ?>
							<?php $image = get_sub_field('image') ?>
							<img src="<?php echo $image['sizes']['medium']; ?>" alt="">
						<?php endwhile; ?>
						
					</div>
			<?php endwhile; ?>
		<?php endif; ?>

	</div>
</section>

<section class="contact" id="contact">
	<div class="wrapper">
		<?php if ( $pageQuery -> have_posts() ) : ?>
			<?php while ( $pageQuery -> have_posts() ) : ?>
				<?php $pageQuery -> the_post(); ?>
				<h1 class="section-title"><?php the_field('contact_title'); ?></h1>
			<?php endwhile; ?>
			<?php wp_reset_postdata(); ?>
		<?php endif; ?>
		<form action="">
			<p>Send me a message!</p>
			<input type="text" placeholder="Name">
			<input type="text" placeholder="Email">
			<input type="text" placeholder="Subject">
			<textarea name="message" id="message" placeholder="Message"></textarea>
			<input type="submit" value="Send">

		</form>
		<div class="contact-links">
			<a href="mailto:tiffany@tiffanyyao.com" target="_top">tiffany@tiffanyyao.com</a>
			<a href="">Twitter</a>
			<a href="">Github</a>
			<a href="">Linkedin</a>
		</div>
	</div>
</section>

<?php get_footer(); ?>

