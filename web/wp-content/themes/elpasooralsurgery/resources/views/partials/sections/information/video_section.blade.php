@if (isset($content->hide_section) && $content->hide_section == 'no')
    @php $video_button_text = get_field('video_button_text', 'option'); @endphp
    <section
        class="fullvideo bg-Blue_4 lg:py-100 py-50 lg:pt-0 !pt-0 @if ($content->extra_class) {!! $content->extra_class !!} @endif"
        @if ($content->id) id="{!! $content->id !!}" @endif>
        @if (!empty($content->image) || !empty($content->video_url))
            <div class="relative overflow-hidden w-full block pt-[55.29%]">
                @if (!empty($content->image))
                    <img src="{!! $content->image['url'] !!}" width="1512" height="836"
                        class="absolute inset-0 w-full h-full object-cover lozad" alt="{!! $content->image['alt'] !!}">
                @endif
                @if (!empty($content->video_url))
                    <div
                        class="watch-video-btn inline-block absolute top-50_per left-50_per translate-x-minus_50 translate-y-minus_50">
                        <a href="{!! $content->video_url !!}"
                            class="btn btn-border-grey !flex flex-wrap items-center justify-center gap-x-[10px] min-w-[207px]"
                            data-lity>
                            <img src="@asset('images/video-play-icon.svg')" class="!w-[20px] !h-[20px] lozad" width="20" height="20"
                                alt="Video Play">
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
        @if (!empty($content->heading) || !empty($content->description))
            <div class="container-fluid-xl xl3:max-w-screen-2xl lgscreen:px-30 pt-40">
                @if (!empty($content->heading))
                    <div class="title-roboto title-400 title-Blue_3 mb-20 last:mb-0">
                        <h3>{!! $content->heading !!}</h3>
                    </div>
                @endif
                @if (!empty($content->description))
                    <div class="content agrey mb-20 last:mb-0">
                        {!! $content->description !!}
                    </div>
                @endif
            </div>
        @endif
    </section>
@endif
