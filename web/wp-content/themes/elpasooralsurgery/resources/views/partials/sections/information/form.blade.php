@if (isset($content->hide_section) && $content->hide_section == 'no')
    <section class="form-section lg:py-100 py-50 overflow-hidden relative @if ($content->extra_class) {!! $content->extra_class !!} @endif" @if ($content->id) id="{!! $content->id !!}" @endif>
        @if (isset($content->form_shortcode) && !empty($content->form_shortcode))
            <div class="container-fluid-xl xl3:max-w-screen-2xl lgscreen:px-30 mb-[55px] last:mb-0">
                <div class="form">
                    @php echo do_shortcode($content->form_shortcode); @endphp
                </div>
            </div>
        @endif
    </section>
@endif
