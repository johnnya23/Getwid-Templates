<?php

/**
*Plugin Name: JMA Getwid Template
*Description: A home for Getwid Templates
*Version: 1.1.1
*Author: John Antonacci
*License: GPL2
 */

function jma_getwid_template_redirect()
{
    add_filter('getwid/core/get_template_part', 'jma_getwid_core_get_template_part', 10, 3);
}
add_action('template_redirect', 'jma_getwid_template_redirect');


function jma_getwid_core_get_template_part($template, $slug, $attributes)
{
    if (strpos($attributes['className'], 'template-') === 0) {
        $file = str_replace('template-', '', $attributes['className']);
        if (file_exists(plugin_dir_path(__FILE__) . 'templates/' . $file . '.php')) {
            $template = plugin_dir_path(__FILE__) . 'templates/' . $file . '.php';
        }
    }
    return $template;
}
