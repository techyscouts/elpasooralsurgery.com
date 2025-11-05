@if ($informationContentdata)
    @foreach ($informationContentdata as $content)
        @if ($content->layout == 'form')
            @include('partials.sections.information.form')
        @elseif ($content->layout == 'content_banner')
            @include('partials.sections.information.content_banner')
        @elseif ($content->layout == 'simple_content')
            @include('partials.sections.information.simple_content')
        @elseif ($content->layout == 'image_with_content')
            @include('partials.sections.information.image_with_content')
        @elseif ($content->layout == 'cta_section')
            @include('partials.sections.information.cta_section')
        @elseif ($content->layout == 'video_section')
            @include('partials.sections.information.video_section')
        @elseif ($content->layout == 'image_grid')
            @include('partials.sections.information.image_grid')
        @elseif ($content->layout == 'cta_with_popup')
            @include('partials.sections.information.cta_with_popup')
        @endif
    @endforeach

@endif
