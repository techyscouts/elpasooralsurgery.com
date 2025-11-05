@if (isset($content->hide_section) && $content->hide_section == 'no')
    <section class="zigzag-dr py-25 @if ($content->extra_class) {!! $content->extra_class !!} @endif"
        @if ($content->id) id="{!! $content->id !!}" @endif>
        <div class="container-fluid-md xl3:max-w-screen-2xl">
            <div
                class="flex flex-wrap items-center justify-center m-0 mb-40 lg:mb-55 last:mb-0 p-0 w-full relative gap-y-10 lg:gap-x-[50px] xl:gap-x-[100px]">
                @if (!empty($content->image))
                    <div
                        class="w-full lg:w-6/12 xxl:w-full xxl:flex-1 @if ($content->image_position == 'left') lg:order-1 order-2 @else lg:order-2 order-2 @endif">
                        <div class="img portrait">
                            <img src="{!! $content->image['url'] !!}" class="w-full h-full object-cover lozad" width="615"
                                height="600" alt="{!! $content->image['alt'] !!}">
                        </div>
                    </div>
                @endif
                @if (!empty($content->heading) || !empty($content->description))
                    <div
                        class="w-full lg:flex-1 @if ($content->image_position == 'left') lg:order-2 order-1 @else lg:order-1 order-1 @endif">
                        <div class="zigzag-content lgscreen:px-30">
                            @if (!empty($content->heading))
                                <div class="title-roboto title-400 title-Blue_3 mb-14 last:mb-0">
                                    <h3>
                                        {!! $content->heading !!}
                                    </h3>
                                </div>
                            @endif
                            @if (!empty($content->description))
                                <div class="content agrey mb-24 last:mb-0 lg:text-left">
                                    {!! $content->description !!}
                                </div>
                            @endif
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </section>
@endif
