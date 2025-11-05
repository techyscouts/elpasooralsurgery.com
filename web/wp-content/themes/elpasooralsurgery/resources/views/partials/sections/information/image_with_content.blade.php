@if (isset($content->hide_section) && $content->hide_section == 'no')
    <section class="visit-zigzag-wrapper lg:py-100 py-50 @if ($content->extra_class) {!! $content->extra_class !!} @endif" @if ($content->id) id="{!! $content->id !!}" @endif>
        <div class="container-fluid-md xl3:max-w-screen-2xl">
            @if (!empty($content->image_boxes))
                @php $i=1;@endphp
                @foreach ($content->image_boxes as $image_boxes_con)
                    @if ($i == 1)
                        <div class="flex flex-wrap items-center justify-center m-0 p-0 w-full relative gap-y-10 gap-x-[50px] xl:gap-x-[100px] mb-40 lg:mb-55 last:mb-0">
                            <div class="w-full lg:flex-1 order-1 lg:order-1">
                                <div class="lgscreen:px-30">
                                    @if (!empty($image_boxes_con['heading']))
                                        <div class="title-roboto title-700 title-Blue_3 mb-14 last:mb-0">
                                            <h2>{!! $image_boxes_con['heading'] !!}</h2>
                                        </div>
                                    @endif
                                    @if (!empty($image_boxes_con['description']))
                                        <div class="content agrey mb-24 last:mb-0">
                                            {!! $image_boxes_con['description'] !!}
                                        </div>
                                    @endif
                                    @if (!empty($image_boxes_con['primary_button']) || !empty($image_boxes_con['secondary_button']))
                                        <div class="btn-custom btn-inline gap-5 lg:gap-10">
                                            @if (!empty($image_boxes_con['primary_button']))
                                                <a href="{!! $image_boxes_con['primary_button']['url'] !!}" class="btn btn-grey" @if ($image_boxes_con['primary_button']['target']) target="{!! $image_boxes_con['primary_button']['target'] !!}" @else target="_self" @endif>{!! $image_boxes_con['primary_button']['title'] !!}</a>
                                            @endif
                                            @if (!empty($image_boxes_con['secondary_button']))
                                                <a href="{!! $image_boxes_con['secondary_button']['url'] !!}" class="btn btn-border-grey" @if ($image_boxes_con['secondary_button']['target']) target="{!! $image_boxes_con['secondary_button']['target'] !!}" @else target="_self" @endif>{!! $image_boxes_con['secondary_button']['title'] !!}</a>
                                            @endif
                                        </div>
                                    @endif
                                </div>
                            </div>
                            @if (!empty($image_boxes_con['image']))
                                <div class="w-full lg:w-6/12 xl:w-full xl:max-w-[615px] order-2 lg:order-2">
                                    <div class="img landscape">
                                        <img src="{!! $image_boxes_con['image']['url'] !!}" width="615" height="600" class="w-full h-full object-cover lozad" alt="{!! $image_boxes_con['image']['alt'] !!}">
                                    </div>
                                </div>
                            @endif
                        </div>
                    @else
                        <div class="flex flex-wrap items-center justify-center m-0 p-0 w-full relative gap-y-10 gap-x-[50px] xl:gap-x-[100px] mb-40 lg:mb-55 last:mb-0">
                            <div class="w-full lg:flex-1 order-1 lg:order-2">
                                <div class="lgscreen:px-30">
                                    @if (!empty($image_boxes_con['heading']))
                                        <div class="title-roboto title-400 title-Blue_3 mb-14 last:mb-0">
                                            <h3>{!! $image_boxes_con['heading'] !!}</h3>
                                        </div>
                                    @endif
                                    @if (!empty($image_boxes_con['description']))
                                        <div class="content global-list agrey mb-24 last:mb-0">
                                            {!! $image_boxes_con['description'] !!}
                                        </div>
                                    @endif
                                    @if (!empty($image_boxes_con['title']))
                                        <div class="title-roboto title-700 title-Blue_3 mb-14 last:mb-0">
                                            <h4>{!! $image_boxes_con['title'] !!}</h4>
                                        </div>
                                    @endif
                                    @if (!empty($image_boxes_con['short_description']))
                                        <div class="content global-list agrey mb-24 last:mb-0">
                                            {!! $image_boxes_con['short_description'] !!}
                                        </div>
                                    @endif
                                </div>
                            </div>
                            @if (!empty($image_boxes_con['image']))
                                <div class="w-full lg:w-6/12 xl:w-full xl:max-w-[615px] order-2 lg:order-1">
                                    <div class="img landscape">
                                        <img src="{!! $image_boxes_con['image']['url'] !!}" width="615" height="600" class="w-full h-full object-cover lozad" alt="{!! $image_boxes_con['image']['alt'] !!}">
                                    </div>
                                </div>
                            @endif
                        </div>
                    @endif
                    @php $i++;@endphp
                @endforeach
            @endif
            @if (!empty($content->heading) || !empty($content->description))
                <div class="flex flex-wrap items-center justify-start m-0 p-0 xl:px-100 w-full relative mb-40 lg:mb-55 last:mb-0">
                <div class="lgscreen:px-30">
                    @if (!empty($content->heading))
                        <div class="title-roboto title-400 title-Blue_3 mb-20 last:mb-0">
                            <h3>{!! $content->heading !!}</h3>
                        </div>
                    @endif
                    @if (!empty($content->description))
                        <div class="content agrey mb-24 last:mb-0">
                            {!! $content->description !!}
                        </div>
                    @endif

                </div>
                </div>
            @endif
        </div>
    </section>
@endif
