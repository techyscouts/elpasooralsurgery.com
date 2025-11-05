@if (isset($content->hide_section) && $content->hide_section == 'no')
    @php $video_button_text = get_field('video_button_text', 'option'); @endphp
    <section
        class="simple-content lg:py-100 lg:pb-50 py-50 pb-25 @if ($content->extra_class) {!! $content->extra_class !!} @endif"
        @if ($content->id) id="{!! $content->id !!}" @endif>
        <div class="container-fluid-md xl3:max-w-screen-2xl">
            <div class="lgscreen:px-30">
                @if (!empty($content->heading))
                    <div class="title-roboto title-Blue_3 title-400 mb-20 last:mb-0 lg:text-center">
                        <h2>{!! $content->heading !!}</h2>
                    </div>
                @endif
                @if (!empty($content->description))
                    <div class="content agrey global-list mb-20 last:mb-0">
                        {!! $content->description !!}
                    </div>
                @endif
                @if (!empty($content->video_url))
                    <div class="btn-custom text-center">
                        <div class="watch-video-btn inline-block">
                            <a href="{!! $content->video_url !!}"
                                class="btn btn-border-grey !flex flex-wrap items-center justify-center gap-x-[10px]" data-lity>
                                <img src="@asset('images/video-play-icon.svg')" class="!w-[20px] !h-[20px] lozad" width="20"
                                    height="20" alt="Video Play">
                                @if (!empty($video_button_text))
                                    {!! $video_button_text !!}
                                @else
                                    Watch Video
                                @endif
                            </a>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </section>
@endif
