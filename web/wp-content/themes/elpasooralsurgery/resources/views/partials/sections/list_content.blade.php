@if (isset($content->hide_section) && $content->hide_section == 'no')
    <section
        class="list-content bg-Blue_4 lg:py-100 py-50 @if ($content->extra_class) {!! $content->extra_class !!} @endif"
        @if ($content->id) id="{!! $content->id !!}" @endif>
        <div class="container-fluid-md xl3:max-w-screen-2xl lgscreen:px-30">
            @if (!empty($content->heading))
                <div class="pl-100 lgscreen:pl-0">
                    <div class="title-roboto title-Blue_3 title-400">
                        <h2>{!! $content->heading !!}</h2>
                    </div>
                </div>
            @endif
            @if (!empty($content->list_content))
                <div class="grid-section pt-55 lgscreen:pt-25 columns-2 mdscreen2:columns-1">
                    @php
                        $conter = 1;
                    @endphp
                    @foreach ($content->list_content as $item)
                        @if (!empty($item['heading']) || !empty($item['description']))
                            <div class="grid-item flex flex-wrap items-start gap-[55px] lgscreen:gap-[25px]">
                                <div
                                    class="number w-[48px] h-[48px] bg-White rounded-100 flex items-center justify-center text-32 text-Blue_3 font-700">
                                    {!! $conter !!}</div>
                                <div
                                    class="grid-content content !w-[calc(100%_-_150px)] mdscreen:!w-[calc(100%_-_80px)] !grid gap-y-[14px]">
                                    @if (!empty($item['heading']))
                                        <div class="sub text-Blue_3 title-roboto title-400">
                                            <h3>{!! $item['heading'] !!}</h3>
                                        </div>
                                    @endif
                                    @if (!empty($item['description']))
                                        <div class="content agrey">
                                            {!! $item['description'] !!}
                                        </div>
                                    @endif
                                </div>
                            </div>
                            @php
                                $conter++;
                            @endphp
                        @endif
                    @endforeach
                </div>
            @endif
        </div>
    </section>
@endif
