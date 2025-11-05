@if (isset($content->hide_section) && $content->hide_section == 'no')
    @php $video_button_text = get_field('video_button_text', 'option'); @endphp
    <section class="content-with-button lg:py-100 py-50 @if ($content->extra_class) {!! $content->extra_class !!} @endif"
        @if ($content->id) id="{!! $content->id !!}" @endif>
        @if (!empty($content->heading) || !empty($content->description) || !empty($content->buttons))
            <div class="container-fluid-xl xl3:max-w-screen-2xl">
                <div class="lg:text-center lgscreen:px-30">
                    @if (!empty($content->heading))
                        <div class="title-roboto title-Blue_3 title-400 mb-20 last:mb-0">
                            <h3>{!! $content->heading !!}</h3>
                        </div>
                    @endif
                    @if (!empty($content->description))
                        <div class="content mb-30 last:mb-0">
                            {!! $content->description !!}
                        </div>
                    @endif
                    @if (!empty($content->buttons))
                        @php $btn_popup =1; @endphp
                        <div class="btn-custom btn-inline gap-5 lg:gap-10 justify-center">
                            @foreach ($content->buttons as $button)
                                @if (!empty($button['button_heading']))
                                    <button class="btn btn-grey open-modal" data-target="{{ $btn_popup }}">
                                        {!! $button['button_heading'] !!}
                                    </button>
                                @endif
                                @php $btn_popup++; @endphp
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        @endif
    </section>
@endif
@if (!empty($content->buttons))
    @php $btn_popup_con =1; @endphp
    @foreach ($content->buttons as $button_modal)
        @if (
            !empty($button_modal['popup_heading']) ||
                !empty($button_modal['popup_description']) ||
                !empty($button_modal['popup_video_url']))
            <div id="{{ $btn_popup_con }}" class="modal fixed inset-0 hidden">
                <div class="flex items-center justify-center min-h-screen z-1 px-30">
                    <div
                        class="bg-White border-1 border-solid border-Grey pt-[74px] pb-[34px] px-[34px] rounded-[14px] relative overflow-hidden max-w-2xl w-full h-auto">
                        <span class="close-modal absolute top-[34px] right-[34px] cursor-pointer">
                            <img src="@asset('images/close-cross.svg')" width="20" height="20" alt="close" class="lozad" />
                        </span>
                        <div class="card overflow-y-auto h-full pr-[28px]">
                            @if (!empty($button_modal['popup_heading']))
                                <div class="title-montserrat title-700 title-Blue_5 mb-14 last:mb-0">
                                    <h4>{!! $button_modal['popup_heading'] !!}</h4>
                                </div>
                            @endif
                            @if (!empty($button_modal['popup_description']))
                                <div class="content mb-24 last:mb-0">
                                    {!! $button_modal['popup_description'] !!}
                                </div>
                            @endif
                            @if (!empty($button_modal['popup_video_url']))
                                <div class="watch-video-btn flex justify-center">
                                    <a href="{{ $button_modal['popup_video_url'] }}"
                                        class="btn btn-border-grey !flex flex-wrap gap-x-2 items-center justify-center" data-lity>
                                        <img src="@asset('images/video-play-icon.svg')" class="!w-[20px] !h-[20px] lozad" width="20"
                                            height="20" alt="Video Play">
                                        @if (!empty($video_button_text))
                                            {!! $video_button_text !!}
                                        @else
                                            Watch Video
                                        @endif
                                    </a>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="fixed inset-0 bg-Black opacity-50 -z-1"></div>
            </div>
            @php $btn_popup_con++; @endphp
        @endif
    @endforeach
@endif
