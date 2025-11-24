@extends('layouts.app')

@section('content')
    @include('partials.page-header')
    @php
        $go_home_label_text = get_field('go_home_label_text', 'option');
    @endphp
    @if (!have_posts())
        <section class="zigzag-img-content py-50 lg:py-100 ctm-404-sec">
            <div class="container-fluid-md  xl3:max-w-screen-2xl">
                <div
                    class="flex flex-wrap items-center justify-center w-full xl:px-[53px] m-0 p-0 relative lgscreen:gap-10 lg:gap-x-10 xl:gap-x-[55px]">
                    @if (!empty($error_image))
                        <div class="lg:block w-full lg:w-6/12 xl:w-full xl:max-w-[441px]">
                            <div class="img landscape">
                                <img src="{!! $error_image['url'] !!}" width="441" height="500"
                                    class="max-w-full h-auto block mx-auto lozad" alt="{!! $error_image['alt'] !!}">
                            </div>
                        </div>
                    @endif
                    <div class="w-full lg:flex-1">
                        <div class="zigzag-content lgscreen:px-30">
                            @if (!empty($error_pre_heading))
                                <div class="title-roboto title-700 title-Blue_3 mb-14 last:mb-0">
                                    <h2>{!! $error_pre_heading !!} </h2>
                                </div>
                            @endif
                            @if (!empty($error_heading))
                                <div class="big title-roboto title-700 title-Blue_1 mb-14 last:mb-0">
                                    <h1>{!! $error_heading !!} </h1>
                                </div>
                            @endif
                            @if (!empty($error_description))
                                <div class="content mb-24 last:mb-0">
                                    {!! $error_description !!}
                                </div>
                            @endif
                            <div class="btn-custom btn-inline justify-center lg:gap-10">
                                <a href="{{ home_url('/') }}" class="btn btn-border-grey">
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
            </div>
        </section>
    @endif
@endsection
