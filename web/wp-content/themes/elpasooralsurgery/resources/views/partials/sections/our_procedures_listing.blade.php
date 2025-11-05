@if (isset($content->hide_section) && $content->hide_section == 'no')
    @php
        $learn_more_button_text = get_field('learn_more_button_text', 'option');
        $placeholder_image = get_field('placeholder_image', 'option');
        $exclude_ids = get_field('exclude_procedure', 'option');
        $unassigned_posts_arr = [];
        $assigned_posts_array = [];
        $unassigned_args = [
            'post_type' => 'procedure',
            'post__not_in' => $exclude_ids,
            'tax_query' => [
                [
                    'taxonomy' => 'procedure-category',
                    'operator' => 'NOT EXISTS',
                ],
            ],
            'posts_per_page' => -1,
            'post_status' => 'publish',
            'orderby' => 'ID',
            'order' => 'ASC',
        ];
        $unassigned_posts = new WP_Query($unassigned_args);
        if ($unassigned_posts->have_posts()) {
            while ($unassigned_posts->have_posts()) {
                $unassigned_posts->the_post();
                $fea_img = get_the_post_thumbnail_url() ?: '';
                $unassigned_posts_arr[] = [
                    'id' => get_the_ID(),
                    'title' => get_the_title(),
                    'url' => get_the_permalink(),
                    'excerpt_desc' => get_the_excerpt(),
                    'fea_img' => $fea_img,
                ];
            }
            wp_reset_postdata();
        }
        // assigned Post
        $categories = get_terms([
            'taxonomy' => 'procedure-category',
            'hide_empty' => false,
        ]);
        $categorized_posts = [];
        foreach ($categories as $category) {
            $assigned_args = [
                'post_type' => 'procedure',
                'post__not_in' => $exclude_ids,
                'tax_query' => [
                    [
                        'taxonomy' => 'procedure-category',
                        'field' => 'slug',
                        'terms' => $category->slug,
                    ],
                ],
                'posts_per_page' => -1,
                'post_status' => 'publish',
                'orderby' => 'ID',
                'order' => 'ASC',
            ];
            $assigned_posts = new WP_Query($assigned_args);
            if ($assigned_posts->have_posts()) {
                $category_posts = [];
                while ($assigned_posts->have_posts()) {
                    $assigned_posts->the_post();
                    $fea_img = get_the_post_thumbnail_url() ?: '';
                    $category_posts[] = [
                        'id' => get_the_ID(),
                        'title' => get_the_title(),
                        'url' => get_the_permalink(),
                        'excerpt_desc' => get_the_excerpt(),
                        'fea_img' => $fea_img,
                    ];
                }
                $categorized_posts[$category->name] = $category_posts;
                wp_reset_postdata();
            }
        }
    @endphp
    <section
        class="procedure-grid-wrapper lg:py-100 lg:pt-0 pt-0 py-50 @if ($content->extra_class) {!! $content->extra_class !!} @endif"
        @if ($content->id) id="{!! $content->id !!}" @endif>
        <div class="container-fluid-md xl3:max-w-screen-2xl max_width_768:px-30">
            @if ($content->create_additional_procedures != '1')
                @if (!empty($unassigned_posts_arr))
                    <div
                        class="flex flex-wrap items-start justify-start m-0 p-0 relative mdscreen:w-full gap-y-10 xl:gap-y-[55px] md:-mx-[20px] xl:-mx-[28px] mb-40 lg:mb-55 last:mb-0">
                        @foreach ($unassigned_posts_arr as $unassigned_arr)
                            @if (!empty($unassigned_arr['url']))
                                <div class="w-full md:w-6/12 xl:w-4/12 md:px-20 xl:px-28">
                                    <div class="card">
                                        <div class="img portrait mb-20 last:mb-0">
                                            <a href="{!! $unassigned_arr['url'] !!}">
                                                @if (!empty($unassigned_arr['fea_img']))
                                                    <img src="{!! $unassigned_arr['fea_img'] !!}"
                                                        class="max-w-full h-auto block mx-auto lozad" width="400.67"
                                                        height="412" alt="{!! $unassigned_arr['title'] !!}">
                                                @else
                                                    <img src="{!! $placeholder_image['url'] !!}"
                                                        class="max-w-full h-auto block mx-auto lozad" width="400.67"
                                                        height="412" alt="{!! $unassigned_arr['title'] !!}">
                                                @endif
                                            </a>
                                        </div>
                                        <div class="detail mdscreen:px-30">
                                            @if (!empty($unassigned_arr['title']))
                                                <div class="title title-roboto title-700 title-Blue_1 mb-14 last:mb-0">
                                                    <a href="{!! $unassigned_arr['url'] !!}">
                                                        <h2>{!! $unassigned_arr['title'] !!}</h2>
                                                    </a>
                                                </div>
                                            @endif
                                            @if (!empty($unassigned_arr['excerpt_desc']))
                                                @php
                                                    $cont_exc = wp_trim_words(
                                                        $unassigned_arr['excerpt_desc'],
                                                        23,
                                                        '...',
                                                    );
                                                    $con_desc = wpautop($unassigned_arr['excerpt_desc']);
                                                @endphp
                                                <div class="content mb-24 last:mb-0">
                                                    {!! $con_desc !!}
                                                </div>
                                            @endif
                                            @if (!empty($unassigned_arr['url']))
                                                <div class="btn-custom">
                                                    <a href="{!! $unassigned_arr['url'] !!}" class="btn btn-border-grey">
                                                        @if (!empty($learn_more_button_text))
                                                            {!! $learn_more_button_text !!}
                                                        @else
                                                            Learn More
                                                        @endif
                                                    </a>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                @endif
                @if (!empty($categorized_posts))
                    @foreach ($categorized_posts as $category_name => $categorized_posts_arr)
                        @if (!empty($category_name))
                            <div class="w-full mb-40 lg:mb-55 last:mb-0 mdscreen:px-30">
                                <div class="title-roboto title-400 title-Blue_3">
                                    <h2>{!! $category_name !!}</h2>
                                </div>
                            </div>
                        @endif
                        @if (!empty($categorized_posts_arr))
                            <div
                                class="flex flex-wrap items-start justify-start m-0 p-0 relative mdscreen:w-full gap-y-10 xl:gap-y-[55px] md:-mx-[20px] xl:-mx-[28px] mb-40 lg:mb-55 last:mb-0">
                                @foreach ($categorized_posts_arr as $categorized_posts_data)
                                    @if (!empty($categorized_posts_data['url']))
                                        <div class="w-full md:w-6/12 xl:w-4/12 md:px-20 xl:px-28">
                                            <div class="card">
                                                <div class="img portrait mb-20 last:mb-0">
                                                    <a href="{!! $categorized_posts_data['url'] !!}">
                                                        @if (!empty($categorized_posts_data['fea_img']))
                                                            <img src="{!! $categorized_posts_data['fea_img'] !!}"
                                                                class="max-w-full h-auto block mx-auto lozad"
                                                                width="400.67" height="412"
                                                                alt="{!! $categorized_posts_data['title'] !!}">
                                                        @else
                                                            <img src="{!! $placeholder_image['url'] !!}"
                                                                class="max-w-full h-auto block mx-auto lozad"
                                                                width="400.67" height="412"
                                                                alt="{!! $categorized_posts_data['title'] !!}">
                                                        @endif
                                                    </a>
                                                </div>
                                                <div class="detail mdscreen:px-30">
                                                    @if (!empty($categorized_posts_data['title']))
                                                        <div
                                                            class="title title-roboto title-700 title-Blue_1 mb-14 last:mb-0">
                                                            <a href="{!! $categorized_posts_data['url'] !!}">
                                                                <h3>{!! $categorized_posts_data['title'] !!}</h3>
                                                            </a>
                                                        </div>
                                                    @endif
                                                    @if (!empty($categorized_posts_data['excerpt_desc']))
                                                        @php
                                                            $cont_exc = wp_trim_words(
                                                                $categorized_posts_data['excerpt_desc'],
                                                                23,
                                                                '...',
                                                            );
                                                            $con_desc = wpautop(
                                                                $categorized_posts_data['excerpt_desc'],
                                                        ); @endphp
                                                        <div class="content mb-24 last:mb-0">
                                                            {!! $con_desc !!}
                                                        </div>
                                                    @endif
                                                    @if (!empty($categorized_posts_data['url']))
                                                        <div class="btn-custom">
                                                            <a href="{!! $categorized_posts_data['url'] !!}"
                                                                class="btn btn-border-grey">
                                                                @if (!empty($learn_more_button_text))
                                                                    {!! $learn_more_button_text !!}
                                                                @else
                                                                    Learn More
                                                                @endif
                                                            </a>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        @endif
                    @endforeach
                @endif
            @else
                @if ($content->create_additional_procedures == '1')
                    @if (!empty($unassigned_posts_arr))
                        <div
                            class="flex flex-wrap items-start justify-start m-0 p-0 relative mdscreen:w-full gap-y-10 xl:gap-y-[55px] md:-mx-[20px] xl:-mx-[28px] mb-40 lg:mb-55 last:mb-0">
                            @foreach ($unassigned_posts_arr as $unassigned_arr)
                                @if (!empty($unassigned_arr['url']))
                                    <div class="w-full md:w-6/12 xl:w-4/12 md:px-20 xl:px-28">
                                        <div class="card">
                                            <div class="img portrait mb-20 last:mb-0">
                                                <a href="{!! $unassigned_arr['url'] !!}">
                                                    @if (!empty($unassigned_arr['fea_img']))
                                                        <img src="{!! $unassigned_arr['fea_img'] !!}"
                                                            class="max-w-full h-auto block mx-auto lozad" width="400.67"
                                                            height="412" alt="{!! $unassigned_arr['title'] !!}">
                                                    @else
                                                        <img src="{!! $placeholder_image['url'] !!}"
                                                            class="max-w-full h-auto block mx-auto lozad" width="400.67"
                                                            height="412" alt="{!! $unassigned_arr['title'] !!}">
                                                    @endif
                                                </a>
                                            </div>
                                            <div class="detail mdscreen:px-30">
                                                @if (!empty($unassigned_arr['title']))
                                                    <div class="title title-roboto title-700 title-Blue_1 mb-14 last:mb-0">
                                                        <a href="{!! $unassigned_arr['url'] !!}">
                                                            <h3>{!! $unassigned_arr['title'] !!}</h3>
                                                        </a>
                                                    </div>
                                                @endif
                                                @if (!empty($unassigned_arr['excerpt_desc']))
                                                    @php
                                                        $cont_exc = wp_trim_words(
                                                            $unassigned_arr['excerpt_desc'],
                                                            23,
                                                            '...',
                                                        );
                                                        $con_desc = wpautop($unassigned_arr['excerpt_desc']);
                                                    @endphp
                                                    <div class="content mb-24 last:mb-0">
                                                        {!! $con_desc !!}
                                                    </div>
                                                @endif
                                                @if (!empty($unassigned_arr['url']))
                                                    <div class="btn-custom">
                                                        <a href="{!! $unassigned_arr['url'] !!}" class="btn btn-border-grey">
                                                            @if (!empty($learn_more_button_text))
                                                                {!! $learn_more_button_text !!}
                                                            @else
                                                                Learn More
                                                            @endif
                                                        </a>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                            @if ($content->create_additional_procedures == '1')
                                @if (!empty($content->additional_procedures))
                                    @foreach ($content->additional_procedures as $additional_procedure_data)
                                        @if ($additional_procedure_data['heading'] == '')
                                            @if (!empty($additional_procedure_data['additional_procedure']))
                                                @foreach ($additional_procedure_data['additional_procedure'] as $additional_procedure_details)
                                                    @if (!empty($additional_procedure_details['title']) || !empty($additional_procedure_details['short_description']))
                                                        <div class="w-full md:w-6/12 xl:w-4/12 md:px-20 xl:px-28">
                                                            <div class="card">
                                                                @if (!empty($additional_procedure_details['image']))
                                                                    <div class="img portrait mb-20 last:mb-0">
                                                                        <img src="{!! $additional_procedure_details['image']['url'] !!}"
                                                                            class="max-w-full h-auto block mx-auto lozad"
                                                                            width="400.67" height="412"
                                                                            alt="{!! $additional_procedure_details['image']['alt'] !!}">
                                                                    </div>
                                                                @endif
                                                                <div class="detail mdscreen:px-30">
                                                                    @if (!empty($additional_procedure_details['title']))
                                                                        <div
                                                                            class="title title-roboto title-700 title-Blue_1 mb-14 last:mb-0">
                                                                            <h3>{!! $additional_procedure_details['title'] !!}</h3>
                                                                        </div>
                                                                    @endif
                                                                    @if (!empty($additional_procedure_details['short_description']))
                                                                        <div class="content mb-24 last:mb-0">
                                                                            {!! $additional_procedure_details['short_description'] !!}
                                                                        </div>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endif
                                                @endforeach
                                            @endif
                                        @endif
                                    @endforeach
                                @endif
                            @endif
                        </div>
                    @endif
                    @if ($content->create_additional_procedures == '1')
                        @if (!empty($content->additional_procedures))
                            @foreach ($content->additional_procedures as $additional_procedure_data)
                                @if ($additional_procedure_data['heading'] != '')
                                    <div class="w-full mb-40 lg:mb-55 last:mb-0 mdscreen:px-30">
                                        <div class="title-roboto title-400 title-Blue_3">
                                            <h2>{!! $additional_procedure_data['heading'] !!}</h2>
                                        </div>
                                    </div>
                                    @if (!empty($additional_procedure_data['additional_procedure']))
                                        <div
                                            class="flex flex-wrap items-start justify-start m-0 p-0 relative mdscreen:w-full gap-y-10 xl:gap-y-[55px] md:-mx-[20px] xl:-mx-[28px] mb-40 lg:mb-55 last:mb-0">
                                            @foreach ($additional_procedure_data['additional_procedure'] as $additional_procedure_details)
                                                @if (!empty($additional_procedure_details['title']) || !empty($additional_procedure_details['short_description']))
                                                    <div class="w-full md:w-6/12 xl:w-4/12 md:px-20 xl:px-28">
                                                        <div class="card">
                                                            @if (!empty($additional_procedure_details['image']))
                                                                <div class="img portrait mb-20 last:mb-0">
                                                                    <img src="{!! $additional_procedure_details['image']['url'] !!}"
                                                                        class="max-w-full h-auto block mx-auto lozad"
                                                                        width="400.67" height="412"
                                                                        alt="{!! $additional_procedure_details['image']['alt'] !!}">
                                                                </div>
                                                            @endif
                                                            <div class="detail mdscreen:px-30">
                                                                @if (!empty($additional_procedure_details['title']))
                                                                    <div
                                                                        class="title title-roboto title-700 title-Blue_1 mb-14 last:mb-0">
                                                                        <h3>{!! $additional_procedure_details['title'] !!}</h3>
                                                                    </div>
                                                                @endif
                                                                @if (!empty($additional_procedure_details['short_description']))
                                                                    <div class="content mb-24 last:mb-0">
                                                                        {!! $additional_procedure_details['short_description'] !!}
                                                                    </div>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                    @endif
                                @endif
                            @endforeach
                        @endif
                    @endif
                @endif
            @endif
        </div>
    </section>
@endif
