@if (isset($content->hide_section) && $content->hide_section == 'no')
    @php
        $our_procedures_btn = get_field('our_procedures_back_button', 'option');
        $video_button_text = get_field('video_button_text', 'option');
    @endphp
    <section class="ctm-procedure-sec lg:py-100 py-50 lgscreen:px-30 @if ($content->extra_class) {!! $content->extra_class !!} @endif"
        @if ($content->id) id="{!! $content->id !!}" @endif>
        <div class="container-fluid-md xl3:max-w-screen-2xl mb-[55px] last:mb-0">
            @if (!empty($our_procedures_btn))
                <div class="btn-custom">
                    <a href="{!! $our_procedures_btn['url'] !!}"
                        @if ($our_procedures_btn['target']) target="{!! $our_procedures_btn['target'] !!}" @else target="_self" @endif
                        class="btn btn-back">
                        <svg width="14" height="10" viewBox="0 0 14 10" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M13.9999 4.99986C13.9999 4.86725 13.9472 4.74007 13.8535 4.6463C13.7597 4.55253 13.6325 4.49986 13.4999 4.49986L1.70692 4.49986L4.85392 1.35386C4.9478 1.25997 5.00055 1.13263 5.00055 0.999857C5.00055 0.867081 4.9478 0.739743 4.85392 0.645857C4.76003 0.55197 4.63269 0.499225 4.49992 0.499225C4.36714 0.499225 4.2398 0.55197 4.14592 0.645857L0.145917 4.64586C0.0993538 4.6923 0.0624109 4.74748 0.0372045 4.80822C0.011998 4.86897 -0.000976762 4.93409 -0.000976759 4.99986C-0.000976756 5.06562 0.011998 5.13075 0.0372045 5.19149C0.0624109 5.25224 0.0993538 5.30741 0.145917 5.35386L4.14592 9.35386C4.1924 9.40034 4.24759 9.43722 4.30833 9.46238C4.36907 9.48754 4.43417 9.50049 4.49992 9.50049C4.63269 9.50049 4.76003 9.44774 4.85392 9.35386C4.9478 9.25997 5.00055 9.13263 5.00055 8.99986C5.00055 8.86708 4.9478 8.73974 4.85392 8.64586L1.70692 5.49986L13.4999 5.49986C13.6325 5.49986 13.7597 5.44718 13.8535 5.35341C13.9472 5.25964 13.9999 5.13246 13.9999 4.99986Z"
                                fill="#6D6E6F"></path>
                        </svg>
                        <span>{!! $our_procedures_btn['title'] !!}</span>
                       
                    </a>
                </div>
            @endif
        </div>
        @if (!empty($content->content_with_video))
            <div class="container-fluid-xl xl3:max-w-screen-2xl">
                @foreach ($content->content_with_video as $content_with_video_details)
                    <div class="content-video mb-[55px] last:mb-0">
                        @if (!empty($content_with_video_details['description']))
                            <div class="content title-blue global-list global-list-grey agrey mb-40 last:mb-0">
                                {!! $content_with_video_details['description'] !!}
                            </div>
                        @endif
                        @if (!empty($content_with_video_details['image']) || !empty($content_with_video_details['video_url']))
                            <div class="fullvideo relative mb-[55px] last:mb-0">
                                @if (!empty($content_with_video_details['image']))
                                    <img src="{!! $content_with_video_details['image']['url'] !!}" width="1512" height="836"
                                        alt="{!! $content_with_video_details['image']['alt'] !!}" class="lozad">
                                @endif
                                @if (!empty($content_with_video_details['video_url']))
                                    <div
                                        class="watch-video-btn absolute top-50_per left-50_per translate-x-minus_50 translate-y-minus_50 w-full flex justify-center">
                                        <a href="{!! $content_with_video_details['video_url'] !!}"
                                            class="btn btn-border-grey !flex flex-wrap gap-x-2 items-center justify-center" data-lity>
                                            <img src="@asset('images/video-play-icon.svg')" class="!w-[20px] !h-[20px] lozad"
                                                width="20" height="20" alt="Video Play">
                                            @if (!empty($video_button_text))
                                                {!! $video_button_text !!}
                                            @else
                                                Watch Video
                                            @endif
                                        </a>
                                    </div>
                                @endif
                            </div>
                        @endif
                        @if ($content_with_video_details['add_bottom_description'] == 'yes')
                            @if (!empty($content_with_video_details['bottom_description']))
                                <div class="content title-blue global-list agrey mt-40 last:mb-0">
                                    {!! $content_with_video_details['bottom_description'] !!}
                                </div>
                            @endif
                        @endif
                    </div>
                @endforeach
            </div>
        @endif
    </section>
@endif
