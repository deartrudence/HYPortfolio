<?php get_header(); ?>

<div class="main">
  <div class="container">

    <div class="content">
      <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

   

      <a href="<?php the_permalink(); ?>"> <h2><?php the_title(); ?></h2></a>
        <?php the_post_thumbnail(); ?>
        <p><strong>Client Name: </strong><?php the_field('client_name'); ?></p>
       
        <?php the_terms($post->ID, 'technologies', '',' / '); ?>
               
        <p><?php the_field('short_desc') ?></p>

        <div class="images clearfix">
          <?php while(has_sub_field('images')) : ?>
            <?php //for every image caption combo, this code is run ?>
            <figure>
            <?php $image = get_sub_field('image'); ?>
             <img src="<?php echo $image['sizes']['square']; ?>" alt="">
              <figcaption><?php the_sub_field('caption'); ?></figcaption>
            </figure>
          <?php endwhile; //end images loop ?>
        </div>
        <hr>
        <?php //the_content(); ?> 

        

      <?php endwhile; // end of the loop. ?>

    </div> <!-- /.content -->

   

  </div> <!-- /.container -->
</div> <!-- /.main -->

<?php get_footer(); ?>