@if (isset($content->hide_section) && $content->hide_section == 'no')
    @php
        $more_posts_button_text = get_field('more_posts_button_text', 'option');
    @endphp
    <section
        class="ctm-blog-listing procedure-grid-wrapper ctm-blog-grid-wrapper lg:py-100 lg:pt-0 pt-0 py-50 @if ($content->extra_class) {!! $content->extra_class !!} @endif"
        @if ($content->id) id="{!! $content->id !!}" @endif>
        <div class="container-fluid-md xl3:max-w-screen-2xl max_width_768:px-30">
            <div class="flex flex-wrap items-start justify-center m-0 p-0 relative mdscreen:w-full gap-y-10 xl:gap-y-[55px] md:-mx-[20px] xl:-mx-[28px] mb-40 lg:mb-55 last:mb-0"
                id="blog_data">
            </div>
            <div class="btn-custom">
                <a href="javascript:coid(0)" class="btn btn-grey" id="load_post_btn">
                    @if (!empty($more_posts_button_text))
                        {!! $more_posts_button_text !!}
                    @else
                        More Posts
                    @endif
                </a>
            </div>
        </div>
    </section>
@endif
