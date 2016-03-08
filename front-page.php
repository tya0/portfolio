<?php get_header();  ?>

<section class="home" id="home">
	<div class="wrapper">
	</div>
</section>

<section class="about" id="about">
	<div class="wrapper">
		<h1>
			<?php $pageQuery = new WP_Query(array(
				'post_type' => 'page'
			)); ?>
			<?php if( $pageQuery -> have_posts() ) : ?>
				<?php while( $pageQuery -> have_posts() ) : ?>
					<?php $pageQuery -> the_post(); ?>

						<h3><?php the_field('about_title'); ?></h3>
						<div class="about-content">
							<p> <?php the_field('about_description_1') ?></p>
							<?php while( has_sub_field('images') ) : ?>
							<?php $image = get_sub_field('image'); ?>
							<img src="<?php echo $image['sizes']['medium']; ?>" alt="">
						<?php endwhile; ?>
						</div>

				<?php endwhile; ?>
				<?php wp_reset_postdata(); ?>
			<?php endif; ?>
		</h1>
	</div>
</section>

<section class="skills" id="skills">
	<div class="wrapper">
		
	</div>
</section>

<section class="portfolio" id="portfolio">
	<div class="wrapper">

		<?php $portfolioQuery = new WP_Query(array(
			'posts_per_page' => 4,
			'post_type' => 'portfolio'
		)); ?>

		<?php if( $portfolioQuery -> have_posts() ) : ?>
			<?php while( $portfolioQuery -> have_posts() ) : ?>
				<?php $portfolioQuery -> the_post(); ?>
			<?php endwhile; ?>
		<?php endif; ?>

	</div>
</section>

<section class="contact" id="contact">
	<div class="wrapper">
		
	</div>
</section>

<?php get_footer(); ?>

