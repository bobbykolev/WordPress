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
         <div class="date"> <strong>
      <?php the_time(d); ?>
      </strong> <span>
      <?php the_time(Y); ?>
      </span> <em>
      <?php the_time(M); ?>
      </em> </div>
       <h1>
          <?php the_title(); ?>
         </h1>
      </header>
      <section>
      <?php the_content(); ?>
      </section>
      <footer>
      <?php the_tags(); ?>
      <?php comments_template( 'comments.php', true ); ?>
      </footer>
    </article>
    <?php   endwhile;
      endif;
    ?>
  </div>
  <?php  get_sidebar(); ?>
</section>
<section class="entries">
<?php  get_footer(); ?>
