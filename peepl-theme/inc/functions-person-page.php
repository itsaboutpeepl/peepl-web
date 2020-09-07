<?php

function the_person_page_header() {
    global $post;
    $siblings = get_person_page_siblings( $post );
    $author_id = $siblings[0]->post_author;
?>

    <div class="person-page-header">
        <div class="container-md">
            <?php echo get_avatar( $author_id, 128, 'mysteryman' ); ?>
            <nav>
                <h1><?php the_author_meta( 'first_name', $author_id ); ?></h1>
              <?php if ( count($siblings) > 1 ) { ?>
                <ul class="person-page-menu">
                    <?php foreach ( $siblings as $i => $sibling ) {
                        echo sprintf(
                            '<li><a href="%s" class="%s">%s</a></li>' . "\n",
                            esc_url( get_permalink($sibling) ),
                            $sibling->ID == $post->ID ? 'current' : '',
                            get_the_title($sibling)
                        );
                    } ?>
                </ul>
              <?php } ?>
            </nav>
        </div>
    </div>

<?php
}


function get_person_page_siblings( $post ) {
    $post_ids = get_post_ancestors( $post );
    $post_ids = array_reverse( $post_ids );
    $post_ids[] = $post->ID;
    $person_page_ancestor_id = null;

    foreach ( $post_ids as $i => $id ) {
        if ( get_the_layout($id) == 'person-page' ) {
            $person_page_ancestor_id = $id;
            break;
        }
    }

    if ( $person_page_ancestor_id ) {
        $this_page = get_post( $person_page_ancestor_id );
        $children = get_pages(array(
            'child_of' => $person_page_ancestor_id
        ));
        array_unshift( $children, $this_page );
        return $children;
    } else {
        return array();
    }
}
