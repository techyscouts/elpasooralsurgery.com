@if (isset($content->hide_section) && $content->hide_section == 'no')
    <section
        class="contact-form-wrapper lg:py-100 py-50 @if ($content->extra_class) {!! $content->extra_class !!} @endif"
        @if ($content->id) id="{!! $content->id !!}" @endif>
        <div class="container-fluid-xl xl3:max-w-screen-2xl lgscreen:px-30">
            @if (!empty($content->heading) || !empty($content->form_shortcode))
                <div class="flex flex-wrap items-center justify-center m-0 p-0 w-full relative">
                    @if (!empty($content->heading))
                        <div class="title-roboto title-400 title-Blue_3 mb-40 last:mb-0">
                            <h3>{!! $content->heading !!} </h3>
                        </div>
                    @endif
                    @if (!empty($content->form_shortcode))
                        <div class="form">
                            @php echo do_shortcode($content->form_shortcode); @endphp
                        </div>
                    @endif
                </div>
            @endif
        </div>
    </section>
@endif
