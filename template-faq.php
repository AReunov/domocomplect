<?php
/* Template Name: Вопрос-ответ */

$context         = Timber::context();
$context['post'] = Timber::get_post();
$context['questions'] = get_field('questions');

Timber::render( 'tmpl-faq.twig', $context );