<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

    <?php wp_body_open(); ?>

    <header class="navbar navbar-expand-md navbar-dark">
        <div class="container-md">

            <?php echo get_navbar_brand(); ?>

          <?php if ( has_nav_menu( 'header' ) ) { ?>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                Menu
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <?php wp_nav_menu(
                    array(
                        'theme_location' => 'header',
                        'menu_class' => 'navbar-nav ml-auto',
                        'container' => false,
                        'depth' => 2,
                        'fallback_cb' => 'WP_Bootstrap_Navwalker::fallback',
                        'walker' => new WP_Bootstrap_Navwalker()
                    )
                ); ?>
            </div>
          <?php } ?>

        </div>
    </header>

  <?php if ( is_layout('person-page') ) {
    the_person_page_header();
  } ?>
