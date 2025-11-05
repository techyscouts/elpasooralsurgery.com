@if (isset($content->hide_section) && $content->hide_section == 'no')
    <section
        class="content-with-button lg:pb-100 pb-50 @if ($content->section_style == 'style_2') lg:pt-100 pt-50 @endif @if ($content->extra_class) {!! $content->extra_class !!} @endif"
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
                @if ($content->section_style == 'style_1')
                    @if (!empty($content->primary_button) || !empty($content->secondary_button))
                        <div class="btn-custom btn-inline gap-5 lg:gap-10 justify-center">
                            @if (!empty($content->primary_button))
                                <a href="{!! $content->primary_button['url'] !!}" class="btn btn-grey min-w-[200px]"
                                    @if ($content->primary_button['target']) target="{!! $content->primary_button['target'] !!}" @else target="_self" @endif>{!! $content->primary_button['title'] !!}</a>
                            @endif
                            @if (!empty($content->secondary_button))
                                <a href="{!! $content->secondary_button['url'] !!}" class="btn btn-border-grey min-w-[200px]"
                                    @if ($content->secondary_button['target']) target="{!! $content->secondary_button['target'] !!}" @else target="_self" @endif>{!! $content->secondary_button['title'] !!}</a>
                            @endif
                        </div>
                    @endif
                @else
                    @if (!empty($content->buttons))
                        <div class="btn-custom btn-inline gap-5 lg:gap-10 justify-center">
                            @foreach ($content->buttons as $button)
                                @if (!empty($button['button']))
                                    <a href="{!! $button['button']['url'] !!}" class="btn btn-grey min-w-[200px]"
                                        @if ($button['button']['target']) target="{!! $button['button']['target'] !!}" @else target="_self" @endif>{!! $button['button']['title'] !!}</a>
                                @endif
                            @endforeach
                        </div>
                    @endif
                @endif
            </div>
        </div>
    </section>
@endif
