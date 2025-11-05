@if ($CommunityContentdata)
    @foreach ($CommunityContentdata as $content)
        @if ($content->layout == 'content_banner')
            @include('partials.sections.community.content_banner')
        @elseif ($content->layout == 'images_grid')
            @include('partials.sections.community.images_grid')
        @elseif ($content->layout == 'gallery')
            @include('partials.sections.community.gallery')
        @elseif ($content->layout == 'gallery_with_tab')
            @include('partials.sections.community.gallery_with_tab')
        @elseif ($content->layout == 'cta_section')
            @include('partials.sections.community.cta_section')
        @elseif ($content->layout == 'video')
            @include('partials.sections.community.video')
        @endif
    @endforeach
@endif
