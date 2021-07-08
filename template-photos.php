<?php

/* Template Name: Фото */

$context         = Timber::context();
$context['post'] = Timber::get_post();
$context['photos'] = get_field('photos');

Timber::render( 'tmpl-photos.twig', $context );
