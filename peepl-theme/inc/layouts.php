<?php

function set_layout( $id = 'default' ) {
    global $layout;
    $layout = $id;
}


function is_layout( $id = '' ) {
    global $layout;
    return $layout == $id;
}


function get_layout_meta( $key = null ) {
    global $layout;

    $layouts = array(
        'default' => array(
        ),
        'person-page' => array(
        ),
    );

    if ( isset($key) ) {
        // They want a specific key.
        if ( isset($layouts[$layout]) && array_key_exists($key, $layouts[$layout]) ) {
            return $layouts[$layout][$key];
        } else {
            return null;
        }
    } else {
        // They want all the settings as an array.
        if ( isset( $layouts[$layout] ) ) {
            return $layouts[$layout];
        } else {
            return array();
        }
    }
}


function get_the_layout( $post = null ) {
    $post = get_post( $post );
    $template = get_page_template_slug( $post );
    if ( $template ) {
        $matches = array();
        $t = preg_match(
            '%^layout-([^.]+)[.]php$%',
            $template,
            $matches
        );
        return $matches[1];
    } else {
        return 'default';
    }
}


function get_default_page_template_title() {
    return 'Default page';
}
add_filter( 'default_page_template_title', 'get_default_page_template_title' );


// Set default layout.
set_layout();
