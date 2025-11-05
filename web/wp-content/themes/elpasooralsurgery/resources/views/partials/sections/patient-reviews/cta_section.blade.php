@if (isset($content->hide_section) && $content->hide_section == 'no')
    <section class="content-with-button lg:py-100 py-50 @if ($content->extra_class) {!! $content->extra_class !!} @endif" @if ($content->id) id="{!! $content->id !!}" @endif>
        @if (!empty($content->heading) || !empty($content->description) || !empty($content->button))
            <div class="container-fluid-xl xl3:max-w-screen-2xl lgscreen:px-30">
                <div class="text-left lg:text-center">
                    @if (!empty($content->heading))
                        <div class="title-roboto title-Blue_3 title-400 mb-20 last:mb-0">
                            <h3>{!! $content->heading !!}</h3>
                        </div>
                    @endif
                    @if (!empty($content->description))
                        <div class="content mb-20 last:mb-0">
                            {!! $content->description !!}
                        </div>
                    @endif
                    @if (!empty($content->button))
                        <div class="btn-custom">
                            <a href="{!! $content->button['url'] !!}" @if ($content->button['target']) target="{!! $content->button['target'] !!}" @else target="_self" @endif class="btn btn-grey">{!! $content->button['title'] !!}</a>
                        </div>
                    @endif
                </div>
            </div>
        @endif
    </section>
@endif
