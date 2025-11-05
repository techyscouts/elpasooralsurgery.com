@if (isset($content->hide_section) && $content->hide_section == 'no')
    <section class="content-with-button lg:py-100 py-50 @if ($content->extra_class) {!! $content->extra_class !!} @endif" @if ($content->id) id="{!! $content->id !!}" @endif>
        <div class="container-fluid-xl xl3:max-w-screen-2xl">
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
                @if (!empty($content->button))
                    <div class="btn-custom btn-inline justify-center gap-5 lg:gap-10">
                        <a href="{!! $content->button['url'] !!}" class="btn btn-grey" @if ($content->button['target']) target="{!! $content->button['target'] !!}" @else target="_self" @endif>{!! $content->button['title'] !!}</a>
                    </div>
                @endif
            </div>
        </div>
    </section>
@endif
