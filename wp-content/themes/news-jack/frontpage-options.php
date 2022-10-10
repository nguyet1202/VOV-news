<?php

/**
 * Option Panel
 *
 * @package Newsjack
 */

function newsjack_customize_register($wp_customize) {

$newsup_default = newsjack_get_default_theme_options();


$wp_customize->add_section('newsup_flash_posts_section_settings',
    array(
        'title' => esc_html__('Latest Posts', 'news-jack'),
        'priority' => 20,
        'capability' => 'edit_theme_options',
        'panel' => 'frontpage_option_panel',
    )
);


$wp_customize->add_section('newsjack_top_recent_post_settings',
    array(
        'title' => esc_html__('Top Recent Post', 'news-jack'),
        'priority' => 40,
        'capability' => 'edit_theme_options',
        'panel' => 'frontpage_option_panel',
    )
);

// Setting - drop down category for slider.
$wp_customize->add_setting('select_newsjack_top_recent_post',
    array(
        'default' => $newsup_default['select_top_post_category'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'absint',
    )
);


$wp_customize->add_control(new Newsup_Dropdown_Taxonomies_Control($wp_customize, 'select_newsjack_top_recent_post',
    array(
        'label' => esc_html__('Category', 'news-jack'),
        'description' => esc_html__('Select Category for top recent Post', 'news-jack'),
        'section' => 'newsjack_top_recent_post_settings',
        'type' => 'dropdown-taxonomies',
        'taxonomy' => 'category',
        'priority' => 50,
        'active_callback' => 'newsup_main_banner_section_status'
)));


//section title
$wp_customize->add_setting('main_editor_section_title',
    array(
        'sanitize_callback' => 'sanitize_text_field',
    )
);

$wp_customize->add_control(
    new newsup_Section_Title(
        $wp_customize,
        'main_editor_section_title',
        array(
            'label'             => esc_html__( 'Editor Section ', 'news-jack' ),
            'section'           => 'frontpage_main_banner_section_settings',
            'priority'          => 50,
            'active_callback' => 'newsup_main_banner_section_status'
        )
    )
);

// Setting - drop down category for slider.
$wp_customize->add_setting('select_editor_news_category',
    array(
        'default' => $newsup_default['select_editor_news_category'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'absint',
    )
);


$wp_customize->add_control(new Newsup_Dropdown_Taxonomies_Control($wp_customize, 'select_editor_news_category',
    array(
        'label' => esc_html__('Category', 'news-jack'),
        'description' => esc_html__('Select Category editor post', 'news-jack'),
        'section' => 'frontpage_main_banner_section_settings',
        'type' => 'dropdown-taxonomies',
        'taxonomy' => 'category',
        'priority' => 50,
        'active_callback' => 'newsup_main_banner_section_status'
)));



//section title
$wp_customize->add_setting('main_trending_section_title',
    array(
        'sanitize_callback' => 'sanitize_text_field',
    )
);

$wp_customize->add_control(
    new newsup_Section_Title(
        $wp_customize,
        'main_trending_section_title',
        array(
            'label'             => esc_html__( 'Trending Section ', 'news-jack' ),
            'section'           => 'frontpage_main_banner_section_settings',
            'priority'          => 90,
            'active_callback' => 'newsup_main_banner_section_status'
        )
    )
);
// Setting - drop down category for slider.
$wp_customize->add_setting('select_trending_news_category',
    array(
        'default' => $newsup_default['select_top_post_category'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'absint',
    )
);


$wp_customize->add_control(new Newsup_Dropdown_Taxonomies_Control($wp_customize, 'select_trending_news_category',
    array(
        'label' => esc_html__('Category', 'news-jack'),
        'description' => esc_html__('Select Category for trending Post', 'news-jack'),
        'section' => 'frontpage_main_banner_section_settings',
        'type' => 'dropdown-taxonomies',
        'taxonomy' => 'category',
        'priority' => 90,
        'active_callback' => 'newsup_main_banner_section_status'
)));

}
add_action('customize_register', 'newsjack_customize_register');
