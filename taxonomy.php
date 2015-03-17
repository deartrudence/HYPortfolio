<?php get_header(); ?>

<div class="main">
  <div class="container">
      <div id="columns">
      <?php if ( have_posts() ) the_post(); ?>
        <div class="block">
          <h2><?php $term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) ); echo $term->name; ?></h2>
            <p><?php echo $term->description; ?></p>
        </div>

        
        <?php
        /* Since we called the_post() above, we need to
         * rewind the loop back to the beginning that way
         * we can run the loop properly, in full.
         */
        rewind_posts();

        /* Run the loop for the archives page to output the posts.
         * If you want to overload this in a child theme then include a file
         * called loop-archives.php and that will be used instead.
         */

        get_template_part( 'loop', 'archive' );
        ?>

           <!--  <?php $latestPosts = new WP_Query(array(
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
        <?php wp_reset_postdata(); //return env back to regular scheduled programming ?> -->

      <div class="block">
        <p>the end</p>
      </div>
      
    </div> <!-- /.columns -->
  </div> <!-- /.container -->
</div> <!-- /.main -->

<?php get_footer(); ?>