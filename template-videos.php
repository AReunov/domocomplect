<?php
/* Template Name: Видео */

$context         = Timber::context();
$context['post'] = Timber::get_post();

//$videos = d($context['post']);

Timber::render( 'tmpl-videos.twig', $context );