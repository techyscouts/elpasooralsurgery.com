@if (isset($content->hide_section) && $content->hide_section == 'no')
    @php $instructions_back_button = get_field('instructions_back_button','option'); @endphp
    @if (!empty($content->general_content))
        @php $i=1; @endphp
        @foreach ($content->general_content as $general_content_details)
            <section
                class="before-after-content @if ($general_content_details['section_color'] == 'light-blue') bg-Blue_4 @endif lg:py-[90px] py-45  @if ($i == 1) @if ($content->extra_class) {!! $content->extra_class !!} @endif @endif"
                @if ($i == 1) @if ($content->id) id="{!! $content->id !!}" @endif
                @endif>
                @if ($i == 1)
                    @if (!empty($instructions_back_button))
                        <div class="container-fluid-md xl3:max-w-screen-2xl max_width_768:px-30 lgscreen:px-30">
                            <a href="{!! $instructions_back_button['url'] !!}"
                                class="uppercase text-16 font-700 flex flex-wrap items-center gap-x-[10px] text-Grey">
                                <img src="@asset('images/back.svg')" width="9" height="14" alt="Back"
                                    class="lozad">{!! $instructions_back_button['title'] !!}</a>
                        </div>
                    @endif
                @endif
                @if (
                    !empty($general_content_details['sub_heading']) ||
                        !empty($general_content_details['heading']) ||
                        !empty($general_content_details['description']))
                    <div
                        class="container-fluid-xl xl3:max-w-screen-2xl lgscreen:px-30 @if ($i == 1) lg:pt-55 pt-25 @endif">
                        <div class="ba-row">
                            <div class="content-grid">
                                @if (!empty($general_content_details['sub_heading']))
                                    <div class="title-roboto title-Blue_3 title-400 mb-10 last:mb-0">
                                        <h2 class="h4">{!! $general_content_details['sub_heading'] !!}</h2>
                                    </div>
                                @endif
                                @if (!empty($general_content_details['heading']))
                                    <div class="title-roboto title-Blue_3 title-400 mb-10 last:mb-0">
                                        <h3>{!! $general_content_details['heading'] !!}</h3>
                                    </div>
                                @endif
                                @if (!empty($general_content_details['description']))
                                    <div
                                        class="content @if ($general_content_details['li_tag_style'] == 'dot-style') global-list @else number-list @endif agrey pt-20">
                                        {!! $general_content_details['description'] !!}
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                @endif
            </section>
            @php $i++; @endphp
        @endforeach
    @endif
@endif
