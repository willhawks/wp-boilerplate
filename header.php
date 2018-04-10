<!doctype html>
<html lang="en">
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <?php wp_head(); ?>

  </head>
  <body <?php body_class(); ?>>

    <header class="navbar">

      <div class="navbar-logo">
        <a class="navbar-logo__link" href="<?php bloginfo('url'); ?>">
          <img class="navbar-logo__logo" src="<?php echo get_template_directory_uri(); ?>/assets/img/jay-hughes-logo.png" alt="Jay Hughes Logo"/>
        </a>
      </div>

      <div class="navbar-toggler">
        <button class="navbar-toggler__button" id="navbarToggler">
          <span></span>
          <span></span>
          <span></span>
        </div>
      </div>

      <nav class="navbar-nav">

        <?php
          $main_menu = array(
            'theme_location' => 'main_menu',
            'menu_class' => 'navbar-nav__menu',
            'container' => false
          );

          wp_nav_menu( $main_menu );
        ?>

      </nav>

    </header>

    <div class="page-container">
