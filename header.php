<?php
/**
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Professional
 */
get_template_part('modules/header/head');
?>
<body <?php body_class(); ?>>

<div id="page" class="hfeed site">

<?php get_template_part('modules/header/top', 'bar'); ?>

<?php get_template_part('modules/header/masthead'); ?>

<?php get_template_part('modules/navigation/top', 'navigation'); ?>

    <?php
		 	  get_template_part('framework/featured-components/slider');
	 		  get_template_part('framework/featured-components/showcase');

	?>
	
	<div id="content" class="site-content container">