@if (isset($content->hide_section) && $content->hide_section == 'no')
    <section class="img-grid-wrapper lg:py-100 py-50 bg-Blue_4 @if ($content->extra_class) {!! $content->extra_class !!} @endif" @if ($content->id) id="{!! $content->id !!}" @endif>
        @if (!empty($content->heading) || !empty($content->description))
            <div class="container-fluid-xl xl3:max-w-screen-2xl lgscreen:px-30 mb-40 lg:mb-55 last:mb-0">
                <div class="flex flex-wrap items-center justify-start m-0 p-0 w-full relative">
                    @if (!empty($content->heading))
                        <div class="title-roboto title-400 title-Blue_3 mb-20 last:mb-0">
                            <h2>{!! $content->heading !!}</h2>
                        </div>
                    @endif
                    @if (!empty($content->description))
                        <div class="content mb-24 last:mb-0">
                            {!! $content->description !!}
                        </div>
                    @endif
                </div>
            </div>
        @endif
        @if (!empty($content->image_grid))
            <div class="container-fluid-md xl3:max-w-screen-2xl lgscreen:px-30">
                <div class="flex flex-wrap items-start justify-center m-0 p-0 w-full relative gap-10 lg:gap-[55px]">
                    @foreach ($content->image_grid as $image_grid_data)
                        <div class="w-full lg:flex-1">
                            @if (!empty($image_grid_data['image']))
                                <div class="img relative overflow-hidden w-full block pt-[63.59%] mb-20 last:mb-0">
                                    <img src="{!! $image_grid_data['image']['url'] !!}" width="628.5" height="400" class="absolute top-0 left-0 w-full h-full object-cover lozad" alt="{!! $image_grid_data['image']['alt'] !!}">
                                </div>
                            @endif
                            <div class="flex flex-col items-center justify-center lg:text-center m-0 p-0 w-full gap-[10px] lg:px-40">
                                @if (!empty($image_grid_data['title']))
                                    <div class="sub title-roboto title-400 title-Blue_8 capitalize">
                                        <h4>{!! $image_grid_data['title'] !!}</h4>
                                    </div>
                                @endif
                                @if (!empty($image_grid_data['description']))
                                    <div class="content grey">
                                        {!! $image_grid_data['description'] !!}
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
    </section>
@endif
