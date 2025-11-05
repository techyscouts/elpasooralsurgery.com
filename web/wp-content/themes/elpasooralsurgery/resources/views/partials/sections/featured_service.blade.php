@if (isset($content->hide_section) && $content->hide_section == 'no')
    <section
        class="services-wrapper bg-LighterGrey lg:py-100 py-50 @if ($content->extra_class) {!! $content->extra_class !!} @endif"
        @if ($content->id) id="{!! $content->id !!}" @endif>
        <div class="container-fluid-lg xl3:max-w-screen-2xl">
            @if (!empty($content->heading) || !empty($content->description))
                <div class="flex flex-wrap items-center justify-center m-0 lg:mb-55 p-0 lgscreen:px-30 w-full relative">
                    <div class="w-full lg:w-[1000px] lg:text-center">
                        @if (!empty($content->heading))
                            <div class="title-roboto title-400 title-Blue_3 mb-14 last:mb-0">
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
            @if (!empty($content->featured_services))
                @php
                    $tn = 1;
                    $tc = 1;
                    $tmodal = 1;
                @endphp
                <div
                    class="hidden lg:flex flex-wrap items-start justify-center m-0 p-0 w-full gap-x-10 lg:gap-x-[70px] relative">
                    <div class="w-full lg:max-w-[320px]">
                        <ul class="flex flex-col gap-5 justify-around">
                            @foreach ($content->featured_services as $featured_service)
                                @if (!empty($featured_service['image']))
                                    <li class="tab-button flex flex-wrap items-center justify-between cursor-pointer"
                                        data-tab="tab{{ $tn }}">
                                        <div class="img">
                                            <img src="{!! $featured_service['image']['url'] !!}" width="200" height="200"
                                                alt="{!! $featured_service['image']['alt'] !!}" class="lozad" />
                                        </div>
                                        <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="44px"
                                            height="44px" viewBox="0 0 44 44">
                                            <path class="main" fill="none" stroke="#6D6E6F" stroke-width="2" d="M22,1L22,1c11.598,0,21,9.402,21,21l0,0c0,11.598-9.402,21-21,21l0,0
                                C10.402,43,1,33.598,1,22l0,0C1,10.402,10.402,1,22,1z" />
                                            <path class="left" d="M16.709,22.99l8.599,8.6c0.548,0.547,1.435,0.547,1.981,0s0.547-1.434,0-1.98
                                L19.681,22l7.609-7.609c0.547-0.547,0.547-1.434,0-1.981s-1.435-0.547-1.981,0l-8.599,8.6c-0.273,0.273-0.41,0.632-0.41,0.99
                                S16.437,22.717,16.709,22.99z" />
                                            <path class="right" d="M27.701,22c0-0.358-0.137-0.717-0.41-0.99l-8.6-8.6c-0.547-0.547-1.435-0.547-1.981,0
                                s-0.547,1.434,0,1.981L24.319,22l-7.609,7.609c-0.547,0.547-0.547,1.434,0,1.98s1.434,0.547,1.981,0l8.6-8.6
                                C27.563,22.717,27.701,22.358,27.701,22z" />
                                        </svg>
                                    </li>
                                    @php $tn++; @endphp
                                @endif
                            @endforeach
                        </ul>
                    </div>
                    <div class="w-full lg:flex-1">
                        @foreach ($content->featured_services as $featured_service_details)
                            @if (
                                !empty($featured_service_details['heading']) ||
                                    !empty($featured_service_details['description']) ||
                                    !empty($featured_service_details['button']))
                                <div class="tab-content active-clip" id="tab{{ $tc }}">
                                    <div class="card bg-White lg:p-75">
                                        @if (!empty($featured_service_details['heading']))
                                            <div class="title-montserrat title-700 title-Blue_5 mb-14 last:mb-0">
                                                <h4>{!! $featured_service_details['heading'] !!}</h4>
                                            </div>
                                        @endif
                                        @if (!empty($featured_service_details['description']))
                                            <div class="content mb-24 agrey last:mb-0">
                                                {!! $featured_service_details['description'] !!}
                                            </div>
                                        @endif
                                        @if (!empty($featured_service_details['button']))
                                            <div class="btn-custom">
                                                <a href="{!! $featured_service_details['button']['url'] !!}"
                                                    @if ($featured_service_details['button']['target']) target="{!! $featured_service_details['button']['target'] !!}" @else target="_self" @endif
                                                    class="btn btn-grey">{!! $featured_service_details['button']['title'] !!}
                                                </a>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                @php $tc++; @endphp
                            @endif
                        @endforeach
                    </div>
                </div>
                <div class="block lg:hidden lg:mt-0 mt-40">
                    <ul class="flex flex-col gap-16 justify-around">
                        @foreach ($content->featured_services as $featured_service_deta)
                            @if (!empty($featured_service_deta['image']) || !empty($featured_service_deta['heading']))
                                <li class="open-modal flex flex-col items-center justify-center cursor-pointer gap-5 text-center"
                                    data-target="serviceM{{ $tmodal }}">
                                    @if (!empty($featured_service_deta['image']))
                                        <div class="img">
                                            <img src="{!! $featured_service_deta['image']['url'] !!}" width="220" height="220"
                                                alt="{!! $featured_service_deta['image']['alt'] !!}" class="lozad" />
                                        </div>
                                    @endif
                                    @if (!empty($featured_service_deta['heading']))
                                        <div class="sub title-roboto title-700 title-Blue_5 mb-14 last:mb-0">
                                            <h4>{!! $featured_service_deta['heading'] !!}</h4>
                                        </div>
                                    @endif
                                </li>
                                @php $tmodal++; @endphp
                            @endif
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    </section>
    @if (!empty($content->featured_services))
        @php
            $tn = 1;
            $tc = 1;
            $topenmodal = 1;
        @endphp
        @foreach ($content->featured_services as $modal_featured_service)
            @if (
                !empty($modal_featured_service['heading']) ||
                    !empty($modal_featured_service['description']) ||
                    !empty($modal_featured_service['button']))
                <div id="serviceM{{ $topenmodal }}" class="modal fixed z-999 inset-0 hidden">
                    <div class="flex items-center justify-center min-h-screen z-1 px-30">
                        <div
                            class="bg-White border-1 border-solid border-Grey pt-[74px] pb-[34px] px-[34px] rounded-[14px] relative overflow-hidden max-w-lg w-full h-[554px]">
                            <span class="close-modal absolute top-[34px] right-[34px] cursor-pointer">
                                <img src="@asset('images/close-cross.svg')" width="20" height="20" alt="close"
                                    class="lozad" />
                            </span>
                            <div class="card overflow-y-auto h-full pr-[28px]">
                                @if (!empty($modal_featured_service['heading']))
                                    <div class="title-montserrat title-700 title-Blue_5 mb-14 last:mb-0">
                                        <h4>{!! $modal_featured_service['heading'] !!}</h4>
                                    </div>
                                @endif
                                @if (!empty($modal_featured_service['description']))
                                    <div class="content mb-24 agrey last:mb-0">
                                        {!! $modal_featured_service['description'] !!}
                                    </div>
                                @endif
                                @if (!empty($modal_featured_service['button']))
                                    <div class="btn-custom">
                                        <a href="{!! $modal_featured_service['button']['url'] !!}"
                                            @if ($modal_featured_service['button']['target']) target="{!! $modal_featured_service['button']['target'] !!}" @else target="_self" @endif
                                            class="btn btn-grey">
                                            {!! $modal_featured_service['button']['title'] !!}
                                        </a>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="fixed inset-0 bg-Black opacity-50 -z-1"></div>
                </div>
                @php $topenmodal++; @endphp
            @endif
        @endforeach
    @endif
@endif
