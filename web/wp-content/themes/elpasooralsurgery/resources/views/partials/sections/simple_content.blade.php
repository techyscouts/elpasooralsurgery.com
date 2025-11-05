@if (isset($content->hide_section) && $content->hide_section == 'no')
    <section class="simple-content lg:py-100 py-50 @if ($content->extra_class) {!! $content->extra_class !!} @endif"
        @if ($content->id) id="{!! $content->id !!}" @endif>
        @if (!empty($content->heading) || !empty($content->description))
            <div class="container-fluid-xl xl3:max-w-screen-2xl lgscreen:px-30 xl3:px-100">
                @if (!empty($content->heading))
                    <div class="title-roboto title-Blue_3 font-700 capitalize mb-20 last:mb-0 lg:text-center">
                        <h2>{!! $content->heading !!}</h2>
                    </div>
                @endif
                @if (!empty($content->description))
                    <div class="content pt-20 mx-auto text-left">
                        {!! $content->description !!}
                    </div>
                @endif
            </div>
        @endif
    </section>
@endif
