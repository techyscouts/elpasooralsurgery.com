{{--
  Template Name: TS Content
--}}

@extends('layouts.app')

@section('content')
  @while(have_posts()) @php(the_post())
    @include('partials.content-ts')
  @endwhile
@endsection
