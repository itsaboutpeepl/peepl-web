<?php

// https://codex.wordpress.org/Automatic_Feed_Links
add_theme_support( 'automatic-feed-links' );


// https://codex.wordpress.org/Title_Tag
add_theme_support( 'title-tag' );


// https://developer.wordpress.org/reference/functions/add_theme_support/#html5
// We also include 'script' and 'style' here, so that WordPress 5.3+ uses
// the HTML5-style tags without `type` attributes.
add_theme_support( 'html5', array(
    'comment-list',
    'comment-form',
    'search-form',
    'gallery',
    'caption',
    'script',
    'style',
) );


// https://developer.wordpress.org/reference/functions/add_theme_support/#post-thumbnails
add_theme_support( 'post-thumbnails' );


// https://developer.wordpress.org/reference/functions/add_theme_support/#customize-selective-refresh-widgets
add_theme_support( 'customize-selective-refresh-widgets' );


// https://developer.wordpress.org/block-editor/developers/themes/theme-support/#wide-alignment
add_theme_support( 'align-wide' );


// https://developer.wordpress.org/block-editor/developers/themes/theme-support/#editor-styles
add_theme_support('editor-styles');


https://developer.wordpress.org/block-editor/developers/themes/theme-support/#default-block-styles
add_theme_support( 'wp-block-styles' );


// https://developer.wordpress.org/block-editor/developers/themes/theme-support/#responsive-embedded-content
add_theme_support( 'responsive-embeds' );


// https://developer.wordpress.org/themes/functionality/custom-logo/
add_theme_support( 'custom-logo' );


// https://developer.wordpress.org/block-editor/developers/themes/theme-support/#block-color-palettes
add_theme_support( 'editor-color-palette', array(
    // This list of colours should match the colours in _variables.scss
    array(
        'name' => 'Blue',
        'slug' => 'blue',
        'color' => '#007bff',
    ),
    array(
        'name' => 'Indigo',
        'slug' => 'indigo',
        'color' => '#6610f2',
    ),
    array(
        'name' => 'Purple',
        'slug' => 'purple',
        'color' => '#6f42c1',
    ),
    array(
        'name' => 'Pink',
        'slug' => 'pink',
        'color' => '#e83e8c',
    ),
    array(
        'name' => 'Red',
        'slug' => 'red',
        'color' => '#dc3545',
    ),
    array(
        'name' => 'Orange',
        'slug' => 'orange',
        'color' => '#fd7e14',
    ),
    array(
        'name' => 'Yellow',
        'slug' => 'yellow',
        'color' => '#ffc107',
    ),
    array(
        'name' => 'Green',
        'slug' => 'green',
        'color' => '#28a745',
    ),
    array(
        'name' => 'Teal',
        'slug' => 'teal',
        'color' => '#20c997',
    ),
    array(
        'name' => 'Cyan',
        'slug' => 'cyan',
        'color' => '#17a2b8',
    ),
) );
