@if (isset($content->hide_section) && $content->hide_section == 'no')
    @if (!empty($content->description))
        <section class=" ctm-general-sec lg:py-100 py-50 @if ($content->extra_class) {!! $content->extra_class !!} @endif"
            @if ($content->id) id="{!! $content->id !!}" @endif>
            <div class="container-fluid-md xl3:max-w-screen-2xl lgscreen:px-30">
                <div class="flex flex-wrap items-center justify-center m-0 p-0 w-full relative">
                    <div class="content agrey mb-20 last:mb-0">
                        {!! $content->description !!}
                    </div>
                </div>
            </div>
        </section>
    @endif
@endif
