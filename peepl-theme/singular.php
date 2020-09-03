<?php

// singular.php
// Individual posts and pages will be presented via this template.
// https://developer.wordpress.org/themes/basics/template-hierarchy/

get_header();

start_site_content();

if ( have_posts() ) {
    while ( have_posts() ) {
        the_post(); ?>

        <h1><?php the_title(); ?></h1>
      <?php if ( get_post_type() == 'post' ) { ?>
        <time datetime="<?php the_time( 'Y-m-d' ); ?>"><?php the_time('jS F Y'); ?></time>
      <?php } ?>

        <div class="longform">
            <?php the_content(); ?>
        </div>

<?php
    }
}

end_site_content();

get_footer();
