<?php

/* Template Name: Контакты */

$context         = Timber::context();
$context['post'] = Timber::get_post();
$context['address'] = get_field('address');

Timber::render( 'tmpl-contacts.twig', $context );
