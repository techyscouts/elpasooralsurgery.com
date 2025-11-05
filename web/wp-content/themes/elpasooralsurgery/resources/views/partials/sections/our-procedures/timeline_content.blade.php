@if (isset($content->hide_section) && $content->hide_section == 'no')
    <section class="timeline lg:py-55 lg:pb-100 pb-50 @if ($content->extra_class) {!! $content->extra_class !!} @endif"
        @if ($content->id) id="{!! $content->id !!}" @endif>
        <div class="container-fluid-xl xl3:max-w-screen-2xl lgscreen:px-30">
            @if (!empty($content->heading))
                <div class="title-roboto title-Blue_3 title-700 text-center">
                    <h2>{!! $content->heading !!}</h2>
                </div>
            @endif
            @if (!empty($content->timeline_content))
                @php  $i=1;@endphp
                <div class="grid gap-y-[40px] pt-40">
                    @foreach ($content->timeline_content as $timeline_con)
                        @if (!empty($timeline_con['title']) || !empty($timeline_con['description']))
                            <div class="timeline-grid">
                                <div class="flex flex-wrap smscreen2:flex-col gap-[20px]">
                                    <div
                                        class="number flex flex-wrap items-center justify-center bg-Blue_4 w-[48px] h-[48px] rounded-100">
                                        <span class="text-32 text-Blue_3 font-700 font-Roboto">{{ $i }}</span>
                                    </div>
                                    <div class="right-content content global-list agery global-list-grey w-[calc(100%_-_100px)] smscreen2:w-full">
                                        @if (!empty($timeline_con['title']))
                                            <h3 class="text-Blue_3 text-20 font-Roboto font-400 pb-15">
                                                {!! $timeline_con['title'] !!}</h3>
                                        @endif
                                        @if (!empty($timeline_con['description']))
                                            {!! $timeline_con['description'] !!}
                                        @endif
                                    </div>
                                </div>
                            </div>
                            @php  $i++;@endphp
                        @endif
                    @endforeach
                </div>
            @endif
        </div>
    </section>
@endif
