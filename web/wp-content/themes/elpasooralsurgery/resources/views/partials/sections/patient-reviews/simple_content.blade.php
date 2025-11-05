@if (isset($content->hide_section) && $content->hide_section == 'no')
    <section class="simple-content lg:py-100 py-40 @if ($content->extra_class) {!! $content->extra_class !!} @endif" @if ($content->id) id="{!! $content->id !!}" @endif>
        <div class="container-fluid-xl xl3:max-w-screen-2xl lgscreen:px-30">
            @if (!empty($content->heading))
                <div class="title-roboto title-Blue_3 title-400 capitalize mb-20 last:mb-0">
                    <h2 class="h3">{!! $content->heading !!}</h2>
                </div>
            @endif
            @if (!empty($content->description))
                <div class="content big mb-30 last:mb-0 text-left">
                    {!! $content->description !!}
                </div>
            @endif
            @if (!empty($content->button_heading))
                <div class="sub title-roboto title-Fonts title-400 capitalize mb-10 last:mb-0">
                    <h3 class="h5">{!! $content->button_heading !!}</h3>
                </div>
            @endif
            @if (!empty($content->buttons))
                <div class="btn-custom btn-inline gap-5 lg:gap-10">
                    @foreach ($content->buttons as $buttons)
                        @if (!empty($buttons['button']))
                            <a href="{!! $buttons['button']['url'] !!}" @if ($buttons['button']['target']) target="{!! $buttons['button']['target'] !!}" @else target="_self" @endif class="btn btn-border-grey">
                                {!! $buttons['button']['title'] !!}
                            </a>
                        @endif
                    @endforeach
                </div>
            @endif
        </div>
    </section>
@endif
