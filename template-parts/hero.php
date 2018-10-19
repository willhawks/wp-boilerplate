<?php if ( get_field( 'hero' ) ) : ?>

  <div class="hero">

    <?php $hero = get_field( 'hero' ); ?>

    <img src="<?php echo $hero['sizes']['large']; ?>" alt="<?php echo $hero['alt']; ?>" class="hero__image" />

    <?php if ( get_field( 'hero_text' ) ) : ?>

        <h1 class="hero__text"><?php the_field( 'hero_text'); ?></h1>

    <?php endif; ?>

    <svg data-color="<?php the_field( 'swoop_color' ); ?>" viewBox="0 0 1320 212" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
        <defs>
            <linearGradient x1="74.9909682%" y1="50%" x2="0%" y2="50%" id="linearGradient-1">
                <stop stop-color="<?php echo adjustBrightness( get_field( 'swoop_color' ), 25); ?>" offset="0%"></stop>
                <stop stop-color="<?php the_field( 'swoop_color' ); ?>" offset="100%"></stop>
            </linearGradient>
        </defs>
        <g id="Symbols" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
            <g id="Artboard" transform="translate(-15.000000, -4.000000)">
                <polygon id="Path-2" fill="#FFFFFF" fill-rule="nonzero" points="18.8939993 61.6563574 18.8939993 216 1335 216 1335 77.219727 1316.8012 77.219727 738.730968 181.743317 379.139314 161.783295 108.04098 77.219727"></polygon>
                <path d="M32.9580178,22.0616912 C132.651426,67.2144215 237.189457,101.212782 344.023258,123.278862 C450.855058,145.379893 559.950616,155.523679 668.727068,153.898956 C777.50452,152.194344 885.869834,138.720225 991.251148,113.530522 C1096.63746,88.3747708 1199.01277,51.5323957 1295.94625,4 L1331,78.0662155 C1227.17021,125.170212 1118.25171,160.670467 1006.93941,183.733151 C895.631105,206.832783 781.965015,217.464885 668.727068,215.838164 C555.48512,214.13555 442.549274,200.173115 332.69146,173.983812 C222.826644,147.832456 116.070869,109.488186 15,60.0045243 L32.9580178,22.0616912 Z" id="Fill-4" fill="url(#linearGradient-1)"></path>
            </g>
        </g>
    </svg>


  </div>

<?php endif; ?>