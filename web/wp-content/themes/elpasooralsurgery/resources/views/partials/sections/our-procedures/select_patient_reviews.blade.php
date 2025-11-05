@if (isset($content->hide_section) && $content->hide_section == 'no')
    @if (!empty($content->select_patient_reviews))
        @php
            $placeholder_image = get_field('placeholder_image', 'option');
            $patients_back_button = get_field('patients_back_button', 'option');
            $more_patients_label_text = get_field('more_patients_label_text', 'option');
            $patient_cat_args = [
                'post_type' => 'patient-reviews',
                'post__in' => $content->select_patient_reviews,
                'post_status' => 'publish',
                'orderby' => 'post__in',
                'order' => 'ASC',
            ];
            $patient_posts = new WP_Query($patient_cat_args);

            $patient_posts_array = [];
            if ($patient_posts->have_posts()) {
                while ($patient_posts->have_posts()) {
                    $patient_posts->the_post();
                    $fea_img = get_the_post_thumbnail_url() ?: '';
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
        <section
            class="patients-grid-wrapper bg-LighterGrey lg:py-100 py-50 @if ($content->extra_class) {!! $content->extra_class !!} @endif"
            @if ($content->id) id="{!! $content->id !!}" @endif>
            <div class="container-fluid-md xl3:max-w-screen-2xl">
                <div
                    class="flex flex-wrap items-center justify-start m-0 p-0 w-full relative gap-5 lgscreen:px-30 mb-40">
                    @if (!empty($content->heading) || !empty($content->description))
                        <div class="w-full">
                            @if (!empty($content->heading))
                                <div class="title-roboto title-400 title-Blue_3 mb-20 last:mb-0">
                                    <h3>{!! $content->heading !!}</h3>
                                </div>
                            @endif
                            @if (!empty($content->description))
                                <div class="content mb-24 last:mb-0">
                                    {!! $content->description !!}
                                </div>
                            @endif
                        </div>
                    @endif
                    @if (!empty($patient_posts_array))
                        <div class="grid grid-cols-1 md:grid-cols-3 xl:grid-cols-4 gap-10 w-full">
                            @foreach ($patient_posts_array as $patient_posts_arr)
                                @if (!empty($patient_posts_arr['url']))
                                    <a href="{!! $patient_posts_arr['url'] !!}" class="card">
                                        <div
                                            class="img mb-20 last:mb-0 relative block overflow-hidden w-full pt-[138.26%]">
                                            @if (!empty($patient_posts_arr['fea_img']))
                                                <img src="{!! $patient_posts_arr['fea_img'] !!}"
                                                    class="absolute top-0 left-0 w-full h-full object-cover duration-1000 delay-500 ease-linear lozad"
                                                    width="298" height="412" alt="{!! $patient_posts_arr['title'] !!}">
                                            @else
                                                <img src="{!! $placeholder_image['url'] !!}"
                                                    class="absolute top-0 left-0 w-full h-full object-cover duration-1000 delay-500 ease-linear lozad"
                                                    width="298" height="412" alt="{!! $patient_posts_arr['title'] !!}">
                                            @endif
                                        </div>
                                        @if (!empty($patient_posts_arr['patient_heading']) || !empty($patient_posts_arr['date']))
                                            <div class="details text-center">
                                                @if (!empty($patient_posts_arr['patient_heading']))
                                                    <div
                                                        class="title-roboto title-700 title-Blue_1 capitalize mb-14 last:mb-0">
                                                        <h4>{!! $patient_posts_arr['patient_heading'] !!}</h4>
                                                    </div>
                                                @endif
                                                @if (!empty($patient_posts_arr['date']))
                                                    <div class="content">
                                                        <p>{!! $patient_posts_arr['date'] !!} </p>
                                                    </div>
                                                @endif
                                            </div>
                                        @endif
                                    </a>
                                @endif
                            @endforeach
                        </div>
                    @endif
                </div>
                @if (!empty($patients_back_button))
                    <div class="btn-custom btn-inline justify-center gap-5 lg:gap-10">
                        <a href="{!! $patients_back_button['url'] !!}" class="btn btn-border-grey"
                            @if ($patients_back_button['target']) target="{!! $patients_back_button['target'] !!}" @else target="_self" @endif>
                            @if (!empty($more_patients_label_text))
                                {!! $more_patients_label_text !!}
                            @else
                                More Patients
                            @endif
                        </a>
                    </div>
                @endif
            </div>
        </section>
    @endif
@endif
