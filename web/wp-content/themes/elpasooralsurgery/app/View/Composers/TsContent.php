<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class TsContent extends Composer
{
    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = ['partials.content-ts'];

    /**
     * Data to be passed to view before rendering.
     *
     * @return array
     */
    public function with()
    {
        return [
            'tsContentData' => $this->tsContentData(),
        ];
    }

    public function tsContentData()
    {
        $data = [];
        $flexible_content = get_field('page_content');
        if ($flexible_content) {
            foreach ($flexible_content as $content) {
                if ($content['acf_fc_layout'] == 'hero_slider') {
                    $this_content = (object) [
                        'layout' => $content['acf_fc_layout'],
                        'banner_type' => $content['banner_type'],
                        'video_background_type' => $content['video_background_type'],
                        'title' => $content['title'],
                        'image' => $content['image'],
                        'video_url' => $content['video_url'],
                        'short_video' => $content['short_video'],
                        'description' => $content['description'],
                        'slider' => $content['slider'],
                        'id' => $content['id'],
                        'extra_class' => $content['extra_class'],
                        'hide_section' => $content['hide_section'],
                    ];
                    array_push($data, $this_content);
                } elseif ($content['acf_fc_layout'] == 'image_with_content') {
                    $this_content = (object) [
                        'layout' => $content['acf_fc_layout'],
                        'display_mobile_image' => $content['display_mobile_image'],
                        'image_position' => $content['image_position'],
                        'background_color' => $content['background_color'],
                        'image_style' => $content['image_style'],
                        'text_size' => $content['text_size'],
                        'heading_style' => $content['heading_style'],
                        'image' => $content['image'],
                        'heading' => $content['heading'],
                        'description' => $content['description'],
                        'button_style' => $content['button_style'],
                        'logo' => $content['logo'],
                        'primary_button' => $content['primary_button'],
                        'secondary_button' => $content['secondary_button'],
                        'id' => $content['id'],
                        'extra_class' => $content['extra_class'],
                        'hide_section' => $content['hide_section'],
                    ];
                    array_push($data, $this_content);
                } elseif ($content['acf_fc_layout'] == 'featured_service') {
                    $this_content = (object) [
                        'layout' => $content['acf_fc_layout'],
                        'heading' => $content['heading'],
                        'description' => $content['description'],
                        'featured_services' => $content['featured_services'],
                        'id' => $content['id'],
                        'extra_class' => $content['extra_class'],
                        'hide_section' => $content['hide_section'],
                    ];
                    array_push($data, $this_content);
                } elseif ($content['acf_fc_layout'] == 'background_image_with_content') {
                    $this_content = (object) [
                        'layout' => $content['acf_fc_layout'],
                        'image' => $content['image'],
                        'heading' => $content['heading'],
                        'description' => $content['description'],
                        'button' => $content['button'],
                        'id' => $content['id'],
                        'extra_class' => $content['extra_class'],
                        'hide_section' => $content['hide_section'],
                    ];
                    array_push($data, $this_content);
                } elseif ($content['acf_fc_layout'] == 'ratings_and_reviews') {
                    $this_content = (object) [
                        'layout' => $content['acf_fc_layout'],
                        'heading' => $content['heading'],
                        'description' => $content['description'],
                        'reviews' => $content['reviews'],
                        'id' => $content['id'],
                        'extra_class' => $content['extra_class'],
                        'hide_section' => $content['hide_section'],
                    ];
                    array_push($data, $this_content);
                } elseif ($content['acf_fc_layout'] == 'content_banner') {
                    $this_content = (object) [
                        'layout' => $content['acf_fc_layout'],
                        'heading' => $content['heading'],
                        'description' => $content['description'],
                        'id' => $content['id'],
                        'extra_class' => $content['extra_class'],
                        'hide_section' => $content['hide_section'],
                    ];
                    array_push($data, $this_content);
                } elseif ($content['acf_fc_layout'] == 'full_video_section') {
                    $this_content = (object) [
                        'layout' => $content['acf_fc_layout'],
                        'poster_image' => $content['poster_image'],
                        'video_url' => $content['video_url'],
                        'id' => $content['id'],
                        'extra_class' => $content['extra_class'],
                        'hide_section' => $content['hide_section'],
                    ];
                    array_push($data, $this_content);
                } elseif ($content['acf_fc_layout'] == 'simple_content') {
                    $this_content = (object) [
                        'layout' => $content['acf_fc_layout'],
                        'heading' => $content['heading'],
                        'description' => $content['description'],
                        'id' => $content['id'],
                        'extra_class' => $content['extra_class'],
                        'hide_section' => $content['hide_section'],
                    ];
                    array_push($data, $this_content);
                } elseif ($content['acf_fc_layout'] == 'video_grid') {
                    $this_content = (object) [
                        'layout' => $content['acf_fc_layout'],
                        'heading' => $content['heading'],
                        'video_grid' => $content['video_grid'],
                        'id' => $content['id'],
                        'extra_class' => $content['extra_class'],
                        'hide_section' => $content['hide_section'],
                    ];
                    array_push($data, $this_content);
                } elseif ($content['acf_fc_layout'] == 'ratings_and_reviews') {
                    $this_content = (object) [
                        'layout' => $content['acf_fc_layout'],
                        'heading' => $content['heading'],
                        'description' => $content['description'],
                        'reviews' => $content['reviews'],
                        'id' => $content['id'],
                        'extra_class' => $content['extra_class'],
                        'hide_section' => $content['hide_section'],
                    ];
                    array_push($data, $this_content);
                } elseif ($content['acf_fc_layout'] == 'list_content') {
                    $this_content = (object) [
                        'layout' => $content['acf_fc_layout'],
                        'heading' => $content['heading'],
                        'list_content' => $content['list_content'],
                        'id' => $content['id'],
                        'extra_class' => $content['extra_class'],
                        'hide_section' => $content['hide_section'],
                    ];
                    array_push($data, $this_content);
                } elseif ($content['acf_fc_layout'] == 'content_with_full_image') {
                    $this_content = (object) [
                        'layout' => $content['acf_fc_layout'],
                        'heading' => $content['heading'],
                        'image' => $content['image'],
                        'description' => $content['description'],
                        'id' => $content['id'],
                        'extra_class' => $content['extra_class'],
                        'hide_section' => $content['hide_section'],
                    ];
                    array_push($data, $this_content);
                } elseif ($content['acf_fc_layout'] == 'cta_section') {
                    $this_content = (object) [
                        'layout' => $content['acf_fc_layout'],
                        'heading' => $content['heading'],
                        'section_style' => $content['section_style'],
                        'buttons' => $content['buttons'],
                        'primary_button' => $content['primary_button'],
                        'secondary_button' => $content['secondary_button'],
                        'description' => $content['description'],
                        'id' => $content['id'],
                        'extra_class' => $content['extra_class'],
                        'hide_section' => $content['hide_section'],
                    ];
                    array_push($data, $this_content);
                } elseif ($content['acf_fc_layout'] == 'contact_info') {
                    $this_content = (object) [
                        'layout' => $content['acf_fc_layout'],
                        'heading' => $content['heading'],
                        'description' => $content['description'],
                        'address_heading' => $content['address_heading'],
                        'address' => $content['address'],
                        'hours_heading' => $content['hours_heading'],
                        'hours' => $content['hours'],
                        'phone_heading' => $content['phone_heading'],
                        'phone_number' => $content['phone_number'],
                        'reviews' => $content['reviews'],
                        'id' => $content['id'],
                        'extra_class' => $content['extra_class'],
                        'hide_section' => $content['hide_section'],
                    ];
                    array_push($data, $this_content);
                } elseif ($content['acf_fc_layout'] == 'map_section') {
                    $this_content = (object) [
                        'layout' => $content['acf_fc_layout'],
                        'map_image' => $content['map_image'],
                        'link' => $content['link'],
                        'id' => $content['id'],
                        'extra_class' => $content['extra_class'],
                        'hide_section' => $content['hide_section'],
                    ];
                    array_push($data, $this_content);
                } elseif ($content['acf_fc_layout'] == 'contact_form') {
                    $this_content = (object) [
                        'layout' => $content['acf_fc_layout'],
                        'heading' => $content['heading'],
                        'form_shortcode' => $content['form_shortcode'],
                        'id' => $content['id'],
                        'extra_class' => $content['extra_class'],
                        'hide_section' => $content['hide_section'],
                    ];
                    array_push($data, $this_content);
                } elseif ($content['acf_fc_layout'] == 'general_content') {
                    $this_content = (object) [
                        'layout' => $content['acf_fc_layout'],
                        'description' => $content['description'],
                        'id' => $content['id'],
                        'extra_class' => $content['extra_class'],
                        'hide_section' => $content['hide_section'],
                    ];
                    array_push($data, $this_content);
                } elseif ($content['acf_fc_layout'] == 'our_doctors_listing') {
                    $doctors_arr = [];
                    $doctor_arg = [
                        'post_type' => 'our-doctors',
                        'posts_per_page' => '-1',
                        'post_status' => 'publish',
                        'orderby' => 'ID',
                        'order' => 'ASC',
                    ];
                    $doctor_query = new \WP_Query($doctor_arg);
                    if ($doctor_query->have_posts()) {
                        while ($doctor_query->have_posts()):
                            $doctor_query->the_post();
                            $fea_img = '';
                            if (get_the_post_thumbnail_url()) {
                                $fea_img = get_the_post_thumbnail_url();
                            }
                            $doctors_arr[] = [
                                'id' => get_the_ID(),
                                'title' => get_the_title(),
                                'url' => get_the_permalink(),
                                'excerpt_desc' => get_the_excerpt(),
                                'fea_img' => $fea_img,
                                'doctor_title' => get_field('doctor_title', get_the_ID()),
                            ];
                        endwhile;
                        wp_reset_postdata();
                    }
                    $this_content = (object) [
                        'layout' => $content['acf_fc_layout'],
                        'heading' => $content['heading'],
                        'description' => $content['description'],
                        'doctors_arr' => $doctors_arr,
                        'id' => $content['id'],
                        'extra_class' => $content['extra_class'],
                        'extra_class' => $content['extra_class'],
                        'hide_section' => $content['hide_section'],
                    ];
                    array_push($data, $this_content);
                } elseif ($content['acf_fc_layout'] == 'our_procedures_listing') {
                    $this_content = (object) [
                        'layout' => $content['acf_fc_layout'],
                        'create_additional_procedures' => $content['create_additional_procedures'],
                        'additional_procedures' => $content['additional_procedures'],
                        'id' => $content['id'],
                        'extra_class' => $content['extra_class'],
                        'extra_class' => $content['extra_class'],
                        'hide_section' => $content['hide_section'],
                    ];
                    array_push($data, $this_content);
                } elseif ($content['acf_fc_layout'] == 'patient_reviews_listing') {
                    $this_content = (object) [
                        'layout' => $content['acf_fc_layout'],
                        'patient_reviews_arr' => $content['patient_reviews'],
                        'id' => $content['id'],
                        'extra_class' => $content['extra_class'],
                        'extra_class' => $content['extra_class'],
                        'hide_section' => $content['hide_section'],
                    ];
                    array_push($data, $this_content);
                } elseif ($content['acf_fc_layout'] == 'instructions_listing') {
                    $this_content = (object) [
                        'layout' => $content['acf_fc_layout'],
                        'select_category' => $content['select_category'],
                        'id' => $content['id'],
                        'extra_class' => $content['extra_class'],
                        'extra_class' => $content['extra_class'],
                        'hide_section' => $content['hide_section'],
                    ];
                    array_push($data, $this_content);
                } elseif ($content['acf_fc_layout'] == 'community_listing') {
                    $community_arr = [];
                    $community_arg = [
                        'post_type' => 'community',
                        'posts_per_page' => '-1',
                        'post_status' => 'publish',
                        'orderby' => 'ID',
                        'order' => 'ASC',
                    ];
                    $community_query = new \WP_Query($community_arg);
                    if ($community_query->have_posts()) {
                        while ($community_query->have_posts()):
                            $community_query->the_post();
                            $fea_img = '';
                            if (get_the_post_thumbnail_url()) {
                                $fea_img = get_the_post_thumbnail_url();
                            }
                            $community_arr[] = [
                                'id' => get_the_ID(),
                                'title' => get_the_title(),
                                'url' => get_the_permalink(),
                                'excerpt_desc' => get_the_excerpt(),
                                'fea_img' => $fea_img,
                            ];
                        endwhile;
                        wp_reset_postdata();
                    }
                    $this_content = (object) [
                        'layout' => $content['acf_fc_layout'],
                        'community_arr' => $community_arr,
                        'id' => $content['id'],
                        'extra_class' => $content['extra_class'],
                        'extra_class' => $content['extra_class'],
                        'hide_section' => $content['hide_section'],
                    ];
                    array_push($data, $this_content);
                } elseif ($content['acf_fc_layout'] == 'information_listing') {
                    $information_arr = [];
                    $information_arg = [
                        'post_type' => 'information',
                        'posts_per_page' => '-1',
                        'post_status' => 'publish',
                        'orderby' => 'date',
                        'order' => 'ASC',
                    ];
                    $information_query = new \WP_Query($information_arg);
                    if ($information_query->have_posts()) {
                        while ($information_query->have_posts()):
                            $information_query->the_post();
                            $information_arr[] = [
                                'id' => get_the_ID(),
                                'title' => get_the_title(),
                                'url' => get_the_permalink(),
                                'excerpt_desc' => get_the_excerpt(),
                            ];
                        endwhile;
                        wp_reset_postdata();
                    }
                    $this_content = (object) [
                        'layout' => $content['acf_fc_layout'],
                        'information_arr' => $information_arr,
                        'id' => $content['id'],
                        'extra_class' => $content['extra_class'],
                        'extra_class' => $content['extra_class'],
                        'hide_section' => $content['hide_section'],
                    ];
                    array_push($data, $this_content);
                } elseif ($content['acf_fc_layout'] == 'blog_listing') {
                    $this_content = (object) [
                        'layout' => $content['acf_fc_layout'],
                        'id' => $content['id'],
                        'extra_class' => $content['extra_class'],
                        'extra_class' => $content['extra_class'],
                        'hide_section' => $content['hide_section'],
                    ];
                    array_push($data, $this_content);
                }
            }
        }
        return $data;
    }
}
