<?php 
  /*
    Template Name: Special Layout
  */

  get_header(); 
?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
  
  <?php get_template_part( 'template-parts/hero' ); ?>

  <div class="frontpage-content">

    <?php the_content(); ?>

  </div>

  <?php if ( have_rows( 'content_rows' ) ) : ?>
    <div class="content-rows">
      <?php while ( have_rows( 'content_rows' ) ) : the_row(); ?>
        <?php $image = get_sub_field( 'image' ); ?>
        <div class="future-leaf-image" data-url="<?php echo $image['url']; ?>" data-alt="<?php echo $image['alt']; ?>"></div>
      <?php endwhile; ?>
    </div>
<?php endif; ?>

<?php endwhile; endif; ?>
<?php get_footer(); ?>