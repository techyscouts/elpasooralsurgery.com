@if (isset($content->hide_section) && $content->hide_section == 'no')
    <section class="rating bg-Blue_4 py-50 lg:py-100 @if ($content->extra_class) {!! $content->extra_class !!} @endif"
        @if ($content->id) id="{!! $content->id !!}" @endif>
        <div class="container-fluid-md  xl3:max-w-screen-2xl">
            <div
                class="flex flex-wrap items-start justify-center m-0 p-0 w-full relative gap-10 xl:gap-x-[100px] lg:gap-x-[50px] lgscreen:px-[30px]">
                @if (!empty($content->heading) || !empty($content->description))
                    <div class="w-full lg:max-w-[calc(100%_-_486px)]">
                        @if (!empty($content->heading))
                            <div class="title-roboto title-400 title-Blue_1 mb-14 last:mb-0">
                                <h3>{!! $content->heading !!}</h3>
                            </div>
                        @endif
                        @if (!empty($content->description))
                            <div class="content mb-24 last:mb-0">
                                {!! $content->description !!}
                            </div>
                        @endif
                    </div>
                @endif
                @if (!empty($content->reviews))
                    <div class="w-full lg:flex-1">
                        <div
                            class="flex flex-wrap items-start justify-center m-0 p-0 w-full gap-10 lg:gap-x-[50px] xl:gap-x-[100px]">
                            @foreach ($content->reviews as $reviews_details)
                                @if (!empty($reviews_details['reviews_type']) && $reviews_details['reviews_type'] == 'google')
                                    <div class="mdscreen:w-full lg:flex-1">
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
                                    <div class="mdscreen:w-full lg:flex-1">
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
                    </div>
                @endif
            </div>
        </div>
    </section>
@endif
