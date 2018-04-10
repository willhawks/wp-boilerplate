<?php get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

  <main <?php post_class(); ?>>

    <header class="page-header">

      <h1 class="page-title"><?php the_title(); ?></h1>

    </header>

    <div class="page-content">

      <?php the_content(); ?>

    </div>

  </main>

<?php endwhile; endif; ?>

<?php get_footer(); ?>
