<?php

function university_files()
{
    wp_enqueue_script('main-university-js', get_theme_file_uri('build/index.js', ['jquery'], '1.0', true));
    wp_enqueue_style('roboto-google-font', 'https://fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i|Roboto:100,300,400,400i,700,700i');
    wp_enqueue_style('font-awesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
    wp_enqueue_style('university_main_styles', get_theme_file_uri('build/style-index.css'));
    wp_enqueue_style('university_extra_styles', get_theme_file_uri('build/index.css'));
}

add_action('wp_enqueue_scripts', 'university_files');

function university_features()
{
    // Give WordPress title tag control
    add_theme_support('title-tag');
    // Set up navigation
    register_nav_menu('headerNavigation', 'Header Navigation Location');
    register_nav_menu('footerNavOne', 'Footer Location 1');
    register_nav_menu('footerNavTwo', 'Footer Location 2');
}

add_action('after_setup_theme', 'university_features');

function university_adjust_queries($query)
{
    // ensures that by default events do not show expired events
    if (false === is_admin() && is_post_type_archive('event') && $query->is_main_query()) {
        $query->set('meta_key', 'event_date');
        $query->set('orderby', 'meta_value_num');
        $query->set('order', 'ASC');
        $query->set('meta_query', [
            [
                'key'     => 'event_date',
                'compare' => '>=',
                'value'   => date('Ymd'),
                'type'    => 'numeric'
            ]
        ]);
    }
}

add_action('pre_get_posts', 'university_adjust_queries');
