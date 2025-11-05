@if (isset($content->hide_section) && $content->hide_section == 'no')
    @if (isset($content->section_style) && $content->section_style == 'style-1')
        <section class="procedure-simple-content @if ($content->section_color == 'white') @else bg-Blue_4 @endif lg:py-100 py-40 @if ($content->extra_class) {!! $content->extra_class !!} @endif"
            @if ($content->id) id="{!! $content->id !!}" @endif>
            <div class="container-fluid-xl xl3:max-w-screen-2xl">
                <div class="flex flex-wrap items-center justify-center m-0 p-0 w-full relative lgscreen:px-30">
                    <div class="w-full">
                        @if (!empty($content->heading))
                            <div class="title-roboto title-Blue_3 title-400 capitalize mb-20 last:mb-0">
                                <h3>{!! $content->heading !!}</h3>
                            </div>
                        @endif
                        @if (!empty($content->description))
                            <div class="content agrey mb-40 last:mb-0">
                                {!! $content->description !!}
                            </div>
                        @endif
                        @if (!empty($content->primary_button) || !empty($content->secondary_button))
                            <div class="btn-custom btn-inline justify-center gap-5 lg:gap-10 mb-40 last:mb-0">
                                @if (!empty($content->primary_button))
                                    <a href="{!! $content->primary_button['url'] !!}" class="btn btn-grey" @if ($content->primary_button['target']) target="{!! $content->primary_button['target'] !!}" @else target="_self" @endif>
                                        {!! $content->primary_button['title'] !!}
                                    </a>
                                @endif
                                @if (!empty($content->secondary_button))
                                    <a href="{!! $content->secondary_button['url'] !!}" class="btn btn-border-grey" @if ($content->secondary_button['target']) target="{!! $content->secondary_button['target'] !!}" @else target="_self" @endif>
                                        {!! $content->secondary_button['title'] !!}
                                    </a>
                                @endif
                            </div>
                        @endif

                        @if (!empty($content->sub_heading))
                            <div class="title-roboto title-Blue_3 title-400 capitalize mb-20 last:mb-0">
                                <h3>{!! $content->sub_heading !!}</h3>
                            </div>
                        @endif
                        @if (!empty($content->sub_description))
                            <div class="content agrey mb-40 last:mb-0">
                                {!! $content->sub_description !!}
                            </div>
                        @endif

                    </div>
                </div>
            </div>
        </section>
    @else
        <section class="content-with-button @if ($content->section_color == 'white') @else bg-Blue_4 @endif lg:py-100 py-50 @if ($content->extra_class) {!! $content->extra_class !!} @endif"
            @if ($content->id) id="{!! $content->id !!}" @endif>
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
                    @if (!empty($content->primary_button))
                        <div class="btn-custom btn-inline justify-center gap-5 lg:gap-10">
                            <a href="{!! $content->primary_button['url'] !!}" class="btn btn-grey" @if ($content->primary_button['target']) target="{!! $content->primary_button['target'] !!}" @else target="_self" @endif>
                                {!! $content->primary_button['title'] !!}
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </section>
    @endif
@endif
