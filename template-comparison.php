<?php

/* Template Name: Сравнение технологий */

$context         = Timber::context();
$context['post'] = Timber::get_post();
//$context['address'] = get_field('address');

Timber::render( 'tmpl-comparison.twig', $context );
