@if (isset($content->hide_section) && $content->hide_section == 'no')
    @php
        $our_doctor_back_button = get_field('our_doctor_back_button', 'option');
        $doctor_title = get_field('doctor_title', get_the_ID());
    @endphp
    <section
        class="about-banner-wrapper bg-Blue_4 flex flex-col justify-start relative overflow-hidden pt-50 xl:pt-100 xl:h-[795px] @if ($content->extra_class) {!! $content->extra_class !!} @endif"
        @if ($content->id) id="{!! $content->id !!}" @endif>
        @if (!empty($content->image_desktop))
            <div class="absolute w-full h-full bottom-0 left-0 hidden xl:flex xl:justify-end">
                <img src="{!! $content->image_desktop['url'] !!}" class="mx-auto w-full h-full object-contain object-bottom block lozad"
                    width="1512" height="795" alt="{!! $content->image_desktop['alt'] !!}">
            </div>
        @endif
        <div class="container-fluid-md xl3:max-w-screen-2xl">
            <div class="flex flex-wrap items-center justify-center w-full m-0 p-0 relative xlscreen:px-30 gap-y-10">
                @if (!empty($our_doctor_back_button))
                    <div class="btn-custom w-full xl:mb-40">
                        <a href="{!! $our_doctor_back_button['url'] !!}" class="btn btn-back">
                            <svg width="14" height="10" viewBox="0 0 14 10" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M13.9999 4.99986C13.9999 4.86725 13.9472 4.74007 13.8535 4.6463C13.7597 4.55253 13.6325 4.49986 13.4999 4.49986L1.70692 4.49986L4.85392 1.35386C4.9478 1.25997 5.00055 1.13263 5.00055 0.999857C5.00055 0.867081 4.9478 0.739743 4.85392 0.645857C4.76003 0.55197 4.63269 0.499225 4.49992 0.499225C4.36714 0.499225 4.2398 0.55197 4.14592 0.645857L0.145917 4.64586C0.0993538 4.6923 0.0624109 4.74748 0.0372045 4.80822C0.011998 4.86897 -0.000976762 4.93409 -0.000976759 4.99986C-0.000976756 5.06562 0.011998 5.13075 0.0372045 5.19149C0.0624109 5.25224 0.0993538 5.30741 0.145917 5.35386L4.14592 9.35386C4.1924 9.40034 4.24759 9.43722 4.30833 9.46238C4.36907 9.48754 4.43417 9.50049 4.49992 9.50049C4.63269 9.50049 4.76003 9.44774 4.85392 9.35386C4.9478 9.25997 5.00055 9.13263 5.00055 8.99986C5.00055 8.86708 4.9478 8.73974 4.85392 8.64586L1.70692 5.49986L13.4999 5.49986C13.6325 5.49986 13.7597 5.44718 13.8535 5.35341C13.9472 5.25964 13.9999 5.13246 13.9999 4.99986Z"
                                    fill="#6D6E6F" />
                            </svg>
                            <span>{!! $our_doctor_back_button['title'] !!}</span>
                        </a>
                    </div>
                @endif
                @if (!empty($content->image_mobile))
                    <div class="w-full xl:w-[calc(100%_-_470px)] xxl:w-[calc(100%_-_569px)] xl:order-1 order-2">
                        <img src="{!! $content->image_mobile['url'] !!}" class="max-w-full h-auto block mx-auto xl:hidden lozad"
                            width="600" height="700" alt="{!! $content->image_mobile['alt'] !!}">
                    </div>
                @endif
                <div class="w-full xl:w-[470px] xxl:w-[569px] xl:order-2 order-1">
                    @if (!empty($doctor_title))
                        <div class="title-roboto title-700 big title-Blue_1 mb-20 last:mb-0">
                            <h1>
                                {!! $doctor_title !!}
                            </h1>
                        </div>
                    @endif
                    @if (!empty($content->description))
                        <div class="content mb-40 last:mb-0">
                            {!! $content->description !!}
                        </div>
                    @endif
                    <div class="rating">
                        <ul
                            class="flex flex-wrap items-center justify-center xl:justify-between text-center gap-x-10 gap-y-5 m-0 p-0 w-full">
                            <li>
                                @if (!empty($content->link))
                                    <a href="{!! $content->link['url'] !!}"
                                        @if ($content->link['target']) target="{!! $content->link['target'] !!}" @else target="_self" @endif>
                                        @endif
                                        @if (!empty($content->ratings_number))
                                            <div class="title-roboto title-400 title-Blue_3 mb-14 last:mb-0">
                                                <h3>
                                                    {!! $content->ratings_number !!}
                                                </h3>
                                            </div>
                                        @endif
                                        @if (!empty($content->review_rate))
                                            <ul
                                                class="flex flex-wrap items-center justify-center gap-[10px] xl:gap-5 mb-14 last:mb-0">
                                                @php
                                                    $fullStars = floor($content->review_rate);
                                                    $hasHalfStar = $content->review_rate - $fullStars === 0.5;
                                                    $totalStars = $fullStars + ($hasHalfStar ? 1 : 0);
                                                    $remainingStars = 5 - $totalStars;
                                                @endphp
                                                @if (isset($content->review_rate) && $content->review_rate)
                                                    @for ($i = 0; $i < $fullStars; $i++)
                                                        <li>
                                                            <img src="@asset('images/star.svg')" alt="star"
                                                                class="lozad lgscreen:w-5" width="40" height="40"
                                                                alt="star">
                                                        </li>
                                                    @endfor
                                                    @if ($hasHalfStar)
                                                        <li>
                                                            <img src="@asset('images/star-half.svg')" class="lozad lgscreen:w-5"
                                                                width="40" height="40" alt="half-star">
                                                        </li>
                                                    @endif
                                                    @for ($i = 0; $i < $remainingStars; $i++)
                                                        <li>
                                                            <img src="@asset('images/star-blank.svg')" class="lozad lgscreen:w-5"
                                                                width="40" height="40" alt="blank-star">
                                                        </li>
                                                    @endfor
                                                @endif
                                            </ul>
                                        @endif
                                @if (!empty($content->link))
                                    <div class="rating-link">
                                        <span
                                            @if ($content->link['target']) target="{!! $content->link['target'] !!}" @else target="_self" @endif>
                                            {!! $content->link['title'] !!}
                                        </span>
                                    </div>
                                @endif
                                @if (!empty($content->link))
                                    </a>
                                @endif
                            </li>
                            <li>
                                <img src="@asset('images/ABOMS.svg')" class="max-w-full h-auto block lozad" width="147"
                                    height="153" alt="ABOMS">
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endif
