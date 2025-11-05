@if (isset($content->hide_section) && $content->hide_section == 'no')
    @if (!empty($content->heading) || !empty($content->description))
        <section class="intro-content lg:py-100 py-50 @if ($content->extra_class) {!! $content->extra_class !!} @endif"
            @if ($content->id) id="{!! $content->id !!}" @endif>
            <div class="container-fluid-xl xl3:max-w-screen-2xl lgscreen:px-30">
                <div class="text-left lg:text-center">
                    @if (!empty($content->heading))
                        <div class="title-roboto title-Blue_1 title-700 big mb-20 last:mb-0">
                            <h1>{{ $content->heading }}</h1>
                        </div>
                    @endif
                    @if (!empty($content->description))
                        <div class="content agrey mb-24 last:mb-0">
                            {!! $content->description !!}
                        </div>
                    @endif
                </div>
            </div>
        </section>
    @endif
@endif
