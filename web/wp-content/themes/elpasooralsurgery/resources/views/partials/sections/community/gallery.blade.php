@if (isset($content->hide_section) && $content->hide_section == 'no')
    @php
        $load_more_images_button_text = get_field('load_more_images_button_text', 'option');
    @endphp
    <section
        class="gallery-grid-wrapper lg:py-100 py-50 bg-Blue_4 @if ($content->extra_class) {!! $content->extra_class !!} @endif"
        @if ($content->id) id="{!! $content->id !!}" @endif>
        <div class="container-fluid-md xl3:max-w-screen-2xl lgscreen:px-30">
            @if (!empty($content->heading))
                <div class="flex flex-col items-center justify-center w-full m-0 p-0 gap-10 lg:gap-[55px] relative">
                    <div class="title-roboto title-400 title-Blue_3 mb-20 last:mb-0 md:text-center">
                        <h3>{!! $content->heading !!}</h3>
                    </div>
                </div>
            @endif
            @if (!empty($content->gallery))
                <div class="gallery-grid grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5 m-0 p-0 w-full">
                    @foreach ($content->gallery as $key => $gallery_grid)
                        @if (!empty($gallery_grid['image']))
                            <a href="{!! $gallery_grid['image']['url'] !!}" class="ctm-gallery-item" data-fancybox="gallery"
                                style="display: none;">
                                <img src="{!! $gallery_grid['image']['url'] !!}" width="424" height="280"
                                    alt="{!! $gallery_grid['image']['alt'] !!}" class="lozad">
                            </a>
                        @endif
                    @endforeach
                </div>
            @endif
            @if (count($content->gallery) > 6)
                <div class="btn-custom">
                    <a href="javascript:void(0)" class="btn btn-border-grey" id="gallery-load-btn">
                        @if (!empty($load_more_images_button_text))
                            {!! $load_more_images_button_text !!}
                        @else
                            Load More Images
                        @endif
                    </a>
                </div>
            @endif
            @if (!empty($content->bottom_heading))
                <div class="title-roboto title-700 title-Blue_3 mb-20 pt-50 last:mb-0 md:text-center">
                    <h4>{!! $content->bottom_heading !!}</h4>
                </div>
            @endif
        </div>
    </section>
@endif
