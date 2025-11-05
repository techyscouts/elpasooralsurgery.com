@if (isset($content->hide_section) && $content->hide_section == 'no')
    <section
        class="zigzag-fullimg-content relative overflow-hidden bg-Blue_4 @if ($content->extra_class) {!! $content->extra_class !!} @endif"
        @if ($content->id) id="{!! $content->id !!}" @endif>
        @if (!empty($content->image))
            <div class="w-full h-full hidden absolute top-0 right-0 xl3:block">
                <div class="img landscape block">
                    <img src="{!! $content->image['url'] !!}" class="ml-auto lozad" width="800" height="525"
                        alt="{!! $content->image['alt'] !!}">
                </div>
            </div>
        @endif
        <div class="container-fluid-md lg:pr-0  xl3:max-w-screen-2xl">
            <div class="flex flex-wrap items-center justify-center m-0 p-0 lg:gap-10 xl:gap-20">
                @if (!empty($content->heading) || !empty($content->description) || !empty($content->button))
                    <div class="w-full lg:flex-1 lg:py-100 py-50 lg:order-1 order-2 lgscreen:px-30">
                        @if (!empty($content->heading))
                            <div class="title-roboto title-700 title-Blue_3 mb-14 last:mb-0">
                                <h2>{!! $content->heading !!}</h2>
                            </div>
                        @endif
                        @if (!empty($content->description))
                            <div class="content mb-24 last:mb-0">
                                {!! $content->description !!}
                            </div>
                        @endif
                        @if (!empty($content->button))
                            <div class="btn-custom lgscreen:text-center">
                                <a href="{!! $content->button['url'] !!}"
                                    @if ($content->button['target']) target="{!! $content->button['target'] !!}" @else target="_self" @endif
                                    class="btn btn-grey">{!! $content->button['title'] !!}</a>
                            </div>
                        @endif
                    </div>
                @endif
                @if (!empty($content->image))
                    <div class="w-full lg:max-w-[800px] lg:order-2 order-1">
                        <div class="img landscape block xl3:hidden ml-auto lgscreen:pl-30">
                            <img src="{!! $content->image['url'] !!}" width="800" height="525"
                                alt="{!! $content->image['alt'] !!}" class="lozad">
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </section>
@endif
