<?php

/*
	Template Name: custom home page
*/

get_header();  ?>

<div class="main">
  <div class="container">

	<div id="columns">
	    <?php // Start the loop ?>

		  	        <?php $aboutPage = new WP_Query(array(
		  	        	'pagename'=> 'about', //we only want blog posts
		  	        )); ?>
		  	    	<?php if($aboutPage->have_posts()) while($aboutPage->have_posts()) : $aboutPage->the_post(); ?>
		  	    		<div class="block">
		  		    		<a href="<?php the_permalink(); ?>">
		  		    		<div class="featuredPost">
		  		    			<h2><?php the_title(); ?></h2>
		  		    			<p><?php the_field('about_excerpt'); ?></p>
		  		    		</div>
		  		    		</a>
		  		    		<div class="contactIcons">
		  		    		<?php while(has_sub_field('contact_icon')) : ?>
		  		    			<?php $url = get_sub_field('contact_url') ?>
		  		    			<a href="<?php echo $url ?>" target="_blank">
		  		    				<?php $icon = get_sub_field('icon'); ?>
		  		    		    	<?php echo $icon ?>
		  		    		    </a>
		  		    		<?php endwhile; ?>
		  		    		</div> <!-- /.contactIcons -->
		  	    		</div>	
		  	    <?php endwhile ?>
		  	    <?php wp_reset_postdata(); //return env back to regular scheduled programming ?>

		    <?php $latestPosts = new WP_Query(array(
		    	'post_type'=> 'portfolio', //we only want blog posts
		    	'posts_per_page' => 6
		    )); ?>
			<?php if($latestPosts->have_posts()) while($latestPosts->have_posts()) : $latestPosts->the_post(); ?>
				<div class="block">
				<a href="<?php the_permalink(); ?>">
				<div class="featuredPost">
					<h2><?php the_title(); ?></h2>
					<p><?php the_field('short_desc') ?></p>
					<?php $frontImage = get_field('front_image') ?>
					<img src="<?php echo $frontImage['url'] ?>" >
					<?php $size = 'square' ?>
					
					<?php the_terms($post->ID, 'technologies', '',' / '); ?>
				</div>
				</a>
			</div>	
		<?php endwhile ?>
		<?php wp_reset_postdata(); //return env back to regular scheduled programming ?>
    <?php //we are going to pull in our latest 4 blog posts ?>
	    
	        
    <!-- </div> -->
	    <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
			<div class="block">
			<!-- <a href="<?php the_permalink(); ?>">
		      <h2><?php the_title(); ?></h2>
		      <?php the_content(); ?>
		    </a> -->
			</div> <!-- /. block -->

		    <?php endwhile; // end the loop?>
    </div> <!-- /#columns -->
  </div> <!-- /.container -->
</div> <!-- /.main -->

<?php get_footer(); ?>
