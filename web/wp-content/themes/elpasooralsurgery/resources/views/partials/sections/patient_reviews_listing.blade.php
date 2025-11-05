@if (isset($content->hide_section) && $content->hide_section == 'no')
    @if (!empty($content->patient_reviews_arr))
        @php
            $placeholder_image = get_field('placeholder_image', 'option');
            $stories_from_label_text = get_field('stories_from_label_text', 'option');
        $secount_count = 1; @endphp
        @foreach ($content->patient_reviews_arr as $patient_posts_data)
            @if (!empty($patient_posts_data['select_patient_reviews']))
                <section
                    class="patients-review-slider lg:py-100 lg:pt-0 py-50 pt-0 @if ($secount_count == 1) @if ($content->extra_class) {!! $content->extra_class !!} @endif @endif"
                    @if ($secount_count == 1) @if ($content->id) id="{!! $content->id !!}" @endif
                    @endif>
                    @if (!empty($patient_posts_data['heading']))
                        <div class="container-fluid-md xl:max-w-screen-2xl lgscreen:px-30 mb-40 lg:mb-55 last:mb-0">
                            <div class="flex flex-col items-start justify-center m-0 p-0 w-full">
                                @php
                                    $patient_total = count($patient_posts_data['select_patient_reviews']);
                                @endphp
                                @if (!empty($patient_total))

                                    <div class="title-roboto title-400 title-Blue_3 mb-10 last:mb-0 capitalize">
                                        <h2>
                                            {!! $patient_total !!} @if (!empty($stories_from_label_text))
                                                {!! $stories_from_label_text !!}
                                            @else
                                                Stories From
                                            @endif
                                        </h2>
                                    </div>
                                @endif
                                @if (!empty($patient_posts_data['heading']))
                                    <div class="title-roboto title-400 title-Blue_3 mb-10 last:mb-0 capitalize">
                                        <h3>{!! $patient_posts_data['heading'] !!}</h3>
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endif
                    @if (!empty($patient_posts_data['select_patient_reviews']))
                        @php

                            $patient_cat_args = [
                                'post_type' => 'patient-reviews',
                                'post__in' => $patient_posts_data['select_patient_reviews'],
                                'posts_per_page' => -1,
                                'post_status' => 'publish',
                                'orderby' => 'post__in',
                                'order' => 'ASC',
                            ];
                            $patient_posts = new WP_Query($patient_cat_args);

                            $patient_posts_array = [];
                            if ($patient_posts->have_posts()) {
                                while ($patient_posts->have_posts()) {
                                    $patient_posts->the_post();
                                    $fea_img = get_the_post_thumbnail_url() ?: $placeholder_image['url'];
                                    $patient_posts_array[] = [
                                        'id' => get_the_ID(),
                                        'title' => get_the_title(),
                                        'url' => get_the_permalink(),
                                        'excerpt_desc' => get_the_excerpt(),
                                        'fea_img' => $fea_img,
                                        'patient_heading' => get_field('patient_heading', get_the_ID()),
                                        'date' => get_field('date', get_the_ID()),
                                    ];
                                }
                                wp_reset_postdata();
                            }
                        @endphp
                        <div class="swiper review-slider">
                            <div class="swiper-wrapper">
                                @foreach ($patient_posts_array as $patient_posts_arr_data)
                                    @if (!empty($patient_posts_arr_data['url']))
                                        <div class="swiper-slide overflow-hidden">
                                            <a href="{!! $patient_posts_arr_data['url'] !!}" class="card relative overflow-hidden">
                                                @if (!empty($patient_posts_arr_data['fea_img']))
                                                    <div
                                                        class="img relative overflow-hidden w-full pt-[167.68%] mb-20 last:mb-0">
                                                        <img src="{!! $patient_posts_arr_data['fea_img'] !!}"
                                                            class="absolute top-0 left-0 w-full h-full object-cover lozad"
                                                            width="328" height="550" alt="{!! $patient_posts_arr_data['patient_heading'] !!}">
                                                    </div>
                                                @endif
                                                @if (!empty($patient_posts_arr_data['patient_heading']) || !empty($patient_posts_arr_data['date']))
                                                    <div class="details text-center">
                                                        @if (!empty($patient_posts_arr_data['patient_heading']))
                                                            <div
                                                                class="sub title-roboto title-400 title-Blue_1 mb-10 last:mb-0 capitalize">
                                                                <h4>{!! $patient_posts_arr_data['patient_heading'] !!}</h4>
                                                            </div>
                                                        @endif
                                                        @if (!empty($patient_posts_arr_data['date']))
                                                            <div class="content">
                                                                <p>{!! $patient_posts_arr_data['date'] !!}</p>
                                                            </div>
                                                        @endif
                                                    </div>
                                                @endif
                                            </a>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                            <div class="swiper-button-prev left-[40px]">
                                <img src="@asset('images/chevron-prev.svg')" width="40" height="40" alt="prev"
                                    class="lozad" />
                            </div>
                            <div class="swiper-button-next right-[40px]">
                                <img src="@asset('images/chevron-next.svg')" width="40" height="40" alt="next"
                                    class="lozad" />
                            </div>
                        </div>
                    @endif
                </section>
                @php $secount_count ++; @endphp
            @endif
        @endforeach

    @endif
@endif
