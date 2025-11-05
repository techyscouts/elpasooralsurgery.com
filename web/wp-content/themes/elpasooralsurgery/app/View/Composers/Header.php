<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class Header extends Composer
{
    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = ['partials.header', 'partials.footer', 'sections.header', 'sections.footer', 'index', '404'];

    /**
     * Data to be passed to view before rendering.
     *
     * @return array
     */
    public function with()
    {
        return [
            //Header
            'header_logo' => get_field('header_logo', 'option'),
            'announcement_bar' => get_field('announcement_bar', 'option'),
            'schedule_an_appointment_button' => get_field('schedule_an_appointment_button', 'option'),
            'patient_referral_button' => get_field('patient_referral_button', 'option'),
            'popular_menu_heading' => get_field('popular_menu_heading', 'option'),

            // Footer
            'footer_logo' => get_field('footer_logo', 'option'),
            'footer_heading' => get_field('footer_heading', 'option'),
            'footer_description' => get_field('footer_description', 'option'),
            'copyright_text' => get_field('copyright_text', 'option'),
            'website_credits' => get_field('website_credits', 'option'),
            'location_heading' => get_field('location_heading', 'option'),
            'location' => get_field('location', 'option'),
            'lets_chat_heading' => get_field('lets_chat_heading', 'option'),
            'phone_number' => get_field('phone_number', 'option'),
            'email_address' => get_field('email_address', 'option'),
            'hours_heading' => get_field('hours_heading', 'option'),
            'hours' => get_field('hours', 'option'),
            'social_media_heading' => get_field('social_media_heading', 'option'),
            'footer_social_media' => get_field('footer_social_media', 'option'),

            // 404
            'error_image' => get_field('error_image', 'option'),
            'error_pre_heading' => get_field('error_pre_heading', 'option'),
            'error_heading' => get_field('error_heading', 'option'),
            'error_description' => get_field('error_description', 'option'),

            // Search
            'placeholder_image' => get_field('placeholder_image', 'option'),
            'search_heading' => get_field('search_heading', 'option'),

            // Language
        ];
    }
}
