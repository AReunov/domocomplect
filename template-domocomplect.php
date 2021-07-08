<?php
/* Template Name: Домокомплекты */

$context         = Timber::context();
$context['post'] = Timber::get_post();
$context['complects'] = get_field('complects');

Timber::render( 'tmpl-domocomplect.twig', $context );