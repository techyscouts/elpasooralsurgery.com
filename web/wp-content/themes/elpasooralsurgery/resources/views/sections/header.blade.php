@php
    $search_label_button_text = get_field('search_label_button_text', 'option');
    $press_return_button_text = get_field('press_return_button_text', 'option');
@endphp
<header class="header">
    @if (!empty($announcement_bar) || !empty($schedule_an_appointment_button) || !empty($patient_referral_button))
        <div class="announcement bg-Blue_4">
            <div class="lg:px-55 xl3:px-0 px-10 xl3:max-w-screen-2xl mx-auto">
                <div
                    class="relative flex flex-wrap xl:flex-row items-center xl:gap-[26px] xl:justify-between justify-center py-10 lg:py-[17px] w-full">
                    @if (!empty($announcement_bar))
                        <div class="w-full xl:max-w-[calc(100%_-_555px)]">
                            <div class="announcement-bar swiper">
                                <div class="swiper-wrapper">
                                    @foreach ($announcement_bar as $announcement_msg)
                                        @if (!empty($announcement_msg['message']))
                                            <div class="swiper-slide lgscreen:text-center">
                                                {!! $announcement_msg['message'] !!}
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endif
                    @if (!empty($schedule_an_appointment_button) || !empty($patient_referral_button))
                        <ul class="hidden xl:flex flex-row gap-5 m-0 p-0 items-center justify-end relative">
                            @if (!empty($schedule_an_appointment_button))
                                <li>
                                    <a href="{!! $schedule_an_appointment_button['url'] !!}"
                                        @if ($schedule_an_appointment_button['target']) target="{!! $schedule_an_appointment_button['target'] !!}" @else target="_self" @endif
                                        class="btn btn-grey">{!! $schedule_an_appointment_button['title'] !!}</a>
                                </li>
                            @endif
                            @if (!empty($patient_referral_button))
                                <li>
                                    <a href="{!! $patient_referral_button['url'] !!}"
                                        @if ($patient_referral_button['target']) target="{!! $patient_referral_button['target'] !!}" @else target="_self" @endif
                                        class="btn btn-border-grey">{!! $patient_referral_button['title'] !!}</a>
                                </li>
                            @endif
                        </ul>
                    @endif
                </div>
            </div>
        </div>
    @endif
    <div class="w-full xl3:max-w-screen-2xl mx-auto">
        <div
            class="header-bottom flex flex-wrap justify-between items-center w-full static py-20 lg:px-55 xl3:px-0 px-30">
            <div class="language xl:hidden">@php echo do_shortcode('[custom_language_switcher]') @endphp</div>
            @if (!empty($header_logo))
                <div class="logo">
                    <a href="{{ home_url('/') }}">
                        <img src="{!! $header_logo['url'] !!}" width="207" height="75" alt="{!! $header_logo['alt'] !!}"
                            class="lozad">
                    </a>
                </div>
            @endif
            @if (has_nav_menu('primary_navigation'))
                {!! wp_nav_menu([
                    'theme_location' => 'primary_navigation',
                    'menu_class' => 'd-menu',
                    'container' => false,
                    'echo' => false,
                ]) !!}
            @endif
            <div class="header-br">
                <ul>
                    <li>
                        <a href="javascript:void(0);" class="btn-search" aria-label="Search Button">
                            <svg width="20" height="21" viewBox="0 0 20 21" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M8.4125 15.7812C4.48125 15.7812 1.29438 12.65 1.29438 8.78125C1.29438 4.9125 4.48125 1.77502 8.4125 1.77502C12.3437 1.77502 15.5313 4.9125 15.5313 8.78125C15.5313 12.65 12.3437 15.7812 8.4125 15.7812ZM19.805 19.4062L14.6431 14.325C15.9944 12.8562 16.825 10.9187 16.825 8.78125C16.825 4.20625 13.0587 0.5 8.4125 0.5C3.76625 0.5 0 4.20625 0 8.78125C0 13.35 3.76625 17.0562 8.4125 17.0562C10.42 17.0562 12.2613 16.3625 13.7075 15.2063L18.89 20.3062C19.1431 20.5562 19.5525 20.5562 19.805 20.3062C20.0581 20.0625 20.0581 19.6562 19.805 19.4062Z"
                                    fill="#6D6E6F" />
                            </svg>
                        </a>
                    </li>
                    <li>
                        <button class="navbar-toggler bg-transparent border-0 p-0" type="button" aria-label="navbar">
                            <svg width="20" height="19" viewBox="0 0 20 19" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M19.2857 11.6429H0.714286C0.319286 11.6429 0 11.9629 0 12.3572C0 12.7522 0.319286 13.0715 0.714286 13.0715H19.2857C19.6807 13.0715 20 12.7522 20 12.3572C20 11.9629 19.6807 11.6429 19.2857 11.6429ZM11.4286 17.3572H0.714286C0.319286 17.3572 0 17.6765 0 18.0715C0 18.4665 0.319286 18.7858 0.714286 18.7858H11.4286C11.8236 18.7858 12.1429 18.4665 12.1429 18.0715C12.1429 17.6765 11.8236 17.3572 11.4286 17.3572ZM0.714286 1.64293H19.2857C19.6807 1.64293 20 1.32364 20 0.928641C20 0.534355 19.6807 0.214355 19.2857 0.214355H0.714286C0.319286 0.214355 0 0.534355 0 0.928641C0 1.32364 0.319286 1.64293 0.714286 1.64293ZM0.714286 7.35721H13.5714C13.9664 7.35721 14.2857 7.03793 14.2857 6.64293C14.2857 6.24864 13.9664 5.92864 13.5714 5.92864H0.714286C0.319286 5.92864 0 6.24864 0 6.64293C0 7.03793 0.319286 7.35721 0.714286 7.35721Z"
                                    fill="#6D6E6F" />
                            </svg>
                        </button>
                    </li>
                </ul>
            </div>
            <div class="navbar">
                <button
                    class="close-menu bg-transparent border-0 p-10 m-0 cursor-pointer absolute top-20 right-20 lg:top-[55px] lg:right-[88px] z-1 lg:p-20"
                    aria-label="close">
                    <img src="@asset('images/close-cross.svg')" width="20" height="20" alt="close icon" class="lozad">
                </button>
                <div id="menu-main-menu" class="mobile-menu-main">
                    <div class="lg:px-100 xxl:px-[200px] px-30">
                        <div class="flex lgscreen:flex-col lg:flex-wrap lg:items-center justify-center w-full m-0 p-0">
                            @if (has_nav_menu('side_bar_navigation_1'))
                                <div class="lg:pr-[3vw] xxxl:pr-[6.5vw] lgscreen:pb-40">
                                    {!! wp_nav_menu([
                                        'theme_location' => 'side_bar_navigation_1',
                                        'menu_class' => 'main flex flex-col items-start my-0 gap-7',
                                        'container' => false,
                                        'echo' => false,
                                    ]) !!}
                                </div>
                            @endif
                            <div
                                class="bigleft-menu border-0 lgscreen:border-t-1 lg:border-l-1 border-solid border-Fonts lgscreen:pt-40 lg:pl-[3vw] xxxl:pl-[6.5vw]">
                                @if (has_nav_menu('side_bar_navigation_2'))
                                    {!! wp_nav_menu([
                                        'theme_location' => 'side_bar_navigation_2',
                                        'menu_class' => 'main-sub flex flex-col items-start my-0 gap-7 xl:gap-10 mb-55 last:mb-0',
                                        'container' => false,
                                        'echo' => false,
                                    ]) !!}
                                @endif
                                @if (has_nav_menu('side_bar_navigation_3') || !empty($popular_menu_heading))
                                    <div class="sub mb-20">
                                        <span>{!! $popular_menu_heading !!}</span>
                                    </div>
                                    @if (has_nav_menu('side_bar_navigation_3'))
                                        {!! wp_nav_menu([
                                            'theme_location' => 'side_bar_navigation_3',
                                            'menu_class' => 'sub flex flex-col items-start my-0 gap-5',
                                            'container' => false,
                                            'echo' => false,
                                        ]) !!}
                                    @endif
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                @if (!empty($schedule_an_appointment_button) || !empty($patient_referral_button))
                    <div class="btn-custom lg:hidden pt-40 px-30">
                        <ul class="flex flex-col gap-5">
                            @if (!empty($schedule_an_appointment_button))
                                <li>
                                    <a href="{!! $schedule_an_appointment_button['url'] !!}"
                                        @if ($schedule_an_appointment_button['target']) target="{!! $schedule_an_appointment_button['target'] !!}" @else target="_self" @endif
                                        class="btn btn-grey w-full">{!! $schedule_an_appointment_button['title'] !!}</a>
                                </li>
                            @endif
                            @if (!empty($patient_referral_button))
                                <li>
                                    <a href="{!! $patient_referral_button['url'] !!}"
                                        @if ($patient_referral_button['target']) target="{!! $patient_referral_button['target'] !!}" @else target="_self" @endif
                                        class="btn btn-border-grey w-full">{!! $patient_referral_button['title'] !!}</a>
                                </li>
                            @endif
                        </ul>
                    </div>
                @endif
            </div>
        </div>
    </div>
    <div class="search-bar hidden w-full">
        <div class="flex items-center justify-between bg-Blue_9 py-25 px-30 lg:px-55 gap-5 lg:gap-10 w-full">
            <form class="w-full max-w-[calc(100%_-_310px)]" method="get" action="<?php echo home_url(); ?>">
                <label for="search" class="visually-hidden">
                    @if (!empty($search_label_button_text))
                        {!! $search_label_button_text !!}
                    @else
                        search
                    @endif
                </label>
                <input type="text" id="search" name="s" placeholder="What can we help you find?"
                    class="h-[63px] p-0 m-0 bg-transparent border-0 outline-0 w-full text-16 leading-26 text-Fonts font-Roboto font-400 placeholder:text-20 lg:placeholder:text-48 placeholder:font-Roboto placeholder:font-400 placeholder:text-Blue_10 placeholder:opacity-100 placeholder:relative lg:placeholder:top-10">
                <button type="submit" class="hidden">Submit Form</button>  
            </form>
            <a href="javascript:void(0);"
                class="mdscreen:hidden clear-text text-14 leading-24 font-Roboto text-Blue_11 w-auto ml-auto"
                aria-label="Press search button">
                @if (!empty($press_return_button_text))
                    {!! $press_return_button_text !!}
                @else
                    Press<b>RETURN</b>to search
                @endif
            </a>
            <a href="javascript:void(0);" class="btn-close-search block w-[20px] h-[20px]" aria-label="close button">
                <img src="@asset('images/close-cross.svg')" width="20" height="20" alt="close" class="lozad">
            </a>
        </div>
    </div>
</header>
