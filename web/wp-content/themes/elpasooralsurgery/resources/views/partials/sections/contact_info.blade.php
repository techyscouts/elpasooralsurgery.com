@if (isset($content->hide_section) && $content->hide_section == 'no')
    <section
        class="contact-info-wrapper lg:py-100 lg:pt-0 pt-0 py-50 @if ($content->extra_class) {!! $content->extra_class !!} @endif"
        @if ($content->id) id="{!! $content->id !!}" @endif>
        <div class="container-fluid-xl xl3:max-w-screen-2xl lgscreen:px-30">
            <div class="flex flex-wrap lgscreen:items-start lgscreen:justify-start m-0 p-0 w-full relative">
                @if (!empty($content->heading) || !empty($content->description))
                    <div class="w-full lg:flex-[1_1_calc(49%_-_5vw)] xl:flex-[1_1_calc(50%_-_5vw)]">
                        @if (!empty($content->heading))
                            <div class="title-roboto title-400 title-Blue_3 mb-20 last:mb-0">
                                <h2>{!! $content->heading !!}</h2>
                            </div>
                        @endif
                        @if (!empty($content->description))
                            <div class="content agrey">
                                {!! $content->description !!}
                            </div>
                        @endif
                    </div>
                @endif
                <div
                    class="my-40 lg:my-0 xl:mx-[5vw] lg:mx-[5vw] w-full lg:w-[1px] h-[1px] lg:h-auto border-0 border-t-1 lg:border-l-1 border-solid border-Fonts inline-block">
                </div>
                <div class="w-full lg:flex-[1_1_calc(49%_-_5vw)] xl:flex-[1_1_calc(45%_-_5vw)]">
                    <div
                        class="flex flex-wrap items-start justify-start m-0 mb-20 last:mb-0 p-0 w-full gap-y-5 gap-x-10 lg:gap-x-[55px]">
                        @if (!empty($content->address_heading) || !empty($content->address))
                            <div class="w-full sm:flex-1">
                                @if (!empty($content->address_heading))
                                    <span
                                        class="block text-Blue_3 text-12 leading-22 font-700 font-Roboto mb-4 last:mb-0">{!! $content->address_heading !!}</span>
                                @endif
                                @if (!empty($content->address))
                                    <a href="{!! $content->address['url'] !!}"
                                        @if ($content->address['target']) target="{!! $content->address['target'] !!}" @else target="_self" @endif
                                        class="font-700 text-Grey underline block">{!! $content->address['title'] !!}</a>
                                @endif
                            </div>
                        @endif
                        @if (!empty($content->phone_heading) || !empty($content->phone_number))
                            <div class="w-full sm:flex-1">
                                @if (!empty($content->phone_heading))
                                    <span
                                        class="block text-Blue_3 text-12 leading-22 font-700 font-Roboto mb-4 last:mb-0">{!! $content->phone_heading !!}</span>
                                @endif
                                @if (!empty($content->phone_number))
                                    <a href="tel:{!! $content->phone_number !!}"
                                        class="font-700 text-Grey underline block">{!! $content->phone_number !!}</a>
                                @endif
                            </div>
                        @endif
                    </div>
                    @if (!empty($content->hours_heading) || !empty($content->hours))
                        <div
                            class="flex flex-wrap items-start justify-start m-0 mb-20 last:mb-0 p-0 w-full gap-y-5 gap-x-10 lg:gap-x-[55px]">
                            <div class="w-full sm:flex-1">
                                @if (!empty($content->hours_heading))
                                    <span
                                        class="block text-Blue_3 text-12 leading-22 font-700 font-Roboto mb-4 last:mb-0">{!! $content->hours_heading !!}</span>
                                @endif
                                @if (!empty($content->hours))
                                    <span class="text-Blue_7 font-400 block">{!! $content->hours !!}</span>
                                @endif
                            </div>
                        </div>
                    @endif
                    @if (!empty($content->reviews))
                        <div
                            class="flex flex-wrap items-start justify-center lg:justify-start xxl:justify-between m-0 p-0 w-full gap-10 pt-28">
                            @foreach ($content->reviews as $reviews_details)
                                @if (!empty($reviews_details['reviews_type']) && $reviews_details['reviews_type'] == 'google')
                                    <div class="w-full flex-[0_0_145px]">
                                        <div class="text-center">
                                            @if (!empty($reviews_details['heading']))
                                                <div class="title-roboto title-400 title-Blue_3 mb-14 last:mb-0">
                                                    <h3>{!! $reviews_details['heading'] !!}</h3>
                                                </div>
                                            @endif
                                            @if (!empty($reviews_details['ratings_number']))
                                                <div class="title-roboto title-700 title-Blue_3 mb-14 last:mb-0">
                                                    <h3>{!! $reviews_details['ratings_number'] !!} </h3>
                                                </div>
                                            @endif
                                            @if (!empty($reviews_details['review_rate']))
                                                <div class="rating mb-14 last:mb-0">
                                                    <ul class="flex flex-wrap items-center justify-center gap-[10px]">
                                                        @php
                                                            $fullStars = floor($reviews_details['review_rate']);
                                                            $hasHalfStar =
                                                                $reviews_details['review_rate'] - $fullStars === 0.5;
                                                            $totalStars = $fullStars + ($hasHalfStar ? 1 : 0);
                                                            $remainingStars = 5 - $totalStars;
                                                        @endphp
                                                        @if (isset($reviews_details['review_rate']) && $reviews_details['review_rate'])
                                                            @for ($i = 0; $i < $fullStars; $i++)
                                                                <li>
                                                                    <img src="@asset('images/star.svg')" alt="star"
                                                                        class="lozad" width="20" height="20">
                                                                </li>
                                                            @endfor
                                                            @if ($hasHalfStar)
                                                                <li>
                                                                    <img src="@asset('images/star-half.svg')" alt="half-star"
                                                                        class="lozad" width="20" height="20">
                                                                </li>
                                                            @endif
                                                            @for ($i = 0; $i < $remainingStars; $i++)
                                                                <li>
                                                                    <img src="@asset('images/star-blank.svg')" alt="blank-star"
                                                                        class="lozad" width="20" height="20">
                                                                </li>
                                                            @endfor
                                                        @endif
                                                    </ul>
                                                </div>
                                            @endif
                                            @if (!empty($reviews_details['link']))
                                                <div class="rating-link">
                                                    <a href="{!! $reviews_details['link']['url'] !!}"
                                                        @if ($reviews_details['link']['target']) target="{!! $reviews_details['link']['target'] !!}" @else target="_self" @endif>
                                                        {!! $reviews_details['link']['title'] !!}
                                                    </a>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                @endif
                                @if (!empty($reviews_details['reviews_type']) && $reviews_details['reviews_type'] == 'facebook')
                                    <div class="w-full flex-[0_0_120px]">
                                        <div class="text-center">
                                            @if (!empty($reviews_details['heading']))
                                                <div class="title-roboto title-400 title-Blue_3 mb-14 last:mb-0">
                                                    <h3>{!! $reviews_details['heading'] !!}</h3>
                                                </div>
                                            @endif
                                            @if (!empty($reviews_details['ratings_icon']))
                                                <div class="rating mb-14 last:mb-0">
                                                    <img src="{!! $reviews_details['ratings_icon']['url'] !!}" class="mx-auto lozad"
                                                        width="76" height="76" alt="{!! $reviews_details['ratings_icon']['alt'] !!}" />
                                                </div>
                                            @endif
                                            @if (!empty($reviews_details['link']))
                                                <div class="rating-link">
                                                    <a href="{!! $reviews_details['link']['url'] !!}"
                                                        @if ($reviews_details['link']['target']) target="{!! $reviews_details['link']['target'] !!}" @else target="_self" @endif>
                                                        {!! $reviews_details['link']['title'] !!}
                                                    </a>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
@endif
