<!doctype html>
<html lang="en">
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <?php wp_head(); ?>

  </head>
  <body <?php body_class(); ?>>

    <!-- <?php get_template_part( 'icons' ); ?> -->
    <header class="navbar" id="navbar">

      <div class="navbar-logo">
        
      
        <svg class="icon-leaf" width="433px" height="278px" viewBox="0 0 433 278">
            <!-- Generator: Sketch 51.3 (57544) - http://www.bohemiancoding.com/sketch -->
            <desc>Created with Sketch.</desc>
            <defs>
                <path d="M155.014265,-98.3484946 C98.7101208,-130.393012 32.3142989,-146.078115 -37.1214609,-139.536945 C-124.629321,-131.29313 -200.778645,-89.2839832 -253.884689,-27.6482122 C-264.962799,-14.7896042 -275.034707,-1.07655872 -284,13.3621875 C-261.580003,28.1264089 -237.85777,39.8160054 -213.376984,48.4496645 C-87.9684924,92.6779605 57.1457473,57.1580739 146.877241,-51.0403826 C149.18672,-53.8248311 151.4218,-56.6461356 153.622542,-59.4830132 C160.63058,-68.5163787 167.08609,-77.810332 173,-87.3233452 C167.128753,-91.1849247 161.133681,-94.8663767 155.014265,-98.3484946" id="path-1"></path>
                <filter x="-4.6%" y="-7.2%" width="109.2%" height="120.2%" filterUnits="objectBoundingBox" id="filter-2">
                    <feOffset dx="0" dy="6" in="SourceAlpha" result="shadowOffsetOuter1"></feOffset>
                    <feGaussianBlur stdDeviation="6" in="shadowOffsetOuter1" result="shadowBlurOuter1"></feGaussianBlur>
                    <feColorMatrix values="0 0 0 0 0   0 0 0 0 0   0 0 0 0 0  0 0 0 0.5 0" type="matrix" in="shadowBlurOuter1"></feColorMatrix>
                </filter>
            </defs>
            <g id="Symbols" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                <g id="Mobile-Nav-/-Closed" transform="translate(276.000000, 171.000000)">
                    <g id="Fill-1" transform="translate(-55.500000, -37.000000) rotate(41.000000) translate(55.500000, 37.000000) ">
                        <use fill="black" fill-opacity="1" filter="url(#filter-2)" xlink:href="#path-1"></use>
                        <use fill="#FFFFFF" fill-rule="evenodd" xlink:href="#path-1"></use>
                    </g>
                </g>
            </g>
        </svg>

        <a class="navbar-logo__link" href="<?php bloginfo('url'); ?>">
          <img class="navbar-logo__logo" src="<?php echo get_template_directory_uri(); ?>/dist/LGBTQFund_color_notag.png" alt="LGBTQ Fund of Mississippi"/>
        </a>
      </div>

      <div class="navbar-tag">
        <span class="navbar-tag__text">
          at <span class="transform">The Community Fund</span>
          <br>
          for <span class="transform">Mississippi</span>
        </span>
      </div>

      <div class="navbar-toggler">
        <button class="navbar-toggler__button" id="navbarToggler">
          <span></span>
          <span></span>
          <span></span>
        </button>
      </div>

      <nav class="navbar-nav">
        <div class="navbar-tag">
          <span class="navbar-tag__text">
            at <span class="transform">The Community Fund</span> for <span class="transform">Mississippi</span>
          </span>
        </div>
        <?php
          $main_menu = array(
            'theme_location' => 'main_menu',
            'menu_class' => 'navbar-nav__menu',
            'container' => false
          );

          wp_nav_menu( $main_menu );
        ?>

        <?php if ( have_rows( 'social_media', 'options' ) ) : ?>
          <ul class="navbar-nav__social">

            <?php while ( have_rows( 'social_media', 'options' ) ) : the_row(); ?>
              <?php if ( get_sub_field( 'facebook' ) ) : ?>
                <li class="social-media">
                  <a href="<?php the_sub_field( 'facebook' ); ?>" target="_blank">
                    <i class="fab fa-facebook-f fa-2x"></i>
                  </a>
                </li>
              <?php endif; ?>
              <?php if ( get_sub_field( 'twitter' ) ) : ?>
                <li class="social-media">
                  <a href="<?php the_sub_field( 'twitter' ); ?>" target="_blank">
                    <i class="fab fa-twitter fa-2x"></i>
                  </a>
                </li>
              <?php endif; ?>
              <?php if ( get_sub_field( 'instagram' ) ) : ?>
                <li class="social-media">
                  <a href="<?php the_sub_field( 'instagram' ); ?>" target="_blank">
                    <i class="fab fa-instagram fa-2x"></i>
                  </a>
                </li>
              <?php endif; ?>
            <?php endwhile; ?>

          </ul>
        <?php endif; ?>

      </nav>

    </header>

    <div class="page-container">
