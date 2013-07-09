<?php get_header(); ?>

<div class="slider-holder"> 
  
  <!-- slider -->
  <div class="slider">
    <div class="arrs"> <a href="#" class="prev-arr"></a> <a href="#" class="next-arr"></a> </div>
    <ul>
      <?php $postslist = get_posts('numberposts=8&order=DSC&orderby=date');
				   $ind = 1;
foreach ($postslist as $post) :
setup_postdata($post); ?>
      <li id="img<?php echo $ind ?>">
      <div class="socials"> <a href="http://www.facebook.com/sharer.php?u=<?php echo get_permalink(); ?>&t=<?php the_title() ?>"
                        target="_blank" class="facebook-ico">facebook-ico</a> <a href="http://twitter.com/home?status=http://www.facebook.com/sharer.php?u=<?php echo get_permalink(); ?>" class="twitter-ico">twitter-ico</a> <a href="#" class="skype-ico">skype-ico</a> <a href="#" class="rss-ico">rss-ico</a>
      <div class="cl">&nbsp;</div>
    </div>
        <div class="slide-cnt">
          <h2>
            <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
           </h2>
          <p>
            <?php the_excerpt(); ?>
          </p>
        </div>
       <?php if ( has_post_thumbnail() ) {
	 echo get_the_post_thumbnail($page->ID, 'medium'); 
		}
		else {
			echo '<img src="' . get_bloginfo( 'stylesheet_directory' ) . '/css/images/default.jpg" />';
		}?> </li>
      <?php $ind++;
 endforeach; ?>
    </ul>
  </div>
  <!-- end of slider --> 
  
  <!-- thumbs -->
  <div id="thumbs-wrapper">
    <div id="thumbs">
      <?php $ind2=1;
					foreach ($postslist as $post) :
setup_postdata($post); ?>
      <a href="#img<?php echo $ind2 ?>" <?php if($ind2==1): echo 'class="selected"'; endif; ?>>
	  <?php if ( has_post_thumbnail() ) {
	 echo get_the_post_thumbnail($page->ID, 'thumbnail'); 
		}
		else {
			echo '<img src="' . get_bloginfo( 'stylesheet_directory' ) . '/css/images/default.jpg" />';
		}?></a>
      <?php $ind2++;
 endforeach; ?>
    </div>
    <a id="prev" href="#"></a> <a id="next" href="#"></a> </div>
  <!-- end of thumbs --> 
</div>
