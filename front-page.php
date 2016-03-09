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
					<h2><?php the_field('home_occupation'); ?></h2>
				</div>
			<?php endwhile; ?>
			<?php wp_reset_postdata(); ?>
		<?php endif; ?>
	</div>
</section>

<section class="about" id="about">
	<div class="wrapper">
		<h1>
			<?php if( $pageQuery -> have_posts() ) : ?>
				<?php while( $pageQuery -> have_posts() ) : ?>
					<?php $pageQuery -> the_post(); ?>

						<h1><?php the_field('about_title'); ?></h1>
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
		<?php if( $pageQuery -> have_posts() ) : ?>
			<?php while( $pageQuery -> have_posts() ) : ?>
				<?php $pageQuery -> the_post(); ?>

					<h1><?php the_field('portfolio_title'); ?></h1>
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
					<div class="portfolio-item">
						<h2 class="item-title"><?php the_title(); ?></h2>
						<p><?php the_field('technologies_used'); ?></p>
						<p class="item-desc"><?php the_content(); ?></p>
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
		
	</div>
</section>

<?php get_footer(); ?>

