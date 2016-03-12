<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<?php // Load Meta ?>
  <meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php  wp_title('|', true, 'right'); ?></title>
  <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
  <!-- stylesheets should be enqueued in functions.php -->
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<header>
    <div class="menu-wrap">
        <div class="hamburger"><span></span></div>
    </div>
</header>

<aside class="sideNav clearfix">
  <div class="wrapper">
    <div class="container">
      <div class="cube show-front">
          <figure class="front"><p>TY</p></figure>
          <figure class="back"><p>About</p></figure>
          <figure class="right"><p>Skills</p></figure>
          <figure class="left"><p>Work</p></figure>
          <figure class="top"><p>Contact</p></figure>
          <figure class="bottom"><p></p></figure>
      </div>
    </div>

   <ul class="nav buttons" id="menu">
          <li>
            <a class="nav home-link show-front active" href="#home" data-action="show-front">Home</a>
          </li>
          
          <li>
            <a class="nav about-link show-back" href="#about" data-action="show-back">About</a>
          </li>
          
          <li>
            <a class="nav skills-link show-right" href="#skills" data-action="show-right">Skills</a>
          </li>
          
          <li>
            <a class="nav portfolio-link show-left" href="#portfolio" data-action="show-left">Work</a>
          </li>
          
          <li>
            <a class="nav contact-link show-top" href="#contact" data-action="show-top">Contact</a>
          </li> 
          <!-- <li><a href="#">Contact</a></li> -->
        </ul>
  </div>
</aside>

