@if ($DoctorscontentData)
    @foreach ($DoctorscontentData as $content)
        @if ($content->layout == 'banner')
            @include('partials.sections.doctor.banner')
        @elseif ($content->layout == 'content_with_video')
            @include('partials.sections.doctor.content_with_video')
        @elseif ($content->layout == 'image_with_content')
            @include('partials.sections.doctor.image_with_content')
        @elseif ($content->layout == 'cta_section')
            @include('partials.sections.doctor.cta_section')
        @endif
    @endforeach

@endif