@if (isset($content->hide_section) && $content->hide_section == 'no')
    @php $video_button_text = get_field('video_button_text', 'option'); @endphp
    @if (!empty($content->video_url))
        <section class="fullvideo relative @if ($content->extra_class) {!! $content->extra_class !!} @endif"
            @if ($content->id) id="{!! $content->id !!}" @endif>
            @if (!empty($content->poster_image))
                <img src="{{ $content->poster_image['url'] }}" width="1512" height="836"
                    alt="{{ $content->poster_image['alt'] }}" class="lozad">
            @endif
            <div
                class="watch-video-btn absolute top-50_per left-50_per translate-x-minus_50 translate-y-minus_50 w-full flex justify-center">
                <a href="{{ $content->video_url }}" class="btn btn-border-grey !flex flex-wrap gap-x-2 items-center justify-center"
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
        </section>
    @endif
@endif
