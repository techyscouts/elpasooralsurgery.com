@if (isset($content->hide_section) && $content->hide_section != 1)
    <section class="content-with-button lg:pb-100 pb-50 @if ($content->extra_class) {!! $content->extra_class !!} @endif"
        @if ($content->id) id="{!! $content->id !!}" @endif>
        <div class="container-fluid-md xl3:max-w-screen-2xl">
            <div class="lg:text-center lgscreen:px-30">
                @if (!empty($content->heading))
                    <div class="title-roboto title-Blue_3 title-400 mb-20 last:mb-0">
                        <h3>{!! $content->heading !!}</h3>
                    </div>
                @endif
                @if (!empty($content->description))
                    <div class="content mb-24 last:mb-0">
                        {!! $content->description !!}
                    </div>
                @endif
                @if (!empty($content->buttons))
                    <div
                        class="btn-custom btn-inline gap-5 lg:gap-10 justify-center">
                        @foreach ($content->buttons as $button)
                            @if (!empty($button['button']))
                                <a href="{!! $button['button']['url'] !!}"
                                    @if ($button['button']['target']) target="{!! $button['button']['target'] !!}" @else target="_self" @endif
                                    class="btn btn-border-grey min-w-[200px]">{!! $button['button']['title'] !!}</a>
                            @endif
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </section>
@endif
