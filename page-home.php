<?php
/**
 *   Template Name: Home Page Template
 */

$context = Timber::get_context();
$post = new TimberPost();
$context['post'] = $post;
// $context['menu'] = the_field('menu', 'option');
Timber::render( 'page-home.twig', $context );
