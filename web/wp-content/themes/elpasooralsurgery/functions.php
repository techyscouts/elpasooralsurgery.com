<?php

/*
|--------------------------------------------------------------------------
| Register The Auto Loader
|--------------------------------------------------------------------------
|
| Composer provides a convenient, automatically generated class loader for
| our theme. We will simply require it into the script here so that we
| don't have to worry about manually loading any of our classes later on.
|
*/

if (! file_exists($composer = __DIR__.'/vendor/autoload.php')) {
    wp_die(__('Error locating autoloader. Please run <code>composer install</code>.', 'sage'));
}

require $composer;


/*
|--------------------------------------------------------------------------
| Register The Bootloader
|--------------------------------------------------------------------------
|
| The first thing we will do is schedule a new Acorn application container
| to boot when WordPress is finished loading the theme. The application
| serves as the "glue" for all the components of Laravel and is
| the IoC container for the system binding all of the various parts.
|
*/

try {
    \Roots\bootloader()->boot();
} catch (Throwable $e) {
    wp_die(
        __('You need to install Acorn to use this theme.', 'sage'),
        '',
        [
            'link_url' => 'https://roots.io/acorn/docs/installation/',
            'link_text' => __('Acorn Docs: Installation', 'sage'),
        ]
    );
}

/*
|--------------------------------------------------------------------------
| Register Sage Theme Files
|--------------------------------------------------------------------------
|
| Out of the box, Sage ships with categorically named theme files
| containing common functionality and setup to be bootstrapped with your
| theme. Simply add (or remove) files from the array below to change what
| is registered alongside Sage.
|
*/

collect(['setup', 'filters'])
    ->each(function ($file) {
        if (! locate_template($file = "app/{$file}.php", true, true)) {
            wp_die(
                /* translators: %s is replaced with the relative file path */
                sprintf(__('Error locating <code>%s</code> for inclusion.', 'sage'), $file)
            );
        }
    });



add_theme_support('sage');

// if (function_exists('acf_add_options_page')) {
//     acf_add_options_page([
//         'page_title' => __('Theme Options', 'sage'),
//         'capability' => 'manage_options',
//         'position' => '81',
//     ]);
// }

add_action('acf/init', function() {
  if( function_exists('acf_add_options_page') ) {

    acf_add_options_page(array(
        'page_title'    => 'Theme Options',
        'menu_title'    => 'Theme Options', 
        'capability'    => 'edit_posts',
        'redirect'      => false
    ));
  }
});

/*** Admin Login ***/
function login_logo()
{
    echo '<style type="text/css">
        #login { padding: 10% 0 0; position: relative; z-index: 9;}
        body{background-image: url(' .
        get_bloginfo('template_directory') .
        '/resources/images/admin-banner.webp) !important;background-size: cover !important; position: relative; background-position: 45%; background-repeat: no-repeat; }
        body::before { content: ""; position: absolute; left: 0; top: 0; width: 100%; height: 100%;background: rgb(222 222 222 / 80%); opacity: 0.8; }
        p a{color:#6D6E6F;}
        .privacy-policy-page-link a{color:#6D6E6F;}
        h1 a{background-image: url(' .
        get_bloginfo('template_directory') .
        '/resources/images/El_paso.webp) !important;background-size: 95% !important; width:80% !important;margin: 0 auto !important; box-shadow: none !important; height: 140px !important; margin: 20px auto !important; box-shadow: none !important;height: 98px !important; background-size: contain !important;}
        #nav a{color:#3c434a !important;}
        #backtoblog a{color:#3c434a !important;}
        .wp-core-ui .button-primary {
            background: #6D6E6F;
            border-color: #6D6E6F;
            color: #ffffff;
            text-decoration: none;
            text-shadow: none;
        }.wp-core-ui .button-secondary {
            color: #ffffff;}
        .wp-core-ui .button-primary:hover {
            background: #7c7c7c;
            border-color: #7c7c7c;
            color: #fff;
        }input[type=password]:focus,input[type=text]:focus,input[type=checkbox]:focus{border-color: #6D6E6F;
            box-shadow: 0 0 0 1px #6D6E6F;
            outline: 2px solid transparent;}
            .login #backtoblog a:hover, .login #nav a:hover, .login h1 a:hover {
    color: #135e96 !important;
}
        </style>';
}
add_action('login_head', 'login_logo');

add_filter('wpcf7_autop_or_not', '__return_false');

/**
 * Replace CF7 input with button tag
 */
remove_action('wpcf7_init', 'wpcf7_add_form_tag_submit');
add_filter('wpcf7_init', function () {
    wpcf7_add_form_tag('submit', function ($tag) {
        $class = wpcf7_form_controls_class($tag->type, 'has-spinner');
        $atts = [];
        $atts['class'] = $tag->get_class_option($class);
        $atts['id'] = $tag->get_id_option();
        $atts['tabindex'] = $tag->get_option('tabindex', 'signed_int', true);
        $atts['label'] = $tag->get_option('label', 'signed_int', true);
        $value = isset($tag->values[0]) ? $tag->values[0] : '';

        if (empty($value)) {
            $value = __('Send');
        }

        $atts['type'] = 'submit';
        $atts['value'] = $value;

        $atts = wpcf7_format_atts($atts);
        $html = sprintf('<button %1$s >%2$s</button>', $atts, $value);
        return $html;
    });
});

function my_login_logo_url()
{
    return esc_url(home_url('/'));
}
add_filter('login_headerurl', 'my_login_logo_url');

add_filter('acf/settings/save_json', 'my_acf_json_save_point');
function my_acf_json_save_point($path)
{
    $path = get_template_directory() . '/resources/acf-json';

    // Check if the directory exists, if not, create it
    if (!file_exists($path)) {
        mkdir($path, 0755, true);
    }

    return $path;
}

add_action('init', 'register_cpt_our_doctors');

function register_cpt_our_doctors()
{
    register_post_type('our-doctors', [
        'labels' => [
            'name' => _x('Our Doctors', 'our-doctors'),
            'singular_name' => _x('Our Doctors', 'our-doctors'),
            'add_new' => _x('Add New', 'our-doctors'),
            'add_new_item' => _x('Add New Our Doctors', 'our-doctors'),
            'edit_item' => _x('Edit Doctors', 'our-doctors'),
            'new_item' => _x('New Our Doctors', 'our-doctors'),
            'view_item' => _x('View Doctors', 'our-doctors'),
            'search_items' => _x('Search Doctors', 'our-doctors'),
            'not_found' => _x('No Doctors found', 'our-doctors'),
            'not_found_in_trash' => _x('No Doctors found in Trash', 'our-doctors'),
            'parent_item_colon' => _x('Parent Our Doctors:', 'our-doctors'),
            'menu_name' => _x('Our Doctors', 'our-doctors'),
        ],
        'hierarchical' => true,
        'description' => '',
        'supports' => ['title', 'editor', 'excerpt', 'author', 'thumbnail', 'revisions', 'page-attributes'],
        'taxonomies' => [],
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_icon' => 'dashicons-businessperson',
        'menu_position' => '5',
        'show_in_nav_menus' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => false,
        'has_archive' => false,
        'query_var' => true,
        'can_export' => true,
        'capability_type' => 'post',
        'rewrite' => true,
        'show_in_rest' => true,
    ]);
}

add_action('init', 'register_cpt_procedure');

function register_cpt_procedure()
{
    register_post_type('procedure', [
        'labels' => [
            'name' => _x('Our Procedures', 'procedure'),
            'singular_name' => _x('Our Procedures', 'procedure'),
            'add_new' => _x('Add New', 'procedure'),
            'add_new_item' => _x('Add New Procedures', 'procedure'),
            'edit_item' => _x('Edit Procedures', 'procedure'),
            'new_item' => _x('New Procedures', 'procedure'),
            'view_item' => _x('View Procedures', 'procedure'),
            'search_items' => _x('Search Procedures', 'procedure'),
            'not_found' => _x('No Procedures found', 'procedure'),
            'not_found_in_trash' => _x('No Procedures found in Trash', 'procedure'),
            'parent_item_colon' => _x('Parent Procedures:', 'procedure'),
            'menu_name' => _x('Procedures', 'procedure'),
        ],
        'hierarchical' => true,
        'description' => '',
        'supports' => ['title', 'editor', 'excerpt', 'author', 'thumbnail', 'revisions'],
        'taxonomies' => ['procedure_category'],
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_icon' => 'dashicons-image-filter',
        'menu_position' => '5',
        'show_in_nav_menus' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => false,
        'has_archive' => false,
        'query_var' => true,
        'can_export' => true,
        'capability_type' => 'post',
        'rewrite' => true,
        'show_in_rest' => true,
    ]);
}

add_action('init', 'register_tax_procedure_category');

function register_tax_procedure_category()
{
    register_taxonomy(
        'procedure-category',
        ['procedure'],
        [
            'labels' => [
                'name' => _x('Procedure Categories', 'Taxonomy General Name', 'procedure-category'),
                'singular_name' => _x('Procedure Category', 'Taxonomy Singular Name', 'procedure-category'),
                'menu_name' => __('Procedure Categories', 'procedure-category'),
                'all_items' => __('All Procedure Categories', 'procedure-category'),
                'parent_item' => __('Parent Procedure Category', 'procedure-category'),
                'parent_item_colon' => __('Parent Procedure Category:', 'procedure-category'),
                'new_item_name' => __('New Procedure Category', 'procedure-category'),
                'add_new_item' => __('Add New Procedure Category', 'procedure-category'),
                'edit_item' => __('Edit Procedure Category', 'procedure-category'),
                'update_item' => __('Update Procedure Category', 'procedure-category'),
                'view_item' => __('View Procedure Category', 'procedure-category'),
                'separate_items_with_commas' => __('Separate Procedure Categories with Commas', 'procedure-category'),
                'add_or_remove_items' => __('Add or Remove Procedure Categories', 'procedure-category'),
                'choose_from_most_used' => __('Choose from the Most Used Procedure Categories', 'procedure-category'),
                'popular_items' => __('Popular Procedure Categories', 'procedure-category'),
                'search_items' => __('Search Procedure Categories', 'procedure-category'),
                'not_found' => __('Not Found', 'procedure-category'),
                'no_terms' => __('No Procedure Categories', 'procedure-category'),
                'items_list' => __('Procedure Categories List', 'procedure-category'),
                'items_list_navigation' => __('Procedure Categories List Navigation', 'procedure-category'),
            ],
            'hierarchical' => true,
            'public' => true,
            'show_ui' => true,
            'show_admin_column' => true,
            'show_in_nav_menus' => true,
            'show_tagcloud' => true,
        ],
    );
}

add_action('init', 'register_cpt_patient_reviews');

function register_cpt_patient_reviews()
{
    register_post_type('patient-reviews', [
        'labels' => [
            'name' => _x('Patient Reviews', 'patient-reviews'),
            'singular_name' => _x('Patient Reviews', 'patient-reviews'),
            'add_new' => _x('Add New', 'patient-reviews'),
            'add_new_item' => _x('Add New Patient Review', 'patient-reviews'),
            'edit_item' => _x('Edit Patient Review', 'patient-reviews'),
            'new_item' => _x('New Patient Review', 'patient-reviews'),
            'view_item' => _x('View Patient Review', 'patient-reviews'),
            'search_items' => _x('Search Patient Review', 'patient-reviews'),
            'not_found' => _x('No Patient Review found', 'patient-reviews'),
            'not_found_in_trash' => _x('No Patient Review found in Trash', 'patient-reviews'),
            'parent_item_colon' => _x('Parent Patient Review:', 'patient-reviews'),
            'menu_name' => _x('Patient Review', 'patient-reviews'),
        ],
        'hierarchical' => true,
        'description' => '',
        'supports' => ['title', 'editor', 'excerpt', 'author', 'thumbnail', 'revisions'],
        'taxonomies' => ['patient_category'],
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_icon' => 'dashicons-star-filled',
        'menu_position' => '5',
        'show_in_nav_menus' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => false,
        'has_archive' => false,
        'query_var' => true,
        'can_export' => true,
        'capability_type' => 'post',
        'rewrite' => true,
        'show_in_rest' => true,
    ]);
}

add_action('init', 'register_tax_patient_category');

function register_tax_patient_category()
{
    register_taxonomy(
        'patient-category',
        ['patient-reviews'],
        [
            'labels' => [
                'name' => _x('Patient Categories', 'Taxonomy General Name', 'patient-category'),
                'singular_name' => _x('Patient Category', 'Taxonomy Singular Name', 'patient-category'),
                'menu_name' => __('Patient Categories', 'patient-category'),
                'all_items' => __('All Patient Categories', 'patient-category'),
                'parent_item' => __('Parent Patient Category', 'patient-category'),
                'parent_item_colon' => __('Parent Patient Category:', 'patient-category'),
                'new_item_name' => __('New Patient Category', 'patient-category'),
                'add_new_item' => __('Add New Patient Category', 'patient-category'),
                'edit_item' => __('Edit Patient Category', 'patient-category'),
                'update_item' => __('Update Patient Category', 'patient-category'),
                'view_item' => __('View Patient Category', 'patient-category'),
                'separate_items_with_commas' => __('Separate Patient Categories with Commas', 'patient-category'),
                'add_or_remove_items' => __('Add or Remove Patient Categories', 'patient-category'),
                'choose_from_most_used' => __('Choose from the Most Used Patient Categories', 'patient-category'),
                'popular_items' => __('Popular Patient Categories', 'patient-category'),
                'search_items' => __('Search Patient Categories', 'patient-category'),
                'not_found' => __('Not Found', 'patient-category'),
                'no_terms' => __('No Patient Categories', 'patient-category'),
                'items_list' => __('Patient Categories List', 'patient-category'),
                'items_list_navigation' => __('Patient Categories List Navigation', 'patient-category'),
            ],
            'hierarchical' => true,
            'public' => true,
            'show_ui' => true,
            'show_admin_column' => true,
            'show_in_nav_menus' => true,
            'show_tagcloud' => true,
        ],
    );
}

add_action('init', 'register_cpt_instructions');

function register_cpt_instructions()
{
    register_post_type('instructions', [
        'labels' => [
            'name' => _x('Instructions', 'instructions'),
            'singular_name' => _x('Instructions', 'instructions'),
            'add_new' => _x('Add New', 'instructions'),
            'add_new_item' => _x('Add New Instructions', 'instructions'),
            'edit_item' => _x('Edit Instructions', 'instructions'),
            'new_item' => _x('New Instructions', 'instructions'),
            'view_item' => _x('View Instructions', 'instructions'),
            'search_items' => _x('Search Instructions', 'instructions'),
            'not_found' => _x('No Instructions found', 'instructions'),
            'not_found_in_trash' => _x('No Instructions found in Trash', 'instructions'),
            'parent_item_colon' => _x('Parent Instructions:', 'instructions'),
            'menu_name' => _x('Instructions', 'instructions'),
        ],
        'hierarchical' => true,
        'description' => '',
        'supports' => ['title', 'editor', 'excerpt', 'author', 'thumbnail', 'revisions'],
        'taxonomies' => ['instructions_category'],
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_icon' => 'dashicons-welcome-write-blog',
        'menu_position' => '5',
        'show_in_nav_menus' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => false,
        'has_archive' => false,
        'query_var' => true,
        'can_export' => true,
        'capability_type' => 'post',
        'rewrite' => true,
        'show_in_rest' => true,
    ]);
}

add_action('init', 'register_tax_instructions_category');

function register_tax_instructions_category()
{
    register_taxonomy(
        'instructions-category',
        ['instructions'],
        [
            'labels' => [
                'name' => _x('Category', 'Taxonomy General Name', 'instructions-category'),
                'singular_name' => _x('Category', 'Taxonomy Singular Name', 'instructions-category'),
                'menu_name' => __('Category', 'instructions-category'),
                'all_items' => __('All Category', 'instructions-category'),
                'parent_item' => __('Parent Category', 'instructions-category'),
                'parent_item_colon' => __('Parent Category:', 'instructions-category'),
                'new_item_name' => __('New Category', 'instructions-category'),
                'add_new_item' => __('Add New Category', 'instructions-category'),
                'edit_item' => __('Edit Category', 'instructions-category'),
                'update_item' => __('Update Category', 'instructions-category'),
                'view_item' => __('View Category', 'instructions-category'),
                'separate_items_with_commas' => __('Separate Category with Commas', 'instructions-category'),
                'add_or_remove_items' => __('Add or Remove Category', 'instructions-category'),
                'choose_from_most_used' => __('Choose from the Most Used Category', 'instructions-category'),
                'popular_items' => __('Popular Category', 'instructions-category'),
                'search_items' => __('Search Category', 'instructions-category'),
                'not_found' => __('Not Found', 'instructions-category'),
                'no_terms' => __('No Category', 'instructions-category'),
                'items_list' => __('Category List', 'instructions-category'),
                'items_list_navigation' => __('Category List Navigation', 'instructions-category'),
            ],
            'hierarchical' => true,
            'public' => true,
            'show_ui' => true,
            'show_admin_column' => true,
            'show_in_nav_menus' => true,
            'show_tagcloud' => true,
        ],
    );
}

add_action('init', 'register_cpt_community');

function register_cpt_community()
{
    register_post_type('community', [
        'labels' => [
            'name' => _x('Communities', 'community'),
            'singular_name' => _x('Community', 'community'),
            'add_new' => _x('Add New', 'community'),
            'add_new_item' => _x('Add New Community', 'community'),
            'edit_item' => _x('Edit Community', 'community'),
            'new_item' => _x('New Community', 'community'),
            'view_item' => _x('View Community', 'community'),
            'search_items' => _x('Search Communities', 'community'),
            'not_found' => _x('No Communities found', 'community'),
            'not_found_in_trash' => _x('No Communities found in Trash', 'community'),
            'parent_item_colon' => _x('Parent Community:', 'community'),
            'menu_name' => _x('Communities', 'community'),
        ],
        'hierarchical' => true,
        'description' => '',
        'supports' => ['title', 'editor', 'excerpt', 'author', 'thumbnail', 'revisions'],
        'taxonomies' => ['dashicons-groups'],
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_icon' => 'dashicons-groups',
        'menu_position' => '5',
        'show_in_nav_menus' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => false,
        'has_archive' => false,
        'query_var' => true,
        'can_export' => true,
        'capability_type' => 'post',
        'rewrite' => true,
        'show_in_rest' => true,
    ]);
}

add_action('init', 'register_cpt_information');

function register_cpt_information()
{
    register_post_type('information', [
        'labels' => [
            'name' => _x('Informations', 'information'),
            'singular_name' => _x('Information', 'information'),
            'add_new' => _x('Add New', 'information'),
            'add_new_item' => _x('Add New Information', 'information'),
            'edit_item' => _x('Edit Information', 'information'),
            'new_item' => _x('New Information', 'information'),
            'view_item' => _x('View Information', 'information'),
            'search_items' => _x('Search Informations', 'information'),
            'not_found' => _x('No Informations found', 'information'),
            'not_found_in_trash' => _x('No Informations found in Trash', 'information'),
            'parent_item_colon' => _x('Parent Information:', 'information'),
            'menu_name' => _x('Informations', 'information'),
        ],
        'hierarchical' => true,
        'description' => '',
        'supports' => ['title', 'editor', 'excerpt', 'author', 'thumbnail', 'revisions'],
        'taxonomies' => [],
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_icon' => 'dashicons-info',
        'menu_position' => '5',
        'show_in_nav_menus' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => false,
        'has_archive' => false,
        'query_var' => true,
        'can_export' => true,
        'capability_type' => 'post',
        'rewrite' => true,
        'show_in_rest' => true,
    ]);
}

function add_custom_class_to_menu_links($atts, $item, $args)
{
    // Check if this is the footer navigation menu
    if ($args->theme_location == 'footer_navigation') {
        // Add your custom classes to the <a> tag
        $atts['class'] = '';
    }
    return $atts;
}
add_filter('nav_menu_link_attributes', 'add_custom_class_to_menu_links', 10, 3);

function add_span_before_menu_link($item_output, $item, $depth, $args)
{
    // Check if this is the 'side_bar_navigation_1' menu
    if ($args->theme_location == 'side_bar_navigation_1') {
        static $index = 1;
        // Add leading zero for numbers 1 to 9
        $span_tag = '<span>' . sprintf('%02d', $index) . '</span>';
        $index++;

        // Prepend the span to the link
        $item_output = $span_tag . $item_output;
    }
    return $item_output;
}
add_filter('walker_nav_menu_start_el', 'add_span_before_menu_link', 10, 4);

add_action('wp_ajax_get_the_latest_post_data', 'get_the_latest_post_data');
add_action('wp_ajax_nopriv_get_the_latest_post_data', 'get_the_latest_post_data');
function get_the_latest_post_data()
{
    $page = $_POST['page'];
    $posts_per_page = 6;
    $the_latest_arg = [
        'post_type' => 'post',
        'posts_per_page' => $posts_per_page,
        'paged' => $page,
        'post_status' => 'publish',
        'orderby' => 'date',
        'order' => 'Desc',
    ];
    $the_latest_query = new \WP_Query($the_latest_arg);
    $blog_count_data = $the_latest_query->found_posts;
    if ($the_latest_query->have_posts()) {
        $blog_grid = '';
        $placeholder_image = get_field('placeholder_image', 'option');
        $read_more_button_text = get_field('read_more_button_text', 'option');
        $athor_icon = get_template_directory_uri() . '/resources/images/user-icon.svg';
        $calendar_icon = get_template_directory_uri() . '/resources/images/calendar-icon.svg';
        $cat_icon = get_template_directory_uri() . '/resources/images/category-icon.svg';
        while ($the_latest_query->have_posts()) {
            $the_latest_query->the_post();
            $fea_image = '';
            if (get_the_post_thumbnail_url()) {
                $fea_image = get_the_post_thumbnail_url();
            }
            $con_desc = wpautop(get_the_content());
            $blog_title = get_the_title();
            $all_category_detail = get_the_category(get_the_ID());
            if (get_the_permalink()) {
                $blog_grid .= '<div class="w-full md:w-6/12 xl:w-4/12 md:px-20 xl:px-28">';
                $blog_grid .= '<div class="card">';
                $blog_grid .= '<div class="img portrait mb-20 last:mb-0">';
                if ($fea_image) {
                    $blog_grid .= '<a href="' . get_the_permalink() . '"><img src="' . $fea_image . '" class="max-w-full h-auto block mx-auto" width="400.67" height="412" alt="Bone Grafting"></a>';
                } else {
                    $blog_grid .= '<a href="' . get_the_permalink() . '"><img src="' . $placeholder_image['url'] . '" class="max-w-full h-auto block mx-auto" width="400.67" height="412" alt="Bone Grafting"></a>';
                }
                $blog_grid .= '</div>';
                $blog_grid .= '<div class="detail mdscreen:px-30">';
                if ($blog_title) {
                    $blog_grid .= '<div class="title-roboto title-700 title-Blue_1 mb-14 last:mb-0">';
                    $blog_grid .= '<a href="' . get_the_permalink() . '"><h4>' . $blog_title . '</h4></a>';
                    $blog_grid .= '</div>';
                }
                $blog_grid .= '<ul class="category-list">';
                if (get_the_author()) {
                    $blog_grid .=
                        '<li><img src="' .
                        $athor_icon .
                        '" width="15" height="15" class="max-w-full h-auto block lozad" alt="author">
                                <a href="' .
                        get_author_posts_url(get_the_author_meta('ID')) .
                        '">' .
                        get_the_author() .
                        '</a></li>';
                }
                if (get_the_date()) {
                    $blog_grid .=
                        '<li><img src="' .
                        $calendar_icon .
                        '" width="15" height="15" class="max-w-full h-auto block lozad" alt="calendar">
                                ' .
                        get_the_date('m/d/Y') .
                        '</li>';
                }
                if ($all_category_detail) {
                    $all_category_detail_length = count($all_category_detail);
                    $blog_grid .= '<li><img src="' . $cat_icon . '" width="15" height="15" class="max-w-full h-auto block lozad" alt="Category">';
                    foreach ($all_category_detail as $key => $cate) {
                        if (!empty($cate)) {
                            $cat_link = get_category_link($cate->term_id);
                            $blog_grid .= '<a href="' . $cat_link . '">' . $cate->name . '</a>';
                            if ($key !== $all_category_detail_length - 1) {
                                $blog_grid .= ',';
                            }
                        }
                    }
                    $blog_grid .= '</div></li>';
                }
                $blog_grid .= '</ul>';
                if (!empty(get_the_excerpt())) {
                    $cont_exc = wp_trim_words(get_the_excerpt(), 20, '...');
                    $cont_exceprt = wpautop($cont_exc);
                    $blog_grid .= '<div class="content mb-24 last:mb-0 mdscreen:px-30">' . $cont_exceprt . '</div>';
                }
                $blog_grid .= '<div class="btn-custom mdscreen:px-30">';
                $blog_grid .= '<a href="' . get_the_permalink() . '" class="btn btn-border-grey">';
                if (!empty($read_more_button_text)) {
                    $blog_grid .= $read_more_button_text;
                } else {
                    $blog_grid .= 'Read More';
                }
                $blog_grid .= '</a>';
                $blog_grid .= '</div>';
                $blog_grid .= '</div>';
                $blog_grid .= '</div>';
                $blog_grid .= '</div>';
            }
        }

        wp_reset_postdata();
    }
    $return_arr = ['blog_grid' => $blog_grid, 'total_posts' => $blog_count_data, 'current_page' => $page, 'max_page' => $the_latest_query->max_num_pages];
    echo json_encode($return_arr);
    die();
}

function custom_language_switcher()
{
    $languages = apply_filters('wpml_active_languages', null, 'skip_missing=0');
    if (!empty($languages)) {
        foreach ($languages as $language) {
            if (!$language['active']) {
                echo '<a href="' . $language['url'] . '">' . $language['native_name'] . '</a>';
            }
        }
    }
}

add_shortcode('custom_language_switcher', 'custom_language_switcher');

function my_theme_language_body_class($classes)
{
    // Get the current language code
    $current_language = apply_filters('wpml_current_language', null);

    // Add the language code as a class
    $classes[] = 'lang-' . $current_language;

    return $classes;
}

//add_filter('body_class', 'my_theme_language_body_class');
