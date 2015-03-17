<?php

/*
	Template Name: about page
*/

get_header();  ?>

<div class="main">
  <div class="container">
	<div class="topImage clearfix">
	  <?php $thumb_id = get_post_thumbnail_id();
	  $thumb_url_array = wp_get_attachment_image_src($thumb_id, 'thumbnail-size', true);
	  $thumb_url = $thumb_url_array[0]; ?>
	  <a href="<?php the_permalink(); ?>">
	    <?php the_post_thumbnail('medium'); ?>
	  </a> 
	</div> <!-- /.topImage -->

	    <?php // Start the loop ?>
	    <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
			<div class="about">

			    <h2><?php the_title(); ?></h2>
			    <?php the_content(); ?>

			    <?php endwhile; // end the loop?>
			    <div class="contactIcons">
			    <?php while(has_sub_field('contact_icon')) : ?>
			    	<?php $url = get_sub_field('contact_url') ?>
			    	<a href="<?php echo $url ?>" target="_blank">
			    		<?php $icon = get_sub_field('icon'); ?>
			        	<?php echo $icon ?>
			        </a>
			    <?php endwhile; ?>
			    </div> <!-- /.contactIcons -->

			</div> <!-- /.about -->
		    <div class="aboutSkills">
		    	<h2>Skills</h2>
		    	<div class="skills">
		    	  <?php while(has_sub_field('skill')) : ?>
		    	    <?php $skill = get_sub_field('skill_icon'); ?>
		    	    <?php $skillDesc = get_sub_field('skill_desc') ?>
		    	    <?php $skillExcp = get_sub_field('skill_excerpt') ?>
		    	    <div class="skillSet clearfix">
			    	    <a href="<?php echo home_url( '/' );?>technologies/<?php echo $skillDesc; ?>">
			    	      <?php echo $skill ?>
			    	    </a>
			    	    <p class="skill_excerpt"><?php echo $skillExcp ?></p>
		    	    </div> <!-- /.skillSet -->
		    	  <?php endwhile; ?>
		    	</div> <!-- /.skills -->
		    </div>


  </div> <!-- /.container -->
</div> <!-- /.main -->

<?php get_footer(); ?>