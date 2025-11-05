@if (isset($content->hide_section) && $content->hide_section == 'no')
    @php $video_button_text = get_field('video_button_text', 'option'); @endphp
    @if (!empty($content->image) || !empty($content->video_url))
        <section class="fullvideo relative @if ($content->extra_class) {!! $content->extra_class !!} @endif"
            @if ($content->id) id="{!! $content->id !!}" @endif>
            @if (!empty($content->image))
                <img src="{!! $content->image['url'] !!}" width="1512" height="836" class="lozad"
                    alt="{!! $content->image['alt'] !!}">
            @endif
            @if (!empty($content->video_url))
                <div
                    class="watch-video-btn inline-block absolute top-50_per left-50_per translate-x-minus_50 translate-y-minus_50">
                    <a href="{!! $content->video_url !!}"
                        class="btn btn-border-grey !flex flex-wrap items-center justify-center gap-x-[10px] min-w-[207px]" data-lity>
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
        </section>
    @endif
@endif
