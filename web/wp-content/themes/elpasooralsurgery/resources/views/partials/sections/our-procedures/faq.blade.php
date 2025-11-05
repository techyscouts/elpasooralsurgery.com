@if (isset($content->hide_section) && $content->hide_section == 'no')
    @if (!empty($content->faq))
        @php $i=1; @endphp
        <section class="accordion-wrapper lg:py-100 py-50 lg:pt-0 pt-0 @if ($content->extra_class) {!! $content->extra_class !!} @endif" @if ($content->id) id="{!! $content->id !!}" @endif>
            <div class="container-fluid-xl xl3:max-w-screen-2xl lgscreen:px-30">
                @foreach ($content->faq as $faq_con)
                    @if (!empty($faq_con['heading']) || !empty($faq_con['description']))
                        <div class="accordion-item">
                            @if (!empty($faq_con['heading']))
                                <div class="accordion-header @if ($i == 1) active @endif">
                                    <div class="title-roboto title-700 title-Blue_3">
                                        <h5>{!! $faq_con['heading'] !!}</h5>
                                    </div>
                                </div>
                            @endif
                            @if (!empty($faq_con['description']))
                                <div class="accordion-content">
                                    {!! $faq_con['description'] !!}
                                </div>
                            @endif
                        </div>
                    @endif
                    @php $i++; @endphp
                @endforeach
            </div>
        </section>
    @endif
@endif
