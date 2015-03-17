<?php get_header(); ?>

<div class="main">
  <div class="topImage clearfix">

    <?php $thumb_id = get_post_thumbnail_id();
    $thumb_url_array = wp_get_attachment_image_src($thumb_id, 'square-size', true);
    $thumb_url = $thumb_url_array[0]; ?>
    <a href="<?php the_permalink(); ?>">
      <?php the_post_thumbnail('medium'); ?>
    </a> 
  </div> <!-- /.topImage -->

  <div class="container">

    

  
      <div class="info">
        <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

          <h2><?php the_title(); ?></h2>
          <p><?php the_content(); ?></p>
          <div class="skills">
            <?php while(has_sub_field('skill')) : ?>
              <?php $skill = get_sub_field('skill_icon'); ?>
              <?php $skillDesc = get_sub_field('skill_desc') ?>
              <a href="<?php echo home_url( '/' );?>technologies/<?php echo $skillDesc; ?>">
                <?php echo $skill ?>
              </a>
            <?php endwhile; ?>
          </div> <!-- /.skills -->
        
        </div> <!-- /.info -->
        <?php $singleImage = get_field('single_image') ?>
        <div class="singleImage">
          <a href="<?php the_field('iframe_url')?>" target="_blank">
            <div class="iframe" style="background-image: url('<?php echo $singleImage['url'] ?>')">
              <div class="overlay">
                <p>Click for full site</p>
              </div>
            </div>
          </a>
        </div>

 <!--        <div class="images">
          <?php while(has_sub_field('images')) : ?>
            <?php //for every image caption combo, this code is run ?>
            <figure>
            <?php $image = get_sub_field('image'); ?>
             <img src="<?php echo $image['sizes']['square']; ?>" alt="">
              <figcaption><?php the_sub_field('caption'); ?></figcaption>
            </figure>
          <?php endwhile; //end images loop ?>
        </div> -->
        <?php //the_content(); ?> 

        

      <?php endwhile; // end of the loop. ?>

  

   

  </div> <!-- /.container -->
</div> <!-- /.main -->

<?php get_footer(); ?>