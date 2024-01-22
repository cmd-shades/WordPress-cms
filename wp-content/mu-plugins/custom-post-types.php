<?php

function university_post_types()
{
    // @see https://developer.wordpress.org/reference/functions/register_post_type/
    register_post_type('event', [
		'show_in_rest' => true, // show Gutenberg editor
		'supports'     => ['title', 'editor', 'excerpt',],
		'has_archive'  => true,
		'public'       => true,
		'labels'       => [
			'name'          => 'Events',
			'singular_name' => 'Event',
			'add_new'       => 'Add New Event',
			'add_new_item'  => 'Add New Event',
			'new_item'      => 'New Event',
			'edit_item'     => 'Edit Event',
			'view_item'     => 'View Event',
			'all_items'     => 'All Events',
			'search_items'  => 'Search Events',
		],
		'menu_icon'    => 'dashicons-calendar-alt', // @see https://developer.wordpress.org/resource/dashicons/
	]);
}

add_action('init', 'university_post_types');
