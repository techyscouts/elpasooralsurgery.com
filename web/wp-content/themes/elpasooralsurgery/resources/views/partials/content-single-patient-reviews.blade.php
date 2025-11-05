@php
    $patient_heading = get_field('patient_heading', get_the_ID());
    $short_description = get_field('short_description', get_the_ID());
    $patients_back_button = get_field('patients_back_button', 'option');
@endphp
@if (!empty($patients_back_button))
    <div class="back lg:py-100 py-50 pb-0 lg:pb-0">
        <div class="container-fluid-md xl3:max-w-screen-2xl lgscreen:px-30">
            <div class="btn-custom">
                <a href="{!! $patients_back_button['url'] !!}" class="btn btn-back"
                    @if ($patients_back_button['target']) target="{!! $patients_back_button['target'] !!}" @else target="_self" @endif>
                    <svg width="14" height="10" viewBox="0 0 14 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M13.9999 4.99986C13.9999 4.86725 13.9472 4.74007 13.8535 4.6463C13.7597 4.55253 13.6325 4.49986 13.4999 4.49986L1.70692 4.49986L4.85392 1.35386C4.9478 1.25997 5.00055 1.13263 5.00055 0.999857C5.00055 0.867081 4.9478 0.739743 4.85392 0.645857C4.76003 0.55197 4.63269 0.499225 4.49992 0.499225C4.36714 0.499225 4.2398 0.55197 4.14592 0.645857L0.145917 4.64586C0.0993538 4.6923 0.0624109 4.74748 0.0372045 4.80822C0.011998 4.86897 -0.000976762 4.93409 -0.000976759 4.99986C-0.000976756 5.06562 0.011998 5.13075 0.0372045 5.19149C0.0624109 5.25224 0.0993538 5.30741 0.145917 5.35386L4.14592 9.35386C4.1924 9.40034 4.24759 9.43722 4.30833 9.46238C4.36907 9.48754 4.43417 9.50049 4.49992 9.50049C4.63269 9.50049 4.76003 9.44774 4.85392 9.35386C4.9478 9.25997 5.00055 9.13263 5.00055 8.99986C5.00055 8.86708 4.9478 8.73974 4.85392 8.64586L1.70692 5.49986L13.4999 5.49986C13.6325 5.49986 13.7597 5.44718 13.8535 5.35341C13.9472 5.25964 13.9999 5.13246 13.9999 4.99986Z"
                            fill="#6D6E6F" />
                    </svg>
                    <span>{!! $patients_back_button['title'] !!}</span>
                </a>
            </div>
        </div>
    </div>
@endif
@if (!empty($patient_heading) || !empty($short_description))
    <section class="intro-content lg:py-100 py-50">
        <div class="container-fluid-xl xl3:max-w-screen-2xl lgscreen:px-30">
            <div class="text-left lg:text-center">
                @if (!empty($patient_heading))
                    <div class="title-roboto title-Blue_1 title-700 big mb-20 last:mb-0">
                        <h1>{!! $patient_heading !!}</h1>
                    </div>
                @endif
                @if (!empty($short_description))
                    <div class="content agrey mb-24 last:mb-0">
                        {!! $short_description !!}
                    </div>
                @endif
            </div>
        </div>
    </section>
@endif
@if ($PatientReviewContentdata)
    @foreach ($PatientReviewContentdata as $content)
        @if ($content->layout == 'full_video')
            @include('partials.sections.patient-reviews.full_video')
        @elseif ($content->layout == 'simple_content')
            @include('partials.sections.patient-reviews.simple_content')
        @elseif ($content->layout == 'other_patient_reviews')
            @include('partials.sections.patient-reviews.other_patient_reviews')
        @elseif ($content->layout == 'cta_section')
            @include('partials.sections.patient-reviews.cta_section')
        @endif
    @endforeach
@endif
