@if (isset($content->hide_section) && $content->hide_section == 'no')
    @php $video_button_text = get_field('video_button_text', 'option'); @endphp
    <section
        class="hero-wrapper relative overflow-hidden bg-White @if ($content->extra_class) {!! $content->extra_class !!} @endif"
        @if ($content->id) id="{!! $content->id !!}" @endif>
        @if (!empty($content->banner_type) && $content->banner_type == 'image-slider')
            @if (!empty($content->slider))
                @php $i=0; @endphp
                <div class="banner-wrapper">
                    <div class="swiper banner-slide h-full">
                        <div class="swiper-wrapper">
                            @foreach ($content->slider as $banner_slider)
                                <div class="swiper-slide h-auto relative">
                                    @if (!empty($banner_slider['banner_image']))
                                        <div class="ovarlay-bg absolute top-0 left-0 w-full h-full -z-1">
                                            <img src="{!! $banner_slider['banner_image']['url'] !!}" width="1512" height="800"
                                                class="w-full h-full object-cover lozad" alt="{!! $banner_slider['banner_image']['alt'] !!}">
                                        </div>
                                    @endif
                                    <div class="banner-details">
                                        <div class="container-fluid-md xl3:max-w-screen-2xl lgscreen:px-30">
                                            <div class=" flex-wrap items-center justify-start w-full m-0 p-0">
                                                <div class="w-full lg:w-6/12 xl2:w-[844px]">
                                                    @if (!empty($banner_slider['heading']))
                                                        <div
                                                            class="title-montserrat title-800 title-White uppercase mb-14 last:mb-0 drop-shadow-titleshadow">
                                                            @if ($i == 0)
                                                                <h1>{!! $banner_slider['heading'] !!} </h1>
                                                            @else
                                                                <h2>{!! $banner_slider['heading'] !!} </h2>
                                                            @endif
                                                        </div>
                                                    @endif
                                                    @if (!empty($banner_slider['sub_heading']))
                                                        <div
                                                            class="sub title-roboto title-700 title-White mb-20 last:mb-0 drop-shadow-titleshadow">
                                                            <h3>{!! $banner_slider['sub_heading'] !!}</h3>
                                                        </div>
                                                    @endif
                                                    @if (!empty($banner_slider['button']))
                                                        <div class="btn-custom">
                                                            <a href="{!! $banner_slider['button']['url'] !!}"
                                                                @if ($banner_slider['button']['target']) target="{!! $banner_slider['button']['target'] !!}" @else target="_self" @endif
                                                                class="btn btn-border-grey">
                                                                {!! $banner_slider['button']['title'] !!}
                                                            </a>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @php $i++; @endphp
                            @endforeach
                        </div>
                    </div>
                </div>
            @endif
        @else
            <div class="video-wrapper relative h-full">
                <div class="relative lg:absolute w-full lgscreen:h-[550px] h-full ctm-video-wrapper">
                    @if (!empty($content->video_background_type) && $content->video_background_type == 'short-video')
                        @if (!empty($content->short_video))
                            <video id="video" autoplay muted loop preload="metadata"
                                poster="@if ($content->image) {!! $content->image['url'] !!} @endif"
                                class="lg:absolute top-0 left-0 w-full h-full object-cover">
                                <source src="{!! $content->short_video['url'] !!}" type="video/mp4">
                            </video>
                            <button id="playPauseButton">
                                <img src="@asset('images/pause.svg')" alt="video" class="lozad" width="16"
                                    height="20" />
                                <span>Pause</span>
                            </button>
                        @endif
                    @endif
                    @if (!empty($content->video_background_type) && $content->video_background_type == 'gif-image')
                        @if (!empty($content->image))
                            <div class="ovarlay-bg absolute top-0 left-0 w-full h-full">
                                <img src="{!! $content->image['url'] !!}" width="1512" height="820"
                                    class="w-full h-full object-cover lozad" alt="{!! $content->image['alt'] !!}">
                            </div>
                        @endif
                    @endif
                </div>
                <div class="banner-details">
                    <div class="container-fluid-md xl3:max-w-screen-2xl lgscreen:px-30">
                        <div class="flex flex-wrap items-center justify-start w-full m-0 p-0">
                            <div class="w-full lg:w-6/12 xl2:w-[844px]">
                                @if (!empty($content->title))
                                    <div
                                        class="title-montserrat lg:title-800 lg:title-White uppercase mb-14 last:mb-0 lg:drop-shadow-titleshadow">
                                        <h1>{!! $content->title !!}</h1>
                                    </div>
                                @endif
                                @if (!empty($content->description))
                                    <div
                                        class="sub title-roboto lg:title-700 lg:title-White mb-20 last:mb-0 lg:drop-shadow-titleshadow">
                                        <h2>
                                            {!! $content->description !!}
                                        </h2>
                                    </div>
                                @endif
                                @if (!empty($content->video_url))
                                    <div class="btn-custom">
                                        <div class="watch-video-btn inline-block">
                                            <a href="{!! $content->video_url !!}"
                                                class="btn btn-border-grey !flex flex-wrap items-center justify-center gap-x-[10px]"
                                                data-lity>

                                                <img src="@asset('images/video-play-icon.svg')" class="!w-[20px] !h-[20px] lozad"
                                                    width="20" height="20" alt="Video Play">
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
                    </div>
                </div>
            </div>
        @endif
    </section>
@endif
