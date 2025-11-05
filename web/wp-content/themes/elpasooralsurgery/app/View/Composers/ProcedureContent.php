<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class ProcedureContent extends Composer
{
    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        //'*',
        'partials.content-single-procedure',
    ];

    /**
     * Data to be passed to view before rendering.
     *
     * @return array
     */
    public function with()
    {
        return [
            'ProcedureContentdata' => $this->ProcedureContentdata(),
        ];
    }

    /**
     * Get ACF repeater field.
     *
     * @return array
     */

    public function ProcedureContentdata()
    {
        $data = [];
        $flexible_content = get_field('our_procedures_content');
        if ($flexible_content) {
            foreach ($flexible_content as $content) {
                if ($content['acf_fc_layout'] == 'banner') {
                    $this_content = (object) [
                        'layout' => $content['acf_fc_layout'],
                        'heading' => $content['heading'],
                        'sub_heading' => $content['sub_heading'],
                        'image' => $content['image'],
                        'video_url' => $content['video_url'],
                        'id' => $content['id'],
                        'extra_class' => $content['extra_class'],
                        'hide_section' => $content['hide_section'],
                    ];
                    array_push($data, $this_content);
                } elseif ($content['acf_fc_layout'] == 'cta_section') {
                    $this_content = (object) [
                        'layout' => $content['acf_fc_layout'],
                        'section_style' => $content['section_style'],
                        'section_color' => $content['section_color'],
                        'heading' => $content['heading'],
                        'description' => $content['description'],
                        'add_sub_heading_and_description' => $content['add_sub_heading_and_description'],
                        'sub_heading' => $content['sub_heading'],
                        'sub_description' => $content['sub_description'],
                        'primary_button' => $content['primary_button'],
                        'secondary_button' => $content['secondary_button'],
                        'id' => $content['id'],
                        'extra_class' => $content['extra_class'],
                        'hide_section' => $content['hide_section'],
                    ];
                    array_push($data, $this_content);
                } elseif ($content['acf_fc_layout'] == 'select_patient_reviews') {
                    $this_content = (object) [
                        'layout' => $content['acf_fc_layout'],
                        'heading' => $content['heading'],
                        'description' => $content['description'],
                        'button' => $content['button'],
                        'select_patient_reviews' => $content['select_patient_reviews'],
                        'id' => $content['id'],
                        'extra_class' => $content['extra_class'],
                        'hide_section' => $content['hide_section'],
                    ];
                    array_push($data, $this_content);
                } elseif ($content['acf_fc_layout'] == 'general_content') {
                    $this_content = (object) [
                        'layout' => $content['acf_fc_layout'],
                        'content_with_video' => $content['content_with_video'],
                        'id' => $content['id'],
                        'extra_class' => $content['extra_class'],
                        'hide_section' => $content['hide_section'],
                    ];
                    array_push($data, $this_content);
                } elseif ($content['acf_fc_layout'] == 'timeline_content') {
                    $this_content = (object) [
                        'layout' => $content['acf_fc_layout'],
                        'heading' => $content['heading'],
                        'timeline_content' => $content['timeline_content'],
                        'id' => $content['id'],
                        'extra_class' => $content['extra_class'],
                        'hide_section' => $content['hide_section'],
                    ];
                    array_push($data, $this_content);
                }elseif ($content['acf_fc_layout'] == 'faq') {
                    $this_content = (object) [
                        'layout' => $content['acf_fc_layout'],
                        'faq' => $content['faq'],
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
