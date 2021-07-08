<?php
/* Template Name: Бизнес: дочерняя */

$context         = Timber::context();
$context['post'] = Timber::get_post();


Timber::render( 'tmpl-business-child.twig', $context );