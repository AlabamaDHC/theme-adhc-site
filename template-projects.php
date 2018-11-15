<?php
/**
 * Template Name: Projects Page Template
 * Description: Template to display calendar on screen outside of ADHC
 */

$context = Timber::get_context();
$post = new TimberPost();
$context['post'] = $post;
$args = new WP_Query(
    array(
        'numberposts'	=> -1,
        'post_type' => 'project',
        'posts_per_page' => 5,
        'paged' => $paged
    )
);

// $context['projects'] = Timber::get_posts( $args );
$context['projects'] = new Timber\PostQuery($args);
// $context['events'] = $events;

Timber::render( array( 'template-projects.twig' ), $context );
