<?php

/**
 * Diyar Theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Diyar Theme
 * @since Diyar Theme 1.0
 */


//include get_parent_theme_file_path("assets/php/shortcodes.php");


/**
 * Register block styles.
 */

if (!function_exists('diyar_theme_block_styles')):
    /**
     * Register custom block styles
     *
     * @since Diyar Theme 1.0
     * @return void
     */
    function diyar_theme_block_styles()
    {

        register_block_style(
            'core/details',
            array(
                'name' => 'arrow-icon-details',
                'label' => __('Arrow icon', 'diyar_theme'),
                /*
                 * Styles for the custom Arrow icon style of the Details block
                 */
                'inline_style' => '
				.is-style-arrow-icon-details {
					padding-top: var(--wp--preset--spacing--10);
					padding-bottom: var(--wp--preset--spacing--10);
				}

				.is-style-arrow-icon-details summary {
					list-style-type: "\2193\00a0\00a0\00a0";
				}
                        html.interface-interface-skeleton__html-container:not(:has(.is-zoom-out)) {
        position: static;
        width: auto;
        direction: ltr;
    }

				.is-style-arrow-icon-details[open]>summary {
					list-style-type: "\2192\00a0\00a0\00a0";
				}',
            )
        );
        register_block_style(
            'core/post-terms',
            array(
                'name' => 'pill',
                'label' => __('Pill', 'diyar_theme'),
                /*
                 * Styles variation for post terms
                 * https://github.com/WordPress/gutenberg/issues/24956
                 */
                'inline_style' => '
				.is-style-pill a,
				.is-style-pill span:not([class], [data-rich-text-placeholder]) {
					display: inline-block;
					background-color: var(--wp--preset--color--base-2);
					padding: 0.375rem 0.875rem;
					border-radius: var(--wp--preset--spacing--20);
				}

				.is-style-pill a:hover {
					background-color: var(--wp--preset--color--contrast-3);
				}',
            )
        );
        register_block_style(
            'core/list',
            array(
                'name' => 'checkmark-list',
                'label' => __('Checkmark', 'diyar_theme'),
                /*
                 * Styles for the custom checkmark list block style
                 * https://github.com/WordPress/gutenberg/issues/51480
                 */
                'inline_style' => '
				ul.is-style-checkmark-list {
					list-style-type: "\2713";
				}

				ul.is-style-checkmark-list li {
					padding-inline-start: 1ch;
				}',
            )
        );
        register_block_style(
            'core/navigation-link',
            array(
                'name' => 'arrow-link',
                'label' => __('With arrow', 'diyar_theme'),
                /*
                 * Styles for the custom arrow nav link block style
                 */
                'inline_style' => '
				.is-style-arrow-link .wp-block-navigation-item__label:after {
					content: "\2197";
					padding-inline-start: 0.25rem;
					vertical-align: middle;
					text-decoration: none;
					display: inline-block;
				}',
            )
        );
        register_block_style(
            'core/heading',
            array(
                'name' => 'asterisk',
                'label' => __('With asterisk', 'diyar_theme'),
                'inline_style' => "
				.is-style-asterisk:before {
					content: '';
					width: 1.5rem;
					height: 3rem;
					background: var(--wp--preset--color--contrast-2, currentColor);
					clip-path: path('M11.93.684v8.039l5.633-5.633 1.216 1.23-5.66 5.66h8.04v1.737H13.2l5.701 5.701-1.23 1.23-5.742-5.742V21h-1.737v-8.094l-5.77 5.77-1.23-1.217 5.743-5.742H.842V9.98h8.162l-5.701-5.7 1.23-1.231 5.66 5.66V.684h1.737Z');
					display: block;
				}

				/* Hide the asterisk if the heading has no content, to avoid using empty headings to display the asterisk only, which is an A11Y issue */
				.is-style-asterisk:empty:before {
					content: none;
				}

				.is-style-asterisk:-moz-only-whitespace:before {
					content: none;
				}

				.is-style-asterisk.has-text-align-center:before {
					margin: 0 auto;
				}

				.is-style-asterisk.has-text-align-right:before {
					margin-left: auto;
				}

				.rtl .is-style-asterisk.has-text-align-left:before {
					margin-right: auto;
				}",
            )
        );
    }
endif;

add_action('init', 'diyar_theme_block_styles');

/**
 * Enqueue block stylesheets.
 */

if (!function_exists('diyar_theme_block_stylesheets')):
    /**
     * Enqueue custom block stylesheets
     *
     * @since Diyar Theme 1.0
     * @return void
     */
    function diyar_theme_block_stylesheets()
    {
        /**
         * The wp_enqueue_block_style() function allows us to enqueue a stylesheet
         * for a specific block. These will only get loaded when the block is rendered
         * (both in the editor and on the front end), improving performance
         * and reducing the amount of data requested by visitors.
         *
         * See https://make.wordpress.org/core/2021/12/15/using-multiple-stylesheets-per-block/ for more info.
         */
        wp_enqueue_block_style(
            'core/button',
            array(
                'handle' => 'diyar_theme-button-style-outline',
                'src' => get_parent_theme_file_uri('assets/css/button-outline.css'),
                'ver' => wp_get_theme(get_template())->get('Version'),
                'path' => get_parent_theme_file_path('assets/css/button-outline.css'),
            )
        );
    }
endif;

add_action('init', 'diyar_theme_block_stylesheets');

/**
 * Register pattern categories.
 */

if (!function_exists('diyar_theme_pattern_categories')):
    /**
     * Register pattern categories
     *
     * @since Diyar Theme 1.0
     * @return void
     */
    function diyar_theme_pattern_categories()
    {

        register_block_pattern_category(
            'diyar_theme_page',
            array(
                'label' => _x('Pages', 'Block pattern category', 'diyar_theme'),
                'description' => __('A collection of full page layouts.', 'diyar_theme'),
            )
        );
    }
endif;

add_action('init', 'diyar_theme_pattern_categories');

function diyar_theme_setup()
{
    add_theme_support('wp-block-styles');
    // remove_theme_support('widgets-block-editor');

    add_editor_style(array(
        get_stylesheet_uri(),
        get_parent_theme_file_uri('assets/css/primary.css'),
        get_parent_theme_file_uri('assets/css/select2.min.css'),
        get_parent_theme_file_uri('assets/css/main.css'),
        get_parent_theme_file_uri('assets/css/homepagestyle.css'),
        get_parent_theme_file_uri('assets/css/about.css'),
        get_parent_theme_file_uri('assets/css/jquery.mCustomScrollbar.min.css'),
        get_parent_theme_file_uri('assets/css/custom.css'),
        get_parent_theme_file_uri('assets/css/fancybox.css'),
        get_parent_theme_file_uri('assets/css/media.css'),
        get_parent_theme_file_uri('assets/css/aos.css'),
        get_parent_theme_file_uri('assets/css/jquery-ui.css'),
        get_parent_theme_file_uri('assets/css/jquery.multiselect.css'),
        get_parent_theme_file_uri('assets/css/mgpopup.css'),
        get_parent_theme_file_uri('assets/css/arabfund.css')
    ));
}
add_action('after_setup_theme', 'diyar_theme_setup');


// add_action('after_setup_theme', 'diyar_theme_setup');

// function diyar_theme_setup()
// {
//     add_theme_support('wp-block-styles');
//     remove_theme_support('widgets-block-editor');
//     add_editor_style(array(
//         get_stylesheet_uri(),
//         get_parent_theme_file_uri('assets/css/primary.css')
//     ));
// }

// Importing CSS and JS files

add_action('wp_enqueue_scripts', 'diyar_theme_enqueue_styles');

function diyar_theme_enqueue_styles()
{
    wp_enqueue_style(
        'diyar_theme-style',
        get_stylesheet_uri()
    );
    wp_enqueue_style(
        'diyar_theme-select2',
        get_parent_theme_file_uri('assets/css/select2.min.css')
    );
    wp_enqueue_style(
        'diyar_theme-main',
        get_parent_theme_file_uri('assets/css/main.css')
    );
    wp_enqueue_style(
        'diyar_theme-homepagestyle',
        get_parent_theme_file_uri('assets/css/homepagestyle.css')
    );
    wp_enqueue_style(
        'diyar_theme-about',
        get_parent_theme_file_uri('assets/css/about.css')
    );

    wp_enqueue_style(
        'diyar_theme-mCustomScrollbar',
        get_parent_theme_file_uri('assets/css/jquery.mCustomScrollbar.min.css')
    );
    wp_enqueue_style(
        'diyar_theme-custom',
        get_parent_theme_file_uri('assets/css/custom.css')
    );
    wp_enqueue_style(
        'diyar_theme-fancybox',
        get_parent_theme_file_uri('assets/css/fancybox.css')
    );
    wp_enqueue_style(
        'diyar_theme-media',
        get_parent_theme_file_uri('assets/css/media.css')
    );
    wp_enqueue_style(
        'diyar_theme-aos',
        get_parent_theme_file_uri('assets/css/aos.css')
    );
    wp_enqueue_style(
        'diyar_theme-jquery',
        get_parent_theme_file_uri('assets/css/jquery-ui.css')
    );
    wp_enqueue_style(
        'diyar_theme-multiselect',
        get_parent_theme_file_uri('assets/css/jquery.multiselect.css')
    );
    wp_enqueue_style(
        'diyar_theme-mgpopup',
        get_parent_theme_file_uri('assets/css/mgpopup.css')
    );
    wp_enqueue_style(
        'diyar_theme-style',
        get_parent_theme_file_uri('assets/css/arabfund.css')
    );

    wp_register_script('aos', get_stylesheet_directory_uri() . '/assets/js/aos.js', array('jquery'), time());
    wp_enqueue_script('aos');
    wp_register_script('fancybox', get_stylesheet_directory_uri() . '/assets/js/fancybox.js', array('jquery'), time());
    wp_enqueue_script('fancybox');
    wp_register_script('customjs', get_stylesheet_directory_uri() . '/assets/js/custom.js', array('jquery'), time());
    wp_enqueue_script('customjs');
    wp_register_script('mCustomScrollbar', get_stylesheet_directory_uri() . '/assets/js/jquery.mCustomScrollbar.min.js', array('jquery'), time());
    wp_enqueue_script('mCustomScrollbar');
    wp_register_script('jquery-ui', get_stylesheet_directory_uri() . '/assets/js/jquery-ui.js', array('jquery'));
    wp_enqueue_script('jquery-ui');
    wp_register_script('multiselect', get_stylesheet_directory_uri() . '/assets/js/jquery.multiselect.js', array('jquery'));
    wp_enqueue_script('multiselect');

    wp_register_script('select2', get_stylesheet_directory_uri() . '/assets/js/select2.min.js', array('jquery'));
    wp_enqueue_script('select2');
    wp_register_script('magnific', get_stylesheet_directory_uri() . '/assets/js/magnific_popup.js', array('jquery'));
    wp_enqueue_script('magnific');
}



// Add Pattern to Dashboard Sidebar
function add_patterns_to_admin_menu()
{
    add_menu_page(
        __('Diyar Theme Patterns', '/wp-admin'), // Page title
        __('Diyar Theme Patterns', '/wp-admin'), // Menu title
        'edit_posts',                             // Capability
        'edit.php?post_type=wp_block',            // Menu slug
        '',                                       // Function (not needed here)
        'dashicons-screenoptions',                // Icon URL (or dashicon class)
        5                                        // Position in the menu
    );
}
add_action('admin_menu', 'add_patterns_to_admin_menu');

//  activate content duplication selected by default in polylang 
function polylang_default_content_duplication()
{
    if (function_exists('pll_current_language')) {
?>
        <script type="text/javascript">
            document.addEventListener('DOMContentLoaded', function() {
                const duplicateCheckbox = document.querySelector('#post_custom_keys input[name="pll_duplication"]');
                if (duplicateCheckbox && !duplicateCheckbox.checked) {
                    duplicateCheckbox.checked = true;
                }
            });
        </script>
    <?php
    }
}
add_action('admin_footer', 'polylang_default_content_duplication');




// Get the current year dynamically

function current_year_shortcode()
{
    return date('Y');
}
add_shortcode('current_year', 'current_year_shortcode');



// testing
