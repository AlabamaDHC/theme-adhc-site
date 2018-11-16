<?php
/**
 *   Template Name: Home Page Template
 */

$context = Timber::get_context();
$post = new TimberPost();
$context['post'] = $post;

$projects_query = new WP_Query(
    array(
        'numberposts'	=> 3,
        'post_type' => 'event',
    )
);

$context['events'] = new Timber\PostQuery($projects_query);

Timber::render( 'page-home.twig', $context );
