@if (isset($content->hide_section) && $content->hide_section == 'no')
    @php
        $video_button_text = get_field('video_button_text', 'option');
        $learn_more_button_text = get_field('learn_more_button_text', 'option');
        $placeholder_image = get_field('placeholder_image', 'option');
    @endphp
    @if (!empty($content->select_category))
        @php
            $categories = is_array($content->select_category) ? $content->select_category : [$content->select_category];
            $instruction_posts = [];
            if (!empty($categories)) {
                foreach ($categories as $category_id) {
                    $category = get_term($category_id, 'instructions-category');
                    if ($category && !is_wp_error($category)) {
                        $instructions_args = [
                            'post_type' => 'instructions',
                            'tax_query' => [
                                [
                                    'taxonomy' => 'instructions-category',
                                    'field' => 'term_id',
                                    'terms' => $category_id,
                                ],
                            ],
                            'posts_per_page' => -1,
                            'post_status' => 'publish',
                            'orderby' => 'date',
                            'order' => 'ASC',
                        ];
                        $instructions_posts = new WP_Query($instructions_args);
                        $category_posts = [];
                        if ($instructions_posts->have_posts()) {
                            while ($instructions_posts->have_posts()) {
                                $instructions_posts->the_post();
                                $category_posts[] = [
                                    'id' => get_the_ID(),
                                    'title' => get_the_title(),
                                    'url' => get_the_permalink(),
                                    'excerpt_desc' => get_the_excerpt(),
                                    'video_url' => get_field('video_url', get_the_ID()),
                                ];
                            }
                            wp_reset_postdata();
                        }
                        $acf_field = get_field('title', 'instructions-category_' . $category_id);
                        $category_id = apply_filters(
                            'wpml_object_id',
                            $category_id,
                            'instructions-category',
                            false,
                            ICL_LANGUAGE_CODE,
                        );
                        $acf_field = get_field('title', 'instructions-category_' . $category_id);
                        $short_category_name = get_field(
                            'short_category_name',
                            'instructions-category_' . $category_id,
                        );
                        $instruction_posts[] = [
                            'category' => [
                                'name' => $category->name,
                                'description' => $category->description,
                                'acf_field' => $acf_field,
                                'short_category_name' => $short_category_name,
                            ],
                            'instructions_posts_arr' => $category_posts,
                        ];
                    }
                }
            }
        @endphp
        @if (!empty($instruction_posts))
            <section
                class="before-after-content bg-Blue_4 lg:py-[90px] py-45 @if ($content->extra_class) {!! $content->extra_class !!} @endif"
                @if ($content->id) id="{!! $content->id !!}" @endif>
                <div class="container-fluid-md xl3:max-w-screen-2xl lgscreen:px-30">
                    <div class="grid gap-y-[100px] lgscreen:gap-y-[30px]">
                        @foreach ($instruction_posts as $instruction_data)
                            <div class="ba-row">
                                @if (
                                    !empty($instruction_data['category']['acf_field']) ||
                                        !empty($instruction_data['category']['name']) ||
                                        !empty($instruction_data['category']['description']))
                                    <div class="content-grid lg:px-75 mb-40 lg:mb-55">
                                        @if (!empty($instruction_data['category']['acf_field']))
                                            <div class="title-roboto title-Blue_3 title-400 mb-[10px] last:mb-0">
                                                <h2>{!! $instruction_data['category']['acf_field'] !!}</h2>
                                            </div>
                                        @endif
                                        @if (!empty($instruction_data['category']['name']))
                                            <div class="title-roboto title-Blue_3 title-400 mb-20 last:mb-0">
                                                <h3>{!! $instruction_data['category']['name'] !!}</h3>
                                            </div>
                                        @endif
                                        @if (!empty($instruction_data['category']['description']))
                                            <div class="content agrey mb-20 last:mb-0">
                                                <p>{!! $instruction_data['category']['description'] !!}</p>
                                            </div>
                                        @endif
                                    </div>
                                @endif
                                @if (!empty($instruction_data['instructions_posts_arr']))
                                    @foreach ($instruction_data['instructions_posts_arr'] as $instructions_posts_details)
                                        <div class="mt-20 bg-Blue_13 lg:py-45 lg:px-40 xl:px-75 p-20 rounded-10">
                                            <div
                                                class="flex flex-wrap gap-y-[15px] justify-center md:justify-between items-center">
                                                @if (!empty($instructions_posts_details['title']) || !empty($instruction['category']['short_category_name']))
                                                    <div class="left-content">
                                                        @if (!empty($instruction_data['category']['short_category_name']))
                                                            <div
                                                                class="title-montserrat title-700 title-Grey mb-[4px] last:mb-0">
                                                                <h3>
                                                                    {!! $instruction_data['category']['short_category_name'] !!}
                                                                </h3>
                                                            </div>
                                                        @endif
                                                        @if (!empty($instructions_posts_details['title']))
                                                            <div
                                                                class="sub title-montserrat title-700 title-Grey mb-[4px] last:mb-0 capitalize">
                                                                <h4>
                                                                    {!! $instructions_posts_details['title'] !!}
                                                                </h4>
                                                            </div>
                                                        @endif
                                                    </div>
                                                @endif
                                                @if (!empty($instructions_posts_details['video_url']) || !empty($instructions_posts_details['url']))
                                                    <div
                                                        class="right-button w-auto btn-inline gap-x-5 xl:gap-x-10 lgscreen:gap-[10px]">
                                                        @if (!empty($instructions_posts_details['video_url']))
                                                            <div class="watch-video-btn">
                                                                <a href="{!! $instructions_posts_details['video_url'] !!}"
                                                                    class="btn btn-border-grey !flex flex-wrap gap-x-2 items-center justify-center"
                                                                    data-lity>
                                                                    <img src="@asset('images/video-play-icon.svg')"
                                                                        class="!w-[20px] !h-[20px] lozad" width="20"
                                                                        height="20" alt="Video Play">
                                                                    @if (!empty($video_button_text))
                                                                        {!! $video_button_text !!}
                                                                    @else
                                                                        Watch Video
                                                                    @endif
                                                                </a>
                                                            </div>
                                                        @endif
                                                        @if (!empty($instructions_posts_details['url']))
                                                            <a href="{!! $instructions_posts_details['url'] !!}" class="btn btn-grey">
                                                                @if (!empty($learn_more_button_text))
                                                                    {!! $learn_more_button_text !!}
                                                                @else
                                                                    Learn More
                                                                @endif
                                                            </a>
                                                        @endif
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
        @endif
    @endif
@endif
