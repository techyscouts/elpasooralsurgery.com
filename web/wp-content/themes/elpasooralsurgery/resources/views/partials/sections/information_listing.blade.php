@if (isset($content->hide_section) && $content->hide_section == 'no')
    @php
        $learn_more_button_text = get_field('learn_more_button_text', 'option');
    @endphp
    @if (!empty($content->information_arr))
        <section
            class="before-after-content ctm-information-sec bg-Blue_4 lg:py-[90px] py-45 @if ($content->extra_class) {!! $content->extra_class !!} @endif"
            @if ($content->id) id="{!! $content->id !!}" @endif>
            <div class="container-fluid-md xl3:max-w-screen-2xl lgscreen:px-30">
                <div class="grid gap-y-[100px] lgscreen:gap-y-[30px]">
                    <div class="ba-row">
                        <div class="content-grid">
                            @foreach ($content->information_arr as $information_arr_val)
                                @if (!empty($information_arr_val['title']) || !empty($information_arr_val['url']))
                                    <div class="mt-20 bg-Blue_13 lg:py-45 lg:px-40 xl:px-75 p-20 rounded-10 first:mt-0">
                                        <div
                                            class="flex flex-wrap gap-y-[15px] justify-center md:justify-between items-center">
                                            @if (!empty($information_arr_val['title']))
                                                <div class="left-content">
                                                    <h6 class="text-20 text-Grey font-700">{!! $information_arr_val['title'] !!}</h6>
                                                </div>
                                            @endif
                                            @if (!empty($information_arr_val['url']))
                                                <div
                                                    class="right-button w-auto btn-inline gap-x-5 xl:gap-x-10 lgscreen:gap-[10px]">
                                                    <a href="{!! $information_arr_val['url'] !!}" class="btn btn-grey">
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
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
@endif
