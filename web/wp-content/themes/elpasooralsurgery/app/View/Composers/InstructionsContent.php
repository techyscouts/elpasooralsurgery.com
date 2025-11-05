<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class InstructionsContent extends Composer
{
    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        //'*',
        'partials.content-single-instructions',
    ];

    /**
     * Data to be passed to view before rendering.
     *
     * @return array
     */
    public function with()
    {
        return [
            'InstructionsContentdata' => $this->InstructionsContentdata(),
        ];
    }

    /**
     * Get ACF repeater field.
     *
     * @return array
     */

    public function InstructionsContentdata()
    {
        $data = [];
        $flexible_content = get_field('instructions_content');
        if ($flexible_content) {
            foreach ($flexible_content as $content) {
                if ($content['acf_fc_layout'] == 'banner') {
                    $this_content = (object) [
                        'layout' => $content['acf_fc_layout'],
                        'heading' => $content['heading'],
                        'image' => $content['image'],
                        'id' => $content['id'],
                        'extra_class' => $content['extra_class'],
                        'hide_section' => $content['hide_section'],
                    ];
                    array_push($data, $this_content);
                }
                elseif ($content['acf_fc_layout'] == 'general_content') {
                    $this_content = (object) [
                        'layout' => $content['acf_fc_layout'],
                        'general_content' => $content['general_content'],
                        'id' => $content['id'],
                        'extra_class' => $content['extra_class'],
                        'hide_section' => $content['hide_section'],
                    ];
                    array_push($data, $this_content);
                }
                elseif ($content['acf_fc_layout'] == 'cta_section') {
                    $this_content = (object) [
                        'layout' => $content['acf_fc_layout'],
                        'heading' => $content['heading'],
                        'button' => $content['button'],
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
