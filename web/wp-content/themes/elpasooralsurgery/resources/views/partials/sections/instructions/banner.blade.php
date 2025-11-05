@if (isset($content->hide_section) && $content->hide_section == 'no')
    @php
        $video_url = get_field('video_url', get_the_ID());
        $video_button_text = get_field('video_button_text', 'option');
    @endphp
    @if (empty($video_url) && empty($content->image))
        @if (!empty($content->heading))
            <section
                class="intro-content lg:py-100 py-50 @if ($content->extra_class) {!! $content->extra_class !!} @endif"
                @if ($content->id) id="{!! $content->id !!}" @endif>
                <div class="container-fluid-xl xl3:max-w-screen-2xl lgscreen:px-30">
                    <div class="text-left">
                        @if (!empty($content->heading))
                            <div class="title-roboto title-Blue_1 title-700 big mb-20 last:mb-0">
                                <h1>{{ $content->heading }}</h1>
                            </div>
                        @endif
                    </div>
                </div>
            </section>
        @endif
    @else
        <section
            class="hero-wrapper relative overflow-hidden bg-White @if ($content->extra_class) {!! $content->extra_class !!} @endif"
            @if ($content->id) id="{!! $content->id !!}" @endif>
            <div class="small-banner-wrapper relative z-1 h-full">
                @if (!empty($content->image))
                    <div class="banner-img absolute w-full h-full top-0 -z-1">
                        <img src="{!! $content->image['url'] !!}" class="w-full h-full object-cover lozad" width="1512"
                            height="539" alt="{!! $content->image['alt'] !!}">
                    </div>
                @endif
                @if (!empty($video_url) || !empty($content->heading))
                    <div class="banner-details w-full">
                        <div class="container-fluid-md xl3:max-w-screen-2xl lgscreen:px-30">
                            <div class="flex flex-wrap items-center justify-start w-full m-0 p-0">
                                <div class="w-full">
                                    @if (!empty($video_url))
                                        <div class="btn-custom text-center mb-[13px] mdscreen:mb-[56px] last:mb-0">
                                            <div class="watch-video-btn inline-block">
                                                <a href="{!! $video_url !!}"
                                                    class="btn btn-border-grey !flex flex-wrap items-center justify-center gap-x-[10px]"
                                                    data-lity> <img src="@asset('images/video-play-icon.svg')"
                                                        class="!w-[20px] !h-[20px] lozad" width="20" height="20"
                                                        alt="Video Play">
                                                    @if (!empty($video_button_text))
                                                        {!! $video_button_text !!}
                                                    @else
                                                        Watch Video
                                                    @endif
                                                </a>
                                            </div>
                                        </div>
                                    @endif
                                    @if (!empty($content->heading))
                                        <div
                                            class="big title-roboto title-700 title-Blue_1 mb-[13px] last:mb-0 lgscreen:text-center">
                                            <h1>{!! $content->heading !!}</h1>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </section>
    @endif
@endif
