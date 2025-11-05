@php
    $blog_back_link = get_field('blog_back_link', 'option');
    $previous_button_text = get_field('previous_button_text', 'option');
    $next_button_text = get_field('next_button_text', 'option');
    $post_heading = get_the_title();
    $description = get_the_content();
    $fea_img = get_the_post_thumbnail_url();
    $image_id = get_post_thumbnail_id();
    $image_alt = get_post_meta($image_id, '_wp_attachment_image_alt', true);
    $image_title = get_the_title($image_id);
    if ($image_alt) {
        $image_alt = $image_alt;
    } else {
        $image_alt = get_the_title();
    }
    $author_name = get_field('author_name', get_the_ID());
    $all_category_detail = get_the_category(get_the_ID());
    $athor_icon = get_template_directory_uri() . '/resources/images/user-icon.svg';
    $calendar_icon = get_template_directory_uri() . '/resources/images/calendar-icon.svg';
    $cat_icon = get_template_directory_uri() . '/resources/images/category-icon.svg';
@endphp
<section class="general-ct py-55 lg:py-100">
    <div class="container-fluid-md xl3:max-w-screen-2xl">
        <div class="flex flex-wrap items-center justify-center m-0 p-0 w-full relative">
            @if ($blog_back_link)
                <div class="back w-full lg:mb-55 mb-40 lgscreen:px-30">
                    <div class="btn-custom">
                        <a href="{!! $blog_back_link['url'] !!}" class="btn btn-back"
                            @if ($blog_back_link['target']) target="{!! $blog_back_link['target'] !!}" @else target="_self" @endif>
                            <svg width="14" height="10" viewBox="0 0 14 10" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M13.9999 4.99986C13.9999 4.86725 13.9472 4.74007 13.8535 4.6463C13.7597 4.55253 13.6325 4.49986 13.4999 4.49986L1.70692 4.49986L4.85392 1.35386C4.9478 1.25997 5.00055 1.13263 5.00055 0.999857C5.00055 0.867081 4.9478 0.739743 4.85392 0.645857C4.76003 0.55197 4.63269 0.499225 4.49992 0.499225C4.36714 0.499225 4.2398 0.55197 4.14592 0.645857L0.145917 4.64586C0.0993538 4.6923 0.0624109 4.74748 0.0372045 4.80822C0.011998 4.86897 -0.000976762 4.93409 -0.000976759 4.99986C-0.000976756 5.06562 0.011998 5.13075 0.0372045 5.19149C0.0624109 5.25224 0.0993538 5.30741 0.145917 5.35386L4.14592 9.35386C4.1924 9.40034 4.24759 9.43722 4.30833 9.46238C4.36907 9.48754 4.43417 9.50049 4.49992 9.50049C4.63269 9.50049 4.76003 9.44774 4.85392 9.35386C4.9478 9.25997 5.00055 9.13263 5.00055 8.99986C5.00055 8.86708 4.9478 8.73974 4.85392 8.64586L1.70692 5.49986L13.4999 5.49986C13.6325 5.49986 13.7597 5.44718 13.8535 5.35341C13.9472 5.25964 13.9999 5.13246 13.9999 4.99986Z"
                                    fill="#6D6E6F" />
                            </svg>
                            <span>{!! $blog_back_link['title'] !!}</span>
                        </a>
                    </div>
                </div>
            @endif
            <div class="cta-post-article mb-[20px] w-full lg:px-100">
                @if ($fea_img)
                    <div class="img landscape relative overflow-hidden w-full pt-[41.92%] mb-55">
                        <img src="{!! $fea_img !!}"
                            class="w-full h-full object-cover absolute top-0 left-0 lozad"
                            alt="{!! $post_heading !!}">
                    </div>
                @endif
                @if (!empty($post_heading))
                    <div class="title-roboto title-400 title-Blue_3 mb-40 last:mb-0 md:text-center lgscreen:px-30">
                        <h2>{!! $post_heading !!}</h2>
                    </div>
                @endif
                <ul class="category-list lgscreen:px-30">
                    @if (get_the_author())
                        <li>
                            <img src="{!! $athor_icon !!}" width="15" height="15"
                                class="max-w-full h-auto block lozad" alt="Author">
                            <a href="{!! get_author_posts_url(get_the_author_meta('ID')) !!}">{!! get_the_author() !!}</a>
                        </li>
                    @endif
                    @if (get_the_date())
                        <li>
                            <img src="{!! $calendar_icon !!}" width="15" height="15"
                                class="max-w-full h-auto block lozad" alt="Date">{!! get_the_date('m/d/Y') !!}
                        </li>
                    @endif
                    @if ($all_category_detail)
                        <?php $all_category_detail_length = count($all_category_detail); ?>
                        <li>
                            <img src="{!! $cat_icon !!}" width="15" height="15"
                                class="max-w-full h-auto block lozad" alt="Category">
                            <?php foreach ( $all_category_detail as $key => $cate){ 
                                 $cat_link =  get_category_link($cate->term_id); ?>
                            <a href="<?php echo $cat_link; ?>"><?php echo $cate->name; ?></a>
                            <?php if ($key !== $all_category_detail_length - 1) { 
                                    echo ',';
                                }
                             } ?>
                        </li>
                    @endif
                </ul>
            </div>
            @if ($description)
                @php  $con_desc = wpautop($description);  @endphp
                <div class="content mb-24 global-list number-list agrey last:mb-0 lg:px-100 lgscreen:px-30">
                    {!! $con_desc !!}
                </div>
            @endif
            <div class="btn-custom btn-inline items-center justify-center pt-55 mdscreen:pt-[25px] lg:gap-[40px]"
                id="blog__loadmore">
                <?php $prev_post = get_adjacent_post(false, '', true);
                $next_post = get_adjacent_post(false, '', false);
                ?>
                @if (!empty($prev_post))
                    <a href="{!! get_permalink($prev_post->ID) !!}" class="btn btn-grey">
                        @if (!empty($previous_button_text))
                            {!! $previous_button_text !!}
                        @else
                            Previous
                        @endif
                    </a>
                @endif
                @if (!empty($next_post))
                    <a href="{!! get_permalink($next_post->ID) !!}" class="btn btn-border-grey">
                        @if (!empty($next_button_text))
                            {!! $next_button_text !!}
                        @else
                            Next
                        @endif
                    </a>
                @endif
            </div>
        </div>
    </div>
</section>
