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

      <div class="block">
        <p>the end</p>
      </div>
      
    </div> <!-- /.columns -->
  </div> <!-- /.container -->
</div> <!-- /.main -->

<?php get_footer(); ?>