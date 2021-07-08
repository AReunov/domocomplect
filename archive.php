<?php

$term = get_queried_object();

$context          = Timber::context();
$context['posts'] = new Timber\PostQuery();
$context['nav_type'] = get_field('nav_type', $term);
$templates        = array( 'archive.twig' );
$context['title'] = 'Archive';

if(is_category()){
    $context['title'] = single_cat_title('', false);
}
if(is_post_type_archive()){
    $context['title'] = 'ПАРТНЕРЫ И ДИЛЕРЫ';
}


Timber::render( $templates, $context );