@if (isset($content->hide_section) && $content->hide_section == 'no')
    @php $placeholder_image = get_field('placeholder_image', 'option');  @endphp
    <section
        class="meet-our-doctors bg-Blue_4 lg:py-100 py-50 @if ($content->extra_class) {!! $content->extra_class !!} @endif"
        @if ($content->id) id="{!! $content->id !!}" @endif>
        <div class="container-fluid-md xl3:max-w-screen-2xl">
            @if (!empty($content->heading) || !empty($content->description))
                <div class="lg:px-50 xl:px-100 xl3:px-100 lgscreen:px-30">
                    @if (!empty($content->heading))
                        <div class="title-roboto title-400 title-Blue_3">
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
            @if (!empty($content->doctors_arr))
                <div
                    class="grid grid-cols-3 smscreen2:grid-cols-1 mdscreen2:grid-cols-2 pt-55 lgscreen:pt-25 gap-[55px] lgscreen:gap-y-10 lgscreen:gap-[25px]">
                    @foreach ($content->doctors_arr as $doctor_details)
                        @if (!empty($doctor_details['url']) || !empty($doctor_details['doctor_title']))
                            <a class="doctors-bx" href="{!! $doctor_details['url'] !!}">
                                <div class="img relative">
                                    @if (!empty($doctor_details['fea_img']))
                                        <img src="{!! $doctor_details['fea_img'] !!}" class="img-ratio lozad" width="400"
                                            height="412" alt="{!! $doctor_details['title'] !!}">
                                    @else
                                        <img src="{!! $placeholder_image['url'] !!}" class="img-ratio lozad" width="400"
                                            height="412" alt="{!! $doctor_details['title'] !!}">
                                    @endif
                                </div>
                                @if (!empty($doctor_details['doctor_title']))
                                    <div class="sub title-roboto title-400 title-Fonts pt-20 lgscreen:px-30">
                                        <h4>
                                            {!! $doctor_details['doctor_title'] !!}
                                        </h4>
                                    </div>
                                @endif
                            </a>
                        @endif
                    @endforeach
                </div>
            @endif
        </div>
    </section>
@endif
