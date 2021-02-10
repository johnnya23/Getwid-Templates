<?php

$base_class = esc_attr($extra_attr['block_name']);

$class_array = explode(' ', $attributes['className']);
$href = get_permalink();
$target = '_self';
if (function_exists('get_field') && get_field('image_link', $post->ID)) {
    $href = get_field('image_link', $post->ID);
    $rel = ' rel="bookmark noopener noreferrer"';
    $target = '_blank';
}

$x = '<article >';
$x .= '<div class="jma-inner-wrap ' . esc_attr($base_class . ' ' . $attributes['className']) . '" style="position:relative">';

$x .= '<div class="jma-image">';
$x .= '<a href="' . $href . '" target="' . $target . '"' . $rel. '>';
$x .= get_the_post_thumbnail($post, 'jma-gbs-grid', array('style' => 'width:100%));
$x .= '</a>';
$x .= '</div>';

$x .= '<div class="jma-title-content-wrap" style="position:absolute;width:90%;text-align:center;line-height:110%;padding:3px;background:rgba(255,255,255,0.65);top:50%;left:50%;transform:translate(-50%,-50%);pointer-events:none;">';

$x .= '<span class="jma-title">' . wp_kses_post(get_the_title($post)) . '</span>';
if (strpos($attributes['className'], 'with-excerpt') !== false) {
    $x .= '<div class="jma-content">';
    $x .= wp_kses_post(get_the_excerpt());
    $x .= '</div>';
}
$x .= '</div>';

$x .= '</div>';
$x .= '</article>';
echo $x;
