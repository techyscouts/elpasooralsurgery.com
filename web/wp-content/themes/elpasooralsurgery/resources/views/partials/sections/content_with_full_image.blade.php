@if (isset($content->hide_section) && $content->hide_section == 'no')
    <section class="office-content py-50 lg:py-100 @if ($content->extra_class) {!! $content->extra_class !!} @endif"
        @if ($content->id) id="{!! $content->id !!}" @endif>
        <div class="container-fluid-md xl3:max-w-screen-2xl">
            @if (!empty($content->heading) || !empty($content->description))
                <div class="lgscreen:px-30">
                    @if (!empty($content->heading))
                        <div class="title-roboto title-Blue_3 title-400 lg:text-center">
                            <h3>{!! $content->heading !!}</h3>
                        </div>
                    @endif
                    @if (!empty($content->description))
                        <div class="content pt-20">
                            {!! $content->description !!}
                        </div>
                    @endif
                </div>
            @endif
            @if (!empty($content->image))
                <div class="pt-55 lgscreen:pt-25">
                    <div class="img relative">
                        <img src="{!! $content->image['url'] !!}" class="img-ratio lozad" width="1312" height="660"
                            alt="{!! $content->image['alt'] !!}">
                    </div>
                </div>
            @endif
        </div>
    </section>
@endif
