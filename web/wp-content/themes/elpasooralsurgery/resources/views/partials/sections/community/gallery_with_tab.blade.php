@if (isset($content->hide_section) && $content->hide_section == 'no')
    @php
        $load_more_images_button_text = get_field('load_more_images_button_text', 'option');
    @endphp
    <section
        class="gallery-wrapper lg:py-100 py-50 bg-Blue_4 @if ($content->extra_class) {!! $content->extra_class !!} @endif"
        @if ($content->id) id="{!! $content->id !!}" @endif data-show="3">
        @if (!empty($content->gallery_tabs))
            <div class="container-fluid-md xl3:max-w-screen-2xl lgscreen:px-30">
                <div class="flex flex-col items-center justify-center w-full m-0 mb-55 last:mb-0 p-0 relative">
                    @if (!empty($content->heading))
                        <div class="title-roboto title-400 title-Blue_3 mb-20 last:mb-0 md:text-center">
                            <h3>{!! $content->heading !!}</h3>
                        </div>
                    @endif
                    @if (!empty($content->gallery_tabs))
                        <div class="gallerytabs">
                            @foreach ($content->gallery_tabs as $index => $gallery_tabs_con)
                                @if (!empty($gallery_tabs_con['tab_heading']))
                                    <button class="tab-link @if ($loop->last) active @endif"
                                        data-year="{!! $gallery_tabs_con['tab_heading'] !!}">
                                        {!! $gallery_tabs_con['tab_heading'] !!}
                                        <span></span>
                                    </button>
                                @endif
                            @endforeach
                        </div>
                    @endif
                </div>
                @if (!empty($content->gallery_tabs))
                    <div class="gallery">
                        @foreach ($content->gallery_tabs as $gallery_tabs_img)
                            @if (!empty($gallery_tabs_img['images']))
                                @foreach ($gallery_tabs_img['images'] as $gallery_images)
                                    @if (!empty($gallery_images['image']))
                                        <a href="{!! $gallery_images['image']['url'] !!}"
                                            class="year ctm-tab-gallery @if ($loop->parent->last) active @endif"
                                            data-year="{!! $gallery_tabs_img['tab_heading'] !!}" data-fancybox="gallery">
                                            <img src="{!! $gallery_images['image']['url'] !!}" width="424" height="280"
                                                alt="{!! $gallery_images['image']['alt'] !!}" class="lozad">
                                        </a>
                                    @endif
                                @endforeach
                            @endif
                        @endforeach
                    </div>
                @endif
                <div
                    class="flex pt-50 flex-wrap items-center smscreen:flex-col gap-x-[40px] lgscreen:gap-x-[20px] gap-y-[15px] justify-center">
                    <div class="btn-custom">
                        <a href="javascript:void(0)" class="btn btn-border-grey" id="tab-gallery-load-btn">
                            @if (!empty($load_more_images_button_text))
                                {!! $load_more_images_button_text !!}
                            @else
                                Load More Images
                            @endif
                        </a>
                    </div>
                </div>
                @if (!empty($content->bottom_heading))
                    <div class="title-roboto title-700 title-Blue_3 mb-20 pt-50 last:mb-0 md:text-center">
                        <h4>{!! $content->bottom_heading !!}</h4>
                    </div>
                @endif
            </div>
        @endif
    </section>
@endif
