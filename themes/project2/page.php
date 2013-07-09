<?php get_header(); ?>

<div class="main">
<section class="cols">
  <div class="col-span-2">
  
    <?php 
    if ( have_posts() ) :
      while ( have_posts() ) : the_post(); ?>
    <article>
    <?php edit_post_link('edit', '<p>', '</p>'); ?>
      <header>
        <h1><?php the_title(); ?></h1>
      </header>
      <?php the_content(); ?>
    </article>
    <?php   endwhile;
      endif;
    ?>
    
  </div>
  <?php  get_sidebar(); ?>
</section>
<section class="entries">
<?php  get_footer(); ?>