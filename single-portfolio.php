<?php get_header(); ?>

<div class="main">
  <div class="container">

    <div class="content">
  

      <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

        <h2><?php the_title(); ?></h2>
        <p><strong>Client Name: </strong><?php the_field('client_name'); ?></p>
        <p><?php the_field('short_desc') ?></p>
        <p><?php the_content(); ?></p>

        <div class="images">
          <?php while(has_sub_field('images')) : ?>
            <?php //for every image caption combo, this code is run ?>
            <figure>
            <?php $image = get_sub_field('image'); ?>
             <img src="<?php echo $image['sizes']['square']; ?>" alt="">
              <figcaption><?php the_sub_field('caption'); ?></figcaption>
            </figure>
          <?php endwhile; //end images loop ?>
        </div>
        <?php //the_content(); ?> 

        

      <?php endwhile; // end of the loop. ?>

    </div> <!-- /.content -->

   

  </div> <!-- /.container -->
</div> <!-- /.main -->

<?php get_footer(); ?>