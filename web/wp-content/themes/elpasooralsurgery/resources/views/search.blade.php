@extends('layouts.app')

@section('content')
    @include('partials.page-header')

    @php
        $search_heading = get_field('search_heading', 'option');
        $placeholder_image = get_field('placeholder_image', 'option');
        $read_more_button_text = get_field('read_more_button_text', 'option');
        $go_home_label_text = get_field('go_home_label_text', 'option');
    @endphp

    <section class="intro-content lg:py-100 py-50">
        <div class="container-fluid-xl xl3:max-w-screen-2xl lgscreen:px-30">
            <div class="text-left lg:text-center">
                @if (!empty($search_heading))
                    <div class="title-roboto title-Blue_1 title-700 big mb-20 last:mb-0">
                        <h1>{{ $search_heading }}</h1>
                    </div>
                @endif
            </div>
        </div>
    </section>

    @if (!have_posts())
        <section class="search-cta pb-55 lg:pb-100">
            <div class="container-fluid">
                <div class="flex flex-wrap items-center justify-center w-full m-0 p-0 relative">
                    <div class="w-full lg:w-8/12">
                        <div class="content text-center mb-20">
                            <x-alert type="warning" class="warning">
                                <p>{!! __('Sorry, no results were found.', 'sage') !!}</p>
                            </x-alert>
                        </div>
                        <div class="search-bar search-page w-full mb-40">
                            <div class="flex items-center bg-Blue_9 py-25 px-55 gap-10 w-full">
                                <form class="w-full" method="get" action="<?php echo home_url(); ?>">
                                    <label for="search" class="visually-hidden">Search</label>
                                    <input type="text" id="search" name="s"
                                        placeholder="What can we help you find?"
                                        class="h-[63px] p-0 m-0 bg-transparent border-0 outline-0 w-full text-16 leading-26 text-Fonts font-Roboto font-400 placeholder:text-[3.182vw] placeholder:font-Roboto placeholder:font-400 placeholder:text-Blue_10 placeholder:opacity-100 placeholder:relative placeholder:top-10">
                                </form>
                            </div>
                        </div>
                        <div class="btn-custom text-center w-full">
                            <a href="{{ site_url() }}" class="btn btn-grey">
                                @if (!empty($go_home_label_text))
                                    {!! $go_home_label_text !!}
                                @else
                                    Go Home
                                @endif
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @else
        <section class="ctm-search-grid-wrapper lg:pb-100 pb-50">
            <div class="container-fluid-md xl3:max-w-screen-2xl max_width_768:px-30">
                <div
                    class="flex flex-wrap items-start justify-center md:justify-start m-0 p-0 relative mdscreen:w-full gap-y-10 xl:gap-y-[55px] md:-mx-[20px] xl:-mx-[28px] mb-40 lg:mb-55 last:mb-0">
                    @while (have_posts())
                        @php the_post() @endphp
                        <div class="w-full md:w-6/12 xl:w-4/12 md:px-20 xl:px-28">
                            <div class="card">
                                <div class="img portrait mb-20 last:mb-0 pt-[102.74%] relative overflow-hidden">
                                    @php $fea_image = get_the_post_thumbnail_url(); @endphp
                                    @if ($fea_image)
                                        <a href="{!! get_the_permalink() !!}"><img src="{!! $fea_image !!}"
                                                class="absolute w-full object-cover h-full top-0 left-0 lozad"
                                                width="400.67" height="412" alt="{{ get_the_title() }}"></a>
                                    @else
                                        <a href="{!! get_the_permalink() !!}"><img src="{!! $placeholder_image['url'] !!}"
                                                class="absolute w-full object-cover h-full top-0 left-0 lozad"
                                                width="400.67" height="412" alt="{{ get_the_title() }}"></a>
                                    @endif
                                </div>
                                <div class="detail mdscreen:px-30">
                                    @if (get_the_title())
                                        <div class="title-roboto title-700 title-Blue_1 mb-14 last:mb-0">
                                            <a href="{!! get_the_permalink() !!}">
                                                <h4>{!! get_the_title() !!}</h4>
                                            </a>
                                        </div>
                                    @endif
                                    @if (get_the_excerpt())
                                        @php
                                            $cont_exc = wp_trim_words(get_the_excerpt(), 20, '...');
                                        $cont_exceprt = wpautop($cont_exc); @endphp
                                        <div class="content mb-24 last:mb-0">
                                            {!! $cont_exceprt !!}
                                        </div>
                                    @endif
                                    <div class="btn-custom">
                                        <a href="{!! get_the_permalink() !!}" class="btn btn-border-grey">
                                            @if (!empty($read_more_button_text))
                                                {!! $read_more_button_text !!}
                                            @else
                                                Read More
                                            @endif
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endwhile
                </div>
            </div>
        </section>
    @endif
@endsection
