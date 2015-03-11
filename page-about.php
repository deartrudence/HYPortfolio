<?php

/*
	Template Name: about page
*/

get_header();  ?>

<div class="main">
  <div class="container">


	    <?php // Start the loop ?>
	    <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
			<div class="about">

			    <h2><?php the_title(); ?></h2>
			    <?php the_content(); ?>

			    <?php endwhile; // end the loop?>
			    <div class="skills">
			    <?php while(has_sub_field('contact_icon')) : ?>
			    	<?php $skill = get_sub_field('icon'); ?>
			        <?php echo $skill ?>
			    <?php endwhile; ?>
			    </div> <!-- /.skills -->

			</div> <!-- /.about -->


  </div> <!-- /.container -->
</div> <!-- /.main -->

<?php get_footer(); ?>