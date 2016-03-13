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
						<?php while( has_sub_field('images') ) : ?>
						<?php $image = get_sub_field('image'); ?>
						<img src="<?php echo $image['sizes']['medium']; ?>" alt="">
						<?php endwhile; ?>
						<p class="about-me"> <?php the_field('about_description_1') ?></p>
					</div>

			<?php endwhile; ?>
			<?php wp_reset_postdata(); ?>
		<?php endif; ?>
	</div>
</section>

<section class="skills" id="skills">
	<div class="wrapper">
		<h2 class="intro-tools">With these skills and tools...</h2>
		<?php if ( $pageQuery -> have_posts() ) : ?>
			<?php while ( $pageQuery -> have_posts() ) : ?>
				<?php $pageQuery -> the_post(); ?>
				
				
				<?php the_field('skill_list'); ?> 

			<?php endwhile; ?>
			<?php wp_reset_postdata(); ?>
		<?php endif; ?>
		<h2 class="lead-to-portfolio">I've built some cool stuff... </h2>
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
						<?php while(has_sub_fields('images')) : ?>
							<?php $image = get_sub_field('image') ?>
							<img src="<?php echo $image['sizes']['medium']; ?>" alt="">
						<?php endwhile; ?>
						<div class="item-desc-wrapper">
							<h2 class="item-title"><?php the_title(); ?></h2>
							<p class="technologies"><span>// </span> <?php the_field('technologies_used'); ?></p>
							<p class="item-desc"><?php the_field('portfolio_item_desc'); ?></p>
							<a href=" <?php echo the_field('portfolio_item_link') ?> ">View Live</a>
						</div>					
					</div>
			<?php endwhile; ?>
		<?php endif; ?>

	</div>
</section>

<section class="contact" id="contact">
	<div class="wrapper clearfix">
		<?php if ( $pageQuery -> have_posts() ) : ?>
			<?php while ( $pageQuery -> have_posts() ) : ?>
				<?php $pageQuery -> the_post(); ?>
				<h1 class="section-title"><?php the_field('contact_title'); ?></h1>
			<?php endwhile; ?>
			<?php wp_reset_postdata(); ?>
		<?php endif; ?>
		<div class="contact-links">
			<h3>Let's Connect!</h3>
			<?php 
				wp_nav_menu( array(
			    'theme_location' => 'contact'
				) );
			?>
		</div>
		<?php echo do_shortcode('[contact-form-7 id="75" title="Contact Me"]'); ?>
	</div>
</section>

<?php get_footer(); ?>

