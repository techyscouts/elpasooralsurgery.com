@if (isset($content->hide_section) && $content->hide_section == 'no')

    @if ($content->section_style == 'style-1')
        <section
            class="content-with-button lg:py-100 py-50 @if ($content->section_color == 'light-blue') bg-Blue_4 @endif @if ($content->extra_class) {!! $content->extra_class !!} @endif"
            @if ($content->id) id="{!! $content->id !!}" @endif>
            <div class="container-fluid-xl xl3:max-w-screen-2xl lgscreen:px-30">
                <div class="flex flex-wrap items-center justify-center m-0 p-0 w-full relative gap-10">
                    @if (!empty($content->heading) || !empty($content->description))
                        <div class="@if ($content->text_position == 'left') text-left @else lg:text-center @endif w-full">
                            @if (!empty($content->heading))
                                <div class="title-roboto title-400 title-Blue_3 mb-20 last:mb-0">
                                    <h3>{!! $content->heading !!}</h3>
                                </div>
                            @endif
                            @if (!empty($content->description))
                                <div class="content global-list agrey mb-24 last:mb-0">
                                    {!! $content->description !!}
                                </div>
                            @endif
                        </div>
                    @endif
                    @if (!empty($content->simple_description))
                        @foreach ($content->simple_description as $simple_description_con)
                            @if (!empty($simple_description_con['heading']) || !empty($simple_description_con['description']))
                                <div
                                    class="@if ($content->text_position == 'left') text-left @else lg:text-center @endif w-full">
                                    @if (!empty($simple_description_con['heading']))
                                        <div class="title-roboto title-400 title-Blue_3 mb-20 last:mb-0">
                                            <h3>{!! $simple_description_con['heading'] !!}</h3>
                                        </div>
                                    @endif
                                    @if (!empty($simple_description_con['description']))
                                        <div class="content global-list agrey mb-24 last:mb-0">
                                            {!! $simple_description_con['description'] !!}
                                        </div>
                                    @endif
                                </div>
                            @endif
                        @endforeach
                    @endif
                </div>
            </div>
        </section>
    @else
        <section
            class="content-with-button lg:py-100 py-50 @if ($content->section_color == 'light-blue') bg-Blue_4 @endif @if ($content->extra_class) {!! $content->extra_class !!} @endif"
            @if ($content->id) id="{!! $content->id !!}" @endif>
            @if (!empty($content->heading) || !empty($content->description))
                <div class="container-fluid-xl xl3:max-w-screen-2xl lgscreen:px-30">
                    <div class="flex flex-wrap items-center justify-center m-0 p-0 w-full relative gap-10">
                        <div class="@if ($content->text_position == 'left') text-left @else lg:text-center @endif w-full">
                            @if (!empty($content->heading))
                                <div class="title-roboto title-400 title-Blue_3 uppercase mb-20 last:mb-0">
                                    <h3>{!! $content->heading !!}</h3>
                                </div>
                            @endif
                            @if (!empty($content->description))
                                <div class="content global-list agrey mb-24 last:mb-0">
                                    {!! $content->description !!}
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            @endif
        </section>
    @endif
@endif
