<?php
/*
Template Name: Home Page Template
*/
?>
<?php get_header( 'home' ); ?>
<div class="main">
<div class="featured">
<?php if(!dynamic_sidebar('featured-sidebar')): ?>
<h4>Welcome to <strong>Company Name.</strong> Start Creating Your Website Today completely for <strong>FREE!</strong></h4>
  <a href="#" class="blue-btn">GET IN TOUCH</a> 
<?php endif; ?>
</div>
<section class="cols">
<?php if(!dynamic_sidebar('front-sidebar-one')): ?>
  <div class="col">
    <h3>About Us</h3>
    <h5>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</h5>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus dui ipsum, cursus ut adipiscing porta, vestibulum quis turpis. Ut ultricies rutrum lorem, in blandit tortor congue pulvinar lorem ipsum dolor sit amet, consectetur adipiscing elit. <br />
      <a href="#" class="more">view more</a></p>
  </div>
  <?php endif; ?>
  <?php if(!dynamic_sidebar('front-sidebar-two')): ?>
  <div class="col">
    <h3>We’re Hiring</h3>
    <img src="<?php echo get_template_directory_uri(); ?>/css/images/col-img.png"  alt="pc-monitor" class="left" width="97" height="84"/>
    <h5>Lorem ipsum dolor sit amet, consectetur adipiscing elit. </h5>
    <div class="cl">&nbsp;</div>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus dui ipsum, cursus ut adipiscing porta, vestibulum quis turpis adispicing amet sit. <br />
      <a href="#" class="more">view more</a></p>
  </div>
  <?php endif; ?>
  <?php  get_sidebar(); ?>
</section>
<section class="entries">
<?php  get_footer(); ?>
