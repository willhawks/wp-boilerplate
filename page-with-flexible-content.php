<?php get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

  <main <?php post_class(); ?>>

    <header class="page-header">

      <h1 class="page-title"><?php the_title(); ?></h1>

    </header>

    <?php

      if ( have_rows( 'page_blocks' ) ) : while ( have_rows( 'page_blocks' ) ) : the_row();

        get_template_part( 'template-parts/' . get_row_layout() );

      endwhile; endif;

    ?>

  </main>

<?php endwhile; endif; ?>

<?php get_footer(); ?>
