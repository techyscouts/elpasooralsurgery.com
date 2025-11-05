<?php
/*
Template Name: Archives
*/
?>

@extends('layouts.app')
@section('content')

    @php
        $learn_more_button_text = get_field('learn_more_button_text', 'option');
        $deafault_feature_image = get_field('placeholder_image', 'option');
        $activecategory = get_queried_object();
    @endphp
    <section class="intro-content lg:py-100 py-50 bg-Blue_4">
        <div class="container-fluid-xl xl3:max-w-screen-2xl lgscreen:px-30">
            <div class="text-left lg:text-center">
                <div class="title-roboto title-Blue_1 title-700 big mb-20 last:mb-0">
                    @php $activecategory = get_queried_object(); @endphp
                    @if (is_category())
                        @php $activecategory = get_queried_object(); @endphp
                        <h1>Category: @php echo $activecategory->name; @endphp</h1>
                    @elseif(is_author())
                        @php $author_name = get_user_by('slug', get_query_var('author_name')); @endphp
                        <h1>Author: @php echo $author_name->display_name @endphp</h1>
                    @endif
                </div>
            </div>
        </div>
    </section>
    @if (have_posts())
        <section class="procedure-grid-wrapper lg:py-100 lg:pt-50 pt-50 py-50 px-30">
            <div class="container-fluid-md xl3:max-w-screen-2xl max_width_768:px-30">
                <div
                    class="flex flex-wrap items-start justify-start m-0 p-0 relative mdscreen:w-full gap-y-10 xl:gap-y-[55px] md:-mx-[20px] xl:-mx-[28px] mb-40 lg:mb-55 last:mb-0">
                    @while (have_posts())
                        @php(the_post())
                        <div class="w-full md:w-6/12 xl:w-4/12 md:px-20 xl:px-28">
                            <div class="card">
                                <div class="img portrait mb-20 last:mb-0">
                                    <a href="{!! get_the_permalink() !!}">
                                        <img src="{!! get_the_post_thumbnail_url() ? get_the_post_thumbnail_url() : $deafault_feature_image['url'] !!}" alt="{!! get_the_post_thumbnail_url() ? $title : $deafault_feature_image['alt'] !!}"
                                            class="max-w-full h-auto block mx-auto lozad" width="400.67" height="412">
                                    </a>
                                </div>
                                <div class="detail mdscreen:px-30">
                                    <div class="title-roboto title-700 title-Blue_1 mb-14 last:mb-0">
                                        <a href="{!! get_the_permalink() !!}">
                                            <h4>
                                                {!! get_the_title() !!}
                                            </h4>
                                        </a>
                                    </div>
                                    <div class="content mb-24 last:mb-0">
                                        @php(the_excerpt())
                                    </div>
                                    <div class="btn-custom">
                                        <a href="{!! get_the_permalink() !!}" class="btn btn-border-grey">
                                            @if (!empty($learn_more_button_text))
                                                {!! $learn_more_button_text !!}
                                            @else
                                                Learn More
                                            @endif
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endwhile
                </div>
        </section>
    @endif
@endsection
