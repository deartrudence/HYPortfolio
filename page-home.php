<?php

/*
	Template Name: custom home page
*/

get_header();  ?>

<div class="main">
  <div class="container">

	<div id="columns">
	    <?php // Start the loop ?>
	    <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
			<div class="block">
			<a href="<?php the_permalink(); ?>">
		      <h2><?php the_title(); ?></h2>
		      <?php the_content(); ?>

		    <?php endwhile; // end the loop?>

		    <?php $latestPosts = new WP_Query(array(
		    	'post_type'=> 'portfolio', //we only want blog posts
		    	'posts_per_page' => 6
		    )); ?>
		    </a>
			</div> <!-- /. block -->
			<?php if($latestPosts->have_posts()) while($latestPosts->have_posts()) : $latestPosts->the_post(); ?>
				<div class="block">
				<a href="<?php the_permalink(); ?>">
				<div class="featuredPost">
					<h2><?php the_title(); ?></h2>
					<?php the_content(); ?>
					<?php the_post_thumbnail(); ?>
					<?php the_terms($post->ID, 'technologies', '',' / '); ?>
				</div>
				</a>
			</div>	
		<?php endwhile ?>
		<?php wp_reset_postdata(); //return env back to regular scheduled programming ?>
    <?php //we are going to pull in our latest 4 blog posts ?>
    <div class="block">
	    <?php  
	    	$aboutid = get_page_by_title('About', ARRAY_N);
	    	echo get_the_title($aboutid[0]);
	    ?>
    </div>
    </div> <!-- /#columns -->
  </div> <!-- /.container -->
</div> <!-- /.main -->

<?php get_footer(); ?>