<?php
/**
 * Template Name: Event Screen Template
 * Description: Template to display calendar on screen outside of ADHC
 */

$context = Timber::get_context();
$post = new TimberPost();
$context['post'] = $post;
$args = new WP_Query(
    array(
        'numberposts'	=> -1,
        'post_type' => 'event',
    )
);

$context['events'] = Timber::get_posts( $args );
// $context['events'] = $events;

Timber::render( array( 'template-screen.twig' ), $context );
