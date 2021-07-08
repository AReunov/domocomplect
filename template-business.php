<?php
/* Template Name: Бизнес: родительская */

$context         = Timber::context();
$context['post'] = Timber::get_post();


Timber::render( 'tmpl-business.twig', $context );