<!DOCTYPE html>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<title>
<?php bloginfo('name'); ?>
<?php wp_title(); ?>
</title>
<link rel="shortcut icon" href="http://bobbykolev.com/wp-content/uploads/2013/06/ico.png" />
<link href='http://fonts.googleapis.com/css?family=Raleway:400,900,800,700,600,500,300,200,100' rel='stylesheet' type='text/css'>
<!--[if lt IE 9]>
		<script src="<?php bloginfo('template_url'); ?>/js/modernizr.custom.js"></script>
        <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
<![endif]-->
<?php wp_head(); ?>
</head>
<body <?php body_class($class); ?>>
<!-- wrapper -->
<div id="wrapper">
<!-- shell -->
<div class="shell">
<!-- container -->
<div class="container">
<!-- header -->
<header id="header"> 
  <!-- search -->
  
  <?php if(!dynamic_sidebar('search-box')): ?>
  <div class="search">
    <form role="search" method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">
      <input type="text" value="" name="s" id="s" />
      <input type="submit" id="searchsubmit" value="Search" />
    </form>
  </div>
  <?php endif; ?>
  
  <!-- end of search -->
  <div class="cl">&nbsp;</div>
  <h1 id="logo"><a href="<?php echo home_url(); ?>"><img src="<?php header_image(); ?>" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" alt="" /><?php bloginfo('title'); ?></a></h1>
</header>
<!-- end of header --> 
<!-- navigaation -->

<nav id="navigation">
  <?php
   wp_nav_menu( array( 
   'theme_location' => 'project-top'
	 ) );
	?>
  <div class="cl">&nbsp;</div>
</nav>
<!-- end of navigation --> 
<!-- slider-holder -->