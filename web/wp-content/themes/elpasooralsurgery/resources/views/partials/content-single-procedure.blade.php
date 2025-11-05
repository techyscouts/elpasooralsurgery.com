@if ($ProcedureContentdata)
    @foreach ($ProcedureContentdata as $content)
        @if ($content->layout == 'banner')
            @include('partials.sections.our-procedures.banner')
        @elseif ($content->layout == 'cta_section')
            @include('partials.sections.our-procedures.cta_section')
        @elseif ($content->layout == 'select_patient_reviews')
            @include('partials.sections.our-procedures.select_patient_reviews')
        @elseif ($content->layout == 'general_content')
            @include('partials.sections.our-procedures.general_content')
        @elseif ($content->layout == 'timeline_content')
            @include('partials.sections.our-procedures.timeline_content')
        @elseif ($content->layout == 'faq')
            @include('partials.sections.our-procedures.faq')
        @endif
    @endforeach
@endif
