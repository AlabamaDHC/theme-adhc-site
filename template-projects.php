<?php
/**
 * Template Name: Projects Page Template
 * Description: Template to display calendar on screen outside of ADHC
 */

$context = Timber::get_context();
$post = new TimberPost();
$context['post'] = $post;

$projects_query = new WP_Query(
    array(
        'numberposts'	=> -1,
        'post_type' => 'project',
        'posts_per_page' => 5,
        'paged' => $paged,
		'meta_key' => 'project_order',
		'orderby' => array(
        	'meta_value_num' => 'ASC',
        	'title' => 'ASC'
    	),
    )
);

$context['projects'] = new Timber\PostQuery($projects_query);
Timber::render( array( 'template-projects.twig' ), $context );
