<div class="entry">
  <h3>Latest Blog Posts</h3>
  <?php if(!dynamic_sidebar('ff-widget')): ?>
  <?php
$postslist = get_posts('numberposts=3&order=DSC&orderby=date');
foreach ($postslist as $post) :
setup_postdata($post);
?>
  <div class="entry-inner">
    <div class="date"> <strong>
      <?php the_time(d); ?>
      </strong> <span>
      <?php the_time(Y); ?>
      </span> <em>
      <?php the_time(M); ?>
      </em> </div>
    <div class="cnt">
      <h2>
        <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
          <?php the_title(); ?>
          </a>
      </h2>
      <span class="meta">
      <?php the_author_link(' '); ?>
      /
      <?php the_category('','<span>');?>
      </span> </div>
  </div>
  <?php endforeach; ?>
  <?php endif; ?>
</div>
<?php if(!dynamic_sidebar('fs-widget')): ?>
<?php $prolist = get_posts('post_type=projects&numberposts=1&order=DSC&orderby=date');?>
<div class="entry">
  <h3>Latest Project</h3>
  <?php foreach ($prolist as $post) :
setup_postdata($post); ?>
  <h5><?php the_title() ?></h5>
  <a href="<?php echo get_permalink(); ?>"><?php echo get_the_post_thumbnail($page->ID, 'medium'); ?></a>
  <p><?php the_excerpt(); ?><br />
    <?php endforeach; ?>
</div>
<?php endif; ?>
<?php if(!dynamic_sidebar('ft-widget')): ?>
<div class="entry">
  <h3>Testimonials</h3>
  <div class="testimonials">
    <p><strong>“</strong>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus dui ipsum, cursus ut adipiscing porta, vestibulum quis turpis.”</p>
    <p class="author">John Doe, <strong>Company Name</strong></p>
  </div>
  <div class="partners">
    <h3>Our Partners</h3>
    <img src="<?php echo get_template_directory_uri(); ?>/css/images/partners-img.png" alt="" /> </div>
</div>
<?php endif; ?>
<div class="cl">&nbsp;</div>
</section>
</div>
<!-- end of main -->
<div class="cl">&nbsp;</div>

<!-- footer -->
<footer id="footer">
  <div class="footer-nav">
    <?php
		   wp_nav_menu( array( 
		   'theme_location' => 'project-top'
			 ) );
	?>
    <div class="cl">&nbsp;</div>
  </div>
  <?php if(!dynamic_sidebar('fbr-widget')): ?>
  <p class="copy">&copy; Copyright 2012<span>|</span>Telerik CMS Course. Design by <a href="http://academy.telerik.com" target="_blank">Telerik Software Academy</a></p>
  <?php endif; ?>
  <div class="cl">&nbsp;</div>
</footer>
<!-- end of footer -->
</div>
<!-- end of container -->
</div>
<!-- end of shell -->
</div>
<!-- end of wrapper -->
<?php wp_footer(); ?>
</body></html>