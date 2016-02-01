<?php
/**
 * This file is used by the WSUWP JSON Web Template plugin to provide a portion
 * of the content output via JSON.
 */
?>
<main class="spine-app-template">
	
	<?php get_template_part('parts/headers'); ?>

	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	
	<?php the_content(); ?>
	
	<?php endwhile; endif; ?>