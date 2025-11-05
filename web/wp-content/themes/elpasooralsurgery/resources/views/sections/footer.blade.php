<footer class="footer bg-Blue_4 lg:pt-80 pt-40 ">
    <div class="container-fluid-sm xl3:max-w-screen-2xl">
        <div class="flex flex-wrap justify-between smscreen:text-center lgscreen:px-30">
            @if (!empty($footer_logo))
                <div class="footer-logo xlscreen:w-full">
                    <a href="{{ home_url('/') }}">
                        <img src="{!! $footer_logo['url'] !!}" class="smscreen:mx-auto lozad" width="80" height="80"
                            alt="{!! $footer_logo['alt'] !!}"></a>
                </div>
            @endif
            @if (!empty($footer_heading) || !empty($copyright_text) || !empty($footer_description))
                <div
                    class="footer-info max-w-[calc(100%_-_821px)] max_width_1366:max-w-[calc(100%_-_730px)] xlscreen:max-w-full xlscreen:ml-0 xlscreen:mt-15 mx-auto">
                    @if (!empty($footer_heading))
                        <div class="title-roboto title-400 title-Blue_3">
                            <h4>{!! $footer_heading !!}</h4>
                        </div>
                    @endif
                    @if (!empty($copyright_text) || !empty($footer_description))
                        <div class="pt-28 grid gap-y-4 xlscreen:pt-15 smscreen:hidden">
                            @if (!empty($copyright_text))
                                <span>© {!! date('Y') !!} {!! get_bloginfo('name') !!}.
                                    {!! $copyright_text !!}</span>
                            @endif
                            @if (!empty($footer_description))
                                <span>{!! $footer_description !!}</span>
                            @endif
                        </div>
                    @endif
                </div>
            @endif
            <div class="footer-right grid gap-y-[55px] smscreen:gap-y-[20px] xlscreen:mt-20 smscreen:w-full">
                @if (!empty($location_heading) || !empty($location) || !empty($hours_heading) || !empty($hours))
                    <div class="flex flex-wrap smscreen:flex-col justify-between smscreen:gap-y-[25px]">
                        @if (!empty($location_heading) || !empty($location))
                            <div class="footer-content">
                                <div class="flex flex-col gap-y-2">
                                    @if (!empty($location_heading))
                                        <span
                                            class="text-Blue_3 text-12 font-700 font-Roboto">{!! $location_heading !!}</span>
                                    @endif
                                    @if (!empty($location))
                                        {!! $location !!}
                                    @endif
                                </div>
                            </div>
                        @endif
                        @if (!empty($hours_heading) || !empty($hours))
                            <div class="footer-content">
                                <div class="flex flex-col gap-y-2">
                                    @if (!empty($hours_heading))
                                        <span
                                            class="text-Blue_3 text-12 font-700 font-Roboto">{!! $hours_heading !!}</span>
                                    @endif
                                    @if (!empty($hours))
                                        <span class="text-Blue_3">{!! $hours !!}</span>
                                    @endif
                                </div>
                            </div>
                        @endif
                    </div>
                @endif
                <div class="flex flex-wrap justify-between smscreen:flex-col smscreen:gap-y-[25px]">
                    @if (!empty($lets_chat_heading) || !empty($phone_number) || !empty($email_address))
                        <div class="footer-content">
                            <div class="flex flex-col gap-y-2">
                                @if (!empty($lets_chat_heading))
                                    <span
                                        class="text-Blue_3 text-12 font-700 font-Roboto">{!! $lets_chat_heading !!}</span>
                                @endif
                                @if (!empty($phone_number))
                                    <a href="tel:{!! $phone_number !!}">{!! $phone_number !!}</a>
                                @endif
                                @if (!empty($email_address))
                                    <a href="mailto:{!! $email_address !!}">{!! $email_address !!}</a>
                                @endif
                            </div>
                        </div>
                    @endif
                    @if (!empty($social_media_heading) || !empty($footer_social_media))
                        <div class="footer-content">
                            <div class="flex flex-col gap-y-2">
                                @if (!empty($social_media_heading))
                                    <span
                                        class="text-Blue_3 text-12 font-700 font-Roboto">{!! $social_media_heading !!}</span>
                                @endif
                                @if (!empty($footer_social_media))
                                    <ul class="sicon flex flex-wrap gap-4 smscreen:justify-center">
                                        @foreach ($footer_social_media as $social_media_details)
                                            @if (!empty($social_media_details['social_media_link']) && !empty($social_media_details['social_media_icon']))
                                                <li>
                                                    <a href="{!! $social_media_details['social_media_link'] !!}" target="_blank"
                                                        class="!w-[35px] h-[35px] border-1 border-solid rounded-100 border-Grey bg-transparent flex items-center justify-center hover:bg-Grey">
                                                        <img src="{!! $social_media_details['social_media_icon']['url'] !!}"
                                                            height="20" alt="{!! $social_media_details['social_media_icon']['alt'] !!}"
                                                            class="lozad">
                                                    </a>
                                                </li>
                                            @endif
                                        @endforeach
                                    </ul>
                                @endif
                            </div>
                        </div>
                    @endif
                </div>
                @if (!empty($copyright_text) || !empty($footer_description))
                    <div class="pt-28 gap-y-4 xlscreen:pt-15 hidden smscreen:flex smscreen:flex-col">
                        @if (!empty($copyright_text))
                            <span>© {!! date('Y') !!} {!! get_bloginfo('name') !!}.
                                {!! $copyright_text !!}</span>
                        @endif
                        @if (!empty($footer_description))
                            <span>{!! $footer_description !!}</span>
                        @endif
                    </div>
                @endif
            </div>
        </div>
    </div>
    @if (has_nav_menu('footer_navigation'))
        <div class="bg-White py-10 lg:mt-80 mt-40">
            {!! wp_nav_menu([
                'theme_location' => 'footer_navigation',
                'menu_class' =>
                    'flex flex-wrap smscreen:flex-col smscreen:text-center justify-center gap-y-2 gap-x-10 xl:gap-x-[100px] lgscreen:px-30',
                'container' => false,
                'echo' => false,
            ]) !!}
        </div>
    @endif
    <div class="hidden pt-50 pb-50 lg:pt-100 lg:pb-100"></div>
    <div class="hidden pt-0 pb-0 lg:pt-0 lg:pb-0"></div>
</footer>
