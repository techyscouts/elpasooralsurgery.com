@if ($InstructionsContentdata)
    @foreach ($InstructionsContentdata as $content)
        @if ($content->layout == 'banner')
            @include('partials.sections.instructions.banner')
        @elseif ($content->layout == 'cta_section')
            @include('partials.sections.instructions.cta_section')
        @elseif ($content->layout == 'general_content')
            @include('partials.sections.instructions.general_content')
        @endif
    @endforeach

@endif