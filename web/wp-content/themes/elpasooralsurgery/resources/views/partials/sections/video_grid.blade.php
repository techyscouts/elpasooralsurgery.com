@if (isset($content->hide_section) && $content->hide_section == 'no')
    @php $video_button_text = get_field('video_button_text', 'option'); @endphp
    <section class="video-grid lg:py-100 py-50 @if ($content->extra_class) {!! $content->extra_class !!} @endif"
        @if ($content->id) id="{!! $content->id !!}" @endif>
        <div class="container-fluid-md xl3:max-w-screen-2xl">
            @if (!empty($content->heading))
                <div class="lg:pl-100 lgscreen:px-30">
                    <div class="title-roboto title-400 title-Blue_3">
                        <h3>{!! $content->heading !!}</h3>
                    </div>
                </div>
            @endif
            @if (!empty($content->video_grid))
                <div
                    class="grid grid-cols-2 smscreen2:grid-cols-1 gap-x-[100px] lgscreen:gap-x-[30px] lg:pt-55 lgscreen:gap-y-10 pt-20">
                    @foreach ($content->video_grid as $video_data)
                        <div class="video-bx">
                            @if (!empty($video_data['video_url']) || !empty($video_data['image']))
                                <div class="relative">
                                    @if (!empty($video_data['image']))
                                        <div class="img relative">
                                            <img src="{!! $video_data['image']['url'] !!}" class="img-ratio lozad" width="606"
                                                height="722" alt="{!! $video_data['image']['alt'] !!}">
                                        </div>
                                    @endif
                                    @if (!empty($video_data['video_url']))
                                        <div
                                            class="watch-video-btn absolute top-50_per left-50_per translate-x-minus_50 translate-y-minus_50 w-full flex justify-center">
                                            <a href="{!! $video_data['video_url'] !!}"
                                                class="btn btn-border-grey !flex flex-wrap item-center justify-center gap-x-2" data-lity>
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
                                    @if (!empty($video_data['caption']))
                                        <h4
                                            class="text-20 lgscreen:text-18 leading-[23px] text-Fonts font-Roboto font-400 pt-20 inline-block lgscreen:px-30">
                                            {!! $video_data['caption'] !!}</h4>
                                    @endif
                                </div>
                            @endif
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </section>
@endif
