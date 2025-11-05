@if (isset($content->hide_section) && $content->hide_section == 'no')
    <section
        class="zigzag-img-content py-50 lg:py-100 @if ($content->background_color == 'light-blue') bg-Blue_4 @else @endif @if ($content->extra_class) {!! $content->extra_class !!} @endif"
        @if ($content->id) id="{!! $content->id !!}" @endif>
        <div class="container-fluid-md xl3:max-w-screen-2xl">
            <div
                class="flex flex-wrap items-center justify-center w-full m-0 p-0 relative lgscreen:gap-10 lg:gap-x-10 xxl:gap-x-[100px]">
                @if (!empty($content->image))
                    <div
                        class="w-full lg:w-6/12 xxl:w-full xxl:flex-1 @if ($content->image_position == 'left') lg:order-1 order-2 @else lg:order-2 order-1 @endif @if ($content->display_mobile_image == 'yes') img-mobile-show  @else img-mobile-hide @endif">
                        <div class="img @if ($content->image_style == 'portrait') portrait @else landscape @endif">
                            <img src="{!! $content->image['url'] !!}" width="{!! $content->image['width'] !!}"
                                height="{!! $content->image['height'] !!}" class="img-fluid lozad"
                                alt="{!! $content->image['alt'] !!}">
                        </div>
                    </div>
                @endif
                <div
                    class="w-full lg:flex-1 @if ($content->image_position == 'left') lg:order-2 order-1 @else lg:order-1 order-2 @endif">
                    <div class="zigzag-content lgscreen:px-30">
                        @if (!empty($content->heading))
                            <div
                                class="title-roboto @if ($content->heading_style == 'style-bold') title-700 @else title-400 @endif title-Blue_3 mb-14 last:mb-0 text-left">
                                @if ($content->heading_style == 'style-bold')
                                    <h2>{!! $content->heading !!} </h2>
                                @else
                                    <h3>{!! $content->heading !!} </h3>
                                @endif
                            </div>
                        @endif
                        @if (!empty($content->description))
                            <div
                                class="content agrey mb-24 last:mb-0 lg:text-left @if ($content->text_size == 'big') big @endif">
                                {!! $content->description !!}
                            </div>
                        @endif
                        @if (!empty($content->logo) || !empty($content->primary_button) || !empty($content->secondary_button))
                            <div class="btn-custom btn-inline lg:gap-10 text-center lg:text-left">
                                @if (!empty($content->logo))
                                    <img src="{!! $content->logo['url'] !!}" width="300" height="180"
                                        alt="{!! $content->logo['alt'] !!}" class="lozad">
                                @endif
                                @if (!empty($content->primary_button))
                                    <a href="{!! $content->primary_button['url'] !!}"
                                        @if ($content->primary_button['target']) target="{!! $content->primary_button['target'] !!}" @else target="_self" @endif
                                        class="btn btn-grey">
                                        {!! $content->primary_button['title'] !!}
                                    </a>
                                @endif
                                @if (!empty($content->secondary_button))
                                    <a href="{!! $content->secondary_button['url'] !!}"
                                        @if ($content->secondary_button['target']) target="{!! $content->secondary_button['target'] !!}" @else target="_self" @endif
                                        class="btn btn-border-grey">
                                        {!! $content->secondary_button['title'] !!}
                                    </a>
                                @endif
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
@endif
