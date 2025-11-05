@if (isset($content->hide_section) && $content->hide_section == 'no')
    <section class="map-wrapper mdscreen:h-[500px] relative overflow-hidden @if ($content->extra_class) {!! $content->extra_class !!} @endif"
        @if ($content->id) id="{!! $content->id !!}" @endif>
        <div class="container-fluid mdscreen:h-full">
            @if (!empty($content->link) || !empty($content->map_image))
                <div class="flex flex-wrap items-center justify-center m-0 p-0 w-full mdscreen:h-full">
                    @if (!empty($content->link))
                        <a href="{!! $content->link['url'] !!}"
                            @if ($content->link['target']) target="{!! $content->link['target'] !!}" @else target="_self" @endif
                            class="img mdscreen:h-full">
                            @if (!empty($content->map_image))
                                <img src="{!! $content->map_image['url'] !!}" width="1512" height="550"
                                    class="w-full h-full block object-cover lozad mdscreen:object-[68%_0] mdscreen:translate-y-[30px]" alt="{!! $content->map_image['alt'] !!}">
                            @endif
                        </a>
                    @endif
                </div>
            @endif
        </div>
    </section>
@endif
