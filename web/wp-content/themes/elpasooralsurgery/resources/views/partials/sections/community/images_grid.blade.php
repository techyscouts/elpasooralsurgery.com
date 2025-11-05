@if (isset($content->hide_section) && $content->hide_section == 'no')
    <section class="media-grid-wrapper lg:py-100 py-50 @if ($content->extra_class) {!! $content->extra_class !!} @endif"
        @if ($content->id) id="{!! $content->id !!}" @endif>
        <div class="container-fluid-md xl3:max-w-screen-2xl lgscreen:px-30">
            <div
                class="flex flex-wrap items-center justify-center m-0 p-0 mdscreen:w-full gap-y-10 lg:gap-y-[55px] relative md:-mx-20 lg:-mx-[27px]">
                @if (!empty($content->heading))
                    <div class="w-full">
                        <div
                            class="title-roboto title-400 title-Blue_3 capitalize mb-20 last:mb-0 md:text-center text-left">
                            <h2 class="h3">{!! $content->heading !!}</h2>
                        </div>
                    </div>
                @endif
                @if (!empty($content->image_grid))
                    @foreach ($content->image_grid as $image_grid_con)
                        @if (!empty($image_grid_con['image']) || !empty($image_grid_con['button']))
                            <div class="w-full md:w-6/12 lg:px-[27px] md:px-20">
                                <div class="relative">
                                    <a href="{!! $image_grid_con['button']['url'] !!}" class="img relative overflow-hidden block w-full pt-[65.50%]">
                                        @if (!empty($image_grid_con['image']))
                                                <img src="{!! $image_grid_con['image']['url'] !!}" width="628.5" height="412"
                                                    alt="{!! $image_grid_con['image']['alt'] !!}"
                                                    class="absolute top-0 left-0 w-full h-full object-cover lozad">
                                        @endif
                                    </a>
                                    @if (!empty($image_grid_con['button']))
                                        <div
                                            class="watch-video-btn inline-block absolute top-50_per left-50_per translate-x-minus_50 translate-y-minus_50">
                                            <a href="{!! $image_grid_con['button']['url'] !!}"
                                                class="btn btn-border-grey !flex flex-wrap items-center justify-center gap-x-[10px]"
                                                @if ($image_grid_con['button']['target']) target="{!! $image_grid_con['button']['target'] !!}" @else target="_self" @endif>{!! $image_grid_con['button']['title'] !!}</a>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        @endif
                    @endforeach
                @endif
            </div>
        </div>
    </section>
@endif
