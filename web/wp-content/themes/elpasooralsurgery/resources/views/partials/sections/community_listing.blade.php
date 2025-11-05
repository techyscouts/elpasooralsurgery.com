@if (isset($content->hide_section) && $content->hide_section == 'no')
    @php
        $placeholder_image = get_field('placeholder_image', 'option');
        $learn_more_button_text = get_field('learn_more_button_text', 'option');
    @endphp
    <section
        class="bg-Blue_4 ctm-grid-wrapper lg:py-100 py-50 @if ($content->extra_class) {!! $content->extra_class !!} @endif"
        @if ($content->id) id="{!! $content->id !!}" @endif>
        <div class="container-fluid-md xl3:max-w-screen-2xl max_width_768:px-30">
            @if (!empty($content->community_arr))
                <div
                    class="flex flex-wrap items-start justify-center md:justify-start m-0 p-0 relative mdscreen:w-full gap-y-10 xl:gap-y-[55px] md:-mx-[20px] xl:-mx-[28px] mb-40 lg:mb-55 last:mb-0">
                    @foreach ($content->community_arr as $community_arr_data)
                        <div class="w-full md:w-6/12 xl:w-4/12 md:px-20 xl:px-28">
                            <div class="card">
                                <div class="img portrait mb-20 last:mb-0 pt-[102.74%] relative overflow-hidden">
                                    <a href="{!! $community_arr_data['url'] !!}">
                                        @if (!empty($community_arr_data['fea_img']))
                                            <img src="{!! $community_arr_data['fea_img'] !!}"
                                                class="absolute w-full object-cover h-full top-0 left-0 lozad"
                                                width="400.67" height="412" alt="{!! $community_arr_data['title'] !!}">
                                        @else
                                            <img src="{!! $placeholder_image['url'] !!}"
                                                class=" absolute w-full h-full object-cover top-0 left-0  lozad"
                                                width="400.67" height="412" alt="{!! $community_arr_data['title'] !!}">
                                        @endif
                                    </a>
                                </div>
                                @if (!empty($community_arr_data['title']) || !empty($community_arr_data['url']))
                                    <div class="detail mdscreen:px-30">
                                        @if (!empty($community_arr_data['title']))
                                            <div class="title-roboto title-700 title-Blue_1 mb-14 last:mb-0">
                                                <a href="{!! $community_arr_data['url'] !!}">
                                                    <h2>{!! $community_arr_data['title'] !!}</h2>
                                                </a>
                                            </div>
                                        @endif
                                        @if (!empty($community_arr_data['url']))
                                            <div class="btn-custom">
                                                <a href="{!! $community_arr_data['url'] !!}" class="btn btn-border-grey">
                                                    @if (!empty($learn_more_button_text))
                                                        {!! $learn_more_button_text !!}
                                                    @else
                                                        Learn More
                                                    @endif
                                                </a>
                                            </div>
                                        @endif
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </section>
@endif
