<?php

//The template for displaying 404 pages (Not Found).

get_header(); ?>

<div class="main">
<section class="cols">
  <div class="col-span-2">
<h1>Page not found</h1>
<p>Please use the search box or check the categories</p>
<ul class="ul-404">
<?php wp_list_categories('orderby=name'); ?> 
</ul>
  </div>
  <?php  get_sidebar(); ?>
</section>
<section class="entries">



<script type="text/javascript">
		// focus on search field after it has loaded
		document.getElementById('s') && document.getElementById('s').focus();
	</script>
<?php get_footer(); ?>