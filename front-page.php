<?php

$context          = Timber::context();
$context['post'] = new Timber\Post();
$context['banner'] = get_field('banner');
$context['form'] = get_field('banner')['cta_form'];

Timber::render( 'front-page.twig', $context );