<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class DoctorsContent extends Composer
{
    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        //'*',
        'partials.content-single-our-doctors',
    ];

    /**
     * Data to be passed to view before rendering.
     *
     * @return array
     */
    public function with()
    {
        return [
            'DoctorscontentData' => $this->Doctorscontent(),
        ];
    }

    /**
     * Get ACF repeater field.
     *
     * @return array
     */

    public function Doctorscontent()
    {
        $data = [];
        $flexible_content = get_field('our_doctors_content');
        if ($flexible_content) {
            foreach ($flexible_content as $content) {
                if ($content['acf_fc_layout'] == 'banner') {
                    $this_content = (object) [
                        'layout' => $content['acf_fc_layout'],
                        'heading' => $content['heading'],
                        'image_desktop' => $content['image_desktop'],
                        'image_mobile' => $content['image_mobile'],
                        'description' => $content['description'],
                        'ratings_number' => $content['ratings_number'],
                        'review_rate' => $content['review_rate'],
                        'link' => $content['link'],
                        'id' => $content['id'],
                        'extra_class' => $content['extra_class'],
                        'hide_section' => $content['hide_section'],
                    ];
                    array_push($data, $this_content);
                } elseif ($content['acf_fc_layout'] == 'content_with_video') {
                    $this_content = (object) [
                        'layout' => $content['acf_fc_layout'],
                        'heading' => $content['heading'],
                        'video_url' => $content['video_url'],
                        'description' => $content['description'],
                        'id' => $content['id'],
                        'extra_class' => $content['extra_class'],
                        'hide_section' => $content['hide_section'],
                    ];
                    array_push($data, $this_content);
                } elseif ($content['acf_fc_layout'] == 'image_with_content') {
                    $this_content = (object) [
                        'layout' => $content['acf_fc_layout'],
                        'image_position' => $content['image_position'],
                        'image' => $content['image'],
                        'heading' => $content['heading'],
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
                        'buttons' => $content['buttons'],
                        'description' => $content['description'],
                        'id' => $content['id'],
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
